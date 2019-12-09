<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PhotoController extends BaseController
{
    public function uploadPic(Request $request){
        $fileName="user_image.jpg";
        $path=$request->file('photo')->move(public_path("/"),$fileName);
        $photoUrl=url('/'.$fileName);
        return response()->json(['url' => $photoUrl],200);
    }
}
