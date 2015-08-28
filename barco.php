<?php
require_once('class/BCGColor.php');
require_once('class/BCGDrawing.php');
require_once('class/BCGqrcode.barcode2d.php');
 
$colorfg = new BCGColor(0, 0, 0);
$colorbg = new BCGColor(255, 255, 255);
 
// Barcode Part
$code = new BCGqrcode();
$code->setScale(4);
$code->setSize(BCGqrcode::QRCODE_SIZE_SMALLEST);
$code->setErrorLevel(2);
$code->setMirror(true);
$code->setColor($colorfg, $colorbg);
$code->parse('QRCode');
 
// Drawing Part
$drawing = new BCGDrawing('', $colorbg);
$drawing->setBarcode($code);
$drawing->draw();
 
header('Content-Type: image/png');
 
$drawing->finish(BCGDrawing::IMG_FORMAT_PNG);
?>