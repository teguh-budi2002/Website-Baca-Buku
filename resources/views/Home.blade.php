@extends('app')
@section('title', 'Beranda')
@section('content')
{{-- <section class="filter__module">
    <div class="flex justify-center mt-12">
        <div class="w-3/4">
          <form action="" method="GET">
            <div class="flex justify-between items-center ">
                <div class="left_item flex items-center space-x-8">
                    <div>
                        <label for="kategori" class="font-semibold text-slate-500">Kategori</label>
                        <select name="category_id" class="select select-sm select-bordered w-full max-w-xs mt-3" id="kategori">
                            <option disabled selected>--Semua--</option>
                            <option value="1">E-Module</option>
                            <option value="2">Panduan dan Praktik Terbaik</option>
                        </select>
                    </div>
                    <div>
                        <label for="for_age" class="font-semibold text-slate-500">Rentan Umur</label>
                        <select name="for_age" class="select select-sm select-bordered w-full max-w-xs mt-3" id="for_age">
                            <option disabled selected>--Semua--</option>
                            <option value="6 Tahun">6 Tahun</option>
                            <option value="12 Tahun">12 Tahun</option>
                            <option value="18 Tahun">18 Tahun</option>
                        </select>
                    </div>
                </div>
                <div class="right_item flex items-center space-x-4 mt-9">
                    <input type="text" placeholder="Pencarian...." name="input_search"
                        class="input border border-solid border-slate-300 input-sm w-96 p-p-2" />
                    <button type="submit" class="bg-green-800 text-white py-1 px-2 rounded-md flex items-center space-x-1">
                        <i class="fa-solid fa-magnifying-glass text-xs"></i>
                        <span class="font-light">Cari</span>
                    </button>
                </div>
            </div>
          </form>
        </div>
    </div>
</section>
<div class="w-full border-t border-dashed border-slate-500 mt-8"></div>
@if (request()->query())
<section class="list_searching_book mt-10">
  <div class="flex justify-center">
    <div class="w-3/4">
      <div class="text_header">
        <p class="text-center text-2xl capitalize">Hasil pencarian dari <span class="text-green-500">{{ request()->query('input_search') ? request()->query('input_search') : "semua buku"  }}</span></p>
      </div>
      <div class="item_searching mt-8">
         @if (count($searching_books))
          <div class="flex items-center space-x-4">
              @foreach ($searching_books as $book)
              <div class="searching_item_module w-40 h-auto">
                  <div>
                      <a href="{{ Route('read.book', ['slug' => $book->slug]) }}" class="ripple">
                          <img src="{{ asset('/storage/poster-buku/' . $book->image_book) }}" class="w-full h-52"
                              alt="logo-{{ $book->slug }}">
                      </a>
                  </div>
                  <div class="mt-2 mb-2">
                      <p class="font-light text-slate-500 text-xs">PDF</p>
                  </div>
                  <div class="w-full border-t border-solid border-slate-300"></div>
                  <div class="w-fit p-0.5 px-1 bg-orange-500 text-white text-[10px] rounded mt-2">
                      <p>Panduan dan Praktis Baik</p>
                  </div>
                  <div class="mt-1">
                      <a href="{{ Route('read.book', ['slug' => $book->slug]) }}"
                          class="font-normal truncate">{{ $book->title }}</a>
                  </div>
                  <div class="mt-3 flex items-center text-xs text-slate-400 space-x-2">
                      <div class="flex items-center space-x-2">
                          <i class="fa-regular fa-eye"></i>
                          <p>553535</p>
                      </div>
                      <p>/</p>
                      <div class="flex items-center space-x-2">
                          <i class="fa-solid fa-download"></i>
                          <p>553535</p>
                      </div>
                  </div>
              </div>
              @endforeach
          </div>
          @else
          <div class="flex justify-center items-center mt-10">
              <p class="uppercase text-rose-500 text-2xl text-center">Pencarian Buku <span class="text-green-500">{{ request()->query('input_search') }}</span> Dengan Kategori <span class="text-green-500">{{ (request()->query('category_id') === "1" ? "E-Modul" : (request()->query('category_id') === "2" ? "Panduan dan Praktik Terbaik" : "Semua Kategori")) }}</span> Berdasarkan Rentan Umur <span class="text-green-500">{{ request()->query('for_age') ? request()->query('for_age') : "Semua Umur" }}</span> Tidak Ditemukan.</p>
          </div>
          @endif
      </div>
    </div>
  </div>
</section>
@else
<section class="list_newest_book mt-10">
    <div class="flex justify-center">
        <div class="w-3/4">
            <div class="grid grid-cols-2 gap-8">
                <div class="">
                    <div>
                        <p class="text-slate-500 text-sm">Koleksi Terbaru</p>
                        <p class="text-4xl font-normal text-slate-700">Dokumen</p>
                    </div>
                    <div class="w-full border-t border-solid border-slate-300 mt-8"></div>
                    <div class="mt-5">
                        <p class="text-xs text-slate-400">Lorem ipsum dolor sit amet consectetur adipisicing elit.
                            Asperiores dolor impedit quibusdam doloribus ad repudiandae! Quis, eum labore esse mollitia
                            quam minima facilis sit, unde nulla eveniet doloremque vel temporibus?</p>
                    </div>
                </div>
                @if (count($newest_books))
                <div class="flex items-center space-x-4">
                    @foreach ($newest_books as $book)
                    <div class="newest_item_module w-40 h-auto">
                        <div>
                            <a href="{{ Route('read.book', ['slug' => $book->slug]) }}" class="ripple">
                                <img src="{{ asset('/storage/poster-buku/' . $book->image_book) }}" class="w-full h-52"
                                    alt="logo-{{ $book->slug }}">
                            </a>
                        </div>
                        <div class="mt-2 mb-2">
                            <p class="font-light text-slate-500 text-xs">PDF</p>
                        </div>
                        <div class="w-full border-t border-solid border-slate-300"></div>
                        <div class="w-fit p-0.5 px-1 bg-orange-500 text-white text-[10px] rounded mt-2">
                            <p>{{ $book->category->category_name }}</p>
                        </div>
                        <div class="mt-1">
                            <a href="{{ Route('read.book', ['slug' => $book->slug]) }}"
                                class="font-normal truncate">{{ $book->title }}</a>
                        </div>
                        <div class="mt-3 flex items-center text-xs text-slate-400 space-x-2">
                            <div class="flex items-center space-x-2">
                                <i class="fa-regular fa-eye"></i>
                                <p>553535</p>
                            </div>
                            <p>/</p>
                            <div class="flex items-center space-x-2">
                                <i class="fa-solid fa-download"></i>
                                <p>553535</p>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                @else
                <div class="flex justify-center items-center">
                    <p class="uppercase text-rose-500 text-2xl">Belum Ada Buku Yang Diterbitkan.</p>
                </div>
                @endif
            </div>
        </div>
    </div>
</section> --}}
<section class="w-full h-full profile_website mt-10">
    <div class="flex justify-center">
        <div class="w-10/12">
            <p class="text-center text-4xl font-semibold text-slate-700">PROFILE WEBSITE</p>
            <div class="border border-solid border-slate-200 mt-5"></div>
            @if (isset($profile_web))
            <div class="grid md:grid-cols-2 grid-cols-1 gap-5 mt-5">
                <div class="p-6 body_description">
                    {!! $profile_web->website_description !!}
                </div>
                <div>
                    <img src="{{ asset('/storage/main-image/' . $profile_web->main_image) }}" class="w-full h-auto max-h-[400px]" alt="gambar utama">
                </div>
            </div>
            @else
            <div class="w-full h-auto min-h-[200px] flex items-center justify-center">
                <p class="text-2xl text-rose-500">Profile Website Belum Di Buat</p>
            </div> 
            @endif
        </div>
    </div>
