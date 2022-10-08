<?php 
namespace App\Traits;
use Illuminate\Http\Request;

trait ImageTrait{
    public function verifyAndUpload(Request $request, $fieldname='image', $directory='upload'){
       if($request->hasFile($fieldname)){
           
            if(!$request->file($fieldname)->isValid()){
                flash('Invalid Image!')->error()->important();
            }
                $imgName = $request->file($fieldname)->getClientOriginalName();
                $file = pathinfo($imgName, PATHINFO_FILENAME);
                $ext = pathinfo($imgName, PATHINFO_EXTENSION);
                $slugimg = uniqid() . '_' . strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $file)));
                $imgName = strtolower($slugimg . '.' . $ext);
                $imgUrl = $directory.'/'. strtolower($imgName);
                $request->$fieldname->move(public_path($directory), $imgName);
                return $imgUrl;
        }
        return null;
    }
}
?> 