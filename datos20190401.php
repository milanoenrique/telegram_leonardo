<?php

$botToken = "722737572:AAE5u8Ba9SF4TFWyJpAXPOM4LKigLNcYD_I";

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


}

 

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



?>