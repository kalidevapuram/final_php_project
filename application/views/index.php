<!DOCTYPE html>
<html>
<head>
	<title>Login and Registration</title>
	<?php $this->load->view('partials/header')?>

</head>
<body>
<div class="container">
	<div class="main_page">

		<p class="red"><?=$this->session->flashdata('oops'); ?></p>
		<p class="red"><?=$this->session->flashdata('notregistered'); ?></p>
		<p class="red"><?=$this->session->flashdata('loginfail'); ?></p>
		<p class="red"><?=$this->session->flashdata('bademail'); ?></p>
		<p class="red"><?=$this->session->flashdata('badpassword'); ?></p>
		<p class="red"><?=$this->session->flashdata('destroy'); ?></p>
		<p class="red"><?=$this->session->flashdata('not_valid_email'); ?></p>


		<div class="row-main">
			<div class="row">
			<div class="col-md-4">
				
			<h1> Login</h1> 
				<form role="form" action="/logins/check" method="post">
					<div class="form-group">
						<input type="text" class="form-control" name="email" placeholder="Email">
					</div>
					<div class="form-group">
						<input type="password" class="form-control" name="password" placeholder="Password">
					</div>
					<button type="submit" class="btn btn-default">Login</button>
				</form>

</div>	

		<div id ="right" class="col-md-4">
			<h1>Register </h1>
		
			<form role="form" action="/registers/add" method="post">
				<div class="form-group">
					<input type="text" class="form-control" name="name" placeholder="Name">
				</div>		
				<div class="form-group">
					<input type="text" class="form-control" name="alias" placeholder="Alias">
				</div>	
			
				<div class="form-group">
					<input type="text" class="form-control" name="email" placeholder="Email">
				</div>
				<div class="form-group">
					<input type="password" class="form-control" name="password" placeholder="Password">
				</div>
				<div class="form-group">
					<input type="password" class="form-control" name="conpassword" placeholder="Confirm password">
				</div>
				<div class="form-group">
					<input type="date" class="form-control" name="dob" placeholder="DOB" max="2016-05-02">
				</div>
				<button type="submit" class="btn btn-default">Register</button>
			</form>
			</div>
		
			
		</div>

		</div>
		
	</div>
	</div>
</body>
</html>