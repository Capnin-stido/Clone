<?php
$name = $email = $pword = $conpword = '';
$nameerr = $emailerr = $pworderr  = '';
$validate = TRUE;
function testInput($data){
    $data = trim($data);
    $data = stripcslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}


if ($_SERVER["REQUEST_METHOD"]=="POST"){
    $hname = testInput($_POST['name']);
    $hemail = testInput($_POST['email']);
    $hpword = testInput($_POST['pword']);
    $hconpword = testInput($_POST['conpword']);

    if(preg_match("[a-zA-Z ]",$hname)){
        $nameerr = "Enter your valdate name";
        $validate = FALSE;
    } else{
        $name= $hname;
        if(strlen($hname)>2 & strlen($hname)<20){
            echo "user is a idi";
        } else {
            echo strlen($hname);
            $hname = FALSE; 
            echo "Name length must be bigger 2 than or smaller than 20";
                } 

    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form valdatetion</title>
</head>
<body>

<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"> 
    Name: <input type="text"  name='name' value=<?php echo $name;?>>
    <span><?php echo $nameerr;?></span><br>
    Email: <input type="email" name='email' value=<?php echo $email;?>>
    <span><?php echo $emailerr;?></span><br>
    Password: <input type="password" name='pword' value=<?php echo $pword;?>>
    <span><?php echo $pworderr;?></span><br>
    Conform Password: <input type="text" name='conpword' value=<?php echo $conpword;?>><br>
    <button type="submit">Submit</button>
</form>
<p></p>
<?php 
if($validate == TRUE){
    if(empty($name)){
    echo "Name: " . $name;
    echo "Email: " . $email;
    echo "Password: " . $pword;
    }
}
?>

<form action="" method="POST">
    <input type="submit" value="0" name="mybutton">
    <input type="submit" value="1" name="mybutton">
    <input type="submit" value="2" name="mybutton">
</form>
<?php 
   if (isset($_POST["mybutton"]))
   {
       echo $_POST["mybutton"];
   }
?>


<p>
Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of "de Finibus Bonorum et Malorum" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, "Lorem ipsum dolor sit amet..", comes from a line in section 1.10.32.
The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from "de Finibus Bonorum et Malorum" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.
</p>
</body>
</html>