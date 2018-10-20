<?php
    if(!isset($_SESSION))
    {
        session_start();
    }
?>
<link href="bootstrap.min.css" rel="stylesheet">
<?php
  include("header.php");
  include("library.php");
  noAccessIfNotLoggedIn();
  noAccessForNormal();
  noAccessForClerk();
  noAccessForAdmin();
  include("nav-bar.php");
?>
<div class="container">
<h2>Update Patient Info </h2>
<p>Enter Information Below</p>
<table class="table table-striped">
<?php
  if(isset($_POST['upSugg'])){
      $i = update_appointment_info($_POST['app_no'], 'doctors_suggestion', $_POST['upSugg']);
      $j = update_appointment_info($_POST['app_no'],'amount',$_POST['pay']);
      if($i==1){
        echo "<script type='text/javascript'>window.location = 'patient_info.php'</script>";
      }
       if($j==1){
        echo "<script type='text/javascript'>window.location = 'patient_info.php'</script>";
      }
    

  }
  if(isset($_GET['app_no'])){
    $appointment_no = $_GET['app_no'];
    $result = getAllPatientDetail($appointment_no);
    while($row = $result->fetch_array())
    {
      $link = "<tr><th>";
      $mid = "</th><td>";
      $endingTag = "</td></tr>";
      echo "<tr>";   // appointment_no, full_name, dob, weight, phone_no, address, blood_group, medical_condition
      echo "$link Appointment No $mid". $row['app_no'] . "$endingTag";
      echo "$link Full Name $mid" . $row['name'] . "$endingTag";
      echo "$link Age (in years) $mid" . $row['age'] . "$endingTag";
      echo "$link Weight $mid" . $row['weight'] . "$endingTag";
      echo "$link Phone No $mid" . $row['phone'] . "$endingTag";
      echo "$link Address $mid" . $row['address'] . "$endingTag";
      echo "$link Medical Condition - $mid" . $row['problem'] . "$endingTag";
      echo "$link Payment - $mid" . "<form action='update_info.php' method='post'><textarea class='form-group form-control' name='pay' style='resize: none;''></textarea><input type='number' style='visibility: hidden; width: 1px;' name='app_no' value=". $appointment_no . ">" . "$endingTag";
      echo "$link Doctor's Suggestions - $mid" . "<form action='update_info.php' method='post'><textarea class='form-control' name='upSugg' style='resize: none;'></textarea><input type='number' style='visibility: hidden; width; 1px;' name='app_no' value =". $appointment_no . "><input type='submit' class='btn btn-primary' action='update_info.php'></form>" . "$endingTag";
      echo "</tr>";
    }
  }
?>



</table>
</div>
<?php include("footer.php");?>