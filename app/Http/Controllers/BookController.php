<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Chapter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class BookController extends Controller
{
    public function addBook(Request $request) {
        $validation = $request->validate([
            "title" => "required",
            "for_age" => "required",
            "category_id" => "required",
            "image_book" => "required|image",
        ], [
            'title.required' => 'Judul Buku Harus Diisi',
            'for_age.required' => 'Tentukan Rentan Umur Dari Sebuah Buku',
            'category_id.required' => 'Pilih Salah Satu Dari Kategori Buku.',
            'image_book.required' => 'Buku Harus Memiliki Poster atau Gambar',
        ]);

        DB::beginTransaction();
        try {
            if ($request->file("image_book")) {
                $file = $request->file("image_book");
                $filename = $file->getClientOriginalName();
    
                $putIntoStorage = Storage::disk("public")->putFileAs("/poster-buku/", $file, $filename);
            }

            $book = Book::create([
                "title" => $request->title,
                "slug"  => Str::slug($request->title),
                "category_id" => $request->category_id,
                "for_age" => $request->for_age,
                "image_book"=> $filename,
            ]);

            DB::commit();
            toastr()->success('Buku Berhasil Disimpan.', 'SUKSES');
            return redirect('dashboard');
        } catch (\Throwable $th) {
            DB::rollback();

            toastr()->error($th->getMessage(), "ERROR SERVERSIDE");
            return redirect()->back();
        }
    }

    public function publishedBook($id) {
        $book = Book::findOrFail($id);
        $book->is_published = 1;
        $book->save();

        toastr()->success('Buku Berhasil Di Publish', 'SUKSES');
        return redirect()->back();
    }

    public function addChapter(Request $request, $slug) { 
        $book = Book::select("id", "title", "slug", "image_book")->where('slug', $slug)->first();
        return view('dashboard.add_chapter', ['book' => $book]);
    }

    public function saveChapter(Request $request, $id) {
        $validation = $request->validate([ 
            'sub_title_of_chapter' => 'required',
            'content_of_chapter'   => 'required',
            'image_chapter'        => 'nullable',
            'link_yt_vid'          => 'nullable|url',
        ], [
            'sub_title_of_chapter.required' => 'Judul Bagian Harus Diiisi',
            'content_of_chapter.required'   => 'Isi Dari Bagian Harus Diisi',
            // 'image_chapter.image'           => 'Berkas Yang Di Upload Harus Berupa Image'
            'link_yt_vid.url'               => 'Link YT Harus Berupa Format URL'
        ]);

        DB::beginTransaction();
        try {
            $dataImage = [];
            $files = $request->file('image_chapter');
            if ($files) {
                foreach ($files as $img) {
                    $filename = $img->getClientOriginalName();

                    $putIntoStorage = Storage::disk("public")->putFileAs("/poster-bab/", $img, $filename);
                    $dataImage[] = $filename;
                }
            }

            $validation['link_yt_vid'] = str_replace('watch?v=','embed/', $request->link_yt_vid);
            $validation['link_yt_vid'] = preg_replace('/&t=\d+s/', '', $validation['video']);
            // 
            Chapter::create([
                "book_id" => $id,
                "sub_title_of_chapter" => $request->input("sub_title_of_chapter"),
                "content_of_chapter"   => $request->input("content_of_chapter"),
                "image_chapter"        => json_encode($dataImage),
                "link_yt_vid"          => $validation['link_yt_vid'] 
            ]);
            $bookName = Book::select("id", "title")->where("id", $id)->first();
            DB::commit();
            toastr()->success('BAB Berhasil Disimpan Pada Buku ' . $bookName->title . '.', 'SUKSES');
            return redirect('dashboard');
        } catch (\Throwable $th) {
            DB::rollback();

            toastr()->error($th->getMessage(), "ERROR SERVERSIDE");
            return redirect()->back();
        }
    }

    public function editChapter($chapter_id) {
        $chapter = Chapter::find($chapter_id);
        return view("dashboard.edit_chapter", ["chapter" => $chapter]);
    }

    public function saveEditChapter(Request $request, $id) {
        $validation = $request->validate([
            'link_yt_vid' => 'nullable|url',
        ], [
            'link_yt_vid.url'  => 'Link YT Harus Berupa Format URL'
        ]);

        DB::beginTransaction();
        try {
            $dataImage = [];
            $files = $request->file('image_chapter');
            if ($files) {
                foreach ($files as $img) {
                    $filename = $img->getClientOriginalName();

                    $putIntoStorage = Storage::disk("public")->putFileAs("/poster-bab/", $img, $filename);
                    $dataImage[] = $filename;
                }
            }

            $chapter = Chapter::where('id', $id)->update([
                "sub_title_of_chapter" => $request->input("sub_title_of_chapter"),
                "content_of_chapter"   => $request->input("content_of_chapter"),
                "image_chapter"        => json_encode($dataImage),
                "link_yt_vid"          => str_replace('watch?v=','embed/', $request->link_yt_vid)
            ]);
            DB::commit();

            toastr()->success('BAB Berhasil Di Edit.', 'SUKSES');
            return redirect('dashboard');
        } catch (\Throwable $th) {
            DB::rollback();

            toastr()->error($th->getMessage(), "ERROR SERVERSIDE");
            return redirect()->back();
        }
    }

    public function deleteBook($id) { 
        $book = Book::findOrFail($id);
        $book->chapters()->delete();
        $book->delete();

        toastr()->error('Buku ' . $book->title . ' Berhasil Dihapus.', 'HAPUS');
        return redirect('dashboard');
    }
}
