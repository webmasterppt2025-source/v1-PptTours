<?php 
   /* if (!isset($_SERVER['HTTPS'])) // Revisar peticion no segura usando HTTPS
    { header("Location:https://www.pptoursperu.com"); } // Redirigir a peticion segura */   

    // incluir recursos de php --> 
    

?>


<!DOCTYPE html>
<!-- Se puede agregar https://xmls//www.w3.org/1999/xhtml --> 
<html lang="es">

<head>

<meta name="viewport" content="width=device-width, initial-scale=1" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link href="estilos/general.css" rel="stylesheet">
<link href="estilos/cabecera.css" rel="stylesheet">
</head>
    
<body>


<?php 
include("recursos/cabecera.php");
?>

<div id="menu-flotante" style="width:100%; background-color:#000000; display:none; position:absolute; top:0; z-index:9999;">
		<div style="position:relative;">
			<center>
				<div style="margin-top:0; padding-top:0; top:0; display:inline-block;">
					<?php include("recursos/menu.php"); ?>
				</div>
			</center>
		</div>
</div>
</body>
<script language="javascript">

    $(function(){

        $('#slider div:gt(0)').hide();

        setInterval(function(){

        $('#slider div:first-child').fadeOut(0)

            .next('div').fadeIn(1000)

            .end().appendTo('#slider');}, 5000);

    });

    $(function(){

        $('#slider-m div:gt(0)').hide();

        setInterval(function(){

        $('#slider-m div:first-child').fadeOut(0)

            .next('div').fadeIn(1000)

            .end().appendTo('#slider-m');}, 5000);

    });

    $(document).ready(function(){

            $('#contenido').hide(0);

            $(window).scroll(function(){

                    var windowHeight = $(window).scrollTop();

                    var contenido = $("#contenido").offset();

                    contenido = contenido.top;

                    if(windowHeight >= contenido  ){

                    $('#contenido').fadeIn(1400);

                    }

                    

                    var st = $(this).scrollTop();

                if (screen.width >= 1024)
                    {
                    if (st < 160)
                    {
                        // downscroll code
                            document.getElementById("menu-flotante").style.display = "none";
                            document.getElementById("botoncito").style.display = "none";
                    } 
                    else
                    {
                        // upscroll code
                            document.getElementById("menu-flotante").style.display = "block";
                            document.getElementById("menu-flotante").style.marginTop = "0";
                            document.getElementById("menu-flotante").style.position = "fixed";
                            document.getElementById("botoncito").style.display = "block";
                    }
                    }
                    if (screen.width < 1024)
                    {
                    if (st < 100)
                    {
                        // downscroll code
                            document.getElementById("menu-flotante-movil").style.display = "none";
                            document.getElementById("botoncito-movil").style.display = "none";
                    } 
                    else
                    {
                        // upscroll code
                            document.getElementById("menu-flotante-movil").style.display = "block";
                            document.getElementById("menu-flotante-movil").style.marginTop = "0";
                            document.getElementById("menu-flotante-movil").style.position = "fixed";
                            document.getElementById("botoncito-movil").style.display = "block";
                    }
                    }

            });

    });

    function aparecer()

    {

            $(".contenido").fadeIn(1000);

    }

</script>

</html>
