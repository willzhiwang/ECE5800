<?php
    require "header.php"
?>

<?php
    if (isset($_POST['subscribe-submit']))
    {
        $currentUserID=$_SESSION['UserID'];
        $sql = "SELECT `LastPurchasedMonthly` FROM `User` WHERE `UserID`=$currentUserID";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) > 0) 
        {
            $row = mysqli_fetch_assoc($result);
            $sqltime = $row["LastPurchasedMonthly"];
            $time=strtotime($sqltime);
            $myFormatForView = date("Y-m-d H:i:s", $time);

            date_default_timezone_set("America/Chicago");
            $today = date("Y-m-d H:i:s");

            if ($myFormatForView== "2000-01-01 00:00:00")
            {
                $date= date('Y-m-d H:i:s', strtotime('+1 months'));
                
            }
            else if ($myFormatForView< $today )
            {
                $date= date('Y-m-d H:i:s', strtotime('+1 months'));
            }
            else 
            {
                $date= date('Y-m-d H:i:s', strtotime('+1 months',$time));
            }
        }
                
		$sql2 = "UPDATE `User` SET `LastPurchasedMonthly`='$date' WHERE UserID=$currentUserID";
		$stmt = mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt,$sql2))
        {
            header("Location: subscribe.php?error=sqlerror");
            mysqli_rollback($conn);
            exit();
        }
        mysqli_stmt_execute($stmt);
        header("Location: costandsave.php?subscribe=success");
    } 
?>