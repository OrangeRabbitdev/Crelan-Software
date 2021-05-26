$(document).ready(Principal);
    function Principal(){

        $(document).on('keydown','[id=clave]',function(e){

            var key = event.which || event.keyCode || event.charCode;

            if($(this).val().length >= 1) {

                if(key == 8 || key == 16 || key == 20 || key == 17 || key == 35 || key == 36){
                    return;
                }

                $(this).val($(this).val()+" | ");


            }
        });
    }