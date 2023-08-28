<?php 

include "cconnexion_database.php";

$sql = "SELECT * FROM users";

$result = $conn->query($sql);

?>

<!DOCTYPE html>

<html>

<head>

    <title>Appointement Page</title>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">

<link rel="stylesheet" type="text/css" href="patient_style.css">


</head>

<header>
    <img class="i" src="imgg/logo.png" alt="">
      <nav>
          <ul>
             <li><a href="patient_page.php">Patient</a></li>

            <li><a href="appointement_page.php">Appointement</a></li>

            <li><a href="deconnexion_page.php">Logout</a></li>
      
          </ul>
      </nav>
</header>

<body>

    <div class="container">

        <h2>Appointement List</h2>
        <h1><a href="create.php?type=appointement">Add Appointement</a></h1>

<table class="table">

    <thead>

        <tr>

        <th>First Name</th>

        <th>Last Name</th>

        <th>ID</th>

        <th>Date</th>

        <th>Begining Time</th>

        <th>End Time</th>

        <th>Motive</th>


    </tr>

    </thead>

    <tbody> 

        <?php

            if ($result->num_rows > 0) {

                while ($row = $result->fetch_assoc()) {

        ?>

                    <tr>

                    <td><?php echo $row['FIRST_NAME']; ?></td>

                    <td><?php echo $row['LAST_NAME']; ?></td>

                    <td><?php echo $row['ID_RDV']; ?></td>

                    <td><?php echo $row['DATE']; ?></td>

                    <td><?php echo $row['BEGINING_TIME']; ?></td>

                    <td><?php echo $row['END_TIME']; ?></td>

                    <td><?php echo $row['MOTIVE']; ?></td>

                    <td><a class="btn btn-info" href="update.php?ID=<?php echo $row['ID_RDV']; ?>">Edit</a>&nbsp;<a class="btn btn-danger" href="specific_appointement.php">View</a>&nbsp;<a class="btn btn-danger" href="delete.php?type=rdv&ID=<?php echo $row['ID_RDV']; ?>">Delete</a></td>

                    </tr>                       

        <?php       }

            }

        ?>                

    </tbody>

</table>

    </div> 

</body>

</html>