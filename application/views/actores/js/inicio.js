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

    });

</script>
