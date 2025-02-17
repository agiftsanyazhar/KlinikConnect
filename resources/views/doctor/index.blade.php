@extends('layouts.dashboard.app')

@section('container')
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>{{ $title }}</h3>
            </div>
        </div>
    </div>

    <section class="section">
        <div class="card shadow">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table" id="table1">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th style="min-width: 150px;">{{ __('Nama') }}</th>
                                <th style="min-width: 150px;">{{ __('Spesialis') }}</th>
                                <th style="min-width: 150px;">{{ __('No. HP') }}</th>
                                <th style="min-width: 150px;">{{ __('Email') }}</th>
                                <th style="min-width: 50px;">{{ __('Rating') }}</th>
                                <th style="min-width: 150px;">{{ __('Aksi') }}</th>
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
                                            <i class="fas fa-calendar-day"></i> Lihat Jadwal
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
@endsection
