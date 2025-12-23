<?php
set_time_limit(0);
$cookie = __DIR__ . "/cookie.txt"; // Path sahi kiya taaki error na aaye
$base_url = "https://talkwin.ct.ws";

// 1. Site ka main page load karke session start karna
$ch = curl_init("$base_url/index.php");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_COOKIEJAR, $cookie);
curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Linux; Android 10) AppleWebKit/537.36");
curl_exec($ch);

// 2. Chat mein Enter hone ka step (Exactly jaisa site maangti hai)
$entryData = [
    'name'   => 'Ankit_Bot',
    'age'    => '25',
    'gender' => 'Male',
    'enter'  => 'Enter'
];

curl_setopt($ch, CURLOPT_URL, "$base_url/index.php");
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($entryData));
curl_exec($ch);
curl_close($ch);

// 3. Loop jo messages bhejega
while(true) {
    $ch = curl_init("$base_url/room.php?room=delhi_lovers_");
    $msgData = [
        'msg'  => 'System_Testing_' . rand(10,99), // Message har baar badlega taaki spam filter na pakde
        'send' => 'Send'
    ];

    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($msgData));
    curl_setopt($ch, CURLOPT_COOKIEFILE, $cookie);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
    
    $result = curl_exec($ch);
    curl_close($ch);

    echo "Status: Sent! | "; // Render logs mein dikhega
    sleep(3); // 3 second ka gap
}
?>
