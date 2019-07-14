<?php 

//require_once "vendor/autoload.php";


    $token="722737572:AAE5u8Ba9SF4TFWyJpAXPOM4LKigLNcYD_I";

$json_update = file_get_contents("php://input");

$array_update = json_decode($json_update,true);

var_dump($array_update);



foreach($array_update['result'] as $key=>$value ){

       //echo $key."<br>";

       if(isset($value['message']['document'])){

        $id_foto=$value['message']['document']['file_id'];

        $json_foto = file_get_contents("https://api.telegram.org/bot" .$token. "/getFile?file_id=" . $id_foto);

        $array_foto = json_decode($json_foto, true);

        $ruta_foto = $array_foto['result']['file_path'];

        $foto = 'https://api.telegram.org/file/bot' . $token . '/' . $ruta_foto;

        

        //echo "<br>".$foto;



       }

       if(isset($value['message']['photo'])){

          // echo "FOTO<br>";

          // var_dump($value['message']['photo']);

        $id_foto=$value['message']['photo'][3]['file_id'];

        $json_foto = file_get_contents("https://api.telegram.org/bot" .$token. "/getFile?file_id=" . $id_foto);

        $array_foto = json_decode($json_foto, true);

        $ruta_foto = $array_foto['result']['file_path'];

        $foto = 'https://api.telegram.org/file/bot' . $token . '/' . $ruta_foto;

        

        //echo "<br>".$foto;



       }

       



}



$image_url = $foto;

$image_file = "local_image1.jpg";

$dir = "img/";          

$fp = fopen($dir . $image_file, "w+");

$ch2 = curl_init($image_url);

curl_setopt($ch2, CURLOPT_FILE, $fp);          

curl_setopt($ch2, CURLOPT_FOLLOWLOCATION, 1);

//curl_setopt($ch2, CURLOPT_TIMEOUT, 10);      

//curl_setopt($ch2, CURLOPT_USERAGENT, 'Mozilla/5.0');

curl_exec($ch2);

curl_close($ch2);                              

fclose($fp);







?>