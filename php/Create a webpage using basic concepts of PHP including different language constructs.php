<!DOCTYPE html>
<html lang="en">
<head>
  <title>Worksheet 1</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
   <style>
	body {
		background-image: linear-gradient(to right, #dbe6f6, #c5796d);
		
	}
	</style>
</head>
<body>

<div class="container">
	
  <br><br><h2>Hello, Deepak Singh Rana (21MCI1095)</h2><br><br><br>
  <h3>Please select according to your choice :</h3>
 
  <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Find Sqare of a Number</button>
  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Program to find Square of a number</h4>
        </div>
        <div class="modal-body">
          <form method="post" action="">
            <label for="number">Enter the Number:</label>
            <input type="text" name="number" id="number">
            <br>
            <br>
            <input type="submit" name="submit" value="Submit">
          </form>
		<?php	
			error_reporting(0);		
            if (isset($_POST['submit'])) {     
				function square($num) {
					return $num * $num;
				}
				$number = $_POST['number'];
				$result = square($number);
				 echo "<br><br><h3>The square of ". $number ." is " . $result . "</h3>";
				}				
		?>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>  
    </div>
 </div>
 
 
 
  <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal1">For Loop Example</button>
  <!-- Modal -->
  <div class="modal fade" id="myModal1" role="dialog">
    <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Program to display use of for loop in php</h4>
        </div>
        <div class="modal-body">
          <form method="post" action="">
            <label for="ab">Enter the Number:</label>
            <input type="text" name="ab" id="ab">
            <br>
            <br>
            <input type="submit" name="submit" value="Submit">
          </form>
		<?php
		error_reporting(0);
		$ab = $_POST['ab'];
            if (isset($_POST['submit'])) {				
				// Use a loop to display numbers
				  echo "<ul>";
				  for ($i = 1; $i <= $ab; $i++) {
					echo "<li>" . $i . "</li>";
				  }
				  echo "</ul>";
			}
		?>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>  
    </div>
 </div>

</div>
</body>
</html>
