<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        &nbsp;
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url();?>admin/holidays"><i class="fa fa-group"></i> Holidays </a></li>
        <li><?php echo $holiday->name;?></li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content">
      <!-- Main row -->
      <div class="row">
        <div class="col-md-12">
        <?php 
        $attributes = array('class' => 'form-horizontal','id' => 'edit_form');
        echo form_open('admin/holidays/update/'.$holiday->id,$attributes);
        ;?>
        <div class="form-group">
              <label for="inputName" class="col-sm-2 control-label">Name</label>

              <div class="col-sm-10">
                <input type="text" class="form-control" id="inputName" placeholder="Name" name="name" required value="<?php echo $holiday->name;?>">
              </div>
            </div>
            <div class="form-group">
              <label for="inputName" class="col-sm-2 control-label">Date</label>

              <div class="col-sm-10">
                <input type="date" name="date" class="form-control" value="<?php echo date('Y-m-d', strtotime($holiday->date));?>" required>
              </div>
            </div>
            <div class="form-group">
              <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" id="submit" class="btn btn-primary">Submit</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </section>
  </div>