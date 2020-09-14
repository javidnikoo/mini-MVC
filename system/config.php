<?php

// webfile address (where is your file in your server or localhost)
$base_url = "http://localhost/mvc/";

// the folder your project
$base_dir = "/mvc/";

// tabdile str be array (adresse safhe agar ba alamat soal bod )
$tmp = explode('?', $_SERVER['REQUEST_URI']);



//jabeja kardane link 
$current_route = str_replace($base_dir,'',$tmp[0]);
unset($tmp);