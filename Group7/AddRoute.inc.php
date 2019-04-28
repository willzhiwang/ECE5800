<?php
    require "header.php"
?>

<?php
    if (isset($_POST['AddRoute-submit']))
    {
        require 'configDB.php';

        $vehicleID = $_POST['vehicleid'];
        $driverID = $_POST['driverid'];
        $addressNameFrom = $_POST['AnameFrom'];
        $addressStreetFrom = $_POST['streetFrom'];
        $cityFrom = $_POST['cityFrom'];
        $stateFrom = $_POST['stateFrom'];
        $zipFrom = $_POST['zipFrom'];
        $addressNameTo = $_POST['AnameTo'];
        $addressStreetTo = $_POST['streetTo'];
        $cityTo = $_POST['cityTo'];
        $stateTo = $_POST['stateTo'];
        $zipTo = $_POST['zipTo'];
        $depTime = $_POST['depTime'];
        $arrTime = $_POST['arrTime'];
        $distance = $_POST['distance'];

        $daysChecked = $_POST['daysChecked'];

        $fromID = NULL;
        $toID = NULL;

        
        //TODO: improve form validation

        // All error messages when create an account
        //check if any empty input
        if (empty($vehicleID) || empty($driverID) ||empty($addressNameFrom) 
        || empty($addressStreetFrom ) || empty($cityFrom) || empty($stateFrom)
        || empty($zipFrom) || empty($addressNameTo) || empty($addressStreetTo)
        || empty($cityTo) || empty($stateTo) || empty($zipTo)
        || empty($depTime) || empty($arrTime) || empty($distance)
        || empty($daysChecked))
        {
            header("Location: AddRoute.php?error=emptyfields");
            exit();
        }
        else
        {
            //We start a transaction so that if one query succeeds
            //  but the next fails, the first query has no effect
            //  (That way we don't have a User entry with no Account)
                if (mysqli_begin_transaction($conn)){


                //First, if the address already exists in the database, don't recreate it.
                //Otherwise, make it a new entry.
                //Either way, its ID is assigned to "fromID".
                

                /* TODO: I tried to check if the address already exists
                 in the database, so we wouldn't have any duplicated data.
                 This code didn't end up working, though.
                 Maybe this'd be something we could do later...
                 But probably not this semester. :P



                $sql0="SELECT `AddressID`, `Name`, `Street`, `City`, `State`, `ZipCode` FROM Address WHERE `Name`=? AND `Street`=? 
                AND City=? AND `State`=? AND `ZipCode`=?";
                $stmt0 = mysqli_stmt_init($conn);
                if(!mysqli_stmt_prepare($stmt0,$sql0)){
                    header("Location: AddRoute.php?error=sqlerror0");
                    mysqli_rollback($conn);
                    exit();
                }
                else{
                    mysqli_stmt_bind_param($stmt0, "sssss",$addressNameFrom,$addressStreetFrom,$cityFrom,$stateFrom,$zipFrom);
                    if(!mysqli_execute($stmt0)){
                        header("Location: AddRoute.php?error=sqlerror1");
                        mysqli_rollback($conn);
                        exit();
                    }
                    
                    $resultCheck = mysqli_stmt_num_rows($stmt0);
                    if ($resultCheck > 0){
                        $row = mysqli_stmt_get_result($stmt0);
                        if($row = mysqli_fetch_assoc($result)){
                            $fromID = $row['AddressID'];
                        }else{
                            header("Location: AddRoute.php?error=sqlerror99");
                            mysqli_rollback($conn);
                            exit();
                        }

                    }else{
                        $sql1 = "INSERT INTO `Address`(`Name`, `Street`, `City`, `State`, `ZipCode`) VALUES (?,?,?,?,?)";
                        $stmt1 = mysqli_stmt_init($conn);
                        if(!mysqli_stmt_prepare($stmt1,$sql1)){
                            header("Location: AddRoute.php?error=sqlerror2");
                            mysqli_rollback($conn);
                            exit();
                        }
                        else{
                            mysqli_stmt_bind_param($stmt1, "sssss",$addressNameFrom,$addressStreetFrom,$cityFrom,$stateFrom,$zipFrom);
                            if(!mysqli_execute($stmt1)){
                                header("Location: AddRoute.php?error=sqlerror3");
                                mysqli_rollback($conn);
                                exit();
                            }
                            $fromID = mysqli_insert_id($conn);
                        }

                    }
                    mysqli_stmt_close($stmt0);
                    mysqli_stmt_close($stmt1);
                }

                */

                $sql1="INSERT INTO `address`(`Name`, `Street`, `City`, `State`, `ZipCode`) VALUES (?,?,?,?,?);";
                $stmt1 = mysqli_stmt_init($conn);
                if(!mysqli_stmt_prepare($stmt1,$sql1)){
                    header("Location: AddRoute.php?error=sqlerror2");
                    mysqli_rollback($conn);
                    exit();
                }
                else{
                    mysqli_stmt_bind_param($stmt1, "sssss",$addressNameFrom,$addressStreetFrom,$cityFrom,$stateFrom,$zipFrom);
                    if(!mysqli_stmt_execute($stmt1)){
                        header("Location: AddVehicle.php?error=sqlerror2");
                        mysqli_rollback($conn);
                        exit();
                    }
                    $fromID = mysqli_insert_id($conn);
                }



                //Now we do exactly the same thing with the destination address.       
                
                /*
                $sql0="SELECT `AddressID`, `Name`, `Street`, `City`, `State`, `ZipCode` FROM Address WHERE `Name`=? AND `Street`=? 
                AND City=? AND `State`=? AND `ZipCode`=?";
                $stmt0 = mysqli_stmt_init($conn);
                if(!mysqli_stmt_prepare($stmt0,$sql0)){
                    header("Location: AddRoute.php?error=sqlerror4");
                    mysqli_rollback($conn);
                    exit();
                }
                else{
                    mysqli_stmt_bind_param($stmt0, "sssss",$addressNameTo,$addressStreetTo,$cityTo,$stateTo,$zipTo);
                    if(!mysqli_execute($stmt0)){
                        header("Location: AddRoute.php?error=sqlerror5");
                        mysqli_rollback($conn);
                        exit();
                    }
                    
                    $resultCheck = mysqli_stmt_num_rows($stmt0);
                    if ($resultCheck > 0){
                        $row = mysqli_stmt_get_result($stmt0);
                        if($row = mysqli_fetch_assoc($result)){
                            $toID = $row['AddressID'];
                        }

                    }else{
                        $sql1 = "INSERT INTO `address`(`Name`, `Street`, `City`, `State`, `ZipCode`) 
                        VALUES (?,?,?,?,?) ";
                        $stmt1 = mysqli_stmt_init($conn);
                        if(!mysqli_stmt_prepare($stmt1,$sql1)){
                            header("Location: AddRoute.php?error=sqlerror6");
                            mysqli_rollback($conn);
                            exit();
                        }
                        else{
                            mysqli_stmt_bind_param($stmt1, "sssss",$addressNameFrom,$addressStreetFrom,$cityFrom,$stateFrom,$zipFrom);
                            if(!mysqli_execute($stmt1)){
                                header("Location: AddRoute.php?error=sqlerror7");
                                mysqli_rollback($conn);
                                exit();
                            }
                            $toID = mysqli_insert_id($conn);
                        }

                    }
                    mysqli_stmt_close($stmt0);
                    mysqli_stmt_close($stmt1);
                }   

                */

                $sql2="INSERT INTO `address`(`Name`, `Street`, `City`, `State`, `ZipCode`) VALUES (?,?,?,?,?);";
                $stmt2 = mysqli_stmt_init($conn);
                if(!mysqli_stmt_prepare($stmt2,$sql2)){
                    header("Location: AddRoute.php?error=sqlerror7");
                    mysqli_rollback($conn);
                    exit();
                }
                else{
                    mysqli_stmt_bind_param($stmt2, "sssss",$addressNameTo,$addressStreetTo,$cityTo,$stateTo,$zipTo);
                    if(!mysqli_stmt_execute($stmt2)){
                        header("Location: AddVehicle.php?error=sqlerror7");
                        mysqli_rollback($conn);
                        exit();
                    }
                    $toID = mysqli_insert_id($conn);
                }

                //TODO: verify that DriverID is valid.

                //Now we get our bitstring from the day-of-the-week checkboxes.

                $daysOfWeek = "";
                //TODO: optimize. This could be done much more efficiently.
                if(in_array("Sun",$daysChecked)){
                    $daysOfWeek .= "1";
                }else{
                    $daysOfWeek .= "0";
                }
                if(in_array("Mon",$daysChecked)){
                    $daysOfWeek .= "1";
                }else{
                    $daysOfWeek .= "0";
                }
                if(in_array("Tue",$daysChecked)){
                    $daysOfWeek .= "1";
                }else{
                    $daysOfWeek .= "0";
                }
                if(in_array("Wed",$daysChecked)){
                    $daysOfWeek .= "1";
                }else{
                    $daysOfWeek .= "0";
                }
                if(in_array("Thu",$daysChecked)){
                    $daysOfWeek .= "1";
                }else{
                    $daysOfWeek .= "0";
                }
                if(in_array("Fri",$daysChecked)){
                    $daysOfWeek .= "1";
                }else{
                    $daysOfWeek .= "0";
                }
                if(in_array("Sat",$daysChecked)){
                    $daysOfWeek .= "1";
                }else{
                    $daysOfWeek .= "0";
                }

                //We also need to verify that the vehicle truly exists,
                //and grab its capacity.
                $sql3="SELECT `VehicleID`, `MaxCapacity` FROM Vehicle  WHERE `VehicleID`=?";
                $stmt3 = mysqli_stmt_init($conn);
                if(!mysqli_stmt_prepare($stmt3,$sql3)){
                    header("Location: AddRoute.php?error=sqlerror8");
                    mysqli_rollback($conn);
                    exit();
                }
                else{
                    mysqli_stmt_bind_param($stmt3, "i",$vehicleID);
                    if(!mysqli_execute($stmt3)){
                        header("Location: AddRoute.php?error=sqlerror9");
                        mysqli_rollback($conn);
                        exit();
                    }
                    mysqli_stmt_store_result($stmt3);
                    $resultCheck = mysqli_stmt_num_rows($stmt3);
                    if ($resultCheck > 0){
                        mysqli_stmt_bind_result($stmt3, $vehicleID, $capacity);
                        if(!mysqli_stmt_fetch($stmt3)){
                            header("Location: AddRoute.php?error=sqlerror10");
                            mysqli_rollback($conn);
                            exit();
                        }

                    }else{
                                header("Location: AddRoute.php?error=wrongvehicle");
                                mysqli_rollback($conn);
                                exit();

                    }
                    mysqli_stmt_close($stmt0);
                    mysqli_stmt_close($stmt1);
                    mysqli_stmt_close($stmt2);
                    mysqli_stmt_close($stmt3);
                }

                //And now we have all the info we need; let's shove it into the database.

                

                $sqlfinal = "INSERT INTO `route`(`Vehicle`, `FromAddress`, `ToAddress`, `DepartureTime`, `ArrivalTime`, `MileDistance`, `SeatsLeft`, `DaysOfWeek`) VALUES (?,?,?,?,?,?,?,?)";
                $stmtfinal = mysqli_stmt_init($conn);
                if(!mysqli_stmt_prepare($stmtfinal,$sqlfinal)){
                    header("Location: AddRoute.php?error=sqlerror11");
                    mysqli_rollback($conn);
                    exit();
                }
                else{
                    mysqli_stmt_bind_param($stmtfinal,"iiissiis",$vehicleID,$fromID,$toID,$depTime,$arrTime,$distance,$capacity,$daysOfWeek);
                    if(!mysqli_stmt_execute($stmtfinal)){
                        header("Location: AddRoute.php?error=sqlerror12");
                        mysqli_rollback($conn);
                        exit(); 
                    }
                    $routeID = mysqli_insert_id($conn);
                }
                mysqli_stmt_close($stmtfinal);

                //Finally we pop the driver into the DriverToRoutes table.
                $sqldriver = "INSERT INTO `DriverToRoutes`(`UserID`, `RouteID`) VALUES (?,?);";
                $stmtdriver = mysqli_stmt_init($conn);
                if(!mysqli_stmt_prepare($stmtdriver,$sqldriver)){
                    header("Location: AddRoute.php?error=sqlerror13");
                    mysqli_rollback($conn);
                    exit();
                }
                else{
                    mysqli_stmt_bind_param($stmtdriver,"ii",$driverID,$routeID);
                    if(mysqli_stmt_execute($stmtdriver)){
                        header("Location: AddRoute.php?create=success");
                        mysqli_commit($conn);
                    }else{
                        header("Location: AddRoute.php?error=sqlerror14");
                        mysqli_rollback($conn);
                        exit(); 
                    }
                }

                mysqli_stmt_close($stmtdriver);

                //TODO: just make it a Route attribute. It's not a many to many!
                // (Multiple drivers can't ride one route!!)
            }
            else{
                header("Location: AddRoute.php?error=sqlerror15");
                exit();
            }           

            mysqli_close($conn);
        }
    }
    else{
        header("Location: AddRoute.php?error=internalerror");
        exit();
    }
?>