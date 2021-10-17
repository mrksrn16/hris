<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Employees <button type="button" class="btn btn-primary btn-xs" id="add_employee"><i class="fa fa-plus"></i>Add</button>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-group"></i> Employees </a></li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content">
      <!-- Main row -->
      <div class="row">
        <!-- Left col -->
        <div class="col-lg-12"> 
          <a href="<?php echo base_url();?>admin/employees/download" target="_blank"><button class="btn btn-warning pull-right">Download List</button></a>
        </div>
        <section class="col-lg-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Lists</h3>

              <div class="box-tools">
                <form class="form-inline pull-right" role="form" action="<?php echo base_url(). 'admin/employees/search'?>" method="post">
                <div class="input-group input-group-sm" style="width:100%;">
                  <input type="text" name="input_search" id="input_search" class="form-control pull-right" placeholder="Search">
                  <div class="input-group-btn">
                    <button type="submit" class="btn btn-default"><i class="glyphicon glyphicon-search"></i></button>
                  </div>
                </div>
                </form>
              </div>
            </div>

            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
              <table class="table table-hover">
                <tbody><tr>
                  <th>Employee Name</th>
                  <th>Position</th>
                  <th>Email</th>
                  <th>Contact</th>
                  <th>Action</th>
                </tr>
                <?php if(isset($employees)): foreach($employees as $employee):?>
                  <tr>
                  <td><?php echo $employee->name;?></td>
                  <td><?php echo ucfirst($employee->position);?></td>
                  <td><?php echo $employee->email;?></td>
                  <td><?php echo $employee->contact;?></td>
                  <td>
                    <a href="<?php echo base_url();?>admin/employees/view/<?php echo $employee->user_id;?>"><button type="button" class="btn btn-success btn-xs"><i class="fa fa-eye"></i>View</button></a>
                    <a href="<?php echo base_url();?>admin/employees/edit/<?php echo $employee->user_id;?>"><button type="button" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i>Edit</button></a>
                    <a href="<?php echo base_url();?>admin/employees/delete/<?php echo $employee->user_id;?>"><button type="button" class="btn btn-danger btn-xs" onclick="return confirm('Are you sure to delete this item?')"><i class="fa fa-trash"></i>Delete</button></a>
                  </td>
                </tr>
                <?php endforeach;?>
                <?php else:?> 
                  <tr>
                    <td colspan="5">No employees found.</td>
                  </tr>
                <?php endif;?>
                
                
              </tbody></table>
              <center><?php echo $this->pagination->create_links();?></center>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </section>
        <!-- right col -->
      </div>
      <!-- /.row (main row) -->

    </section>
    <!-- /.content -->
  </div>
<script type="text/javascript">
  $(document).ready(function(){
    $('#add_employee').click(function(){
      $('#add_employee_form').modal('show');
    });
    $('#submit').click(function(e){
        
    });
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
<div class="modal fade" id="add_employee_form" role="dialog" data-backdrop="static">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h3 class="modal_title">Add New Employee</h3>
      </div>
      <div class="modal-body">
        <!-- <form class="form-horizontal"> -->

        <?php 
        $attributes = array('class' => 'form-horizontal','id' => 'add_form');
        echo form_open('admin/employees/add',$attributes);
        ;?>
            <div class="form-group">
              <label for="inputName" class="col-sm-2 control-label">Name</label>

              <div class="col-sm-10">
                <input type="text" class="form-control" id="inputName" placeholder="Name" name="name" required>
              </div>
            </div>
            <div class="form-group">
              <label for="inputName" class="col-sm-2 control-label">Position</label>

              <div class="col-sm-10">
              <select class="form-control" name="position" required="">
                  <option value="Supervisor">Operation Suprevisor</option>
                  <option value="Manager">Management Trainee</option>
                  <option value="Cashier">Cashier</option>
                  <option value="Staff">Staff</option>
                </select>
                <!-- <input type="text" class="form-control" id="inputName" placeholder="Position" name="position" required> -->
              </div>
            </div>
            <div class="form-group">
              <label for="inputEmail" class="col-sm-2 control-label">Email</label>

              <div class="col-sm-10">
                <input type="email" class="form-control" id="inputEmail" placeholder="Email" name="email" required>
              </div>
            </div>
            <div class="form-group">
              <label for="inputName" class="col-sm-2 control-label">Contact No.</label>

              <div class="col-sm-10">
                <input type="tel" class="form-control" id="inputName" placeholder="Contact No." name="contact" required>
              </div>
            </div>
            <div class="form-group">
              <label for="inputExperience" class="col-sm-2 control-label">Address</label>

              <div class="col-sm-10">
                <textarea class="form-control" id="inputExperience" placeholder="Address" name="address" required></textarea>
              </div>
            </div>
            <div class="form-group">
              <label for="inputExperience" class="col-sm-2 control-label">Birthday</label>

              <div class="col-sm-10">
                <input type="date" name="birthday" class="form-control" required>
              </div>
            </div>
            <hr>
            <h5>Account Details</h5>
            <div class="form-group">
              <label for="inputName" class="col-sm-2 control-label">Username</label>

              <div class="col-sm-10">
                <input type="text" class="form-control" id="inputName" placeholder="Username"  name="username" required>
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
      <div class="modal-footer">
        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
        MES
      </div>
    </div>
  </div>
</div>