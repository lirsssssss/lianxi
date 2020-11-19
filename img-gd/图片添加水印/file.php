<?php

function upload_watermark_image($file){
	$img = './bg.png';
	// $info = getimagesize($file['tmp_name']);
	$info = getimagesize($img);
	$type = image_type_to_extension($info[2],false);
	$fun = "imagecreatefrom".$type;

	$image = $fun($img);

  	$text = "无梦生";

	$font = "./font.TTF";
	$red = imagecolorallocatealpha($image, 255, 0, 0,0);

  	imagettftext($image,20, 0, 20, 120, $red,$font, $text);

  	header("Content-type:".$info['mime']);
	$fun = "image".$type;
	$fun($image);
	//保存图片
    $fun($image,'./img/'.uniqid().'.'.$type);
	//销毁图片
	imagedestroy($image);
}

  //获取上传的图片信息
  $file = $_FILES['file'];

  $output_img = upload_watermark_image($file);



















