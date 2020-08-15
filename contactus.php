<?php
    include "includes/header.php";
    include "includes/navbar.php";
?>

<link rel="stylesheet" href="css/style.css">

<div class="container">
	<div class="row">
			<h1>contact us</h1>
	</div>
	<div class="row">
			<h4 style="text-align:center">We'd love to hear from you!</h4>
	</div>
<form action="contact_process.php" method="POST">
	<div class="row input-container">
			<div class="col-xs-12">
				<div class="styled-input wide">
					<input type="text" id="name" name="name" placeholder="Name" required />
					
				</div>
			</div>
			<div class="col-md-6 col-sm-12">
				<div class="styled-input">
					<input type="email" name="email" placeholder="Email Address" required class="validate"/>
					
				</div>
			</div>
			<div class="col-md-6 col-sm-12">
				<div class="styled-input" style="float:right;">
					<input type="text" name="number" placeholder="Contact No." required />
					
				</div>
			</div>
			<div class="col-xs-12">
				<div class="styled-input wide">
					<textarea name="message" required></textarea>
					<label>Message</label>
				</div>
			</div>
			<div class="col-xs-12">
				<div class="btn-lrg submit-btn">Send Message</div>
			</div>
	</div>
</form>
</div>


<?php

    include "includes/footer.php";
?>    