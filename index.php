<?php

$curl = curl_init();

function getToken(){

  global $curl;

  curl_setopt_array($curl, array(
    CURLOPT_URL => "https://server2.datacrm.la/datacrm/sanofi/webservice.php?operation=getchallenge&username=frenteweb",
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => "",
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 0,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => "GET",
  ));

  $response = curl_exec($curl);
  $err = curl_error($curl);

  curl_close($curl);

  if ($err) {
	  echo  $err;
	} else {

     $response = json_decode($response);
     // echo $response->result->token; TOKEN
	   return $response->result->token;
	}

}

getToken();

?>
