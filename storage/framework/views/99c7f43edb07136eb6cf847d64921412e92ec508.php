<?php $__env->startSection('content'); ?>
<?php header( "refresh:3;url=/" ); ?>
<style>
	.errorpage{
		text-align: center;
		min-height:400px;
		padding:200px 20px;
		width:100%;
		margin:auto;
	}
</style>	
<div class="container">
	<div class="row">
		<div class="errorpage">
			<h1>404</h1>
			<h2>Page Not Found</h2>
			<a href="<?php echo e(url('/')); ?>" class="btn btn-warning">Go To Home</a>
		</div>	
	</div>
</div>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.front', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\laravel\icl\resources\views/errors/404.blade.php ENDPATH**/ ?>