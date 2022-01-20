@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card-body">
        <form method="POST" action="/admin/insert-product" enctype="multipart/form-data">
            @csrf

            <div class="form-group row">
                <label for="name" class="col-md-2 col-form-label text-md-right"><b>Product Name</b></label>

                <div class="col-md-10">
                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" required autocomplete="name" autofocus>

                    @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>
            <p></p>

            <div class="form-group row">
                <label for="description" class="col-md-2 col-form-label text-md-right"><b>Product Description</b></label>

                <div class="col-md-10">
                    <textarea id="description" class="form-control @error('description') is-invalid @enderror" name="description" required autocomplete="description" autofocus></textarea>

                    @error('description')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>
            <p></p>

            <div class="form-group row">
                <label for="price" class="col-md-2 col-form-label text-md-right"><b>Product Price</b></label>

                <div class="col-md-10">
                    <input id="price" type="text" class="form-control @error('price') is-invalid @enderror" name="price" required autocomplete="price" autofocus>

                    @error('price')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>
            <p></p>

            <div class="form-group row">
                <label for="category" class="col-md-2 col-form-label text-md-right"><b>Product Category</b></label>

                <div class="col-md-10">
                    <select class="form-control" name="category" id="genre">
                        @foreach ($categories as $item)
                            <option value="{{ $item->id }}">{{ $item->category_name }}</option>
                        @endforeach
                    </select>

                    @error('category')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>
            <p></p>

            <div class="form-group row">
                <label for="photo" class="col-md-2 col-form-label text-md-right"><b>Product Image</b></label>

                <div class="col-md-10">
                    <input id="photo" type="file" class="@error('photo') is-invalid @enderror" name="photo" required autocomplete="photo" autofocus>

                    @error('photo')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>
            <p></p>

            <div class="form-group row mb-0">
                <div class="col-md-6 offset-md-0">
                    <button type="submit" class="btn btn-primary" style="width:204%">
                        {{ __('Insert') }}
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>

@endsection