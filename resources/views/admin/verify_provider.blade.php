@extends('layouts/admin_dashboard')
@section('title', 'Verify Provider')

@section('admin_content')
@if (Session::has('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>{{ Session::get('success') }}</strong>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif
<div class="container my-5">
    <div class="container px-4 px-lg-5 mt-5">
        <h2 class="text-danger text-center fw-bolder mb-5">Unverified Providers' List</h2>
        <div class="container my-3">
            <table class="table table-bordered">
                <tr>
                    <th>Id</th>
                    <th>Full Name</th>
                    <th>Phone</th>
                    <th>Address</th>
                    <th>Verify</th>
                </tr>
                @foreach ($users as $u)
                <tr>
                    <td>{{ $u->id }}</td>
                    <td>{{ $u->address->full_name }}</td>
                    <td>{{ $u->address->phone }}</td>
                    <td>{{ $u->address->getFullAddress() }}</td>
                    <td>
                        {{-- <form action="{{ route('verify.user', $u->id) }}" method="POST">
        
                        </form> --}}
                        <a href="{{ route('admin.verify.user', $u->id) }}" class="text-success fs-3">
                            <i class="bi bi-check-square-fill"></i>
                        </a>
                    </td>
                </tr>
                @endforeach
            </table>
        </div>
    </div>
    
</div>
@endsection
