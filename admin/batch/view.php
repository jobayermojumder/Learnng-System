﻿<?php

include_once '../../include/config.php';
include_once '../../include/auth.php';
if($_SESSION['user_type']!='Admin'){
  header("location: ../../index.php");
}
?>

<?php
 mysql_query ("set character_set_results='utf8'");
 $sql="SELECT * FROM settings WHERE id=1";
 $result=mysql_query($sql);
 $row=mysql_fetch_array($result)
?>

<!DOCTYPE html>
<html>
<title>Batch Details | <?php echo $row['stitle'] ?></title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="../../assets/img/fav.png" rel="shortcut icon">
<link rel="stylesheet" href="../css/style.css">
<link rel="stylesheet" href="../../assets/css/style.css">
<link rel='stylesheet' href='//fonts.googleapis.com/css?family=Adamina'>
<link rel='stylesheet' href='//fonts.googleapis.com/css?family=Arbutus Slab'>
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
html,body,h1,h2,h3,h4,h5 {font-family: "Raleway", sans-serif}
</style>
<body class="w3-light-grey">

<!-- Top container -->
<div class="w3-bar w3-top w3-c1 w3-xlarge" style="z-index:4">
  <button class="w3-bar-item w3-button w3-hide-large w3-hover-none w3-hover-text-light-grey" onclick="w3_open();"><i class="fa fa-bars"></i>  Menu</button>
  <span class="w3-bar-item w3-right"><br></span>
</div>

<?php
 $id = $_SESSION['SESS_MEMBER_ID'];
 $sql1="SELECT * FROM user WHERE id='$id'";
 $result1=mysql_query($sql1);
 $row1=mysql_fetch_array($result1);
?>

<!-- Sidebar -->
<nav class="w3-sidebar w3-collapse w3-white w3-animate-left" style="z-index:3;width:300px;" id="mySidebar"><br>
  <div class="w3-container w3-row">
    <div class="w3-col s4">
      <img src="../../assets/img/<?php echo $row1['img'] ?>" class="w3-circle w3-margin-right" style="width:46px">
    </div>
    <div class="w3-col s8 w3-bar">
      <span>Hi, <strong><?php echo $row1['fullname'] ?></strong></span><br>
      <a href="../profile.php" class="w3-bar-item w3-button"><i class="fa fa-user"></i></a>
      <a href="../../logout.php" class="w3-bar-item w3-button"><i class="fa fa-sign-out"></i></a>
    </div>
  </div>
  <hr>
  <div class="w3-container">
    <h5>Dashboard</h5>
  </div>
  <div class="w3-bar-block">
    <a href="#" class="w3-bar-item w3-button w3-padding-16 w3-hide-large w3-dark-grey w3-hover-black" onclick="w3_close()" title="close menu"><i class="fa fa-remove fa-fw"></i>  Close Menu</a>
    <a href="../index.php" class="w3-bar-item w3-button w3-padding"><i class="fa fa-users fa-fw"></i> Overview</a>
	<a href="#" class="w3-bar-item w3-button w3-padding"><i class="fa fa-cog fa-fw"></i> Settings</a>
	<div class="w3-dropdown-hover">
          <button class="w3-button"><i class="fa fa-user-circle fa-fw"></i> Student <i class="fa fa-caret-down"></i></button>
          <div class="w3-dropdown-content w3-bar-block" style="padding-left: 15px;">
            <a href="../student/index.php" class="w3-bar-item w3-button w3-padding"><i class="fa fa-user-plus fa-fw"></i> Add Student</a>
            <a href="../student/view_student.php" class="w3-bar-item w3-button w3-padding"><i class="fa fa fa-eye fa-fw"></i> View Student</a>
          </div>
        </div>

        <div class="w3-dropdown-hover">
          <button class="w3-button"><i class="fa fa-globe fa-fw"></i> Trainer <i class="fa fa-caret-down"></i></button>
          <div class="w3-dropdown-content w3-bar-block" style="padding-left: 15px;">
            <a href="../trainer/index.php" class="w3-bar-item w3-button w3-padding"><i class="fa fa fa-user-plus fa-fw"></i> Add Trainer</a>
            <a href="../trainer/view_trainer.php" class="w3-bar-item w3-button w3-padding"><i class="fa fa fa-eye fa-fw"></i> View Trainer</a>
          </div>
        </div>


        <div class="w3-dropdown-hover">
          <button class="w3-button"><i class="fa fa-bars fa-fw"></i> Batch <i class="fa fa-caret-down"></i></button>
          <div class="w3-dropdown-content w3-bar-block" style="padding-left: 15px;">
            <a href="index.php" class="w3-bar-item w3-button w3-padding"><i class="fa fa-bars fa-fw"></i> Add Batch</a>
            <a href="view_batch.php" class="w3-bar-item w3-button w3-padding"><i class="fa fa fa-eye fa-fw"></i> View Batch</a>
          </div>
        </div>
      <div class="w3-dropdown-hover">
          <button class="w3-button"><i class="fa fa-bell fa-fw"></i> Notice <i class="fa fa-caret-down"></i></button>
          <div class="w3-dropdown-content w3-bar-block" style="padding-left: 15px;">
            <a href="../notice/index.php" class="w3-bar-item w3-button w3-padding"><i class="fa fa-bell fa-fw"></i> Add Notice</a>
            <a href="../notice/view_notice.php" class="w3-bar-item w3-button w3-padding"><i class="fa fa fa-eye fa-fw"></i> View Notice</a>
          </div>
        </div>
        <a href="../add_admin.php" class="w3-bar-item w3-button w3-padding"><i class="fa fa-universal-access"></i> Add Admin</a>
    <a href="../profile.php" class="w3-bar-item w3-button w3-padding"><i class="fa fa-cog fa-fw"></i> Profile</a>
    <a href="../settings.php" class="w3-bar-item w3-button w3-padding"><i class="fa fa-cog fa-fw"></i> Settings</a>
	<a href="../../logout.php" class="w3-bar-item w3-button w3-padding"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
  </div>
