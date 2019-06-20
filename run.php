<?php
echo "\n\n\t @Author : Ferry Kirdan Agustin\n";
echo "\t @Script : Bot Message Simsimi\n\n";
echo " [ Msg ] Input Message : ";
$text = trim(fgets(STDIN));
	
$curl = curl_init();
curl_setopt_array($curl, array(
  CURLOPT_URL => "https://wsapi.simsimi.com/190410/talk/",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "POST",
 CURLOPT_POSTFIELDS => "{\n\t\"utext\": \"$text\", \n\t\"lang\": \"id\" \n}",
  CURLOPT_HTTPHEADER => array(
    "Content-Type: application/json",
    "x-api-key: p2DHdcbQP2DFgS7zNUqCacXsiSXWROXkeZ55G290"
  ),
));

$xml = curl_exec($curl);
$err = curl_error($curl);
curl_close($curl);
        $json = json_decode($xml,true);
if($json['statusMessage'] == 'Ok') {
         echo " [ Received ] Simsimi : ".$json['atext']."\n";
}
?>
