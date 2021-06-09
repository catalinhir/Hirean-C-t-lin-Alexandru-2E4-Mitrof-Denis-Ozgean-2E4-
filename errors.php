<?php if (count($errors) > 0): ?>
	<div class="error">
		<?php foreach ($errors as $error): ?> 
	<p><?php echo $error; ?></p>
		<?php endforeach //FOR SHOW ERROR GO IN FORM REGISTER/LOGIN AND DISABLE REQUIRED FIELDS FROM INPUT ?>
	</div>
<?php endif ?> 


