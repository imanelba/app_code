<?php
include "connexion_database.php";

if (isset($_GET['type'])) {
    $type = $_GET['type'];

    if ($type === "patient" && isset($_GET['ID'])) {
        $id = $_GET['ID'];
       
        $stmt = $conn->prepare("DELETE FROM `patient` WHERE `ID_PATIENT` = ?");
        $stmt->bind_param("i", $id);

        if ($stmt->execute()) {
            echo "Patient supprimé avec succès.";
        } else {
            echo "Erreur lors de la suppression du patient : " . $stmt->error;
        }

        $stmt->close();
    } elseif ($type === "rdv" && isset($_GET['ID'])) {
        $id = $_GET['ID'];
       
        $stmt = $conn->prepare("DELETE FROM `rdv` WHERE `ID_RDV` = ?");
        $stmt->bind_param("i", $id);

        if ($stmt->execute()) {
            echo "Rendez-vous supprimé avec succès.";
        } else {
            echo "Erreur lors de la suppression du rendez-vous : " . $stmt->error;
        }

        $stmt->close();
    }
}

$conn->close();
?>
