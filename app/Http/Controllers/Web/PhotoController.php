<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;

class PhotoController extends Controller
{
    public function uploadPic(Request $request){
        $fileName="user_image.jpg";
        $path=$request->file('photo')->move(public_path("/"),$fileName);
        $photoUrl=url('/'.$fileName);
        return response()->json(['url' => $photoUrl],200);
    }
}
