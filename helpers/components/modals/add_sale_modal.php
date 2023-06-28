<div class="modal" id="modal">
    <div class="modal-content d-flex center">
        <div class="box bg-white padding-2 m-auto w-40">
            <a class="close" onClick="closeModal()">
                <i class="fa-solid fa-circle-xmark text-red"></i>
            </a>
            <h1 class="title btn-link-blue text-center">Cadastrar Pedido</h1>
            <form action="?add-sale" method="POST" class="form">
                <label>Valor do pedido (R$):</label>
                <input type="text" name="value">
                <label>Serviço:</label>
                <select name="service">
                    <option value="foto">Foto</option>
                    <option value="video">Video</option>
                    <option value="chamada">Chamada</option>
                </select>
                <label>Data da venda:</label>
                <input type="date" name="sale_date">
                <label>Comprovante (URL):</label>
                <input type="text" name="payment_voucher">
                <button type="submit" class="btn btn-block bg-red">Cadastrar</button>
            </form>
        </div>
    </div>
</div>