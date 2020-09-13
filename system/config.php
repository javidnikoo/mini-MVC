<?php

// adresse asli site in mishavad 
$base_url = "http://localhost/mvc/";

// folderi ke kole project dakhelesh hastesh
$base_dir = "/mvc/";

// tabdile str be array (adresse safhe agar ba alamat soal bod )
$tmp = explode('?', $_SERVER['REQUEST_URI']);

//jabeja kardane link 
$current_route = str_replace($base_dir,'',$tmp[0]);
unset($tmp);





