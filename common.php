<?php

global $phrase;
function inc($file, $data){
    extract($data);
    include 'view/'.$file.'.php';
}

?>