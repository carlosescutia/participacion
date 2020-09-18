<main role="main" class="ml-sm-auto px-4 mb-3 col-print-12">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <div class="col-sm-12 alternate-color">
            <div class="row">
                <div class="col-sm-8 text-left">
                    <h1 class="h2">Estadístico de actores sociales por sector</h1>
                </div>
                <div class="col-sm-4 text-right">
					<a href="javascript:window.print()" class="btn btn-primary">Generar pdf</a>
                </div>
            </div>
        </div>
    </div>

    <div class="col-sm-8" style="min-height: 46vh">
        <div class="col-md-12">
            <table class="table table-striped table-sm">
                <thead>
                    <tr>
                        <th scope="col">Eje</th>
                        <th scope="col">Académico</th>
                        <th scope="col">Organismo social</th>
                        <th scope="col">Empresario</th>
                        <th scope="col">Ciudadano independiente</th>
                        <th scope="col">Total eje</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                        $tot_academico = 0;
                        $tot_empresarial = 0;
                        $tot_organismo_social = 0;
                        $tot_ciudadano_independiente = 0;
                        $tot_eje = 0; 

                        foreach ($estadistico_actores as $estadistico_actores_item) { 
                            $tot_academico += $estadistico_actores_item['num_academico'] ;
                            $tot_empresarial += $estadistico_actores_item['num_empresarial'] ;
                            $tot_organismo_social += $estadistico_actores_item['num_organismo_social'] ;
                            $tot_ciudadano_independiente += $estadistico_actores_item['num_ciudadano_independiente'] ;
                            $sum_eje = $estadistico_actores_item['num_academico'] + $estadistico_actores_item['num_empresarial'] + $estadistico_actores_item['num_organismo_social'] + $estadistico_actores_item['num_ciudadano_independiente'];
                            $tot_eje += $sum_eje ;
                        ?>
                        <tr>
                            <td class="text-left"><?= $estadistico_actores_item['nom_eje'] ?></td>
                            <td class="text-center"><?= $estadistico_actores_item['num_academico'] ?></td>
                            <td class="text-center"><?= $estadistico_actores_item['num_empresarial'] ?></td>
                            <td class="text-center"><?= $estadistico_actores_item['num_organismo_social'] ?></td>
                            <td class="text-center"><?= $estadistico_actores_item['num_ciudadano_independiente'] ?></td>
                            <td class="font-weight-bold text-center"><?= $sum_eje ?></td>
                        </tr>
                    <?php } ?>
                        <tr>
                            <td class="font-weight-bold text-left">Total</td>
                            <td class="font-weight-bold text-center"><?= $tot_academico ?></td>
                            <td class="font-weight-bold text-center"><?= $tot_empresarial ?></td>
                            <td class="font-weight-bold text-center"><?= $tot_organismo_social ?></td>
                            <td class="font-weight-bold text-center"><?= $tot_ciudadano_independiente ?></td>
                            <td class="font-weight-bold text-center"><?= $tot_eje ?></td>
                        </tr>
                </tbody>
            </table>
    </div>

    <div class="form-group row">
        <div class="col-sm-10">
            <a href="<?=base_url()?>reportes/lista" class="btn btn-secondary">Volver</a>
        </div>
    </div>

</main>

