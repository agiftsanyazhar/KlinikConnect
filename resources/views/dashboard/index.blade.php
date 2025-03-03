@extends('layouts.dashboard.app')

@section('container')
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>{{ $title }}</h3>
            </div>
        </div>
    </div>
    
    <!-- Pengumuman Section -->
    <section id="content-types">
        <div class="card shadow">
            <div class="card-header">
                <h5 class="card-title">{{ __('Pengumuman') }}</h5>
            </div>
            <div class="card-content">
                <div class="card-body">
                    <div class="row">
                        @foreach ($announcements as $announcement)    
                            <div class="col-xl-4 col-md-6 col-sm-12">
                                <div class="card shadow">
                                    <div class="card-content">
                                        <div class="card-body">
                                            <h5 class="card-title">{{ $announcement->title }}</h5>
                                            <p class="card-text">{{ $announcement->description }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="card-footer d-flex justify-content-between">
                    <a href="{{ route('dashboard.announcement') }}" class="btn btn-primary">{{ __('Lihat Semua') }}</a>
                </div>
            </div>
        </div>
    </section>

    <!-- Panduan Section -->
    <section class="section">
        <div class="card shadow">
            <div class="card-header">
                <h5 class="card-title">{{ __('Panduan') }}</h5>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table" id="table1">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th style="min-width: 200px;">{{ __('Judul') }}</th>
                                <th style="min-width: 300px;">{{ __('Deskripsi') }}</th>
                                <th style="min-width: 100px;">{{ __('Berkas') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($guides as $guide)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $guide->title }}</td>
                                    <td>{{ $guide->description }}</td>
                                    <td>
                                        <a class="btn btn-primary" href="{{ asset('storage/' . $guide->file) }}" target="_blank" rel="noopener noreferrer">
                                            <i class="fas fa-download"></i> {{ __('Unduh') }}
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

    <!-- Dokter Terbaik Section -->
    <section class="section">
        <div class="card shadow">
            <div class="card-header">
                <h5 class="card-title">{{ __('10 Dokter Terbaik') }}</h5>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table" id="table2">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th style="min-width: 150px;">{{ __('Nama') }}</th>
                                <th style="min-width: 150px;">{{ __('Spesialis') }}</th>
                                <th style="min-width: 150px;">{{ __('No. HP') }}</th>
                                <th style="min-width: 150px;">{{ __('Email') }}</th>
                                <th style="min-width: 50px;">{{ __('Rating') }}</th>
                                <th style="min-width: 100px;">{{ __('Aksi') }}</th>
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
                                        <a href="{{ route('dashboard.doctor.schedule.index', $doctor->id) }}" class="btn btn-primary">
                                            <i class="fas fa-calendar-day"></i> {{ __('Lihat Jadwal') }}
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

    <!-- Janji Temu Saya Section -->
    <section class="section">
        <div class="card shadow">
            <div class="card-header">
                <h5 class="card-title">{{ __('Janji Temu Saya') }}</h5>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table" id="table3">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th style="min-width: 150px;">{{ __('Nama') }}</th>
                                <th style="min-width: 250px;">{{ __('Waktu') }}</th>
                                <th style="min-width: 100px;">{{ __('Status') }}</th>
                                <th style="min-width: 300px;">{{ __('Catatan') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($appointments as $appointment)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $appointment->doctor->name }}</td>
                                    <td>{{ date('d-m-Y', strtotime($appointment->start_time)) }}, {{ date('H:i', strtotime($appointment->start_time)) }} - {{ date('H:i', strtotime($appointment->end_time)) }}</td>
                                    <td>
                                        <span class="badge rounded-pill 
                                        {{ $appointment->status == 'Pending' ? 'bg-warning' : ($appointment->status == 'Canceled' ? 'bg-danger' : 'bg-success') }}">
                                            {{ $appointment->status }}
                                        </span>
                                    </td>   
                                    <td>{{ $appointment->notes ?? '-' }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="card-footer d-flex justify-content-between">
                <a href="{{ route('dashboard.appointment.index') }}" class="btn btn-primary">{{ __('Lihat Semua') }}</a>
            </div>
        </div>
    </section>
@endsection
