<?php
function my_curl($url,$post)
{
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_POST,1);
//curl_setopt($ch, CURLOPT_CUSTOMREQUEST,  'POST');
curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($post));
curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
$result = curl_exec($ch);
curl_close ($ch);
return $result;
}

$postUrl='http://api.ser.ideas.iii.org.tw/api/user/get_token';
$postBODY = array(
'id' => '277b49909b1d1400b8a139f0d575cad5',
'secret_key' => '2681a844c37d538bbd53d5ac101a3f43'
);

$getBody = my_curl($postUrl,$postBODY);
echo $getBody;
?>