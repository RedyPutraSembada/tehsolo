@extends('layouts.app')

@section('content')
    <div class="main-content position-relative max-height-vh-100 h-100">
        <div class="container-fluid py-4">
            <div class="row">
                <div class="col-md-12">
                    <form action="{{ route('produk.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="card">
                            <div class="card-header pb-0">
                                <div class="d-flex align-items-center">
                                    <p class="mb-0">{{ $title }}</p>
                                    <button class="btn btn-primary btn-sm ms-auto" type="submit">Save</button>
                                </div>
                            </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">Name</label>
                                        <input class="form-control @error('name') is-invalid @enderror" type="text" name="name" value="{{ old('name') }}">
                                        @error('name')
                                            <p><small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">Image</label>
                                        <input class="form-control" type="file" name="image">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">Price</label>
                                        <input class="form-control @error('price') is-invalid @enderror" type="number" name="price" value="{{ old('price') }}">
                                        @error('price')
                                            <p><small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">Maps</label>
                                        <input class="form-control @error('maps') is-invalid @enderror" type="text" name="maps" value="{{ old('maps') }}">
                                        @error('maps')
                                            <p><small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="address" class="form-label">Description</label>
                                        <textarea class="form-control @error('description') is-invalid @enderror" id="description" rows="3" name="description">{{ old('description') }}</textarea>
                                        @error('description')
                                            <p><small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="table-responsive">
                                    <table class="table" id="table_item">
                                        <tr>
                                            <th width="100px"></th>
                                            <th width="100px"></th>
                                            <th></th>
                                        </tr>
                                        <tr>
                                            <td><input class="btn btn-danger" name="remove" id="remove" value="Remove" type="button"></input>
                                            </td><td><label for="example-text-input" class="form-control-label">Add Items :</label></td>
                                            <td><select class="form-select" aria-label="Default select example" name="id_item[]">
                                                <option value="" selected>items</option>
                                                @foreach ($items as $item)
                                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                                @endforeach
                                            </select>
                                        </tr>
                                    </table>
                                    <div class="text-end">
                                        <input type="button" name="addItem" id="addItem" value="Add" class="btn btn-success">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function(){
            var amanities = '<tr><td><input class="btn btn-danger" name="remove" id="remove" value="Remove" type="button"></input></td><td><label for="example-text-input" class="form-control-label">Add Items :</label></td><td><select class="form-select" aria-label="Default select example" name="id_item[]"><option value="" selected>items</option>@foreach ($items as $item)<option value="{{ $item->id }}">{{ $item->name }}</option>@endforeach</select></tr>';
            var max = 100;
            var x = 0;

            $("#addItem").click(function(){
                console.log('Hello');
                if(x <= max){
                    $("#table_item").append(amanities);
                    x++;
                }
            })

            $("#table_item").on('click', '#remove', function() {
                $(this).closest('tr').remove();
                x--;
            })
        })
    </script>
@endsection
