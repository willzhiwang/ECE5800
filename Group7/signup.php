<?php
    require "header.php"
?>
    <main>
      <div>
         <section>
            <h1>SignUp</h1>
            <form action = "signup.inc.php" method = "post">
               <input type="text" name="uid" placeholder="Username">
               <input type="text" name="mail" placeholder="email">
               <input type="password" name="pwd" placeholder="Password">
               <input type="password" name="pwd-r" placeholder="Repeat Password">
               <button type="submit" name="signup-submit">Sign Up</button>
         </section>
      </div>
    </main>
    
<?php
    require "footer.php"
?>   