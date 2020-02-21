<!DOCTYPE html>
<html lang="en">
<head>
    <?php $this->load->view('__partials/head.php');?>
</head>
<body>
    <?php $this->load->view('__partials/navbar.php');?>

    <section id="input_transaksi">
        <div class="container">
        <div class="row">
            <div class="col-md-12">
            <h1 class="text-center">Input Stock</h1>
            </div>
        </div>
        <div class="row" style="margin-top: 20px;">
            <div class="col-md-4">
            <form action="<?= base_url('transaksi/input_action')?>" method="post">
                <div class="form-group">
                <label for="tanggal">Tanggal</label>
                <input class="form-control form-control-sm" name="tanggal" value="<?= date('Y-m-d')?>" readonly>
                </div>
                <div class="form-group">
                <label for="wilayah">Wilayah</label>
                <select name="wilayah" class="form-control form-control-sm form-wilayah" onchange="isi_kota()">
                    <option value="">Pilih Wilayah</option>
                    <?php foreach ($wilayah as $wil) : ?>
                    <option value="<?= $wil->id_wilayah ?>"><?= $wil->wilayah ?></option>
                    <?php endforeach; ?>
                </select>
                </div>
                <div class="form-group">
                <label for="kota">Kota</label>
                <input type="text" class="form-control form-control-sm form-kota" name="kota">
                </div>
                <div class="form-group">
                <label for="jns_barang">Jenis Barang</label>
                <select name="jns_barang" class="form-control form-control-sm form-jns-barang" onchange="isi_resi()">
                    <option value="">Pilih Jenis Barang</option>
                    <?php foreach ($jenis_barang as $jns) : ?>
                    <option value="<?= $jns->id_jenis_barang ?>"><?= $jns->jenis_barang ?></option>
                    <?php endforeach; ?>
                </select>
                </div>
                <div class="form-group">
                    <label for="resi">Resi</label>
                    <input type="text" class="form-control form-control-sm form-resi" name="resi">
                </div>
                <div class="form-group">
                <label for="dm_operan">DM Operan</label>
                <input type="text" class="form-control form-control-sm form-dm" name="dm_operan">
                </div>
                <div class="form-group">
                <label for="pengirim">Pengirim</label>
                <input type="text" class="form-control form-control-sm" name="pengirim">
                </div>
                <div class="form-group">
                <label for="penerima">Penerima</label>
                <input type="text" class="form-control form-control-sm" name="penerima">
                </div>
                <div class="form-group">
                <label for="pembayaran">Pembayaran</label>
                <select name="pembayaran" class="form-control form-control-sm">
                    <?php foreach ($pembayaran as $pem) : ?>
                    <option value="<?= $pem->id_pembayaran ?>"><?= $pem->pembayaran ?></option>
                    <?php endforeach; ?>
                </select>
                </div>
            </div>
            <div class="col-md-8">
            <div class="row">
                <div class="col-sm-12">
                    <a href="#" data-toggle="modal" data-target="#tambah-barang-session" class="btn btn-primary">Tambah Barang</a>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-sm-12">
                <table class="table table-striped table-sm table-hover tabel-barang">
                    <thead class="table-info">
                    <tr class="text-center">                     
                        <th>Jumlah Coli</th>
                        <th>Nama Barang</th>
                        <th>Berat</th>
                        <th>Ongkos</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody id="tampil_barang">
                    <?php
                    foreach($_SESSION['barang'] as $key => $value) :?>
                        <tr class="text-center">
                        <td><?= $value['jml'] ?></td>
                        <td><?= $value['nama_barang'] ?></td>
                        <td><?= $value['berat'] ?></td>
                        <td><?= $value['ongkos'] ?></td>
                        <td>
                            <a href="#" onclick="hapus_barang('<?= $key ?>')" class="btn btn-outline-danger btn-block btn-sm hapus-barang">Hapus</a>
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
                            <input type="text" class="form-control form-control-sm" name="ekstra" id="ekstra">
                            </div>
                            <div class="form-group">
                            <label for="biaya_ekstra">Biaya Ekstra</label>
                            <input type="text" class="form-control form-control-sm" name="biaya_ekstra" id="biaya_ekstra">
                            </div>
                            <div class="form-group">
                            <label for="total">Total</label>
                            <input type="text" class="form-control form-control-sm" name="total" id="total" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="row text-center">
                        <div class="col-md-12">
                            <input type="submit" name="btn" class="btn btn-primary" value="Tambahkan">
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

    <?php $this->load->view('__partials/modal.php');?>
    <?php $this->load->view('__partials/js.php');?>

    <script>
        $(document).ready(function(){

        });

        function isi_kota() {
            var wil = $('.form-wilayah').val();

            if(wil == 2) {
                $(".form-kota").attr('disabled', 'disabled');
                $('.form-resi').val("<?php $t= time(); echo ('JTM'.$t)?>");
            } else {
                $(".form-kota").removeAttr('disabled');
                $('.form-resi').val("<?php $t= time(); echo ('JTG'.$t)?>");
            }
        }

        function isi_resi() {
            var jns = $('.form-jns-barang').val();

            if(jns == 1) {
                $(".form-resi").attr('readonly', 'readonly');
                $('.form-dm').attr('disabled', 'disabled');
            } else {
                $(".form-resi").removeAttr('readonly');
                $(".form-dm").removeAttr('disabled');
            }
        }
        
        $('#form-tambah-barang-session').on('submit', function(e){
            $.ajax({
                type : "post",
                url : "<?= base_url('transaksi/tambah_barang')?>",
                data : $('#form-tambah-barang-session').serialize(),
                success : function(data) {
                    document.getElementById("form-tambah-barang-session").reset();
                    location.reload();
                }
            });
        })

        function hapus_barang(id) {
            $.ajax({
                type : "post",
                data:{id : id},
                url : "<?= base_url('transaksi/hapus_barang')?>",
                success : function() {
                    console.log(id)
                    location.reload();
                }
            });
        }

        // function hapus_barang() {
        //     $.ajax({
        //         type : "post",
        //         url : "",
        //         success : function() {
        //             alert('berhasil dihapus');
        //         }
        //     });
        // }
        
    </script>
</body>
</html>