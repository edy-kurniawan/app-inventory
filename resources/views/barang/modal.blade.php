<!-- Modal -->
<div class="modal fade" id="modal-form">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
            </div>
            <form id="form">
                <div class="modal-body">
                    <input type="hidden" name="id">
                    <div class="form-row">
                        <div class="col-md-12 mb-3">
                            <label>Nama</label>
                            <textarea class="form-control" name="nama" placeholder="Masukan Nama Barang"></textarea>
                            <span class="text-danger">
                                <strong id="nama"></strong>
                            </span>
                        </div>
                        <div class="col-md-12 col-12 mb-3">
                            <label>Satuan</label>
                            <input type="text" class="form-control" name="satuan" placeholder="Masukan Satuan"
                                required>
                            <span class="text-danger">
                                <strong id="satuan"></strong>
                            </span>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label>Jumlah Barang Masuk</label>
                            <div class="input-group mb-3">
                                <input type="number" class="form-control" name="pemasukan" placeholder="Masukan Jumlah "
                                    required>
                            </div>
                            <span class="text-danger">
                                <strong id="pemasukan"></strong>
                            </span>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label>Jumlah Barang Keluar</label>
                            <div class="input-group mb-3">
                                <input type="number" class="form-control" name="pengeluaran" placeholder="Masukan Jumlah"
                                    required>
                            </div>
                            <span class="text-danger">
                                <strong id="pengeluaran"></strong>
                            </span>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" onclick="save()" class="btn btn-primary">Bayar</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- basic modal end -->