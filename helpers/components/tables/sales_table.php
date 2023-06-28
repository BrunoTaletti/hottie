<table class="w-100 no-footer table display dataTable" id="salesTable">
    <thead>
        <tr class="bold">
            <td>ID</td>
            <td>Data</td>
            <td>Valor</td>
            <td>Serviço</td>
            <td>Comprovante</td>
        </tr>
    </thead>
    <tbody>
        <?php while ($data = $get_sales_data->fetch_array()) { ?>
            <tr>
                <td><?php echo $data['id']; ?></td>
                <td>
                    <?php
                    $get_date = $data['sale_date'];
                    $formated_date = new DateTime($get_date);
                    echo $formated_date->format('d/m/Y');
                    ?>
                </td>
                <td><?php echo 'R$' . $data['value']; ?></td>
                <td><?php echo $data['service']; ?></td>
                <td>
                    <a href="<?php echo $data['payment_voucher']; ?>" class="text-red" target="_blank">
                        <i class="fa-solid fa-eye"></i>
                    </a>
                </td>
            </tr>
        <?php } ?>
    </tbody>
</table>