<?php 
    include('db_connect.php');
    if (!$conn) 
    { 
        echo "Database connection failed."; 
    } 
    session_start();
    $username = "";
    $usererr = $psworderr = "";
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
        if($_SERVER["REQUEST_METHOD"]=="POST"){
            $huserName = testInput($_POST['name']);
            $hpaword = testInput($_POST['password']);
            if(!empty($huserName)){
                if(preg_match("[az-Az-Z ]",$huserName)){
                    $usererr = "Entet a validate user name";
                    echo "Hefdre";
                }
                else {
                    $query = "SELECT * FROM users WHERE userName='$huserName'"; 
                    $result = mysqli_query($conn, $query); 
                    if ($result) 
                    { 
                        $row = mysqli_num_rows($result); 
                        if ($row = mysqli_fetch_assoc($result)) 
                            { 
                                // print_r($row);
                                $user = $row["userName"];
                                $password = $row["psword"];
                                if($password === $hpaword){
                                    echo "Wellocome";
                                    $data = $user . '/' . $password;
                                    echo $data;
                                    setcookie('data',$data, time() + (86400 * 30), "/");
                                    header("home.php");
                                    exit();
                                    }
                                else {
                                    echo $hpaword;
                                    $psworderr = "Inccorect password";
                                    }
                                } 
                        mysqli_free_result($result); 
                        } 
                }
            } 
        else {
            $usererr = "please fill username";
            if(empty($hpaword)){
                $psworderr = "please fill password";
            }
        }
    }
    mysqli_close($conn);
    ?>
<body>
    <form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post">
    Name: <input type="text" name="name" value=<?php echo $username ;?>>
    <span> <?php echo $usererr;?> </span><p></p>
    Password <input type="password" name="password" >
    <span> <?php echo $psworderr;?> </span>
    <p></p>
    <a href="signup.php">I am new!</a>
    <button type="submit">Sign Up!</button>
    </form>
    <a href="home.php">Click here </a>
</body>
</html>
