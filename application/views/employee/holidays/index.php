<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Holidays
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
                </tr>
                <?php if(isset($holidays)): foreach($holidays as $holiday):?>
                  <tr>
                  <td><?php echo $holiday->name;?></td>
                  <td><?php echo date('M d Y', strtotime($holiday->date));?></td>
                 
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