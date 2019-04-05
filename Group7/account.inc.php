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
        $birthdate = $_POST['dateofbirth'];
        $phone = $_POST['phone'];


        $sql2 = "SELECT `PersonID` FROM Account";
        $result = mysqli_query($conn, $sql2);

        // All error messages when create an account
        //check if any empty input
        if ( empty($firstname) || empty($lastname) ||empty($address) ||empty($city) ||empty($state)||empty($zip))
        {
            header("Location: account.php?error=emptyfields");
            exit();
        }

        else
        {
            if (mysqli_num_rows($result) > 0) {
                // output data of each row
                $row = mysqli_fetch_assoc($result);
                if ($row["PersonID"]==NULL)//when it's null
                {
                    $sql="SELECT `FirstName` FROM Person WHERE `FirstName`=?";
                    $stmt = mysqli_stmt_init($conn);

                    echo "      id: " . $row["PersonID"]. "<br>";

                    //check if email is taken
                    if(!mysqli_stmt_prepare($stmt,$sql)){
                        header("Location: account.php?error=sqlerror");
                        exit();
                    }
            else{
                mysqli_stmt_bind_param($stmt, "s",$firstname);
                mysqli_stmt_execute($stmt);
                mysqli_stmt_store_result($stmt);
                $resultCheck= mysqli_stmt_num_rows($stmt);
                if ($resultCheck > 0){
                    //header("Location: account.php?error=usertaken&mail=".$firstname);
                    //exit();
                }
                else{
                    $sql = "INSERT INTO Person (`FirstName`, `LastName`, `DateOfBirth`,`PhoneNumber`) VALUES (?,?,?,?)";
                    $stmt = mysqli_stmt_init($conn);
                    if (!mysqli_stmt_prepare($stmt,$sql))
                    {
                        header("Location: account.php?error=sqlerror");
                        exit();
                    }
                    else{
                        //password security
                        //this following method make it safe!
                        mysqli_stmt_bind_param($stmt, "ssss",$firstname,$lastname,$birthdate,$phone);
                        
                        mysqli_stmt_execute($stmt);
                        header("Location: account.php?account=success");

                        exit();
                        }
                    }
                }
                    
            }
                else{
                    
    
                }
                
            } else {
                header("Location: account.php?error=PersonIDerror");
            }
    
            
        }
        mysqli_stmt_close($stmt);
        mysqli_close($conn);
    }
    else{
        header("Location: account.php");
        exit();
    }
?>