<script type="text/javascript" src="css/js/jquery.min.js"/></script>
<link rel="alternate" media="only screen and (max-width: 640px)" href="http://m.ioseet.com/">
<link href="css/1.css" rel="stylesheet" type="text/css"/>
<link rel="stylesheet" href="css/jquery.mThumbnailScroller.css">
<!--[if IE 8]>
	<link href="css/1.css" rel="stylesheet" type="text/css"/>
<![endif]-->

<!--[if lt IE 8]>
	<link href="css/1.css" rel="stylesheet" type="text/css" />
<![endif]-->
<link rel="shortcut icon" type="image/x-icon" href="css/favicon.ico"/>

<script>
    $(document).ready(function(){
        $(".custom-input-file input:file").change(function(){
            if($(this).val())
            {

                $(this).parent().find(".files").html($(this).val());
            }else{
                $(this).parent().find(".files").html("Imagen del producto");
            }
        });
    });
    </script>
<script type="text/javascript">
$(document).ready(function() {    
    //Al escribr dentro del input con id="service"
    $('#nombre').keypress(function(){
        //Obtenemos el value del input
        var nombre = $(this).val();        
        var dataString = 'nombre='+nombre;

        //Le pasamos el valor del input al ajax
        $.ajax({
            type: "POST",
            url: "../config/autocomplete.php",
            data: dataString,
            success: function(data) {
                //Escribimos las sugerencias que nos manda la consulta
                $('#suggestions').fadeIn(1000).html(data);
                //Al hacer click en algua de las sugerencias
                $('.suggest-element').live('click', function(){
                    //Obtenemos la id unica de la sugerencia pulsada
                    var id = $(this).attr('id');
                    //Editamos el valor del input con data de la sugerencia pulsada
                    $('#nombre').val($('#'+id).attr('data'));
                    //Hacemos desaparecer el resto de sugerencias
                    $('#suggestions').fadeOut(1000);
                });              
            }
        });
    });              
});    
</script>
