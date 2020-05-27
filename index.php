<?php

function getToken(){

  $curl = curl_init();

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
     // echo $response->result->token;    TOKEN
	   return $response->result->token;
	}

}

function getLogin(){

  $curl = curl_init();

  $username = "frenteweb";
  $accessKey = "12345";
  $token = md5(getToken());


  curl_setopt_array($curl, array(
    CURLOPT_URL => "https://server2.datacrm.la/datacrm/sanofi/webservice.php",
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => "",
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 0,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => "POST",
    CURLOPT_POSTFIELDS => "operation=login&username=".$username."&accessKey=".$accessKey."&token=".$token,
    CURLOPT_HTTPHEADER => array(
      "Content-Type: application/x-www-form-urlencoded",
      "Content-Type: application/x-www-form-urlencoded"
    ),
  ));

  $response = curl_exec($curl);
  $err = curl_error($curl);

  curl_close($curl);

  if ($err) {
    print_r($err);
  } else {
     $response = json_decode($response);
     // echo $response->result->sessionName;    sessionName
     return $response->result->sessionName;
  }

}

getLogin();

?>
