<div>
    {{-- Close your eyes. Count to one. That is how long forever feels. --}}
    <div class="container">
      
      @if($message == 'belum_diterima')
        <div class="alert alert-success" role="alert">Akun anda sedang di verifikasi, harap tunggu dan bersabar</div>
      @endif
            <div class="card">
              <div class="card-body">
                <h2 class="mb-4">Profil</h2>
                <div class="row g-3">
                  <div class="col-md">
                    <div class="form-label">Nama</div>
                    <input type="text" class="form-control" value="{{  $nama }}">
                  </div>
                  <div class="col-md">
                    <div class="form-label">Email</div>
                    <input type="text" class="form-control" value="{{  $email }}">
                  </div>
                  <div class="col-md">
                    <div class="form-label">Nomor telepon</div>
                    <input type="text" class="form-control" value="{{  $nomor_telepon }}">
                  </div>
                </div>
                <div class="mb-3">
                  <h3 class="card-title mt-4">Alamat</h3>
                  <label for="" class="form-label"></label>
                  <textarea class="form-control" name="" id="" rows="3">{{ $alamat }}</textarea>
                </div>
                  </label>
                </div>
              </div>
            </div>
          </div>
</div>
