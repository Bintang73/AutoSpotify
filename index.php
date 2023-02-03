<?php
error_reporting(0);
function curlon($param, $headers, $url)
{
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    //curl_setopt($ch, CURLOPT_FOLLOWLOCATION, false);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $param);
    curl_setopt($ch, CURLOPT_ENCODING, "GZIP,DEFLATE");
    //curl_setopt($ch,CURLOPT_PROXY, $proxy);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($ch, CURLOPT_HEADER, 1);
    $result = curl_exec($ch);
    if (curl_errno($ch)) {
        echo 'Error:' . curl_error($ch);
    }
    curl_close($ch);
    return $result;
}
$Grey   = "\e[1;30m";
$Red    = "\e[0;31m";
$Green  = "\e[0;32m";
$Yellow = "\e[0;33m";
$Blue   = "\e[1;34m";
$Purple = "\e[0;35m";
$Cyan   = "\e[0;36m";
$White  = "\e[0;37m";
function curl($param, $headers, $url)
{
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    //curl_setopt($ch, CURLOPT_FOLLOWLOCATION, false);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $param);
    curl_setopt($ch, CURLOPT_ENCODING, "GZIP,DEFLATE");
    //curl_setopt($ch,CURLOPT_PROXY, $proxy);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    $result = curl_exec($ch);
    if (curl_errno($ch)) {
        echo 'Error:' . curl_error($ch);
    }
    curl_close($ch);
    return $result;
}
function pathon($method, $headers, $url)
{
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    //curl_setopt($ch, CURLOPT_FOLLOWLOCATION, false);
    //curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, $method);
    curl_setopt($ch, CURLOPT_ENCODING, "GZIP,DEFLATE");
    //curl_setopt($ch,CURLOPT_PROXY, $proxy);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($ch, CURLOPT_HEADER, 1);
    $result = curl_exec($ch);
    if (curl_errno($ch)) {
        echo 'Error:' . curl_error($ch);
    }
    curl_close($ch);
    return $result;
}

function path($method, $headers, $url)
{
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    //curl_setopt($ch, CURLOPT_FOLLOWLOCATION, false);
    //curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, $method);
    curl_setopt($ch, CURLOPT_ENCODING, "GZIP,DEFLATE");
    //curl_setopt($ch,CURLOPT_PROXY, $proxy);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    //curl_setopt($ch, CURLOPT_HEADER, 1);
    $result = curl_exec($ch);
    if (curl_errno($ch)) {
        echo 'Error:' . curl_error($ch);
    }
    curl_close($ch);
    return $result;
}


function signup($email, $pass)
{
    $url = "https://spclient.wg.spotify.com/signup/public/v2/account/create";
    $param = '{
  "account_details": {
    "birthdate": "1999-07-21",
    "consent_flags": {
      "eula_agreed": true,
      "send_email": true,
      "third_party_email": false
    },
    "display_name": "Bintang",
    "email_and_password_identifier": {
      "email": "' . $email . '",
      "password": "' . $pass . '"
    },
    "gender": 1
  },
  "callback_uri": "https://www.spotify.com/signup/challenge?forward_url\u003dhttps%3A%2F%2Fwww.spotify.com%2Faccount%2Foverview%2F\u0026locale\u003did",
  "client_info": {
    "api_key": "bff58e9698f40080ec4f9ad97a2f21e0",
    "app_version": "v2",
    "capabilities": [
      1
    ],
    "installation_id": "1e543f1f-0945-4d27-84f0-ea065451435a",
    "platform": "www"
  },
  "tracking": {
    "creation_flow": "",
    "creation_point": "https://www.spotify.com/id/login/",
    "referrer": ""
  }
}';
    $headers = array();
    $headers[] = 'Content-Length: ' . strlen($param);
    $headers[] = 'User-Agent: Mozilla/5.0 (Linux; Android 10; RMX2061) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/74.0.3729.186 Mobile Safari/537.36';
    $headers[] = 'Content-Type: application/json';
    $headers[] = 'Accept: */*';
    $headers[] = 'Accept-Language: id-ID,id;q=0.9,en-US;q=0.8,en;q=0.7';
    return curl($param, $headers, $url);
}

