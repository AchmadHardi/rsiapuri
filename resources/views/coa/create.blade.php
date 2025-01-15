@extends('template.main')
@section('title', 'Add COA')
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
                        <li class="breadcrumb-item"><a href="/coa">COA</a></li>
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
                            <h3 class="card-title">Add COA</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <form action="/coa" method="POST">
                                @csrf
                                <!-- Code -->
                                <div class="form-group">
                                    <label for="code">Code</label>
                                    <input type="text" class="form-control @error('code') is-invalid @enderror" id="code" name="code" value="{{ old('code') }}" required maxlength="50">
                                    @error('code')
                                    <span class="invalid-feedback text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <!-- Name -->
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}" required maxlength="100">
                                    @error('name')
                                    <span class="invalid-feedback text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <!-- Type -->
                                <div class="form-group">
                                    <label for="type">Type</label>
                                    <select class="form-control @error('type') is-invalid @enderror" id="type" name="type" required>
                                        <option value="">-- Select Type --</option>
                                        <option value="General" {{ old('type') == 'General' ? 'selected' : '' }}>General</option>
                                        <option value="Detil" {{ old('type') == 'Detil' ? 'selected' : '' }}>Detil</option>
                                    </select>
                                    @error('type')
                                    <span class="invalid-feedback text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <!-- Level -->
                                <div class="form-group">
                                    <label for="level">Level</label>
                                    <select class="form-control @error('level') is-invalid @enderror" id="level" name="level" required>
                                        <option value="">-- Pilih Level --</option>
                                        @for ($i = 1; $i <= 9; $i++)
                                            <option value="{{ $i }}" {{ old('level') == $i ? 'selected' : '' }}>
                                                Level {{ $i }}
                                            </option>
                                        @endfor
                                    </select>
                                    @error('level')
                                        <span class="invalid-feedback text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group" id="parent_id_group">
                                    <label for="parent_id">Parent Account</label>
                                    <select name="parent_id" id="parent_id" class="form-control @error('parent_id') is-invalid @enderror">
                                        <option value="">-- Pilih Parent Account --</option>
                                        @foreach($coa_accounts as $coa_account)
                                            <option value="{{ $coa_account->id }}" {{ old('parent_id') == $coa_account->id ? 'selected' : '' }}>
                                                {{ $coa_account->code }} - {{ $coa_account->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('parent_id')
                                        <span class="invalid-feedback text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <!-- Group -->
                                <div class="form-group">
                                    <label for="group">Group</label>
                                    <select class="form-control @error('group') is-invalid @enderror" id="group" name="group" required>
                                        <option value="Asset" {{ old('group') == 1 ? 'selected' : '' }}>Asset</option>
                                        <option value="Liabilities" {{ old('group') == 2 ? 'selected' : '' }}>Liabilities</option>
                                        <option value="Capital" {{ old('group') == 3 ? 'selected' : '' }}>Capital</option>
                                        <option value="Revenue" {{ old('group') == 4 ? 'selected' : '' }}>Revenue</option>
                                        <option value="COGS" {{ old('group') == 5 ? 'selected' : '' }}>COGS</option>
                                        <option value="Expenses" {{ old('group') == 6 ? 'selected' : '' }}>Expenses</option>
                                        <option value="Other Revenue" {{ old('group') == 7 ? 'selected' : '' }}>Other Revenue</option>
                                        <option value="Other Expenses" {{ old('group') == 8 ? 'selected' : '' }}>Other Expenses</option>
                                    </select>
                                    @error('group')
                                        <span class="invalid-feedback text-danger">{{ $message }}</span>
                                    @enderror
                                </div>


                                <!-- Control -->
                                <div class="form-group">
                                    <div class="form-group">
                                        <label for="control">Control</label>
                                        <select name="control" id="control" class="form-control @error('control') is-invalid @enderror" required>
                                            <option value="None" {{ old('control') == 'None' ? 'selected' : '' }}>None</option>
                                            <option value="Cash/Bank" {{ old('control') == 'Cash/Bank' ? 'selected' : '' }}>Cash/Bank</option>
                                            <option value="Acc.Receivable" {{ old('control') == 'Acc.Receivable' ? 'selected' : '' }}>Acc.Receivable</option>
                                            <option value="Acc Payable" {{ old('control') == 'Acc Payable' ? 'selected' : '' }}>Acc Payable</option>
                                            <option value="Fixed Asset" {{ old('control') == 'Fixed Asset' ? 'selected' : '' }}>Fixed Asset</option>
                                        </select>
                                        @error('control')
                                            <span class="invalid-feedback text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    @error('control')
                                    <span class="invalid-feedback text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <!-- Currency -->
                                <div class="form-group">
                                    <label for="currency">Currency</label>
                                    <input type="text" class="form-control @error('currency') is-invalid @enderror" id="currency" name="currency" value="{{ old('currency', 'USD') }}" maxlength="3" required>
                                    @error('currency')
                                    <span class="invalid-feedback text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <!-- Department -->
                                <div class="form-group">
                                    <label for="department">Department</label>
                                    <input type="text" class="form-control @error('department') is-invalid @enderror" id="department" name="department" value="{{ old('department') }}" maxlength="50">
                                    @error('department')
                                    <span class="invalid-feedback text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <!-- Gain/Loss -->
                                <div class="form-group">
                                    <label for="gain_loss">Gain/Loss</label>
                                    <select class="form-control @error('gain_loss') is-invalid @enderror" id="gain_loss" name="gain_loss">
                                        <option value="">-- Select Gain/Loss --</option>
                                        <option value="gain" {{ old('gain_loss') == 'gain' ? 'selected' : '' }}>Gain</option>
                                        <option value="loss" {{ old('gain_loss') == 'loss' ? 'selected' : '' }}>Loss</option>
                                    </select>
                                    @error('gain_loss')
                                    <span class="invalid-feedback text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="text-right">
                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                    <a href="/coa" class="btn btn-secondary">Batal</a>
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
