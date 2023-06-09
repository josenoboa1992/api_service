
<?php
require_once ("Config/Config.php");
require_once ("Helpers/Helpers.php");
    $url=!empty($_GET['url'])?$_GET['url']:"home/home";
    $route=explode('/',$url);
    $controller=$route['0'];
    $method=$route[0];
    $params="";
    if (!empty($route[1])){
        if ($route[1] != ""){
            $method=$route[1];
        }

    }
    if(!empty($route[2]) && $route[2] !="")
    {
        for ($i=2;$i<count($route) ;$i++){
            $params.=$route[$i].",";
        }
        $params=trim($params,",");
    }
require_once("Libraries/Core/Autoload.php");
require_once("Libraries/Core/Load.php");
