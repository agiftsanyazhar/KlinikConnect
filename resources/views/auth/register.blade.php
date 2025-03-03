@extends('layouts.auth.app')

@section('container')
  <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-6 col-md-6 d-flex flex-column align-items-center justify-content-center">

          <div class="card mb-3">

            <div class="card-body">

              <div class="pt-2 pb-2">
                <h5 class="card-title text-center pb-0 fs-4">{{ $title }}</h5>
              </div>

              @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                  {{ session('success') }}
                  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
              @endif

              @if (session('error') || $errors->any())
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                  {{ session('error') ?? $errors->first() }}
                  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
              @endif

              <form class="row g-3" action="{{ route('register') }}" method="POST">
                @csrf
                <div class="col-12">
                  <label class="form-label fw-bold">Nama Lengkap<span class="text-danger">*</span></label>
                  <input type="hidden" name="role_id" value="3" required>
                  <input type="text" name="name" class="form-control" required>
                </div>

                <div class="col-6">
                  <label class="form-label fw-bold">Jenis Kelamin<span class="text-danger">*</span></label>
                  <select name="gender" class="form-select" required>
                    <option value="" disabled selected hidden>Pilih Jenis Kelamin</option>
                    <option value="Pria">Pria</option>
                    <option value="Wanita">Wanita</option>
                  </select>
                </div>

                <div class="col-6">
                  <label class="form-label fw-bold">Tanggal Lahir<span class="text-danger">*</span></label>
                  <input type="date" name="date_of_birth" class="form-control" required>
                </div>

                <div class="col-12">
                  <label class="form-label fw-bold">No. HP<span class="text-danger">*</span></label>
                  <input type="text" name="phone" class="form-control" required>
                </div>

                <div class="col-12">
                  <label class="form-label fw-bold">Alamat<span class="text-danger">*</span></label>
                  <input type="text" name="address" class="form-control" required>
                </div>

                <div class="col-12">
                  <label class="form-label fw-bold">Email<span class="text-danger">*</span></label>
                  <input type="email" name="email" class="form-control" required>
                </div>

                <div class="col-12">
                  <label class="form-label fw-bold">Kata Sandi<span class="text-danger">*</span></label>
                  <input type="password" name="password" class="form-control" required>
                </div>

                <span class="text-danger fw-bold">* Wajib diisi</span>
                <div class="col-12">
                  <button class="btn btn-primary w-100" type="submit" onclick="saveForm()">Register</button>
                </div>

                <div class="col-12">
                    <p class="small mb-0">Sudah punya akun? <a href="{{ route('auth', ['login' => 'true']) }}">Login</a></p>
                </div>
              </form>

            </div>
          </div>

        </div>
      </div>
    </div>
  </section>

  <script>
    //  Validasi
    function saveForm() {
      const requiredInputs = [
        { name: 'email', label: 'Email' },
        { name: 'password', label: 'Password' },
      ];

      let hasErrors = false;

      requiredInputs.forEach(input => {
        const inputField = document.querySelector(`input[name="${input.name}"]`);
        if (inputField.value.trim() === '') {
          alertDialog(input.name, input.label);
          hasErrors = true;
        }
      });

      if (!hasErrors) {
        document.getElementById('form-modal').submit();
      }
    }
  </script>

@endsection
