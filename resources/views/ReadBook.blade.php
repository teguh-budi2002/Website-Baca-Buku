@extends('app')
@section('title', 'Baca Buku')
@section('content')
<section class="read__book">
    <div class="flex justify-center mt-12 mb-10">
        <div class="w-10/12 h-auto p-4 bg-white border border-solid border-teal-400 shadow-sm shadow-slate-400 rounded-md">
            <div class="detail__book">
              <a href="#!" class="ripple">
                  <img src="{{ asset('/storage/poster-buku/' . $book->image_book) }}" class="w-auto h-80 mx-auto rounded-md" alt="logo-{{ $book->slug }}">
              </a>
              <p class="text-center text-2xl text-green-700 mt-3 underline">{{ $book->title }}</p>
            </div>
            <div class="accordion__sub__bab mt-8">
              @foreach ($book->chapters as $chapter)
              <div class="collapse collapse-plus bg-gray-100 mb-3 rounded">
                  <input type="radio" name="my-accordion" @if ($chapter->id === 1) {{ 'checked' }} @endif />
                  <div class="collapse-title">
                      <p class="text-xl text-slate-600 font-medium">{{ $chapter->sub_title_of_chapter }}</p>
                  </div>
                  <div class="collapse-content">
                    @if (!is_null($chapter->image_chapter))
                      <div class="img__chapter__{{ $chapter->sub_title_of_chapter }} flex justify-center items-center space-x-4">
                        @foreach (json_decode($chapter->image_chapter) as $img)
                          <img src="{{ asset('/storage/poster-bab/' . $img) }}" class="w-auto h-60 rounded-md" alt="image_{{ $chapter->sub_title_of_chapter }}">  
                        @endforeach
                      </div>
                    @endif
                    @if ($chapter->link_yt_vid)
                      <div class="embed__yt flex justify-center">
                        <iframe class="embed-responsive-item rounded-md" src="{{ $chapter->link_yt_vid }}" width="400" height="200" loading="eager" frameborder="0" allowfullscreen></iframe>
                      </div>
                    @endif
                    <div class="content__chapter mt-5">
                      <p class="indent-5">{!! $chapter->content_of_chapter !!}</p>
                    </div>
                  </div>
              </div>
              @endforeach
            </div>
            <div class="published_at mt-5">
              <p>Di Publish Pada: <span class="text-success">{{ $book->created_at->diffForHumans() }}</span></p>
            </div>
        </div>
    </div>
    </div>
</section>
@endsection
