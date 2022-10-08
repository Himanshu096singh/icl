<label for="subcategory">Product Sub Category</label>
<select name="subcategory_id" class="form-control"  id="subcategory" required>
    <option value="">Select Sub Category</option>
<?php $__currentLoopData = $subcategory; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
	<option value="<?php echo e($item->id); ?>"><?php echo e($item->name); ?></option>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</select>
<?php /**PATH C:\xampp\htdocs\laravel\icl\resources\views/admin/product/subcategory_list.blade.php ENDPATH**/ ?>