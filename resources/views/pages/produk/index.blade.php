@extends('layouts.app')

@section('content')
<main class="main-content position-relative border-radius-lg ">
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <div class="d-flex align-items-center">
                        <h6>{{ $title }}</h6>
                        <a href="{{ route('produk.create') }}" class="btn btn-primary btn-sm ms-auto">Create</a>
                    </div>
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                <div class="table-responsive p-0">
                    <table class="table align-items-center mb-0">
                    <thead>
                        <tr>
                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Image</th>
                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Name</th>
                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Description</th>
                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Maps</th>
                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Price</th>
                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Status Sewa</th>
                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">List Item</th>
                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($produks as $produk)
                        <tr>
                            <td>
                                <div class="d-flex px-2 py-1">
                                    {{--  <p>{$produk->image}</p>  --}}
                                    <img src="{{ asset('storage/' . $produk->image) }}" class="avatar avatar-sm me-3" alt="image">
                                </div>
                            </td>
                            <td>
                                <p class="align-middle text-center text-sm">{{ $produk->name}}</p>
                            </td>
                            <td>
                                <p class="align-middle text-center text-sm">{{ $produk->description}}</p>
                            </td>
                            <td>
                                <p class="align-middle text-center text-sm">{{ $produk->maps}}</p>
                            </td>
                            <td>
                                <p class="align-middle text-center text-sm">{{ $produk->price}}</p>
                            </td>
                            <td>
                                <p class="align-middle text-center text-sm">{{ $produk->status_sewa}}</p>
                            </td>
                            <td>
                                <ul>
                                    @if (count($produk->ProdukListItem) > 0)
                                        @foreach ($produk->ProdukListItem as $value)
                                            <li>{{ $value->Item->name }}</li>
                                        @endforeach
                                    @endif
                                </ul>
                            </td>
                            <td class="align-middle text-center">
                                <a href="{{ route('produk.edit', $produk->id) }}" class="btn btn-outline-warning btn-sm">
                                Edit
                                </a>
                                <form onsubmit="return confirm('Apakah yakin untuk menghapus data tersebut??');" action="{{ route('produk.destroy', $produk->id) }}" method="POST">
                                    @method('DELETE')
                                    @csrf
                                    <button type="submit" class="btn btn-outline-danger btn-sm">Delete</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</main>
@endsection
