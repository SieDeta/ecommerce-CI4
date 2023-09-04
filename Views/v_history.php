<?= $this->extend('components/layout') ?>
<?= $this->section('content') ?>
<?php
if (session()->getFlashData('success')) {
?>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <?= session()->getFlashData('success') ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<?php
}
?>
<!-- Table with stripped rows -->
<table class="table datatable">
    <h4>Data Transaksi</h4>
<thead>
            <tr>
                <th>ID Transaksi</th>
                <th>Username</th>
                <th>Total Harga</th>
                <th>Alamat</th>
                <th>Ongkir</th>
                <th>Status</th>
                <th>Created By</th>
                <th>Created Date</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($transaksis as $transaksi) : ?>
                <tr>
                    <td><?= $transaksi['id'] ?></td>
                    <td><?= $transaksi['username'] ?></td>
                    <td><?= $transaksi['total_harga'] ?></td>
                    <td><?= $transaksi['alamat'] ?></td>
                    <td><?= $transaksi['ongkir'] ?></td>
                    <td>
                    <?php
                    if ($transaksi['status'] == 0) {
                        echo "Belum Selesai";
                    } elseif ($transaksi['status'] == 1) {
                        echo "Sudah Selesai";
                    }
                    ?>
                    </td>
                    <td><?= $transaksi['created_by'] ?></td>
                    <td><?= $transaksi['created_date'] ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <br>
    <br>
    
    <h4>Detail Transaksi</h4>
    <table class="table datatable">
        <thead>
            <tr>
                <th>ID Transaksi</th>
                <th>ID Barang</th>
                <th>Jumlah</th>
                <th>Subtotal Harga</th>
                <th>Created By</th>
                <th>Created Date</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($transaksiDetails as $transaksiDetail) : ?>
                <tr>
                    <td><?= $transaksiDetail['id_transaksi'] ?></td>
                    <td><?= $transaksiDetail['id_barang'] ?></td>
                    <td><?= $transaksiDetail['jumlah'] ?></td>
                    <td><?= $transaksiDetail['subtotal_harga'] ?></td>
                    <td><?= $transaksiDetail['created_by'] ?></td>
                    <td><?= $transaksiDetail['created_date'] ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
<?= $this->endSection() ?>
