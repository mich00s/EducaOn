<?php
   $this->layout("_theme", ["categories"=>$categories]);
   ?>
    <section>

    <div class= "card-container">

    <?php
    foreach ($course as $courses) {
    ?>
        <div class="card">
            <h3><?= $courses->name; ?></h3>
            <ul>
                <li><p><?= $courses->description; ?></p></li>
            </ul>
            
            <a href="#">Matricule-se!</a>
            
        </div>
    
    <?php
    }
    ?>

</div>
</section>
