<div class="card mt-0 mb-3">
    <div class="card-header" style="background-color:#E6D9FA">
        <div class="row">
            <div class="col-md-12">
                <strong>Adjuntos</strong>
            </div>
        </div>
    </div>
    <div class="card-body p-0">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-12 text-danger">
                    <?php if ($error_adj_consejos): ?>
                    <?php echo $error_adj_consejos?>
                    <?php endif ?>
                </div>
            </div>
            <table class="table table-sm">
                <tbody>
                    <tr>
                        <?php
                        $cve_consejo = $consejos['cve_consejo'] ;
                        $arch_juridico = 'adj_consejos/' . $cve_consejo . '_juridico.pdf';
                        ?>
                        <td>
                            <?php
                            if ( file_exists($arch_juridico) ) { ?>
                            <a href="<?= base_url() ?><?= $arch_juridico ?>" target="_blank">
                                <?php } ?>
                                Soporte jurídico (pdf)
                                <?php
                                if ( file_exists($arch_juridico) ) { ?>
                            </a>
                            <?php } ?>
                        </td>
                        <?php if ($cve_rol == 'usr') { ?>
                        <td>
                            <form method="post" enctype="multipart/form-data" action="<?= base_url() ?>archivos/consejos_juridico">
                                <label class="btn btn-primary btn-sm" for="arch-juridico">
                                    <input name="arch-juridico" id="arch-juridico" type="file" style="display:none"
                                    onchange="$('#arch-juridico-info').removeClass('invisible')">
                                    +
                                </label>
                                <input type="hidden" name="cve_consejo" id="cve_consejo" value="<?= $consejos['cve_consejo'] ?>">
                                <button id="arch-juridico-info" type="submit" class="btn btn-sm invisible" style="background: none; color: #28A745">
                                    <span data-feather="upload"></span>
                                </button>
                            </form>
                        </td>
                        <?php } ?>
                    </tr>
                    <tr>
                        <?php
                        $cve_consejo = $consejos['cve_consejo'] ;
                        $arch_normativa = 'adj_consejos/' . $cve_consejo . '_normativa.pdf';
                        ?>
                        <td>
                            <?php
                            if ( file_exists($arch_normativa) ) { ?>
                            <a href="<?= base_url() ?><?= $arch_normativa ?>" target="_blank">
                                <?php } ?>
                                Normativa (pdf)
                                <?php
                                if ( file_exists($arch_normativa) ) { ?>
                            </a>
                            <?php } ?>
                        </td>
                        <?php if ($cve_rol == 'usr') { ?>
                        <td>
                            <form method="post" enctype="multipart/form-data" action="<?= base_url() ?>archivos/consejos_normativa">
                                <label class="btn btn-primary btn-sm" for="arch-normativa">
                                    <input name="arch-normativa" id="arch-normativa" type="file" style="display:none"
                                    onchange="$('#arch-normativa-info').removeClass('invisible')">
                                    +
                                </label>
                                <input type="hidden" name="cve_consejo" id="cve_consejo" value="<?= $consejos['cve_consejo'] ?>">
                                <button id="arch-normativa-info" type="submit" class="btn btn-sm invisible" style="background: none; color: #28A745">
                                    <span data-feather="upload"></span>
                                </button>
                            </form>
                        </td>
                        <?php } ?>
                    </tr>
                    <tr>
                        <?php
                        $cve_consejo = $consejos['cve_consejo'] ;
                        $arch_extras = 'adj_consejos/' . $cve_consejo . '_extras.zip';
                        ?>
                        <td>
                            <?php
                            if ( file_exists($arch_extras) ) { ?>
                            <a href="<?= base_url() ?><?= $arch_extras ?>" target="_blank">
                                <?php } ?>
                                Extras (zip)
                                <?php
                                if ( file_exists($arch_extras) ) { ?>
                            </a>
                            <?php } ?>
                        </td>
                        <?php if ($cve_rol == 'usr') { ?>
                        <td>
                            <form method="post" enctype="multipart/form-data" action="<?= base_url() ?>archivos/consejos_extras">
                                <label class="btn btn-primary btn-sm" for="arch-extras">
                                    <input name="arch-extras" id="arch-extras" type="file" style="display:none"
                                    onchange="$('#arch-extras-info').removeClass('invisible')">
                                    +
                                </label>
                                <input type="hidden" name="cve_consejo" id="cve_consejo" value="<?= $consejos['cve_consejo'] ?>">
                                <button id="arch-extras-info" type="submit" class="btn btn-sm invisible" style="background: none; color: #28A745">
                                    <span data-feather="upload"></span>
                                </button>
                            </form>
                        </td>
                        <?php } ?>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

