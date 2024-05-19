<div>
    {{-- Close your eyes. Count to one. That is how long forever feels. --}}
    <div class="container">
      @if($message == 'belum_diterima')
        <div class="alert alert-success" role="alert">Akun anda sedang di verifikasi, harap tunggu dan bersabar</div>
      @endif
            <div class="card">
              <div class="card-body" wire:init='user'>
                <h2 class="mb-4">Profil</h2>
                <form class="row align-items-center">
                  <div class="col-auto"><span class="avatar avatar-xl" style="background-image: url(./static/avatars/000m.jpg)"></span>
                  </div>
                  <div class="col-auto"><a href="#" class="btn">
                      Change avatar
                    </a></div>
                  <div class="col-auto"><a href="#" class="btn btn-ghost-danger">
                      Delete avatar
                    </a></div>
                <h3 class="card-title mt-4">Data pribadi</h3>
                <div class="row g-3">
                  <div class="col-md">
                    <div class="form-label">Nama</div>
                    <input type="text" class="form-control"  disabled value="{{  $nama }}" ">
                  </div>
                  <div class="col-md">
                    <div class="form-label">Email</div>
                    <input type="text" class="form-control" disabled value="{{  $email }}" ">
                  </div>
                  <div class="col-md">
                    <div class="form-label">Nomor telepon</div>
                    <input type="text" class="form-control" disabled value="{{  $nomor_telepon }}" ">
                  </div>
                </div>
                <div class="mb-3">
                  <h3 class="card-title mt-4">Alamat</h3>
                  <textarea class="form-control"  id="" rows="3" disabled>{{  $alamat }}</textarea>
                </div>
                  </label>
                </div>
              </div>
            </div>
          </div>
</div>
