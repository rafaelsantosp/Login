<?php
$username = $_POST['username'];
$email = $_POST['email'];
$pass  = password_hash($_POST['pass'],PASSWORD_DEFAULT);
 
//$conexao = mysqli_connect("localhost","root","mysqluser","formulario") or print (mysqli_error());
// GRANT ALL PRIVILEGES ON formulario.* TO 'rafael'@'%' IDENTIFIED BY '1234'; FLUSH PRIVILEGES;
$conexao =  mysqli_connect("localhost","rafael","1234","formulario"); 


$query = "INSERT INTO form (username,email,pass) VALUES ('$username','$email','$pass')";

if (mysqli_query($conexao, $query)) {  
    header("Location: login.php");
} else {
    header("Location: register.html");
}

?>