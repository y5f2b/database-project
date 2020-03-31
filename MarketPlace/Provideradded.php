<html>
<head><title> Add Service Provider </title><head>
<body>

<?php

include 'mpconnection.php';
$conn = Opencon();


if (isset($_POST['ssubmit'])){
    $data_missing = array();
    
   
    if(empty($_POST['pname'])){
        $data_missing[] = 'pname';

    } else {
        $pname = $_POST["pname"];
    }

    if(empty($_POST['bankacc'])){

        $data_missing[] = 'bankacc';
    } else {
        $bankacc = $_POST["bankacc"];
    }

    if(empty($_POST['lang'])){

        $data_missing[] = 'lang';
    } else {
        $lang = $_POST["lang"];
    }

    if (empty($data_missing)){
        
        $query = "INSERT INTO ServiceProvider(name,BankAccount,LanguageSpoken) VALUE(?,?,?)";
        $stmt = mysqli_prepare($conn,$query);

        mysqli_stmt_bind_param($stmt, "sis",$pname,$bankacc,$lang);

        mysqli_stmt_execute($stmt);

        $affected_rows = mysqli_stmt_affected_rows($stmt);

        if ($affected_rows == 1){
            echo 'Welcome! ' . $pname ;

            mysqli_stmt_close($stmt);

            CloseCon($conn);

        } else {
            echo "Error Occurred in Customer 1";
            echo mysqli_error($conn);

            mysqli_stmt_close($stmt);

            CloseCon($conn);
        }

    } else {

       echo "Please Enter All The Fields!";
    }
    

}


?>





</body>
</html>