<?php
    require "header.php"
?>

<?php
    if (isset($_POST['billing-submit']))
    {
        require 'configDB.php';
        $cardNu = $_POST['cardNu'];
        $name = $_POST['B-name'];
        $eDate = $_POST['eDate'];
        $cvv = $_POST['cvv'];
        $cardType = $_POST['ctype'];
        //$lastname = $_POST['B-lname'];
        $address = $_POST['B-address'];
        $city = $_POST['B-city'];
        $state = $_POST['B-state'];
        $zip = $_POST['B-zip'];

        //$eMonth = $_POST['eMonth'];
        //$eYear = $_POST['eYear'];

        $currentAccountID=$_SESSION['userId'];
        echo "\nCurrent loggedin user id: " . $currentAccountID. "<br>";
        // find the current login Account ID
        $sql = "SELECT `UserID` FROM `Account` WHERE `AccountID`=$currentAccountID";
        $result = mysqli_query($conn, $sql);

        // All error messages when create an account
        //check if any empty input
        if (empty($address) ||empty($city) ||empty($state)||empty($zip) )
        {
            header("Location: billing.php?error=emptypaymentaddress");
            exit();
        }
        if (empty($cardNu) ||empty($name) || empty($cvv) ||empty($eDate)||empty($cardType) )
        {
            header("Location: billing.php?error=emptypayment");
            exit();
        }
        else
        {
            if (mysqli_num_rows($result) > 0) {
                $row = mysqli_fetch_assoc($result);
                $currentUserID = $row["UserID"];
                echo "\n Person id from Account table: " . $currentUserID. "<br>";
                if ($currentUserID==NULL)//when it's null
                {
                    echo " UserID is NULL!";
                }
                else // if User ID is correct
                {
                    $sql1 = "SELECT `PaymentInfo` FROM `User` WHERE `UserID`=$currentUserID";
                    $result1 = mysqli_query($conn, $sql1);
                    if (mysqli_num_rows($result1) > 0) {
                        $row = mysqli_fetch_assoc($result1);
                        $currentPaymentID = $row["PaymentInfo"];
                        echo "\n Payment id from Account table: ". $currentPaymentID. "<br>";
                        if ($currentPaymentID==NULL)//when current payment null
                        {
                            $sql2 = "INSERT INTO PaymentInfo (`CreditCardNumber`, `NameOnCard`, `ExpirationDate`,`SecurityCode`,`CardType`) VALUES (?,?,?,?,?)";
                            $stmt = mysqli_stmt_init($conn);
                            echo " Payment id is NULL";
                             if (!mysqli_stmt_prepare($stmt,$sql2))
                            {
                                header("Location: billing.php?error=sqlerror");
                                //echo "\n sql 2 error ";
                                exit();
                            }
                            else{
                                mysqli_stmt_bind_param($stmt, "ssssi",$cardNu,$name,$eDate,$cvv,$cardType);
                                mysqli_stmt_execute($stmt);
                                $AutoPaymentID = mysqli_insert_id($conn);
                                //Update personID in Account table
                                $sql3 = "UPDATE User SET `PaymentInfo`=$AutoPaymentID WHERE `UserID`=$currentUserID";
                                $stmt3 = mysqli_stmt_init($conn);
                                if (!mysqli_stmt_prepare($stmt3,$sql3))
                                {
                                    //header("Location: billing.php?error=sqlerror3");
                                    echo "sql3 is Error";
                                    mysqli_rollback($conn);
                                    exit();
                                }
                                
                                mysqli_stmt_execute($stmt3);
                                    //header("Location: billing.php?account=success");

                                exit();
                            } 
                        }
                        else // if User ID is correct
                        {
                            $sql4 = "UPDATE `Person` SET `FirstName`= '$firstname',`LastName`='$lastname',`DateOfBirth`='$birthdate',`PhoneNumber`='$phone' WHERE `Person`.`PersonID`=$currentPersonID";
                            $stmt = mysqli_stmt_init($conn);
                            /*$statement = mysqli_prepare($conn, $sql4);
                            if($statement == false) {
                                die("<pre>".mysqli_error($conn).PHP_EOL.$query."</pre>");
                            }*/
                            header("Location: billing.php?account=success");
                            if(!mysqli_stmt_prepare($stmt,$sql4))
                            {
                                header("Location: billing.php?error=sqlerror4");
                                //echo "sql4 is Error";
                                mysqli_rollback($conn);
                                //exit();
                            }
                            mysqli_stmt_execute($stmt);
                            exit();
                            //mysqli_stmt_close($stmt);
                        }
                    }
                }
            }
        }
        mysqli_stmt_close($stmt);
        mysqli_close($conn);
    }
    else{
        header("Location: billing.php");
        exit();
    }
?>