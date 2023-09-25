<?php
namespace Source\App;

use League\Plates\Engine;
use Source\Models\Faq;
use Source\Models\Course;
use Source\Models\MyCategory;
    
class Web{
    private $view;
    private $categories;

    public function __construct()
    {
        $this->view = new Engine(__DIR__ . "/../../themes/web","php");
        $categories = new MyCategory();
        $this->categories = $categories->selectAll();

    }
    public function home(){
        echo $this->view->render("home",[
            "categories" => $this->categories
        ]);
        
    }
    public function about()
    {
        echo $this->view->render("about",["categories" => $this->categories]);
    }
    public function location()
   {
        echo $this->view->render("location",[
        ]);
    }

    public function faq()
    {
        $faqs = new Faq();
        
        echo $this->view->render("faq",[
            "faqs" => $faqs->selectAll()
        ]);

    }

    public function course(array $data) : void
    {
        $course = new Course();

        if(!empty($data["category"])){
            //var_dump($data["category"]);
            echo $this->view->render("course",[
                "course" => $course->selectByCategory($data["category"]),
                "categories" => $this->categories
            ]);
            return;
        }

        //var_dump($course->selectAll());
        echo $this->view->render("course",[
            "course" => $course->selectAll(),
            "categories" => $this->categories
        ]);
    }



    public function register(array $data)
    {
        if(!empty($data)){
            $response = json_encode($data);
            echo $response;
            return;
        }

        echo $this->view->render("register",[
            "categories" => $this->categories
        ]);
    }

    public function login (array $data) : void
    {
        echo $this->view->render("login",["categories" => $this->categories]);
    }
}