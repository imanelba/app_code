<?php

include "con_database.php";

if (isset($_GET['search'])) {
    $search_query = $_GET['search'];
    $sql = "SELECT * FROM patient WHERE LAST_NAME LIKE '%$search_query%' OR FIRST_NAME LIKE '%$search_query%'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
           
            echo "<p>Nom: " . $row['LAST_NAME'] . ", Prénom: " . $row['FIRST_NAME'] . "</p>";
        }
    } else {
        echo "Aucun résultat trouvé.";
    }
}

//$conn->close();
?>
