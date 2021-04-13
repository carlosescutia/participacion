<script>

    $(document).ready(function() {

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

