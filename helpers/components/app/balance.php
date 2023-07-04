<section class="w-100 d-inline-flex center padding-2 margin-top-2 b-s-box">
    <div class="bg-green box padding-1 m-sides-1 text-white text-center bold">
        <h1>Saldo Disponível</h1>
        <span>R$ <?php echo !empty($total_comission_approved) ? $total_comission_approved : "0,00"; ?></span>
    </div>
    <div class="bg-blue box padding-1 m-sides-1 text-white text-center bold">
        <h1>Saldo em análise</h1>
        <span>R$ <?php echo !empty($total_pending_comission) ? $total_pending_comission : "0,00"; ?></span>
        </span>
    </div>
</section>