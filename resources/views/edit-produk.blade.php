@extends('layouts.app')

@section('content')
    <div class="container my-5">
        <div class="row">
            <div class="col-12 my-3">
                <a href="{{ route('index') }}" class="btn btn-secondary">kembali</a>
            </div>
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3>Ubah Produk {{ $produk->nama_produk }} </h3>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('produk.update', $produk->id_produk) }}" method="post">
                            @csrf
                            @method('put')

                            <div class="row d-flex justify-content-center align-items-center">
                                <div class="col-6">

                                    <div class="mb-3">
                                        <label for="nama_produk" class="form-label">Nama Produk</label>
                                        <input type="text"
                                            class="form-control @error('nama_produk') is-invalid @enderror" id="nama_produk"
                                            name="nama_produk" value="{{ old('nama_produk', $produk->nama_produk) }}"
                                            required>
                                        @error('nama_produk')
                                            <div id="validationServerUsernameFeedback" class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label for="harga" class="form-label">Harga</label>
                                        <input type="number" class="form-control @error('harga') is-invalid @enderror"
                                            id="harga" name="harga" value="{{ old('harga', $produk->harga) }}"
                                            required>
                                        @error('harga')
                                            <div id="validationServerUsernameFeedback" class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label for="kategori" class="form-label">Kategori</label>
                                        <select class="form-select @error('kategori_id') is-invalid @enderror"
                                            aria-label="Default select example" name="kategori_id" id="kategori" required>
                                            @foreach ($kategori as $item)
                                                <option value="{{ $item->id_kategori }}"
                                                    {{ $item->id_kategori == $produk->kategori_id ? 'selected' : '' }}>
                                                    {{ $item->nama_kategori }}</option>
                                            @endforeach
                                        </select>
                                        @error('kategori_id')
                                            <div id="validationServerUsernameFeedback" class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label for="status" class="form-label">Status</label>
                                        <select class="form-select @error('status_id') is-invalid @enderror"
                                            aria-label="Default select example" name="status_id" required>
                                            @foreach ($status as $item)
                                                <option value="{{ $item->id_status }}"
                                                    {{ $item->id_status == $produk->status_id ? 'selected' : '' }}>
                                                    {{ $item->nama_status }}</option>
                                            @endforeach
                                        </select>
                                        @error('status_id')
                                            <div id="validationServerUsernameFeedback" class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                    <div class="row my-5">
                                        <div class="col-12 d-grid">
                                            <button class="btn btn-primary">Ubah</button>
                                        </div>
                                    </div>

                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
