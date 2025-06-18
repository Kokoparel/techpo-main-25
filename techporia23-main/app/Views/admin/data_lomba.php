<?= $this->extend('admin/layout/layout_v2'); ?>

<?= $this->section('content') ?>

<!-- Page Heading -->
<div class="mb-4">
    <h1 class="h3 mb-0 text-gray-800">Data Pendaftar Lomba</h1>
</div>

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Data Pendaftar Lomba</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="tableLomba" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>ID Tim</th>
                        <th>Nama TIm</th>
                        <th>Kompetisi</th>
                        <th>Status Pembayaran</th>
                        <th>Status Berkas</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($dataTim as $tim): ?>
                        <tr>
                            <td><?= $tim['tim_id']; ?></td>
                            <td><?= $tim['nama_tim']; ?></td>
                            <td><?= $tim['nama_kompetisi']; ?></td>
                            <td><?= $tim['transaction_status']; ?></td>
                            <td><?= $tim['status']; ?></td>
                            <td>
                                <a href="<?= base_url('admin/detail-tim/'.$tim['tim_id']); ?>" class="btn btn-primary">Lihat Detail</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?= $this->endSection() ?>