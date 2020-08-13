@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6">
            <h4 class="text-primary">Company list</h4>
        </div>
        <div class="col-md-6">
            <a href="{{ route('companies.create') }}" class="btn btn-primary float-right">
                <i class="fa fa-plus" aria-hidden="true"></i>
                Add Company
            </a>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-md-12">
            <div class="table-responsive">
                <table class="table table-hover bg-white">
                    <thead>
                        <tr>
                            <th scope="col">Logo</th>
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Website</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($companies as $company)
                        <tr>
                            <th scope="row" class="align-middle">
                                @if($company->logo)
                                <img src="{{asset('storage/'.$company->logo)}}" alt="" style="max-width: 50px; max-height: 50px;">
                                @else
                                <img src="https://dummyimage.com/300x300/000/fff&text=C-logo" alt="" style="max-width: 50px; max-height: 50px;">
                                @endif
                            </th>
                            <td class="align-middle">{{ ucfirst($company->name) }}</td>
                            <td class="align-middle">{{$company->email}}</td>
                            <td class="align-middle">{{$company->website}}</td>
                            <td class="align-middle">
                                <a class="btn btn-outline-primary btn-sm" href="{{ route('companies.edit',$company->id) }}">
                                    <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                </a>
                                <Button class="btn btn-outline-danger btn-sm" class="delete-data">
                                    <i class="fa fa-trash" aria-hidden="true"></i>
                                </Button>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            {{ $companies->links() }}
        </div>
    </div>
</div>
@endsection