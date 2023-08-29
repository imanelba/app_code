<?php 

include "con_database.php";

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

            <li><a href="consultation_page.php">Consultation</a></li>

            <li><a href="deconnexion_page.php">Logout</a></li>
      
          </ul>
      </nav>
</header>

<body>

    <div class="container">

        <h2>Consultation List</h2>
        <h1><a href="consultattation_form.php?type=consultation">Add Consultation</a></h1>

<table class="table">

    <thead>

        <tr>

        <th>Height</th>

        <th>Weight</th>

        <th>Age</th>

        <th>Blood Type</th>

        <th>Allergy</th>

        <th>Previous Diseases</th>

        <th>Disease</th>

        <th>Treatement</th>

        <th>Conclusion</th>



    </tr>

    </thead>

    <tbody> 

        <?php
        

            if ($result && $result->num_rows > 0) {

                while ($row = $result->fetch_assoc()) {

        ?>

                    <tr>

                    <td><?php echo $row['HEIGHT']; ?></td>

                    <td><?php echo $row['WEIGHT']; ?></td>

                    <td><?php echo $row['AGE']; ?></td>

                    <td><?php echo $row['BLOOD_TYPE']; ?></td>

                    <td><?php echo $row['ALLERGY']; ?></td>

                    <td><?php echo $row['PREVIOUS_DISEASES']; ?></td>

                    <td><?php echo $row['DISEASE']; ?></td>

                    <td><?php echo $row['TREATEMENT']; ?></td>

                    <td><?php echo $row['CONCLUSION']; ?></td>

                    <td><a class="btn btn-info" href="update.php?ID=<?php echo $row['ID_CONSU']; ?>">Edit</a>&nbsp;<a class="btn btn-danger" href="delete.php?type=consu&ID=<?php echo $row['ID_CONSU']; ?>">Delete</a></td>

                    </tr>                       

        <?php       }

            }

        ?>                

    </tbody>

</table>

    </div> 

</body>

</html>