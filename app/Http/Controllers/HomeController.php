<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use App\Models\Book;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public $bannerImg = null;

    public function __construct()
    {
        $getBanner = Banner::first();
        $this->bannerImg = $getBanner;
    }

    public function index(Request $request) {
        $publishedNewestBooks = Book::with('category')->where('is_published', 1)->orderBy('created_at','desc')->take(4)->get();
        $allBooks = Book::with('category')->where('is_published', 1)->paginate(8);
        $searchBook = self::searchBook($request->input_search, $request->category_id, $request->for_age);

        return view("Home", [
            "newest_books" => $publishedNewestBooks,
            'books' => $allBooks,
            'searching_books' => $searchBook,
            'banners' => $this->bannerImg ? [$this->bannerImg] : []
        ]);
    }

    public function readBook($slug) {
        $bookWantToRead = Book::with('chapters')->where("slug", $slug)->first();

        return view("ReadBook", [ 'book' => $bookWantToRead]);
    }

    protected static function searchBook($input_search, $category_id, $for_age) { 
        $queryBook = Book::query();
        if ($input_search) {
            $queryBook->where('title', 'LIKE', '%' . $input_search . '%');
        }

        if ($category_id) {
            $queryBook->orWhere('category_id', $category_id);
        }

        if ($for_age) {
            $queryBook->orWhere('for_age', $for_age);
        }
 
        return $resultSearch = $queryBook->get();
    }
}
