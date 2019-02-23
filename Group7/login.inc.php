<?php
    require "header.php"
?>

<?php
    if (isset($_POST['login-submit']))
    {
        require 'configDB.php';

        $email = $_POST['mail'];
        $password = $_POST['pwd'];
        // All error messages when logging in - not many
        // check if any empty input
        if (empty($email) || empty($password) )
        {
            header("Location: ../login.php?error=emptyfields&mail=".$email);
            exit();
        }
        else
        {
            $sql = "SELECT uidUsers, emailUsers, pwdUsers FROM users WHERE emailUsers=?";
            $stmt = mysqli_stmt_init($conn);
            if (!mysqli_stmt_prepare($stmt,$sql))
            {
                header("Location: ../login.php?error=sqlerror");
                exit();
            }
            else{
                mysqli_stmt_bind_param($stmt, "s",$email);
                mysqli_stmt_execute($stmt);
                mysqli_stmt_store_result($stmt);
                
                $resultCheck= mysqli_stmt_num_rows($stmt);
                
                mysqli_stmt_bind_result($stmt,$username,$otheremail,$hashedPwd);
                mysqli_stmt_fetch($stmt);
                // User not found with that name
                if ($resultCheck == 0){
                    header("Location: ../login.php?error=notauser&mail=".$email);
                    
                    exit();
                }
                // Wrong password
                else if (!password_verify($password,$hashedPwd)){
                    header("Location: ../login.php?error=wrongpass&mail=".$email);
                    
                    exit();

                }
                else{
                    session_start();
                    
                    $_SESSION['logged_in'] = true;
                    $_SESSION['login_user'] = $username;
    
                    header("Location: ../index.php?error=success&user=".$username);
                }
            }
        }
        mysqli_stmt_close($stmt);
        mysqli_close($conn);
    }
    else{
        header("Location: ../index.php?error=success");
        exit();
    }
?>