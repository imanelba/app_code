<?php

$servername = "localhost";
$username = "root"; 
$password = ""; 
$dbname = "app_cure"; 


if (isset($_POST['em']) && isset($_POST['pass'])) {
    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $email = $_POST['em'];
    $password = $_POST['pass'];

 
    $email = mysqli_real_escape_string($conn, $email);
    $password = mysqli_real_escape_string($conn, $password);

    $query = "SELECT EMAIL, PASSWORD FROM utilisateur WHERE EMAIL = '$email' AND PASSWORD = '$password'";

    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        session_start(); 
        $_SESSION['user_email'] = $email; 
        header("Location: patient_page.php");
    } else {
        echo "Échec d'authentification";
    }

    $conn->close();
} else {
    echo "";
}
?>
