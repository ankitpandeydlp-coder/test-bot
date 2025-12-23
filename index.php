<?php
set_time_limit(0);
$cookie = __DIR__ . "/cookie.txt";
$base_url = "https://talkwin.ct.ws";

$ch = curl_init();
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_COOKIEJAR, $cookie);
curl_setopt($ch, CURLOPT_COOKIEFILE, $cookie);
curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Linux; Android 10)");
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);

// STEP 1: Main Page par Details bharna
curl_setopt($ch, CURLOPT_URL, "$base_url/index.php");
$step1Data = [
    'uname'  => 'Ankit', 
    'gender' => 'Male', 
    'age'    => '30', 
    'smilie' => 'yes', 
    'color'  => 'Black', 
    'enter'  => 'Enter'
];
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($step1Data));
curl_exec($ch);

// STEP 2: Welcome Page wala "Enter"
curl_setopt($ch, CURLOPT_URL, "$base_url/welcome.php"); 
curl_setopt($ch, CURLOPT_POSTFIELDS, "enter=Enter");
curl_exec($ch);

// STEP 3: Tamil Room Select karna
curl_setopt($ch, CURLOPT_URL, "$base_url/rooms.php?room=tamil_lovers_");
curl_exec($ch);

// STEP 4: Flood Loop (Tamil Room mein message bhejra)
while(true) {
    $ch2 = curl_init("$base_url/room.php?room=tamil_lovers_");
    $msgData = [
        'msg'  => 'Tamil_Room_Bot_Active_' . rand(1,99), 
        'send' => 'Send'
    ];
    curl_setopt($ch2, CURLOPT_POST, true);
    curl_setopt($ch2, CURLOPT_POSTFIELDS, http_build_query($msgData));
    curl_setopt($ch2, CURLOPT_COOKIEFILE, $cookie);
    curl_setopt($ch2, CURLOPT_RETURNTRANSFER, true);
    curl_exec($ch2);
    curl_close($ch2);
    
    echo "Status: Sent to Tamil Room! | ";
    sleep(3); 
}
?>
