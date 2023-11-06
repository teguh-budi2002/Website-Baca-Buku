@extends('dashboard.app_dashboard')
@section('title', 'Publish a Book')
@section('content')
<div class="row">
    <div class="col-md-8 mx-auto" style="margin-top: 40px">
        <div class="card">
            <div class="card-header">
                <p class="text-center fs-2" style="text-transform: uppercase; color: rgb(111, 111, 111);">Publish Buku
                </p>
            </div>
            <div class="card-body">
                <form action="{{ Route('add.book') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @error('title')
                    <div class="alert alert-danger" style="padding: 5px; padding-left: 10px" role="alert">
                        <span style="font-size: 13px">{{ $message }}</span>
                    </div>
                    @enderror
                    <div class="form-outline mb-4">
                        <input type="text" name="title" id="book_title" value="{{ old('title') }}" class="form-control" />
                        <label class="form-label" for="book_title">Judul Buku</label>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            @error('for_age')
                            <div class="alert alert-danger" style="padding: 5px; padding-left: 10px" role="alert">
                                <span style="font-size: 13px">{{ $message }}</span>
                            </div>
                            @enderror
                            <select class="form-select" name="for_age" aria-label="Default select example">
                                <option selected disabled>Rentan Umur</option>
                                <option value="6 Tahun">6 Tahun</option>
                                <option value="12 Tahun">12 Tahun</option>
                                <option value="18 Tahun">18 Tahun</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            @error('category_id')
                            <div class="alert alert-danger" style="padding: 5px; padding-left: 10px" role="alert">
                                <span style="font-size: 13px">{{ $message }}</span>
                            </div>
                            @enderror
                            <select class="form-select" name="category_id" aria-label="Default select example">
                                <option selected disabled>Kategori Buku</option>
                                @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="mt-2">
                        @error('image_book')
                        <div class="alert alert-danger" style="padding: 5px; padding-left: 10px" role="alert">
                            <span style="font-size: 13px">{{ $message }}</span>
                        </div>
                        @enderror
                        <label class="form-label" for="image_book">Poster Buku</label>
                        <input type="file" name="image_book" class="form-control" id="image_book" />
                    </div>
                    <div class="mt-4">
                        <button type="submit" class="btn btn-info">Simpan Buku</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
