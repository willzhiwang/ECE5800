<?php
    require "header.php"
?>

<?php
    if (isset($_POST['AddVehicle-submit']))
    {
        require 'configDB.php';

        $licPlate = $_POST['licPlate'];
        $make = $_POST['make'];
        $year = $_POST['year'];
        $model = $_POST['model'];
        $color = $_POST['color'];
        $capacity = $_POST['capacity'];
        
        //TODO: improve form validation

        // All error messages when create an account
        //check if any empty input
        if (empty($licPlate) || empty($make) ||empty($year) 
        || empty($model ) || empty($color) || empty($capacity))
        {
            header("Location: AddVehicle.php?error=emptyfields");
            exit();
        }
        else
        {
            if (mysqli_begin_transaction($conn))
                {
                $sql0="INSERT INTO `Vehicle`(`LicensePlate`, `Year`, `Make`, `Model`, `Color`, `MaxCapacity`) VALUES (?,?,?,?,?,?);";
                $stmt0 = mysqli_stmt_init($conn);
                if(!mysqli_stmt_prepare($stmt0,$sql0)){
                    header("Location: AddVehicle.php?error=sqlerror0");
                    mysqli_rollback($conn);
                    exit();
                }
                else{
                    mysqli_stmt_bind_param($stmt0, "sssssi",$licPlate,$year,$make,$model,$color,$capacity);
                    if(mysqli_stmt_execute($stmt0)){
                        header("Location: AddVehicle.php?create=success");
                        mysqli_commit($conn);
                        exit();
                    }else{
                        header("Location: AddVehicle.php?error=sqlerror0");
                        mysqli_rollback($conn);
                        exit();
                    }
                }
            }
        }
        mysqli_stmt_close($stmt0);
        mysqli_close($conn);
    }
    else{
        header("Location: AddVehicle.php?error=internalerror");
        exit();
    }
?>