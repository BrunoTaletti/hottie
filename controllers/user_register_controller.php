<?php
// Inclui o arquivo de conexão do banco de dados para que possam ser feitas consultas.
include_once("./../models/db_connect.php");

// Verifica se os campos estão preenchidos e caso estejam execute:
if (!empty($_POST["username"]) && !empty($_POST["password"]) && !empty($_POST["CPF"])) {

    // Resgata os dados informados no input do formulario.
    $username = $_POST['username'];
    $password = md5($_POST['password']); // Encripta a senha em MD5 por segurança.
    $CPF = $_POST['CPF'];
    $occupation = "Atendente"; // Dado inserido aqui no backend, sem puxar do formulario

    // Verifica se já existe um usuário com o mesmo CPF no banco de dados.
    $verify_query = "SELECT cpf FROM users WHERE cpf = '$CPF'"; // Consulta desejada
    $execute_verify_query = mysqli_query($db_connection, $verify_query); // Pedimos a execucao da consulta
    $total_verified = mysqli_num_rows($execute_verify_query); // Verifica o número de linhas retornadas

    // Verificar se o numero de linhas de registro for menor ou igual a zero entao não existe usuarios logo pode prosseguir
    if ($total_verified <= 0) {
        $query = "INSERT INTO users (name, password, cpf, occupation, created_at) VALUES ('$username', '$password', '$CPF', '$occupation', NOW())";
        $execute_query = mysqli_query($db_connection, $query);

        // Equação ternária: VARIAVEL ? VERDADEIRO : FALSO
        // Abreviacao de IF e ELSE padrão, normalmente utilizamos quando queremos verificar algo simples
        $execute_query ? header('Location: ./../views/login.php') : header('Location: ./../views/signup.php');
    } else {
        // Se o numero for maior que zero, logo existe usuario com esse CPF entao retorne a pagina de cadastro
        header('Location: ./../views/signup.php');
        echo "Usuario existente";
    }
} else {
    // Se não caso os campos estejam vazios, retorne para a página de registro.
    header('Location: ./../views/signup.php');
    echo "Campos Vazios";
}
