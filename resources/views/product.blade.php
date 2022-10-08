<div class="product product_box">
   <div class="product_img">
      <a href="{{ url('/') }}/{{ $product->category->slug }}/{{ $product->subcategory->slug }}/{{ $product->slug }}">
      <img src="{{ url('public') }}/{{ $product->image }}" alt="{{ $product->name }}" >
      </a>
   </div>
   <div class="product_info">
      <h6 class="product_title">
         <a href="{{ url('/') }}/{{ $product->category->slug }}/{{ $product->subcategory->slug }}/{{ $product->slug }}">{{ $product->name }}</a>
      </h6>
      <div class="product_price">
         @if ($product->is_sale==1)
         <span class="price">₹{{ $product->sale_price }}</span>
         <del>₹{{ $product->price }}</del>
         <div class="on_sale">
            <span>{{ number_format(100-($product->sale_price/$product->price)*100,2) }}% Off</span>
         </div>
         @else
         <span class="price">₹{{ $product->price }}</span>
         @endif
      </div>
   </div>
</div>
