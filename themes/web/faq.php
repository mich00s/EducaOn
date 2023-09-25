<?php
   $this->layout("_theme");
?>
   <!DOCTYPE html>
   <html lang="pt-BR">
   <head>
       <meta charset="UTF-8">
       <meta name="viewport" content="width=device-width, initial-scale=1.0">
       <title>FAQ - Perguntas Frequentes</title>
       <link rel="stylesheet" href="styles.css">
   </head>
   <body class="faqs">
       <header class="headerFaq">
           <h1>Perguntas Frequentes</h1>
       </header>
       <main>
           <section class="faq-section">
               <?php
               foreach ($faqs as $faq) {
               ?>
               <div class="faq-item">
                   <h2 class="faq-question"><?="{$faq->question}"?></h2>
                   <p class="faq-answer"><?="{$faq->answer}"?></p>
               </div>
               <?php } ?>
           </section>
       </main>
      
   </body>
   </html>

   <?php
   /*if(!empty($faqs)){
    foreach($faqs as $faq) {
        echo "<div>{$faq->question}</div>";
        echo "<div>{$faq->answer}</div>";
    }}*/
    ?>
   
 
