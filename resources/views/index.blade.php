@extends('layouts.app')

@section('content')
    <div class="container my-5">
        <div class="row my-5">
            @if (session()->has('success'))
                <div class="col-12 my-2">
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                </div>
            @endif

            <div class="col-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h3>Daftar Produk</h3>
                        <a href="{{ route('produk.create') }}" class="btn btn-primary">Tambah Produk</a>
                    </div>
                    <div class="card-body">
                        @if ($produk->count())
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Nama Produk</th>
                                        <th scope="col">Kategori</th>
                                        <th scope="col">Harga</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($produk as $item)
                                        <tr>
                                            <th scope="row">{{ $produk->firstItem() + $loop->index }}</th>
                                            <td>{{ $item->nama_produk }}</td>
                                            <td>{{ $item->nama_kategori }}</td>
                                            <td>{{ $item->harga }}</td>
                                            <td>
                                                <span class="badge bg-success">
                                                    {{ $item->nama_status }}
                                                </span>
                                            </td>
                                            <td>
                                                <a href="{{ route('produk.edit', $item->id_produk) }}"
                                                    class="btn btn-warning">edit</a>
                                                <a href="" class="btn btn-danger" data-bs-toggle="modal"
                                                    data-bs-target="#hapus-produk-{{ $item->id_produk }}">hapus</a>

                                                <!-- Modal hapus-->
                                                <div class="modal fade" id="hapus-produk-{{ $item->id_produk }}"
                                                    tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-centered">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h1 class="modal-title fs-5" id="exampleModalLabel">
                                                                    Konfirmasi Hapus</h1>
                                                                <button type="button" class="btn-close"
                                                                    data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <form action="{{ route('produk.destroy', $item->id_produk) }}"
                                                                method="POST">
                                                                @csrf
                                                                @method('delete')
                                                                <div class="modal-body">
                                                                    <p>apakah anda yakin ingin menghapus produk
                                                                        <strong>
                                                                            {{ $item->nama_produk }}?
                                                                        </strong>
                                                                    </p>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary"
                                                                        data-bs-dismiss="modal">Close</button>
                                                                    <button type="submit"
                                                                        class="btn btn-primary">hapus</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>

                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>

                            <div class="row my-3">
                                <div class="col">
                                    {{ $produk->links() }}
                                </div>
                            </div>
                        @else
                            <h3 class="text-center">Tidak Ada Data Produk</h3>
                        @endif

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
