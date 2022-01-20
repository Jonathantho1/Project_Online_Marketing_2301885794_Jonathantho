@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card-body">
    <form method="POST" action="/admin/update-category/{{$selectedCategory->id}}">
            @csrf

            <div class="form-group row">
                <label for="name" class="col-md-2 col-form-label text-md-right"><b>Category Name</b></label>

                <div class="col-md-10">
                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="category_name" value="{{$selectedCategory->category_name}}" required autocomplete="name" autofocus>

                    @error('name')
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
                        {{ __('Update') }}
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection