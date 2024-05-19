<div class="container">
    @if ($message == 'belum_diterima')
        <div class="alert alert-success" role="alert">Akun anda sedang di verifikasi, harap tunggu dan bersabar</div>
    @elseif ($message == 'di_terima')
        <div class="alert alert-success" role="alert">Selamat akun anda sudah di verifikasi</div>
    @else
        <div class="card">
            <div class="card-body">
                <form wire:submit.prevent="kirim" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label class="form-label">Nama Lengkap</label>
                        <input required type="text" class="form-control" wire:model="nama_lengkap"
                            placeholder="Nama lengkap" />
                        @error('nama_lengkap')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Nisn</label>
                        <input required type="number" class="form-control" wire:model="nisn" placeholder="Nisn" />
                        @error('nisn')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Tanggal lahir</label>
                        <input required type="date" class="form-control" wire:model="tanggal_lahir"
                            placeholder="Tanggal lahir" />
                        @error('tanggal_lahir')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Jurusan</label>
                        <input required type="text" class="form-control" wire:model="jurusan"
                            placeholder="Jurusan" />
                        @error('jurusan')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Alamat</label>
                        <input required type="text" class="form-control" wire:model="alamat" placeholder="Alamat" />
                        @error('alamat')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="kelas" class="form-label">Kelas</label>
                        <select required class="form-select form-select-xl" name="kelas" id="kelas"
                            wire:model="kelas">
                            <option value="">Pilih kelas</option>
                            <option value="10">10</option>
                            <option value="11">11</option>
                            <option value="12">12</option>
                        </select>
                        @error('kelas')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="image_kp" class="form-label">Kartu Pelajar</label>
                        <input required type="file" class="form-control" name="image_kp" id="image_kp"
                            wire:model="image_kp" aria-describedby="fileHelpId" />
                        @error('image_kp')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                        <div id="fileHelpId" class="form-text">
                            Untuk menghindari order palsu kamu memerlukan kartu pelajar
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Kirim permintaan</button>
                    </div>
                </form>
            </div>
        </div>
    @endif
</div>
