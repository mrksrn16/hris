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
        <div class="col-md-9">
          <div class="col-sm-1"><label>Filter: </label></div>
            <?php $attributes = array('class' => 'validateForm');?>
            <?php echo form_open('employee/profile', $attributes);?>
            <div class="col-sm-3" style="padding: 0;padding-left: 10px !important;">
                <input type="date" name="start_date" class="form-control" value="<?php echo $start_date;?>" id="start_date" required>
            </div>
            <div class="col-sm-3" style="padding: 0;padding-left: 10px !important;">
               <input type="date" name="end_date" class="form-control" value="<?php echo $end_date;?>" id="end_date" style="position: relative;" required>
               <b style="position: absolute;left: 0;top:10px;">-</b>
               <button type="submit" class="btn btn-primary btn-fill" style="position: absolute;right: -60px;top: 0px;" id="btnFilter">Go</button>
            </div>
            </form>
        </div>
        <div class="col-md-9" style="margin-top: 20px;">
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#tab_1" data-toggle="tab" aria-expanded="false">Attendance</a></li>
              <li class=""><a href="#tab_2" data-toggle="tab" aria-expanded="false">Leave</a></li>
              <li class=""><a href="#tab_3" data-toggle="tab" aria-expanded="false">Benefits</a></li>
              <li class=""><a href="#tab_4" data-toggle="tab" aria-expanded="false">Bonus & Others</a></li>
            </ul>
            <div class="tab-content">
              <!-- Attendance -->
              <div class="tab-pane active" id="tab_1">
                <div class="box">
                  <div class="box-header">
                    <h3 class="box-title">
                    Attendance
                    </h3>
                    </div>
                  <!-- /.box-header -->
                  <div class="box-body table-responsive no-padding">
                    <table class="table table-hover">
                      <tbody><tr>
                        <th>Date</th>
                        <th>Time in</th>
                        <th>Time out</th>
                      </tr>
                      <?php if(count($attendance)): foreach($attendance as $myAttendance):?>
                      <tr value="<?php echo $myAttendance->id;?>">
                        <td><?php echo date('M-d-Y', strtotime($myAttendance->date));?></td>
                        <td><?php echo date('h:i', strtotime($myAttendance->time_in));?></td>
                        <td><?php 
                        if($myAttendance->time_out){
                          echo date('h:i', strtotime($myAttendance->time_out));
                        }else{
                          echo "---";
                        }
                        ?>
                        </td>
                      </tr>
                      <?php endforeach;?>
                      <?php else:?>
                        <tr>
                          <th colspan="3">No Attendance.</th>
                        </tr>
                      <?php endif;?>
                      
                    </tbody></table>
                  </div>
                  <!-- /.box-body -->
                </div>
              </div>
              <!-- /.tab-pane -->
              <!-- Leave -->
              <div class="tab-pane" id="tab_2">
                <div class="box">
                  <div class="box-header">
                    <h3 class="box-title">Leave</h3>
                    <div class="box-tools">
                    <button type="button" class="btn btn-default"><i class="fa fa-arrow-left"></i></button>
                    <button type="button" class="btn btn-default"><i class="fa fa-arrow-right"></i></button>
                    </div>
                  </div>
                  <!-- /.box-header -->
                  <div class="box-body table-responsive no-padding">
                    <table class="table table-hover">
                      <tbody><tr>
                        <th>Date</th>
                        <th>Notes</th>
                      </tr>
                      <?php if(count($leave)): foreach($leave as $myLeave):?>
                      <tr>
                        <td><?php echo date('M-d-Y', strtotime($myLeave->date));?></td>
                        <td><?php echo $myLeave->notes;?></td>
                      </tr>
                      <?php endforeach;?>
                      <?php else:?>
                        <tr>
                          <th colspan="3">No Leave.</th>
                        </tr>
                      <?php endif;?>
                    </tbody></table>
                  </div>
                  <!-- /.box-body -->
                </div>
              </div>
              <!-- /.tab-pane -->
              <div class="tab-pane" id="tab_3">
               <div class="box">
                  <div class="box-header">
                    <h3 class="box-title">Benefits</h3>
                    <div class="box-tools">
                    <button type="button" class="btn btn-default"><i class="fa fa-arrow-left"></i></button>
                    <button type="button" class="btn btn-default"><i class="fa fa-arrow-right"></i></button>
                    </div>
                  </div>
                  <!-- /.box-header -->
                  <div class="box-body table-responsive no-padding">
                    <table class="table table-hover">
                      <tbody><tr>
                          <td>Tax: &nbsp; <label>
                            <em>
                              <?php if($tax == 0):?>
                                EXEMPTED
                              <?php else:?>
                                <?php echo $tax;?>
                              <?php endif;?>
                              </em>
                          </label></td>
                        </tr>
                         <tr>
                          <td>SSS: &nbsp; <label><?php echo $sss;?></label></td>
                        </tr>
                         <tr>
                          <td>PHILHEALTH: &nbsp; <label><?php echo $philhealth;?></label></td>
                        </tr>
                         <tr>
                          <td>PAGIBIG: &nbsp; <label><?php echo $pagibig;?></label></td>
                        </tr>
                    </tbody></table>
                  </div>
                  <!-- /.box-body -->
                </div>
              </div>
              <!-- /.tab-pane -->
               <!-- Bonus -->
              <div class="tab-pane" id="tab_4">
                <div class="box">
                  <div class="box-header">
                    <h3 class="box-title">Bonus</h3>
                    <div class="box-tools">
                    <button type="button" class="btn btn-default"><i class="fa fa-arrow-left"></i></button>
                    <button type="button" class="btn btn-default"><i class="fa fa-arrow-right"></i></button>
                    </div>
                  </div>
                  <!-- /.box-header -->
                  <div class="box-body table-responsive no-padding">
                    <table class="table table-hover">
                      <tbody><tr>
                        <th>Date</th>
                        <th>Amount</th>
                        <th>Notes</th>
                      </tr>
                      <?php if(count($bonus)): foreach($bonus as $myBonus):?>
                      <tr>
                        <td><?php echo date('M-d-Y', strtotime($myBonus->date));?></td>
                        <td><?php echo $myBonus->amount;?></td>
                        <td><?php echo $myBonus->notes;?></td>
                      </tr>
                      <?php endforeach;?>
                      <?php else:?>
                        <tr>
                          <th colspan="3">No Bonus.</th>
                        </tr>
                      <?php endif;?>
                    </tbody></table>
                  </div>
                  <!-- /.box-body -->
                </div>
              </div>
            </div>
            <!-- /.tab-content -->
          </div>
          <!-- /.nav-tabs-custom -->
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
        LC Brand
      </div>
    </div>
  </div>
</div>