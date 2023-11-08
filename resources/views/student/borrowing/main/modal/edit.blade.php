<div class="modal fade" id="editBorrowingModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5">Ubah Peminjaman</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="#" method="POST">
          @csrf
          @method('PUT')
          <div class="row">
            <div class="col-md-12 col-lg-6">
              <div class="alert alert-primary">
                Data di bawah adalah detail data mahasiswa.
              </div>
              <div class="row">
                <div class="col-md-12 col-lg-6">
                  <div class="mb-3">
                    <label class="form-label">Nomor Identitas Mahasiswa</label>
                    <input class="form-control" id="student_identification_number" disabled>
                  </div>
                </div>
                <div class="col-md-6 col-lg-6">
                  <div class="mb-3">
                    <label class="form-label">Program Studi</label>
                    <input class="form-control" id="program_study_name" disabled>
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-md-12 col-lg-12">
                  <div class="mb-3">
                    <label class="form-label">Nama Mahasiswa</label>
                    <input class="form-control" id="student_name" disabled>
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-md-12">
                  <div class="mb-3">
                    <label class="form-label">Nomor Handphone</label>
                    <div class="input-group">
                      <span class="d-block input-group-text"><i class="bi bi-clock-fill"></i></span>
                      <input class="form-control" id="student_phone_number" disabled>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-md-12 col-lg-6">
              <div class="alert alert-primary">
                Data di bawah adalah detail data peminjaman.
              </div>
              <div class="row">
                <div class="col-md-12 col-lg-6">
                  <div class="mb-3">
                    <label for="item_id" class="form-label">Nama Komoditas</label>
                    <select class="form-select" name="item_id" id="item_id">
                      <option selected>Pilih..</option>
                      @foreach ($itemsCanBorrowed as $item)
                      <option value="{{ $item->id }}">{{ $item->name }}</option>
                      @endforeach

                      @foreach ($itemsCannotBeBorrowed as $item)
                      <option value="{{ $item->id }}" disabled>{{ $item->name }} - Sedang dipinjam</option>
                      @endforeach
                    </select>
                  </div>
                </div>
                <div class="col-md-12 col-lg-6">
                  <div class="mb-3">
                    <label for="subject_id" class="form-label">Pada Mata Kuliah</label>
                    <select class="form-select" name="subject" id="subject_id">
                      <option selected>Pilih..</option>
                      @foreach ($subjects as $subejct)
                      <option value="{{ $subejct->id }}">{{ $subejct->name }}</option>
                      @endforeach
                    </select>
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-md-6 col-lg-6">
                  <div class="mb-3">
                    <label class="form-label">Jam Pinjam</label>
                    <div class="input-group">
                      <span class="d-block input-group-text"><i class="bi bi-clock-fill"></i></span>
                      <input type="time" step="any" class="form-control" name="time_start" id="time_start">
                    </div>
                  </div>
                </div>
                <div class="col-md-6 col-lg-6">
                  <div class="mb-3">
                    <label class="form-label">Jam Kembali</label>
                    <div class="input-group">
                      <span class="d-block input-group-text"><i class="bi bi-clock-fill"></i></span>
                      <input class="form-control" id="time_end" disabled>
                    </div>
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-md-12">
                  <div class="mb-3">
                    <label class="form-label">Status</label>
                    <input class="form-control" id="is_returned" disabled>
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-md-12">
                  <div class="mb-3">
                    <label for="note" class="form-label">Catatan</label>
                    <textarea class="form-control" name="note" id="note"></textarea>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary close-button" data-bs-dismiss="modal">Tutup</button>
            <button type="submit" class="btn btn-success">Ubah</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
