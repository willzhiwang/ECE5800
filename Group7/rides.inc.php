<?php
    session_start();

    if (isset($_POST['delete-submit']))
    {
        require 'configDB.php';
        $user = $_SESSION['userType'];
        $userid = $_SESSION['UserID'];
        $routeId = $_POST['delete-submit']; // selected route id
        //echo $id. "id    ";
        //echo "user ID ".$userid. "RouteID  ".$routeId ;

        if ($user = "passanger")
        {
            $sql = "DELETE FROM PassengerToRoutes WHERE UserID = $userid AND RouteID = $routeId";
            $stmt = mysqli_stmt_init($conn);
            if(!mysqli_stmt_prepare($stmt,$sql))
            {
                header("Location: rides.php?error=sqlerrordelete");
                mysqli_rollback($conn);
                exit();
            }
            mysqli_stmt_execute($stmt);
            //Route SeatsLeft ++1
            $sql2 = "UPDATE Route SET  SeatsLeft= SeatsLeft + 1 WHERE RouteID = $routeId";
            $stmt = mysqli_stmt_init($conn);
            if(!mysqli_stmt_prepare($stmt,$sql2))
            {
                header("Location: rides.php?error=sqlerroraddseat");
                mysqli_rollback($conn);
                exit();
            }
            mysqli_stmt_execute($stmt);
            //echo ("<script>alert('Remove Success!')</script>");
            //echo("<script>window.location = 'rides.php';</script>");
            header("Location: rides.php?rides=success");
        }

        if ($user = "admin")
        {
            
        }
        mysqli_stmt_close($stmt);
        mysqli_close($conn);
    }
?>