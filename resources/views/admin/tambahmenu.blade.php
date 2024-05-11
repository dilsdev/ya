<div>
   <form wire:submit="store" enctype="multipart/form-data">
                            <div class="mb-3">
                                <label for="nama" class="form-label">Nama</label>
                                <input type="text" class="form-control" name="nama" id="nama"
                                    aria-describedby="nama" placeholder="Nama" wire:model="nama" />
                                <small id="nama" class="form-text text-muted">Masukkan nama</small>
                            </div>

                            <div class="mb-3">
                                <label for="deskripsi" class="form-label">Deskripsi</label>
                                <input type="text" class="form-control" name="deskripsi" id="deskripsi"
                                    aria-describedby="deskripsi" placeholder="Deskripsi" wire:model="deskripsi" />
                                <small id="deskripsi" class="form-text text-muted">Masukkan deskripsi</small>
                            </div>

                            <div class="mb-3">
                                <label for="harga" class="form-label">Harga</label>
                                <input type="number" class="form-control" name="harga" id="harga"
                                    aria-describedby="harga" placeholder="Harga" wire:model="harga" />
                                <small id="harga" class="form-text text-muted">Masukkan harga</small>
                            </div>

                            <div class="mb-3">
                                <label for="image" class="form-label">Image</label>
                                <input type="file" class="form-control" name="image" id="image"
                                    aria-describedby="image" placeholder="Image" wire:model="image" />
                                <small id="image" class="form-text text-muted">Upload image</small>
                            </div>

                            <div class="mb-3">
                                <label for="status" class="form-label">Status</label>
                                <select class="form-select" name="status" id="status" wire:model.live="status">
                                    <option value="ready">Ready</option>
                                    <option value="notready">Not Ready</option>
                                </select>
                                <small id="status" class="form-text text-muted">Pilih status</small>
                            </div>

                            <div class="mb-3">
                                <label for="jenis" class="form-label">Jenis</label>
                                <select class="form-select" name="jenis" id="jenis" wire:model.live="jenis">
                                    <option value="makanan">Makanan</option>
                                    <option value="minuman">Minuman</option>
                                </select>
                                <small id="jenis" class="form-text text-muted">Pilih jenis</small>
                            </div>
                            <div class="modal-footer">
                                <a href="{{ route('admin.menu') }}" class="btn btn-link link-secondary" >
                                    Cancel
                                </a>
                                <button type="submit" class="btn btn-primary">Oke</button>
                            </div>
                        </form>
</div>
