<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
    <?= $this->session->flashdata('messege'); ?>
    <button type="button" class="btn btn-primary mb-3" data-toggle="modal" data-target="#exampleModal">
    Input Agenda
    </button>
    <table class="table" id="example">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Tgl Agenda</th>
                <th scope="col">Agenda</th>
                <th scope="col">Lokasi</th>
                <th scope="col">Jam Mulai</th>
                <th scope="col">Jam Selesai</th>
                <th scope="col">Status</th>
                <th scope="col">Aksi</th>
            </tr>
        </thead>
        <?php
            $i=1;
            foreach($agenda as $a):
        ?>
        <tbody>
        <?php
            if ($a['status']== 'TUNGGU'){
                $warna = "primary";
            }else if($a['status']== 'TUNDA'){
                $warna = "warning";
            }else if($a['status']== 'BATAL'){
                $warna = "danger";
            
            }else if($a['status']== 'SELESAI'){
                $warna = "info";
            }
        ?>
            <tr>
                <th scope="row"><?= $i++?></th>
                <td><?= $a['tgl']?></td>
                <td><?= $a['agenda']?></td>
                <td><?= $a['lokasi']?></td>
                <td><?= $a['jam_mulai']?></td>
                <td><?= $a['jam_selesai']?></td>
                <td><p class="badge badge-<?=$warna?>"><?= $a['status']?></p></td>
                <td>
                    <a href="<?= base_url('manajemen/hapusagenda/')?><?= $a['no']?>" class="badge badge-danger">Hapus</a>
                    <a href="<?= base_url('manajemen/editagenda/')?><?= $a['no']?>" class="badge badge-warning">Edit</a>
                    
                   
                    
                </td>
                
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
                <h5 class="modal-title" id="exampleModalLabel">Input Data Agenda</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('manajemen/inputagenda')?>" method="post" autocomplete="off">
                    <div class="row">
                        <div class="col-lg-6">
                            <label for=""></label>
                            <input type="text" name="tgl" id="tgl" class="form-control" data-provide="datepicker" data-date-format="yyyy-mm-dd" placeholder="Tanggal Agenda" required>
                        </div>
                        <div class="col-lg-12">
                            <label for=""></label>
                            <textarea class="form-control" name="agenda" id="agenda" placeholder="agenda" required></textarea>
                        </div>
                        <div class="col-lg-12">
                            <label for=""></label>
                            <input type="text" name="lokasi" id="lokasi" class="form-control" placeholder="Lokasi" required>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-lg-3">
                            <label for="inputMDEx1">Jam Mulai</label>
                            <input type="time" id="mulai" class="form-control" name="mulai">
                        </div>
                        <div class="col-lg-3">
                            <label for="inputMDEx1">Jam </label>
                            <input type="time" id="selesai" class="form-control" name="selesai">
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