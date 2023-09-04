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

if (session()->getFlashData('error')) {
?>
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <?= session()->getFlashData('error') ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<?php
}
?>

<div class="row">
    <?php foreach ($produks as $index => $produk) : ?>
        <div class="col-lg-6">
            <?= form_open('keranjang') ?>
            <?php
            echo form_hidden('id', $produk['id']);
            echo form_hidden('nama', $produk['nama']);
            echo form_hidden('hrg', $produk['harga']);
            echo form_hidden('jumlah', $produk['jumlah']);
            echo form_hidden('foto', $produk['foto']);
            ?>
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-6">
                            <img src="<?php echo base_url() . "public/img/" . $produk['foto'] ?>" alt="..." width="100%" height="400px">
                        </div>
                        <div class="col-lg-6">
                            <h5 class="card-title"><?php echo $produk['nama'] ?><br><?php echo number_to_currency($produk['harga'], 'IDR') ?></h5>
                            <h6><strong>Stok : <?php echo $produk['jumlah'] ?></strong></h6>
                            <?php if ($produk['jumlah'] > 0) : ?>
                                <button type="submit" class="btn btn-info rounded-pill w-50">Beli</button>
                            <?php else : ?>
                                <button type="button" class="btn btn-secondary rounded-pill w-50" disabled>Stok Habis</button>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
            <?= form_close() ?>
        </div>
    <?php endforeach ?>
</div>
<?= $this->endSection() ?>
