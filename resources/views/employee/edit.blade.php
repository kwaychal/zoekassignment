@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6">
            <h4 class="text-primary">Edit Employee</h4>
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
        <form action="{{ route('employees.update',$employee) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="_method" value="PUT">
            <div class="form-group">
                <label for="first_name">First Name</label>
                <input type="text" class="form-control  @error('first_name') is-invalid @enderror" id="first_name" name="first_name" value="{{ old('first_name') ? old('first_name') : $employee->first_name }}" placeholder="Enter first name">
                @error('first_name')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="last_name">Last name</label>
                <input type="text" class="form-control @error('last_name') is-invalid @enderror" id="last_name" name="last_name" value="{{ old('last_name') ?  old('last_name') : $employee->last_name}}" placeholder="Enter last name">
                @error('last_name')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="text" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') ? old('email') : $employee->email}}" placeholder="Enter email">
                @error('email')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="phone">Last name</label>
                <input type="text" class="form-control @error('phone') is-invalid @enderror" id="phone" name="phone" value="{{ old('phone') ? old('phone') : $employee->phone }}" placeholder="Enter phone number">
                @error('phone')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="phone">Company</label>
                @php
                 $compareValue = old('company_id') ? old('company_id') : $employee->company_id;
                @endphp
                <select class="form-control" aria-placeholder="Select Company" name="company_id">
                    <option value="">Select Company</option>
                    @foreach($companies as $company)
                    <option value="{{$company->id}}" {{$compareValue == $company->id ? 'selected' : ''}}>{{ucfirst($company->name)}}</option>
                    @endforeach
                </select>
                @error('company_id')
                    <div class="alert alert-danger"> Please select company </div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Edit</button>
        </form>
        </div>
    </div>
</div>
@endsection