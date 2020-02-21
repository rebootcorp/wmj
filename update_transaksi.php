<!DOCTYPE html>
<html lang="en">
<head>
    <?php $this->load->view('__partials/head'); ?>
</head>
<body>
    <?php $this->load->view('__partials/navbar'); ?>

    <section id="update_transaksi">
        <div class="container">
        <div class="row">
            <div class="col-md-12">
            <h1 class="text-center">Edit Stock</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
            <form action="" method="post" id="form-transaksi">

                <input type="hidden" name="id" value="<?= $transaksi->id_transaksi?>" />

                <div class="form-group">
                <label for="tanggal">Tanggal</label>
                <input type="date" class="form-control form-control-sm" name="tanggal" readonly value="<?= $transaksi->tanggal ?>">
                </div>
                <div class="form-group">
                <label for="wilayah">Wilayah</label>
                <select name="wilayah" class="form-control form-control-sm">
                    <option value="<?= $transaksi->id_wilayah ?>"><?= $transaksi->wilayah ?></option>
                    <?php foreach ($wilayah as $wil) : ?>
                    <option value="<?= $wil->id_wilayah ?>"><?= $wil->wilayah ?></option>
                    <?php endforeach; ?>
                </select>
                </div>
                <div class="form-group">
                <label for="kota">Kota</label>
                <input type="text" class="form-control form-control-sm" name="kota" value="<?= $transaksi->kota ?>">
                </div>
                <div class="form-group">
                <label for="jns-barang">Jenis Barang</label>
                <select name="jns_barang" class="form-control form-control-sm">
                    <option value="<?= $transaksi->id_jns_barang ?>"><?= $transaksi->jenis_barang ?></option>
                    <?php foreach ($jenis_barang as $jns) : ?>
                    <option value="<?= $jns->id_jenis_barang ?>"><?= $jns->jenis_barang ?></option>
                    <?php endforeach; ?>
                </select>
                </div>
                <div class="form-group">
                <label for="resi">Resi</label>
                <input type="text" class="form-control form-control-sm" name="resi" value="<?= $transaksi->resi ?>">
                </div>
                <div class="form-group">
                <label for="dm-operan">DM Operan</label>
                <input type="text" class="form-control form-control-sm" name="dm-operan" value="<?= $transaksi->dm_operan ?>">
                </div>
                <div class="form-group">
                <label for="pengirim">Pengirim</label>
                <input type="text" class="form-control form-control-sm" name="pengirim" value="<?= $transaksi->pengirim ?>">
                </div>
                <div class="form-group">
                <label for="penerima">Penerima</label>
                <input type="text" class="form-control form-control-sm" name="penerima" value="<?= $transaksi->penerima ?>">
                </div>
                <div class="form-group">
                <label for="jns-pembayaran">Jenis Pembayaran</label>
                <select name="pembayaran" class="form-control form-control-sm">
                    <option value="<?= $transaksi->id_jns_pembayaran ?>"><?= $transaksi->pembayaran ?></option>
                    <?php foreach ($pembayaran as $bayar) : ?>
                    <option value="<?= $bayar->id_pembayaran ?>"><?= $bayar->pembayaran ?></option>
                    <?php endforeach; ?>
                </select>
                </div>
            </div>
            <div class="col-md-8">
            <div class="row">
                <div class="col-sm-12">
                    <a href="#" data-toggle="modal" data-target="#tambah-barang" class="btn btn-primary">Tambah Barang</a>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-sm-12">
                <table class="table table-striped table-bordered table-hover" id="barang">
                    <thead class="table-info">
                    <tr>
                        <th>Jumlah Coli</th>
                        <th>Nama Barang</th>
                        <th>Berat</th>
                        <th>Ongkos</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($barang as $bar) : ?>
                    <tr>
                        <td><?= $bar->jml_coli ?></td>
                        <td><?= $bar->nama_barang ?></td>
                        <td><?= $bar->berat ?></td>
                        <td><?= $bar->ongkos ?></td>
                        <td>
                            <a href="#" data-target="#edit-barang" data-toggle="modal" class="btn btn-outline-info btn-block btn-sm edit-barang">Edit</a>
                            <a href="#" onclick="hapus_barang(<?= $bar->id_barang ?>)" class="btn btn-outline-danger btn-block btn-sm hapus-barang">Hapus</a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                <section>
                    <div class="container">
                    <div class="row">
                        <div class="col-sm-6 offset-md-6">
                            <div class="form-group">
                            <label for="jumlah">Jumlah</label>
                            <input type="text" class="form-control form-control-sm" name="jumlah" id="jumlah" readonly>
                            </div>
                            <div class="form-group">
                            <label for="ekstra">Ekstra</label>
                            <input type="text" class="form-control form-control-sm" name="ekstra" value="<?= $transaksi->ekstra ?>">
                            </div>
                            <div class="form-group">
                            <label for="biaya_ekstra">Biaya Ekstra</label>
                            <input type="text" class="form-control form-control-sm" name="biaya_ekstra" value="<?= $transaksi->biaya_ekstra ?>">
                            </div>
                            <div class="form-group">
                            <label for="total">Total</label>
                            <input type="text" class="form-control form-control-sm" name="total" id="total" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="row text-center">
                        <div class="col-md-12">
                            <button type="submit" onclick="simpan_transaksi()" class="btn btn-primary">Simpan</button>
                        </div>
                    </div>
                    </div>
                </section>
                </div>
            </div>
            </div>
            </form>
        </div>
        </div>
    </section>


    <?php $this->load->view('__partials/js'); ?>
    <?php $this->load->view('__partials/modal'); ?>

    <script>
        function hapus_barang(id) {
            $.ajax({
                type : 'post',
                url : '<?= base_url('barang/hapus_barang')?>/'+id,
                success : function() {
                    location.reload();
                }
            });
        }

        function tambah_barang() {
            $.ajax({
                type : 'post',
                url : '<?= base_url('barang/tambah_barang')?>',
                data : $('#form-tambah-barang').serialize(),
                success : function(data) {
                    document.getElementById("form-tambah-barang").reset();
                    location.reload();
                }
            });
        }

        function simpan_transaksi() {
            $.ajax({
                type : 'post',
                url : '<?= base_url('transaksi/update_action')?>',
                data : $('#form-transaksi').serialize(),
                success : function(data) {
                    location.reload();
                }
            });
        }
    </script>
</body>
</html>