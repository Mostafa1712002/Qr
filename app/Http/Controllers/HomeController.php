<?php

namespace App\Http\Controllers;

use App\Http\Requests\QrRequest;
use Illuminate\Support\Str;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Spatie\Glide\GlideImage;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function qr(QrRequest $request)
    {

        $name = Str::slug($request->name) . ".svg";
        $code = QrCode::format('svg');
        $code->generate($request->body, "../public/images/qr_code/" . $name);
        GlideImage::create(public_path("images/qr_code/" . $name))->save(public_path('images/qr_code/example.png'));
        unlink(public_path("images/qr_code/".$name));

        return back()->with([
            "code" => $name,
            "status" => "Generate QR Code Successfully",

        ]);
    }
}
