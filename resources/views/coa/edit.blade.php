@extends('template.main')
@section('title', 'Edit COA')
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
                            <h3 class="card-title">Edit COA</h3>
                            <div class="text-right">
                                <a href="/coa" class="btn btn-warning btn-sm">
                                    <i class="fa-solid fa-arrow-rotate-left"></i> Back
                                </a>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <form action="/coa/{{ $coa->id }}" method="POST">
                                @csrf
                                @method('PUT')

                                <div class="form-group">
                                    <label for="code">Code</label>
                                    <input type="text" class="form-control @error('code') is-invalid @enderror" id="code" name="code" value="{{ old('code', $coa->code) }}" required maxlength="50">
                                    @error('code')
                                        <span class="invalid-feedback text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name', $coa->name) }}" required maxlength="100">
                                    @error('name')
                                        <span class="invalid-feedback text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="type">Type</label>
                                    <select name="type" id="type" class="form-control @error('type') is-invalid @enderror" required>
                                        <option value="General" {{ old('type') == 'General' ? 'selected' : '' }}>General</option>
                                        <option value="Detil" {{ old('type') == 'Detil' ? 'selected' : '' }}>Detil</option>
                                    </select>
                                    @error('type')
                                        <span class="invalid-feedback text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="level">Level</label>
                                    <select class="form-control @error('level') is-invalid @enderror" id="level" name="level" required>
                                        <option value="">-- Pilih Level --</option>
                                        @for ($i = 1; $i <= 9; $i++)
                                            <option value="{{ $i }}" {{ old('level', $coa->level) == $i ? 'selected' : '' }}>
                                                Level {{ $i }}
                                            </option>
                                        @endfor
                                    </select>
                                    @error('level')
                                        <span class="invalid-feedback text-danger">{{ $message }}</span>
                                    @enderror
                                </div>


                                <div class="form-group">
                                    <label for="parent_id">Parent Account</label>
                                    <select name="parent_id" id="parent_id" class="form-control @error('parent_id') is-invalid @enderror">
                                        <option value="">Select Parent Account</option>
                                        @foreach ($allCoa as $parent)
                                            <option value="{{ $parent->id }}" {{ old('parent_id', $coa->parent_id) == $parent->id ? 'selected' : '' }}>{{ $parent->code }} - {{ $parent->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('parent_id')
                                        <span class="invalid-feedback text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="group">Group</label>
                                    <select class="form-control @error('group') is-invalid @enderror" id="group" name="group" required>
                                        <option value="Asset" {{ (old('group', $coa->group) == 1) ? 'selected' : '' }}>Asset</option>
                                        <option value="Liabilities" {{ (old('group', $coa->group) == 2) ? 'selected' : '' }}>Liabilities</option>
                                        <option value="Capital" {{ (old('group', $coa->group) == 3) ? 'selected' : '' }}>Capital</option>
                                        <option value="Revenue" {{ (old('group', $coa->group) == 4) ? 'selected' : '' }}>Revenue</option>
                                        <option value="COGS" {{ (old('group', $coa->group) == 5) ? 'selected' : '' }}>COGS</option>
                                        <option value="Expenses" {{ (old('group', $coa->group) == 6) ? 'selected' : '' }}>Expenses</option>
                                        <option value="Other Revenue" {{ (old('group', $coa->group) == 7) ? 'selected' : '' }}>Other Revenue</option>
                                        <option value="Other Expenses" {{ (old('group', $coa->group) == 8) ? 'selected' : '' }}>Other Expenses</option>
                                    </select>
                                    @error('group')
                                        <span class="invalid-feedback text-danger">{{ $message }}</span>
                                    @enderror
                                </div>


                                <div class="form-group">
                                    <label for="control">Control</label>
                                    <select name="control" id="control" class="form-control @error('control') is-invalid @enderror" required>
                                        <option value="None" {{ old('control', $coa->control) == 'active' ? 'selected' : '' }}>None</option>
                                        <option value="Cash/Bank" {{ old('control', $coa->control) == 'inactive' ? 'selected' : '' }}>Cash/Bank</option>
                                        <option value="Acc.Receivable" {{ old('control', $coa->control) == 'inactive' ? 'selected' : '' }}>Acc.Receivable</option>
                                        <option value="Acc Payable" {{ old('control', $coa->control) == 'inactive' ? 'selected' : '' }}>Acc Payable</option>
                                        <option value="Fixed Asset" {{ old('control', $coa->control) == 'inactive' ? 'selected' : '' }}>Fixed Asset</option>
                                    </select>
                                    @error('control')
                                        <span class="invalid-feedback text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="currency">Currency</label>
                                    <input type="text" class="form-control @error('currency') is-invalid @enderror" id="currency" name="currency" value="{{ old('currency', $coa->currency) }}" required maxlength="3">
                                    @error('currency')
                                        <span class="invalid-feedback text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="department">Department</label>
                                    <input type="text" class="form-control @error('department') is-invalid @enderror" id="department" name="department" value="{{ old('department', $coa->department) }}">
                                    @error('department')
                                        <span class="invalid-feedback text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="gain_loss">Gain/Loss</label>
                                    <select name="gain_loss" id="gain_loss" class="form-control @error('gain_loss') is-invalid @enderror">
                                        <option value="">Select Gain/Loss</option>
                                        <option value="gain" {{ old('gain_loss', $coa->gain_loss) == 'gain' ? 'selected' : '' }}>Gain</option>
                                        <option value="loss" {{ old('gain_loss', $coa->gain_loss) == 'loss' ? 'selected' : '' }}>Loss</option>
                                    </select>
                                    @error('gain_loss')
                                        <span class="invalid-feedback text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="text-right">
                                    <button type="submit" class="btn btn-success">Save Changes</button>
                                    <a href="/coa" class="btn btn-secondary">Cancel</a>
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
