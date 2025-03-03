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
            <div class="card-content">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <tbody>
                                <tr>
                                    <th>Nama</th>
                                    <td>{{ $doctor->name }}</td>
                                </tr>
                                <tr>
                                    <th>Spesialis</th>
                                    <td>{{ $doctor->specialization->name }}</td>
                                </tr>
                                <tr>
                                    <th>No. HP</th>
                                    <td>{{ $doctor->phone }}</td>
                                </tr>
                                <tr>
                                    <th>Email</th>
                                    <td>{{ $doctor->email }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="section">
        <div class="card shadow">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table" id="table1">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th style="min-width: 100px;">Hari</th>
                                <th style="min-width: 100px;">Jam Kerja</th>
                                <th style="min-width: 100px;">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($schedules as $schedule)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $schedule->day }}</td>
                                    <td>{{ date('H:i', strtotime($schedule->start_time)) }} - {{ date('H:i', strtotime($schedule->end_time)) }}</td>
                                    <td>
                                        <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#modal-form"
                                            onclick="openFormDialog('modal-form', 'add')">
                                            <i class="fas fa-book"></i> Buat Janji
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>

    <!-- Modal -->
    <div class="modal fade text-left" id="modal-form" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-scrollable" role="document">
            <div class="modal-content rounded shadow">
                <div class="modal-header">
                    <h5 class="modal-title">{{ $title }}</h5>
                    <button type="button" class="close rounded-pill" data-bs-dismiss="modal" aria-label="Close">
                        <i data-feather="x"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <form class="form" id="form-modal" action="{{ route('dashboard.doctor.schedule.store') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-md-6 col-6">
                                <div class="form-group">
                                    <label>Waktu Mulai<span class="text-danger fw-bold">*</span></label>
                                    <input type="hidden" class="form-control clear-after" name="id">
                                    <input type="hidden" name="doctor_id" value="{{ $doctor->id }}">
                                    <input type="hidden" name="patient_id" value="{{ Auth::user()->patient->first()->id }}">
                                    <input type="datetime-local" class="form-control" name="start_time" required min="{{ now()->format('Y-m-d\TH:i') }}">
                                </div>
                            </div>
                            <div class="col-md-6 col-6">
                                <div class="form-group">
                                    <label>Waktu Selesai<span class="text-danger fw-bold">*</span></label>
                                    <input type="datetime-local" class="form-control" name="end_time" required min="{{ now()->format('Y-m-d\TH:i') }}">
                                </div>
                            </div>
                            <div class="col-md-12 col-12">
                                <div class="form-group">
                                    <label>Catatan</label>
                                    <textarea class="form-control" name="notes" rows="4"></textarea>
                                </div>
                            </div>
                            <span class="text-danger fw-bold">* Wajib diisi</span>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                        <i class="bx bx-x d-block d-sm-none"></i>
                        <span class="d-none d-sm-block">Batal</span>
                    </button>
                    <button type="submit" class="btn btn-primary ms-1" onclick="saveForm()">
                        <i class="bx bx-check d-block d-sm-none"></i>
                        <span class="d-none d-sm-block">Simpan</span>
                    </button>
                </div>
            </div>
        </div>
    </div>

    <script>
        function saveForm() {
            const time = [document.querySelector('input[name="start_time"]').value, document.querySelector('input[name="end_time"]').value];
            
            if (!time[0] || !time[1]) {
                alertDialog('start_time', 'Waktu');
                return;
            }

            document.getElementById('form-modal').submit();
        }
    </script>

    <script>
        function openFormDialog(target, type) {
            if (type === 'add') {
                $('#' + target + ' form').attr('action', '{{ route('dashboard.doctor.schedule.store') }}');
                $('#' + target + ' .form-control').val('');
                $('#' + target + ' input[name="doctor_id"]');
                $('#' + target + ' input[name="patient_id"]');
                $('#' + target + ' input[name="start_time"]').attr('required', 'required');
                $('#' + target + ' input[name="end_time"]').attr('required', 'required');
                $('#' + target + ' textarea[name="notes"]');

            }
            $('#' + target).modal('toggle');
            $('#' + target).attr('data-operation-type', type);
        }
    </script>
@endsection
