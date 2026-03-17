@extends('layouts.app')

@section('content')

<h3>Edit Book</h3>

<div class="card">
<div class="card-body">

<form action="{{ route('books.update',$book->id) }}" method="POST" enctype="multipart/form-data">    @csrf
    @method('PUT')

    <div class="mb-3">
        <label>Kategori</label>
        <select name="category_id" class="form-select">
            <option value="">-- Pilih Kategori --</option>
            @foreach($categories as $category)
                <option value="{{ $category->id }}" {{ $category->id == $book->category_id ? 'selected' : '' }}>
                    {{ $category->nama_kategori }}
                </option>
            @endforeach
        </select>
    </div>
    <div class="mb-3">
        <label>Judul</label>
        <input type="text" name="judul" 
               value="{{ $book->judul }}" class="form-control">
    </div>

    <div class="mb-3">
        <label>Penulis</label>
        <input type="text" name="penulis" 
               value="{{ $book->penulis }}" class="form-control">
    </div>

    <div class="mb-3">
        <label>Tahun Terbit</label>
        <input type="number" name="tahun_terbit" 
               value="{{ $book->tahun_terbit }}" class="form-control">
    </div>

    <div class="mb-3">
        <label>Stok</label>
        <input type="number" name="stok" 
               value="{{ $book->stok }}" class="form-control">
    </div>

    <div class="mb-3">
        <label>Gambar</label>
        @if($book->gambar)
            <div class="mb-2">
                <img src="{{ asset('storage/books/' . $book->gambar) }}"
                    alt="Gambar Buku" style="max-height: 150px; border-radius: 6px;">
                <p class="text-muted small mt-1">Gambar saat ini. Upload baru untuk mengganti.</p>
            </div>
        @endif
        <input type="file" name="gambar" class="form-control" accept="image/*">
        <small class="text-muted">Format: JPG, JPEG, PNG, WEBP. Maks 2MB. (Opsional)</small>
    </div>

    <button class="btn btn-primary">Update</button>
    <a href="{{ route('books.index') }}" class="btn btn-secondary">Kembali</a>

</form>

</div>
</div>

@endsection
