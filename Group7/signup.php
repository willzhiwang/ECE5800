<?php
    require "header.php"
?>
    <main>
      <div>
         <section>
            <h1>SignUp</h1>
            <form class="form-signup"  action = "signup.inc.php" method = "post">
               <input type="text" name="uid" placehold="Username">
               <input type="text" name="mail" placehold="email">
               <input type="password" name="pwd" placehold="Password">
               <input type="password" name="pwd-r" placehold="Repeat Password">
               <button type="submit" name="signup-submit">SignUp</button>
         </section>
      </div>
    </main>
    
<?php
    require "footer.php"
?>   