<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Brand;
use App\Models\Review;
use App\Models\Product_category;
use App\Models\Productfaq;
use App\Models\Product_subcategory;
use App\Models\ProductImages;

class Product extends Model
{
    use SoftDeletes;

    protected $fillable = ['business_id', 'name', 'alt','slug', 'stock', 'price', 'commission_value', 'commission_price', 'is_sale', 'sale_price', 'category_id', 'subcategory_id', 'brand_id', 'fabric_id', 'image', 'short_description', 'description', 'additional_information', 'shipping_return', 'meta_title', 'meta_description', 'meta_keyword', 'status', 'size', 'color', 'sku', 'dupatta_length', 'created_at', 'updated_at', 'deleted_at'];

    protected $casts = [
        'size' => 'array'
    ];

    // protected $with = ['collection', 'category'];

    /**
     * Get the collection that owns the Product
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function collection()
    {
        return $this->belongsTo(Brand::class, 'brand_id');
    }

    /**
     * Get the category that owns the Product
     *
     * @return \Illuminate\Product_category\Eloquent\Relations\BelongsTo
     */
    public function category()
    {
        return $this->belongsTo(Product_category::class, 'category_id');
    }

    public function subcategory()
    {
        return $this->belongsTo(Product_subcategory::class, 'subcategory_id');
    }
    /**
     * Get all of the images for the Product
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function images()
    {
        return $this->hasMany(ProductImages::class);
    }
    public function faqs()
    {
        return $this->hasMany(Productfaq::class);
    }

    /**
    * Write code on Method
    *
    * @return response()
    */

    public function getNextAttribute(){
        return static::with(['category', 'subcategory'])->where('id', '>', $this->id)->orderBy('id','asc')->first();
    }
    /**
    * Write code on Method
    *
    * @return response()
    */

    public  function getPreviousAttribute(){
        return static::with(['category', 'subcategory'])->where('id', '<', $this->id)->orderBy('id','desc')->first();
    }

    public function reviews(){
        return $this->hasMany(Review::class);
    }
}
