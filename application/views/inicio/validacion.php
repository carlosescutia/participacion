<div class="card mt-3">
    <div class="card-header bg-light">
        <strong>Validación del proceso</strong>
    </div>
    <div class="card-body">
<p>En este apartado se solicita adjuntar un oficio de validación de la alineación documentada de los apartados de “Contribución de responsabilidad estratégica” y “Contribución de corresponsabilidad estratégica” resultado del presente proceso de información por parte del titular de su dependencia o entidad.</p>
        <div class="mt-5">
            <?php 
            $oficio = 'oficios/' . $usuario_clave . '.pdf';
            if ( file_exists($oficio) ) { ?>
            <a href="<?= $oficio ?>" target="_blank"><span><img src="img/pdf_download.png" height="30"></span>Oficio cargado</a>
            <?php } ?>
        </div>
    </div>
    <div class="card-footer text-center">
        <form method="post" enctype="multipart/form-data" action="archivos/enviar">
            <div class="row text-danger">
                <?php if ($error) { 
                echo $error;
                } ?>
            </div>
            <div class="row">
                <div class="col">
                    <a href="<?= base_url() ?>reportes/todos" class="btn btn-primary ml-3 mr-3">Generar informe</a>
                </div>
                <div class="col">
                    <input type="file" class="form-control-file" name="subir_archivo">
                </div>
                <div class="col">
                    <button type="submit" class="btn btn-primary">Enviar oficio e informe de validación</button>
                </div>
            </div>
        </form>
    </div>
</div>

