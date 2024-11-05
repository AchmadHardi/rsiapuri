@extends('template.main')
@section('title', 'Edit Jurnal Transaksi')
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
                        <li class="breadcrumb-item"><a href="/transaksi">Jurnal Transaksi</a></li>
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
                            <h3 class="card-title">Edit Jurnal Transaksi</h3>
                            <div class="text-right">
                                <a href="/transaksi" class="btn btn-warning btn-sm"><i class="fa-solid fa-arrow-rotate-left"></i>
                                    Back
                                </a>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <form action="/transaksi/{{ $transaksi->id }}" method="POST">
                                @csrf
                                @method('PUT')

                                <div class="form-group">
                                    <label for="kode_jurnal">Kode Jurnal</label>
                                    <input type="text" class="form-control @error('kode_jurnal') is-invalid @enderror" id="kode_jurnal" name="kode_jurnal" value="{{ old('kode_jurnal', $transaksi->kode_jurnal) }}" required maxlength="50">
                                    @error('kode_jurnal')
                                    <span class="invalid-feedback text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="keterangan">Keterangan</label>
                                    <textarea class="form-control @error('keterangan') is-invalid @enderror" id="keterangan" name="keterangan" rows="3">{{ old('keterangan', $transaksi->keterangan) }}</textarea>
                                    @error('keterangan')
                                    <span class="invalid-feedback text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="tanggal">Tanggal</label>
                                    <input type="date" class="form-control @error('tanggal') is-invalid @enderror" id="tanggal" name="tanggal" value="{{ old('tanggal', \Carbon\Carbon::parse($transaksi->tanggal)->format('Y-m-d')) }}" required>

                                    @error('tanggal')
                                    <span class="invalid-feedback text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="kode_rekening">Kode Rekening</label>
                                    <input type="text" class="form-control @error('kode_rekening') is-invalid @enderror" id="kode_rekening" name="kode_rekening" value="{{ old('kode_rekening', $transaksi->kode_rekening) }}" required maxlength="50">
                                    @error('kode_rekening')
                                    <span class="invalid-feedback text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="uraian_transaksi">Uraian Transaksi</label>
                                    <textarea class="form-control @error('uraian_transaksi') is-invalid @enderror" id="uraian_transaksi" name="uraian_transaksi" rows="3" required>{{ old('uraian_transaksi', $transaksi->uraian_transaksi) }}</textarea>
                                    @error('uraian_transaksi')
                                    <span class="invalid-feedback text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="kel_tujuan">Kel. Tujuan</label>
                                    <input type="text" class="form-control @error('kel_tujuan') is-invalid @enderror" id="kel_tujuan" name="kel_tujuan" value="{{ old('kel_tujuan', $transaksi->kel_tujuan) }}" required maxlength="50">
                                    @error('kel_tujuan')
                                    <span class="invalid-feedback text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="tujuan">Tujuan</label>
                                    <input type="text" class="form-control @error('tujuan') is-invalid @enderror" id="tujuan" name="tujuan" value="{{ old('tujuan', $transaksi->tujuan) }}" required maxlength="50">
                                    @error('tujuan')
                                    <span class="invalid-feedback text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="referensi">Referensi</label>
                                    <input type="text" class="form-control @error('referensi') is-invalid @enderror" id="referensi" name="referensi" value="{{ old('referensi', $transaksi->referensi) }}" maxlength="100">
                                    @error('referensi')
                                    <span class="invalid-feedback text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="pemasok">Pemasok</label>
                                    <input type="text" class="form-control @error('pemasok') is-invalid @enderror" id="pemasok" name="pemasok" value="{{ old('pemasok', $transaksi->pemasok) }}" maxlength="100">
                                    @error('pemasok')
                                    <span class="invalid-feedback text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="department">Department</label>
                                    <input type="text" class="form-control @error('department') is-invalid @enderror" id="department" name="department" value="{{ old('department', $transaksi->department) }}" maxlength="50">
                                    @error('department')
                                    <span class="invalid-feedback text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="debet">Debet</label>
                                    <input type="number" class="form-control @error('debet') is-invalid @enderror" id="debet" name="debet" value="{{ old('debet', $transaksi->debet) }}" required step="0.01">
                                    @error('debet')
                                    <span class="invalid-feedback text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="kredit">Kredit</label>
                                    <input type="number" class="form-control @error('kredit') is-invalid @enderror" id="kredit" name="kredit" value="{{ old('kredit', $transaksi->kredit) }}" required step="0.01">
                                    @error('kredit')
                                    <span class="invalid-feedback text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="text-right">
                                    <button type="submit" class="btn btn-success">Save</button>
                                    <a href="/transaksi" class="btn btn-secondary">Cancel</a>
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
