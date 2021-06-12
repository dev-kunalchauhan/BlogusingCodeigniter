<?php include('header.php'); ?>

 <!-- //adding Add Articles Button -->
<div class="container" style="margin-top:30px;">
    <div class="row">
        <div class="col-lg-6">
            <a href="adduser" class="btn btn-lg btn-primary">Add Articles</a>
        </div>    
    </div>
       
    </div>




<div class="container" style="margin-top:50px;">
 <!-- //adding multiple flashes -->
<?php if($msg = $this->session->flashdata('msg')) :
            
            $msg_class = $this->session->flashdata('msg_class'); ?>
            <div class="row">
                <div class="col-lg-6">
                    <div style="margin-top:20px;" class="alert <?php echo $msg_class; ?>">
                        <?php echo $msg; ?>
                    </div>
                </div>
            </div>
<?php endif; ?>

    <div class="table">
    <table class="table-striped" border="1" cellpadding="5">
           
    <thead>
        <tr>
            <th>ID</th>
            <th>Article Title</th>
            <th>Article Body</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
    </thead>
    <tbody>
<?php if(count(is_countable($articles)?$articles:[])): ?>    
    <?php foreach($articles as $art): ?>
        <tr>
            <td>1</td>
            <td><?php echo $art->article_title; ?></td>
            <td><?php echo $art->article_body; ?></td>
            <td><?php echo anchor("admin/edituser/{$art->id}",'Edit',['class'=>'btn btn-success']); ?></td>
            <td>
            <?=
                form_open('admin/delarticles'),
                form_hidden('id',$art->id),
                form_submit(["name"=>"submit","value"=>"Delete","class"=>"btn btn-danger"]),
                form_close();
            ?>
            </td>
        </tr>
    <?php endforeach; ?>

        <?php else: ?>
            <tr>
                <td colspan="3">No Data Found</td>
            </tr>

    <?php endif; ?>
    </tbody>
    </table>    
   <?php echo $this->pagination->create_links(); ?>           

             
    </div>
</div>

<?php include('footer.php'); ?>