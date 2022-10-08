<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Career;

class CareerController extends Controller
{
    public function __construct(){
    	$this->middleware("admin");
    }
    public function index(){
    	$career=Career::orderBy("id","desc")->get();
    	return view("admin.career.list")->with("career",$career);
    }
    public function create(){
    	return view("admin.career.create");
    }
    public function store(Request $request){}
    public function edit($id){
    	return view("admin.career.edit");
    }
    public function update(Request $request){}
    public function delete($id){
    	$delete=Career::destroy($id);
    }
}
