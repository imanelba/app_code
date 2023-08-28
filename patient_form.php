<!DOCTYPE html>
<html>
<head>
    <title>Patient Form</title>
</head>
<body>
<?php
   
   include "connexion_database.php";

    if (isset($_GET['ID_PATIENT'])) {
        $id = $_GET['ID_PATIENT'];

        $sql = "SELECT * FROM `patient` WHERE `ID_PATIENT` = '$id'";
        $result = $conn->query($sql);

        if ($result->num_rows === 1) {
            $patientData = $result->fetch_assoc();

           
?>
        <form action="update.php?ID=<?php echo $_GET['ID_PATIENT']; ?>" method="post">

            <label for="FIRST_NAME">First Name:</label>
            <input type="text" name="FIRST_NAME" value="<?php echo $patientData['FIRST_NAME']; ?>">

            <label for="LAST_NAME">Last Name:</label>
            <input type="text" name="LAST_NAME" value="<?php echo $patientData['LAST_NAME']; ?>">

            <label for="YEAR_OF_BIRTH">Birth Date:</label>
            <input type="date" name="YEAR_OF_BIRTH" value="<?php echo $patientData['YEAR_OF_BIRTH']; ?>">

            <label for="GENDER">Gender:</label>
            <input type="text" name="GENDER" value="<?php echo $patientData['GENDER']; ?>">

            <label for="CIN">Cin:</label>
            <input type="text" name="CIN" value="<?php echo $patientData['CIN']; ?>">

            <label for="ADDRESS">Address:</label>
            <input type="text" name="ADDRESS" value="<?php echo $patientData['ADDRESS']; ?>">

            <label for="EMAIL">Email:</label>
            <input type="email" name="EMAIL" value="<?php echo $patientData['EMAIL']; ?>">

            <label for="PHONE_NUMBER">Phone Number:</label>
            <input type="text" name="PHONE_NUMBER" value="<?php echo $patientData['PHONE_NUMBER']; ?>">

            <label for="HEALTH_INSURANCE">Health Insurance:</label>
            <input type="text" name="HEALTH_INSURANCE" value="<?php echo $patientData['HEALTH_INSURANCE']; ?>">

            <label for="EMERGENCY_CONTACT">Emergency Contact:</label>
            <input type="text" name="EMERGENCY_CONTACT" value="<?php echo $patientData['EMERGENCY_CONTACT']; ?>">

            <label for="EMERGENCY_NUMBERR">Emergency Numberr:</label>
            <input type="text" name="EMERGENCY_NUMBERR" value="<?php echo $patientData['EMERGENCY_NUMBERR']; ?>">
            
            <input type="submit" name="submit_update_patient" value="Update">
        </form>
<?php
        } 
    } else {
?>
    <form action="create.php" method="post">

        <label for="FIRST_NAME">First Name:</label>
        <input type="text" name="FIRST_NAME" placeholder="First Name">

        <label for="LAST_NAME">Last Name:</label>
        <input type="text" name="LAST_NAME" placeholder="Last Name">

        <label for="YEAR_OF_BIRTH">Birth Date:</label>
        <input type="date" name="YEAR_OF_BIRTH" placeholder="birth date">

        <label for="GENDER">Gender:</label>
        <input type="text" name="GENDER" placeholder="gender">

        <label for="CIN">Cin:</label>
        <input type="text" name="CIN" placeholder="cin">

        <label for="ADDRESS">Address:</label>
        <input type="text" name="ADDRESS" placeholder="address">

        <label for="EMAIL">Email:</label>
        <input type="email" name="EMAIL" placeholder="email">

        <label for="PHONE_NUMBER">Phone Number:</label>
        <input type="text" name="PHONE_NUMBER" placeholder="phone number">

        <label for="HEALTH_INSURANCE">Health Insurance:</label>
        <input type="text" name="HEALTH_INSURANCE" placeholder="health insurance">

        <label for="EMERGENCY_CONTACT">Emergency Contact:</label>
        <input type="text" name="EMERGENCY_CONTACT" placeholder="emergency contact">

        <label for="EMERGENCY_NUMBERR">Emergency Number:</label>
        <input type="text" name="EMERGENCY_NUMBERR" placeholder="emergency number">
        
        <input type="submit" name="submit_create_patient" value="Submit">
    </form>
<?php
    }
?>




</body>
</html>
