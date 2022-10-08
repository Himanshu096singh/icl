<?php $__env->startSection('title', 'Shopunity Dashboard'); ?>

<?php $__env->startSection('Admin header'); ?>

<?php $__env->startSection('Admin sidebar'); ?>


<?php $__env->startSection('content'); ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard v1</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
   
      <div class="row">
       <!--    <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box">
              <span class="info-box-icon bg-info elevation-1"><i class="fas fa-cog"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">CPU Traffic</span>
                <span class="info-box-number">
                  10
                  <small>%</small>
                </span>
              </div>
              
            </div>
            
          </div>-->
         
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-chart-line"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Sale of the year</span>
                <span class="info-box-number">Rs <?php echo e($total_sale); ?></span>
              </div>
             
            </div>
            
          </div> 
          

        
          <div class="clearfix hidden-md-up"></div>

          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-success elevation-1"><i class="fas fa-chart-line"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Sale of the Month</span>
                <span class="info-box-number">Rs <?php echo e($this_month_sale); ?></span>
              </div>
             
            </div>
          
          </div>
        
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-chart-line"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Sale of the Day</span>
                <span class="info-box-number">Rs <?php echo e($today_sale); ?></span>
              </div>
          
            </div>
            
          </div>
          
        </div>



                <div class="row">


            <!--         <div class="col-md-12">
                    <div class="card card-info1">
              <div class="card-header">
                <h3 class="card-title">Sales Month Wise - <?php echo e(date('Y')); ?> </h3><br/> 
                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
                </div>
              </div>
              <div class="card-body">
                <div class="chart">
                  <canvas id="hour_wise" style="min-height: 250px; height: 250px; max-height: 450px; max-width: 100%;"></canvas>
                </div>
              </div>
              
            </div>
                </div> -->

                <div class="col-md-12">
                    <div class="card card-info1">
              <div class="card-header">
                <h3 class="card-title">Sales Analytics</h3><br/> 
                <form action="" method="GET" id="filter" style="display: flex;">
                  
                  <select class="form-control" name="year" id="filter_year">
                    <option selected="" value="">Select Year</option>
                    <option>2020</option>
                    <option>2021</option>
                    <option>2022</option>
                  </select>
                

<select name="month"  id="filter_month" class="form-control">
<option selected="" value="">Select Month</option>
<?php
for($i=1;$i<=12;$i++){
?>
<option value="<?php echo e($i); ?>"><?php echo e(date('M',mktime(1,1,1,$i,1,2000))); ?></option>
<?php
}
?>
</select>
<input type="submit" class="btn btn-primary" value="Filter">
</form>
<br/>

<button class="btn bg-gradient-success btn-sm" onclick="reload()">Current Year</button>
<button class="btn bg-gradient-info btn-sm" onclick="month_wise()">Current Month</button>
<button class="btn bg-gradient-secondary btn-sm" onclick="today_wise()">Today</button>

<select id="filter_by" class="btn btn-default btn-sm" onchange="day_filter(this.value)">
  <option value="" selected="">Filter by</option>
  <option value="0">Last 7 Days</option>
  <option value="1">Last 30 Days</option>
  <!-- <option value="2">Last Month</option> -->
</select>


                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
                </div>
              </div>
              <div class="card-body">
                <div class="chart">
                  <canvas id="barChart" style="min-height: 250px; height: 250px; max-height: 450px; max-width: 100%;cursor: none;"></canvas>
                </div>
              </div>
              <!-- /.card-body -->
            </div>
                </div>




          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3>Contact List</h3>
              </div>
              
<form action="<?php echo e(url('admin/contact/delete_all')); ?>" method="POST"> 
  <?php echo csrf_field(); ?>
  <div class="form-group">
    <button type="submit" class="btn btn-danger mt-2 ml-2" onclick="return confirm('Are you sure to Want to Delete')">Delete</button>
  </div>

<div class="card-body">
<table id="example1" class="table table-bordered table-striped">
<thead>
<tr>
<th><input type="checkbox" name="id" value="" id="check_all"></th>
<th>#</th>
<th>Name</th>
<th>Email</th>
<th>Phone</th>
<th>Subject</th>
<th>Actions</th>
</tr>
</thead>
<tbody>
                 

  
 <?php
$count=1;
 ?>              
<?php $__currentLoopData = $contact; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

<tr>
<td><input type="checkbox" class="check_all" name="ids[]" value="<?php echo e($item->id); ?>"></td>
<td><?php echo e($count++); ?></td>
<td><?php echo e($item->name); ?></td>
<td><?php echo e($item->email); ?></td>
<td><?php echo e($item->phone); ?></td>
<td><?php echo \Illuminate\Support\Str::words($item->message, 20, '...'); ?></td>
<td>
<div class="btn-group btn-group-sm">
<a href="<?php echo e(url('admin/contact/view')); ?>/<?php echo e(base64_encode($item->id)); ?>" class="btn btn-success"><i class="fas fa-eye"></i></a>
<a href="<?php echo e(url('admin/contact/delete')); ?>/<?php echo e(base64_encode($item->id)); ?>" class="btn btn-danger" onclick="return confirm('Delete this Business User ?')"><i class="fas fa-trash"></i></a>

</div>
</td>
</tr>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                 
                  </tbody>
             
                </table>
              </div>
              </form>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>

   
      </div>
    </section>
    
  </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('Admin footer'); ?>


<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\laravel\icl\resources\views/admin/dashboard.blade.php ENDPATH**/ ?>