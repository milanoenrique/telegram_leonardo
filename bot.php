<?php







$plantilla = $_GET["plantilla"];
$imgplanti = imagecreatefromjpeg("./plantilla1.jpg");

$imgplanti2 = imagecreatefromjpeg("./plantilla2.jpg");
$text = $_GET["text"];
$im2 = imagecreatefromjpeg("./local.jpg");
$x= 50;
$y;
$ancho;
$alto;
if ($plantilla==0) {
	if (imagesx($im2)== imagesy($im2) ) {
	$im2 = imagescale($im2, 450,450);
	$y=5;
										}

if (imagesx($im2) > imagesy($im2)) {
	$ancho = imagesx($im2);	
	$alto = imagesy($im2);
	$total = $ancho - $alto;
	if ($total < 100 ) {
	    while ($ancho >= 600) {
		$ancho = $ancho -1;
		$alto = $alto -0.9;
						   }
		}
		if ($total < 250 && $total > 100) {
	    while ($ancho >= 550) {
		$ancho = $ancho -1;
		$alto = $alto -0.7;
						   }
		}else{
	 while ($ancho >= 550) {
		$ancho = $ancho -1;
		$alto = $alto -0.55;
					$y= 50;	   }
		}	
    $im2 = imagescale($im2, $ancho,$alto);
								   }

if (imagesx($im2) < imagesy($im2) ) {
    $ancho = imagesx($im2);	
	$alto = imagesy($im2);
	while ($alto > 440) {
		$ancho = $ancho -0.9;
		$alto = $alto -1;
	}



$im2 = imagescale($im2, $ancho,$alto);
$x = 70;
$y=5;


}
}else{


if (imagesx($im2)== imagesy($im2) ) {
	$im2 = imagescale($im2, 430,430);
	$y=5;
}

if (imagesx($im2) > imagesy($im2)) {
	$ancho = imagesx($im2);	
	$alto = imagesy($im2);
	$total = $ancho - $alto;
	if ($total < 100 ) {
	    while ($ancho >= 400) {
		$ancho = $ancho -1;
		$alto = $alto -0.9;
						   }
		}
		if ($total < 200) {
	    while ($ancho >= 600) {
		$ancho = $ancho -1;
		$alto = $alto -0.7;
						   }
		}else{

	 while ($ancho >= 540 ) {
		$ancho = $ancho -1;
		$alto = $alto -0.55;
		$y = 50;
						   }
		}	
    $im2 = imagescale($im2, $ancho,$alto);
}

if (imagesx($im2) < imagesy($im2) ) {
$ancho = imagesx($im2);	
	$alto = imagesy($im2);
	while ($alto > 450) {
		$ancho = $ancho -0.9;
		$alto = $alto -1;
	}



$im2 = imagescale($im2, $ancho,$alto);
$x = 70;
$y=5;


}



}

$Texto1 = $_GET["text1"];
$Texto2 = $_GET["text2"];
$im = imagecreatefromjpeg("./image.jpg");
 $ximagen = imagesx($im2);
 $yimagen = imagesy($im2);


$archivo_fuente2 = './agency.ttf';
$archivo_fuente = './museo.otf';
if ($plantilla == 0) {
$bg = imagecolorallocate($im, 190, 42,13); 
$negro = imagecolorallocate($im, 0x00, 0x00, 0x00);
imagecopy($im, $im2, $x, $y ,0 , 0, $ximagen,$yimagen);
imagefttext($im, 30, 0, 540,75, $negro, $archivo_fuente, $Texto1);
imagefttext($im, 30, 0, 540, 120, $negro, $archivo_fuente, $Texto2);
imagefttext($im, 50, 0, 690, 310, $negro, $archivo_fuente, $text);
header("Content-type: image/png"); 
imagejpeg($im); 
}

if ($plantilla == 1) {
	
$bg = imagecolorallocate($imgplanti, 190, 42,13); 
$negro = imagecolorallocate($imgplanti, 0x00, 0x00, 0x00);
imagecopy($imgplanti, $im2, $x, $y ,0 , 0, $ximagen,$yimagen);
imagefttext($imgplanti, 40, 0, 570,75, $negro, $archivo_fuente2, $Texto1);
imagefttext($imgplanti, 40, 0, 570, 120, $negro, $archivo_fuente2, $Texto2);
imagefttext($imgplanti, 35, 0, 750, 280, $negro, $archivo_fuente2, $text);
header("Content-type: image/png"); 
imagejpeg($imgplanti); 
}

if ($plantilla == 2) {
$bg = imagecolorallocate($imgplanti2, 190, 42,13); 
$negro = imagecolorallocate($imgplanti2, 0x00, 0x00, 0x00);
imagecopy($imgplanti2, $im2, $x, $y ,0 , 0, $ximagen,$yimagen);
imagefttext($imgplanti2, 40, 0, 570,75, $negro,$archivo_fuente2, $Texto1);
imagefttext($imgplanti2, 40, 0, 570, 120, $negro, $archivo_fuente2, $Texto2);
imagefttext($imgplanti2, 35, 0, 750, 280, $negro, $archivo_fuente2, $text);
header("Content-type: image/png"); 
imagejpeg($imgplanti2); 
}

?>