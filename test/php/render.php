<?php
    require dirname(__FILE__).'/Mustache/Autoloader.php';
    Mustache_Autoloader::register();

    function render($template,$data){
        $mustache = new Mustache_Engine();

        $mustache->addHelper('i18n', function($text) {
            return array_key_exists($text, $data['I18N']) ? $data['I18N'][$text] : $text;
        });

        return $mustache->render($template, $data); 
    }

    $base = realpath(dirname(__FILE__). '/../../src');

    if($_POST['template'] && $_POST['json']){
        $template = $_POST['template'];
        $data = json_decode($_POST['json'],true);
        echo render($template,$data);
    }
?>