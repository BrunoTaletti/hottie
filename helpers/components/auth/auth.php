<div class="box bg-white padding-2 m-auto w-40">
    <form action="./../controllers/auth_controller.php" method="POST" class="form">
        <label>Email:</label>
        <input type="email" name="email">
        <label>Senha:</label>
        <input type="password" name="password">
        <button type="submit" class="btn btn-block bg-red">Acessar</button>
        <p class="text-center bold margin-top-1">Novo no Hottie? <br> Crie uma conta
            <a href="./../views/signup.php" class="btn-link text-red">
                aqui
            </a>
            .
        </p>
    </form>
</div>