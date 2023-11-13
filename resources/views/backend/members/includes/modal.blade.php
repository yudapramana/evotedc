<!-- Modal-->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form method="post" action="{{ route('members.import') }}" enctype="multipart/form-data">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Import Excel</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <i aria-hidden="true" class="ki ki-close"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>* Unggah Excel</label>
                        <div></div>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" name="file" id="customFile" accept=".csv, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel" required>
                            <label class="custom-file-label" for="customFile">Pilih file</label>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary font-weight-bold" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-brand font-weight-bold">Simpan</button>
                </div>
            </div>
        </form>
    </div>
</div>
