<?php

class Base_Controller_Simple {

    public $view;
    public $tpl = null;

    public function __construct()
    {
        $this->view = new Base_View_Base();
    }

    public function preAction()
    {
        $this->view->template = $this->tpl;
        var_dump('Im pre Action');
    }

    public function postAction()
    {
        $this->view->render();
        var_dump('Im post Action');
    }

    public function p($name)
    {

    }
} 