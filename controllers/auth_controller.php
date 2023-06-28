<?php
// Adicionamos a conexão com o banco de dados
include_once("./../models/db_connect.php");

// Verfica se os campos desejados não estão vazios
if (!empty($_POST["cpf"]) && !empty($_POST["password"])) {

    // Resgata os dados informados no formulário de login
    $cpf = $_POST["cpf"];
    $password = md5($_POST["password"]); // Encripta a senha digitada em MD5 para que possa ser comparada a cadastrada no banco

    // Verifica se os dados do usuário existem e se batem com os do banco de dados
    $query = "SELECT * FROM users WHERE cpf = '$cpf' AND password = '$password'";
    $result = mysqli_query($db_connection, $query);

    // Conta o total de linhas recebidas na consulta realizada
    $total = mysqli_num_rows($result);

    // Se encontrar linhas na consulta então existe usuário.
    if ($total) {

        // Inicia uma sessão via cookies
        session_start();

        // Executa a pesquisa no array de usuários do controller e popula as variaveis com os dados desejados
        $get_user_data = $result->fetch_array();
        $user_id = $get_user_data['id'];
        $user_name = $get_user_data['name'];
        $user_cpf = $get_user_data['cpf'];

        // Armazena os dados desejados nos cookies de sessão para que possam ser utilizados futuramente
        $_SESSION["authenticated"] = 'true';
        $_SESSION["user_id"] = $user_id;
        $_SESSION["username"] = $user_name;
        $_SESSION["cpf"] = $user_cpf;

        // Atualiza o campo 'active_at' com a data e hora atual para que possa acompanhar a ultima vez que o usuário esteve ativo
        $query = "UPDATE users SET active_at = NOW() WHERE id = '$user_id'";
        $result = mysqli_query($db_connection, $query);

        // Redireciona para a aplicação
        header('Location: ./../views/app.php');
    } else {

        // Caso o usuário não exista, redireciona para a tela de login
        header('Location: ./../views/login.php');
    }
} else {
    // Se os dados estão vazios, redirecioan para a tela de login
    header('Location: ./../views/login.php');
}
