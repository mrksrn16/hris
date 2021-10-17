<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Payroll <!-- <button type="button" class="btn btn-primary btn-xs" id="add_employee"><i class="fa fa-plus"></i>Add</button> -->
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-group"></i> Payroll </a></li>
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
                  <th>ID</th>
                  <th>Name</th>
                  <th>Action</th>
                </tr>
                <?php if(isset($employees)): foreach($employees as $employee):?>
                  <tr>
                  <td><?php echo $employee->user_id;?></td>
                  <td><?php echo $employee->name;?></td>
                  <td>
                    <a href="<?php echo base_url();?>admin/payroll/view/<?php echo $employee->user_id;?>"><button type="button" class="btn btn-success btn-xs"><i class="fa fa-eye"></i>View</button></a>
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