</nav>


<!-- Overlay effect when opening sidebar on small screens -->
<div class="w3-overlay w3-hide-large w3-animate-opacity" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>

<!-- !PAGE CONTENT! -->
<div class="w3-main" style="margin-left:300px;margin-top:43px;">

<!-- Header -->
<header class="w3-container" style="padding-top:22px">
</header>

<div class="w3-container w3-blue-grey w3-padding w3-padding-left"><p style="font-size: 20px; font-family: Sanchez"><i class="w3-xlarge fa-fw fa fa-info-circle"></i> Batch Details</p></div>
<div class="w3-container w3-card-4"><a class="w3-btn w3-white w3-border w3-right" style="margin-right: -17px;" href="view_batch.php"><i class="fa fa-eye"></i> View All</a></div>

<form action="" class="w3-card-4 w3-light-grey w3-text-blue w3-padding" method="post">
<?php
if (isset($_GET['id']) && is_numeric($_GET['id']) && $_GET['id'] > 0)
{
$id = $_GET['id'];
$result4 = mysql_query("SELECT * FROM batch WHERE primary_id1=$id")
or die(mysql_error());
$row4 = mysql_fetch_array($result4);
}	
?>
<div class="w3-row w3-section">
  <div class="w3-col" style="width:50px"><i class="w3-xxlarge fa fa-bars"></i></div>
    <div class="w3-rest">
      <input class="w3-input w3-border" name="batchid" type="text" value="<?php echo $row4['batch_id1']; ?>" disabled>
    </div>
</div>

<div class="w3-row w3-section">
  <div class="w3-col" style="width:50px"><i class="w3-xxlarge fa fa-superpowers"></i></div>
    <div class="w3-rest">
      <input class="w3-input w3-border" name="subject" type="text" value="<?php echo $row4['subject_name']; ?>" disabled>
    </div>
</div>

<div class="w3-row w3-section">
  <div class="w3-col" style="width:50px"><i class="w3-xxlarge fa fa-info-circle"></i></div>
    <div class="w3-rest">
      <input class="w3-input w3-border" name="venue" type="text" value="<?php echo $row4['venue_name']; ?>" disabled>
    </div>
</div>


<div class="w3-row w3-section">
  <div class="w3-col" style="width:50px"><i class="w3-xxlarge fa fa-circle"></i></div>
    <div class="w3-rest">
      <input class="w3-input w3-border" name="district" type="text" value="<?php echo $row4['district']; ?>" disabled>
    </div>
</div>

<div class="w3-row w3-section">
  <div class="w3-col" style="width:50px"><i class="w3-xxlarge fa fa-pencil"></i></div>
    <div class="w3-rest">
      <input class="w3-input w3-border" name="company" type="text" value="<?php echo $row4['company_name']; ?>" disabled>
    </div>
</div>

<div class="w3-row w3-section">
  <div class="w3-col" style="width:50px"><i class="w3-xxlarge fa fa-calendar w3-text-green"></i></div>
    <div class="w3-rest">
      <input class="w3-input w3-border" name="start" type="date" value="<?php echo $row4['start']; ?>" disabled>
    </div>
</div>

<div class="w3-row w3-section">
  <div class="w3-col" style="width:50px"><i class="w3-xxlarge fa fa-calendar w3-text-red"></i></div>
    <div class="w3-rest">
      <input class="w3-input w3-border" name="end" type="date" value="<?php echo $row4['end']; ?>" disabled>
    </div>
</div>

<?php
 $id7=$row4['user_id'];
 $sql7="SELECT * FROM user WHERE type='Trainer' AND id='$id7'";
 $result7=mysql_query($sql7);
 $row7=mysql_fetch_array($result7);
?>
 
<div class="w3-row w3-section">
  <div class="w3-col" style="width:50px"><i class="w3-xxlarge fa fa-globe"></i></div>
    <div class="w3-rest">
      <input class="w3-input w3-border" name="end" type="text" value="<?php echo $row7['fullname']; ?>" disabled>
    </div>
</div>
</form>		
<br><br><br><br><br>
<script>
// Get the Sidebar
var mySidebar = document.getElementById("mySidebar");

// Get the DIV with overlay effect
var overlayBg = document.getElementById("myOverlay");

// Toggle between showing and hiding the sidebar, and add overlay effect
function w3_open() {
    if (mySidebar.style.display === 'block') {
        mySidebar.style.display = 'none';
        overlayBg.style.display = "none";
    } else {
        mySidebar.style.display = 'block';
        overlayBg.style.display = "block";
    }
}

// Close the sidebar with the close button
function w3_close() {
    mySidebar.style.display = "none";
    overlayBg.style.display = "none";
}
</script>
</body>
</html>
