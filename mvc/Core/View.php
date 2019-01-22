<?php
namespace Core;

class View{
    	
    public static function render($view, $args = []){
    		
    	$args['fvers'] = \App\Config::FRONTEND_VERSION; 
        extract($args, EXTR_SKIP);
        
        $file = dirname(__DIR__) . '/App/View/template/'.\App\Config::TEMPLATE_NAME.'/'.$view; 
        
        if (!is_readable($file)) 
        	throw new \Exception(__METHOD__.': istenen view betiği buluanamdı');
        
        require $file; 

    }
}