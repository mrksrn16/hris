<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Logs <!-- <button type="button" class="btn btn-primary btn-xs" id="add_employee"><i class="fa fa-plus"></i>Add</button> -->
      </h1>
    </section>
    <!-- Main content -->
    <section class="content">
      <!-- Main row -->
      <div class="row">
        <!-- Left col -->
        <section class="col-lg-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Lists</h3>

            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
              <table class="table table-hover">
                <tbody><tr>
                  <th>Date</th>
                  <th>Employee</th>
                  <th>Salary</th>
                  <th>Status</th>
                </tr>
                <?php if(count($logs)): foreach($logs as $log):?>
                  <tr>
                  <td><?php echo date('M d Y' , strtotime($log->date));?></td>
                  <td><?php $details = $this->M_User->get_employee_details($log->employee_id); echo $details->name;?></td>
                  <td><?php echo $log->salary;?></td>
                  <td><button class="btn btn-xs btn-success"><?php echo $log->status;?></button></td>
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