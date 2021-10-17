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
              <img class="profile-user-img img-responsive img-circle" src="<?php echo base_url();?>assets/images/users/<?php echo $employee->photo;?>" alt="User profile picture" style="width: 100px; height: 100px;">

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
            <?php echo form_open('admin/employees/view/'.$employee_id, $attributes);?>
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
                     <button type="button" class="btn btn-primary btn-xs" id="btnAddAttendance"><i class="fa fa-plus"></i>Add</button>
                    </div>
                  <!-- /.box-header -->
                  <div class="box-body table-responsive no-padding">
                    <table class="table table-hover">
                      <tbody><tr>
                        <th>Date</th>
                        <th>Time in</th>
                        <th>Time out</th>
                        <th></th>
                      </tr>
                      <?php if(isset($attendance)): foreach($attendance as $myAttendance):?>
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
                        <td>
                          <a href="#" onclick="edit_attendance('<?php echo $myAttendance->id;?>')"><button type="button" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i>Edit</button></a>
                         <a href="<?php echo base_url();?>admin/employees/delete_attendance/<?php echo $myAttendance->id;?>/<?php echo $employee->user_id;?>"><button type="button" class="btn btn-danger btn-xs" onclick="return confirm('Are you sure to delete this item?')"><i class="fa fa-trash"></i>Delete</button></a>
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
                    <button type="button" class="btn btn-primary btn-xs" id="btnAddLeave"><i class="fa fa-plus"></i>Add</button>
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
                        <th></th>
                      </tr>
                      <?php if(isset($leave)): foreach($leave as $myLeave):?>
                      <tr>
                        <td><?php echo date('M-d-Y', strtotime($myLeave->date));?></td>
                        <td><?php echo $myLeave->notes;?></td>
                        <td>
                          <a href="#" onclick="edit_leave('<?php echo $myLeave->id;?>')"><button type="button" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i>Edit</button></a>
                          <a href="<?php echo base_url();?>admin/employees/delete_leave/<?php echo $myLeave->id;?>/<?php echo $employee->user_id;?>"><button type="button" class="btn btn-danger btn-xs" onclick="return confirm('Are you sure to delete this item?')"><i class="fa fa-trash"></i>Delete</button></a>
                        </td>
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
                    <button type="button" class="btn btn-primary btn-xs" id="btnAddBonus"><i class="fa fa-plus"></i>Add</button>
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
                        <th></th>
                      </tr>
                      <?php if(isset($bonus)): foreach($bonus as $myBonus):?>
                      <tr>
                        <td><?php echo date('M-d-Y', strtotime($myBonus->date));?></td>
                        <td><?php echo $myBonus->amount;?></td>
                        <td><?php echo $myBonus->notes;?></td>
                        <td>
                          <a href="#" onclick="edit_bonus('<?php echo $myBonus->id;?>')"><button type="button" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i>Edit</button></a>
                          <a href="<?php echo base_url();?>admin/employees/delete_bonus/<?php echo $myBonus->id;?>/<?php echo $employee->user_id;?>"><button type="button" class="btn btn-danger btn-xs" onclick="return confirm('Are you sure to delete this item?')"><i class="fa fa-trash"></i>Delete</button></a>
                        </td>
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
    $("[name='start_date']").change(function() {
      end_date = $("[name='end_date']").val();
      if($(this).val() > end_date){
        alert('Start date should be less than the end date');
        $('#btnFilter').prop('disabled', true);
      }else{
        $('#btnFilter').prop('disabled', false);
      }
    });
    $('#btnAddLeave').click(function(){
      $('#add_leave').modal('show');
    });
    $('#btnAddAttendance').click(function(){
      $('#add_attendance').modal('show');
    });
    $('#btnAddBonus').click(function(){
      $('#add_bonus').modal('show');
    });
  }); 
  function addZero(i){
    if(i < 10){
      i = "0" + i;
    }
    return i;
  }
  function edit_attendance(id){
    base_url = '<?php echo base_url();?>';
    $.ajax({
      type: "get",
      url: base_url + 'admin/employees/get_attendance/' + id,
      dataType: "json",
      success: function(data){
        // var time_in = new Date(data.time_in);
        // var time_out = new Date(data.time_out);
        $('[name="attendance_date"]').val(data.date);
        // $('[name="attendance_in"]').val(addZero(time_in.getHours())+":"+addZero(time_in.getMinutes()));
        // if(data.time_out){
        //   $('[name="attendance_out"]').val(addZero(time_out.getHours())+":"+addZero(time_out.getMinutes()));
        // }else{
        //   $('[name="attendance_out"]').val("--:--");
        // }
        $('[name="attendance_in"]').val(data.time_in);
        $('[name="attendance_out"]').val(data.time_out);
        
        $('[name="attendance_id"]').val(data.id);
      }
    });
    $('#edit_attendance').modal('show');
  }
  function edit_leave(id){
    base_url = '<?php echo base_url();?>';
    $.ajax({
      type: "get",
      url: base_url + 'admin/employees/get_leave/' + id,
      dataType: "json",
      success: function(data){
        $('[name="leave_date"]').val(data.date);
        $('[name="notes"]').val(data.notes);
        $('[name="leave_id"]').val(data.id);
        $('[name="employee_id"]').val(data.employee_id);
      }
    });
    $('#edit_leave').modal('show');
  }
  function update_attendace(){
    $.ajax({
      type: "post",
      data: $('#edit_attendance').serialize(),
      url: base_url + 'admin/employees/update_attendance/',
      dataType: "json",
      success: function(data){
        //window.location.reload();
      },
      error: function (jqXHR, textStatus, errorThrown)
      {
        alert('Error on ajax  ');
      }
    });
  }
  function update_leave(){
    $.ajax({
      type: "post",
      data: $('#leave_form').serialize(),
      url: base_url + 'admin/employees/update_leave/',
      dataType: "json",
      success: function(data){
        // window.location.reload();
      },
      error: function (jqXHR, textStatus, errorThrown)
      {
        alert('Error on ajax');
      }
    });
  }
  function edit_bonus(id){
    $('#edit_bonus').modal('show');
    base_url = '<?php echo base_url();?>';
    $.ajax({
      type: "get",
      url: base_url + 'admin/employees/get_bonus/' + id,
      dataType: "json",
      success: function(data){
        $('[name="bonus_amount"]').val(data.amount);
        $('[name="bonus_notes"]').val(data.notes);
        $('[name="bonus_id"]').val(data.id);
        $('[name="employee_id"]').val(data.employee_id);
      }
    });
  }
