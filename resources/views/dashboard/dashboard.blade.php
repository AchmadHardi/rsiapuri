@extends('template.main')

@section('title', 'Dashboard')

@section('content')
<div class="content-wrapper">
    <div class="content-header">
        <h1>Dashboard</h1><br>
        <p>Selamat datang di Dashboard. Berikut adalah ringkasan aktivitas dan informasi PT Murinda:</p>
    </div>

    <div class="content">
        <div class="container-fluid">
            <!-- Company Information -->
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Informasi Perusahaan</h3>
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered">
                                <tbody>
                                    <tr>
                                        <th>Nama Perusahaan</th>
                                        <td>Murinda</td>
                                    </tr>
                                    <tr>
                                        <th>Tagline</th>
                                        <td>Health , safety, & environment policy</td>
                                    </tr>
                                    <tr>
                                        <th>Alamat</th>
                                        <td>Jl. Kuningan Barat No. 123, Jakarta Selatan, Indonesia</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Statistik dan data lainnya -->
        </div>
    </div>
</div>
@endsection
