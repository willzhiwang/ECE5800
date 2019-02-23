<?php    
    require "header.php";
?>
    <main>
    <?php $_SESSION["logged_in"] = false; ?>
      <div>
         <section>
            <p>You are logged out</p>
         </section>
      </div>
    </main>
    
<?php
    require "footer.php"
?>   