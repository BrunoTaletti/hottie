<div class="box bg-white padding-2 m-auto w-40">
    <form action="./../controllers/user_register_controller.php" method="POST" class="form">
        <label>Nome:</label>
        <input type="text" name="username">
        <label>Email:</label>
        <input type="email" name="email">
        <label>Senha:</label>
        <input type="password" name="password">
        <label>Plano:</label>
        <select name="subscription_plan_id">
            <option value="1">Silver</option>
            <option value="2">Gold</option>
            <option value="3">Diamond</option>
        </select>
        <button type="submit" class="btn btn-block bg-red">Registrar</button>
    </form>
    <p class="text-center bold margin-top-1">Já possui uma conta? <br>
        <a href="./../views/login.php" class="btn-link text-red">Acesse agora</a>.
    </p>
</div>