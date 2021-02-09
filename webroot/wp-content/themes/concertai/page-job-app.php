<?php
/* Template Name: Job App */
get_header();
$url = "https://api.lever.co/v0/postings/concertai/";
$jobid = $_GET['jobid'];
$careers_postid = 5128; // link back to career page

$response = lever_getJobDetails($jobid);
$json = json_decode($response);
if (isset($json->error)){
    error_log("Error on job application page.");
    error_log($response);
} else {
    $commitment = $json->categories->commitment;
    $team = $json->categories->team;
    $location = $json->categories->location;
    $position = $json->text;
}

//var_dump(json_decode($response));

?>
<div class="container-fluid job-application-container">
    <div class="container">
        <div class="row">
            <div class="text-center col-12 col-lg-8 col-lg-offset-2">
                <h6><?php echo "$location / $team / $commitment"; ?></h6>
                <h2><?php echo $position; ?></h2>
            </div>
        </div>
        <div class="row" id="jobform_row">
            <div class="col-10 col-xs-offset-1 col-lg-8 col-lg-offset-2 col-xl-6 col-xl-offset-3">
                <form id="jobapp" accept-charset="UTF-8" action="<?= get_template_directory_uri() . '/functions/lever_job_post_handler.php'; ?>" method="POST">
                <input type="hidden" name="jobid" value="<?php echo $jobid; ?>" />
                <h4>Application</h4>
                <section>
                    <fieldset class="half">
                        <a class="button caps" id="linkedin-button"><?php get_template_part('partials/svgs/linkedinbox','svg');?> <h6>Apply with linkedin</h6></a>
                    </fieldset>
                    <fieldset class="half">
                        <a class="button caps" id="attach-resume-button"><?php get_template_part('partials/svgs/attach','svg');?> <h6> Attach Resume/CV</h6></a>
                        <input type="file" name="resume" id="jobresume" hidden required />
                    </fieldset>
                </section>
                <section>
                    <fieldset class="half required">
                        <label for="fname">First Name</label>
                        <input type="text" name="fname" placeholder="First Name" id="jobfname" required />
                    </fieldset>
                    <fieldset class="half required">
                        <label for="lname">Last Name</label>
                        <input type="text" name="lname" placeholder="Last Name" id="joblname" required />
                    </fieldset>
                </section>
                <section>
                    <fieldset class="full required">
                        <label for="email">Email</label>
                        <input type="email" name="email" placeholder="email.example.net" id="jobemail" required />
                    </fieldset>
                </section>
                <section>
                    <fieldset class="half required">
                        <label for="phone">Phone</label>
                        <input type="text" name="phone" placeholder="Number" id="jobphone" required />
                    </fieldset>
                    <fieldset class="half">
                        <label for="org">Current Company</label>
                        <input type="text" name="org" placeholder="Company" id="jobcompany" />
                    </fieldset>
                </section>
                <h4>Links</h4>
                <section>
                    <fieldset class="full">
                        <label for="urls[LinkedIn]">LinkedIn</label>
                        <input type="text" name="urls[LinkedIn]" placeholder="LinkedIn" id="joblinkedin" />
                    </fieldset>
                    <fieldset class="full">
                        <label for="urls[Twitter]">Twitter</label>
                        <input type="text" name="urls[Twitter]" placeholder="Twitter" id="jobtwitter" />
                    </fieldset>
                    <fieldset class="full">
                        <label for="urls[Portfolio]">Portfolio</label>
                        <input type="text" name="urls[Portfolio]" placeholder="URL" id="jobportfolio" />
                    </fieldset>
                    <fieldset class="full">
                        <label for="urls[Other]">Other Website</label>
                        <input type="text" name="urls[Other]" placeholder="URL" id="jobotherwebsite" />
                    </fieldset>
                </section>
                <section>
                    <fieldset class="full">
                        <label for="comments" class="h4">Additional Information</label>
                        <textarea name="comments" placeholder="Add a cover letter or anything else you want to share" id="jobadditional"></textarea>
                    </fieldset>
                </section>
                <a class="cta cta-small" id="form-submit">Submit Application<?php get_template_part('partials/svgs/arrow','svg'); ?></a>
                </form>
            </div>
        </div>
        <div class="row" id="jobform_thanks" style="display:none;">
            <div class="col-12 col-lg-6 col-lg-offset-3 text-center">
                <h3>Thank you! We look forward to reviewing your application.</h3>
                <a class="cta cta-small" href="<?php echo get_permalink($careers_postid); ?>">Back To Careers<?php get_template_part('partials/svgs/arrow','svg'); ?></a>
            </div>
        </div>
                <p id="xhr-response"></p>
    </div>
</div>

<?php get_footer(); ?>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script type="text/javascript">
    $ = jQuery;
    var url, request, formData, myForm, myFile;
    console.log($);
    myFile = document.getElementById('jobresume');
    myForm = document.getElementById('jobapp');
    
    // this function returns an array of fields that are not valid, or an empty array indicating success
    function invalidFields(formdata){
        valid = [];
        var reqFields = $(formdata).find(':required');
        $(formdata).find('.error-msg').remove();
        if (reqFields.length > 0){
            $.each(reqFields, function(index,value){
                if (!value.checkValidity()){
                    valid.push({
                        key: reqFields[index],
                        msg: value.validationMessage
                    });
                } else {
                    $(reqFields[index]).removeClass('error');
                    $(reqFields[index]).find('.error-msg').remove();
                }
            });
        }
        return valid;

    }
    $('#form-submit').on("click", function(){
        $('#jobapp').submit();
    });

    $('#attach-resume-button').on("click", function(){
        $("#jobresume").trigger("click");
        $('.file-txt').remove();
    });
    $('#jobresume').change(function(e){
        if (e.target.files.length > 0){
            var fileName = e.target.files[0].name;
            $(this).parent().append("<span class='file-txt'>" + fileName + "</span>");
            $(this).parent().find('.error-msg').remove();
        }
    });
    $('#jobapp').submit(function(event){
        event.preventDefault();
        var badFields = invalidFields(this);
        if (badFields.length > 0){
            $.each(badFields, function(index,value){
                var elem = $(this)[0].key;
                var msg = $(this)[0].msg;

                $(elem).addClass("error");
                $(elem).after("<span class='error-msg'>" + msg + "</span>");

                if($(elem).attr('type') == 'file'){
                    $(elem).parent().find('.button').addClass('error');
                }

            });
            var firstError = $(".error-msg").position();
            scroll(0,firstError.top);
            return false;
        }

        var files = myFile.files;
        var formData = new FormData(this);
        var statusP = document.getElementById('jobapp');

        url = event.target.action;
        var file = files[0];
        formData.append('resume', file, file.name);
        var xhr = new XMLHttpRequest();
        xhr.open('POST', url, true);
        xhr.onload = function(){
            if (xhr.status == 200){
                //$('#xhr-response').html(xhr.response);
                
                $json = JSON.parse(xhr.response);
                if ($json.ok == true){
                    console.log($json);
                    $('#jobform_row').hide();
                    $('#jobform_thanks').show();
                    //$('#xhr-response').html(xhr.response);
                    window.scrollTo(0,0);

                } else {
                    console.log($json.error);
                }
            } else {
                console.log(xhr.status);
                console.log(xhr.response);
            }
        }
        xhr.send(formData);

        // hi can't make a curlfile? 522
    });
</script>