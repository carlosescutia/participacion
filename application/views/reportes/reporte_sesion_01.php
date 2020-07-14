<main role="main" class="ml-sm-auto px-4 mb-3 col-print-12">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <div class="col-sm-12 alternate-color">
            <div class="row">
                <div class="col-sm-8 text-left">
                    <h1 class="h2">Nota informativa</h1>
                </div>
                <div class="col-sm-4 text-right">
					<a href="javascript:window.print()" class="btn btn-primary">Generar pdf</a>
                </div>
            </div>
        </div>
    </div>

    <div style="min-height: 46vh">

        <!-- Encabezado -->
        <div class="row">
            <div class="col-md-12">
                <h4><?=$consejo['nom_consejo']?> (<?=$consejo['siglas']?>)</h4>
                <h5>Sesión <?=$sesion['num_sesion']?> <?= $sesion['tipo'] == 'o' ? 'ordinaria' : 'extraordinaria' ?>, <?=$sesion['lugar']?>, <?= date('d/m/y', strtotime($sesion['fecha'])) ?> - Documentador: <?=$usuario_nombre ?></h5>
                <br />
            </div>
        </div>

        <?php include 'reporte_sesion_01_asistencia.php' ?>
        <?php include 'reporte_sesion_01_orden.php' ?>
        <?php include 'reporte_sesion_01_acuerdos.php' ?>
        <?php include 'reporte_sesion_01_proyectos.php' ?>
        <?php include 'reporte_sesion_01_solicitudes.php' ?>
        <?php include 'reporte_sesion_01_comentarios.php' ?>
    </div>

    <hr />

    <div class="form-group row">
        <div class="col-sm-10">
            <a href="<?=base_url()?>sesiones/detalle/<?=$acuerdos_sesion[0]['cve_sesion'] ?>/<?=$acuerdos_sesion[0]['cve_consejo'] ?>" class="btn btn-secondary">Volver</a>
        </div>
    </div>

</main>
