<div class="container-fluid">
    <h1 class="h3 mb-4 mt-4 text-gray-800"><?= $title; ?></h1>

    <nav>
        <div class="nav nav-tabs" id="nav-tab" role="tablist">
            <a class="nav-item nav-link active" id="kunjungan" data-toggle="tab" href="#nav-kunjungan" role="tab" aria-controls="nav-home" aria-selected="true">Data Kunjungan</a>
            <a class="nav-item nav-link" id="klaim" data-toggle="tab" href="#nav-klaim" role="tab" aria-controls="nav-profile" aria-selected="false">Data Klaim</a>
            <a class="nav-item nav-link" id="histori" data-toggle="tab" href="#nav-histori" role="tab" aria-controls="nav-contact" aria-selected="false">Histori Pelayanan Peserta</a>
            <a class="nav-item nav-link" id="jasa" data-toggle="tab" href="#nav-jasa" role="tab" aria-controls="nav-contact" aria-selected="false">Data Klaim Jaminan Jasa Raharja</a>
        </div>
    </nav>
    <div class="tab-content" id="nav-tabContent">
        <div class="tab-pane fade show active" id="nav-kunjungan" role="tabpanel" aria-labelledby="nav-home-tab">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-2">
                        <label for="">Tgl</label>
                        <input type="text" name="tglsep" id="tglsepkunjungan" class="form-control" data-provide="datepicker" data-date-format="yyyy-mm-dd">
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-2">
                        <label for="">Jenis Pelayanan</label>
                        <select name="jnspel" id="jnspel" class="form-control">
                            <option value="">-pilih-</option>
                            <option value="1">R. Inap</option>
                            <option value="2">R. Jalan</option>
                        </select>
                    </div>
                </div>
                <button class="btn btn-danger mt-3" id="carikunjungan">Cari</button>
               
                    <table class="table mt-3" id="tabel">
                    
                    </table>
                
                
            </div>
        </div>
        <div class="tab-pane fade" id="nav-klaim" role="tabpanel" aria-labelledby="nav-profile-tab">2</div>
        <div class="tab-pane fade" id="nav-histori" role="tabpanel" aria-labelledby="nav-contact-tab">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-3">
                        <label for="">No Kartu BPJS</label>
                        <input type="text" name="nokartu" id="nokartu1" class="form-control">
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-2">
                        <label for="">Tgl Mulai Pencarian</label>
                        <input type="text" name="tglmulai" id="tglmulai" class="form-control" data-provide="datepicker" data-date-format="yyyy-mm-dd">
                    </div>
                    <div class="col-lg-2">
                        <label for="">Tgl Akhir Pencarian</label>
                        <input type="text" name="tglakhir" id="tglakhir" class="form-control" data-provide="datepicker" data-date-format="yyyy-mm-dd">
                    </div>
                </div>
                <button class="btn btn-danger mt-3" id="carihistori">Cari</button>
                
                <p id="juancok"></p>
            </div>
        </div>
        <div class="tab-pane fade" id="nav-jasa" role="tabpanel" aria-labelledby="nav-contact-tab">4</div>
    </div>  
</div>