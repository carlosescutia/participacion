<main role="main" class="ml-sm-auto px-4 mb-3">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1>Reportes</h1>
    </div>
    <div class="col-md-12">
        <div class="row">
            <div class="col-md-6">
                <h3>Listados</h3>
                <?php if (in_array('04100', $accesos_sistema_rol)) include "btn_reporte_actores_01.php"; ?>
                <?php if (in_array('04101', $accesos_sistema_rol)) include "btn_listado_actores_02.php" ?>
                <?php if (in_array('04100', $accesos_sistema_rol)) include "btn_reporte_consejos_01.php"; ?>
                <?php if (in_array('04100', $accesos_sistema_rol)) include "btn_listado_consejos_02.php"; ?>
                <?php if (in_array('04100', $accesos_sistema_rol)) include "btn_reporte_proyectos_01.php"; ?>
            </div>
            <div class="col-md-6">
                <h3>Estadísticos</h3>
                <?php if (in_array('04200', $accesos_sistema_rol)) include "btn_reporte_totales_acuerdos.php"; ?>
                <?php if (in_array('04200', $accesos_sistema_rol)) include "btn_reporte_totales_proyectos.php"; ?>
                <?php if (in_array('04200', $accesos_sistema_rol)) include "btn_estadistico_consejos_01.php"; ?>
                <?php if (in_array('04200', $accesos_sistema_rol)) include "btn_estadistico_actores_01.php" ?>
            </div>
        </div>
    </div>
</main>
