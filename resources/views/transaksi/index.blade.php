@extends('template.main')

@section('title', 'Jurnal Transaksi')

@section('content')
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">@yield('title')</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/">Home</a></li>
                        <li class="breadcrumb-item active">@yield('title')</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="text-right">
                                <!-- Add the Print Button here -->
                                <button class="btn btn-info btn-sm" onclick="printTable()">
                                    <i class="fa-solid fa-print"></i> Printout
                                </button>
                                <a href="{{ route('transaksi.create') }}" class="btn btn-primary">
                                    <i class="fa-solid fa-plus"></i> Add Transaksi
                                </a>
                            </div>
                        </div>
                        <div class="card-body">
                            <table id="example1" class="table table-striped table-bordered table-hover text-center" style="width: 100%">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Kode Jurnal</th>
                                        <th>Tanggal</th>
                                        <th>Kode Rekening</th>
                                        <th>Uraian Transaksi</th>
                                        <th>Kel. Tujuan</th>
                                        <th>Tujuan</th>
                                        <th>Referensi</th>
                                        <th>Pemasok</th>
                                        <th>Department</th>
                                        <th>Debet</th>
                                        <th>Kredit</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($transaksi as $item)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $item->kode_jurnal }}</td>
                                            <td>{{ $item->tanggal }}</td>
                                            <td>{{ $item->kode_rekening }}</td>
                                            <td>{{ $item->uraian_transaksi }}</td>
                                            <td>{{ $item->kel_tujuan }}</td>
                                            <td>{{ $item->tujuan }}</td>
                                            <td>{{ $item->referensi }}</td>
                                            <td>{{ $item->pemasok }}</td>
                                            <td>{{ $item->department }}</td>
                                            <td>Rp {{ number_format($item->debet, 2, ',', '.') }}</td>
                                            <td>Rp {{ number_format($item->kredit, 2, ',', '.') }}</td>
                                            <td>
                                                <a href="{{ route('transaksi.edit', $item->id) }}" class="btn btn-success btn-sm">
                                                    <i class="fa-solid fa-pen"></i> Edit
                                                </a>
                                                <form action="{{ route('transaksi.destroy', $item->id) }}" method="POST" class="d-inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm">
                                                        <i class="fa-solid fa-trash-can"></i> Delete
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Include the JavaScript function to trigger the print functionality -->
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
