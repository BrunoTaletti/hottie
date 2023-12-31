<?php
// Inicia uma sessão via cookies
session_start();

// Adicionamos a conexão com o banco de dados (MVC chamamos de Model)
include_once("./../models/db_connect.php");

// Define o ID do usuário baseado na sessão ativa
$user_id = $_SESSION['user_id'];

// Verifica se o usuário permanece autenticado
if (empty($_SESSION["authenticated"]) || $_SESSION["authenticated"] != 'true') {

    // Caso não esteja, redireciona para a página de login
    header('Location: ./../views/login.php');
}

// Finalizar sessão
if (isset($_GET['logout'])) {

    // Inicia a sessão por garantia
    session_start();

    // Destroi todos os dados armazenados nos cookies de sessão.
    unset($_SESSION['authenticated']);
    unset($_SESSION['user_id']);
    unset($_SESSION['username']);
    unset($_SESSION['cpf']);

    // Destroy os cookies de sessão por completo.    
    session_destroy();

    // Redireciona o usuário para a página de login.
    header("Location: ./login.php");

    exit; // Conclui a operação
}

// CRUD - CREATE: Vendas

// Verifica se existe solicitação na URL (esquema de "rotas" basico)
if (isset($_GET['add-sale'])) {

    // Verifica se os campos desejados não estão vazios
    if (!empty($_POST['value']) || !empty($_POST['service']) || !empty($_POST['payment_voucher'])) {

        // Resgata o ID do usuário
        $seller_id = $user_id;

        // Resgata os dados preenchidos no formulário
        $sale_payment_voucher = $_POST['payment_voucher'];
        $sale_value = $_POST['value'];
        $sale_service = $_POST['service'];
        $observation = $_POST['observation'];

        // Insere os dados na tabela de vendas
        $add_sale_query = "INSERT INTO sales (seller_id, status, value, service, payment_voucher, observation, created_at) VALUES ('$seller_id', 3, '$sale_value', '$sale_service', '$sale_payment_voucher', '$observation', NOW())";
        $add_sale = mysqli_query($db_connection, $add_sale_query);

        // Redireciona o usuário para a aplicação
        header('Location: ./app.php');
    };
}

// CRUD - Read: Dados do usuário

// Procura o usuário na tabela baseado no seu ID de sessão
$get_users = "SELECT * FROM users WHERE id = '$user_id'";
$get_user_data = mysqli_query($db_connection, $get_users); // Executa o pedido
$user_data = $get_user_data->fetch_array(); // Devolve um array contendo todos os dados solicitados na query

// Variavel filtrando do array anterior e armazenando o dado de cargo do usuario
$occupation = $user_data['occupation'];

// CRUD - Read: Vendas do usuário

// Procura todas as vendas que possuem o mesmo ID do usuario
$get_sales = "SELECT * FROM sales WHERE seller_id = '$user_id'";
$get_sales_data = mysqli_query($db_connection, $get_sales);

// CRUD - Read: Comissões do Usuário

// Aprovadas
// Procura todas as vendas que possuem o mesmo ID do usuario e status aprovado
$get_approved_comissions = "SELECT value FROM sales WHERE seller_id = '$user_id' AND status = 1";
$user_approved_comissions = mysqli_query($db_connection, $get_approved_comissions);

while ($approved_comissions_value = $user_approved_comissions->fetch_array()) {
    $total_comission_approved += $approved_comissions_value['value'];
}

// Pendentes
// Procura todas as vendas que possuem o mesmo ID do usuario e status pendente
$get_pending_comissions = "SELECT value FROM sales WHERE seller_id = '$user_id' AND status = 3";
$user_pending_comissions = mysqli_query($db_connection, $get_pending_comissions);

while ($pending_comissions_value = $user_pending_comissions->fetch_array()) {
    $total_pending_comission += $pending_comissions_value['value'];
}
