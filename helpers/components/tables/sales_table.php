<table class="w-100 no-footer table display dataTable" id="salesTable">
    <thead>
        <tr class="bold">
            <td>ID</td>
            <td>Status</td>
            <td>Serviço</td>
            <td>Valor</td>
            <td>Data</td>
            <td>Comprovante</td>
            <td>Observação</td>
        </tr>
    </thead>
    <tbody>
        <?php while ($data = $get_sales_data->fetch_array()) { ?>
            <tr>
                <td><?php echo $data['id']; ?></td>
                <td>
                    <?php
                    switch ($data['status']) {
                        case 1:
                            echo "Aprovado";
                            break;
                        case 2:
                            echo "Negado";
                            break;
                        case 3:
                            echo "Pendente";
                            break;
                    }
                    ?>
                </td>
                <td>
                    <?php
                    switch ($data['service']) {
                        case 1:
                            echo "Video Explicito";
                            break;
                        case 2:
                            echo "Chamada de Video";
                            break;
                        case 3:
                            echo "Programa";
                            break;
                    }
                    ?>
                </td>
                <td><?php echo 'R$' . $data['value']; ?></td>
                <td>
                    <?php
                    $get_date = $data['sale_date'];
                    $formated_date = new DateTime($get_date);
                    echo $formated_date->format('d/m/Y');
                    ?>
                </td>
                <td>
                    <a href="<?php echo $data['payment_voucher']; ?>" class="text-red" target="_blank">
                        <i class="fa-solid fa-eye"></i>
                    </a>
                </td>
                <td><?php echo !empty($data['observation']) ? $data['observation'] : "N/A"; ?></td>
            </tr>
        <?php } ?>
    </tbody>
</table>