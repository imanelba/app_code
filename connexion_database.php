<?php

$servername = "localhost";
$username = "root"; 
$password = ""; 
$dbname = "app_cure"; 

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {

    die("Connection failed: " . $conn->connect_error);

}

$email = $_POST['em'];

$password = $_POST['pass'];

$query = "SELECT EMAIL , PASSWORD FROM utilisateur WHERE EMAIL = '$email' AND PASSWORD = '$password' and ID_UTILISATEUR=1 AND ID_UTILISATEUR=2 AND ID_UTILISATEUR=3 AND IS_DOCTOR=TRUE AND IS_DOCTOR=FALSE";

$query = "SELECT EMAIL, PASSWORD FROM utilisateur WHERE EMAIL = '$email' AND PASSWORD = '$password' AND (ID_UTILISATEUR = 1 OR ID_UTILISATEUR = 2 OR ID_UTILISATEUR = 3) AND (IS_DOCTOR = TRUE OR IS_DOCTOR = FALSE)";

$result = $conn->query($query);

if ($result->num_rows > 0) {
   
    session_start(); 
   
    $_SESSION['user_email'] = $email; 
   
    header("Location: patient_page.php");
} else {

    echo "Échec d'authentification";
}


$conn->close();

?> 