<style type="text/css">
  li{
    padding: 5px 0px;
  }
  @media only screen and (max-width: 480px){
    .col-sm-2 {
        width: 50% !important;
        float: left;
    }
    .col-sm-12{
      clear: both;
    }
  }
</style>
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <?php echo $employee->name;?>
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
      <div class="col-md-12">
          <div class="col-sm-1"><label>Filter: </label></div>
            <?php $attributes = array('class' => 'validateForm');?>
            <?php echo form_open('admin/payroll/view/'.$employee_id, $attributes);?>
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
        <div class="col-md-12" style="margin-top: 20px;">
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#payroll" data-toggle="tab" aria-expanded="false">Payroll</a></li>
              <li class=""><a href="#tab_1" data-toggle="tab" aria-expanded="false">Attendance</a></li>
              <li class=""><a href="#tab_2" data-toggle="tab" aria-expanded="false">Overtime</a></li>
              <li class=""><a href="#tab_3" data-toggle="tab" aria-expanded="false">Leave</a></li>
              <li class=""><a href="#tab_4" data-toggle="tab" aria-expanded="false">Holidays</a></li>
              <li class=""><a href="#tab_5" data-toggle="tab" aria-expanded="false">Deductions</a></li>
              <li class=""><a href="#tab_6" data-toggle="tab" aria-expanded="false">Bonus & Others</a></li>
            </ul>
            <div class="tab-content">
            <div class="tab-pane active" id="payroll">
                <div class="box">
                  <!-- /.box-header -->
                  <div class="box-body table-responsive no-padding">
                    <table class="table table-hover">
                      <tbody>
                        <div class="col-sm-12" align="center"><h2>LC BRAND PARTNERSHIP</h2>
                        <p style="margin:0">Some captions here</p>
                        <p>For the day of <b><em><?php echo date('M d', strtotime($start_date));?></em></b> to <em><b><?php echo date('M d Y', strtotime($end_date));?></b></em></p>
                        </div>
                        <div class="col-sm-12">
                          <div class="col-sm-6" style="margin:0">
                            <label>Employee Name:</label> <?php echo $employee->name;?>
                            <br>
                            <label>Employee Number:</label> <?php echo $employee->id;?>
                          </div>
                          <div class="col-sm-6" style="margin:0;text-align: right;">
                              <label>Date:</label> <?php echo date('M d Y')?>
                          </div>
                        </div>
                        <div class="col-sm-12" style="margin-top: 20px;">
                          <div class="col-sm-2" style="margin:0">
                            <label>Earnings</label>
                            <ul style="list-style: none;">
                              <li>Bonus/Others</li>
                              <li>Gross Salary</li>
                              <li>Overtime</li>
                              <li><b>Total Earnings:</b></li>
                            </ul>
                            <br>
                          </div>
                          <div class="col-sm-2" style="margin:0;text-align: right;">
                            <label>&nbsp;</label>
                            <ul style="list-style: none;">
                              <li><b><?php if($total_bonus):?><?php echo $total_bonus;?><?php else:?> --- <?php endif;?></b></li>
                              <li><b><?php if($total_number_of_days && $employee_rate):?><?php echo (int)$total_number_of_days * (int)$employee_rate;?><?php else:?> &nbsp; <?php endif;?></b></li>
                              <li><b><?php if($total_overtime_pay):?><?php echo $total_overtime_pay;?><?php else:?> ---<?php endif;?></b></li>
                              <li><em><b><?php echo $total_earnings;?></em></b></li>
                            </ul>
                          </div>
                        </div>
                        <div class="col-sm-12" style="margin-top: 20px;">
                          <div class="col-sm-2" style="margin:0">
                            <label>Deductions</label>
                            <ul style="list-style: none;">
                              <li>Tax</li>
                              <li>SSS</li>
                              <li>PHILHEALTH</li>
                              <li>PAGIBIG</li>
                              <li><b>Total Deductions:</b></li>
                            </ul>
                            <br>
                          </div>
                          <div class="col-sm-2" style="margin:0;text-align: right;">
                            <label>&nbsp;</label>
                            <ul style="list-style: none;">
                              <li>
                                <em>
                                <?php if($tax == 0):?>
                                  EXEMPTED
                                <?php else:?>
                                  <?php echo $tax;?>
                                <?php endif;?>
                                </em>
                              </li>
                              <li><b><?php echo $sss;?></b></li>
                              <li><b><?php echo $philhealth;?></b></li>
                              <li><b><?php echo $pagibig;?></b></li>
                              <li><?php echo $total_deductions;?> / 2  = <b><em><?php echo $total_deductions_divide_by_two;?></em></b></li>
                            </ul>
                          </div>
                        </div>
                        <div class="col-sm-12" style="margin-top: 20px;">
                          <div class="col-sm-2" style="margin:0">
                            <label>&nbsp;</label>
                            <ul style="list-style: none;">
                              <li><b>Total Net Pay:</b></li>
                            </ul>
                            <br>
                          </div>
                          <div class="col-sm-2" style="margin:0;text-align: right;">
                            <label>&nbsp;</label>
                            <ul style="list-style: none;">
                              <li><b><em><u><?php echo $total_net_pay;?></u></em></b></li>
                            </ul>
                          </div>
                        </div>
                      </tbody>
                      </table>
                  </div>
                  <!-- /.box-body -->
                </div>
              </div>
              <!-- Attendance -->
              <div class="tab-pane" id="tab_1">
                <div class="box">
                  <!-- /.box-header -->
                  <div class="box-body table-responsive no-padding">
                    <table class="table table-hover">
                      <tbody><tr>
                        <th>Date</th>
                        <th>Time in</th>
                        <th>Time out</th>
                        <th></th>
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
                        <td>
                          <?php $d = date('m-d', strtotime($myAttendance->date));
                          $where = "date like '%" . $d . "%'";
                          $this->db->where($where);
                          $res = $this->db->get('tbl_holidays')->row();
                          if($res):
                          ?>
                          <em><?php echo ucfirst($res->type);?> &nbsp;Holiday</em>
                        <?php endif;?>
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
                <p>Number of days: <span><b><?php echo $total_number_of_days;?></b></span></p>
                <p>Employee rate: <span><b><?php echo $employee_rate;?></b></span></p>
                <p>Salary: <span><b><?php echo (int)$total_number_of_days * (int)$employee_rate;?></b></span></p>
              </div>
              <div class="tab-pane" id="tab_2">
                <div class="box">
                  <div class="box-header">
                    <h3 class="box-title">Overtime</h3>
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
                        <th>Number of Hours</th>
                        <th>Pay</th>
                      </tr>
                      <?php if(count($overtime)): foreach($overtime as $myOvertime):?>
                      <tr value="<?php echo $myOvertime->id;?>">
                        <td><?php echo date('M-d-Y', strtotime($myOvertime->date));?></td>
                        <td><?php echo $myOvertime->number_of_hours;?></td>
                        <td><?php echo $myOvertime->total_pay;?>
                        </td>
                      </tr>
                      <?php endforeach;?>
                      <?php else:?>
                        <tr>
                          <th colspan="3">No Overtime.</th>
                        </tr>
                      <?php endif;?>
                      
                    </tbody></table>
                  </div>
                  <!-- /.box-body -->
                </div>
                <?php if(count($overtime)):?>
                <p>Number of Hours: <span><b><?php echo $count_all_over_time;?></b></span></p>
                <p>Employee rate: <span><b>100</b></span></p>
                <p>Pay: <span><b><?php echo $total_overtime_pay;?></b></span></p>
                <?php endif;?>
              </div>
              <!-- /.tab-pane -->
              <!-- Leave -->
              
              <!-- /.tab-pane -->
              <div class="tab-pane" id="tab_3">
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
                      <tr value="<?php echo $myAttendance->id;?>">
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
               <!-- Holidays -->
              <div class="tab-pane" id="tab_4">
                <div class="box">
                  <div class="box-header">
                    <h3 class="box-title">Holidays</h3>
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
                        <th>Name</th>
                        <th></th>
                      </tr>
                      <?php if(count($holidays)): foreach($holidays as $holiday):?>
                      <tr>
                        <td><?php echo date('M-d-Y', strtotime($holiday->date));?></td>
                        <td><?php echo $holiday->name;?></td>

                        <td>
                          
                        </td>
                      </tr>
                      <?php endforeach;?>
                      <?php else:?>
                        <tr>
                          <th colspan="3">No Holidays.</th>
                        </tr>
                      <?php endif;?>
                    </tbody></table>
                  </div>
                  <!-- /.box-body -->
                </div>
              </div>
              <div class="tab-pane" id="tab_5">
                <div class="box">
                  <div class="box-header">
                    <h3 class="box-title">Deductions</h3>
                    <div class="box-tools">
                    <button type="button" class="btn btn-default"><i class="fa fa-arrow-left"></i></button>
                    <button type="button" class="btn btn-default"><i class="fa fa-arrow-right"></i></button>
                    </div>
                  </div>
                  <!-- /.box-header -->
                  <div class="box-body table-responsive no-padding">
                    <table class="table table-hover">
                      <tbody>
                        <tr>
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
                      </tbody>
                      </table>
                  </div>
                  <!-- /.box-body -->
                </div>
              </div>
              <div class="tab-pane" id="tab_6">
                <div class="box">
                  <div class="box-header">
                    <h3 class="box-title">Bonus & Others</h3>
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
    $("[name='start_date']").change(function() {
      end_date = $("[name='end_date']").val();
      if($(this).val() > end_date){
        alert('Start date should be less than the end date');
        $('#btnFilter').prop('disabled', true);
      }else{
        $('#btnFilter').prop('disabled', false);
      }
    });
  });
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
        LC Brand
      </div>
    </div>
  </div>
</div>