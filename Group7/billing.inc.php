<?php
    require "header.php"
?>

<?php
    if (isset($_POST['billing-submit']))
    {
        require 'configDB.php';
        $cardNu = $_POST['cardNu'];
        $name = $_POST['Bname'];
        $eDate = $_POST['eDate'];
        $cvv = $_POST['cvv'];
        $cardType = $_POST['ctype'];

        $billingname = $_POST['Aname'];
        $street = $_POST['Baddress'];
        $city = $_POST['Bcity'];
        $state = $_POST['Bstate'];
        $zip = $_POST['Bzip'];
        //$eMonth = $_POST['eMonth'];
        //$eYear = $_POST['eYear'];
        $currentAccountID=$_SESSION['userId'];
        echo "\nCurrent loggedin Account id: " . $currentAccountID. "<br>";
        // find the current login Account ID
        $sql = "SELECT `UserID` FROM `Account` WHERE `AccountID`=$currentAccountID";
        $result = mysqli_query($conn, $sql);

        // All error messages when create an account
        //check if any empty input
        if (empty($street)||empty($city)||empty($state)||empty($zip) )
        {
            header("Location: billing.php?error=emptypaymentaddress");
            exit();
        }
        if (empty($cardNu)||empty($cvv)||empty($eDate)||empty($cardType) ||empty($name))
        {
            header("Location: billing.php?error=emptypayment");
            exit();
        }
        else
        {
            if (mysqli_num_rows($result) > 0) {
                $row = mysqli_fetch_assoc($result);
                $currentUserID = $row["UserID"];
                echo "\n User id from Account table: " . $currentUserID. "<br>";
                if ($currentUserID==NULL)//when it's null
                {
                    echo " UserID is NULL!";
                    header("Location: billing.php?error=sqlerroruserid");
                }
                else // if User ID is correct
                {
                    $sql1 = "SELECT `PaymentInfo` FROM `User` WHERE `UserID`=$currentUserID";
                    $result1 = mysqli_query($conn, $sql1);
                    if (mysqli_num_rows($result1) > 0) {
                        $row = mysqli_fetch_assoc($result1);
                        $currentPaymentID = $row["PaymentInfo"];
                        echo "\n Payment id from User table: ". $currentPaymentID. "<br>";
                        if ($currentPaymentID==NULL)//when current payment null
                        {
                            echo " Payment id is NULL";
                            //create address first
                            $sql5 = "INSERT INTO `Address` (`Name`, `Street`,`City`,`State`,`ZipCode`) VALUES (?,?,?,?,?)";
                            $stmt = mysqli_stmt_init($conn);
                            if (!mysqli_stmt_prepare($stmt,$sql5))
                            {
                                header("Location: billing.php?error=sqlerror");
                                //echo "\n sql5 error ";
                                exit();
                            }
                            else{
                                mysqli_stmt_bind_param($stmt, "ssssi",$billingname,$street,$city,$state,$zip);
                                mysqli_stmt_execute($stmt);
                                $currentAddressID = mysqli_insert_id($conn);
                            }
                            /*
                            create the payment afterward
                            */

                            $sql2 = "INSERT INTO PaymentInfo (`CreditCardNumber`, `NameOnCard`, `ExpirationDate`,`SecurityCode`,`CardType`,`BillingAddress`) VALUES (?,?,?,?,?,?)";
                            $stmt = mysqli_stmt_init($conn);
                            if (!mysqli_stmt_prepare($stmt,$sql2))
                            {
                                header("Location: billing.php?error=sqlerror");
                                echo "\n sql 2 error ";
                                exit();
                            }
                            else{
                                mysqli_stmt_bind_param($stmt, "ssssii",$cardNu,$name,$eDate,$cvv,$cardType,$currentAddressID);
                                mysqli_stmt_execute($stmt);

                                $AutoPaymentID = mysqli_insert_id($conn);
                                //Update personID in Account table
                                $sql3 = "UPDATE User SET `PaymentInfo`=$AutoPaymentID WHERE `UserID`=$currentUserID";
                                $stmt3 = mysqli_stmt_init($conn);
                                if (!mysqli_stmt_prepare($stmt3,$sql3))
                                {
                                    header("Location: billing.php?error=sqlerror3");
                                    echo "sql3 is Error";
                                    mysqli_rollback($conn);
                                    exit();
                                }
                                
                                mysqli_stmt_execute($stmt3);
                                header("Location: billing.php?billing=success");

                                exit();
                            } 
                        }
                        else // if Payment ID is correct
                        {
                            echo "\nCurrent Payment id: " . $currentPaymentID. "<br>";
                            $sql7 = "SELECT `BillingAddress` FROM `PaymentInfo` WHERE `PaymentInfoID`=$currentPaymentID";
                            $result7 = mysqli_query($conn, $sql7);
                            if (mysqli_num_rows($result7) > 0) {
                                $row = mysqli_fetch_assoc($result7);
                                $currentAddressID = $row["BillingAddress"];
                            }

                            echo "\nCurrent Address id: " . $currentAddressID. "<br>";

                            $sql4 = "UPDATE `Address` SET `Name`= '$billingname',`Street`='$street',`City`='$city',`State`='$state',`ZipCode`='$zip' WHERE `AddressID`=$currentAddressID";
                            $stmt = mysqli_stmt_init($conn);
                            if(!mysqli_stmt_prepare($stmt,$sql4))
                            {
                                header("Location: billing.php?error=sqlerror4");
                                //echo "sql4 is Error";
                                mysqli_rollback($conn);
                                exit();
                            }
                            mysqli_stmt_execute($stmt);
                            /*$statement = mysqli_prepare($conn, $sql4);
                            if($statement == false) {
                                die("<pre>".mysqli_error($conn).PHP_EOL.$query."</pre>");
                            }*/
                            $sql6 = "UPDATE `PaymentInfo` SET `CreditCardNumber`= '$cardNu',`NameOnCard`='$name',`ExpirationDate`='$eDate',`SecurityCode`='$cvv',`CardType`=$cardType WHERE `PaymentInfoID`=$currentPaymentID";

                            if(!mysqli_stmt_prepare($stmt,$sql6))
                            {
                                header("Location: billing.php?error=sqlerror6");
                                //echo "sql6 is Error";
                                mysqli_rollback($conn);
                                exit();
                            }
                            header("Location: billing.php?billing=success");
                            mysqli_stmt_execute($stmt);
                            exit();
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