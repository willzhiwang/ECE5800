<?php
    require "header.php"
?>

<?php
    if (isset($_POST['subscribe-submit']))
    {
        //$date= $_POST['subscribe-submit'];
        $date= date('Y-m-d H:i:s', strtotime('+1 months'));
        
        //echo "Date until: ".$date;
        $currentUserID=$_SESSION['UserID'];
        
		$sql = "UPDATE `User` SET `LastPurchasedMonthly`='$date' WHERE UserID=$currentUserID";
		$stmt = mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt,$sql))
        {
            header("Location: subscribe.php?error=sqlerror");
            mysqli_rollback($conn);
            exit();
        }
        mysqli_stmt_execute($stmt);
        header("Location: costandsave.php?subscribe=success");
    } 
?>