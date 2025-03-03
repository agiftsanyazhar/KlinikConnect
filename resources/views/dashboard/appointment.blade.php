@extends('layouts.dashboard.app')

@section('container')
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>{{ $title }}</h3>
            </div>
        </div>
    </div>

    <!-- Janji Temu Saya Section -->
    <section class="section">
        <div class="card shadow">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table" id="table1">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th style="min-width: 150px;">{{ __('Nama') }}</th>
                                <th style="min-width: 250px;">{{ __('Waktu') }}</th>
                                <th style="min-width: 100px;">{{ __('Status') }}</th>
                                <th style="min-width: 300px;">{{ __('Catatan') }}</th>
                                <th style="min-width: 250px;">{{ __('Aksi') }}</th>
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
                                    <td>
                                        @if ($appointment->status == "Pending")
                                            <form action="{{ route('dashboard.doctor.schedule.update-status', $appointment->id) }}" method="POST" style="display:inline;">
                                                @csrf
                                                @method('POST')
                                                <button type="submit" class="btn btn-success" title="Complete" name="status" value="Completed">
                                                    <i class="fas fa-check"></i> Complete
                                                </button>
                                                <button type="submit" class="btn btn-danger" title="Cancel" name="status" value="Canceled">
                                                    <i class="fas fa-times"></i> Cancel
                                                </button>
                                            </form>
                                        @else
                                            
                                        @endif
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
