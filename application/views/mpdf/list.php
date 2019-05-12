<style type="text/css">
	.table{
		width:100%;
		font-family: Arial;
	}
	table{
		border-collapse: collapse;
	}
	table tr td, th{
		padding: 5px 10px;
		border: 1px solid #444;
	}
	.logo{
		width: 80px;
		height: 80px;
		float: left;
		margin-right: 10px;
	}
	.company-name{
		text-transform: uppercase;
		font-weight: bold;
		font-size: 24px;
		margin-top: 10px;
	}
	.company-address{
		color: gray;
	}
	header{
		margin-bottom: 50px;
	}
</style>
<header>
	<img src="<?php echo base_url();?>assets/images/logo/logo.jpg" class="logo"><br/>
	<span class="company-name">Lc Brand</span><br/>
	<span class="company-address">Valenzuela City</span>
</header>
<h3>List of Employees</h3>
<span><?php echo date('M d Y');?></span>
<table class="table">
    <tbody><tr>
      <th>Employee Name</th>
      <th>Position</th>
      <th>Email</th>
      <th>Contact</th>
    </tr>
    <?php if(count($employees)): foreach($employees as $employee):?>
      <tr>
      <td><?php echo $employee->name;?></td>
      <td><?php echo $employee->position;?></td>
      <td><?php echo $employee->email;?></td>
      <td><?php echo $employee->contact;?></td>
    </tr>
    <?php endforeach;?>
    <?php else:?> 
      <tr>
        <td colspan="5">No employees found.</td>
      </tr>
    <?php endif;?> 
  </tbody>
</table>