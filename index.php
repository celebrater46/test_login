<?php

require_once "init.php";

session_start();

$err_msg = [
    "email" => "",
    "password" => ""
];

if (!empty($_POST)) {
    $user_email = $_POST['email'];
    $user_password = $_POST['password'];

    if ($user_email === '') {
        $err_msg['email'] = 'Please input your email.';
    }
    if (strlen($user_email) > 255) {
        $err_msg['email'] = 'Please input your email within 255 chars.';
    }
    if ($user_password === '') {
        $err_msg['password'] = 'Please input your password.';
    }
    if (strlen($user_password) > 255 || strlen($user_password) < 5) {
        $err_msg['password'] = 'Please input your password 6 to 255 chars.';
    }
    if (!preg_match("/^[a-zA-Z0-9]+$/", $user_password)) {
        $err_msg['password'] = 'Please input your password in alphanumerical.';
    }

    if($err_msg["email"] === "" && $err_msg["password"] === ""){
        if(EMAIL === $user_email && PASSWORD === $user_password){
            $_SESSION['email'] = $user_email;
            header('Location: mypage.php');
            exit;
        }else{
            $err_msg['email'] = 'Either the email or password is incorrect.';
        }
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>test login</title>
</head>
<body>
    <h1>Test Login</h1>
    <form action="" method="post">
        <div class="err_msg"><?php echo $err_msg['email']; ?></div>
        <label for="">
            <span>メールアドレス</span>
            <input type="email" name="email" id=""><br>
        </label>
        <div class="err_msg"><?php echo $err_msg['password']; ?></div>
        <label for=""><span>パスワード</span>
            <input type="password" name="password" id=""><br>
        </label>
        <input type="submit" value="送信">
    </form>
</body>
</html>