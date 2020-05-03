
<?php 
    include('db_connect.php');
    $username = $useremail= $userpassword = $cpassword ="";
    $usererr = $emailerr = $passworderr = $conPsworderr ="";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<?php 

function testInput($data){
    $data = trim($data);
    $data = stripslashes($data);
    $data  = htmlspecialchars($data);
    return $data;
}

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $username = testInput($_POST["username"]);
    $useremail = testInput($_POST["email"]);
    $userpassword = testInput($_POST["password"]);
    $cpassword = testInput($_POST["cpassword"]);
    
    if(empty($username)){
        $uservalidate = FALSE;
        $usererr = "Enter your name";
        } else {
            if(!preg_match("[aZ-zA-Z ]",$username)){
                if(strlen($username)>2 & strlen($username)<20){
                    $userCheck = "SELECT * FROM users WHERE userName='$username'";
                        if(!mysqli_query($conn, $userCheck)){
                        $usererr = "This user name already there";
                        $uservalidate = FALSE;
                        } else {
                            $uservalidate = TRUE;
                            }
                } else {
                    echo strlen($username);
                    $uservalidate = FALSE; 
                    $usererr = "Name length must be bigger 2 than or smaller than 20";
                        } 

            } else {
                $usererr = "Enter a validate name";
                $uservalidate = FALSE;
                    }
                }  
    if(empty($userpassword)){
        $passvalidate = FALSE;
        $passworderr = "Fill password";
    } else {
        if(! $userpassword == $cpassword){
            $passvalidate = FALSE;
            $passworderr = "Password don't match with conform password";
        } else {
            if(strlen($userpassword) < 2 || strlen($userpassword)>20){
                $passvalidate = FALSE;
                $passworderr = "Password length must be bigger 2 than or smaller than 20";
            } else {
                $passvalidate = TRUE;
            }
        }
    }
    if(!empty($useremail)){
        if(filter_var($useremail,FILTER_VALIDATE_EMAIL)){
            $emailCheck = "SELECT * FROM users WHERE userEmail='$useremail'";
            if(!mysqli_query($conn, $emailCheck)){
                $emailerr = "This user Email  already there";
                $emailvalidate = FALSE;
            } else {
                $emailvalidate = TRUE;
            }
        }   
    } else {
        $emailvalidate = FALSE;
        $emailerr = "Fill email";
    }

    if(!empty($cpassword)){
        $convalidate = TRUE;
    } else {
        $convalidate = FALSE;
        $conPsworderr = "please fill conform password";
    }

    if($uservalidate == TRUE & $emailvalidate == 1 & $passvalidate == 1 & $convalidate == 1){
        echo "Hello" . "<br>";

        $add = "INSERT INTO users (id, userName, userEmail, psword, avater, followed) VALUES (NULL, '$username', '$useremail', '$userpassword', 'avater.png', NULL)";
        if(mysqli_query($conn,$add)){
            echo $username . " was add to database";
        } else {
            echo "Some thing went wrong please try again";
        }
    } else {
        echo "Try again";
    } 
}

?>
<body>
    <form action=" <?php echo $_SERVER["PHP_SELF"]; ?> " method="post">
    Your Name: <input type="text" name="username" value= <?php echo $username; ?>>
    <span> <?php echo $usererr;?> </span>
    <p></p>
    Your Email: <input type="email" name="email" value= <?php echo $useremail; ?>>
    <span> <?php echo $emailerr;?> </span>
    <p></p>
    Your password: <input type="password" name="password" value= <?php echo $userpassword; ?>>
    <span> <?php echo $passworderr;?> </span>
    <p></p>
    Your conform password: <input type="password" name="cpassword" value= <?php echo $cpassword; ?>>
    <span> <?php echo $conPsworderr;?> </span>
    <p></p>
    <button type="submit">Login</button>
    </form>
</body>
<?php 
    mysqli_close($conn);
?>
</html>