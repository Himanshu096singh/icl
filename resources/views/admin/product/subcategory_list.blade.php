<label for="subcategory">Product Sub Category</label>
<select name="subcategory_id" class="form-control"  id="subcategory" required>
    <option value="">Select Sub Category</option>
@foreach($subcategory as $item)
	<option value="{{$item->id}}">{{$item->name}}</option>
@endforeach
</select>
