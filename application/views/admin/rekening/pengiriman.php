<button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#delete-<?php echo $header_transaksi->kode_transaksi; ?>">
        <i class="fa fa-trash-o"></i>Status Pengiriman
</button>
<div class="modal fade" id="delete-<?php echo $header_transaksi->kode_transaksi; ?>">
    <div class="modal-dialog">
    <div class="modal-content">
    <div class="modal-header">
        <h4 class="modal-title">Status Pengiriman Barang</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <form method="post" action="<?php echo base_url('admin/rekening/pengiriman/').$header_transaksi->kode_transaksi ?>">
    <div class="modal-body">
        <div class="callout callout-warning">
        <h4>Perbarui status pengiriman: </h4>
          <select name="pengiriman" class="form-control">
              <option value="Diporses">Diproses</option>
              <option value="Dikirim">Dikirim</option>
              <option value="Diterima">Diterima</option>
          </select>  
        </div>
    </div>
    <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-danger " name="submit">
        <i class="fa fa-check"></i> Perbarui pengiriman </button>
</form>
    </div>
    </div>
    <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->