<div class="sidebar" id="sidebar">
    <div class="widget">
       <h5 class="widget_title">Collections</h5>
       <ul class="widget_categories">
         <li>
            <a href="{{ url('shop') }}">
               <span class="categories_name">All Products</span>
               <span class="categories_num">({{ \App\Models\Admin\Product::count() }})</span>
            </a>
         </li>
          <?php $collections = \App\Models\Brand::latest()->get(); ?>
          @foreach ($collections as $collection)              
            <li>
               <a href="{{url('shop?collection='.$collection->slug)}}">
                  <span class="categories_name">{{ $collection->name }}</span>
                  <span class="categories_num">({{ \App\Models\Admin\Product::where('brand_id',$collection->id)->count() }})</span>
               </a>
            </li>
          @endforeach
       </ul>
    </div>
    <div class="widget">
       <h5 class="widget_title">Price Filter </h5>
       <form action="">
         <p>
            <label for="amount">Maximum price ($):</label>
            <input type="text" name="price_range" id="amount" {{ isset($_GET['price_range']) ? 'value="'.$_GET['price_range'].'"' : '' }} readonly style="border:0;width: 90px; color:#f6931f; font-weight:bold;">
         </p> 
         <div id="slider-range-min"></div>
         <br/>
         <input type="submit" value="Filter">
      </form>
    </div>    
    <div class="widget">
       <h5 class="widget_title">Size</h5>
       <div class="product_size_switch">
            <?php $sizes = ['XS','S','M','L','XL','XXl','3XL']; ?>
            @foreach ($sizes as $size)                
               <a href="{{url('shop?size='.$size)}}"><span>{{ $size }}</span></a>            
            @endforeach
       </div>
    </div>
    
</div>