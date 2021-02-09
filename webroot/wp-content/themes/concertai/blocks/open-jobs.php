<div class="husl-block block-open-jobs">
    <div class="container">
        <div class="row open-jobs-filter" id="lever-jobs-filter">
            <div class="col-12 col-lg-2" id="filter-labels">
                <h6>Filter By</h6>
                <a id="lever-clear-filters" style="display: none;">Clear filters</a>
            </div>
            <div id="new-list" class="col-10 col-xs-offset-1 col-lg-9 col-lg-offset-0 no-padding">
                <div>
                    <div id="lever-jobs-filter">
                        <select class="lever-jobs-filter-locations">
                        <option value="" disabled selected>Location</option>
                        <option value=all>View All</option>
                        </select>
                        <select class="lever-jobs-filter-teams">
                        <option value="" disabled selected>Team</option>
                        <option value="all">View All</option>
                        </select>
                        <select class="lever-jobs-filter-work-types">
                        <option value="" disabled selected>Work Type</option>
                        <option value="all">View All</option>
                        </select>
                    </div>
                    <ul class="list">
                    </ul>
                    <div id="lever-no-results" style="display: none;">No results</div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid no-padding" id="jobs-list">
        <div class="container">
        <div class="row">
            <div class="col-12" id="lever-jobs-container"></div>
        </div>
        <?php if (!(is_admin())){ // throws errors in WP admin ?>
            <script type='text/javascript'>
                window.leverJobsOptions = {accountName: 'concertai', includeCss: false, mode: 'JSON', fx: 'createjobs'};
            </script>

            <script src="https://cdnjs.cloudflare.com/ajax/libs/list.js/1.5.0/list.min.js"></script>
            <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>



            <script type='text/javascript'>
                window.addEventListener('leverJobsRendered', function() {
                    $ = jQuery;
                    $(".lever-job").clone().appendTo("#new-list ul");

                    var options = {
                        valueNames: [
                        'lever-job-title',
                        { data: ['location'] },
                        { data: ['team'] },
                        { data: ['work-type'] }
                        ]
                    };

                    var jobList = new List('new-list', options);

                    console.log("joblist", jobList);

                    var locations = [];
                    var teams = [];
                    var workTypes = [];
                    for (var i = 0; i < jobList.items.length; i++) {
                        var item = jobList.items[i]._values;
                        var location = item.location;
                        if(jQuery.inArray(location, locations) == -1) {
                            locations.push(location);
                        }
                        var team = item.team;
                        if(jQuery.inArray(team, teams) == -1) {
                            teams.push(team);
                        }
                        var workType = item["work-type"];
                        if(jQuery.inArray(workType, workTypes) == -1) {
                            workTypes.push(workType);
                        }
                    }

                    locations.sort();
                    teams.sort();
                    workTypes.sort();
                    for (var j = 0; j < locations.length; j++ ) {
                        $( "#lever-jobs-filter .lever-jobs-filter-locations").append('<option>' + locations[j] + '</option>');
                    }
                    for (var j = 0; j < teams.length; j++ ) {
                        $( "#lever-jobs-filter .lever-jobs-filter-teams").append('<option>' + teams[j] + '</option>');
                    }
                    for (var j = 0; j < workTypes.length; j++ ) {
                        $( "#lever-jobs-filter .lever-jobs-filter-work-types").append('<option>' + workTypes[j] + '</option>');
                    }

                    function showFilterResults() {
                        $('#lever-clear-filters').show();
                        //$('#lever-jobs-container').hide();
                    }
                    function hideFilterResults() {
                        $('ul.lever-team.hidden').removeClass('hidden');
                        $('li.lever-job[data-hidden]').attr('data-hidden',null);
                        $('#lever-clear-filters').show();
                        //$('#lever-jobs-container').show();
                    }
                    function filterJobs(selectedFilters=null){
                        if (selectedFilters == null) {
                            return false;
                        }

                        $('.lever-job').each(function(){
                            var loc = $(this).attr('data-location');
                            var team = $(this).attr('data-team');
                            var worktype = $(this).attr('data-work-type');

                            if (selectedFilters['location'] != null && selectedFilters['location'] != loc){
                                $(this).attr('data-hidden','true');
                            } else if (selectedFilters['team'] != null && selectedFilters['team'] != team){
                                $(this).attr('data-hidden','true');
                            } else if (selectedFilters['work-type'] != null && selectedFilters['work-type'] != worktype){
                                $(this).attr('data-hidden', 'true');
                            } else {
                                $(this).attr('data-hidden', null);
                            }
                        });

                        return true;

                    }

                    // Show the unfiltered list by default
                    //hideFilterResults();

                    $('#lever-jobs-filter select').change(function(){
                        var filter_loc = $('#lever-jobs-filter select.lever-jobs-filter-locations').val();
                        var filter_team = $('#lever-jobs-filter select.lever-jobs-filter-teams').val();
                        var filter_work = $('#lever-jobs-filter select.lever-jobs-filter-work-types').val();
                        
                        if (filter_loc == 'all'){
                            filter_loc = null;
                        }
                        if (filter_team == 'all'){
                            filter_team = null;
                        }
                        if (filter_work == 'all'){
                            filter_work = null;
                        }

                        var selectedFilters = {
                            location: filter_loc,
                            team: filter_team,
                            'work-type': filter_work,
                        }

                        console.log(selectedFilters);

                        //Filter the list
                        jobList.filter(function(item) {
                            var itemValue = item.values();
                            // Check the itemValue against all filter properties (location, team, work-type).
                            for (var filterProperty in selectedFilters) {
                                var selectedFilterValue = selectedFilters[filterProperty];

                                // For a <select> that has no option selected, JQuery's val() will return null.
                                // We only want to compare properties where the user has selected a filter option,
                                // which is when selectedFilterValue is not null.
                                if (selectedFilterValue !== null) {
                                    if (itemValue[filterProperty] !== selectedFilterValue) {
                                    // Found mismatch with a selected filter, can immediately exclude this item.
                                    return false;
                                    }
                                }
                            }
                            // This item passes all selected filters, include this item.
                            return true;
                        });

                        console.log(jobList.visibleItems);

                        //Show the 'no results' message if there are no matching results
                        if (jobList.visibleItems.length >= 1) {
                            $('#lever-no-results').hide();
                        }
                        else {
                            $('#lever-no-results').show();
                        }

                        console.log("filtered?", jobList.filtered);



                        //$('#lever-clear-filters').show();

                        //Show the list with filtered results
                        showFilterResults();


                        filterJobs(selectedFilters);


                        $('ul.lever-team').each(function(){
                            var show = true;
                            var thesejobs = $(this).find('li.lever-job');
                            if ($(thesejobs).length == $(thesejobs).filter('[data-hidden]').length) { show = false; }
                            if (show == false) { $(this).addClass('hidden'); }
                            else { $(this).removeClass('hidden');}
                        });


                    });


                    $('#lever-jobs-filter').on('click', '#lever-clear-filters', function() {
                        console.log("clicked clear filters");
                        jobList.filter();
                        console.log("jobList filtered?", jobList.filtered);
                        if (jobList.filtered == false) {
                            hideFilterResults();
                        }
                        $('#lever-jobs-filter select').prop('selectedIndex',0);
                        $('#lever-clear-filters').hide();
                        $('#lever-no-results').hide();
                    });

                })


                </script>

            <?php } ?>
            </div>
        
        
        
        
        
        </div>
</div>