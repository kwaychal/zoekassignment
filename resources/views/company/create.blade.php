@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6">
            <h4 class="text-primary">Add Company</h4>
        </div>
        <div class="col-md-6">
            <a href="{{ url()->previous() }}" class="btn btn-primary float-right">
                <i class="fa fa-arrow-left" aria-hidden="true"></i>
                Back
            </a>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-md-12">
        <form action="{{ route('companies.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="_method" value="POST">
            <div class="form-group">
                <label for="logo">Logo</label>
                <div class="custom-file">
                    <input type="file" class="custom-file-input @error('logo') is-invalid @enderror" id="logo" name="logo" value="{{ old('logo') }}" placeholder="Choose file">
                    <label class="custom-file-label" for="logo">Choose file</label>
                </div>
                @error('logo')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="name">Company Name</label>
                <input type="text" class="form-control  @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}" placeholder="Enter name">
                @error('name')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}" placeholder="email">
                @error('email')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="website">Website</label>
                <input type="url" class="form-control @error('website') is-invalid @enderror" id="website" name="website" value="{{ old('website') }}" placeholder="website">
                @error('website')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
        </div>
    </div>
</div>
@endsection