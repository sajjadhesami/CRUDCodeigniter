<html>
<head>
	<!-- Ask about this problem -->
<!--	<link rel="stylesheet" href="--><?php //echo base_url();?><!--assets/css/bootstrap.min.css" type="text/css">-->
	<link rel="stylesheet" href="https://bootswatch.com/5/journal/bootstrap.min.css"  type="text/css">
	<title>CRUD Codeigniter</title>
</head>
<div class="navbar navbar-expand-lg fixed-top navbar-light bg-light">
<div class="container">
<!--	<a class="navbar-brand" href="--><?php //echo base_url(); ?><!--"/>-->
	<div class="collapse navbar-collapse">
		<ul class="navbar-nav">
			<li class="nav-item">
				<a class="nav-link" href="<?php echo base_url();?>posts">Posts</a>
			</li>
			<li class="nav-item">
                <a class="nav-link" href="<?php echo base_url();?>posts/addpost">Add Post</a>
			</li>
			<?php if($this->session->userdata["user_type"]){?>
			<li class="nav-item">
                <a class="nav-link" href="<?php echo base_url();?>users_setting">Users Setting</a>
			</li>
			<?php }?>
            <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url();?>logout">Logout</a>
            </li>
		</ul>
	</div>

</div>
</div>
<body>
<?php ?>
