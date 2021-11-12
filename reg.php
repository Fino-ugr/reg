<?php 
// Скрипт для регистрации новых пользователей **************
session_start(); // Стартует новую сессию, либо возобновляет существующую, 
// но ВСЁ это только для конкретного пользователя!
// размещается до любого вывода на экран
$_SESSION['login'] = $_POST['login'];
$_SESSION['pass'] = $_POST['pass'];
$_SESSION['e-mail'] = $_POST['e-mail'];
$_SESSION['save'] = $_POST['save'];

$login = $_POST['login'];
$pass = $_POST['pass'];
$email = $_POST['e-mail'];
$save = $_POST['save'];

if (empty($_POST['login']) || empty($_POST['pass']))  
{
    $_SESSION['error'] = ' Вы не ввели имя пользователя или пароль!';
    header('Location: /0/i.php');
    exit;
}

$pass = password_hash($pass, PASSWORD_DEFAULT);
// на всякий случай подключаем наши функции
require __DIR__ . '/functions.php';

// далее пишем скрипт регистрации нового пользователя
// данные пользователя будем писать в Базу данных на MySQL
// соответственно и функцию CheckLoginPassword доработал для проверки наличия пользователя Базе данных

// а вот уже и регистрация нового пользователя с записью в Базу данных
$mysqli = mysqli_connect("localhost", "root", "", "test");
$query = "INSERT INTO `user` (`id`, `login`, `pass`, `e-mail`) VALUES (NULL, '$login', '$pass', '$email')";
$result = mysqli_query($mysqli, $query);
mysqli_close($mysqli);
echo '<br>';
/*header('Location: /0/i-osn.php');
exit;*/
                                       // var_dump($_SESSION);
//var_dump($pass);
?>

<!DOCTYPE html>
<html>
    <head>
<title>  Сайт </title>
<meta charset="utf-8">
<meta name="PROBA">
<meta http-equiv="Content-Type" content="text/html">
    </head>
<body>    
   
Вы успешно прошли регистрацию!

<?php //echo "Текущее время:" . time();  
?>
<br>
<?php
// var_dump($_COOKIE);
//var_dump($_SESSION);

?>
</body>
</html>
