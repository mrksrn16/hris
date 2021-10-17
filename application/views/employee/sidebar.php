
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="<?php echo base_url();?>/uploads/users/<?php echo $get_current_user_details->photo;?>" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p> <?php echo $get_current_user_details->name;?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <?php $active_link = $this->uri->segment(2);?>
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
        <li class="<?php if($active_link =='dashboard'){echo "active";}?>"><a href="<?php echo base_url();?>employee/dashboard"><i class="fa fa-home"></i> <span>Home</span></a></li>
        <li class="<?php if($active_link =='employees'){echo "active";}?>"><a href="<?php echo base_url();?>employee/profile"><i class="fa fa-user"></i> <span>Employee Profile</span></a>
        <li class="<?php if($active_link =='payroll'){echo "active";}?>"><a href="<?php echo base_url();?>employee/payroll"><i class="fa fa-money"></i> <span>Payroll</span></a></li>
        <li class="<?php if($active_link =='holidays'){echo "active";}?>"><a href="<?php echo base_url();?>employee/holidays"><i class="fa fa-calendar"></i> <span>Holidays</span></a></li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>