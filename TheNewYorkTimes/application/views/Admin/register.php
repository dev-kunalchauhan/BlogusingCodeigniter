<?php include('header.php'); ?>
<div class="container" style="margin-top:20px;">
<h1>Register Form</h1>

<?php if($user = $this->session->flashdata('user')) :
            $user_class = $this->session->flashdata('user_class'); ?>
            <div class="row">
                <div class="col-lg-6">
                    <div style="margin-top:20px;" class="alert <?php echo $user_class; ?>">
                        <?php echo $user; ?>
                    </div>
                </div>
            </div>
<?php endif; ?>



<?php echo form_open('login/sendmail'); ?>
    <div class="row">
        <div class="col-lg-6">
            <div class="form-group">
                <label for="Username">Username:</label>
                <?php echo form_input(['class'=>'form-control','placeholder'=>'Enter Username','name'=>'username','value'=>set_value('username')]); ?>
            </div>
        </div>
        <div class="col-lg-6" style="margin-top:30px;">
            <?php echo form_error('username'); ?>
        </div>
    </div>        
    <div class="row">
        <div class="col-lg-6">
            <div class="form-group">
                <label for="password">Password:</label>
                <?php echo form_password(['class'=>'form-control','type'=>'password','placeholder'=>'Enter Password','name'=>'password','value'=>set_value('password')]); ?>
            </div>
        </div>
        <div class="col-lg-6" style="margin-top:30px;">
            <?php echo form_error('password'); ?>
        </div>    
    </div>
    <div class="row">
        <div class="col-lg-6">
            <div class="form-group">
                <label for="firstname">Firstname:</label>
                <?php echo form_input(['class'=>'form-control','placeholder'=>'Enter Firstname','name'=>'firstname','value'=>set_value('firstname')]); ?>
            </div>
        </div>
        <div class="col-lg-6" style="margin-top:30px;">
            <?php echo form_error('firstname'); ?>
        </div>    
    </div>
    <div class="row">
        <div class="col-lg-6">
            <div class="form-group">
                <label for="lastname">Lastname:</label>
                <?php echo form_input(['class'=>'form-control','placeholder'=>'Enter Lastname','name'=>'lastname','value'=>set_value('lastname')]); ?>
            </div>
        </div>
        <div class="col-lg-6" style="margin-top:30px;">
            <?php echo form_error('lastname'); ?>
        </div>    
    </div>
    <div class="row">
        <div class="col-lg-6">
            <div class="form-group">
                <label for="phoneno">Mobile No:</label>
                <?php echo form_input(['class'=>'form-control','placeholder'=>'Enter Mobile No','name'=>'mobileno','value'=>set_value('mobileno')]); ?>
            </div>
        </div>
        <div class="col-lg-6" style="margin-top:30px;">
            <?php echo form_error('mobileno'); ?>
        </div>    
    </div>
    <div class="row">
        <div class="col-lg-6">
            <div class="form-group">
                <label for="email">Email:</label>
                <?php echo form_input(['class'=>'form-control','placeholder'=>'Enter Email','name'=>'email','value'=>set_value('email')]); ?>
            </div>
        </div>
        <div class="col-lg-6" style="margin-top:30px;">
            <?php echo form_error('email'); ?>
        </div>    
    </div>
    
    <div class="form-group" style="margin-top:15px;">
         <?php echo form_submit(['type'=>'submit','class'=>'btn btn-primary','value'=>'Submit']); ?>
         <?php echo form_reset(['type'=>'reset','class'=>'btn btn-danger','value'=>'Reset']); ?>
    </div>
   

</div>
<?php include('footer.php'); ?>