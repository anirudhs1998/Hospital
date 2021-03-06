<?php
    if (!isset($_SESSION)) {
        session_start();
    }
?>
<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="jumbotron.css" rel="stylesheet">
<?php
  include 'dheader.php';
  include 'library.php';
  noAccessIfNotLoggedIn();
  noAccessForNormal();
  noAccessForClerk();
  noAccessForAdmin();
  include 'nav-bar.php';
?>
<div class = 'container'>
<h2>Upcomming Appointments</h2>
<p>Click on the the field to fill additional information</p>

<table class='table table-striped text-center '>
  <thead class="thead-inverse">
				<tr>
				<th><center>Appointment No</center></th>
				<th><center>Patient's Full Name</center></th>
				<th><center>Medical Condition</center></th>
				</tr>
	</thead>
<?php
    $name = $_SESSION['name'];
    echo $name;
    $type = $_SESSION['speciality'];
    $result = getPatientsFor($type);
    while ($row = $result->fetch_array()) {
        $status = ' ';
        if (appointment_status((int) $row['app_no']) == 1) {
            $status = 'table-active';
        } elseif (appointment_status((int) $row['app_no']) == 2) {
            $status = 'table-success';
        }
        $link = "<td ><a href= 'update_info.php?app_no=".$row['app_no']."'>";
        $endingTag = '</a></td>';
        echo '<tr class="'.$status.'"> ';
        echo "$link".$row['app_no']."$endingTag";
        echo "$link".$row['name']."$endingTag";
        echo "$link".$row['problem']."$endingTag";
        echo '</tr>';
    }
?>
</table>
</div>
<?php include 'footer.php'; ?>
