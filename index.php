<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Floating window with tabs</title>

<style>
/*
This defines the workspace where i place the demo.
*/
#container {
    text-align: left;
    background: #FFF;
    width: 865px;
    margin: 20px auto;
    padding: 20px;
    border-left: 1px solid #CCC;
    border-right: 1px solid #CCC;
    -moz-box-shadow: 0px 0px 10px #BBB;
    -webkit-box-shadow: 0px 0px 10px #BBB;
    box-shadow: 0px 0px 10px #BBB;
}
</style>

</head>
<body>


<div id="container">
    <?php
        if(isset($_POST["sending"])){
            
          echo '  
                   
                   <img id="imgFinal" src="bot.php?&image='.$_POST["image"].'&text='.$_POST["text"].'&text1='.$_POST["text1"].'&text2='.$_POST["text2"].'&plantilla='.$_POST["select"].'". />



                ';
            

        }
    ?>


    <form name="formulario" action="" method="post" class="contactoFormulario" enctype="multipart/form-data">
        <div class="caja"><input type="text" name="text" />Precio del Producto</div>
         <div class="caja"><input type="text" name="text1" />Descripcion Primaria</div>
          <div class="caja"><input type="text" name="text2" />Descripcion Segundaria</div>
           <input type="text" name="image" />
                     <div class="caja"><input type="text" name="select" />plantilla</div>     
        <button class="botonFormulario" type="submit" name="Submit" value="Enviar" />Generate image</button>
        <input type="hidden" name="sending" value="yes" />
    </form>
</div>

</body>
</html>