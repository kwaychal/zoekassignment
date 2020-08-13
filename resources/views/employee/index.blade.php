@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6">
            <h4 class="text-primary">Employee list</h4>
        </div>
        <div class="col-md-6">
            <a href="{{ route('employees.create') }}" class="btn btn-primary float-right">
                <i class="fa fa-plus" aria-hidden="true"></i>
                Add Employee
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
                            <th scope="col">Name</th>
                            <th scope="col">Company</th>
                            <th scope="col">Email</th>
                            <th scope="col">Phone</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($employees as $employee)
                        <tr id="E{{$employee->id}}">
                            <th scope="row" class="align-middle">
                                {{ ucfirst($employee->first_name)}} {{ucfirst($employee->last_name)}}
                            </th>
                            <td class="align-middle">{{ ucfirst($employee->company->name) }}</td>
                            <td class="align-middle">{{$employee->email}}</td>
                            <td class="align-middle">{{$employee->phone}}</td>
                            <td class="align-middle">
                                <a class="btn btn-outline-primary btn-sm" href="{{ route('employees.edit',$employee->id) }}">
                                    <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                </a>
                                <Button class="btn btn-outline-danger btn-sm delete-data"
                                    data-url="{{route('employees.destroy',$employee)}}"
                                    data-row-id="E{{$employee->id}}">
                                    <i class="fa fa-trash" aria-hidden="true"></i>
                                </Button>
                            </td>
                        </tr>
                        @endforeach
                        @if(count($employees) == 0)
                            <tr>
                                <td colspan="5" class="text-center">Please add employee.</td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>
            {{ $employees->links() }}
        </div>
    </div>
</div>
@endsection