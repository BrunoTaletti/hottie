<div class="modal" id="modal">
    <div class="modal-content d-flex center">
        <div class="box bg-white padding-2 m-auto w-40">
            <a class="close" onClick="closeModal()">
                <i class="fa-solid fa-circle-xmark text-red"></i>
            </a>
            <h1 class="title btn-link-blue text-center">Cadastrar Pedido</h1>
            <form action="?add-sale" method="POST" class="form">
                <label>
                    <a href="#"><i class="fa-solid fa-circle-question text-blue"></i></a>
                    Comprovante de Pagamento:
                </label>
                <input type="text" name="payment_voucher" placeholder="Ex: https://imgur.com.br/5pKpLa23">
                <label>Valor total:</label>
                <input type="number" name="value" placeholder="R$">
                <label>Serviço:</label>
                <select name="service">
                    <option selected disabled>Selecionar</option>
                    <option value="1">Video Explicito</option>
                    <option value="2">Chamada de Video</option>
                    <option value="3">Programa</option>
                </select>
                <label>
                    <a href="#"><i class="fa-solid fa-circle-question text-blue"></i></a>
                    Observação:
                </label>
                <input type="text" name="observation">
                <button type="submit" class="btn btn-block bg-blue">Cadastrar</button>
            </form>
        </div>
    </div>
</div>