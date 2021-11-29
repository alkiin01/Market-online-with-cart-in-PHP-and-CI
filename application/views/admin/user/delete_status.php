<button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#delete-<?php echo $status->id_status; ?>">
        <i class="fa fa-trash-o"></i>Hapus
</button>

<div class="modal fade" id="delete-<?php echo $status->id_status; ?>">
    <div class="modal-dialog">
    <div class="modal-content">
    <div class="modal-header">
        <h4 class="modal-title">HAPUS DATA STATUS</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="modal-body">
        <div class="callout callout-warning">
        <h4>Peringatan </h4>
        Yakin ingin menghapus data ini ? Data yang sudah dihapus tidak dapat dikembalikan.
        </div>
    </div>
    <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>
        <a href="<?php echo base_url('admin/user/delete_status/'.$status->id_status) ?>" class="btn btn-danger">
        <i class="fa fa-trash-o"></i>Ya, Hapus data ini </a>
    </div>
    </div>
    <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->