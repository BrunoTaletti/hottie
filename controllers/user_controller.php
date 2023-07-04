<?php
session_start();

include_once("./../models/db_connect.php");

try{
    $user_id = $_SESSION['user_id'];

if (empty($_SESSION["authenticated"]) || $_SESSION["authenticated"] != 'true') {
    header('Location: ./../views/login.php');
}

if (isset($_GET['logout'])) {
    session_start();

    unset($_SESSION['authenticated']);
    unset($_SESSION['user_id']);
    unset($_SESSION['username']);
    unset($_SESSION['user_email']);

    session_destroy();

    header("Location: ./login.php");

    exit;
}

// CRUD - Read: Dados do usuário
$get_users = "SELECT * FROM users WHERE id = '$user_id'";
$get_user_data = mysqli_query($db_connection, $get_users);
$user_data = $get_user_data->fetch_array();

$role = $user_data['role'];


} catch (Exception $e){
    echo 'Caught exception: ',  $e->getMessage(), "\n";
}

?>