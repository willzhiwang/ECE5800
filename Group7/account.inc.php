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

        $billingname= $_POST['Aname'];
        $street = $_POST['address'];
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
        if ( empty($firstname) || empty($lastname) ||empty($birthdate) ||empty($phone) )
        {
            header("Location: account.php?error=emptyPersonFields");
            exit();
        }
        if ( empty($billingname) ||empty($street) ||empty($city) ||empty($state)||empty($zip))
        {
            header("Location: account.php?error=emptyAddressFields");
            exit();
        }

        else
        {
            if (mysqli_num_rows($result) > 0) 
            {
                $row = mysqli_fetch_assoc($result);
                $currentPersonID = $row["PersonID"];
                echo "\n Person ID from Account table: " . $currentPersonID. "<br>";

                if ($currentPersonID==NULL)//when Person ID is null
                {

                    $sql6 = "INSERT INTO `Address` (`Name`, `Street`,`City`,`State`,`ZipCode`) VALUES (?,?,?,?,?)";
                    $stmt = mysqli_stmt_init($conn);
                    if (!mysqli_stmt_prepare($stmt,$sql6))
                    {
                        header("Location: billing.php?error=sql6error");
                        //echo "\n sql6 error ";
                        exit();
                    }
                    else{
                        mysqli_stmt_bind_param($stmt, "ssssi",$billingname,$street,$city,$state,$zip);
                        mysqli_stmt_execute($stmt);
                        $currentAddressID = mysqli_insert_id($conn);
                    }

                    $sql = "INSERT INTO Person (`FirstName`, `LastName`, `DateOfBirth`,`PhoneNumber`,`Address`) VALUES (?,?,?,?,?)";
                    $stmt = mysqli_stmt_init($conn);
                     if (!mysqli_stmt_prepare($stmt,$sql))
                    {
                        header("Location: account.php?error=sqlerror");
                        exit();
                    }
                    else{
                        mysqli_stmt_bind_param($stmt, "sssss",$firstname,$lastname,$birthdate,$phone,$currentAddressID);
                        mysqli_stmt_execute($stmt);
                        $AutoPersonID = mysqli_insert_id($conn);
                        header("Location: account.php?account=success");
                        //Update personID in Account table
                        $sql3 = "UPDATE Account SET `PersonID`=$AutoPersonID WHERE `AccountID`=$currentID";
                        $stmt = mysqli_stmt_init($conn);
                        if (!mysqli_stmt_prepare($stmt,$sql3))
                        {
                            header("Location: account.php?error=sqlerror3");
                            echo "sql3 is Error";
                            mysqli_rollback($conn);
                            exit();
                        }
                        mysqli_stmt_execute($stmt);
                        exit();
                    }
                        //mysqli_stmt_close($stmt3)  
                }
                else{//account exist
                    //echo "\n Person ID from Account table3: " . $currentPersonID. "<br>";
                    //Make sure check the type !!! use 'variable' for list of char!!!

                    echo "\nCurrent Person id: " . $currentPersonID. "<br>";
                    $sql1 = "SELECT `Address` FROM `Person` WHERE `PersonID`=$currentPersonID";
                    $result1 = mysqli_query($conn, $sql1);
                    if (mysqli_num_rows($result1) > 0) {
                        $row = mysqli_fetch_assoc($result1);
                        $currentAddressID = $row["Address"];
                    }
                    echo "\nCurrent Address id: " . $currentAddressID. "<br>";


                    $sql5 = "UPDATE `Address` SET `Name`= '$billingname',`Street`='$street',`City`='$city',`State`='$state',`ZipCode`='$zip' WHERE `AddressID`=$currentAddressID";
                    $stmt = mysqli_stmt_init($conn);

                    if(!mysqli_stmt_prepare($stmt,$sql5))
                    {
                        //header("Location: account.php?error=sqlerror5");
                        echo "sql5 is Error";
                        mysqli_rollback($conn);
                        exit();
                    }
                    mysqli_stmt_execute($stmt);

                    $sql4 = "UPDATE `Person` SET `FirstName`= '$firstname',`LastName`='$lastname',`DateOfBirth`='$birthdate',`PhoneNumber`='$phone' WHERE `Person`.`PersonID`=$currentPersonID";
                    $stmt4 = mysqli_stmt_init($conn);
                    /*$statement = mysqli_prepare($conn, $sql4);
                    if($statement == false) {
                        die("<pre>".mysqli_error($conn).PHP_EOL.$query."</pre>");
                    }*/
                    if(!mysqli_stmt_prepare($stmt4,$sql4))
                    {
                        header("Location: account.php?error=sqlerror4");
                        //echo "sql4 is Error";
                        mysqli_rollback($conn);
                        exit();
                    }
                    mysqli_stmt_execute($stmt4);
                    //header("Location: account.php?account=success");
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