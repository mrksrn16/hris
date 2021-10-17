<style type="text/css">
  #showDialog:hover{
    cursor: pointer;
  }
</style>
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        &nbsp;
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url();?>admin/employees"><i class="fa fa-group"></i> Employees </a></li>
        <li><?php echo $employee->name;?></li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content">
      <!-- Main row -->
      <div class="row">
        <div class="col-md-3">

          <!-- Profile Image -->
          <div class="box box-primary">
            <div class="box-body box-profile">
              <img class="profile-user-img img-responsive img-circle" src="<?php echo base_url();?>uploads/users/<?php echo $employee->photo;?>" alt="User profile picture" style="width: 100px; height: 100px;" id="showDialog">
              <form style="display: none" action="<?php echo base_url();?>user/update_picture" method="post" enctype="multipart/form-data">
                <input type="file" name="image" onchange="this.form.submit()">
              </form>
              <h3 class="profile-username text-center"><?php echo $employee->name;?></h3>

              <p class="text-muted text-center"><?php echo $employee->position;?></p>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

          <!-- About Me Box -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Details</h3>
              <span class="pull-right"><a href="#" id="btnEdit">Edit</a></span>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <strong>Email</strong>
              <p class="text-muted"><?php echo $employee->email;?></p>
              <hr>
              <strong>Contact</strong>
              <p class="text-muted">
              <?php echo $employee->contact;?>
              </p>
              <hr>
              <strong>Address</strong>
              <p class="text-muted">
              <?php echo $employee->address;?>
              </p>
              <hr>
              <strong>Birthday</strong>
              <p class="text-muted">
              <?php echo date('M d Y', strtotime($employee->birthday));?>
              </p>
              <hr>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
        
      </div>
      <!-- /.row (main row) -->

    </section>
    <!-- /.content -->
</div>

<script type="text/javascript">
  $(document).ready(function(){
    $('#showDialog').click(function(){
      $("[name='image']").click();
    });
    $('#btnEdit').click(function(){
      $('#edit_profile').modal('show');

      $("#confirm_password").keyup(throttle(function(){
      if($(this).val() != $("#password").val()){
        $("#submit").prop('disabled', true);
      }else{
        $("#submit").prop('disabled', false);
      }
   }));
   $("#password").change(throttle(function(){
      $("#submit").prop('disabled', true);
      if($(this).val() != $("#confirm_password").val()){
        $("#submit").prop('disabled', true);
      }else{
        $("#submit").prop('disabled', false);
      }
   }));

    });
  }); 
   function throttle(f, delay){
      var timer = null;
      return function(){
        var context = this, args = arguments;
        clearTimeout(timer);
        timer = window.setTimeout(function() {
          f.apply(context, args);
        },
        delay || 100);
      }
    };
</script>
<div class="modal fade" id="edit_profile" role="dialog" data-backdrop="static">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h3 class="modal_title">Add Attendance</h3>
      </div>
      <div class="modal-body">
        <?php 
        $attributes = array('class' => 'form-horizontal','id' => 'attendance_form');
        echo form_open('employee/profile/update_profile/',$attributes);
        ;?>
            <div class="form-group">
              <label for="inputName" class="col-sm-2 control-label">Name</label>

              <div class="col-sm-10">
                <input type="text" class="form-control" id="inputName" value="<?php echo $employee_details->name;?>" placeholder="Name" name="name" required>
              </div>
            </div>
            <div class="form-group">
              <label for="inputName" class="col-sm-2 control-label">Position</label>
              <div class="col-sm-10">
                <select class="form-control" name="position" required>
                  <option value="supervisor" <?php if($employee_details->position == 'Supervisor'){ echo "selected";}?>>Operation Suprevisor</option>
                  <option value="manager"  <?php if($employee_details->position == 'Manager'){ echo "selected";}?>>Management Trainee</option>
                  <option value="cashier"  <?php if($employee_details->position == 'Cashier'){ echo "selected";}?>>Cashier</option>
                  <option value="staff"  <?php if($employee_details->position == 'Staff'){ echo "selected";}?>>Staff</option>
                </select>
                <!-- <input type="text" class="form-control" id="inputName"  value="<?php echo $employee_details->position;?>"  placeholder="Position" name="position" required> -->
              </div>
            </div>
            <div class="form-group">
              <label for="inputEmail" class="col-sm-2 control-label">Email</label>

              <div class="col-sm-10">
                <input type="email" class="form-control" id="inputEmail"  value="<?php echo $employee_details->email;?>"  placeholder="Email" name="email" required>
              </div>
            </div>
            <div class="form-group">
              <label for="inputName" class="col-sm-2 control-label">Contact No.</label>

              <div class="col-sm-10">
                <input type="tel" class="form-control" id="inputName"  value="<?php echo $employee_details->contact;?>"  placeholder="Contact No." name="contact" required>
              </div>
            </div>
            <div class="form-group">
              <label for="inputExperience" class="col-sm-2 control-label">Address</label>

              <div class="col-sm-10">
                <textarea class="form-control" id="inputExperience" placeholder="Address" name="address" required><?php echo $employee_details->address;?></textarea>
              </div>
            </div>
            <div class="form-group">
              <label for="inputExperience" class="col-sm-2 control-label" >Birthday</label>

              <div class="col-sm-10">
                <input type="date" name="birthday"  value="<?php echo $employee_details->birthday;?>" class="form-control" required>
              </div>
            </div>
            <hr>
            <h5>Account Details</h5>
            <div class="form-group">
              <label for="inputName" class="col-sm-2 control-label">Username</label>

              <div class="col-sm-10">
                <input type="text" class="form-control" id="inputName" value="<?php echo $employee_access->username;?>" placeholder="Username"  name="username" required>
              </div>
            </div>
            <div class="form-group">
              <label for="inputName" class="col-sm-2 control-label">Password</label>

              <div class="col-sm-10">
                <input type="password" class="form-control" id="password" placeholder="Password" name="password">
              </div>
            </div>
            <div class="form-group">
              <label for="inputName" class="col-sm-2 control-label">Confirm Password</label>

              <div class="col-sm-10">
                <input type="password" class="form-control" id="confirm_password" placeholder="Confirm Password">
              </div>
            </div>
            <div class="form-group">
              <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" id="submit" class="btn btn-primary">Submit</button>
              </div>
            </div>
          </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
        MES
      </div>
    </div>
  </div>
</div>