<?php

namespace App\Http\Controllers;

use App\Models\ProfileWebsite;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

use function Laravel\Prompts\error;

class WebsiteController extends Controller
{
    public function manageProfile() {
        $profile_web = ProfileWebsite::first();
        return view('dashboard.manage_website_profile', [
            'profile_web' => $profile_web
        ]);
    }

    public function addorUpdateProfile(Request $request) {
        $validation = $request->validate([
            'main_image' => [Rule::requiredIf(function () use ($request) {
                return is_null($request->old_main_image);
            }), 'image'],
            'website_description' => 'required|max:2500'
        ], [
            'main_image.required_if' => 'Gambar Utama Website Wajib Diisi.',
            'website_description.required' => 'Deskripsi Website Wajib Diisi.',
            'website_description.max' => 'Deskripsi Website Maksimal 2500 Karakter.'
        ]);

        DB::beginTransaction();
        try {
            $file = $request->file('main_image');
            $filename = '';
            if ($request->hasFile('main_image')) {
                $filename = $file->getClientOriginalName();

                $putIntoStorage = Storage::disk('public')->putFileAs('main-image', $file, $filename);
            }
            ProfileWebsite::updateOrCreate(
                ['id' => $request->website_id],
                [
                    'main_image' => $request->main_image ? $filename : $request->old_main_image,
                    'website_description' => $request->website_description
                ]
            );
            DB::commit();

            toastr()->success("Profile Website Berhasil Di Update", "UPDATE PROFILE WEBSITE");
            return redirect()->back();
        } catch (\Throwable $th) {
            DB::rollBack();
            toastr()->error($th->getMessage(), "ERROR SERVERSIDE");

            return redirect()->back();
        }
    }
}
