<?php

require('include/auth.php');
$title="Saving Photo";
require('include/header.php');

$ok = true; 
$photo = $_FILES['photo']; 

if (!empty($photo['name'])) {
    $tmp_name = $photo['tmp_name'];
    $type = mime_content_type($tmp_name);

    if ($type != 'image/png') {
        echo '<p>Please upload a valid .png file</p>';
        $ok = false;
        exit();
    }

    
    $photoName = $photo['name'];
    move_uploaded_file($tmp_name, 'img/' . $photoName);
}
?>