<?php



if (isset($_COOKIE['log']) && isset($_COOKIE['pass'])) {
    $log = $_COOKIE['log'];
    $pass = $_COOKIE['pass'];
} else {
    $log = "";
    $pass = "";
}
if (isset($_POST["btn"])) {
    if (!empty($_POST["tlogin"]) && !empty($_POST["tPassword"])) {
        if ($_POST["tlogin"] == "Bilal" && $_POST["tPassword"] == "1234") {
            if (isset($_POST["sauvg"])) {
                setcookie("log", $_POST["tlogin"],time()+ 30 * 24 * 60 * 60);
                setcookie("pass", $_POST["tPassword"],time()+  30 * 24 * 60 * 60);
            }
            header("location:User.php");
        }
    }
}
?>
<html>

<head>
    <title>Login</title>
</head>

<body>

    <form action="" method="post">
        Login : <input type="text" name="tlogin" value='<?php echo $log; ?>'><br><br>
        Password : <input type="password" name="tPassword" value='<?php echo $pass ?>'><br><br>
        <input type="checkbox" name="sauvg" value="Sauvgarder"> Sauvgarder<br><br>
        <input type="submit" value="Log In" name="btn">

    </form>
</body>

</html>