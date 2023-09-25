<?php

namespace Source\Models;

use Source\Core\Connect;

class Course {
    private $id;
    private $name;
    private $description;
    
    public function selectAll()
{
    $stm = Connect::getInstance()->query("SELECT * FROM courses");
    return $stm->fetchAll();
}

public function selectByCategory (string $categoryName)
{
    $query = "SELECT courses.name, description FROM courses 
     JOIN categories ON courses.category_id = categories.id 
     WHERE categories.name = '{$categoryName}'";

    $stm = Connect::getInstance()->query($query);
    return $stm->fetchAll();
}

} 