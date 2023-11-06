@extends('app')
@section('title', 'Beranda')
@section('content')
<section class="filter__module">
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
</section>
<section class="list_all_books">
    <div class="flex justify-center mt-10">
        <div class="w-3/4">
            <div class="header">
              <div class="flex justify-between items-center">
                  <div class="left_item">
                    <p class="text-slate-500 text-sm">Koleksi</p>
                    <p class="text-4xl font-normal text-slate-700">E-Modul Kelas XI</p>
                  </div>
                  <div class="pagination">
                    {{ $books->links('vendor.pagination.simple-tailwind') }}
                  </div>
              </div>
            </div>
            <div class="border border-solid border-slate-200 mt-5"></div>
            <div class="item_books mt-7">
                @if (count($books))
                <div class="flex items-center space-x-4">
                    @foreach ($books as $book)
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
                        <div class="read__book mt-3 flex justify-center">
                          <a href="{{ Route('read.book', ['slug' => $book->slug]) }}" class="text-slate-400 font-light text-sm border border-slate-300 rounded-full py-2 px-6 hover:bg-slate-500 hover:text-white transition-colors duration-100">Baca Buku</a>
                        </div>
                    </div>
                    @endforeach
                </div>
                @endif
            </div>
        </div>
    </div>
</section>
@endif
@endsection
