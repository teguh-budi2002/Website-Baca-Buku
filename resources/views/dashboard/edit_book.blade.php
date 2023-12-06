@extends('dashboard.app_dashboard')
@section('title', 'Publish a Book')
@section('content')
<style>
.ck-editor__editable_inline {
    min-height: 300px;
}
</style>
<div class="row">
    <div class="col-md-8 mx-auto" style="margin-top: 40px; margin-bottom: 40px;">
        <div class="card">
            <div class="card-header">
                <p class="text-center fs-2" style="text-transform: uppercase; color: rgb(111, 111, 111);">Publish Buku
                </p>
            </div>
            <div class="card-body">
                <form action="{{ Route('edit.book.process', ['bookId' => $book]) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')
                    <div class="mt-2 mb-4">
                        @error('image_book')
                        <div class="alert alert-danger" style="padding: 5px; padding-left: 10px" role="alert">
                            <span style="font-size: 13px">{{ $message }}</span>
                        </div>
                        @enderror
                        <label class="form-label" for="image_book">Cover Buku</label>
                        <div class="d-flex justify-content-center">
                            <img src="{{ asset('/storage/poster-buku/' . $book->image_book) }}" class="w-full h-full img-fluid" style="max-height: 400px;" alt="image book">
                        </div>
                        <input type="file" name="image_book" class="form-control mt-3" value="{{ $book->image_book }}" id="image_book" />
                    </div>
                    @error('title')
                    <div class="alert alert-danger" style="padding: 5px; padding-left: 10px" role="alert">
                        <span style="font-size: 13px">{{ $message }}</span>
                    </div>
                    @enderror
                    <div class="form-group mb-4">
                        <label class="form-label" for="book_title">Judul Buku</label>
                        <input type="text" name="title" id="book_title" value="{{ old('title', $book->title) }}" class="form-control" />
                    </div>
                    <div class="form-group mb-4">
                        <label class="form-label" for="book_description">Deskripsi Buku</label>
                        <textarea name="description" id="book_description" class="form-control">{{ old('description', $book->description) }}</textarea>
                    </div>
                    <div class="upload_link_yt" id="uploadYT">
                        <div class="form-group mb-4">
                            <label class="form-label" for="link_yt">Link YT Video <span class="text-primary">(Opsional)</span></label>
                            <input type="text" name="link_yt_vid" id="link_yt" value="{{ old('link_yt_vid', $book->link_yt_vid) }}"
                                class="form-control" />
                        </div>
                    </div>
                    <input type="hidden" name="old_image_book" value="{{ $book->image_book }}">
                    <div class="mt-4">
                        <button type="submit" class="btn btn-info">Edit Buku</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@push('lib')
   <script src="https://cdn.jsdelivr.net/npm/ckeditor5-build-classic-with-image-resize@12.4.0/build/ckeditor.min.js"></script>
@endpush
 <script>
        ClassicEditor
                .create( document.querySelector( '#book_description' ), {
                    heading: {
                    options: [
                            { model: 'paragraph', title: 'Paragraph', class: 'ck-heading_paragraph' },
                            { model: 'heading1', view: 'h1', title: 'Heading 1', class: 'ck-heading_heading1' },
                            { model: 'heading2', view: 'h2', title: 'Heading 2', class: 'ck-heading_heading2' },
                            { model: 'heading3', view: 'h3', title: 'Heading 3', class: 'ck-heading_heading3' },
                            { model: 'heading4', view: 'h4', title: 'Heading 4', class: 'ck-heading_heading4' },
                            { model: 'heading5', view: 'h5', title: 'Heading 5', class: 'ck-heading_heading5' },
                            { model: 'heading6', view: 'h6', title: 'Heading 6', class: 'ck-heading_heading6' }
                        ]
                    },
                    ckfinder: {
                        uploadUrl: '{{ route('ckeditor.upload') }}?_token={{ csrf_token() }}',
                    },
                    image: {
                        resizeOptions: [{
                                name: 'imageResize:original',
                                label: 'Original',
                                value: null
                            },
                            {
                                name: 'imageResize:50',
                                label: '50%',
                                value: '50'
                            },
                            {
                                name: 'imageResize:75',
                                label: '75%',
                                value: '75'
                            }
                        ],
                    },
                })
                .then( editor => {
                        console.log( editor );
                } )
                .catch( error => {
                        console.error( error );
                } );
</script>
@endsection
