<?php
require __DIR__ . '/functions1.php';
session_start(); // Стартует новую сессию, либо возобновляет существующую
if (!isUser()){
    header('Location: /0/i.php');
    exit;
}
$delo = $_POST['delo'];
$dt = $_POST['dt'];

$mysqli = mysqli_connect("localhost", "root", "", "test");
$query = "INSERT INTO `delo` (`id`, `delo`, `dt`) VALUES (NULL, '$delo', '$dt')";
$result = mysqli_query($mysqli, $query);

mysqli_close($mysqli);

header('Location: /0/organ.php');
?>