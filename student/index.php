<?php

include_once '../include/auth.php';
include_once '../include/config.php';
if($_SESSION['user_type']!='Student'){
  header("location:../index.php");
}
?>

<?php
 mysql_query ("set character_set_results='utf8'");
 $sql="SELECT * FROM settings WHERE id=1";
 $result=mysql_query($sql);
 $row=mysql_fetch_array($result);
?>

<!DOCTYPE html>
<html>
<title>Student Dashboard | <?php echo $row['stitle'] ?></title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="../assets/img/fav.png" rel="shortcut icon">
<link rel="stylesheet" href="css/style.css">
<link rel="stylesheet" href="../assets/css/style.css">
<link rel='stylesheet' href='//fonts.googleapis.com/css?family=Adamina'>
<link rel='stylesheet' href='//fonts.googleapis.com/css?family=Arbutus Slab'>
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
html,body,h1,h2,h3,h4,h5 {font-family: "Raleway", sans-serif}
</style>
<style>
     .pieContainer {
          height: 400px;
     }
     .pieBackground {
          background-color: #f44336;
          position: absolute;
          width: 400px;
          height: 400px;
          -moz-border-radius: 200px;
          -webkit-border-radius: 200px;
          -o-border-radius: 200px;
          border-radius: 200px;
          -moz-box-shadow: -1px 1px 3px #000;
          -webkit-box-shadow: -1px 1px 3px #000;
          -o-box-shadow: -1px 1px 3px #000;
          box-shadow: -1px 1px 3px #000;
     } 
</style>

<?php
 $id = $_SESSION['SESS_MEMBER_ID'];
 $sql1="SELECT * FROM user WHERE id='$id'";
 $result1=mysql_query($sql1);
 $row1=mysql_fetch_array($result1);
 ?>

<?php
      $phone=$row1['phone'];
	  $sql5="SELECT * FROM user WHERE phone='$phone'";
      $result5=mysql_query($sql5);
      $row5=mysql_num_rows ($result5);
	  $a=$row5;
	  $b=$a * 7.2;
	  $c=360 - $b;
?>

<style>
     .pie {
          position: absolute;
          width: 400px;
          height: 400px;
          -moz-border-radius:200px;
          -webkit-border-radius: 200px;
          -o-border-radius: 200px;
          border-radius: 200px;
          clip: rect(0px, 200px, 400px, 0px);
     }
     .hold {
          position: absolute;
          width: 400px;
          height: 400px;
          -moz-border-radius: 200px;
          -webkit-border-radius: 200px;
          -o-border-radius: 200px;
          border-radius: 200px;
          clip: rect(0px, 400px, 400px, 200px);
     }
     #pieSlice1 .pie {
          background-color: #4CAF50;
          -webkit-transform:rotate(200deg);
          -moz-transform:rotate(200deg);
          -o-transform:rotate(200deg);
          transform:rotate(<?php echo $c; ?>deg);
     }
</style>

<body class="w3-light-grey">

<!-- Top container -->
<div class="w3-bar w3-top w3-c1 w3-xlarge" style="z-index:4">
  <button class="w3-bar-item w3-button w3-hide-large w3-hover-none w3-hover-text-light-grey" onclick="w3_open();"><i class="fa fa-bars"></i>  Menu</button>
  <span class="w3-bar-item w3-right"><br></span>
</div>

<!-- Sidebar/menu -->

<nav class="w3-sidebar w3-collapse w3-white w3-animate-left" style="z-index:3;width:300px;" id="mySidebar"><br>
  <div class="w3-container w3-row">
    <div class="w3-col s4">
      <img src="../assets/img/<?php echo $row1['img'] ?>" class="w3-circle w3-margin-right" style="width:46px">
    </div>
    <div class="w3-col s8 w3-bar">
      <span>Hi, <strong><?php echo $row1['fullname'] ?></strong></span><br>
	  
	  <?php
      $phone=$row1['phone'];
	  $sql2="SELECT * FROM attendence WHERE phone='$phone' ORDER BY attendence_id DESC LIMIT 1 OFFSET 0";
      $result2=mysql_query($sql2);
      $row2=mysql_fetch_array($result2);
      ?>
	  <?php
      $earning_date=$row2['earning_date'];
      $today=date('Y-m-d');
      if($earning_date=="$today")
      {
      ?>
	  <div class="w3-bar-item w3-button"><i class="fa fa-check-circle"></i></div>
	  <?php
      }
      else
      {
      ?>
	  <div class="w3-bar-item w3-button"><i class="fa fa-times-circle"></i></div>
	  <?php
	  }
	  ?>
      <a href="profile.php" class="w3-bar-item w3-button"><i class="fa fa-user"></i></a>
      <a href="../logout.php" class="w3-bar-item w3-button"><i class="fa fa-sign-out"></i></a>
    </div>
  </div>
  <hr>
  <div class="w3-container">
    <h5>Dashboard</h5>
  </div>
  <div class="w3-bar-block">
    <a href="#" class="w3-bar-item w3-button w3-padding-16 w3-hide-large w3-dark-grey w3-hover-black" onclick="w3_close()" title="close menu"><i class="fa fa-remove fa-fw"></i>  Close Menu</a>
    <a href="index.php" class="w3-bar-item w3-button w3-padding w3-blue"><i class="fa fa-users fa-fw"></i> Overview</a>
	<a href="notice/" class="w3-bar-item w3-button w3-padding"><i class="fa fa-bell fa-fw"></i> Notice</a>
    <a href="profile.php" class="w3-bar-item w3-button w3-padding"><i class="fa fa-user fa-fw"></i> Profile</a>
	<a href="../logout.php" class="w3-bar-item w3-button w3-padding"><i class="fa fa-sign-out fa-fw"></i> Logout</a><br><br>
  </div>
