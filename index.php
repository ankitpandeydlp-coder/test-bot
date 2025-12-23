<?php
set_time_limit(0);
$cookie = "/tmp/cookie.txt";
$base_url = "https://talkwin.ct.ws";

// 1. Site par pehle jaakar Token aur Session nikaalna
$ch = curl_init("$base_url/index.php");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_COOKIEJAR, $cookie);
curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows NT 10.0; Win64; x64)");
$response = curl_exec($ch);

// Agar site koi hidden token maang rahi hai toh use dhoondhna
preg_match('/name="token" value="(.*?)"/', $response, $matches);
$token = isset($matches[1]) ? $matches[1] : '';

// 2. Chat Room mein Enter karna (Name aur Age ke saath)
$entryData = [
    'name'   => 'Ankit_Bot', // Aapka Nickname
    'age'    => '25',        // Age
    'gender' => 'Male',
    'token'  => $token,      // Token agar zaroori ho
    'enter'  => 'Enter'
];

curl_setopt($ch, CURLOPT_URL, "$base_url/index.php");
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($entryData));
curl_exec($ch);

// 3. Flood Loop (Delhi Lovers Room)
while(true) {
    $msgData = [
        'msg'  => 'Bot_Testing_Active_🔥', // Aapka message
        'send' => 'Send'
    ];

    $ch2 = curl_init("$base_url/room.php?room=delhi_lovers_");
    curl_setopt($ch2, CURLOPT_POST, true);
    curl_setopt($ch2, CURLOPT_POSTFIELDS, http_build_query($msgData));
    curl_setopt($ch2, CURLOPT_COOKIEFILE, $cookie);
    curl_setopt($ch2, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch2, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows NT 10.0; Win64; x64)");
    
    $res = curl_exec($ch2);
    curl_close($ch2);

    echo "Sent! ";
    usleep(2000000); // 2 second ka gap taaki site ban na kare
}
?>