function getCSRF()
{
    $url = "https://accounts.spotify.com/en/login";
    $method = "GET";
    $headers = array();
    $headers[] = 'User-Agent: Mozilla/5.0 (Linux; Android 10; RMX2061) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/74.0.3729.186 Mobile Safari/537.36';
    $headers[] = 'Accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3';
    $headers[] = 'Accept-Encoding: gzip, deflate, br';
    $headers[] = 'Accept-Language: id-ID,id;q=0.9,en-US;q=0.8,en;q=0.7';
    $headers[] = 'Cookie: __Host-device_id=AQASTaFlcfRwTXhko6Y5HZmzSochQ7qB8ghzHLlyBgthfH9Rv8iTUtZ8lf0hHvhQmbGdaN_E8CDrhttjU88OBKO0DzZZE7nTlTM;sp_sso_csrf_token=013acda7193cecfaa271306f303c2b43f45eb6380431363732343535393236303530;__Host-sp_csrf_sid=b7eb719dbaf5cf8c9e5eec8888cc25a813c37db179091fc3d2d324f2d70143bd';
    return pathon($method, $headers, $url);
}

function authlogin($logintoken, $csrf, $csrfsid)
{
    $url = "https://www.spotify.com/api/signup/authenticate";
    $param = "splot=$logintoken";
    $headers = array();
    $headers[] = 'Content-Length: ' . strlen($param);
    $headers[] = 'X-Csrf-Token: ' . $csrf;
    $headers[] = 'User-Agent: Mozilla/5.0 (Linux; Android 10; RMX2061) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/74.0.3729.186 Mobile Safari/537.36';
    $headers[] = 'Content-Type: application/x-www-form-urlencoded';
    $headers[] = 'Accept: */*';
    $headers[] = 'Accept-Encoding: gzip, deflate, br';
    $headers[] = 'Accept-Language: id-ID,id;q=0.9,en-US;q=0.8,en;q=0.7';
    $headers[] = 'Cookie: __Host-sp_csrf_sid=' . $csrfsid;
    return curlon($param, $headers, $url);
}

function getAccessToken($token)
{
    $url = "https://open.spotify.com/get_access_token?reason=transport&productType=web_player";
    $method = "GET";
    $headers = array();
    $headers[] = 'User-Agent: Mozilla/5.0 (Linux; Android 10; RMX2061) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/74.0.3729.186 Mobile Safari/537.36';
    $headers[] = 'Content-Type: application/x-www-form-urlencoded';
    $headers[] = 'Accept: */*';
    $headers[] = 'Accept-Encoding: gzip, deflate, br';
    $headers[] = 'Accept-Language: id-ID,id;q=0.9,en-US;q=0.8,en;q=0.7';
    $headers[] = 'cookie: sp_dc=' . $token;
    return path($method, $headers, $url);
}

function activateSamsung($bearer)
{
    $url = "https://spclient.wg.spotify.com/premium-destination-hubs/v2/page?locale=id&device_id=9b4ff48cce620e80&partner_id=&referrer_id=&build_model=Samsung-sm-n900a&cache_key=free&show_unsafe_unpublished_content=false&manufacturer=Samsung";
    $method = "GET";
    $headers = array();
    $headers[] = 'Accept-Language: id-ID;q=1, en-US;q=0.5';
    $headers[] = 'User-Agent: Spotify/8.6.4 Android/29 (Samsung-sm-n900a)';
    $headers[] = 'Spotify-App-Version: 8.6.4';
    $headers[] = 'X-Client-Id: 9a8d2f0ce77a4e248bb71fefcb557637';
    $headers[] = 'App-Platform: Android';
    $headers[] = 'Client-Token: ' . $token;
    $headers[] = 'Authorization: Bearer ' . $bearer;
    $headers[] = 'Accept-Encoding: gzip';
    return path($method, $headers, $url);
}

