@extends('layouts.app')

@section('content')


<div class="d-flex justify-content-between mb-3">
    <h3>Data Book</h3>
    <a href="{{ route('books.create') }}" class="btn btn-primary">+ Tambah</a>
</div>

@if(session('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
@endif

<div class="mb-3">
    <div class="alert alert-info">
        Total Semua Book: <strong>{{ $totalBooks }}</strong>
    </div>
</div>

<div class="mb-3">
    <div class="card">
        <div class="card-body">
            <h5>Total Book per Category:</h5>
            <ul class="list-group">
                @foreach($totalPerCategory as $cat)
                    <li class="list-group-item d-flex justify-content-between">
                        {{ $cat->nama_kategori }}
                        <span class="badge bg-primary">
                            {{ $cat->books_count }}
                        </span>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
</div>

<form action="{{ route('books.index') }}" method="GET" class="mb-3">
    <div class="row">
        
        <div class="col-md-5">
            <input type="text" name="search" class="form-control"
                   placeholder="Cari judul buku..."
                   value="{{ $search ?? '' }}">
        </div>

        <div class="col-md-4">
            <select name="category" class="form-select category-select">
                <option value="">Semua Category</option>
                @foreach($categories as $cat)
                    <option style="color: black;" value="{{ $cat->id }}"
                        {{ ($category ?? '') == $cat->id ? 'selected' : '' }}>
                        {{ $cat->nama_kategori }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="col-md-3">
            <button class="btn btn-primary">Filter</button>
            <a href="{{ route('books.index') }}" class="btn btn-secondary">
                Reset
            </a>
        </div>

    </div>
</form>

<div class="card">
    <div class="card-body">

        <table class="table table-bordered table-striped">
            <thead class="table-dark">
                <tr>
                    <th>No</th>
                    <th>Judul</th>
                    <th>Penulis</th>
                    <th>Tahun</th>
                    <th>Stok</th>
                    <th>Gambar</th>
                    <th width="150">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($books as $key => $book)
                <tr>
                    <td>{{ $key + 1 }}</td>
                    <td>{{ $book->judul }}</td>
                    <td>{{ $book->penulis }}</td>
                    <td>{{ $book->tahun_terbit }}</td>
                    <td>
                        <span class="badge bg-info">{{ $book->stok }}</span>
                    </td>
                    <td>
                        @if($book->gambar)
                            <img src="{{ asset('storage/books/' . $book->gambar) }}" style="height: 60px; border-radius: 4px;">
                        @else
                            <span class="text-muted">-</span>
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('books.edit',$book->id) }}" 
                           class="btn btn-warning btn-sm">Edit</a>

                        <form action="{{ route('books.destroy',$book->id) }}" 
                              method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm"
                                onclick="return confirm('Yakin hapus data?')">
                                Hapus
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

       

    </div>
</div>

@endsection
