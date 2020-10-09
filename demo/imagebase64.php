<?php

$image = $_FILES['file'];
$type = pathinfo($image['name'], PATHINFO_EXTENSION);


$data = file_get_contents($image['tmp_name']);
$base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);

echo "<img src=".$base64.">";

