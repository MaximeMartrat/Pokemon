<?php

abstract class Controller {

    protected $vars = array();

    public function set($data){
        $this->vars = array_merge($this->vars , $data );
    }

    public function render($filename, $additionalData = []){
        extract($this->vars);
        extract($additionalData);
        require(ROOT.'views/'.$filename.'.php');
    }

}