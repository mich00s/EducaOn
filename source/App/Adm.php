<?php

namespace Source\App;

use League\Plates\Engine;

class Adm
{
    public function __construct()
    {
        $this->view = new Engine(__DIR__ . "/../../themes/adm","php");
    }

    public function home ()
    {
        echo $this->view->render("home");
    }

    public function teachers ()
    {
        echo $this->view->render("teachers");
    }

}