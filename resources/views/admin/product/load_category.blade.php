<label for="product_slug">Product Category</label>
        <select class="form-control" id="category_save1" name="category_id"required="">
        <option value="" selected="">-- Select Category -- </option>
        @foreach($categories as $item)
        <option value="{{$item->id}}">{{$item->name}}</option>
        @endforeach
        </select>