function randUser()
{
    $fp = file_get_contents('https://names.drycodes.com/1?nameOptions=boy_names');
    $pp = explode('"', $fp)[1];
    $us = explode('"', $pp)[0];
    $p = str_replace('_', ' ', $us);
    $change = str_replace('_', '', $us);
    return strtolower($change);
}

echo "$Green
	    ___  ____  _____  ____  ____  ____  _  _ 
	   / __)(  _ \(  _  )(_  _)(_  _)( ___)( \/ )
	   \__ \ )___/ )(_)(   )(   _)(_  )__)  \  / 
	   (___/(__)  (_____) (__) (____)(__)   (__) \n" . "$White               Samsung Galaxy Free 3 Month offer\n\n\n";

echo "$Green Select the menu below";
echo "\n$White ╰┈➤ 1. Register and get Cookie Browser ";
echo "\n$White ╰┈➤ 2. Register and get Bearer Authorization app ";
echo "\n$White ╰┈➤ 3. Register and Claim Free Spotify 3 Month Samsung Galaxy ";
echo "\n$Yellow ╰┈➤ Choose : ";
$hai = trim(fgets(STDIN));
echo "$Grey ╰┈➤ Your choice $hai";


reg:
echo "\n\n";
echo "$Yellow Trying to register on spotify use random email ";
$email = randUser() . "@st4rz.me";
$pass = "@Akusayangibu123";
$register = signup($email, $pass);
$json = json_decode($register, true);
if (preg_match('/success/i', $register)) {
    $logintoken = $json['success']['login_token'];
    $username = $json['success']['username'];
    echo "\n$White ╰┈➤ $email + $pass ";
    //echo "$Green > $logintoken - $username\n";
} else if (preg_match('/error/i', $register)) {
    echo "$Red ╰┈➤ IP Rate limited, Please airplane mode ";
    $pr = trim(fgets(STDIN));
    goto reg;
}

$get = getCSRF();
preg_match_all('/^Set-Cookie:\s*([^;]*)/mi', $get, $matches);
$cookies = array();
foreach ($matches[1] as $item) {
    parse_str($item, $cookie);
    $cookies = array_merge($cookies, $cookie);
}
$csrf = $cookies['sp_sso_csrf_token'];
$csrfsid = $cookies['__Host-sp_csrf_sid'];

$login = authlogin($logintoken, $csrf, $csrfsid);
list($head, $param) = explode("\r\n\r\n", $login, 2);
$per = explode('set-cookie: sp_dc=', $login)[1];
$token = explode(';', $per)[0];
if ($hai == "1") {
    echo "\n$Green ╰┈➤ Cookie Browser : $token\n\n";
    die;
}
if ($token == null) {
    goto reg;
} else {
    //echo "\n$White ╰┈➤ Successfully Grabber Cookie <3 ";
}
$hems = getAccessToken($token);
//var_dump($hems);
$x = json_decode($hems, true);
if ($hai == "2") {
    $bearer = $x['accessToken'];
    echo "\n$Green ╰┈➤ Bearer Authorization : $bearer\n\n";
    die;
}
if ($pler == "5") {
    $bearer = $x['accessToken'];
    echo "\n$White ╰┈➤ $bearer";
    die;
}
if ($x['isAnonymous'] == false) {
    $bearer = $x['accessToken'];
    echo "\n$White ╰┈➤ Successfully Grabber Bearer and Cookie <3";
} else {
    var_dump("\n\n$hems\n\n");
    die;
}

$linkdevices = activateSamsung($bearer);
echo "\n$Green ╰┈➤ Successfully Claimed Offer Samsung Galaxy series <3";
sleep(1);
echo "\n$Yellow ╰┈➤ Goto browser and login using that account to activate now";
sleep(2);
$saved = '{"email":"' . $email . '","password":"' . $pass . '"}';
echo "\n\n";
//system("xdg-open https://www.spotify.com/id/redirect-in-app/android_premium_promotion/?offerSlug=samsung-global2022-pdp-3m-3m-trial-one-time-code");
file_put_contents('res_spotif.json', "$saved\n", FILE_APPEND);
