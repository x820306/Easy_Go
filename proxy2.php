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

$postUrl='http://api.ser.ideas.iii.org.tw/api/fb_checkin_search';

$ctr = $_POST["coordinates"];
$rad = $_POST["radius"];
$lim = $_POST["limit"];
$tok = $_POST["token"];
$key = $_POST["keyword"];
$cat = $_POST["category"];

if((empty($key))&&(empty($cat)))
{
	$postBODY = array(
	'coordinates' => $ctr,
	'radius' => $rad,
	'limit' => $lim,
	'token' => $tok
	);	
}else if((empty($key))&&(!empty($cat)))
{
	$postBODY = array(
	'coordinates' => $ctr,
	'radius' => $rad,
	'limit' => $lim,
	'token' => $tok,
	'category' => $cat
	);	
}else if((!empty($key))&&(empty($cat)))
{
	$postBODY = array(
	'coordinates' => $ctr,
	'radius' => $rad,
	'limit' => $lim,
	'token' => $tok,
	'keyword' => $key
	);	
}else if((!empty($key))&&(!empty($cat)))
{
	$postBODY = array(
	'coordinates' => $ctr,
	'radius' => $rad,
	'limit' => $lim,
	'token' => $tok,
	'keyword' => $key,
	'category' => $cat
	);	
}

$getBody = my_curl($postUrl,$postBODY);
echo $getBody;
?>