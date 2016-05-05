<!DOCTYPE html>
<html>
<head>
	<title>Welcome Page</title>
	<?php $this->load->view('partials/header');
	
	

	?>
</head>
<body>
	<div class="container1">
	<div class="row">

	<div class="col-xs-9 col-xs-offset-1">
	
		<h2>Welcome, <?php echo $user_data['alias'];?>!!</h2>
		<div class="text-right"><p><a href="/logins/destroy">Log Out</a></p></div>
		<h4><?php echo ($total_poke_count['COUNT(*)']);?> people poked you!</h4>
		<hr>
		
		<div class="border">
		<?php foreach($people_count as $value){ ?>
				<h5><?php echo $value['user_name'];?> poked you <?php echo $value['count'];?> times.</h5>
			<?php }?>
			
			
		</div>
		<hr>
		<div>
			<h4>people you may want to poke:</h4>
			<table class="table table-bordered">
				  <thead>

				    <tr>
				      <th>Name</th>
				      <th>Alias</th>
				      <th>Email Address</th>
				      <th>Poke History</th>
				      <th>Action</th>
				    </tr>
				  </thead>
				  <tbody>
				  <?php foreach($other_user as $value){ ?>

				  	
				    <tr>
				      <td><?php echo $value['name']; ?></td>
				      <td><?php echo $value['alias']; ?></td>
				      <td><?php echo $value['email']; ?></td>
				      <td><?php echo $value['poke_count']; ?></td>
				      <td><form action="/logins/addcount/<?php echo $value['id'] ;?>" method="post"><button type="submit" class="btn btn-default">Poke!</button></form></td>
				    </tr>
				    <?php }?>
				    
				  </tbody>
				</table>
		</div>
		</div>
		
		</div>
	</div>
</body>
</html>