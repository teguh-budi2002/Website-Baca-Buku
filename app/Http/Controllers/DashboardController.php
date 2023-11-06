<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index() {
        $books = Book::with(['category', 'chapters'])->get();
        return view("dashboard.main", ["books"=> $books]);
    }

    public function publishSomeBook() {
        $categories = Category::get();
        return view("dashboard.publish_book", [
            "categories"=> $categories
        ]);
    }
}
