<?php

//Simple Page Redirect

function redirect($page){
    header('Location:'.URLROOT.'/'. $page);
}

