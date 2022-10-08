<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Image;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Crypt;
use DB;

class ImageController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    public function storeImage(Request $request)
    {
        if ($request->hasFile('upload')) {
            $originName = $request->file('upload')->getClientOriginalName();
            $fileName = uniqid() . '-' . trim(preg_replace('/[^A-Za-z0-9-]+/', '-', pathinfo($originName, PATHINFO_FILENAME)));
            $extension = $request->file('upload')->getClientOriginalExtension();
            $fileName = strtolower($fileName . '_' . time() . '.' . $extension);
    
            $request->file('upload')->move(public_path('upload/image'), $fileName);
            $CKEditorFuncNum = $request->input('CKEditorFuncNum');
            $imgUrl = "upload/image/" . $fileName;
            // $form= new image();
            //     $form->title = "image";
            //     $form->image=$imgUrl;
            //     $form->save();
                
            $url = '/public/upload/image/'.$fileName;
            $msg = 'Image successfully uploaded'; 
            $response = "<script>window.parent.CKEDITOR.tools.callFunction($CKEditorFuncNum, '$url', '$msg')</script>";
            @header('Content-type: text/html; charset=utf-8'); 
             echo $response;
            return response()->json(['fileName' =>$fileName, 'uploaded'=> 1, 'url' => $url]);
        }
        

    }

}
