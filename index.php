<?php 

include ("Admin/dataconnect.php");

 if (isset($_POST['submit'])){

  $a= $_POST['username'];
  $b= $_POST['phone'];
  $c= $_POST['network'];


    $insert= mysqli_query($connect,"insert into internship(username,phone,network,date) 
      values('$a','$b','$c',now())")or die('could not insert'.mysqli_error($connect));

            if($insert) { 
                 $_SESSION['success'] = "New intern added successfully";
        }

         else { $_SESSION['error'] = "Database error: Could not register user"; }

}

 $sql = mysqli_query($connect,"SELECT * FROM internship" ) or die("could Not select Register".mysqli_error($connect));

 $count = 0;
 if(mysqli_num_rows($sql)>$count){
 while($row=mysqli_fetch_assoc($sql))

{
   $id[] = $row["id"];
   $username[] = $row["username"];
   $phone[] =$row["phone"];
   $network[] =$row["network"];

   $count++;

}
}
$sn=1;





?>




<!DOCTYPE html>
<html>
<head>
	 <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
	<title>HNG INTERNSHIP</title>
</head>
<body>
     <nav class="navbar navbar-light" style="background-color: #00aeff">
        <a class="navbar-brand" href="#" id="text">
          <img src="img/logo.jpg" width="30" height="30" class="d-inline-block align-top" alt="HNG logo" loading="lazy">
         <span style="color: white;"> HNG Internship </span>
        </a>
      </nav>

<div class="container-fluid pt-3">
	 <?php if(isset($_SESSION['success'])) {?> <div class="alert alert-success alert-dismissible">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <strong>Success!</strong> <?php echo $_SESSION['success']; ?>
  </div><?php }?>

	<div class="row">
		<div class="col-lg-5 col-md-5 col-xm-12">

 <h2>List of interns</h2>
            
  <table class="table" style="background-color: #00aeff; color: white;">
    <thead>
      <tr>
        <th>Username</th>
        <th>Phone Number</th>
        <th>Network</th>
      </tr>
    </thead>
    <tbody>
    	
      <tr>
        <td>Mavisvictor</td>
        <td>081323337823</td>
        <td>MTN</td>
      </tr>
      <tr>
        <td>future</td>
        <td>0705427582741</td>
        <td>GLO</td>
      </tr>
       <?php for($d = 0; $d < $count; $d++){ ?>
      <tr>
        <td><?php echo $username[$d] ?></td>
        <td><?php echo $phone[$d] ?></td>
        <td><?php echo $network[$d] ?></td>
      </tr>
             <?php } ?>
    </tbody>
  </table>

		</div>

		<div class="col-lg-7 col-md-5 col-xm-12" style="background-color: white; border: 2px solid #f9f9f9; border-radius: 25px;">

					<h4 class="text-center">Send Airtime to interns</h4>

		 <form action="" method="post" enctype="multipart/form-data" >

    <div class="form-group">

   <label for="email">Amount</label>
      <input type="number" class="form-control" id="email"  name="amount" required="" placeholder="Amount to Send">
    </div>

  <input type="submit" name="submit1" value="SEND AIRTIME" class="btn btn-success">

</form>

		<h4 class="text-center">Add new interns</h4>

		<form action="" method="post" enctype="multipart/form-data">

  <div class="form-row">
    <div class="form-group col-md-4">
      <label for="inputCity"><strong> Username </strong></label>
      <input type="text" class="form-control" name="username" id="inputCity" placeholder="Enter interns Username" required="" >
    </div>

    <div class="form-group col-md-4">
      <label for="inputState"><strong> Phone </strong></label>
       <input type="text" class="form-control" id="inputZip" name="phone" placeholder="Enter Phone Number" required="">
    </div>
    <div class="form-group col-md-4">
      <label for="inputZip"><strong> Network </strong></label>
      <input type="text" class="form-control" id="inputZip" placeholder="Enter Network" name="network" required="">
    </div>
  </div>


  <input type="submit" name="submit" value="ADD" class="btn btn-success">

</form>







		</div>


	</div>
</div>

</body>
</html>