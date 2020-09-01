<main role="main" class="ml-sm-auto px-4 mb-3 col-print-12">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <div class="col-sm-12 alternate-color">
            <div class="row">
                <div class="col-sm-8 text-left">
                    <h1 class="h2">Estadístico de consejos por calidad de participación</h1>
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
                        <th colspan="2" scope="col"></th>
                        <th class="text-center" colspan="3" scope="col">Calidad de participación</th>
                        <th scope="col"></th>
                    </tr>
                    <tr>
                        <th scope="col">Eje</th>
                        <th scope="col">Ciudadanos</th>
                        <th scope="col">Estratégicos</th>
                        <th scope="col">Tácticos</th>
                        <th scope="col">Operativos</th>
                        <th scope="col">Total consejos</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                        $tot_ciudadanos = 0; 
                        $tot_estrategicos = 0; 
                        $tot_tacticos = 0; 
                        $tot_operativos = 0; 
                        $tot_consejos = 0; 

                        foreach ($estadistico_consejos as $estadistico_consejos_item) { 
                            $tot_ciudadanos += $estadistico_consejos_item['num_ciudadanos'] ;
                            $tot_estrategicos += $estadistico_consejos_item['num_estrategicos'] ;
                            $tot_tacticos += $estadistico_consejos_item['num_tacticos'] ;
                            $tot_operativos += $estadistico_consejos_item['num_operativos'] ;
                            $sum_consejos = $estadistico_consejos_item['num_estrategicos'] + $estadistico_consejos_item['num_tacticos'] + $estadistico_consejos_item['num_operativos'] ;
                            $tot_consejos += $sum_consejos ;
                        ?>
                        <tr>
                            <td class="text-left"><?= $estadistico_consejos_item['nom_eje'] ?></td>
                            <td class="text-center"><?= $estadistico_consejos_item['num_ciudadanos'] ?></td>
                            <td class="text-center"><?= $estadistico_consejos_item['num_estrategicos'] ?></td>
                            <td class="text-center"><?= $estadistico_consejos_item['num_tacticos'] ?></td>
                            <td class="text-center"><?= $estadistico_consejos_item['num_operativos'] ?></td>
                            <td class="font-weight-bold text-center"><?= $sum_consejos ?></td>
                        </tr>
                    <?php } ?>
                        <tr>
                            <td class="font-weight-bold text-left">Total</td>
                            <td class="font-weight-bold text-center"><?= $tot_ciudadanos ?></td>
                            <td class="font-weight-bold text-center"><?= $tot_estrategicos ?></td>
                            <td class="font-weight-bold text-center"><?= $tot_tacticos ?></td>
                            <td class="font-weight-bold text-center"><?= $tot_operativos ?></td>
                            <td class="font-weight-bold text-center"><?= $tot_consejos ?></td>
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
