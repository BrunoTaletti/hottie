<?php
include_once("./../models/db_connect.php");

if (!empty($_POST["username"]) && !empty($_POST["email"]) && !empty($_POST["password"])) {

    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = md5($_POST['password']);
    $subscription_plan_id = $_POST['subscription_plan_id'];
    $role = 1;
    $payment_status = 1;

    $verify_query = "SELECT email FROM users WHERE email = '$email'";
    $execute_verify_query = mysqli_query($db_connection, $verify_query);
    $total_verified = mysqli_num_rows($execute_verify_query);
    
    if ($total_verified <= 0) {

        $query = "INSERT INTO users (name, email, password, role, subscription_plan_id, payment_status) VALUES ('$username','$email','$password','$role','$subscription_plan_id','$payment_status')";

        $execute_query = mysqli_query($db_connection, $query);
        $execute_query ? header('Location: ./../views/login.php') : header('Location: ./../views/signup.php');
    } else {
        header('Location: ./../views/signup.php');
        echo "Usuario existente";
    }
} else {
    header('Location: ./../views/signup.php');
    echo "Campos Vazios";
}
