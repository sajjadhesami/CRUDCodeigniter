<br/>
<br/>
<br/>
<div class="container">
<h1 class="text-center">
	<?php
	echo $title;
	?>
</h1>

<div>
	<?php echo validation_errors(); ?>
</div>
<?php echo form_open("login") ?>
<!-- Email input -->
<div class="form-outline mb-4">
	<label class="form-label" for="form2Example1">User Name</label>
	<input name="user_name" type="text" id="form2Example1" class="form-control"/>
</div>

<!-- Password input -->
<div class="form-outline mb-4">
	<label class="form-label" for="form2Example2">Password</label>
	<input name="pass" type="password" id="form2Example2" class="form-control"/>
</div>

<!-- Submit button -->
<button type="submit" name="submit" class="btn btn-primary btn-block mb-4">Sign in</button>

<!-- Register buttons -->
<div class="text-center">
	<p>Not a member? <a href="<?php echo base_url(); ?>register">Register</a></p>
</div>
</form>
</div>
