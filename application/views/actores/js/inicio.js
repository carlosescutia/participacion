<script>

    $(document).ready(function() {

        $('#filtro_actores')
            .change(function() {
                var filter = $(this).val();
                if(filter) {
                    // this finds all items in a list that contain the input,
                    // and hide the ones not containing the input while showing the ones that do
                    $(lista_actores).find("span:not(:Contains(" + filter + "))").parent().hide();
                    $(lista_actores).find("span:Contains(" + filter + ")").parent().show();
                } else {
                    $(lista_actores).find("li").show();
                }
                return false;
            })
            .keyup(function(e) {
                if (e.keyCode == 27) { // escape key maps to keycode '27'
                    $(this).val('');
                }
                // fire the above change event after every letter
                $(this).change();
            });

            
        $('#cve_tipo')
            .change(function() {
                if ( $(this).val() == '2' ) {
                    $('#otros_espacios').addClass('border-info');
                    $('#experiencia_exitosa').addClass('border-info');
                    $('#fecha_experiencia_exitosa').addClass('border-info');
                    $('#desea_colaborar').addClass('border-info');
                    $('#profesion').addClass('border-info');
                    $('#perfil').addClass('border-info');
                } else {
                    $('#otros_espacios').removeClass('border-info');
                    $('#experiencia_exitosa').removeClass('border-info');
                    $('#fecha_experiencia_exitosa').removeClass('border-info');
                    $('#desea_colaborar').removeClass('border-info');
                    $('#profesion').removeClass('border-info');
                    $('#perfil').removeClass('border-info');
                }
            });

        $('#cve_tipo').change();

        $('#cve_ambito').change(function(){ 
            var cve_ambito=$(this).val();
            var url=window.location.origin+"/participacion/sectores/get_sectores_ambito/"+cve_ambito;
            $.ajax({
                url : url,
                method : "POST",
                async : true,
                dataType : 'json',
                success: function(data){

                    var html = '<option value=""></option>';
                    var i;
                    for(i=0; i<data.length; i++){
                        html += '<option value='+data[i].cve_sector+'>'+data[i].nom_sector+'</option>';
                    }
                    $('#cve_sector').html(html);

                },
                error: function(e){
                }
            });
            return false;
        }); 

    });

</script>
