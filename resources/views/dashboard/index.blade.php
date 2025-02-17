@extends('layouts.dashboard.app')

@section('container')
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>{{ $title }}</h3>
            </div>
        </div>
    </div>
    
    <section id="content-types">
        <div class="card shadow">
            <div class="card-header">
                <h5 class="card-title">
                    Pengumuman
                </h5>
            </div>
            <div class="card-content">
                <div class="card-body">
                    <div class="row">
                        @foreach ($announcements as $anouncement)    
                            <div class="col-xl-4 col-md-6 col-sm-12">
                                <div class="card shadow">
                                    <div class="card-content">
                                        <div class="card-body">
                                            <h5 class="card-title">{{ $anouncement->title }}</h5>
                                            <p class="card-text">{{ $anouncement->description }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="card-footer d-flex justify-content-between">
                    <a href="{{ route('dashboard.announcement') }}" class="btn btn-primary">Lihat Semua</a>
                </div>
            </div>
        </div>
    </section>

    <section class="section">
        <div class="card shadow">
            <div class="card-header">
                <h5 class="card-title">
                    Panduan
                </h5>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table" id="table1">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Judul</th>
                                <th>Deskripsi</th>
                                <th>Berkas</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($guides as $guide)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $guide->title }}</td>
                                    <td>{{ $guide->description }}</td>
                                    <td>
                                        <a class="btn btn-primary" href="javascript:void(0);" target="_blank" rel="noopener noreferrer">
                                            <i class="fas fa-download"></i> Unduh
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>

    <section class="section">
        <div class="card shadow">
            <div class="card-header">
                <h5 class="card-title">
                    10 Dokter Terbaik
                </h5>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table" id="table3">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Dokter</th>
                                <th>Spesialis</th>
                                <th>No. HP</th>
                                <th>Email</th>
                                <th>Rating</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($doctors as $doctor)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $doctor->name }}</td>
                                    <td>{{ $doctor->specialization->name }}</td>
                                    <td>{{ $doctor->phone }}</td>
                                    <td>{{ $doctor->email }}</td>
                                    <td>{{ number_format($doctor->averageRating(), 1) }}</td>
                                    <td>
                                        <a href="#" class="btn btn-success">
                                            <i class="fas fa-book"></i> Buat Janji
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>

    <section class="section">
        <div class="card shadow">
            <div class="card-header">
                <h5 class="card-title">
                    Janji Temu Saya
                </h5>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table" id="table3">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Dokter</th>
                                <th>Tanggal</th>
                                <th>Status</th>
                                <th>Notes</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($appointments as $appointment)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $appointment->doctor->name }}</td>
                                    <td>{{ $appointment->appointment_date }}</td>
                                    <td>{{ $appointment->status }}</td>
                                    <td>{{ $appointment->notes ?? '-' }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="card-footer d-flex justify-content-between">
                <a href="{{ route('dashboard.appointment.index') }}" class="btn btn-primary">Lihat Semua</a>
            </div>
        </div>
    </section>
@endsection