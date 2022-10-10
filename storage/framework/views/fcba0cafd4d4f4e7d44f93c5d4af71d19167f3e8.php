<?php if(!empty($meta['title'])): ?>
    <title><?php echo $meta['title']; ?></title>
        <?php else: ?>
    <title><?php echo e(config('app.name')); ?></title>
<?php endif; ?>    

<?php if(!empty($meta['keyword'])): ?>
    <meta name="keywords" content="<?php echo $meta['keyword']; ?>">
<?php endif; ?>    
<?php if(!empty($meta['description'])): ?>
    <meta name="description" content="<?php echo $meta['description']; ?>">
<?php endif; ?>


<?php if(!empty($meta['title'])): ?>
<meta property="og:title" content="<?php echo $meta['title']; ?>"/>
<?php endif; ?>
<?php if(!empty($meta['description'])): ?>
<meta property="og:description" content="<?php echo $meta['description']; ?>" />
<?php endif; ?>
<meta property="og:url" content="<?php echo e(url()->current()); ?>" />
<meta property="og:type" content="website" />
<?php if(!empty($meta['image'])): ?>
<meta property="og:image" content="<?php echo e(url('public')); ?>/<?php echo e($meta['image']); ?>" />
<?php else: ?>
<meta property="og:image" content="<?php echo e(url('public/frontend/images/logo.png')); ?>" />
<?php endif; ?>      
<meta name="twitter:card" content="summary">
<?php if(!empty($meta['title'])): ?>
<meta name="twitter:title" content="<?php echo $meta['title']; ?>">
<?php endif; ?>
<?php if(!empty($meta['description'])): ?>
<meta name="twitter:description" content="<?php echo $meta['description']; ?>">
<?php endif; ?>
<?php if(!empty($meta['image'])): ?>
<meta name="twitter:image" content="<?php echo e(url('public')); ?>/<?php echo e($meta['image']); ?>">
<?php else: ?>
<meta name="twitter:image" content="<?php echo e(url('public/frontend/images/logo.png')); ?>">
<?php endif; ?>
<meta name="twitter:site" content="<?php echo e(config('app.name')); ?>">
<link rel="canonical" href="<?php echo e(url()->current()); ?>" /> 
<?php /**PATH C:\xampp\htdocs\icl\resources\views/layouts/meta_tags.blade.php ENDPATH**/ ?>