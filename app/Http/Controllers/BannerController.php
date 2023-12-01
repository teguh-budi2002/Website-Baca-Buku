<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;

class BannerController extends Controller
{
    public function manageBanner() {
        $banner = Banner::first();
        return view('dashboard.banner.main', [
            'banner' => $banner
        ]);
    }

    public function uploadBanner(Request $request) {
        $validation = $request->validate([
            'img_banner' => [
                Rule::requiredIf(function () use ($request) {
                    return is_null($request->old_banner);
                }),
                'array'
            ],
        ], [
            'img_banner.required' => 'Banner Wajib Menyertakan Setidaknya 1 Gambar.',
        ]);

        DB::beginTransaction();
        try {
            $images = [];
            if ($request->hasFile('img_banner')) {
                foreach ($request->img_banner as $file) {
                    $name = $file->getClientOriginalName();
                    $file->move(public_path('/storage/banner-image'), $name);  
                    $images[] = $name; 
                }
            }
    
            Banner::updateOrCreate(
                ['id' => $request->banner_id],
                [
                    'img_banner' => $request->file('img_banner') ? $images : $request->old_banner
                ]
            );
            DB::commit();

            toastr()->success("Banner Berhasil Di Upload", "UPLOAD BANNER");
            return redirect("/");
        } catch (\Throwable $th) {
            DB::rollBack();
            toastr()->error($th->getMessage(), "ERROR SERVERSIDE");

            return redirect()->back();
        }

    }
}
