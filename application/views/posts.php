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
                                <?php echo $post["USER_ID"] ?>:<?php echo $post["POST_TIME"] ?>
                                </div>
                                <div class="card"><?php echo $post["POST_BODY"] ?></div>
                                
                            </div>
                        </div>
                    </div>
                </div>
        </div>
    </div>
<?php }}
else{

}?>