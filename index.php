<?php 
$BASE_URL = "http://query.yahooapis.com/v1/public/yql";
    $yql_query = "select * from html where url='http://www.geopostcodes.com/Germany' and xpath='//table/*[contains(.,\"DE-BW\")]//td'";
    $yql_query_url = $BASE_URL . "?q=" . urlencode($yql_query) . "&format=json";
    // Make call with cURL
    $ch = curl_init($yql_query_url);
	curl_setopt( $ch, CURLOPT_SSL_VERIFYPEER, 0 );
	curl_setopt( $ch, CURLOPT_RETURNTRANSFER, 1 );
	curl_setopt( $ch, CURLOPT_CONNECTTIMEOUT, 0);

    $json = curl_exec($ch);
    // Convert JSON to PHP object
     $phpObj =  json_decode($json);
    
     header("Content-Type: application/json");
     echo json_encode($phpObj->query->results->td);




// $query = urlencode("select * from html where url='http://www.geopostcodes.com/Baden_Wurttemberg' and xpath='//table/*[contains(.,\"DE13\")]//td'");
// echo $query;
// $url     = "https://query.yahooapis.com/v1/public/yql?q=$query";
// $url = "https://query.yahooapis.com/v1/public/yql?q=select%20*%20from%20html%20where%20url%3D'http%3A%2F%2Fwww.geopostcodes.com%2FBaden_Wurttemberg'%20and%20xpath%3D'%2F%2Ftable%2F*%5Bcontains(.%2C%22DE13%22)%5D%2F%2Ftd'&format=json&env=store%3A%2F%2Fdatatables.org%2Falltableswithkeys";
// // Create a curl call
// $ch      = curl_init();
// $timeout = 5;

// curl_setopt( $ch, CURLOPT_URL, $url );
// curl_setopt( $ch, CURLOPT_SSL_VERIFYPEER, 0 );
// curl_setopt( $ch, CURLOPT_RETURNTRANSFER, 1 );
// curl_setopt( $ch, CURLOPT_HEADER, 0 );
// curl_setopt( $ch, CURLOPT_CONNECTTIMEOUT, $timeout );

// $data = curl_exec( $ch );
// // send request and wait for response

// $response = json_decode( $data, true );

// curl_close( $ch );

// echo "<pre/>" . var_dump($response);	