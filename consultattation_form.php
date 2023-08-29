<!DOCTYPE html>
<html>
<head>
    <title>Consultation Form</title>
</head>
<body>
<?php
   
   include "con_database.php";

    if (isset($_GET['ID_PATIENT'])) {
        $id = $_GET['ID_PATIENT'];

        $sql = "SELECT * FROM `consultation` WHERE `ID_CONSU` = '$id'";
        $result = $conn->query($sql);

        if ($result->num_rows === 1) {
            $patientData = $result->fetch_assoc();

           
?>
        <form action="update.php?type=consultation&ID=<?php echo $_GET['ID_CONSU']; ?>" method="post">

            <input type="hidden" name="type" value="consultation">        

            <label for="HEIGHT">Height:</label>
            <input type="text" name="HEIGHT" value="<?php echo $patientData['HEIGHT']; ?>">

            <label for="WEIGHT">Weight:</label>
            <input type="text" name="WEIGHT" value="<?php echo $patientData['WEIGHT']; ?>">

            <label for="AGE">Age:</label>
            <input type="date" name="AGE" value="<?php echo $patientData['AGE']; ?>">

            <label for="BLOOD_TYPE">Blood Type:</label>
            <input type="text" name="BLOOD_TYPE" value="<?php echo $patientData['BLOOD_TYPE']; ?>">

            <label for="ALLERGY">Allergy:</label>
            <input type="text" name="ALLERGY" value="<?php echo $patientData['ALLERGY']; ?>">

            <label for="PREVIOUS_DISEASES">Previous Diseases:</label>
            <input type="text" name="PREVIOUS_DISEASES" value="<?php echo $patientData['PREVIOUS_DISEASES']; ?>">

            <label for="DISEASE"> Disease:</label>
            <input type="text" name="DISEASE" value="<?php echo $patientData['DISEASE']; ?>">

            <label for="EMAIL">Email:</label>
            <input type="email" name="EMAIL" value="<?php echo $patientData['EMAIL']; ?>">

            <label for="PHONE_NUMBER">Phone Number:</label>
            <input type="text" name="PHONE_NUMBER" value="<?php echo $patientData['PHONE_NUMBER']; ?>">

            <label for="CONCLUSION">CConclusion:</label>
            <input type="text" name="CONCLUSION" value="<?php echo $patientData['CONCLUSION']; ?>">

            
            
            <input type="submit" name="submit_update_consultation" value="Update">
        </form>
<?php
        } 
    } else {
?>
    <form action="create.php?type=consultation"   method="post">

        <input type="hidden" name="type" value="consultation">

        <label for="HEIGHT">Height:</label>
        <input type="text" name="HEIGHT" placeholder="Height">

        <label for="WEIGHT">Weight:</label>
        <input type="text" name="WEIGHT" placeholder="weight">

        <label for="AGE">Age:</label>
        <input type="date" name="AGE" placeholder="age">

        <label for="BLOOD_TYPE">Blood Type:</label>
        <input type="text" name="BLOOD_TYPE" placeholder="Blood Type">

        <label for="ALLERGY">Allergy:</label>
        <input type="text" name="ALLERGY" placeholder="Allergy">

        <label for="PREVIOUS_DISEASES">Previous Diseases:</label>
        <input type="text" name="PREVIOUS_DISEASES" placeholder="Previous Disease">

        <label for="DISEASE">Disease:</label>
        <input type="email" name="DISEASE" placeholder="Disease">

        <label for="TREATEMENT">Treatement:</label>
        <input type="text" name="TREATEMENT" placeholder="Treatement">

        <label for="CONCLUSION">Conclusion:</label>
        <input type="text" name="CONCLUSION" placeholder="Conclusion">

        
        
        <input type="submit" name="submit_create_consultation" value="Submit">
    </form>
<?php
    }
?>




</body>
</html>