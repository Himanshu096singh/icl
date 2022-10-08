<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Brand;
use Illuminate\Support\Str;
use App\Traits\ImageTrait;
use Illuminate\Support\Facades\File;
class ProductBrand extends Controller
{
	use ImageTrait;
	public function index()
	{
		$brand = Brand::orderBy('id', 'DESC')->get();
		return view('admin.brand.create', compact('brand'));
	}
	public function store(Request $request)
	{
		$check = Brand::where('name', $request->name)->first();
		if ($check) {
			$msg = [
				'message' => 'Brands is already exist',
				'alert-type' => 'warning'
			];
			return redirect()->back()->with($msg);
		}
		try {
			$inputs = $request->all();
			$imgUrl = $this->verifyAndUpload($request, 'image', 'upload/brand');
			$inputs['image'] = $img_url;
			$inputs['slug'] = Str::slug($inputs['name']);
			Brand::create($inputs);

			$msg = [
				'message' => 'Brands Successfully saved',
				'alert-type' => 'success'
			];
		} catch (\Exception $e) {
			$msg = [
				'message' => $e->getMessage(),
				'alert-type' => 'danger'
			];
		}
		return redirect()->back()->with($msg);
	}
	public function edit($id)
	{
		$list = Brand::find($id);
		return view('admin.brand.edit')->with('list', $list);
	}
	public function update(Request $request, Brand $brand)
	{
		$check = Brand::where('name', $request->name)->where('id', '!=', $brand->id)->first();
		if ($check) {
			$msg = [
				'message' => 'Brands is already exist',
				'alert-type' => 'warning'
			];
			return redirect()->back()->with($msg);
		}
		try {
			$inputs = $request->all();
			if ($request->file('image') != null) {
	            if(File::exists(public_path($request->oldimage))) {
	                unlink(public_path($request->oldimage));
	            }
            	$imgUrl = $this->verifyAndUpload($request, 'image', 'upload/brand');
            	$inputs['image'] = $imgUrl;
	        } else {
	            $imgUrl = $request->oldimage;
	        }

			$inputs['slug'] = Str::slug($inputs['name']);
			$brand->fill($inputs)->save();
			$msg = [
				'message' => 'Brands Successfully updated',
				'alert-type' => 'success'
			];
		} catch (\Exception $e) {
			$msg = [
				'message' => $e->getMessage(),
				'alert-type' => 'danger'
			];
		}
		return redirect()->back()->with($msg);
	}
	public function status_brand(Request $request)
	{
		$category = Brand::find($request->id);
		$category->status = $request->status;
		$category->save();
		return 1;
	}
	public function destroy($id)
	{
		$delete = Brand::destroy($id);
		if ($delete) {
			$msg = array(
				'message' => 'Product Successfully deleted',
				'alert-type' => 'success'
			);
		} else {
			$msg = array(
				'message' => 'Something went wrong',
				'alert-type' => 'danger'
			);
		}
		return redirect()->back()->with($msg);
	}
}
