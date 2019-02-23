<?php
    require "header.php"
?>

<?php
    if (isset($_POST['signup-submit']))
    {
        require 'configDB.php';

        $username = $_POST['uid'];
        $email = $_POST['mail'];
        $password = $_POST['pwd'];
        $passwordRepeat = $_POST['pwd-r'];
        // All error messages when create an account
        //check if any empty input
        if (empty($username) || empty($email) ||empty($password) ||empty($passwordRepeat))
        {
            header("Location: ../signup.php?error=emptyfields&uid=".$username."&mail=".$email);
            exit();
        }
        //both invalid email and password
        else if (!filter_var($email,FILTER_VALIDATE_EMAIL) && !preg_match("/^[a-zA-Z0-9]*$/",$username))
        {   
            header("Location: ../signup.php?error=invalidmailuid");
            exit();
        }
        //check vlalid email
        else if (!filter_var($email,FILTER_VALIDATE_EMAIL))
        {   
            header("Location: ../signup.php?error=invalidmail&uid=".$username);
            exit();
        }
        //check password pattern
        else if ( !preg_match("/^[a-zA-Z0-9]*$/",$username))
        {
            header("Location: ../signup.php?error=invaliduid&mail=".$email);
            exit();
        }
        else if ($password != $passwordRepeat)
        {
            header("Location: ../signup.php?error=passwordcheckuid=".$username."&mail=".$email);
            exit();
        }
        else
        {
            $sql = "SELECT uidUsers FROM users WHERE uidUsers=?";
            $stmt = mysqli_stmt_init($conn);
            if (!mysqli_stmt_prepare($stmt,$sql))
            {
                header("Location: ../signup.php?error=sqlerror");
                exit();
            }
            else{
                mysqli_stmt_bind_param($stmt, "s",$username);
                mysqli_stmt_execute($stmt);
                mysqli_stmt_store_result($stmt);
                $resultCheck= mysqli_stmt_num_rows($stmt);
                if ($resultCheck > 0){
                    header("Location: ../signup.php?error=usertaken&mail=".$email);
                    exit();
                }
                else{
                    $sql = "INSERT INTO users (uidUsers, emailUsers, pwdUsers) VALUES (?,?,?)";
                    $stmt = mysqli_stmt_init($conn);
                    if (!mysqli_stmt_prepare($stmt,$sql))
                    {
                        header("Location: ../signup.php?error=sqlerror");
                        exit();
                    }
                    else{
                        //password security
                        //this following method make it safe!
                        $hashedPwd = password_hash($password, PASSWORD_DEFAULT);

                        mysqli_stmt_bind_param($stmt, "sss",$username,$email,$hashedPwd);
                        mysqli_stmt_execute($stmt);
                        header("Location: ../signup.php?error=success");
                        exit();
                    }
                }
            }
        }
        mysqli_stmt_close($stmt);
        mysqli_close($conn);
    }
    else{
        header("Location: ../signup.php?error=success");
        exit();
    }
?>