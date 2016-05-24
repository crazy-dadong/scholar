<?php

namespace App\Http\Controllers\User\Settings;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;

class IndexController extends Controller
{
    /**
     * 用户基本设置界面
     *
     * @param Request $request
     *
     * @return mixed
     */
    public function getIndex(Request $request)
    {
        return view('user.settings.index');

    }
    

    public function getImg()
    {
//        $data = \Input::all();
//
//        $img = Image::make(public_path('avatar/avatar.png'));
//        $img->crop($data['width'], $data['height'], $data['x'], $data['y']);
//        $img->resize(120,120);
//        $img->save(public_path('avatar/newAvatar.png'));

        Carbon::now();

        $img = Image::canvas(120, 120, '#FFFFFF');

        $img->text("疯", 120, 120, function($font) {
            $font->file(public_path('fonts/zcool.ttf'));
            $font->size(80);
            $font->color('#0073b7');
            $font->align('center');
            $font->valign('center');
        });
        $img->save(public_path('avatar/demoAvatar.png'));

    }

}
