<?php
session_start();

$username = $_POST['username'];
$pass  = $_POST['pass'];

//$conexao = mysqli_connect("localhost","root","mysqluser","formulario") or print (mysqli_error());
 $conexao =  mysqli_connect("localhost","rafael","1234","formulario"); 

$query = "SELECT * FROM form WHERE username='$username'";
//if(password_verify($password, $hashed_password)) {

if ($result=mysqli_query($conexao, $query)) {

  $linha = mysqli_fetch_array($result); // array com resultados
  
  if(!empty($linha)){
    $hashed_password = $linha['pass']; // pegando senha q ta no array
    echo $pass;
    echo $hashed_password;
    if(password_verify($pass, $hashed_password)) {
        $_SESSION['username'] = $linha['username'];
        $_SESSION['email'] = $linha['email'];
        $_SESSION['code'] = $linha['code'];
        header("Location: home.php");
    }else{
        unset($_SESSION['username']);
        unset($_SESSION['email']);
        unset($_SESSION['code']);
        echo "senha errada";
        
    }
  }else{
    unset($_SESSION['username']);
    unset($_SESSION['email']);
    unset($_SESSION['code']);
    echo " vazio";
  }
   
} 
?>