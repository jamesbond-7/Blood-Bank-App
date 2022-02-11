<?php

//Image Upload

function imgUpload($file){
    $filename = $file["name"];
    $tempname = $file["tmp_name"];
    $folder = dirname(APPROOT).'/public/img/post_img/'.$filename;
    //echo APPROOT;
    //echo $filename;
    move_uploaded_file($tempname,$folder);
    return $filename;
}

