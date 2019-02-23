<?php
    require "header.php"
?>
    <main>
      <div>
         <section>
            <h1>Login</h1>
            <form action = "login.inc.php" method = "post">
               <input type="text" name="mail" placeholder="email">
               <input type="password" name="pwd" placeholder="Password">
               <button type="submit" name="login-submit">Log In</button>
         </section>
      </div>
    </main>
    
<?php
    require "footer.php"
?>   