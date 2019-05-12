<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        &nbsp;
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url();?>admin/employees"><i class="fa fa-group"></i> Employees </a></li>
        <li><?php echo $employee_details->name;?></li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content">
      <!-- Main row -->
      <div class="row">
        <div class="col-md-12">
        <?php 
        $attributes = array('class' => 'form-horizontal','id' => 'edit_form');
        echo form_open('admin/employees/update/'.$employee_details->user_id,$attributes);
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
                  <option value="Supervisor" <?php if($employee_details->position == 'supervisor'){ echo "selected";}?>>Operation Suprevisor</option>
                  <option value="Manager"  <?php if($employee_details->position == 'manaer'){ echo "selected";}?>>Management Trainee</option>
                  <option value="Cashier"  <?php if($employee_details->position == 'cashier'){ echo "selected";}?>>Cashier</option>
                  <option value="Staff"  <?php if($employee_details->position == 'staff'){ echo "selected";}?>>Staff</option>
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
              <label for="inputExperience" class="col-sm-2 control-label" " >Birthday</label>

              <div class="col-sm-10">
                <input type="date" name="birthday"  value="" class="form-control" required>
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
                <input type="password" class="form-control" id="password" placeholder="Password" name="password" required>
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
      </div>
    </section>
  </div>
  <script type="text/javascript">
  $(document).ready(function(){
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
    }
</script>