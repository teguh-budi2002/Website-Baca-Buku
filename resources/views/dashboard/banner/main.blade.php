@extends('dashboard.app_dashboard')
@section('title', 'Manage Banner')
@section('content')
@push('lib')
<script src="https://code.jquery.com/jquery-3.7.1.min.js"
    integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
@endpush
<style>
    .upload {
        opacity: 0;
    }

    .upload-label {
        position: absolute;
        top: 50%;
        left: 1rem;
        transform: translateY(-50%);
    }

</style>
<div class="row">
    <div class="col-md-8 mx-auto" style="margin-top: 40px; margin-bottom: 40px;">
        <div class="card">
            <div class="card-header">
                <p class="text-center fs-2" style="text-transform: uppercase; color: rgb(111, 111, 111);">Upload Banner
                </p>
            </div>
            <div class="card-body">
                @if (isset($banner) && $banner->img_banner)
                <p>Banner Yang Ter upload Saat Ini.</p>
                    @foreach ($banner->img_banner as $img)
                        <img src="{{ asset('/storage/banner-image/' . $img) }}" class="img-fluid" style="width: 100px; height: 100px" alt="">
                    @endforeach
                @endif
                <form action="{{ Route('upload.banner') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @error('img_banner')
                    <div class="alert alert-danger mt-4" style="padding: 5px; padding-left: 10px" role="alert">
                        <span style="font-size: 13px">{{ $message }}</span>
                    </div>
                    @enderror
                    <div class="input-group demo control-group lst increment d-flex justify-content-end mb-4">
                        <div class="input-group-btn">
                            <button class="btn btn-success add-more-img" type="button">Tambah Gambar</button>
                        </div>
                    </div>
                    <div class="clone hid">
                        <div class="demo control-group lst input-group" style="width:100%; margin-top: 10px;">
                            <input type="file" name="img_banner[]" class="myfrm form-control me-3">
                            <div class="input-group-btn">
                                <button class="btn btn-danger remove_btn p-2" type="button">Hapus</button>
                            </div>
                        </div>
                    </div>
                    <input type="hidden" name="banner_id" value="{{ $banner->id ?? null }}">
                    <input type="hidden" name="old_banner" id="{{ !empty($banner->img_banner) ? htmlspecialchars(implode(', ', $banner->img_banner)) : '' }}">
                    <button type="submit" class="btn btn-success submit_btn" style="margin-top:10px">Upload Banner</button>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function () {
        $(".add-more-img").click(function () {
            var lsthmtl = $(".clone").html();
            $(".increment").after(lsthmtl);
        });
        $("body").on("click", ".remove_btn", function () {
            $(this).parents(".demo").remove();
        });
    });

</script>
@endsection
