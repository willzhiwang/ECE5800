<?php
    require "header.php"
?>

<?php
    if (isset($_POST['account-submit']))
    {
        require 'configDB.php';
        //require 'login.inc.php';
        $firstname = $_POST['fname'];
        $lastname = $_POST['lname'];
        $address = $_POST['address'];
        $city = $_POST['city'];
        $state = $_POST['state'];
        $zip = $_POST['zip'];
        $birthdate = $_POST['dateofbirth'];
        $phone = $_POST['phone'];

        $currentID=$_SESSION['userId'];
        echo "\nCurrent loggedin user id: " . $currentID. "<br>";
        // find the current login Account ID
        $sql2 = "SELECT `PersonID` FROM `Account` WHERE `AccountID`=$currentID";
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
            if (mysqli_num_rows($result) > 0) 
            {
                $row = mysqli_fetch_assoc($result);
                $currentPersonID = $row["PersonID"];
                echo "\n Person ID from Account table: " . $currentPersonID. "<br>";

                if ($currentPersonID==NULL)//when it's null
                {
                    $sql = "INSERT INTO Person (`FirstName`, `LastName`, `DateOfBirth`,`PhoneNumber`) VALUES (?,?,?,?)";
                    $stmt = mysqli_stmt_init($conn);
                     if (!mysqli_stmt_prepare($stmt,$sql))
                    {
                        header("Location: account.php?error=sqlerror");
                        exit();
                    }
                    else{
                        mysqli_stmt_bind_param($stmt, "ssss",$firstname,$lastname,$birthdate,$phone);
                        mysqli_stmt_execute($stmt);
                        $AutoPersonID = mysqli_insert_id($conn);
                        header("Location: account.php?account=success");
                        //Update personID in Account table
                        $sql3 = "UPDATE Account SET `PersonID`=$AutoPersonID WHERE `AccountID`=$currentID";
                        $stmt3 = mysqli_stmt_init($conn);
                        if (!mysqli_stmt_prepare($stmt3,$sql3))
                        {
                            header("Location: account.php?error=sqlerror3");
                            echo "sql3 is Error";
                            mysqli_rollback($conn);
                            exit();
                        }
                        mysqli_stmt_execute($stmt3);
                        exit();
                    }
                        //mysqli_stmt_close($stmt3)  
                }
                else{//account exist
                    //echo "\n Person ID from Account table3: " . $currentPersonID. "<br>";
                    //Make sure check the type !!! use 'variable' for list of char!!!
                    $sql4 = "UPDATE `Person` SET `FirstName`= '$firstname',`LastName`='$lastname',`DateOfBirth`='$birthdate',`PhoneNumber`='$phone' WHERE `Person`.`PersonID`=$currentPersonID";
                    
                    $stmt4 = mysqli_stmt_init($conn);
                    /*$statement = mysqli_prepare($conn, $sql4);
                    if($statement == false) {
                        die("<pre>".mysqli_error($conn).PHP_EOL.$query."</pre>");
                    }*/
                    header("Location: account.php?account=success");
                    if(!mysqli_stmt_prepare($stmt4,$sql4))
                    {
                        header("Location: account.php?error=sqlerror4");
                        //echo "sql4 is Error";
                        mysqli_rollback($conn);
                        //exit();
                    }
                    mysqli_stmt_execute($stmt4);
                    exit();
                    mysqli_stmt_close($stmt4);
                }
            } 
            else {
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