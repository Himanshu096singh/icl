<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title><?php echo e(config('app.name')); ?> - <?php echo $__env->yieldContent('title'); ?></title>
      <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
      <link rel="stylesheet" href="<?php echo e(asset('public/admin/plugins/fontawesome-free/css/all.min.css')); ?>">
      <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
      <link rel="stylesheet" href="<?php echo e(asset('public/admin/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')); ?>">
      <link rel="stylesheet" href="<?php echo e(asset('public/admin/plugins/icheck-bootstrap/icheck-bootstrap.min.css')); ?>">
      <link rel="stylesheet" href="<?php echo e(asset('public/admin/plugins/jqvmap/jqvmap.min.css')); ?>">
      <link rel="stylesheet" href="<?php echo e(asset('public/admin/plugins/summernote/summernote-bs4.min.css')); ?>">
      <link rel="stylesheet" href="<?php echo e(asset('public/admin/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')); ?>">
      <link rel="stylesheet" href="<?php echo e(asset('public/admin/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')); ?>">
      <link rel="stylesheet" href="<?php echo e(asset('public/admin/plugins/datatables-buttons/css/buttons.bootstrap4.min.css')); ?>">
      <link rel="stylesheet" href="<?php echo e(asset('public/admin/css/adminlte.min.css')); ?>">
      <!-- overlayScrollbars -->
      <link rel="stylesheet" href="<?php echo e(asset('public/admin/plugins/overlayScrollbars/css/OverlayScrollbars.min.css')); ?>">
      <!-- Daterange picker -->
      <link rel="stylesheet" href="<?php echo e(asset('public/admin/plugins/daterangepicker/daterangepicker.css')); ?>">
      <link rel="stylesheet" href="<?php echo e(asset('public/admin/plugins/toastr/toastr.css')); ?>">
      <link href="https://code.jquery.com/ui/1.11.3/themes/smoothness/jquery-ui.css"/>
      <script src="<?php echo e(asset('public/admin/plugins/jquery/jquery.min.js')); ?>"></script>
      <?php $__env->startSection('css'); ?>
      <?php echo $__env->yieldSection(); ?>
      <style>
         .alert ul {margin-bottom: 0px !important;}
         .list-group-item {display: inline-flex;align-items: center;}
         .highlight {background: #f7e7d3;min-height: 30px;list-style-type: none;}
         .handle {width: 100%;display: inline-block;cursor: move;margin-right: 10px;}
         .buttons-copy,.buttons-csv,.buttons-excel,.buttons-pdf,.buttons-print,.buttons-collection{padding: 2px 5px;font-size: 10pt;}
         .select2-container--default .select2-selection--multiple .select2-selection__choice {
         background-color: #007bff;border-color: #006fe6;color: #fff;padding: 0 10px;margin-top: .31rem;}
         .select2-container--default .select2-selection--multiple .select2-selection__choice__remove{color:#fff;}
         a .nav-link i .fa-circle{font-size: 10pt;}
         ul .nav-treeview li{font-size: 11pt;}
         ul .nav-treeview li i{font-size: 11pt;}
      </style>
   </head>
   <body class="hold-transition sidebar-mini layout-fixed">
      <div class="wrapper">
         <!-- Navbar -->
         <?php $__env->startSection('Admin Header'); ?>
         <?php echo $__env->make('layouts.partials.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
         <?php echo $__env->yieldSection(); ?>  
         <!-- /.navbar -->
         <!-- Main Sidebar Container -->
         <?php if(Auth::user()->role==1): ?>
         <?php $__env->startSection('Admin sidebar'); ?>
         <?php echo $__env->make('layouts.partials.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
         <?php echo $__env->yieldSection(); ?>
         <?php endif; ?>
         <?php if(Auth::user()->role==2): ?>
         <?php $__env->startSection('Admin sidebar'); ?>
         <?php echo $__env->make('layouts.partials.business_sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
         <?php echo $__env->yieldSection(); ?>
         <?php endif; ?>
         <?php echo $__env->yieldContent('content'); ?>
         <?php $__env->startSection('Admin footer'); ?>
         <?php echo $__env->make('layouts.partials.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
         <?php echo $__env->yieldSection(); ?>
         <!-- Control Sidebar -->
         <aside class="control-sidebar control-sidebar-dark">
         </aside>
      </div>
      <script src="<?php echo e(asset('public/admin/plugins/jquery-ui/jquery-ui.min.js')); ?>"></script>
      <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
      <script>
         $.widget.bridge('uibutton', $.ui.button)
      </script>
      <!-- Bootstrap 4 -->
      <script src="<?php echo e(asset('public/admin/plugins/bootstrap/js/bootstrap.bundle.min.js')); ?>"></script>
      <!-- ChartJS -->
      <script src="<?php echo e(asset('public/admin/plugins/chart.js/Chart.min.js')); ?>"></script>
      <!-- Sparkline -->
      <script src="<?php echo e(asset('public/admin/plugins/sparklines/sparkline.js')); ?>"></script>
      <!-- JQVMap -->
      <script src="<?php echo e(asset('public/admin/plugins/datatables/jquery.dataTables.min.js')); ?>"></script>
      <script src="<?php echo e(asset('public/admin/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')); ?>"></script>
      <script src="<?php echo e(asset('public/admin/plugins/datatables-responsive/js/dataTables.responsive.min.js')); ?>"></script>
      <script src="<?php echo e(asset('public/admin/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')); ?>"></script>
      <script src="<?php echo e(asset('public/admin/plugins/datatables-buttons/js/dataTables.buttons.min.js')); ?>"></script>
      <script src="<?php echo e(asset('public/admin/plugins/datatables-buttons/js/buttons.bootstrap4.min.js')); ?>"></script>
      <!-- Summernote -->
      <script src="<?php echo e(asset('public/admin/plugins/jqvmap/jquery.vmap.min.js')); ?>"></script>
      <script src="<?php echo e(asset('public/admin/plugins/jqvmap/maps/jquery.vmap.usa.js')); ?>"></script>
      <!-- jQuery Knob Chart -->
      <script src="<?php echo e(asset('public/admin/plugins/jquery-knob/jquery.knob.min.js')); ?>"></script>
      <!-- daterangepicker -->
      <script src="<?php echo e(asset('public/admin/plugins/moment/moment.min.js')); ?>"></script>
      <script src="<?php echo e(asset('public/admin/plugins/daterangepicker/daterangepicker.js')); ?>"></script>
      <!-- Tempusdominus Bootstrap 4 -->
      <script src="<?php echo e(asset('public/admin/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js')); ?>"></script>
      <script src="<?php echo e(asset('public/admin/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')); ?>"></script>
      <script src="<?php echo e(asset('public/admin/plugins/jszip/jszip.min.js')); ?>"></script>
      <script src="<?php echo e(asset('public/admin/plugins/pdfmake/pdfmake.min.js')); ?>"></script>
      <script src="<?php echo e(asset('public/admin/plugins/pdfmake/vfs_fonts.js')); ?>"></script>
      <script src="<?php echo e(asset('public/admin/plugins/datatables-buttons/js/buttons.html5.min.js')); ?>"></script>
      <script src="<?php echo e(asset('public/admin/plugins/datatables-buttons/js/buttons.print.min.js')); ?>"></script>
      <script src="<?php echo e(asset('public/admin/plugins/datatables-buttons/js/buttons.colVis.min.js')); ?>"></script>
      <script src="<?php echo e(asset('public/admin/js/adminlte.js')); ?>"></script>
      <!-- AdminLTE for demo purposes -->
      <script src="<?php echo e(asset('public/admin/js/demo.js')); ?>"></script>
      <!-- Bootstrap Switch -->
      <script src="<?php echo e(asset('public/admin/plugins/bootstrap-switch/js/bootstrap-switch.min.js')); ?>"></script>
      <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
      <script src="<?php echo e(asset('public/admin/js/pages/dashboard.js')); ?>"></script>
      <script type="text/javascript" src="<?php echo e(asset('public/admin/plugins/toastr/toastr.min.js')); ?>"></script>
      <!--       <script src="https://cdn.ckeditor.com/4.15.1/standard/ckeditor.js"></script>
         <script type="text/javascript"> 
            CKEDITOR.replace( 'description');
            CKEDITOR.replace( 'short_description');
            CKEDITOR.replace( 'additional_information');
            CKEDITOR.replace( 'shipping_return');
         </script> -->
      <?php $__env->startSection('js'); ?>
      <?php echo $__env->yieldSection(); ?>
      <script>
         <?php if(Session::has('message')): ?>
           var type = "<?php echo e(Session::get('alert-type', 'info')); ?>";
           switch(type){
               case 'info':
                   toastr.info("<?php echo e(Session::get('message')); ?>");
                   break;
               
               case 'warning':
                   toastr.warning("<?php echo e(Session::get('message')); ?>");
                   break;
         
               case 'success':
                   toastr.success("<?php echo e(Session::get('message')); ?>");
                   break;
         
               case 'error':
                   toastr.error("<?php echo e(Session::get('message')); ?>");
                   break;
                   case 'danger':
                   toastr.error("<?php echo e(Session::get('message')); ?>");
                   break;
           }
         <?php endif; ?>
      </script>
      <script>
         $(function () {
            $("#example1,example2").DataTable({
              "responsive": true, "lengthChange": false, "autoWidth": false,
              "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
            $('#example2').DataTable({
              "paging": true,
              "lengthChange": false,
              "searching": false,
              "ordering": true,
              "info": true,
              "autoWidth": false,
              "responsive": true,
            });
          });
         
         
      </script>
      <script type="text/javascript">
         //Custom Js Start
            // $(document).ready(function(){
         $("#category_save").on("change",function(){
         var category_id=$(this).val();
         $.get('<?php echo e(url("/get_subcategory")); ?>',{ category_id:category_id}, function(data){
         $("#subcat").html(data);
         });
         })
         
         
         
         
         function change_status(id,value){
         var id=id;
         var value=value;
         $.ajax({
           type:'POST',
           url:'<?php echo e(url("admin/product/category_status")); ?>',
           headers: {
               'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
           },
           data:{id:id,status:value},
           success:function(res){
           window.location.reload(true);
           },
           error:function(res){
         console.log(res);
           }
         })
         }
         
         function change_status_brand(id,value){
         var id=id;
         var value=value;
         $.ajax({
           type:'POST',
           url:'<?php echo e(url("admin/product/category_status_brand")); ?>',
           headers: {
               'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
           },
           data:{id:id,status:value},
           success:function(res){
           window.location.reload(true);
           },
           error:function(res){
         console.log(res);
           }
         })
         }
         
         function change_status_sub(id,value){
         var id=id;
         var value=value;
         $.ajax({
           type:'POST',
           url:'<?php echo e(url("admin/product/category_status_sub")); ?>',
           headers: {
               'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
           },
           data:{id:id,status:value},
           success:function(res){
           window.location.reload(true);
           },
           error:function(res){
         console.log(res);
           }
         })
         }
         function load_sub(value){
         var category_id=value;
           // alert(category_id);
            $.get('<?php echo e(url("/get_subcategory")); ?>',{ category_id:category_id}, function(data){
           $("#subcat").html(data);
         })
          }
          
          function load_cates(value){
           var brand_id=value;    
             $.get('<?php echo e(url("/get_category")); ?>',{ brand_id:brand_id}, function(data){
               $("#load-cat").html(data);
               // console.log(data);
             });
          }
         
         function business_status(id,value){
         var id=id;
         var value=value;
          // alert(id+"----"+value);
         $.ajax({
           type:'POST',
           url:'<?php echo e(url("admin/business/update_status")); ?>',
           headers: {
               'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
           },
           data:{id:id,status:value},
           success:function(res){
           window.location.reload(true);
           },
           error:function(res){
         console.log(res);
           }
         })
         }
         
         function coupon_status(id,value){
         var id=id;
         var value=value;
          // alert(id+"----"+value);
         $.ajax({
           type:'POST',
           url:'<?php echo e(url("admin/coupon/update_status")); ?>',
           headers: {
               'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
           },
           data:{id:id,status:value},
           success:function(res){
           window.location.reload(true);
           },
           error:function(res){
         console.log(res);
           }
         })
         }
         
         function change_popular(id,value){
         var id=id;
         var value=value;
          // alert(id+"----"+value);
         $.ajax({
           type:'POST',
           url:'<?php echo e(url("admin/category/change_popular")); ?>',
           headers: {
               'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
           },
           data:{id:id,status:value},
           success:function(res){
           window.location.reload(true);
           },
           error:function(res){
         console.log(res);
           }
         })
         }
         
         function customer_status(id,value){
         var id=id;
         var value=value;
          // alert(id+"----"+value);
         $.ajax({
           type:'POST',
           url:'<?php echo e(url("admin/customer/update_status")); ?>',
           headers: {
               'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
           },
           data:{id:id,status:value},
           success:function(res){
           window.location.reload(true);
           },
           error:function(res){
         console.log(res);
           }
         })
         }
         
         
         $(document).ready(function(){
         
               $("#changepasswordform").submit(function(e){
            var newpassword=$("#newpassword").val();   
           var confirmpasssword=$("#confirmpasssword").val();    
             if(newpassword!=confirmpasssword){
            e.preventDefault();
            $("#psw_err").html("Your password doesn't match");
               }
               else{
                  $("#psw_err").html("");
                 return true;
               }
           
             // return true;
         });
         
         });
         
         function edit_subcat(id){
         var id=id
          $.get("<?php echo e(url('admin/produtct/editsubcategory')); ?>",{id:id}, function(res){
           var obj=JSON.parse(res);
           // console.log();
           $("#esubid").val(obj.id);
           $("#esubname").val(obj.name);
           $("#esubslug").val(obj.slug);
           $("#meta_title").val(obj.meta_title);
           $("#meta_keyword").val(obj.meta_keyword);
           $("#meta_description").val(obj.meta_description);
         });
         $('#exampleModal').modal("show");
         }
         
         
         function load_size1(){
         // var color=color;
         console.log(2);
         }
         
         
         function on_sale1(option){
           var option=option;
           if(option==1){
             $("#sale_price").removeAttr("disabled");
             $("#sale_price").attr("required","");
           }
         if(option==0){
             $("#sale_price").attr("disabled","");
             $("#sale_price").removeAttr("required","");
           }
           
         
         }
         
         
         function product_status(id,status){
         var id=id;
         var status=status;
         $.ajax({
         type:'POST',
         url:'<?php echo e(url("admin/product/business-product/update_status")); ?>',
         headers:{
               'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
           },
           data:{product_id:id,status:status},
           success:function(res){
             if(res==1){
               window.location.reload(true);
             }else{
               toastr.error("Something went wrong");
             }
             console.log(res);
           },
           error:function(res){
             toastr.error("Something went wrong");
             console.log(res);
           }
         });
         }
         
         
         
         $("#filter").submit(function(e){
         e.preventDefault();
         var year=$("#filter_year").val();
         var month=$("#filter_month").val();
         // console.log(year+"   "+month)
         $.ajax({
           type:'GET',
           url:"<?php echo e(('admin/get_data')); ?>",
           headers:{
               'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
           },
           data:{year:year,month:month},
           success:function(res){
         if(month!=""){
         function days(month,year){
         return new Date(year, month, 0).getDate();
         }
         var arr=[];
         for(i=1;i<=days(month,year);i++){
         arr.push(i);
         }
             var obj = JSON.parse(res);
         var ctx = document.getElementById('barChart').getContext('2d');
         var chart = new Chart(ctx, {
           type: 'bar',
           data: {
               labels: arr,
               datasets: [
               {
                   label: 'Sales in ($)',
                    backgroundColor: '#e91e6336',
                   borderColor:'#f35abd',
                   data: obj
               }
               ]
           },
           options: {}
         });
         }else{
         
             var obj = JSON.parse(res);
         var ctx = document.getElementById('barChart').getContext('2d');
         var chart = new Chart(ctx, {
           type: 'bar',
           data: {
               labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July','August','September','October','November','December'],
               datasets: [
               {
                   label: 'Sales in ($)',
                    backgroundColor: '#e91e6336',
                   borderColor:'#f35abd',
                   data: obj
               }
               ]
           },
           options: {}
         });
         }
         
           },
           error:function(res){
             console.log(res);
           }
         })
         })
         
         
         
         $.get("<?php echo e(('admin/get_data')); ?>", function(res) {
         var obj = JSON.parse(res);
         var ctx = document.getElementById('barChart').getContext('2d');
         var chart = new Chart(ctx, {
           type: 'bar',
           data: {
               labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July','August','September','October','November','December'],
               datasets: [
               {
                   label: 'Sales in 2020 (Rs)',
                    backgroundColor: '#e91e6336',
                   borderColor:'#f35abd',
                   data: obj
               }
               ]
           },
         
           // Configuration options go here
           options: {}
         });
         });
         
         function month_wise(){
         
         
         $.get("<?php echo e(('admin/day_wise')); ?>", function(res) {
         function days(month,year){
                return new Date(year, month, 0).getDate();
             }
             var arr=[];
         for(i=1;i<=days(<?=date("m")?>,<?=date("Y")?>);i++){
         arr.push(i+'-<?=date("M")?>-<?=date("Y")?>');
         }
         // console.log(arr);
         
         var obj = JSON.parse(res);
         var ctx = document.getElementById('barChart').getContext('2d');
         var chart = new Chart(ctx, {
           type: 'bar',
           data: {
               labels: arr,
               datasets: [
               {
                   label: 'Sales in <?=date("M")?>',
                   backgroundColor: '#8bc34a9c',
                   borderColor:'#8bc34a',
                   data: obj
               }
               ]
           },
         
           // Configuration options go here
           options: {}
         });
         });
         
         }
         
         function today_wise() {
         $.get("<?php echo e(('admin/hour_wise')); ?>", function(res) {
         function days(month,year){
                return new Date(year, month, 0).getDate();
             }
             var arr=[];
         for(i=1;i<=24;i++){
         arr.push(i+":00");
         }
         // console.log(arr);
         
         var obj = JSON.parse(res);
         var ctx = document.getElementById('barChart').getContext('2d');
         var chart = new Chart(ctx, {
           type: 'bar',
           data: {
               labels: arr,
               datasets: [
               {
                   label: 'Sales of Today',
                   backgroundColor: '#8bc34a9c',
                   borderColor:'#8bc34a',
                   data: obj
               }
               ]
           },
         
           // Configuration options go here
           options: {}
         });
         
         });
         
         }
         
         
         function day_filter(filter_by) {
         var filter_by=filter_by;
         if(filter_by==0){
           d=7
         }else if(filter_by==1){
           d=30
         }
         $.ajax({
           type:'GET',
           url:'<?php echo e(url("admin/custom_range")); ?>',
           data:{filter_by:filter_by},
           success:function(res){
              var obj = JSON.parse(res);
              console.log(obj.days)
              console.log(obj.sales)
         
               var ctx = document.getElementById('barChart').getContext('2d');
              var chart = new Chart(ctx, {
                type: 'bar',
                data: {
                labels: obj.days,
                datasets: [
                {
                   label: 'Sales of last '+d+' Days',
                   backgroundColor: '#8bc34a9c',
                   borderColor:'#8bc34a',
                   data: obj.sales
                }
               ]
           },
         
           // Configuration options go here
           options: {}
         });
           },
           error:function(res) {
             console.log(res)
           }
         })
         }
         
         
         
         
         
         
         
         
           var areaChartData = {
             labels  : ['January', 'February', 'March', 'April', 'May', 'June', 'July','August','September','October','November','December'],
             datasets: [
               {
                 label               : 'Digital Goods',
                 backgroundColor     : 'rgba(60,141,188,0.9)',
                 borderColor         : 'rgba(60,141,188,0.8)',
                 pointRadius          : false,
                 pointColor          : '#3b8bba',
                 pointStrokeColor    : 'rgba(60,141,188,1)',
                 pointHighlightFill  : '#fff',
                 pointHighlightStroke: 'rgba(60,141,188,1)',
                 data                : [28, 48, 40, 19, 86, 27, 90,50]
               },
               {
                 label               : 'Electronics',
                 backgroundColor     : 'rgba(210, 214, 222, 1)',
                 borderColor         : 'rgba(210, 214, 222, 1)',
                 pointRadius         : false,
                 pointColor          : 'rgba(210, 214, 222, 1)',
                 pointStrokeColor    : '#c1c7d1',
                 pointHighlightFill  : '#fff',
                 pointHighlightStroke: 'rgba(220,220,220,1)',
                 data                : [65, 59, 80, 81, 56, 55, 40]
               },
               
             ]
           }
         
         
         
          // var barChartCanvas = $('#barChart1').get(0).getContext('3d')
           // var barChartData = jQuery.extend(true, {}, areaChartData)
           // var temp0 = areaChartData.datasets[0]
           // var temp1 = areaChartData.datasets[1]
           // barChartData.datasets[0] = temp1
           // barChartData.datasets[1] = temp0
         
           // var barChartOptions = {
           //   responsive              : true,
           //   maintainAspectRatio     : false,
           //   datasetFill             : false
           // }
         
           // var barChart = new Chart(barChartCanvas, {
           //   type: 'bar', 
           //   data: barChartData,
           //   options: barChartOptions
           // })
         
         function reload(){
         window.location.reload(true);
         }
         
         
         
      </script>
      <script>
         $(document).ready(function(){
         
             function updateToDatabase(idString){
                $.ajaxSetup({ headers: {'X-CSRF-TOKEN': '<?php echo e(csrf_token()); ?>'}});
                 
                $.ajax({
                   url:"<?php echo e(url('admin/product/update_image_order')); ?>",
                   method:'POST',
                   data:{ids:idString},
                   success:function(res){
                     // console.log(res)
                      toastr.success("Image Order successfully changed");
                      //do whatever after success
                   },
                   error:function(res){
         
                   }
                })
             }
         
             var target = $('.sort_menu');
             target.sortable({
                 handle: '.handle',
                 placeholder: 'highlight',
                 axis: "y",
                 update: function (e, ui){
                    var sortData = target.sortable('toArray',{ attribute: 'data-id'})
                    // console.log(sortData.join(','));
                    updateToDatabase(sortData.join(','))
                 }
             })
             
         })
         
         
         $("#check_all").click(function() { 
         if ($("#check_all").prop("checked")) { 
         $(".check_all").attr("checked",true)
         } else { 
         $(".check_all").attr("checked",false)
         
         } 
         });
      </script>
   </body>
</html>
<?php /**PATH C:\xampp\htdocs\laravel\icl\resources\views/layouts/admin.blade.php ENDPATH**/ ?>