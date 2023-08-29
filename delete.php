<?php
include "con_database.php";

if (isset($_GET['type'])) {
    $type = $_GET['type'];

    if ($type === "patient" && isset($_GET['ID'])) {
        $id = $_GET['ID'];

        if (isset($_GET['confirm']) && $_GET['confirm'] === "true") {
            $stmt = $conn->prepare("DELETE FROM `patient` WHERE `ID_PATIENT` = ?");
            $stmt->bind_param("i", $id);

            if ($stmt->execute()) {
                echo "Patient supprimé avec succès.";
            } else {
                echo "Erreur lors de la suppression du patient : " . $stmt->error;
            }

            $stmt->close();
        } else {
            echo '<script>
                    var result = confirm("Êtes-vous sûr de vouloir supprimer ce patient ?");
                    if (result) {
                        window.location.href = "delete.php?type=patient&ID=' . $id . '&confirm=true";
                    } else {
                        window.location.href = "patient_page.php";
                    }
                  </script>';
        }
    } elseif ($type === "rdv" && isset($_GET['ID'])) {
        $id = $_GET['ID'];

        if (isset($_GET['confirm']) && $_GET['confirm'] === "true") {
            $stmt = $conn->prepare("DELETE FROM `rdv` WHERE `ID_RDV` = ?");
            $stmt->bind_param("i", $id);

            if ($stmt->execute()) {
                echo "Rendez-vous supprimé avec succès.";
            } else {
                echo "Erreur lors de la suppression du rendez-vous : " . $stmt->error;
            }

            $stmt->close();
        } else {
            echo '<script>
                    var result = confirm("Êtes-vous sûr de vouloir supprimer ce rendez-vous ?");
                    if (result) {
                        window.location.href = "delete.php?type=rdv&ID=' . $id . '&confirm=true";
                    } else {
                        window.location.href = "appointement_page.php";
                    }
                  </script>';
        }
    }
    elseif ($type === "consultation" && isset($_GET['ID'])) {
        $id = $_GET['ID'];

        if (isset($_GET['confirm']) && $_GET['confirm'] === "true") {
            $stmt = $conn->prepare("DELETE FROM `consultation` WHERE `ID_CONSU` = ?");
            $stmt->bind_param("i", $id);

            if ($stmt->execute()) {
                echo "Consultation supprimé avec succès.";
            } else {
                echo "Erreur lors de la suppression de la consultation : " . $stmt->error;   //_3ewdi smiyat
            }

            $stmt->close();
        } else {
            echo '<script>
                    var result = confirm("Êtes-vous sûr de vouloir supprimer cette consultation ?");
                    if (result) {
                        window.location.href = "delete.php?type=consultation&ID=' . $id . '&confirm=true";
                    } else {
                        window.location.href = "consultation_page.php";
                    }
                  </script>';
        }
    }
}

$conn->close();
?>