</nav>


<!-- Overlay effect when opening sidebar on small screens -->
<div class="w3-overlay w3-hide-large w3-animate-opacity" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>

<!-- !PAGE CONTENT! -->
<div class="w3-main" style="margin-left:300px;margin-top:43px;">

<!-- Header -->
<header class="w3-container" style="padding-top:22px">
</header>
<?php
$earning_date=$row2['earning_date'];
$today=date('Y-m-d');
if($earning_date=="$today")
{
	
}
else
{
?>
<div>
<div class="w3-container w3-blue-grey w3-padding-left w3-margin-left"><p style="font-size: 20px; font-family: Adamina"><i class="w3-xlarge fa-fw fa fa-plus-circle"></i> Latest Earning </p></div>
<form action="active.php" class="w3-card-4 w3-light-grey w3-text-blue w3-padding w3-margin-left" method="post" enctype="multipart/form-data">
<div class="w3-row w3-section">
  <div class="w3-col" style="width:50px"><i class="w3-xxlarge fa fa-usd"></i></div>
    <div class="w3-rest">
      <input class="w3-input w3-border" name="earning" type="text" placeholder="Latest Earning" required>
    </div>
</div>
<button type="submit" name="submit" class="w3-btn-block w3-section w3-blue w3-ripple w3-padding">Active Profile</button>
</form>
</div>
<?php
}
?>
<div class="w3-container w3-blue-grey w3-padding-left w3-margin-left"><p style="font-size: 20px; font-family: Adamina"><i class="w3-xlarge fa-fw fa fa-eye"></i> View Notice</p></div>
<?php
 $batch=$row1['batch_id'];
 $sql6="SELECT * FROM batch WHERE primary_id1='$batch'";
 $result6=mysql_query($sql6);
 $row6=mysql_fetch_array($result6);
 $pid=$row6['primary_id1'];
?>

<?php
$per_page = 5;
$result3 = mysql_query("SELECT * FROM notice WHERE notice_for_student='Yes' OR notice_by='$pid' Order By notice_id Desc");
$total_results = mysql_num_rows($result3);
$total_pages = ceil($total_results / $per_page);
if (isset($_GET['page']) && is_numeric($_GET['page']))
{
$show_page = $_GET['page'];
// make sure the $show_page value is valid
if ($show_page > 0 && $show_page <= $total_pages)
{
$start = ($show_page -1) * $per_page;
$end = $start + $per_page;
}
else
{
// error - show first set of results
$start = 0;
$end = $per_page;
}
}
else
{
// if page isn't set, show first set of results
$start = 0;
$end = $per_page;
}
?>
<table class="w3-table-all w3-hoverable w3-margin-left w3-card-4">
<?php
// display data in table
?>
<tr class="w3-blue w3-padding"> <th>Title</th>  <th>Date</th> <th>Details</th> </tr>
<?php
// loop through results of database query, displaying them in the table
for ($i = $start; $i < $end; $i++)
{
// make sure that PHP doesn't try to show results that don't exist
if ($i == $total_results) { break; }
// echo out the contents of each row into a table
echo "<tr>";
echo '<td>' . mysql_result($result3, $i, 'title') . '</td>';
echo '<td>' . mysql_result($result3, $i, 'notice_date') . '</td>';
echo '<td><button class="w3-btn w3-blue"><i class="fa fa-eye"></i><a style="text-decoration: none;" href="notice/view.php?id=' . mysql_result($result3, $i, 'notice_id') . '"> View</a></button></td>';
echo "</tr>";
}
// close table>
// pagination
?>
</table>	
<div class="w3-container w3-blue-grey w3-padding-left w3-margin-left"><p style="font-size: 20px; font-family: Adamina"><i class="w3-xlarge fa-fw fa fa-eye"></i> Class Overview</p></div>
<div class="w3-row">
<div class="w3-col m12 l12 w3-center" style="padding: 30px 0px 400px 22vw;" id="pieContainer">
<div class="pieBackground"></div>
<div id="pieSlice1" class="hold"><div class="pie"></div></div>
</div>
<div class="w3-container w3-white w3-card-4" style="margin: 450px 0px 0px 21vw; width: 400px;">
<h3 style="font-family: Adamina; padding-left: 60px;"><i class="w3-text-green fa fa-circle"></i> Present Class: <?php echo $a; ?><h3>
<h3 style="font-family: Adamina; padding-left: 60px;"><i class="w3-text-red fa fa-circle"></i> Total Class: 50<h3>
</div>
</div>
<!-- End page content -->
</div>
<br><br><br><br>
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
