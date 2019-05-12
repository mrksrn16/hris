<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Employee Benefits
        <!--  <button type="button" class="btn btn-primary btn-xs" id="add_employee"><i class="fa fa-plus"></i>Add</button> -->
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
                  <th>SSS</th>
                  <th>Philhealth</th>
                  <th>Pagibig</th>
                  <th>Tax</th>
                  <th></th>
                </tr>
                <?php if(count($benefits)): foreach($benefits as $benefit):?>
                	<tr>
                		<td><?php echo ucfirst($benefit->position);?></td>
                		<td><?php echo $benefit->sss;?></td>
                    <td><?php echo $benefit->philhealth;?></td>
                    <td><?php echo $benefit->pagibig;?></td>
                    <td>
                      <?php  if($benefit->tax == 0):?> 
                        <em>EXEMPTED</em>
                      <?php else: ?>
                      <?php echo $benefit->tax;?>
                      <?php endif; ?>
                    </td>
                	<td><a href="javascript:void(0)" onclick="edit('<?php echo $benefit->id;?>')"><span class="btn btn-xs btn-primary">Edit</span></a></td>
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
    $('#edit_benefit').modal('show');
    $.ajax({
      type: 'get',
      url:'<?php echo base_url();?>' + 'admin/benefits/get_benefit/' + id,
      dataType: 'json',
      success: function(data){
        $("[name='id']").val(data.id);
        $("[name='position']").val(data.position);
        $("[name='sss']").val(data.sss);
        $("[name='philhealth']").val(data.philhealth);
        $("[name='tax']").val(data.tax);
        $("[name='pagibig']").val(data.pagibig);
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
  <div class="modal fade" id="edit_benefit" role="dialog" data-backdrop="static">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h3 class="modal_title">Edit Benefits</h3>
      </div>
      <div class="modal-body">
        <?php 
        $attributes = array('class' => 'form-horizontal','id' => 'rate_form');
        echo form_open('admin/benefits/update_benefit' ,$attributes);
        ;?>
            <div class="form-group">
              <input type="hidden" name="id">
              <label for="attendanceDate" class="col-sm-2 control-label">Position</label>

              <div class="col-sm-10">
                <input type="text" name="position" class="form-control" required="">
              </div>
            </div>
            <div class="form-group">
              <input type="hidden" name="attendance_id">
              <label for="attendanceDate" class="col-sm-2 control-label">SSS</label>

              <div class="col-sm-10">
                <input type="number" name="sss" class="form-control" required="">
              </div>
            </div>
            <div class="form-group">
              <input type="hidden" name="attendance_id">
              <label for="attendanceDate" class="col-sm-2 control-label">Philhealth</label>

              <div class="col-sm-10">
                <input type="number" name="philhealth" class="form-control" required="">
              </div>
            </div>

            <div class="form-group">
              <input type="hidden" name="attendance_id">
              <label for="attendanceDate" class="col-sm-2 control-label">Pagibig</label>

              <div class="col-sm-10">
                <input type="number" name="pagibig" class="form-control" required="">
              </div>
            </div>
            <div class="form-group">
              <input type="hidden" name="attendance_id">
              <label for="attendanceDate" class="col-sm-2 control-label">Tax</label>

              <div class="col-sm-10">
                <input type="number" name="tax" class="form-control" required="" required="">
              </div>
            </div>
            <div class="form-group">
             <!--  <div class="col-sm-offset-2 col-sm-10"><button type="button" onclick="update_rate()" id="submit" class="btn btn-primary">Save</button> -->
              <div class="col-sm-offset-2 col-sm-10"><button type="submit" id="submit" class="btn btn-primary">Save</button>
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