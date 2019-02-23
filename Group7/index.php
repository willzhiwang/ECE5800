<?php
    require "header.php";
    session_start();
    
?>


    <main>
    <?php if(isset($_SESSION["logged_in"]) && $_SESSION["logged_in"] == true ){
            echo("Welcome,".$_SESSION["login_user"]."!");
        }   ?>
    </main>
<?php
    require "footer.php"
?>   