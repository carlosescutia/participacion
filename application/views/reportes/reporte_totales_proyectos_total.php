<div class="card mt-0 mb-3">
    <div class="card-header" style="background-color:#E6D9FA">
        <div class="row">
            <div class="col-md-10">
                <strong>Total de proyectos o iniciativas</strong>
            </div>
        </div>
    </div>
    <div class="card-body p-0">
        <div class="col-md-12">
            <table class="table table-striped table-sm">
                <thead>
                    <tr>
                        <th scope="col">Total de proyectos o iniciativas</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($total_proyectos as $total_proyectos_item) { ?>
                        <tr>
                            <td><?= $total_proyectos_item['num_proyectos'] ?></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
