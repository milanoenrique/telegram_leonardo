<?php
$target_path = "./img";
$target_path = $target_path . basename( $_FILES['imagenes']['name']); 

if(move_uploaded_file($_FILES['imagenes']['tmp_name'], $target_path)) { echo "El archivo ". basename( $_FILES['imagenes']['name']). " ha sido subido";
} else{
echo "Ha ocurrido un error, trate de nuevo!";
}
?>