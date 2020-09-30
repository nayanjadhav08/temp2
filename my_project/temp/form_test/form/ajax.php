<?php
error_reporting(E_ERROR);
//supress warnigns 
/*
Website: https://www.allphptricks.com
*/

function httpPost($url,$params)
{
  $postData = '';
   //create name value pairs seperated by &
   foreach($params as $k => $v) 
   { 
      $postData .= $k . '='.$v.'&'; 
   }
   $postData = rtrim($postData, '&');
 
    $ch = curl_init();  
 
    curl_setopt($ch,CURLOPT_URL,$url);
    curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
    curl_setopt($ch,CURLOPT_HEADER, false); 
    curl_setopt($ch, CURLOPT_POST, count($postData));
    curl_setopt($ch, CURLOPT_POSTFIELDS, $postData);    
 
    $output=curl_exec($ch);
 
    curl_close($ch);
    return $output;
 
}


function send_to_url($url, $data)
{
$ch = curl_init($url);
//Set a POST method
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
//curl_setopt($ch, CURLOPT_TIMEOUT, 6);

//Set data to JSON application/json
curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
$jsonDataEncoded = json_encode($data);
curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonDataEncoded);

//POST to URL
$result = curl_exec($ch);

//Get result from POST if any
$result_post = urldecode(json_encode($result));

curl_getinfo($ch);
curl_close($ch);
return $result;
}



if ( ($_POST['name']!="") && ($_POST['phone']!="")){
$name = $_POST['name'];
$phone = $_POST['phone'];
$email = $_POST['email'];
$message = $_POST['message'];


// $users = 
// array("Date"=>"Timestamp","Name"=>"Name","Mobile_Number"=>"789879","Email"=>"1111@example.com","Message"=>"Hii 2 ");

$users2 = 
array("Date"=>"Timestamp","Name"=>$name,"Mobile_Number"=>$phone,"Email"=>$email,"Message"=>$message);


//$result = send_to_url("https://script.google.com/macros/s/AKfycbzziTpkA3CxMSmSuCyMyVaVn3KZCzkb3zZs17TcuBN-77xAuy5Z/exec",$users2); 
// $result = httpPost("https://script.google.com/macros/s/AKfycbxcIDuC98uLQI4cHc-AYdlCyIo5TnPuMlUT6SiENTwRhEH4wK5m/exec",$users2);
$result = send_to_url("https://script.google.com/macros/s/AKfycbzziTpkA3CxMSmSuCyMyVaVn3KZCzkb3zZs17TcuBN-77xAuy5Z/exec",$users2);

// https://script.google.com/macros/s/AKfycbxcIDuC98uLQI4cHc-AYdlCyIo5TnPuMlUT6SiENTwRhEH4wK5m/exec //mitm
$sent =  FALSE;//mail($to,$subject,$message,$headers);
if($result){
	echo "<span style='color:Green; font-weight:bold; font-size:20px'>
	Thank you for contacting us, we will get back to you shortly.
	</span><br>Feel Free to call us.";
}
else{
	echo "<span style='color:red; font-weight:bold; font-size:20px;'>.$result.
	Sorry! Your form submission is failed.<br>Feel Free to call Us.	
	</span>";
	}
}
?>
