<!DOCTYPE html>
<html lang="en">
<head>
    <?php $this->load->view('__partials/head');?>
</head>
<body>
    <?php $this->load->view('__partials/navbar');?>

    <section id="konfirmasi_muatan">
        <div class="container">
        <div class="row">
            <div class="col-md-12">
            <h1 class="text-center">Konfirmasi Muatan</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-8">
                <div class="form-group">
                    <label for="cari">Masukkan No DM</label>
                    <form action="" class="form-inline" id="form-cari">
                    <input type="text" class="form-control form-control-sm" name="nodm" id="searchstock">
                    <button type="submit" onclick="tampiltran($('searchstock').val)" class="btn btn-primary btn-sm" style="margin-left: 3px;">Cari</button>
                    </form>               
                </div>
            </div>
        </div>
        <div class="row" style="margin-top: 20px;">
            <div class="col-md-12">
            <table class="table table-striped table-sm table-bordered table-hover">
                <thead class="table-info">
                <tr>
                    <th>No</th>
                    <th>Tanggal</th>
                    <th>Wilayah</th>
                    <th>Resi</th>
                    <th>Pengirim</th>
                    <th>Penerima</th>
                    <th>Pembayaran</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody id="tabel">
                
                </tbody>
            </table>
            </div>
        </div>
        </div>
    </section>

    <?php $this->load->view('__partials/js');?>
    <script>
        function tampiltran(id) {
            $.ajax({
                type : 'post',
                // url : '<?= base_url('muatan/tampil_action')?>',
                data : $('#form-cari').serialize(),
                success : function(result) {
                    // $('#tabel').html(result);
                    console.log(id);
                }
            });
        }
    
    </script>
    
</body>
</html>