<div class="card mt-4 mb-3">
    <div class="card-header" style="background-color:#E6D9FA">
        <div class="row">
            <div class="col-md-9">
                <strong>Adjuntos</strong>
            </div>
            <div class="col-md-3 text-right">
                <strong>Pub</strong>
            </div>
        </div>
    </div>
    <div class="card-body p-0">
        <div class="col-md-12">
            <table class="table table-sm">
                <tbody>
                    <tr>
                        <?php
                        $cve_consejo = $sesiones['cve_consejo'] ;
                        $cve_sesion = $sesiones['cve_sesion'] ;
                        $arch_presentacion = 'adj_sesiones/' . $cve_consejo . '_' . $cve_sesion . '_presentacion.pdf';
                        ?>
                        <td>
                            <?php
                            if ( file_exists($arch_presentacion) ) { ?>
                            <a href="<?= base_url() ?><?= $arch_presentacion ?>" target="_blank">
                                <?php } ?>
                                Presentación
                                <?php
                                if ( file_exists($arch_presentacion) ) { ?>
                            </a>
                            <?php } ?>
                        </td>
                        <?php if ($cve_rol == 'usr') { ?>
                        <td>
                            <form method="post" enctype="multipart/form-data" action="<?= base_url() ?>archivos/presentacion">
                                <label class="btn btn-primary btn-sm" for="arch-presentacion">
                                    <input name="arch-presentacion" id="arch-presentacion" type="file" style="display:none"
                                    onchange="$('#arch-presentacion-info').removeClass('invisible')">
                                    +
                                </label>
                                <input type="hidden" name="cve_consejo" id="cve_consejo" value="<?= $sesiones['cve_consejo'] ?>">
                                <input type="hidden" name="cve_sesion" id="cve_sesion" value="<?= $sesiones['cve_sesion'] ?>">
                                <button id="arch-presentacion-info" type="submit" class="btn btn-sm invisible" style="background: none; color: #28A745">
                                    <span data-feather="upload"></span>
                                </button>
                            </form>
                        </td>
                        <?php } ?>
                        <td>
                            <?php $newvalue = $sesiones['pub_presentacion'] == 1 ? 0 : 1 ; ?>
                            <?php $enlace = "../../../sesiones/actualizar_acceso_adjunto/".$sesiones["cve_sesion"]."/".$sesiones["cve_consejo"]."/pub_presentacion/".$newvalue; ?>
                            <input class="form-check-input" type="checkbox" name="chk_presentacion" id="chk_presentacion" <?php if ($cve_rol == 'usr') { ?>onchange="document.location.href='<?=$enlace?>'"<?php } ?> <?= $sesiones['pub_presentacion'] == '1' ? 'checked' : '' ?>>
                        </td>
                    </tr>
                    <tr>
                        <?php
                        $cve_consejo = $sesiones['cve_consejo'] ;
                        $cve_sesion = $sesiones['cve_sesion'] ;
                        $arch_minuta = 'adj_sesiones/' . $cve_consejo . '_' . $cve_sesion . '_minuta.pdf';
                        ?>
                        <td>
                            <?php
                            if ( file_exists($arch_minuta) ) { ?>
                            <a href="<?= base_url() ?><?= $arch_minuta ?>" target="_blank">
                                <?php } ?>
                                Minuta
                                <?php
                                if ( file_exists($arch_minuta) ) { ?>
                            </a>
                            <?php } ?>
                        </td>
                        <?php if ($cve_rol == 'usr') { ?>
                        <td>
                            <form method="post" enctype="multipart/form-data" action="<?= base_url() ?>archivos/minuta">
                                <label class="btn btn-primary btn-sm" for="arch-minuta">
                                    <input name="arch-minuta" id="arch-minuta" type="file" style="display:none"
                                    onchange="$('#arch-minuta-info').removeClass('invisible')">
                                    +
                                </label>
                                <input type="hidden" name="cve_consejo" id="cve_consejo" value="<?= $sesiones['cve_consejo'] ?>">
                                <input type="hidden" name="cve_sesion" id="cve_sesion" value="<?= $sesiones['cve_sesion'] ?>">
                                <button id="arch-minuta-info" type="submit" class="btn btn-sm invisible" style="background: none; color: #28A745">
                                    <span data-feather="upload"></span>
                                </button>
                            </form>
                        </td>
                        <?php } ?>
                        <td>
                            <?php $newvalue = $sesiones['pub_minuta'] == 1 ? 0 : 1 ; ?>
                            <?php $enlace = "../../../sesiones/actualizar_acceso_adjunto/".$sesiones["cve_sesion"]."/".$sesiones["cve_consejo"]."/pub_minuta/".$newvalue; ?>
                            <input class="form-check-input" type="checkbox" name="chk_minuta" id="chk_minuta" <?php if ($cve_rol == 'usr') { ?>onchange="document.location.href='<?=$enlace?>'"<?php } ?> <?= $sesiones['pub_minuta'] == '1' ? 'checked' : '' ?>>
                        </td>
                    </tr>
                    <tr>
                        <?php
                        $cve_consejo = $sesiones['cve_consejo'] ;
                        $cve_sesion = $sesiones['cve_sesion'] ;
                        $arch_asistencia = 'adj_sesiones/' . $cve_consejo . '_' . $cve_sesion . '_asistencia.pdf';
                        ?>
                        <td>
                            <?php
                            if ( file_exists($arch_asistencia) ) { ?>
                            <a href="<?= base_url() ?><?= $arch_asistencia ?>" target="_blank">
                                <?php } ?>
                                Lista de asistencia
                                <?php
                                if ( file_exists($arch_asistencia) ) { ?>
                            </a>
                            <?php } ?>
                        </td>
                        <?php if ($cve_rol == 'usr') { ?>
                        <td>
                            <form method="post" enctype="multipart/form-data" action="<?= base_url() ?>archivos/asistencia">
                                <label class="btn btn-primary btn-sm" for="arch-asistencia">
                                    <input name="arch-asistencia" id="arch-asistencia" type="file" style="display:none"
                                    onchange="$('#arch-asistencia-info').removeClass('invisible')">
                                    +
                                </label>
                                <input type="hidden" name="cve_consejo" id="cve_consejo" value="<?= $sesiones['cve_consejo'] ?>">
                                <input type="hidden" name="cve_sesion" id="cve_sesion" value="<?= $sesiones['cve_sesion'] ?>">
                                <button id="arch-asistencia-info" type="submit" class="btn btn-sm invisible" style="background: none; color: #28A745">
                                    <span data-feather="upload"></span>
                                </button>
                            </form>
                        </td>
                        <?php } ?>
                        <td>
                            <?php $newvalue = $sesiones['pub_lista_asistencia'] == 1 ? 0 : 1 ; ?>
                            <?php $enlace = "../../../sesiones/actualizar_acceso_adjunto/".$sesiones["cve_sesion"]."/".$sesiones["cve_consejo"]."/pub_lista_asistencia/".$newvalue; ?>
                            <input class="form-check-input" type="checkbox" name="chk_lista_asistencia" id="chk_lista_asistencia" <?php if ($cve_rol == 'usr') { ?>onchange="document.location.href='<?=$enlace?>'"<?php } ?> <?= $sesiones['pub_lista_asistencia'] == '1' ? 'checked' : '' ?>>
                        </td>
                    </tr>
                    <tr>
                        <?php
                        $cve_consejo = $sesiones['cve_consejo'] ;
                        $cve_sesion = $sesiones['cve_sesion'] ;
                        $arch_extras = 'adj_sesiones/' . $cve_consejo . '_' . $cve_sesion . '_extras.zip';
                        ?>
                        <td>
                            <?php
                            if ( file_exists($arch_extras) ) { ?>
                            <a href="<?= base_url() ?><?= $arch_extras ?>" target="_blank">
                                <?php } ?>
                                Extras
                                <?php
                                if ( file_exists($arch_extras) ) { ?>
                            </a>
                            <?php } ?>
                        </td>
                        <?php if ($cve_rol == 'usr') { ?>
                        <td>
                            <form method="post" enctype="multipart/form-data" action="<?= base_url() ?>archivos/extras">
                                <label class="btn btn-primary btn-sm" for="arch-extras">
                                    <input name="arch-extras" id="arch-extras" type="file" style="display:none"
                                    onchange="$('#arch-extras-info').removeClass('invisible')">
                                    +
                                </label>
                                <input type="hidden" name="cve_consejo" id="cve_consejo" value="<?= $sesiones['cve_consejo'] ?>">
                                <input type="hidden" name="cve_sesion" id="cve_sesion" value="<?= $sesiones['cve_sesion'] ?>">
                                <button id="arch-extras-info" type="submit" class="btn btn-sm invisible" style="background: none; color: #28A745">
                                    <span data-feather="upload"></span>
                                </button>
                            </form>
                        </td>
                        <?php } ?>
                        <td>
                            <?php $newvalue = $sesiones['pub_extras'] == 1 ? 0 : 1 ; ?>
                            <?php $enlace = "../../../sesiones/actualizar_acceso_adjunto/".$sesiones["cve_sesion"]."/".$sesiones["cve_consejo"]."/pub_extras/".$newvalue; ?>
                            <input class="form-check-input" type="checkbox" name="chk_extras" id="chk_extras" <?php if ($cve_rol == 'usr') { ?>onchange="document.location.href='<?=$enlace?>'"<?php } ?> <?= $sesiones['pub_extras'] == '1' ? 'checked' : '' ?>>
                        </td>
                    </tr>
                    <tr>
                        <?php
                        $cve_consejo = $sesiones['cve_consejo'] ;
                        $cve_sesion = $sesiones['cve_sesion'] ;
                        $arch_audio = 'adj_sesiones/' . $cve_consejo . '_' . $cve_sesion . '_audio.mp3';
                        ?>
                        <td>
                            <?php
                            if ( file_exists($arch_audio) ) { ?>
                            <a href="<?= base_url() ?><?= $arch_audio ?>" target="_blank">
                                <?php } ?>
                                Audio
                                <?php
                                if ( file_exists($arch_audio) ) { ?>
                            </a>
                            <?php } ?>
                        </td>
                        <?php if ($cve_rol == 'usr') { ?>
                        <td>
                            <form method="post" enctype="multipart/form-data" action="<?= base_url() ?>archivos/audio">
                                <label class="btn btn-primary btn-sm" for="arch-audio">
                                    <input name="arch-audio" id="arch-audio" type="file" style="display:none"
                                    onchange="$('#arch-audio-info').removeClass('invisible')">
                                    +
                                </label>
                                <input type="hidden" name="cve_consejo" id="cve_consejo" value="<?= $sesiones['cve_consejo'] ?>">
                                <input type="hidden" name="cve_sesion" id="cve_sesion" value="<?= $sesiones['cve_sesion'] ?>">
                                <button id="arch-audio-info" type="submit" class="btn btn-sm invisible" style="background: none; color: #28A745">
                                    <span data-feather="upload"></span>
                                </button>
                            </form>
                        </td>
                        <?php } ?>
                        <td>
                            <?php $newvalue = $sesiones['pub_audio'] == 1 ? 0 : 1 ; ?>
                            <?php $enlace = "../../../sesiones/actualizar_acceso_adjunto/".$sesiones["cve_sesion"]."/".$sesiones["cve_consejo"]."/pub_audio/".$newvalue; ?>
                            <input class="form-check-input" type="checkbox" name="chk_audio" id="chk_audio" <?php if ($cve_rol == 'usr') { ?>onchange="document.location.href='<?=$enlace?>'"<?php } ?> <?= $sesiones['pub_audio'] == '1' ? 'checked' : '' ?>>
                        </td>
                    </tr>
                    <tr>
                        <?php
                        $cve_consejo = $sesiones['cve_consejo'] ;
                        $cve_sesion = $sesiones['cve_sesion'] ;
                        $arch_video = 'adj_sesiones/' . $cve_consejo . '_' . $cve_sesion . '_video.mp4';
                        ?>
                        <td>
                            <?php
                            if ( file_exists($arch_video) ) { ?>
                            <a href="<?= base_url() ?><?= $arch_video ?>" target="_blank">
                                <?php } ?>
                                Video
                                <?php
                                if ( file_exists($arch_video) ) { ?>
                            </a>
                            <?php } ?>
                        </td>
                        <?php if ($cve_rol == 'usr') { ?>
                        <td>
                            <form method="post" enctype="multipart/form-data" action="<?= base_url() ?>archivos/video">
                                <label class="btn btn-primary btn-sm" for="arch-video">
                                    <input name="arch-video" id="arch-video" type="file" style="display:none"
                                    onchange="$('#arch-video-info').removeClass('invisible')">
                                    +
                                </label>
                                <input type="hidden" name="cve_consejo" id="cve_consejo" value="<?= $sesiones['cve_consejo'] ?>">
                                <input type="hidden" name="cve_sesion" id="cve_sesion" value="<?= $sesiones['cve_sesion'] ?>">
                                <button id="arch-video-info" type="submit" class="btn btn-sm invisible" style="background: none; color: #28A745">
                                    <span data-feather="upload"></span>
                                </button>
                            </form>
                        </td>
                        <?php } ?>
                        <td>
                            <?php $newvalue = $sesiones['pub_video'] == 1 ? 0 : 1 ; ?>
                            <?php $enlace = "../../../sesiones/actualizar_acceso_adjunto/".$sesiones["cve_sesion"]."/".$sesiones["cve_consejo"]."/pub_video/".$newvalue; ?>
                            <input class="form-check-input" type="checkbox" name="chk_video" id="chk_video" <?php if ($cve_rol == 'usr') { ?>onchange="document.location.href='<?=$enlace?>'"<?php } ?> <?= $sesiones['pub_video'] == '1' ? 'checked' : '' ?>>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
