<?php 
$debugging = false;
$debugging = true;

$url = "https://api.lever.co/v0/postings/concertai/";
$jobid = "4f9c8913-2fba-4755-bfc8-3d70baddc0d6";
$APIkey = "?key=HvsVsWDGGNyigkigWJky";

$dummyjobid = "4f9c8913-2fba-4755-bfc8-3d70baddc0d6";
$dummy_response = json_encode(array(
    "ok" => true,"applicationId" => "85c297e9-450f-46ec-9f5e-43cf04c1cfe2"));

$errors = [];




if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    // make sure we have files
    if(!isset($_FILES['resume'])){
        array_push($errors, array(
            'ok' => 'false',
            'error' => 'Please upload a resume'
        ));
        return $errors;
    }

    // move stuff to clean array
    foreach ($_REQUEST as $key => &$value){
        $jobapp_array[$key] = $value;
    }
    

    // Move and rename the file to a tmp folder 
    $resume = $_FILES['resume'];
    $tmp_name = $resume["tmp_name"];
    $uploads_dir = './uploads/';
    $timestamp = date('U');
    $filename = $uploads_dir . $timestamp . "_" . basename($resume['name']);
    $moved = move_uploaded_file($tmp_name, $filename);

    /* something not working, not creating CURLFILE on server */
    if ($moved){
        $cfile = new CURLFILE($filename);
        $jobapp_array = array('resume' => $cfile) + $jobapp_array;
    } else {
        array_push($errors, array(
            'ok' => 'false',
            'error' => 'Could not create save resume to server'
        ));
        return $errors;
    }

    // Lever has full name as the field, while our page has first and last as separate fields. Combine them here and delete the old fields
    $name = $jobapp_array['fname'] . " " . $jobapp_array['lname'];
    $jobapp_array['name'] = $name;
    unset($jobapp_array['fname']);
    unset($jobapp_array['lname']);

    // remove any field that wasn't filled out
    foreach($jobapp_array as $key => &$value){
        if (is_string($value)){
            if (strlen($value) == 0){
                unset($jobapp_array[$key]);
            }
        }

        // The "other" fields get passed as an array, because the name is like 'url[twitter]' it messes up the API call when sent as is
        // We will remove any blanks, and add the actual value to a special key
        if (is_array($value)){
            $ix = 0;
            foreach($value as $key2 => &$item){
                // there's a value, save it to the correct index
                if (strlen($item) > 0){
                    $newKey = $key . '[' . $key2 . ']';
                    $jobapp_array[$newKey] = $item;
                }
                // remove the bad index
                unset($jobapp_array[$key][$key2]);
                $ix++;
            }
        }
    }
    unset($jobapp_array['urls']); // this is the bad key that gets sent from the form



    if ($debugging){
        $jobid = $dummyjobid;
    } else {
        $jobid = $jobapp_array['jobid'];
    }
    unset($jobapp_array['jobid']); 




	// Extra step to unset any extra flieds that don't belong
	// The ones that belong are name, email, phone, org, urls[LinkedIn], urls[Twitter], urls[Portfolio], urls[Other], comments, resume
	
	$allowed_fields = array('name','email', 'phone', 'org', 'urls[LinkedIn]', 'urls[Twitter]', 'urls[Portfolio]', 'urls[Other]', 'comments', 'resume');
	foreach ($jobapp_array as $key => &$value){
        if (!in_array($key, $allowed_fields)){
			unset($jobapp_array[$key]);
		}
	}


    $postURL = $url . $jobid . $APIkey;
    $curl = curl_init();

    curl_setopt_array($curl, array(
    CURLOPT_URL => $postURL,
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => "",
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 0,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => "POST",
    CURLOPT_POSTFIELDS => $jobapp_array,
    //CURLOPT_POSTFIELDS => array('name' => 'name test','email' => 'emailtest@emailtest.com','resume'=> new CURLFILE($filename),'phone' => '2535551234'),
    ));

    $response = curl_exec($curl);
    echo $response;
    curl_close($curl);


    unlink($filename);

}