</section>
<section class="list_all_books mt-10 mb-20 scroll-my-10" id="listBooks">
    <div class="flex justify-center">
        <div class="w-10/12">
            <div class="header">
              <div class="flex justify-center items-center">
                  <div class="left_item">
                    <p class="text-4xl font-semibold text-slate-700">MODUL AJAR</p>
                  </div>
                  {{-- <div class="pagination">
                    {{ $books->links('vendor.pagination.simple-tailwind') }}
                  </div> --}}
              </div>
            </div>
            <div class="border border-solid border-slate-200 mt-5"></div>
            <div class="item_books mt-7">
                @if ($books->isNotEmpty())
                <div class="grid grid-cols-1 gap-10">
                     @foreach ($books as $key => $book)
                        @if ($key % 2 == 0)
                            <div class="w-full flex justify-start">
                                <div class="books w-full h-full">
                                    <div class="w-full flex md:flex-row flex-col md:items-start items-center space-x-8">
                                        <div class="img">
                                            <img src="{{ asset('/storage/poster-buku/' . $book->image_book) }}" class="w-full max-w-sm h-[500px]" alt="image {{ $book->title }}">
                                        </div>
                                        <div class="md:w-2/6 w-full space-y-3 md:mt-0 mt-5">
                                            <p class="text-slate-600 font-semibold text-xl uppercase not-italic md:text-left text-center">{{ $book->title }}</p>
                                            <p class="text-slate-500 font-light text-sm">{!! Illuminate\Support\Str::limit($book->description, 500, " ...<button onclick='my_modal_$key.showModal()' class='text-blue-500 hover:text-blue-400'>Baca selengkapnya</button>") !!}</p>
                                        </div>
                                    </div>
                                </div> 
                            </div>
                             <dialog id="my_modal_{{ $key }}" class="modal">
                                <div class="modal-box w-[95%] max-w-7xl overflow-y-hidden">
                                    <form method="dialog">
                                        <button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                                            </svg>
                                        </button>
                                    </form>
                                    <div class="w-full max-h-[600px] p-6 no-scrollbar overflow-y-scroll">
                                        <div class="grid md:grid-cols-2 grid-cols-1 gap-10 mt-10">
                                            <div class="cover_and_chapter">
                                                <div class="cover">
                                                    <img src="{{ asset('/storage/poster-buku/' . $book->image_book) }}" class="w-full h-auto" alt="">
                                                </div>
                                                <div class="chapter mt-8">
                                                    <p class="uppercase font-semibold not-italic text-xl">Permainan dalam buku mencakup:</p>
                                                    @if (isset($book) && isset($book->chapters))
                                                    <ul class="list-decimal not-italic mt-6 ml-3">
                                                        @foreach ($book->chapters as $chapter)
                                                            <li>{{ $chapter->sub_title_of_chapter }}</li>
                                                        @endforeach
                                                    </ul>
                                                    @else
                                                       <p class="not-italic text-center">Tidak Dicantumkan</p> 
                                                    @endif
                                                </div>
                                            </div>
                                            <div>
                                                <p class="text-center text-2xl font-semibold not-italic uppercase">{{ $book->title }}</p>
                                                <div class="description_book indent-10 mt-8">
                                                    {!! $book->description !!}
                                                </div>
                                                @if (isset($book) && $book->link_yt_vid)
                                                <div class="embed__yt flex justify-center mt-5">
                                                    <iframe class="embed-responsive-item rounded-md" src="{{ $book->link_yt_vid }}" width="100%" height="300" loading="lazy" frameborder="0" allowfullscreen></iframe>
                                                </div>
                                                @endif
                                                <div class="text-center mt-8">
                                                    <a href="https://wa.me/6288214972668" target="_blank" class="block py-2 px-10 rounded-full bg-green-600 hover:bg-green-500 text-white not-italic">Hubungi Kami</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </dialog>
                        @else
                            <div class="w-full flex justify-end">
                                <div class="books w-full h-full">
                                    <div class="w-full flex md:flex-row flex-col-reverse md:items-start items-center md:justify-end space-x-8">
                                        <div class="space-y-3 md:w-2/6 w-full md:mt-0 mt-5">
                                            <p class="text-slate-600 font-semibold text-2xl md:text-end text-center uppercase not-italic">{{ $book->title }}</p>
                                            <p class="text-end text-slate-500 font-light text-sm">{!! Illuminate\Support\Str::limit($book->description, 500, " ...<button onclick='my_modal_$key.showModal()' class='text-blue-500 hover:text-blue-400'>Baca selengkapnya</button>") !!}</p>
                                        </div>
                                        <div class="img">
                                            <img src="{{ asset('/storage/poster-buku/' . $book->image_book) }}" class="w-full max-w-sm h-[500px]" alt="image {{ $book->title }}">
                                        </div>
                                    </div>
                                </div> 
                            </div>
                            <dialog id="my_modal_{{ $key }}" class="modal">
                                <div class="modal-box w-[95%] max-w-7xl overflow-y-hidden">
                                    <form method="dialog">
                                        <button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                                            </svg>
                                        </button>
                                    </form>
                                    <div class="w-full max-h-[600px] p-6 no-scrollbar overflow-y-scroll">
                                        <div class="grid md:grid-cols-2 grid-cols-1 gap-10 mt-10">
                                            <div class="cover_and_chapter">
                                                <div class="cover">
                                                    <img src="{{ asset('/storage/poster-buku/' . $book->image_book) }}" class="w-full h-auto" alt="">
                                                </div>
                                                <div class="chapter mt-8">
                                                    <p class="uppercase font-semibold not-italic text-xl">Permainan dalam buku mencakup:</p>
                                                    @if (isset($book) && isset($book->chapters))
                                                        @foreach ($book->chapters as $chapter)
                                                        <ul class="list-decimal not-italic mt-6 ml-3">
                                                            <li>{{ $chapter->sub_title_of_chapter }}</li>
                                                        </ul>
                                                        @endforeach
                                                    @else
                                                       <p class="not-italic text-center">Tidak Dicantumkan</p> 
                                                    @endif
                                                </div>
                                                @if (isset($book) && $book->link_yt_vid)
                                                <div class="embed__yt flex justify-center">
                                                    <iframe class="embed-responsive-item rounded-md" src="{{ $book->link_yt_vid }}" width="400" height="200" loading="eager" frameborder="0" allowfullscreen></iframe>
                                                </div>
                                                @endif
                                            </div>
                                            <div>
                                                <p class="text-center text-2xl font-semibold not-italic uppercase">{{ $book->title }}</p>
                                                <div class="description_book indent-10 mt-8">
                                                    {!! $book->description !!}
                                                </div>
                                                <div class="text-center mt-8">
                                                    <a href="https://wa.me/6288214972668"target="_blank" class="block py-2 px-10 rounded-full bg-green-600 hover:bg-green-500 text-white not-italic">Hubungi Kami</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </dialog>
                        @endif
                    @endforeach
                </div>
                @else
                <div class="w-full h-auto min-h-[200px] flex items-center justify-center">
                    <p class="text-2xl text-rose-500">Modul Ajar Belum Di Buat</p>
                </div>    
                @endif
            </div>
        </div>
    </div>
</section>
{{-- @endif --}}
@endsection