</script>
<div class="modal fade" id="add_attendance" role="dialog" data-backdrop="static">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h3 class="modal_title">Add Attendance</h3>
      </div>
      <div class="modal-body">
        <?php 
        $attributes = array('class' => 'form-horizontal','id' => 'attendance_form');
        echo form_open('admin/employees/add_attendance/'.$employee_id ,$attributes);
        ;?>
            <div class="form-group">
              <input type="hidden" name="attendance_id">
              <label for="attendanceDate" class="col-sm-2 control-label">Date</label>

              <div class="col-sm-10">
                <input type="date" class="form-control" id="" name="date" value="<?php echo date('Y-m-d')?>">
              </div>
            </div>
            <div class="form-group">
              <label for="inputName" class="col-sm-2 control-label">Time In</label>

              <div class="col-sm-10">
                <input type="time" class="form-control without" id="" placeholder="Time In" name="time_in" required>
              </div>
            </div>
            <div class="form-group">
              <label for="inputEmail" class="col-sm-2 control-label">Time Out</label>

              <div class="col-sm-10">
                <input type="time" class="form-control without" id="" placeholder="Time Out" name="time_out" required>
              </div>
            </div>
            <div class="form-group">
              <div class="col-sm-offset-2 col-sm-10"><button type="submit" id="submit" class="btn btn-primary">Save</button>
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
<div class="modal fade" id="edit_attendance" role="dialog" data-backdrop="static">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h3 class="modal_title">Edit Attendance</h3>
      </div>
      <div class="modal-body">
        <?php 
        $attributes = array('class' => 'form-horizontal','id' => 'attendance_form');
        echo form_open('admin/employees/update_attendance/' . $employee_id,$attributes);
        ;?>
            <div class="form-group">
              <input type="hidden" name="attendance_id">
              <label for="attendanceDate" class="col-sm-2 control-label">Date</label>

              <div class="col-sm-10">
                <input type="text" class="form-control" id="" name="attendance_date" disabled>
              </div>
            </div>
            <div class="form-group">
              <label for="inputName" class="col-sm-2 control-label">Time In</label>

              <div class="col-sm-10">
                <input type="time" class="form-control without" id="" placeholder="Time In" name="attendance_in" required>
              </div>
            </div>
            <div class="form-group">
              <label for="inputEmail" class="col-sm-2 control-label">Time Out</label>

              <div class="col-sm-10">
                <input type="time" class="form-control without" id="" placeholder="Time Out" name="attendance_out" required>
              </div>
            </div>
            <div class="form-group">
              <div class="col-sm-offset-2 col-sm-10">
               <button type="submit" id="submit" class="btn btn-primary">Update</button>
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
<!-- Leave Form -->
<div class="modal fade" id="add_leave" role="dialog" data-backdrop="static">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h3 class="modal_title">Add Leave</h3>
      </div>
      <div class="modal-body">
        <?php 
        $attributes = array('class' => 'form-horizontal','id' => 'leave_form');
        echo form_open('admin/employees/add_leave/'.$employee->user_id  ,$attributes);
        ;?>
            <div class="form-group">
              <input type="hidden" name="leave_id">
              <label for="attendanceDate" class="col-sm-2 control-label">Date</label>

              <div class="col-sm-10">
                <input type="date" class="form-control" id="inputName" name="leave_date" value="">
              </div>
            </div>
            <div class="form-group">
              <label for="inputName" class="col-sm-2 control-label">Notes</label>
              <div class="col-sm-10">
                <textarea class="form-control" name="notes" placeholder="Add notes"></textarea>
              </div>
            </div>
            <div class="form-group">
              <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" id="submit" class="btn btn-primary">Save</button>
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
<!-- Edit Leave -->
<div class="modal fade" id="edit_leave" role="dialog" data-backdrop="static">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h3 class="modal_title">Edit Leave</h3>
      </div>
      <div class="modal-body">
        <?php 
        $attributes = array('class' => 'form-horizontal','id' => 'leave_form');
        echo form_open('admin/employees/update_leave',$attributes);
        ;?>
            <div class="form-group">
              <input type="hidden" name="leave_id">
              <input type="hidden" name="employee_id">
              <label for="attendanceDate" class="col-sm-2 control-label">Date</label>

              <div class="col-sm-10">
                <input type="date" class="form-control" id="inputName" name="leave_date" >
              </div>
            </div>
            <div class="form-group">
              <label for="inputName" class="col-sm-2 control-label">Notes</label>

              <div class="col-sm-10">
                <textarea class="form-control" name="notes" placeholder="Add notes"></textarea>
              </div>
            </div>
            <div class="form-group">
              <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" id="submit" class="btn btn-primary">Update</button>
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
<!-- Bonus Form -->
<div class="modal fade" id="add_bonus" role="dialog" data-backdrop="static">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h3 class="modal_title">Add Bonus</h3>
      </div>
      <div class="modal-body">
        <?php 
        $attributes = array('class' => 'form-horizontal','id' => 'bonus_form');
        echo form_open('admin/employees/add_bonus/'.$employee->user_id  ,$attributes);
        ;?>
            <div class="form-group">
              <label for="attendanceDate" class="col-sm-2 control-label">Amount</label>

              <div class="col-sm-10">
                <input type="number" class="form-control" id="inputName" name="bonus_amount" value="Amount">
              </div>
            </div>
            <div class="form-group">
              <label for="inputName" class="col-sm-2 control-label">Notes</label>
              <div class="col-sm-10">
                <textarea class="form-control" name="notes" placeholder="Add notes"></textarea>
              </div>
            </div>
            <div class="form-group">
              <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" id="submit" class="btn btn-primary">Save</button>
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
<!-- Edit Bonus -->
<div class="modal fade" id="edit_bonus" role="dialog" data-backdrop="static">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h3 class="modal_title">Edit Bonus</h3>
      </div>
      <div class="modal-body">
        <?php 
        $attributes = array('class' => 'form-horizontal','id' => 'bonus_form');
        echo form_open('admin/employees/update_bonus',$attributes);
        ;?>
            <div class="form-group">
              <input type="hidden" name="bonus_id">
              <input type="hidden" name="employee_id">
              <label for="inputName" class="col-sm-2 control-label">Amount</label>

              <div class="col-sm-10">
                <input type="number" class="form-control" name="bonus_amount" placeholder="Amount">
              </div>
            </div>
            <div class="form-group">
              <label for="inputName" class="col-sm-2 control-label">Notes</label>

              <div class="col-sm-10">
                <textarea class="form-control" name="bonus_notes" placeholder="Add notes"></textarea>
              </div>
            </div>
            <div class="form-group">
              <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" id="submit" class="btn btn-primary">Update</button>
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