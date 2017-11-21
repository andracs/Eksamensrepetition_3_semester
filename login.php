<?php
//unset($_COOKIE[user]);
//setcookie("user", "", time() - 3600);
$brugernavn = $_GET['name'];
$kodeord = $_GET['password'];
if($brugernavn && $kodeord) {
    if ($brugernavn == "A" && $kodeord=="a") {
        echo "Du er logget ind!";
        $cookie_name = "user";
        $cookie_value = "A";
        setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/");
    }
}
?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
<form action="login.php" method="get">
    <label>Brugernavn</label>
    <input type="text" name="name" >
    <label>Kodeord</label>
    <input type="password"  name="password">
    <button>Log ind</button>
</form>

<?php
var_dump($_COOKIE);
echo "<hr>";
if(isset($_COOKIE["user"])) {
     echo "Du er logget ind, ".$_COOKIE["user"]. "!";
 }
?>

</body>
</html>