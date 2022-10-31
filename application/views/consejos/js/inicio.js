<script>

    $(document).ready(function() {

		$('#btn_editar_consejos').click(function(){
            $('#btn_editar_consejos').addClass("d-none");
            $('#btn_guardar_consejos').removeClass("d-none");
            $('#nom_consejo').prop('readonly', false);
            $('#siglas').prop('readonly', false);
            $('#cve_tipo').prop('disabled', false);
            $('#cve_eje').prop('disabled', false);
            $('#soporte_juridico').prop('readonly', false);
            $('#reglamento_interno').prop('disabled', false);
            $('#sesiones_anuales').prop('readonly', false);
            $('#fecha_instalacion').prop('readonly', false);
            $('#participacion_ciudadana').prop('disabled', false);
            $('#status').prop('disabled', false);
            $('#motivo_inactivo').prop('readonly', false);
            $('#aspectos_destacados').prop('readonly', false);
            $('#fecha_reglamento').prop('readonly', false);
            $('#periodo_inicio').prop('readonly', false);
            $('#periodo_fin').prop('readonly', false);
            $('#integracion').prop('disabled', false);
            $('#cve_calidad').prop('disabled', false);
        });

		$('#btn_guardar_consejos').click(function(){
            $('#btn_guardar_consejos').addClass("d-none");
            $('#btn_editar_consejos').removeClass("d-none");
        });

		$('#status').change(function(){
			var status=$(this).val();
			if (status == '0') {
				$('#dv_datos_inactivo').removeClass("d-none");
			} else {
				$('#dv_datos_inactivo').addClass("d-none");
			}
		});

		$('#status').change();

    });

</script>

