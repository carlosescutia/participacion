<main role="main" class="ml-sm-auto px-4 mb-3 col-print-12">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <div class="col-sm-12 alternate-color">
            <div class="row">
                <div class="col-sm-8 text-left">
                    <h1 class="h2">Reporte de Proyectos</h1>
                </div>
                <div class="col-sm-4 text-right">
					<a href="javascript:window.print()" class="btn btn-primary">Generar pdf</a>
                </div>
            </div>
        </div>
    </div>

    <div class="col-sm-8" style="min-height: 46vh">
        <?php include 'reporte_totales_proyectos_preparacion.php' ?>
        <?php include 'reporte_totales_proyectos_plazo.php' ?>
        <?php include 'reporte_totales_proyectos_atingencia.php' ?>
        <?php include 'reporte_totales_proyectos_total.php' ?>
    </div>

    <div class="form-group row">
        <div class="col-sm-10">
            <a href="<?=base_url()?>reportes/lista" class="btn btn-secondary">Volver</a>
        </div>
    </div>

</main>
