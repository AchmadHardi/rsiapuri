@extends('template.main')

@section('title', 'Add Transaksi')

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
                        <li class="breadcrumb-item"><a href="{{ route('transaksi.index') }}">Jurnal Transaksi</a></li>
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
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Add Transaksi</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <form action="{{ route('transaksi.store') }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="kode_jurnal">Kode Jurnal</label>
                                    <select name="kode_jurnal" id="kode_jurnal" class="form-control @error('kode_jurnal') is-invalid @enderror" required>
                                        <option value="">-- Pilih Kode Jurnal --</option>
                                        @foreach($jurnal as $item)
                                        <option value="{{ $item->kode }}" {{ old('kode_jurnal') == $item->kode ? 'selected' : '' }}>
                                            {{ $item->kode }} - {{ $item->nama_jurnal }}
                                        </option>
                                    @endforeach

                                    </select>
                                    @error('kode_jurnal')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>


                                <div class="form-group">
                                    <label for="keterangan">Keterangan</label>
                                    <textarea class="form-control" id="keterangan" name="keterangan" rows="3">{{ old('keterangan') }}</textarea>
                                </div>

                                <div class="form-group">
                                    <label for="tanggal">Tanggal</label>
                                    <input type="date" class="form-control" id="tanggal" name="tanggal" required value="{{ old('tanggal') }}">
                                </div>

                                <div class="form-group">
                                    <label for="kode_rekening">Kode Rekening</label>
                                    <input type="text" class="form-control" id="kode_rekening" name="kode_rekening" required maxlength="50" value="{{ old('kode_rekening') }}">
                                </div>

                                <div class="form-group">
                                    <label for="uraian_transaksi">Uraian Transaksi</label>
                                    <textarea class="form-control" id="uraian_transaksi" name="uraian_transaksi" rows="3" required>{{ old('uraian_transaksi') }}</textarea>
                                </div>

                                <div class="form-group">
                                    <label for="kel_tujuan">Kelompok Tujuan</label>
                                    <input type="text" class="form-control" id="kel_tujuan" name="kel_tujuan" required maxlength="50" value="{{ old('kel_tujuan') }}">
                                </div>

                                <div class="form-group">
                                    <label for="tujuan">Tujuan</label>
                                    <input type="text" class="form-control" id="tujuan" name="tujuan" required maxlength="50" value="{{ old('tujuan') }}">
                                </div>

                                <div class="form-group">
                                    <label for="referensi">Referensi</label>
                                    <input type="text" class="form-control" id="referensi" name="referensi" maxlength="100" value="{{ old('referensi') }}">
                                </div>

                                <div class="form-group">
                                    <label for="pemasok">Pemasok</label>
                                    <input type="text" class="form-control" id="pemasok" name="pemasok" maxlength="100" value="{{ old('pemasok') }}">
                                </div>

                                <div class="form-group">
                                    <label for="department">Department</label>
                                    <input type="text" class="form-control" id="department" name="department" maxlength="50" value="{{ old('department') }}">
                                </div>

                                <div class="form-group">
                                    <label for="debet">Debet</label>
                                    <input type="number" class="form-control" id="debet" name="debet" required value="{{ old('debet') }}" step="0.01">
                                </div>

                                <div class="form-group">
                                    <label for="kredit">Kredit</label>
                                    <input type="number" class="form-control" id="kredit" name="kredit" required value="{{ old('kredit') }}" step="0.01">
                                </div>

                                <div class="text-right">
                                    <button type="submit" class="btn btn-primary">Save</button>
                                    <a href="{{ route('transaksi.index') }}" class="btn btn-secondary">Cancel</a>
                                </div>
                            </form>
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
