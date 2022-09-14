<?php
function displayImage($file) {
    echo '<a href="'.$file.'"><img src="./'.$file.'" /></a>';
}

function padIt($string) {
    return str_pad($string, 3, "0", STR_PAD_LEFT);
}

function totalImages($fileFormats) {
    $totalImages = 0;
    foreach(glob("./images/*", GLOB_ONLYDIR) as $category) {
        $totalImages += count(glob($category."/*.{".$fileFormats."}", GLOB_BRACE));
    }
    return $totalImages;
}