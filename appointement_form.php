<!DOCTYPE html>
<html>
<head>
    <title>Appointment Form</title>
</head>
<body>
<?php
    include "connexion_database.php";

    if (isset($_GET['ID_RDV'])) {
        $id = $_GET['ID_RDV'];

        $sql = "SELECT * FROM `rdv` WHERE `ID_RDV` = '$id'";
        $result = $conn->query($sql);

        if ($result->num_rows === 1) {
            $appointmentData = $result->fetch_assoc();

            $patientId = $appointmentData['PATIENT_ID'];
            $patientInfoQuery = "SELECT FIRST_NAME, LAST_NAME FROM `patient` WHERE `ID_PATIENT` = '$patientId'";
            $patientInfoResult = $conn->query($patientInfoQuery);

            if ($patientInfoResult->num_rows === 1) {
                $patientInfo = $patientInfoResult->fetch_assoc();
                $patientFirstName = $patientInfo['FIRST_NAME'];
                $patientLastName = $patientInfo['LAST_NAME'];
            }
?>
            <form action="update.php?type=appointment&ID=<?php echo $_GET['ID_RDV']; ?>" method="post">
                <p>Nom du patient : <?php echo $patientFirstName . ' ' . $patientLastName; ?></p>
                <label for="DATE">Date:</label>
                <input type="text" name="DATE" value="<?php echo $appointmentData['DATE']; ?>"><br>
                <label for="BEGINING_TIME">Begining Time:</label>
                <input type="text" name="BEGINING_TIME" value="<?php echo $appointmentData['BEGINING_TIME']; ?>"><br>
                <label for="END_TIME">End Time:</label>
                <input type="date" name="END_TIME" value="<?php echo $appointmentData['END_TIME']; ?>"><br>
                <label for="MOTIVE">Motive:</label>
                <input type="text" name="MOTIVE" value="<?php echo $appointmentData['MOTIVE']; ?>"><br>
                <input type="submit" name="submit_update_appointment" value="Update">
            </form>
<?php
        } 
    } else {
?>
        <form action="create.php?type=appointment" method="post">
            <label for="patient_id">Patient:</label>
            <select name="patient_id" id="patient_id">
                <?php
                    $patientsQuery = "SELECT ID_PATIENT, FIRST_NAME, LAST_NAME FROM `patient`";
                    $patientsResult = $conn->query($patientsQuery);

                    while ($patient = $patientsResult->fetch_assoc()) {
                        echo '<option value="' . $patient['ID_PATIENT'] . '">' . $patient['FIRST_NAME'] . ' ' . $patient['LAST_NAME'] . '</option>';
                    }
                ?>
            </select><br>
            <label for="DATE">Date:</label>
            <input type="text" name="DATE" placeholder="Date"><br>
            <label for="BEGINING_TIME">Begining Time:</label>
            <input type="text" name="BEGINING_TIME" placeholder="Begining Time"><br>
            <label for="END_TIME">End Time:</label>
            <input type="date" name="END_TIME" placeholder="End Time"><br>
            <label for="MOTIVE">Motive:</label>
            <input type="text" name="MOTIVE" placeholder="Motive"><br>
            <input type="submit" name="submit_create_appointment" value="Submit">
        </form>
<?php
    }
?>
</body>
</html>
