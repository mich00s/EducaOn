<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>.:: EducaOn ::..</title>
</head>
<body>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="<?= url("/assets/web/css/styles.css"); ?>" rel="stylesheet"/>
    <link href="<?= url("/assets/web/css/home.css"); ?>" rel="stylesheet"/>
    <link href="<?= url("/assets/web/css/course.css"); ?>" rel="stylesheet"/>
  
    <script type="text/javascript" src="<?= url("/assets/web/js/menu.js"); ?>"></script>
    <title>Perfil - EducaOn</title>

<div class="screen">
    <header>
        <a class="target-burger">
            <ul class="buns">
                <li class="bun"></li>
                <li class="bun"></li>
            </ul>
        </a>
    </header>

    <nav class="main-nav" role="navigation">
        <ul class="menu">
            <li class=".foot"><a href="<?= url(''); ?>">Home</a></li>
            <li class=".foot"><a href="<?= url('registro'); ?>"><span>Registrar</span></a></li>
            <li class=".foot"><a href="<?= url('login'); ?>"><span>Login</span></a></li>
            <li class=".foot"><a href="<?= url('logout'); ?>">Logout</a></li>
            <li class=".foot"><a href="<?= url('cursos'); ?>"><span>Cursos</span></a>
                <ul class="submenu">
                    <?php
                    foreach ($categories as $category){
                    ?>
                    <li><a href="<?= url("cursos/{$category->name}")?>"> <?= $category->name; ?></a></li>
                    <?php
                    }
                    ?>
                </ul>   
            </li>
            
        </ul>
    </nav>

    <?php
   echo $this->section("content");
    ?>

<footer>
        <div class="row">
            <div class="baixo">
                <h3>Links</h3>
                <ul class="use_link">
                    <li><a class="link" href="<?= url(' '); ?>"><br> <br>Página Principal</a></li>
                    <li><a class="link" href="<?= url('sobre'); ?>">Sobre</a></li>
                    <li><a class="link" href="<?= url('faq'); ?>">FAQ - Perguntas Frequentes</a></li>
                </ul>
            </div>

            <div class="baixo">
                <h3>Contato</h3>
                <ul class="location_icon">
                    <li><br><br>It is a long established fact that a <br>reader will be distracted</li>
                    <li>
                        (+51) 998514022
                    </li>
                    <li>michelesouza.ch151@academico.ifsul.edu.br</li>
                    <li><br></li>
                </ul>
            </div>

        </div>
        <div class="copyright">
            <div class="container">
                <p>© 2023 Todos os Direitos Reservados.</p>
            </div>
        </div>
    </footer>
</div>

 
</body>
</html>