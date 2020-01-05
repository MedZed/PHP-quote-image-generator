<?php



//  Give stroke to text 
function imagettfstroketext(&$image, $size, $angle, $x, $y, &$textcolor, &$strokecolor, $fontfile, $text, $px) {
    for($c1 = ($x-abs($px)); $c1 <= ($x+abs($px)); $c1++)
        for($c2 = ($y-abs($px)); $c2 <= ($y+abs($px)); $c2++)
            $bg = imagettftext($image, $size, $angle, $c1, $c2, $strokecolor, $fontfile, $text);
        return imagettftext($image, $size, $angle, $x, $y, $textcolor, $fontfile, $text);
    }
 

// Make rectangle rounded corners
function imageroundedrectangle(&$img, $x1, $y1, $x2, $y2, $r, $color){
    $r = min($r, floor(min(($x2 - $x1) / 2, ($y2 - $y1) / 2)));
    // render corners
    imagefilledarc($img, $x1 + $r, $y1 + $r, $r * 2, $r * 2, 180, 270, $color, IMG_ARC_PIE);
    imagefilledarc($img, $x2 - $r, $y1 + $r, $r * 2, $r * 2, 270, 0, $color, IMG_ARC_PIE);
    imagefilledarc($img, $x2 - $r, $y2 - $r, $r * 2, $r * 2, 0, 90, $color, IMG_ARC_PIE);
    imagefilledarc($img, $x1 + $r, $y2 - $r, $r * 2, $r * 2, 0, 180, $color, IMG_ARC_PIE);
    // middle fill, left fill, right fill
    imagefilledrectangle($img, $x1+$r, $y1, $x2-$r, $y2, $color);
    imagefilledrectangle($img, $x1, $y1+$r, $x1+$r, $y2-$r, $color);
    imagefilledrectangle($img, $x2-$r, $y1+$r, $x2, $y2-$r, $color);
    return true;
}


$author = $_GET["author"];
$quote =  wordwrap($_GET["quote"], 38, "\n");
$user = $_GET["user"];


// FETCH IMAGE & WRITE TEXT
$img_src = "https://source.unsplash.com/collection/762960/1080x1080";


$img = imagecreatefromjpeg($img_src);
$color = imagecolorallocate($img, 255, 255, 255);
$stroke_color = imagecolorallocate($img, 0, 0, 0);
$stroke = 1.5;




// imagefilter($img, IMG_FILTER_BRIGHTNESS, -10);
// imagefilter($img, IMG_FILTER_GRAYSCALE);
$black = imagecolorallocate($img, 0, 0, 0);
$yellow = imagecolorallocate($img, 255, 193, 7);

//  Fonts
// $font = "C:\Windows\Fonts\BebasNeue-Regular.ttf";

// Set the enviroment variable for GD
 
putenv('GDFONTPATH=' . realpath('.'));


$font = "Bebas-Regular";
$font2 = "Poppins-Regular"; 
$font3 = "Poppins-SemiBold"; 

// THE IMAGE SIZE
$width = imagesx($img);
$height = imagesy($img);

// THE TEXT SIZE
$text_size = imagettfbbox(24, 0, $font, $quote);
$text_width = max([$text_size[2], $text_size[4]]) - min([$text_size[0], $text_size[6]]);
$text_height = max([$text_size[5], $text_size[7]]) - min([$text_size[1], $text_size[3]]);

// CENTERING THE TEXT BLOCK
$centerX = CEIL(($width - $text_width) / 7);
$centerX = $centerX<0 ? 0 : $centerX;
$centerY = CEIL(($height - $text_height) / 2.4);
$centerY = $centerY<0 ? 0 : $centerY;
 
// account user background
imageroundedrectangle($img, $centerX-4, $centerY-122, $centerX+340,$centerY-78,3, $yellow);
// account user text
imagettftext($img, 25, 0, $centerX, $centerY-90, $black, $font2, $user);
// Quote text
imagettfstroketext($img, 50, 0, $centerX, $centerY,$color, $stroke_color, $font, $quote, $stroke);
// // Quote author
imagettfstroketext($img, 20, 0, $centerX+362, $centerY-90,$color, $stroke_color, $font3, $author, $stroke);






    
 
    










// Color line
// imageroundedrectangle($img, 0, 0, 1080,25,0, $yellow);

// OUTPUT IMAGE
header('Content-type: image/png');
header('Content-Disposition: Attachment;filename="Quote image number.png"');

imagepng($img);
imagedestroy($jpg_image);







?>