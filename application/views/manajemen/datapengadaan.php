<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
    <?= $this->session->flashdata('messege'); ?>
    <button type="button" class="btn btn-primary mb-3" data-toggle="modal" data-target="#exampleModal">
    Input Pengadaan
    </button>
    
    <table class="table table-responsive-md text-center" id="example">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Tgl Pengadaan</th>
                <th scope="col">Nama Paket</th>
                <th scope="col">Vendor</th>
                
                <th scope="col">No Pengadaan</th>
                <th scope="col">Status</th>
               
            </tr>
        </thead>
       <?php
       $i= 1;
        foreach ($pengadaan as $p):
       ?>
        <tbody>
        <?php
            if($p['status']== 'TUNGGU'){
                $warna = 'warning';
            }else if($p['status']== 'BATAL'){
                $warna = 'danger';
            }else if($p['status']== 'OK'){
                $warna = 'primary';
            }
        ?>
            <tr>
                <th scope="row"><?= $i++?></th>
                <td><?= $p['tgl']?></td>
                <td><?= $p['paket']?></td>
                <td><?= $p['vendor']?></td>
               
                <td><?= $p['no_pengadaan']?></td>
                <td><p class="badge badge-<?= $warna?>"><?= $p['status']?></p></td>
                
               
                
            </tr>
        </tbody>
        <?php
            endforeach;
        ?>
        
    </table>

    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Input Data Pengadaan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('manajemen/inputpengadaan')?>" method="post" autocomplete="off">
                    <div class="row">
                        <div class="col-lg-6">
                            <label for=""></label>
                            <input type="text" name="tgl" id="tgl" class="form-control" data-provide="datepicker" data-date-format="yyyy-mm-dd" placeholder="Tanggal Pengadaan" required>
                        </div>
                        <div class="col-lg-12">
                            <label for=""></label>
                            <input class="form-control" name="paket" id="paket" placeholder="Paket" required onkeyup="this.value = this.value.toUpperCase()">
                        </div>
                        <div class="col-lg-12">
                            <label for=""></label>
                            <input type="text" name="vendor" id="vendor" class="form-control" placeholder="Vendor" required onkeyup="this.value = this.value.toUpperCase()">
                        </div>
                        <div class="col-lg-6">
                            <label for=""></label>
                            <input type="number" name="nilai" id="nilai" class="form-control" placeholder="Nilai" required>
                        </div>
                    </div>
                
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Simpan</button>
                </form>
            </div>
            </div>
        </div>
    </div>
</div>