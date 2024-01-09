@extends('dashboard.app_dashboard')
@section('title', 'Main')
@section('content')
<div class="card">
    <section class="mb-4">
        <div class="card-header py-3">
            <h5 class="mb-0 text-center"><strong>Daftar Semua Buku</strong></h5>
        </div>
        <div class="card-body">
            <div class="unpublished_book">
                <table class="table align-middle mb-0 bg-white">
                    <thead class="bg-light">
                        <tr>
                            <th>Poster Buku</th>
                            <th>Judul Buku</th>
                            {{-- <th>Kategori</th> --}}
                            <th>Deskripsi Buku</th>
                            <th>Jumlah BAB</th>
                            <th>Status Publish</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($books as $book)
                        <tr>
                            <td>
                                <div class="d-flex align-items-center">
                                    <a href="#" class="ripple">
                                        <img src="{{ asset('/storage/poster-buku/' . $book->image_book) }}"
                                            class="img-thumbnail" style="width: 80px;height: 80px;"
                                            alt="logo-{{ $book->slug }}">
                                    </a>
                                </div>
                            </td>
                            <td>
                                <p class="fw-normal">{{ $book->title }}</p>
                            </td>
                            {{-- <td>
                                <button type="button"
                                    class="btn btn-primary">{{ $book->category->category_name }}</button>
                            </td> --}}
                            <td>
                                <p class="fw-normal">{!! Illuminate\Support\Str::limit($book->description, 20, '...') !!}</p>
                            </td>
                            <td>
                                <button type="button" class="btn btn-outline-primary opacity-50" data-mdb-toggle="modal"
                                    data-mdb-target="#modalBAB{{ $book->id }}">{{ $book->chapters->count() }}
                                    Bagian</button>
                                <div class="modal fade" id="modalBAB{{ $book->id }}" tabindex="-1"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">List BAB</h5>
                                                <button type="button" class="btn-close" data-mdb-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                @if ($book->chapters->isNotEmpty())
                                                <div class="row">
                                                    @foreach ($book->chapters as $chapter)
                                                    <div class="col-md-6">
                                                        <div class="card text-center">
                                                            <div class="card-header">
                                                                {{ $chapter->sub_title_of_chapter }}</div>
                                                            <div class="card-body">
                                                                <p class="card-text">{!!
                                                                    Str::limit(strip_tags($chapter->content_of_chapter),
                                                                    15) !!}</p>
                                                                <a href="{{ Route('edit.chapter', ['chapter_id' => $chapter->id]) }}"
                                                                    class="btn btn-primary">EDIT</a>
                                                            </div>
                                                            <div class="card-footer text-muted">
                                                                {{ $chapter->created_at->diffForHumans() }}</div>
                                                        </div>
                                                    </div>
                                                    @endforeach
                                                </div>
                                                @else
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <p class="text-danger mx-auto fs-5 text-center">Tidak ada BAB dalam buku ini.</p>
                                                    </div>
                                                </div>
                                                @endif
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-mdb-dismiss="modal">Tutup</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <button type="button"
                                    class="btn btn-{{ $book->is_published ? 'success' : 'danger' }}">{{ $book->is_published ? 'PUBLISHED' : 'DRAFT' }}</button>
                            </td>
                            <td>
                                <div class="btn-group shadow-0">
                                    <button type="button" class="btn btn-dark dropdown-toggle"
                                        data-mdb-toggle="dropdown" aria-expanded="false">
                                        Action
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li>
                                            <div class="text-center p-2">
                                                <form action="{{ Route('publish.book', ['id' => $book->id]) }}"
                                                    method="POST">
                                                    @csrf
                                                    <button type="submit"
                                                        class="btn btn-sm btn-success opacity-50" style="width: 100%">Publish Buku</button>
                                                </form>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="text-center p-2">
                                                <a href="{{ Route('edit.book', ['bookId' => $book->id]) }}" class="btn btn-sm btn-warning opacity-50" style="width: 100%">Edit Buku</a>
                                            </div>
                                        </li>
                                        <li>
                                            <a class="dropdown-item"
                                                href="{{ Route('book.chapter', ['slug' => $book->slug]) }}">Tambah
                                                BAB</a>
                                        </li>
                                        <li>
                                            <hr class="dropdown-divider" />
                                        </li>
                                        <li>
                                            <div class="text-center p-2">
                                                <button type="button" data-mdb-toggle="modal"
                                                    data-mdb-target="#deleteModalBAB{{ $book->id }}"
                                                    class="btn btn-sm btn-danger opacity-50" style="width: 100%">Hapus Buku</button>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                                <div class="modal fade" id="deleteModalBAB{{ $book->id }}" tabindex="-1"
                                    aria-labelledby="deleteModalBAB{{ $book->id }}" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="deleteModalBAB{{ $book->id }}">Hapus Buku
                                                    {{ $book->title }}
                                                </h5>
                                                <button type="button" class="btn-close" data-mdb-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <p>Apakah anda yakin ingin menghapus buku <span class="text-danger">{{ $book->title }}</span> ?</p>
                                            </div>
                                            <div class="modal-footer">
                                                <form action="{{ Route('delete.book', ['id' => $book->id]) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="Submit" class="btn btn-danger">Hapus</button>
                                                </form>
                                                <button type="button" class="btn btn-secondary"
                                                    data-mdb-dismiss="modal">Tutup</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </section>
</div>
<section>
    <div class="row mt-3">
        <div class="col-xl-3 col-sm-6 col-12 mb-4">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between px-md-1">
                        <div>
                            <p class="mb-0">Jumlah Buku</p>
                            <p class="fs-3">{{ \App\Models\Book::count() }}</p>
                        </div>
                        <div class="align-self-center">
                            <i class="fa-solid fa-book text-success fa-3x"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
