<?php 

include "con_database.php";

include "search_patient.php"; 

$sql = "SELECT * FROM patient";

$result = $conn->query($sql);

?>

<!DOCTYPE html>

<html>

<head>

    <title>Patient Page</title>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">

<link rel="stylesheet" type="text/css" href="patient_style.css">

</head>

<header>
    <img class="i" src="imgg/logo.png" alt="">
      <nav>
          <ul>
             <li><a href="patient_page.php">Patient</a></li>

            <li><a href="appointement_page.php">Appointement</a></li>

            <li><a href="consultation_page.php">Consultation</a></li>

            <li><a href="deconnexion_page.php">Logout</a></li>
      
          </ul>
      </nav>
</header>


<body>

    <div class="container">

        <h2>Patient list</h2>
        <h1><a href="patient_form.php?type=patient">Add Patient</a></h1>

        <form action="patient_page.php" method="GET" class="form-inline">
        <div class="form-group">
            <label for="search">Search :</label>
            <input type="text" name="search" class="form-control" id="search" placeholder="Search a name">
        </div>
        <button type="submit" class="btn btn-primary">Rechercher</button>
    </form>




<table class="table">

    <thead>

        <tr>

        <th>ID</th>

        <th>First Name</th>

        <th>Last Name</th>

        <th>Birth date</th>

        <th>gender</th>

        <th>Cin</th>

        <th>Address</th>

        <th>Email</th>

        <th>Phone Number</th>

        <th>Health Insurance</th>

        <th>Emergency Contact</th>

        <th>Emergency Number</th>

        

        

        </tr>

    </thead>

    <tbody> 

        <?php

            if ($result->num_rows > 0) {

                while ($row = $result->fetch_assoc()) {

        ?>

                    <tr>

                    <td><?php echo $row['ID_PATIENT']; ?></td>

                    <td><?php echo $row['FIRST_NAME']; ?></td>

                    <td><?php echo $row['LAST_NAME']; ?></td>

                    <td><?php echo $row['YEAR_OF_BIRTH']; ?></td>

                    <td><?php echo $row['GENDER']; ?></td>

                    <td><?php echo $row['CIN']; ?></td>

                    <td><?php echo $row['ADDRESS']; ?></td>

                    <td><?php echo $row['EMAIL']; ?></td>

                    <td><?php echo $row['PHONE_NUMBER']; ?></td>

                    <td><?php echo $row['HEALTH_INSURANCE']; ?></td>

                    <td><?php echo $row['EMERGENCY_CONTACT']; ?></td>

                    <td><?php echo $row['EMERGENCY_NUMBERR']; ?></td>


                    

                    <td><a class="btn btn-info" href="update.php?ID=<?php echo $row['ID_PATIENT']; ?>">Edit</a>&nbsp;<a class="btn btn-danger" href="create.php?type=consultation&ID=<?php echo $row['ID_PATIENT']; ?>">C</a>&nbsp;<a class="btn btn-danger" href="delete.php?type=patient&ID=<?php echo $row['ID_PATIENT']; ?>">Delete</a</td>

                    </tr>                       

        <?php       }

            }

        ?>                

    </tbody>

</table>

    </div> 

</body>

</html>