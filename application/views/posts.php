<?php
if(isset($posts)){
foreach($posts as $post){?>
	<div class="container">
		<div class="row align-items-center h-75">
				<div class="card text-black" style="border-radius: 25px;">
					<div class="card-body">
						<div class="row">
							<div>
                                <h3><?php echo $post["POST_TITLE"] ?></h3>                                
                                <div class="card">
                                <?php echo $this->User_Model->getUserName($post["USER_ID"]) ?> : <?php echo $post["POST_TIME"] ?>
                                </div>
                                <div class="card"><?php echo $post["POST_BODY"] ?></div>
                                
                            </div>
                        </div>
                    </div>
                </div>
        </div>
    </div>
<?php }}
else{?>
<div class="container">
	<div class="row align-items-center h-75">
			<div class="card text-black" style="border-radius: 25px;">
				<div class="card-body">
                    <input type="text" class="form-control" placeholder="Title"/><br/>
                    <textarea type="text" class="form-control" placeholder="Body"></textarea>
                    <br/><div class="d-flex mx-4 mb-3 mb-lg-4">
						<button type="submit" class="btn btn-primary btn-lg">Register</button>
					</div>
                </div>
            </div>
    </div>    
</div>

            

<?php
}?>