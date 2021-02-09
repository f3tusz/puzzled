<?php 

function lever_getJobDetails($jobid, $url="https://api.lever.co/v0/postings/concertai/"){

    $apiURL = $url . $jobid;
    $curl = curl_init();

    curl_setopt_array($curl, array(
    CURLOPT_URL => $apiURL,
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => "",
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 0,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => "GET",
    ));

    $response = curl_exec($curl);
    
    curl_close($curl);

    return $response;
}