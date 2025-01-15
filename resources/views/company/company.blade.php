@extends('template.main')

@section('title', 'company')

@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">@yield('title')</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/">Home</a></li>
                        <li class="breadcrumb-item active">@yield('title')</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="text-right">
                                <a href="/company/create" class="btn btn-primary">
                                    <i class="fa-solid fa-plus"></i> Add Company
                                </a>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-striped table-bordered table-hover text-center" style="width: 100%">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Tagline</th>
                                        <th>Address</th>
                                        <th>Logo</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($company as $company)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $company->name }}</td>
                                            <td>{{ $company->tagline }}</td>
                                            <td>{{ $company->address }}</td>
                                            <td>
                                                @if ($company->logo)
                                                <img src="{{ asset('storage/logos/' . $company->logo) }}" alt="Logo" style="max-width: 100px;">

                                                @else
                                                    No Photo
                                                @endif
                                            </td>
                                            <td>
                                                <form class="d-inline" action="/company/{{ $company->id }}/edit" method="GET">
                                                    <button type="submit" class="btn btn-success btn-sm mr-1">
                                                        <i class="fa-solid fa-pen"></i> Edit
                                                    </button>
                                                </form>
                                                <form class="d-inline" action="/company/{{ $company->id }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm" id="btn-delete">
                                                        <i class="fa-solid fa-trash-can"></i> Delete
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
</div>

@endsection
