<br/><br/><br/><div class="row">
<div class="col-md-12">
<div class="table-wrap">
<?php if($this->session->flashdata('msg')!=""){
    ?>
    <div class="alert alert-warning alert-dismissible" role="alert">
        <?php echo $this->session->flashdata('msg'); ?>                
    </div>                
<?php } ?>    
<table class="table table-responsive-xl">
<thead>
<tr>
<th>Is admin</th>
<th>Username</th>
<th>delete</th>
</tr>
</thead>
<tbody>
<?php foreach($users as $user){ ?>
<tr>
<td>
    <!-- ask to know whether this is the right way to update the database -->
<input type="checkbox" onChange="window.location='<?php echo base_url()?>users_setting/makeadmin/<?php echo $user["USER_ID"]?>/<?php echo $user["USER_TYPE"]?>'" <?php if($user["USER_TYPE"]==TRUE){echo("checked");}else{echo "unchecked";}?>>
</td>
<td><?php echo $user["USERNAME"]?></td>
<td>
<button type="button" onclick="window.location='<?php echo base_url()?>users_setting/deleteuser/<?php echo $user["USER_ID"]?>'">delete</button>
</tr>
<?php } ?>
</tbody>
</table>
</div>
</div>
</div>