<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Holidays <button type="button" class="btn btn-primary btn-xs" id="add_holiday"><i class="fa fa-plus"></i>Add</button>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-group"></i> Holidays </a></li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content">
      <!-- Main row -->
      <div class="row">
        <section class="col-lg-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Lists</h3>

              <div class="box-tools">
              </div>
            </div>

            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
              <table class="table table-hover">
                <tbody><tr>
                  <th>Name</th>
                  <th>Date</th>
                  <th>Action</th>
                </tr>
                <?php if(isset($holidays)): foreach($holidays as $holiday):?>
                  <tr>
                  <td><?php echo $holiday->name;?></td>
                  <td><?php echo date('M d Y', strtotime($holiday->date));?></td>
                  <td>
                    <a href="<?php echo base_url();?>admin/holidays/edit/<?php echo $holiday->id;?>"><button type="button" class="btn btn-info btn-xs"><i class="fa fa-eye"></i>Edit</button></a>
                    <a href="<?php echo base_url();?>admin/holidays/delete/<?php echo $holiday->id;?>" onclick="return confirm('Delete this data?')"><button type="button" class="btn btn-danger btn-xs"><i class="fa fa-eye"></i>Delete</button></a>
                  </td>
                </tr>
                <?php endforeach;?>
                <?php else:?> 
                  <tr>
                    <td colspan="5">No holidays found.</td>
                  </tr>
                <?php endif;?>
                
                
              </tbody></table>
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
    $('#add_holiday').click(function(){
      $('#add_employee_form').modal('show');
    });
    $('#submit').click(function(e){
        
    });
  });
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
        echo form_open('admin/holidays/add',$attributes);
        ;?>
            <div class="form-group">
              <label for="inputName" class="col-sm-2 control-label">Name</label>

              <div class="col-sm-10">
                <input type="text" class="form-control" id="inputName" placeholder="Name" name="name" required>
              </div>
            </div>
            <div class="form-group">
              <label for="inputName" class="col-sm-2 control-label">Date</label>

              <div class="col-sm-10">
                <input type="date" name="date" class="form-control" required>
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