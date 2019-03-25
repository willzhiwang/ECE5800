<?php
    require "header.php"
?>

<?php
    if (isset($_POST['account-submit']))
    {
        require 'configDB.php';

        $firstname = $_POST['fname'];
        $lastname = $_POST['lname'];
        $address = $_POST['address'];
        $city = $_POST['city'];
        $state = $_POST['state'];
        $zip = $_POST['zip'];
        $driver = $_POST['driver'];
        $passanger = $_POST['passenger'];


        // All error messages when create an account
        //check if any empty input
        if (empty($fname) || empty($lname) ||empty($address) ||empty($city) ||empty($state)||empty($zip) )
        {
            header("Location: signup.php?error=emptyfields");
            exit();
        }
        if (empty($driver) && empty($passanger) )
        {
            header("Location: signup.php?error=emptyfields");
            exit();
        }
        else
        {
            $sql="SELECT uidUsers FROM users WHERE uidUsers=?";
            $sql2="SELECT emailUsers FROM users WHERE emailUsers=?";
            $stmt = mysqli_stmt_init($conn);
            $stmt2 = mysqli_stmt_init($conn);
            //check if email is taken
            if(!mysqli_stmt_prepare($stmt2,$sql2)){
                header("Location: signup.php?error=sqlerror");
                exit();
            }
            else{
                mysqli_stmt_bind_param($stmt2, "s",$email);
                mysqli_stmt_execute($stmt2);
                mysqli_stmt_store_result($stmt2);
                $resultCheck2= mysqli_stmt_num_rows($stmt2);
                if ($resultCheck2 > 0){
                    header("Location: signup.php?error=emailtaken");
                    exit();
                }
            }
            if(!mysqli_stmt_prepare($stmt,$sql)){
                header("Location: signup.php?error=sqlerror");
                exit();
            }
            else{
                mysqli_stmt_bind_param($stmt, "s",$username);
                mysqli_stmt_execute($stmt);
                mysqli_stmt_store_result($stmt);
                $resultCheck= mysqli_stmt_num_rows($stmt);
                if ($resultCheck > 0){
                    header("Location: signup.php?error=usertaken&mail=".$email);
                    exit();
                }
                else{
                    $sql = "INSERT INTO users (uidUsers, emailUsers, pwdUsers) VALUES (?,?,?)";
                    $stmt = mysqli_stmt_init($conn);
                    if (!mysqli_stmt_prepare($stmt,$sql))
                    {
                        header("Location: signup.php?error=sqlerror");
                        exit();
                    }
                    else{
                        //password security
                        //this following method make it safe!
                        $hashedPwd = password_hash($password, PASSWORD_DEFAULT);

                        mysqli_stmt_bind_param($stmt, "sss",$username,$email,$hashedPwd);
                        
                        mysqli_stmt_execute($stmt);
                        header("Location: signup.php?signup=success");
                        exit();
                    }
                }
            }
        }
        mysqli_stmt_close($stmt);
        mysqli_close($conn);
    }
    else{
        header("Location: signup.php");
        exit();
    }
?>