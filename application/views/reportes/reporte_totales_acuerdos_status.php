<div class="card mt-0 mb-3">
    <div class="card-header" style="background-color:#E6D9FA">
        <div class="row">
            <div class="col-md-10">
                <strong>Totales por status</strong>
            </div>
        </div>
    </div>
    <div class="card-body p-0">
        <div class="col-md-12">
            <table class="table table-striped table-sm">
                <thead>
                    <tr>
                        <th scope="col">Status</th>
                        <th scope="col">Número de acuerdos</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($acuerdos_status as $acuerdos_status_item) { ?>
                        <tr>
                            <td><?= $acuerdos_status_item['status'] ?></td>
                            <td><?= $acuerdos_status_item['num_acuerdos'] ?></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
