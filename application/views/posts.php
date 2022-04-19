<br/>
<br/><br/>
<div class="container">
    <?php
if(isset($posts)){
    if($this->session->flashdata('msg')!=""){
    ?>
    <div class="alert alert-warning alert-dismissible" role="alert">
        <?php echo $this->session->flashdata('msg'); ?>                
    </div>                
    <?php }
    foreach($posts as $post){?>
        <div class="row">
				<div class="card text-black" style="border-radius: 25px;">
					<div class="card-body">
						<div class="row">
							<div>
                                <h3><?php echo $post["POST_TITLE"] ?></h3>                                
                                <div class="card">
                                <?php echo $this->User_Model->getUserName($post["USER_ID"]) ?> (<?php echo $post["POST_TIME"] ?>)
                                </div>
                                <div class="card"><?php echo $post["POST_BODY"]; ?></div>                                                                
                                <?php if(($post["USER_ID"]==$this->session->userdata("user_id")) || $this->session->userdata("user_type")){?>
                                <a href="<?php echo base_url(); ?>posts/editpost/<?php echo $post["POST_ID"]?>">Edit</a>
                                <a href="<?php echo base_url(); ?>posts/deletepost/<?php echo $post["POST_ID"]?>">Delete</a>
                                <?php } ?>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
                <?php } ?>
        </div>
<?php }else{?>
<div class="container">
    <br/>
<?php if($btn_msg=="Edit post"){
    echo form_open("posts/editpost/".$post_id);    
}else{
    echo form_open("posts/addpost");
}?>
	<div class="row align-items-center h-75">
			<div class="card text-black" style="border-radius: 25px;">
				<div class="card-body">                
                <?php echo validation_errors();?>                
                <?php if($this->session->flashdata('msg')){ ?>
                <div class="alert alert-warning alert-dismissible" role="alert">
                <?php echo $this->session->flashdata('msg'); ?>                
                </div>                
                <?php } ?> 

                    <input name="title" value="<?php if(isset($title)){echo $title;}?>" type="text" class="form-control" placeholder="Title">
                    
                    </input><br/>
                    <textarea name="body" type="text" class="form-control" placeholder="Body"><?php if(isset($body)){echo $body;} ?></textarea>
                    <br/><div class="justify-content-center d-flex mx-4 mb-3 mb-lg-4">
						<button name="submit" type="submit" class="btn btn-primary btn-lg"><?php echo $btn_msg?></button>
					</div>
                </div>                
            </div>
    </div> 
</form>   
</div>

            

<?php
}?>