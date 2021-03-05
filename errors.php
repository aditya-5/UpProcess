<?php  if (count($errors) > 0) : ?>
  <div class="error">
  	<?php foreach ($errors as $error) : ?>
		<div class="alert alert-danger signup-alert alert-dismissible fade show" role="alert">
		<p><?php echo $error ?></p>
		<button type="button" class="close" id="alert-btn" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		</div>
  	<?php endforeach ?>
  </div>
<?php  endif ?>