@extends('dashboard.app_dashboard')
@section('title', 'Main')
@section('content')
<div class="row">
    <div class="col-md-8 mx-auto mt-5 mb-5">
        <div class="card">
            <div class="card-header">
                <p class="text-center fs-3">Edit BAB</p>
            </div>
            <div class="card-body">
                <form action="{{ Route('edit.save.chapter', ['id' => $chapter->id]) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')
                    @error('sub_title_of_chapter')
                    <div class="alert alert-danger" style="padding: 5px; padding-left: 10px" role="alert">
                        <span style="font-size: 13px">{{ $message }}</span>
                    </div>
                    @enderror
                    <div class="form-outline mb-4">
                        <input type="text" name="sub_title_of_chapter" id="chapter_title"
                            value="{{ old('sub_title_of_chapter', $chapter->sub_title_of_chapter) }}"
                            class="form-control" />
                        <label class="form-label" for="chapter_title">Judul Bagian</label>
                    </div>
                    @error('content_of_chapter')
                    <div class="alert alert-danger" style="padding: 5px; padding-left: 10px" role="alert">
                        <span style="font-size: 13px">{{ $message }}</span>
                    </div>
                    @enderror
                    <div class="form-outline mb-4">
                        <label class="form-label" for="chapter_content">Deskripsi Bagian</label>
                        <textarea name="content_of_chapter"
                            id="chapter_content">{{ $chapter->content_of_chapter }}</textarea>
                    </div>
                    <div class="choice__media__upload d-flex align-items-center">
                        <button class="btn btn-info" type="button" data-mdb-toggle="collapse"
                            data-mdb-target="#uploadImage" aria-expanded="false" aria-controls="uploadImage">
                            Upload Image
                        </button>
                        <button class="btn btn-danger ms-3" type="button" data-mdb-toggle="collapse"
                            data-mdb-target="#uploadYT" aria-expanded="false" aria-controls="uploadYT">
                            Upload YT Video
                        </button>
                    </div>
                    <div class="upload_link_yt collapse" id="uploadYT">
                        @error('link_yt_vid')
                        <div class="alert alert-danger" style="padding: 5px; padding-left: 10px" role="alert">
                            <span style="font-size: 13px">{{ $message }}</span>
                        </div>
                        @enderror
                        <div class="form-outline mb-4 mt-4">
                            <input type="text" name="link_yt_vid" id="link_yt"
                                value="{{ old('link_yt_vid', $chapter->link_yt_vid) }}"
                                class="form-control" />
                            <label class="form-label" for="link_yt">Link YT Video</label>
                        </div>
                    </div>
                    <div class="upload_image collapse mt-3" id="uploadImage">
                        @error('image_chapter')
                        <div class="alert alert-danger" style="padding: 5px; padding-left: 10px" role="alert">
                            <span style="font-size: 13px">{{ $message }}</span>
                        </div>
                        @enderror
                        <div class="box__uplaod__image">
                            <p style="margin: 5px">Preview Image Sebelumnya</p>
                            @if ($chapter->image_chapter)
                            @foreach (json_decode($chapter->image_chapter) as $img)
                            <img src="{{ asset('/storage/poster-bab/' . $img) }}" class="img-fluid mb-3"
                                style="width: 150px;height: 200px">
                            @endforeach
                            @endif
                            <div class="d-flex align-items-center justify-content-between mb-3">
                                <a class="btn text-white d-block" style="width: fit-content; background-color: #3b5998;"
                                    id="upload-image-button" href="#!" role="button">
                                    <i class="fa-solid fa-upload"></i>
                                </a>
                                <button type="button" class="btn btn-danger me-1  btn-floating"
                                    data-mdb-toggle="tooltip" data-mdb-html="true"
                                    title="Jika anda melakukan edit image, maka image sebelumnya otomatis terganti dengan image yang baru di upload.">
                                    <i class="fa-solid fa-exclamation"></i>
                                </button>
                            </div>
                            <div class="preview-images-zone"></div>
                        </div>
                    </div>
                    <div class="btn_submit mt-3">
                        <button type="submit" class="btn btn-primary">Edit BAB</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@push('js')
<script>
    $(document).ready(function () {
        $('#chapter_content').summernote({
            tabsize: 2,
            height: 400,
        });

        $(".preview-images-zone").sortable();

        let no = 0;

        function addImageInput() {
            no++;
            // Buat elemen input file baru
            let newInput = document.createElement("input");
            newInput.type = "file";
            newInput.name = "image_chapter[]";
            newInput.classList.add('form-control')
            newInput.classList.add('mt-2')
            newInput.classList.add('input-no-' + no)
            newInput.setAttribute("multiple", true);

            // Tambahkan input baru ke dalam div "upload_image"
            let uploadImageDiv = document.querySelector(".upload_image");
            uploadImageDiv.appendChild(newInput);
            // Tambahkan event listener ke input file yang baru
            newInput.addEventListener("change", function (event) {
                readImage(event);
            });
        }

        function readImage(event) {
            let files = event.target.files;
            let output = $(".preview-images-zone");
            for (let i = 0; i < files.length; i++) {
                let file = files[i];
                if (!file.type.match('image')) continue;

                let picReader = new FileReader();

                picReader.addEventListener('load', function (event) {
                    let picFile = event.target;
                    let html = '<div class="preview-image preview-show-' + no + '">' +
                        '<div class="image-cancel" onclick="deleteImage(' + no + ')" data-no="' + no +
                        '">x</div>' +
                        '<div class="image-zone"><img id="pro-img-' + no + '" src="' + picFile
                        .result + '"></div>';

                    output.append(html);
                });

                picReader.readAsDataURL(file);
            }
        }

        $("#upload-image-button").click(function () {
            addImageInput()
        });
    });

</script>
@endpush
@endsection
