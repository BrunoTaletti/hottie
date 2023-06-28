<section class="w-50 d-flex flex-column center m-auto padding-2 shadow box text-white">
    <div class="w-100 d-inline-flex center text-center">
        <h1 class="m-0 m-sides-auto">VENDAS REALIZADAS</h1>
        <a onclick="openModal()" class="pointer"><i class="fa-solid fa-circle-plus text-green font-25"></i></a>
    </div>
    <div class="w-100 margin-top-2">
        <?php include("./../helpers/components/tables/sales_table.php") ?>
    </div>
</section>