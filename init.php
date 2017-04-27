<?php
session_start();

 $GLOBALS['config'] = array(
        'mysql' => array(
            'host'   => '127.0.0.1',
            'dbname' => 'cinemax_ex',
            'login'  => 'root',
            'pass'   => 'test'
        )
     );
 

 
     spl_autoload_register(function($class){
         
     require_once 'class/'.$class.'.php';       
         
     });
         
         
         
         
        
        
        
    