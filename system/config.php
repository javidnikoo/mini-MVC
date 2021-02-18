<?php

// webfile address (where is your file in your server or localhost)
$base_url = "http://localhost/mini-MVC/";

// the folder the Website
$base_dir = "/mini-MVC/";

// if the url have ? do str to array (array[0]?array[1])
$tmp = explode('?', $_SERVER['REQUEST_URI']);

// replace the link
$current_route = str_replace($base_dir,'',$tmp[0]);
unset($tmp);
