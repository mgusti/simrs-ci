<div class="container-fluid">

    <h1 class="h3 mb-4 text-gray-800"><?=$title;?></h1>

    <?=$this->session->flashdata('messege');?>

    <div class="card mt-3 mb-3" id="exampleModal">
        <form action="<?=base_url('billing/aksieditbilling/') . $bil['no']?>" method="post">
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-3">
                        <label for="">Tanggal</label>
                        <input type="date" name="tanggal" id="tanggal" class="form-control" value="<?=$bil['tgl']?>">
                    </div>
                </div>
                <div class="row">

                    <div class="col-lg-4">
                        <label for="">No R.M</label>
                        <input type="number" name="nomr" id="nomr" class="form-control" value="<?=$bil['no_mr']?>">
                    </div>
                    <div class="col-lg-6">
                        <label for="">Nama</label>
                        <input type="text" name="nama" id="nama" class="form-control" onkeyup="this.value = this.value.toUpperCase()" value="<?=$bil['nama']?>">
                    </div>

                </div>
                <div class="row">
                    <div class="col-lg-4">
                        <label for="">Kelas</label>
                        <select name="kelas" class="form-control">
                            <option value="<?=$bil['kelas']?>"><?=$bil['kelas']?></option>
                            <option value="I">Kelas I</option>
                            <option value="II">Kelas II</option>
                            <option value="III">Kelas III</option>
                        </select>
                    </div>
                    <div class="col-lg-6">
                        <label for="">Ruangan</label>
                        <select name="poli" id="poli" class="form-control">
                            <option value="<?=$bil['poli']?>"><?=$bil['poli']?></option>
                            <?php foreach ($poli as $p): ?>
                                <option value="Poli <?=$p['nama_poli']?>" <?=isset($_POST['poli']) && $_POST['poli'] == "Poli {$p['nama_poli']}" ? "selected" : ""?>>Poli <?=$p['nama_poli']?></option>
                            <?php endforeach;?>
                            <option value="Poli Fisioterapi" <?=isset($_POST['poli']) && $_POST['poli'] == "Poli Fisioterapi" ? "selected" : ""?>>Poli Fisioterapi</option>
                            <!-- <option value="Rawat Inap Bedah">Rawat Inap Bedah</option>
                            <option value="Rawat Inap Anak">Rawat Inap Anak</option>
                            <option value="Rawat Inap Gabung">Rawat Inap Gabung</option>
                            <option value="Rawat Inap Penyakit Dalam">Rawat Inap Penyakit Dalam</option>
                            <option value="Rawat Inap Mata">Rawat Inap Mata</option>
                            <option value="Rawat Inap Jantung">Rawat Inap Jantung</option>
                            <option value="Rawat Inap Paru">Rawat Inap Paru</option> -->
                            <option value="Rawat Inap Perinatologi" <?=isset($_POST['poli']) && $_POST['poli'] == "Rawat Inap Perinatologi" ? "selected" : ""?>>Rawat Inap Perinatologi</option>
                            <!-- <option value="Rawat Inap VK">Rawat Inap VK</option> -->
                            <option value="IGD" <?=isset($_POST['poli']) && $_POST['poli'] == "IGD" ? "selected" : ""?>>IGD</option>
                            <!-- <option value="Rawat Inap ICU">Rawat Inap ICU</option>
                            <option value="Rawat Inap VIP">Rawat Inap VIP</option> -->
                        </select>
                    </div>
                    <div class="col-lg-6">
                            <label for="">DPJP</label>
                            <select name="dok" id="dok" class="form-control">
                                <option value="<?=$dpjp['dpjp']?>"><?=$dpjp['dpjp']?></option>
                                <?php
foreach ($dktr as $d):
?>
                                    <option value="<?=$d['nm_dokter']?>"><?=$d['nm_dokter']?></option>
                                <?php
endforeach;
?>
                            </select>
                        </div>
                </div>
                <button type="submit" class="btn btn-warning mt-3 mb-3">Edit</button>
                <a class="btn btn-danger mt-3 mb-3" href="" onclick="closeTab()">Tutup</a>
            </div>

        </form>

    </div>
</div>