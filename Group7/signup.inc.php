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
        $isDriver = $_POST['isDriver'];
        $question1 = $_POST['question1'];
        $answer1 = $_POST['answer1'];
        
        if ($_POST['question2'] != 0){
            $question2 = $_POST['question2'];
            $answer2 = $_POST['answer2'];
        }else{
            $question2 = NULL;
            $answer2 = NULL;
        }
        
        if ($_POST['question3'] != 0){
            $question3 = $_POST['question3'];
            $answer3 = $_POST['answer3'];
        }else{
            $question3 = NULL;
            $answer3 = NULL;
        }

        // All error messages when create an account
        //check if any empty input
        if (empty($username) || empty($email) ||empty($password) ||empty($passwordRepeat))
        {
            header("Location: signup.php?error=emptyfields&uid=".$username."&mail=".$email);
            exit();
        }
        //both invalid email and password
        else if (!filter_var($email,FILTER_VALIDATE_EMAIL) && !preg_match("/^[a-zA-Z0-9]*$/",$username))
        {   
            header("Location: signup.php?error=invalidmailuid");
            exit();
        }
        //check valid email
        else if (!filter_var($email,FILTER_VALIDATE_EMAIL))
        {   
            header("Location: signup.php?error=invalidmail&uid=".$username);
            exit();
        }
        //check password pattern
        else if ( !preg_match("/^[a-zA-Z0-9]*$/",$username))
        {
            header("Location: signup.php?error=invaliduid&mail=".$email);
            exit();
        }
        //check password match or not
        else if ($password != $passwordRepeat)
        {
            header("Location: signup.php?error=passwordcheck&uid=".$username."&mail=".$email);
            exit();
        }
        else
        {
            $sql="SELECT `Username` FROM Account WHERE `Username`=?";
            $sql0="SELECT `Email` FROM Account WHERE `Email`=?";
            $stmt = mysqli_stmt_init($conn);
            $stmt0 = mysqli_stmt_init($conn);
            //check if email is taken
            //TODO: make sure it's case insensitive
            if(!mysqli_stmt_prepare($stmt0,$sql0)){
                header("Location: signup.php?error=sqlerror0");
                exit();
            }
            else{
                mysqli_stmt_bind_param($stmt0, "s",$email);
                mysqli_stmt_execute($stmt0);
                mysqli_stmt_store_result($stmt0);
                $resultCheck2= mysqli_stmt_num_rows($stmt0);
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
                    //We start a transaction so that if one query succeeds
                    //  but the next fails, the first query has no effect
                    //  (That way we don't have a User entry with no Account)
                    if (mysqli_begin_transaction($conn))
                    {
                        //First we make the User entry
                        $sql3 = "INSERT INTO User (`IsDriver`, `IsAdmin`, `Balance`) VALUES (?,?,?)";
                        $stmt3 = mysqli_stmt_init($conn);
                        if (!mysqli_stmt_prepare($stmt3,$sql3))
                        {
                            header("Location: signup.php?error=sqlerror3");
                            mysqli_rollback($conn);
                            exit();
                        }
                        else{
                            $isAdmin = 0;
                            $balance = 0.00;
                            mysqli_stmt_bind_param($stmt3, "iid",$isDriver,$isAdmin,$balance);
                            
                            mysqli_stmt_execute($stmt3);
                        }

                        //We store the ID for the new User entry
                        $user_id = mysqli_insert_id($conn);

                        //Then we make the Account entry
                        $sql2 = "INSERT INTO Account (`Email`, `Username`, `Password`,`SecQuestion1`,`SecAnswer1`,
                        `SecQuestion2`,`SecAnswer2`,`SecQuestion3`,`SecAnswer3`,`UserID`) VALUES (?,?,?,?,?,?,?,?,?,?)";
                        $stmt2 = mysqli_stmt_init($conn);
                        if (!mysqli_stmt_prepare($stmt2,$sql2))
                        {
                            header("Location: signup.php?error=sqlerror2");
                            mysqli_rollback($conn);
                            exit();
                        }
                        else{
                            //password security
                            //this following method makes it safe!
                            $hashedPwd = password_hash($password, PASSWORD_DEFAULT);

                            mysqli_stmt_bind_param($stmt2, "sssisisisi",$email,$username,$hashedPwd,$question1,$answer1,
                            $question2,$answer2,$question3,$answer3,$user_id);
                        
                            mysqli_stmt_execute($stmt2);
                        }
                        
                        header("Location: signup.php?signup=success");
                        mysqli_commit($conn);
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