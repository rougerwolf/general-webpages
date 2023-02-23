<!DOCTYPE html>
<html>
<head>
	<title>Contact Form</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>
	<div class="container mt-5">
		<h1 class="mb-4 text-center">Contact Us</h1>
		<form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>" class="needs-validation" novalidate>
			<div class="form-group">
				<label for="name">Name:</label>
				<input type="text" id="name" name="name" class="form-control" required>
				<div class="invalid-feedback">Please enter your name.</div>
			</div>

			<div class="form-group">
				<label for="email">Email:</label>
				<input type="email" id="email" name="email" class="form-control" required>
				<div class="invalid-feedback">Please enter a valid email address.</div>
			</div>

			<div class="form-group">
				<label for="message">Message:</label>
				<textarea id="message" name="message" class="form-control" rows="5" required></textarea>
				<div class="invalid-feedback">Please enter a message.</div>
			</div>

			<button type="submit" class="btn btn-primary">Submit</button>
		</form>

		<?php
			if ($_SERVER["REQUEST_METHOD"] == "POST") {
				$name = test_input($_POST["name"]);
				$email = test_input($_POST["email"]);
				$message = test_input($_POST["message"]);

				if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
					echo "<div class='alert alert-danger mt-3'>Invalid email format</div>";
				}

				if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
					echo "<div class='alert alert-danger mt-3'>Name should contain only letters and white space</div>";
				}

				if (!preg_match("/^[a-zA-Z0-9\s,.'-]{3,}$/",$message)) {
					echo "<div class='alert alert-danger mt-3'>Invalid message format</div>";
				}

				if (filter_var($email, FILTER_VALIDATE_EMAIL) && preg_match("/^[a-zA-Z ]*$/",$name) && preg_match("/^[a-zA-Z0-9\s,.'-]{3,}$/",$message)) {
					echo "<div class='alert alert-success mt-3'>Thank you for contacting us, $name! We will respond to your message soon.</div>";
				}
			}

			function test_input($data) {
				$data = trim($data);
				$data = stripslashes($data);
				$data = htmlspecialchars($data);
				return $data;
			}
		?>
	</div>

	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
	<script>
		// Disable form submissions if there are invalid fields
		(function() {
		  'use strict';
		  window.addEventListener('load', function() {
		    // Get the forms we want to add validation styles to
		    var forms = document.getElementsByClassName('needs-validation');
	        // Loop over them and prevent submission
			var validation = Array.prototype.filter.call(forms, function(form) {
			  form.addEventListener('submit', function(event) {
				if (form.checkValidity() === false) {
				  event.preventDefault();
				  event.stopPropagation();
				}
				form.classList.add('was-validated');
			  }, false);
			});
		  }, false);
		})();
	</script>
</body>
</html>

