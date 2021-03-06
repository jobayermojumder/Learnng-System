<?php
include_once '../include/config.php';
include_once '../include/auth.php';
if($_SESSION['user_type']!='Admin'){
  header("location: ../index.php");
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
  <title>Site Settings | <?php echo $row['stitle'] ?></title>
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
  <body class="w3-light-grey">
    <!-- Top container -->
    <div class="w3-bar w3-top w3-c1 w3-xlarge" style="z-index:4">
      <button class="w3-bar-item w3-button w3-hide-large w3-hover-none w3-hover-text-light-grey" onclick="w3_open();"><i class="fa fa-bars"></i>  Menu</button>
      <span class="w3-bar-item w3-right"><br></span>
    </div>
    <!-- Sidebar/menu -->
    <?php
    $id = $_SESSION['SESS_MEMBER_ID'];
    $sql1="SELECT * FROM user WHERE id='$id'";
    $result1=mysql_query($sql1);
    $row1=mysql_fetch_array($result1);
    ?>
    <nav class="w3-sidebar w3-collapse w3-white w3-animate-left" style="z-index:3;width:300px;" id="mySidebar"><br>
      <div class="w3-container w3-row">
        <div class="w3-col s4">
          <img src="../assets/img/<?php echo $row1['img'] ?>" class="w3-circle w3-margin-right" style="width:46px">
        </div>
        <div class="w3-col s8 w3-bar">
          <span>Hi, <strong><?php echo $row1['fullname'] ?></strong></span><br>
          <a href="profile.php" class="w3-bar-item w3-button"><i class="fa fa-user"></i></a>
          <a href="settings.php" class="w3-bar-item w3-button"><i class="fa fa-cog"></i></a>
          <a href="../logout.php" class="w3-bar-item w3-button"><i class="fa fa-sign-out"></i></a>
        </div>
      </div>
      <hr>
      <div class="w3-container">
        <h5>Dashboard</h5>
      </div>
      <div class="w3-bar-block">
        <a href="#" class="w3-bar-item w3-button w3-padding-16 w3-hide-large w3-dark-grey w3-hover-black" onclick="w3_close()" title="close menu"><i class="fa fa-remove fa-fw"></i>  Close Menu</a>
        <a href="index.php" class="w3-bar-item w3-button w3-padding"><i class="fa fa-users fa-fw"></i> Overview</a>
        <div class="w3-dropdown-hover">
          <button class="w3-button"><i class="fa fa-user-circle fa-fw"></i> Student <i class="fa fa-caret-down"></i></button>
          <div class="w3-dropdown-content w3-bar-block" style="padding-left: 15px;">
            <a href="student/index.php" class="w3-bar-item w3-button w3-padding"><i class="fa fa-user-plus fa-fw"></i> Add Student</a>
            <a href="student/view_student.php" class="w3-bar-item w3-button w3-padding"><i class="fa fa fa-eye fa-fw"></i> View Student</a>
          </div>
        </div>
        <div class="w3-dropdown-hover">
          <button class="w3-button"><i class="fa fa-globe fa-fw"></i> Trainer <i class="fa fa-caret-down"></i></button>
          <div class="w3-dropdown-content w3-bar-block" style="padding-left: 15px;">
            <a href="trainer/index.php" class="w3-bar-item w3-button w3-padding"><i class="fa fa fa-user-plus fa-fw"></i> Add Trainer</a>
            <a href="trainer/view_trainer.php" class="w3-bar-item w3-button w3-padding"><i class="fa fa fa-eye fa-fw"></i> View Trainer</a>
          </div>
        </div>
        <div class="w3-dropdown-hover">
          <button class="w3-button"><i class="fa fa-bars fa-fw"></i> Batch <i class="fa fa-caret-down"></i></button>
          <div class="w3-dropdown-content w3-bar-block" style="padding-left: 15px;">
            <a href="batch/index.php" class="w3-bar-item w3-button w3-padding"><i class="fa fa-bars fa-fw"></i> Add Batch</a>
            <a href="batch/view_batch.php" class="w3-bar-item w3-button w3-padding"><i class="fa fa fa-eye fa-fw"></i> View Batch</a>
          </div>
        </div>
        <div class="w3-dropdown-hover">
          <button class="w3-button"><i class="fa fa-bell fa-fw"></i> Notice <i class="fa fa-caret-down"></i></button>
          <div class="w3-dropdown-content w3-bar-block" style="padding-left: 15px;">
            <a href="notice/index.php" class="w3-bar-item w3-button w3-padding"><i class="fa fa-bell fa-fw"></i> Add Notice</a>
            <a href="notice/view_notice.php" class="w3-bar-item w3-button w3-padding"><i class="fa fa fa-eye fa-fw"></i> View Notice</a>
          </div>
        </div>
        <a href="add_admin.php" class="w3-bar-item w3-button w3-padding"><i class="fa fa-universal-access"></i> Add Admin</a>
        <a href="profile.php" class="w3-bar-item w3-button w3-padding"><i class="fa fa-user fa-fw"></i> Profile</a>
        <a href="settings.php" class="w3-bar-item w3-button w3-padding w3-blue"><i class="fa fa-cog fa-fw"></i> Settings</a>
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
      
      <form action="" class="w3-card-2 w3-light-grey w3-text-blue w3-padding" method="post">
        <?php
          if (isset($_POST['submit']))
        {
        $sitetitle = $_POST['sitetitle'];
        
        if(mysql_query("UPDATE settings SET stitle='$sitetitle' WHERE id=1"))
          {
          
        ?>
        <script>
        window.location.href='settings.php';
        </script>
        <?php
        }
        }
        ?>
        <div class="w3-container w3-blue-grey w3-padding w3-padding-left"><p style="font-size: 20px; font-family: Sanchez"><i class="w3-xlarge fa-fw fa fa-superpowers"></i> Site Title</p></div>
      <div class="w3-row w3-section" style="margin-left: 5%; width: 80%">
        <div class="w3-col" style="width:50px"><i class="w3-xxlarge fa fa-bars"></i></div>
        <div class="w3-rest" >
          <input class="w3-input w3-border" name="sitetitle" type="text" value="<?php echo $row['stitle'] ?>">
          <button type="submit" name="submit"  class="w3-btn-block w3-section w3-blue w3-ripple w3-padding">Send</button>
        </div>
      </div>
      </form>
    </div>



    <div class="w3-main" style="margin-left:300px;margin-top:43px;">
      <!-- Header -->
      <header class="w3-container" style="padding-top:22px">
      </header>
      
      <form action="" class="w3-card-2 w3-light-grey w3-text-blue w3-padding" method="post">
        <div class="w3-container w3-blue-grey w3-padding w3-padding-left"><p style="font-size: 20px; font-family: Sanchez"><i class="w3-xlarge fa-fw fa fa-superpowers"></i> Account Information</p></div>
      <div class="w3-row w3-section" style="margin-left: 5%; width: 80%">
        <div class="w3-col" style="width:20%; font-size: 15px; padding-top: 8px;">User phone</div>
        <div class="w3-rest" >
          <input class="w3-input w3-border" name="sitetitle" type="text" value="">
        </div>
      </div>

      <div class="w3-row w3-section" style="margin-left: 5%; width: 80%">
        <div class="w3-col" style="width:20%; font-size: 15px; padding-top: 8px;">Password</div>
        <div class="w3-rest" >
          <input class="w3-input w3-border" name="sitetitle" type="text" value="">
        </div>
      </div>

      <div class="w3-row w3-section" style="margin-left: 5%; width: 80%">
        <div class="w3-col" style="width:20%; font-size: 15px;">Confirm Password</div>
        <div class="w3-rest" >
          <input class="w3-input w3-border" name="sitetitle" type="text" value="">
        </div>
      </div>

      <div class="w3-row w3-section" style="margin-left: 5%; width: 80%">
        <div class="w3-col" style="width:20%; font-size: 15px; padding-top: 8px;"></div>
        <div class="w3-rest" >
          <button type="submit" name="submit"  class="w3-btn-block w3-section w3-blue w3-ripple w3-padding">Update</button>
        </div>
      </div>
    </div>
    <!-- End page content -->
  </div>
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