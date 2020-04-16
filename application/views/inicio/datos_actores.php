<div class="card mt-0 mb-3">
    <div class="card-header text-center" style="background-color:#E6D9FA">
        <strong>Actores</strong>
    </div>
    <div class="card-body p-0">
        <div class="col-md-12">
            <table class="table table-sm text-center">
                <tr>
                    <td colspan="2" rowspan="2">
                        <h1 class="display-1 mb-0 pb-0"><?= $estadisticas_actores['registrados'] ?></h1>
                        <p class="mt-0 pt-0">registrados</p>
                    </td>
                    <td>
                        <h1 class="mb-0 pb-0"><?= $estadisticas_actores['activos'] ?></h1>
                        <p class="mt-0 pt-0">activos</p>
                    </td>
                </tr>
                <tr>
                    <td>
                        <h1 class="mb-0 pb-0"><?= $estadisticas_actores['inactivos'] ?></h1>
                        <p class="mt-0 pt-0">inactivos</p>
                    </td>
                </tr>
                <tr>
                    <td>
                        <h1 class="mb-0 pb-0"><?= $estadisticas_actores['consejeros'] ?></h1>
                        <p class="mt-0 pt-0">consejeros</p>
                    </td>
                    <td>
                        <h1 class="mb-0 pb-0"><?= $estadisticas_actores['colaboradores'] ?></h1>
                        <p class="mt-0 pt-0">colaboradores</p>
                    </td>
                </tr>
            </table>
        </div>
    </div>
</div>
