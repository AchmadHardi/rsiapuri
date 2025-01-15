@extends('template.main')
@section('title', 'Jurnal')
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
                                <button class="btn btn-info btn-sm" onclick="printTable()">
                                    <i class="fa-solid fa-print"></i> Printout
                                </button>
                                <a href="/jurnal/create" class="btn btn-primary">
                                    <i class="fa-solid fa-plus"></i> Add Jurnal
                                </a>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-striped table-bordered table-hover text-center" style="width: 100%">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Kode</th>
                                        <th>Nama Jurnal</th>
                                        <th>No Terakhir</th>
                                        <th>Keterangan</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($jurnal as $jurnal)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $jurnal->kode }}</td>
                                            <td>{{ $jurnal->nama_jurnal }}</td>
                                            <td>{{ $jurnal->no_terakhir }}</td>
                                            <td>{{ $jurnal->keterangan }}</td>
                                            <td>
                                                <form class="d-inline" action="/jurnal/{{ $jurnal->id }}/edit" method="GET">
                                                    <button type="submit" class="btn btn-success btn-sm mr-1">
                                                        <i class="fa-solid fa-pen"></i> Edit
                                                    </button>
                                                </form>
                                                <form class="d-inline" action="/jurnal/{{ $jurnal->id }}" method="POST">
                                                    @csrf
                                                    @method('delete')
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
<script>
    function printTable() {
        // Create a new window to print
        var printWindow = window.open('', '', 'height=600,width=800');

        // Add the content of the table to the new window (excluding the rest of the page content)
        var tableContent = document.querySelector('table').outerHTML;

        printWindow.document.write('<html><head><title>Printout</title>');
        printWindow.document.write('<link rel="stylesheet" type="text/css" href="{{ asset('css/app.css') }}">');  // Include your CSS if needed

        // Add a print-specific CSS style to hide the Action buttons (Edit/Delete)
        printWindow.document.write('<style>');
        printWindow.document.write('@media print {');
        // Use a more specific selector to hide the action buttons (adjust the selector to your structure)
        printWindow.document.write('.action-buttons { display: none; }'); // Assuming "action-buttons" class wraps Edit/Delete buttons
        printWindow.document.write('}</style>');

        printWindow.document.write('</head><body>');
        printWindow.document.write(tableContent); // Only write the table content to the print window
        printWindow.document.write('</body></html>');

        // Close the document and trigger the print dialog
        printWindow.document.close();
        printWindow.print();
    }
</script>


@endsection
