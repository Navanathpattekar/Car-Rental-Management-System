
<header>
    <div style="display:flex;justify-content:space-between;">

          <div class="logo"> <a href="index.php"><img src="assets/images/logo1.png" alt="image"/></a> </div>
            <div style='margin-top:5vh;margin-right:8vw;'>
   <?php   if(strlen($_SESSION['login'])==0)
	{	
?>
 <a href="#loginform" class="btn btn-xs uppercase" data-toggle="modal" data-dismiss="modal"><h4 style="border:1px solid black;padding:5px;">Login / Register</h4></a>
<?php }
else{ 

echo "<H4>Welcome To KAR'O'BAR - <i>RIDE YOUR DREAM CAR</i><H4>";
 } ?>
   </div>     
</div>  
  <nav >
<?php 
$email=$_SESSION['login'];
$sql ="SELECT full_name FROM users WHERE email_id=:email ";
$query= $dbh -> prepare($sql);
$query-> bindParam(':email', $email, PDO::PARAM_STR);
$query-> execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
if($query->rowCount() > 0)
{?>
  <ul>
  <li class="dropdown" style="font-size:large">Hello<a href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> 
<?php
foreach($results as $result)
	{

	 echo htmlentities($result->full_name); }}?>
   <i class="fa fa-angle-down" aria-hidden="true"></i></a>
              <ul class="dropdown-menu">
           <?php if($_SESSION['login']){?>
            <li><a href="profile.php">Profile Settings</a></li>
              <li><a href="update-password.php">Update Password</a></li>
            <li><a href="my-booking.php">My Booking</a></li>
            <li><a href="logout.php">Sign Out</a></li>
            <?php } ?>
          </ul>
           </li>
          </ul>
      <div style="margin:10px;height:30px;">
        <div style="display:flex;">
          <div style="background-color:lightcyan;height:30px;margin:auto;width:50%;text-align:center;border:1px solid black;padding-top:5px;border-radius:10px;"><a href="index.php" style="color:purple"><b>Home</b></a></div>
          <div style="background-color:lightcyan;height:30px;margin:auto;width:50%;text-align:center;border:1px solid black;padding-top:5px;border-radius:10px;"><a href="car-listing.php" style="color:purple"><b>Car Listing</a></b></div>
           </div>
      </div>  
  </nav>
</header>