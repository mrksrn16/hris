<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Employee Rate <button type="button" class="btn btn-primary btn-xs" id="add_employee"><i class="fa fa-plus"></i>Add</button>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-star"></i> Employee Rate </a></li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content">
      <!-- Main row -->
      <div class="row">
        <section class="col-lg-12">
          <div class="box">
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
              <table class="table table-hover">
                <tbody><tr>
                  <th>Position</th>
                  <th>Rate</th>
                  <th></th>
                </tr>
                <?php if(isset($rate)): foreach($rate as $empRate):?>
                	<tr>
                		<td><?php echo ucfirst($empRate->position);?></td>
                		<td><?php echo $empRate->rate;?></td>
                		<td><a href="javascript:void(0)" onclick="edit('<?php echo $empRate->id;?>')"><span class="btn btn-xs btn-primary">Edit</span></a></td>
                	</tr>
                <?php endforeach;endif;?>
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
  });
    function edit(id){
    $('#edit_rate').modal('show');
    $.ajax({
      type: 'get',
      url:'<?php echo base_url();?>' + 'admin/rate/get_rate/' + id,
      dataType: 'json',
      success: function(data){
        $("[name='id']").val(data.id);
        $("[name='position']").val(data.position);
        $("[name='rate']").val(data.rate);
      },
      error: function (jqXHR, textStatus, errorThrown)
      {
        alert('Error on ajax');
      }
    });
    }
    function update_rate(){
       $.ajax({
        type: 'post',
        data: $('#rate_form').serialize(),
        url:'<?php echo base_url();?>' + 'admin/rate/update_rate/',
        dataType: 'json',
        success: function(data){
          window.location.reload();
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
          alert('Error on ajax');
        }
      });
    }
  </script>
  <div class="modal fade" id="edit_rate" role="dialog" data-backdrop="static">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h3 class="modal_title">Add Attendance</h3>
      </div>
      <div class="modal-body">
        <?php 
        $attributes = array('class' => 'form-horizontal','id' => 'rate_form');
        echo form_open('' ,$attributes);
        ;?>
            <div class="form-group">
              <input type="hidden" name="id">
              <label for="attendanceDate" class="col-sm-2 control-label">Position</label>

              <div class="col-sm-10">
                <input type="text" name="position" class="form-control">
              </div>
            </div>
            <div class="form-group">
              <input type="hidden" name="attendance_id">
              <label for="attendanceDate" class="col-sm-2 control-label">Rate</label>

              <div class="col-sm-10">
                <input type="number" name="rate" class="form-control">
              </div>
            </div>
            <div class="form-group">
              <div class="col-sm-offset-2 col-sm-10"><button type="button" onclick="update_rate()" id="submit" class="btn btn-primary">Save</button>
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