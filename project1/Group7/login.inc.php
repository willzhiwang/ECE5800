<?php
    require "header.php"
?>

<?php
    if (isset($_POST['login-submit']))
    {
        require 'configDB.php';
        $mailuid = $_POST['mail'];
        $password = $_POST['pwd'];
        // All error messages when logging in - not many
        // check if any empty input
        if (empty($mailuid) )
        {
            header("Location: login.php?error=emptyemail");
            exit();
        }
        if (empty($password) )
        {
            header("Location: login.php?error=emptypwd");
            exit();
        }
        //check sql errors
        else
        {
            $sql = "SELECT * FROM users WHERE uidUsers=? OR emailUsers=?;";
            $stmt = mysqli_stmt_init($conn);
            //checking $sql statement error
            if (!mysqli_stmt_prepare($stmt,$sql))
            {
                header("Location: login.php?error=sqlerror");
                exit();
            }
            else{
                //pass in mailuid only not password yet
                mysqli_stmt_bind_param($stmt, "ss", $mailuid, $mailuid);
                mysqli_stmt_execute($stmt);
                $result= mysqli_stmt_get_result($stmt);
                //checking if the password matches the user
                if ($row = mysqli_fetch_assoc($result))
                {
                    $pwdCheck = password_verify($password,$row['pwdUsers']);
                    if (pwdCheck == false) // when match is false, wrong password
                    {
                        header("Location: login.php?error=wrongPWD");
                        exit();
                    }
                    else if (pwdCheck == true) // approved login
                    {
                        session_start();
                        $_SESSION['userId'] = $row['idUsers'];
                        $_SESSION['userUid'] = $row['uidUsers'];
                        header("Location: index.php?login=success=.$mailuid");
                    }
                    else 
                    {
                        header("Location: login.php?error=wrongPWD");
                        exit();
                    }
                }
                else{
   
                    header("Location: index.php?error=success&user=".$mailuid);
                }
            }
        }
        mysqli_stmt_close($stmt);
        mysqli_close($conn);
    }
    else{
        header("Location: index.php?error=success");
        exit();
    }
?>