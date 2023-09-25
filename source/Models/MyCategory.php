<?php

namespace Source\Models;

use Source\Core\Connect;

class MyCategory {

    public function selectAll()
    {
        $stm = Connect::getInstance()->query("SELECT * FROM categories");
        return $stm->fetchAll();
    }

}