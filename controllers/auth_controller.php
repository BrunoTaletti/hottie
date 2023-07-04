<?php
include_once("./../models/db_connect.php");

if (!empty($_POST["email"]) && !empty($_POST["password"])) {

    $email = $_POST["email"];
    $password = md5($_POST["password"]);
    
    $query = "SELECT * FROM users WHERE email = '$email' AND password = '$password'";
    $result = mysqli_query($db_connection, $query);

    $total = mysqli_num_rows($result);

    if ($total) {
        session_start();

        $get_user_data = $result->fetch_array();
        $user_id = $get_user_data['id'];
        $user_name = $get_user_data['name'];
        $user_email = $get_user_data['email'];

        $_SESSION["authenticated"] = 'true';
        $_SESSION["user_id"] = $user_id;
        $_SESSION["username"] = $user_name;
        $_SESSION["email"] = $user_email;

        $query = "UPDATE users SET active_at = NOW() WHERE id = '$user_id'";
        $result = mysqli_query($db_connection, $query);

        header('Location: ./../views/app.php');
    } else {
        header('Location: ./../views/login.php');
    }
} else {
    header('Location: ./../views/login.php');
}
