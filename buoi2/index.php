<?php


//cookie
#lưu ở phía người dùng
#dùng cho những thông tin ít quan trọng


$cookieName = "user";
$cookieValue = "TamTam";

// 86400 = 30 days
//setcookie($cookieName, $cookieValue, time() +(86400), "/" );

if(isset($_COOKIE[$cookieName])){
    echo "ck đã tồn tại";
}
else{
    echo "ck chưa tồn tại";
}

//session
#thông tin đăng nhập, giỏ hàng, ...
session_start();
$_SESSION["name"] = "Tâm Tâm";

echo $_SESSION["name"];

?>