<!DOCTYPE html>
<html lang="en">
<head>
    <?php $this->load->view('__partials/head.php');?>
</head>
<body>
    <?php $this->load->view('__partials/navbar.php');?>
    
    <section id="daftar_transaksi">
        <div class="container">
        <div class="row">
            <div class="col-md-12">
            <h1 class="text-center">Daftar Stock</h1>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col-md-12">
            <table class="table table-striped table-bordered table-hover tabel-transaksi">
                <thead class="table-info">
                <tr>
                    <th>Tanggal</th>
                    <th>Wilayah</th>
                    <th>Resi</th>
                    <th>Pengirim</th>
                    <th>Penerima</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody class="table-sm">
                <?php foreach ($transaksi as $tr): ?>
                <tr class="text-center">
                    <td><?= $tr->tanggal ?></td>
                    <td><?= $tr->wilayah ?></td>
                    <td><?= $tr->resi ?></td>
                    <td><?= $tr->pengirim ?></td>
                    <td><?= $tr->penerima ?></td>
                    <td>
                    <a href="<?= base_url('transaksi/update_transaksi/'.$tr->id_transaksi)?>" class="btn btn-outline-info btn-block btn-sm">Edit</a>
                    <a href="#" onclick="hapus_transaksi(<?= $tr->id_transaksi ?>)" class="btn btn-outline-danger btn-block btn-sm">Hapus</a>
                    </td>
                </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
            </div>
        </div>
        </div>
    </section>

    <?php $this->load->view('__partials/modal.php');?>
    <?php $this->load->view('__partials/js.php');?>
    <script>
        $(document).ready(function(){
            $('.tabel-transaksi').DataTable();
        });

        function hapus_transaksi(id) {
            if(confirm('Apakah anda akan menghapus data?')) {
                $.ajax({
                type : "post",
                url : "<?= base_url('transaksi/hapus_transaksi')?>/"+id,
                dataType : "json",
                success : function() {
                    console.log('Data berhasil dihapus');
                    location.reload();
                    }
                });
            }
        }
    </script>
</body>
</html>