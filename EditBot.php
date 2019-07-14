<?php
require_once 'download_image.php';

$botToken = "722737572:AAE5u8Ba9SF4TFWyJpAXPOM4LKigLNcYD_I";
$token = $botToken;
$website = "https://api.telegram.org/bot".$botToken;

$update = file_get_contents('php://input');

$update = json_decode($update, TRUE);

$modo = 0;

$chatId = $update["message"]["chat"]["id"];

$chatType = $update["message"]["chat"]["type"];

$userId = $update["message"]['from']['id'];

$firstname = $update["message"]['from']['username'];

if ($firstname=="") {

    $modo=1;

    $firstname = $update["message"]['from']['first_name'];

}

if ($modo == 0) {

    $firstname = "@".$firstname;

}

$message = $update["message"]["text"];

$agg = json_encode($update, JSON_PRETTY_PRINT);



$arr = explode(',',trim($message));

$command = $arr[0];

 

$message = substr(strstr($message," "), 1);

 
       if(isset($update['message']['document'])){
                  $id_foto=$update['message']['document']['file_id'];

        $json_foto = file_get_contents("https://api.telegram.org/bot" .$token. "/getFile?file_id=" . $id_foto);

        $array_foto = json_decode($json_foto, true);

        $ruta_foto = $array_foto['result']['file_path'];

        $foto = 'https://api.telegram.org/file/bot' . $token . '/' . $ruta_foto;
        sendMessage($chatId, "Excelente Ahora necesitamos nos envies los datos asi : /Plantilla,Precio,texto primario, Texto segundario"); 
        
$image_url = $foto;

$image_file = "local.jpg";

$dir = "/";          

$fp = fopen($image_file, "w+");

$ch2 = curl_init($image_url);

curl_setopt($ch2, CURLOPT_FILE, $fp);          

curl_setopt($ch2, CURLOPT_FOLLOWLOCATION, 1);

//curl_setopt($ch2, CURLOPT_TIMEOUT, 10);      

//curl_setopt($ch2, CURLOPT_USERAGENT, 'Mozilla/5.0');

curl_exec($ch2);

curl_close($ch2);                              

fclose($fp);
       }
      
      if(isset($update['message']['photo'])){

          // echo "FOTO<br>";$x=count($array);
$x=count($update['message']['photo']);
$id_foto=$update['message']['photo'][$x-1]['file_id'];

          // var_dump($value['message']['photo']);

       

        $json_foto = file_get_contents("https://api.telegram.org/bot" .$token. "/getFile?file_id=" . $id_foto);

        $array_foto = json_decode($json_foto, true);

        $ruta_foto = $array_foto['result']['file_path'];

        $foto = 'https://api.telegram.org/file/bot' . $token . '/' . $ruta_foto;

        

$image_url = $foto;

$image_file = "local.jpg";

$dir = "/";          

$fp = fopen($image_file, "w+");

$ch2 = curl_init($image_url);

curl_setopt($ch2, CURLOPT_FILE, $fp);          

curl_setopt($ch2, CURLOPT_FOLLOWLOCATION, 1);

//curl_setopt($ch2, CURLOPT_TIMEOUT, 10);      

//curl_setopt($ch2, CURLOPT_USERAGENT, 'Mozilla/5.0');

curl_exec($ch2);

curl_close($ch2);                              

fclose($fp);
 sendMessage($chatId, "Excelente Ahora necesitamos nos envies los datos asi : /Plantilla,Precio,texto primario, Texto segundario"); 


       }




switch ($command) {

    case '/plantilla':

    sendMessage($chatId, "Resultado final: \n\nPrecio: " . $arr[1] . "\nDescripcion: " . $arr[2] . "\nDescripcion2: " . $arr[3] . "\n " . $im."Url: ".$arr[4]);  

$urlsinnada = "https://enfranlygucoma.000webhostapp.com/bot.php?&text=" . $arr[1] . "&text1=" . $arr[2] . "&text2=" . $arr[3] . "&image=" . $arr[4]."&plantilla=0";
$urllista = urlencode($urlsinnada);

    sendPhoto($chatId, $urllista);
        break; 
     case '/plantilla1':

$select=1;

    sendMessage($chatId, "Resultado final: \n\nPrecio: " . $arr[1] . "\nDescripcion: " . $arr[2] . "\nDescripcion2: " . $arr[3] . "\n " . $im."Url: ".$arr[4]);  

$urlsinnada = "https://enfranlygucoma.000webhostapp.com/bot.php?&text=" . $arr[1] . "&text1=" . $arr[2] . "&text2=" . $arr[3] . "&image=" . $arr[4]."&plantilla=1";
$urllista = urlencode($urlsinnada);

    sendPhoto($chatId, $urllista);
        break; 


  case '/plantilla2':


    sendMessage($chatId, "Resultado final: \n\nPrecio: " . $arr[1] . "\nDescripcion: " . $arr[2] . "\nDescripcion2: " . $arr[3] . "\n " . $im."Url: ".$arr[4]);  

$urlsinnada = "https://enfranlygucoma.000webhostapp.com/bot.php?&text=" . $arr[1] . "&text1=" . $arr[2] . "&text2=" . $arr[3] . "&image=" . $arr[4]."&plantilla=2";
$urllista = urlencode($urlsinnada);

    sendPhoto($chatId, $urllista);
        break; 

case '/start':
   sendMessage($chatId,"Bienvenido Recuerda Que debes seguir las instrucciones");
  break;
}
//





//
 

function sendMessage($chatId, $response, $keyboard = NULL){

    if (isset($keyboard)) {

        $teclado = '&reply_markup={"keyboard":['.$keyboard.'], "resize_keyboard":true, "one_time_keyboard":true}';

    }

    $url = $GLOBALS[website].'/sendMessage?chat_id='.$chatId.'&text='.urlencode($response).$teclado;

    file_get_contents($url);

}



function sendPhoto($chatId, $url)

{

    

    $url = $GLOBALS[website] . "/sendPhoto?chat_id=" . $chatId . "&photo=" . $url;

    file_get_contents($url);

    

}

 $stkCallbackResponse = file_get_contents('php://input');
  $logFile = "logs.json";
  $log = fopen($logFile, "a");
  fwrite($log, $stkCallbackResponse);
  fclose($log);

?>