<div class="card mt-0 mb-3">
    <div class="card-header" style="background-color:#E6D9FA">
        <div class="row">
            <div class="col-md-10">
                <strong>Total de acuerdos</strong>
            </div>
        </div>
    </div>
    <div class="card-body p-0">
        <div class="col-md-12">
            <table class="table table-striped table-sm">
                <thead>
                    <tr>
                        <th scope="col">Total de acuerdos</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($total_acuerdos as $total_acuerdos_item) { ?>
                        <tr>
                            <td><?= $total_acuerdos_item['num_acuerdos'] ?></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
