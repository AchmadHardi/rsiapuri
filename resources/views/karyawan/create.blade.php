@extends('template.main')
@section('title', 'Add Karyawan')
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
                            <li class="breadcrumb-item"><a href="/karyawan">Karyawan</a></li>
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
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <div class="text-right">
                                    <a href="/karyawan" class="btn btn-warning btn-sm"><i
                                            class="fa-solid fa-arrow-rotate-left"></i>
                                        Back
                                    </a>
                                </div>
                            </div>
                            <form class="needs-validation" novalidate action="/karyawan" method="POST">
                                @csrf
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label for="nama">Nama</label>
                                                <input type="text" name="nama"
                                                    class="form-control @error('nama') is-invalid @enderror" id="nama"
                                                    placeholder="Nama Karyawan" value="{{ old('nama') }}" required>
                                                @error('nama')
                                                    <span class="invalid-feedback text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label for="username">Username</label>
                                                <input type="text" name="username"
                                                    class="form-control @error('username') is-invalid @enderror"
                                                    id="username" placeholder="Username" value="{{ old('username') }}"
                                                    required>
                                                @error('username')
                                                    <span class="invalid-feedback text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label for="unit_id">Unit</label>
                                                <select id="unit_id"
                                                    class="form-select @error('unit_id') is-invalid @enderror"
                                                    name="unit_id" required style="width: 100%; max-width: 400px;">
                                                    <option value="">Pilih Unit</option>
                                                    @foreach ($units as $unit)
                                                        <option value="{{ $unit->id }}">{{ $unit->name }} {{ $unit->nama }}</option>
                                                    @endforeach
                                                </select>
                                                <button type="button" class="btn btn-primary mt-2" data-bs-toggle="modal" data-bs-target="#addUnitModal">Tambah Unit Baru</button>
                                                @error('unit_id')
                                                    <span class="invalid-feedback text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label for="jabatan_id">Jabatan</label>
                                                <select id="jabatan_id"
                                                    class="form-select @error('jabatan_id') is-invalid @enderror"
                                                    name="jabatan_id" required style="width: 100%; max-width: 400px;">
                                                    <option value="">Pilih Jabatan</option>
                                                    @foreach ($jabatans as $jabatan)
                                                        <option value="{{ $jabatan->id }}">{{ $jabatan->name }}</option>
                                                    @endforeach
                                                </select>
                                                <button type="button" class="btn btn-primary mt-2" data-bs-toggle="modal" data-bs-target="#addJabatanModal">Tambah Jabatan Baru</button>
                                                @error('jabatan_id')
                                                    <span class="invalid-feedback text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label for="password">Password</label>
                                                <input type="password" name="password"
                                                    class="form-control @error('password') is-invalid @enderror"
                                                    id="password" placeholder="Password" required>
                                                @error('password')
                                                    <span class="invalid-feedback text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label for="confirm_password">Confirm Password</label>
                                                <input type="password" name="confirm_password"
                                                    class="form-control @error('confirm_password') is-invalid @enderror"
                                                    id="confirm_password" placeholder="Confirm Password" required>
                                                @error('confirm_password')
                                                    <span class="invalid-feedback text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label for="tanggal_bergabung">Tanggal Bergabung</label>
                                                <input type="date" name="tanggal_bergabung"
                                                    class="form-control @error('tanggal_bergabung') is-invalid @enderror"
                                                    id="tanggal_bergabung" value="{{ old('tanggal_bergabung') }}" required>
                                                @error('tanggal_bergabung')
                                                    <span class="invalid-feedback text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer text-right">
                                    <button class="btn btn-dark mr-1" type="reset"><i
                                            class="fa-solid fa-arrows-rotate"></i> Reset</button>
                                    <button class="btn btn-success" type="submit"><i class="fa-solid fa-floppy-disk"></i>
                                        Save</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- /.content -->
                </div>
            </div>
        </div>
    </div>

    <!-- Modal for Adding New Unit -->
    <div class="modal fade" id="addUnitModal" tabindex="-1" aria-labelledby="addUnitModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addUnitModalLabel">Tambah Unit Baru</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="addUnitForm">
                        <div class="mb-3">
                            <label for="unitName" class="form-label">Nama Unit</label>
                            <input type="text" class="form-control" id="unitName" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal for Adding New Jabatan -->
    <div class="modal fade" id="addJabatanModal" tabindex="-1" aria-labelledby="addJabatanModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addJabatanModalLabel">Tambah Jabatan Baru</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="addJabatanForm">
                        <div class="mb-3">
                            <label for="jabatanName" class="form-label">Nama Jabatan</label>
                            <input type="text" class="form-control" id="jabatanName" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Tambahkan JS Select2 dan jQuery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.3/js/bootstrap.bundle.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#unit_id').select2({
                placeholder: 'Pilih Unit',
                allowClear: true,
                tags: true // Enable adding new units
            });

            $('#jabatan_id').select2({
                placeholder: 'Pilih Jabatan',
                allowClear: true,
                tags: true // Enable adding new jabatan
            });

            // Handle adding new unit
            $('#addUnitForm').on('submit', function(event) {
                event.preventDefault();
                var unitName = $('#unitName').val();
                $.ajax({
                    url: '/units', // URL to your route for adding unit
                    method: 'POST',
                    data: {
                        _token: '{{ csrf_token() }}',
                        name: unitName
                    },
                    success: function(response) {
                        $('#unit_id').append(new Option(response.name, response.id, true, true)).trigger('change');
                        $('#addUnitModal').modal('hide');
                    },
                    error: function(xhr) {
                        alert('Error adding unit');
                    }
                });
            });

            // Handle adding new jabatan
            $('#addJabatanForm').on('submit', function(event) {
                event.preventDefault();
                var jabatanName = $('#jabatanName').val();
                $.ajax({
                    url: '/jabatans', // URL to your route for adding jabatan
                    method: 'POST',
                    data: {
                        _token: '{{ csrf_token() }}',
                        name: jabatanName
                    },
                    success: function(response) {
                        $('#jabatan_id').append(new Option(response.name, response.id, true, true)).trigger('change');
                        $('#addJabatanModal').modal('hide');
                    },
                    error: function(xhr) {
                        alert('Error adding jabatan');
                    }
                });
            });
        });
    </script>
@endsection
