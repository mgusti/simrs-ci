<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800"><?=$title;?></h1>
    <?=$this->session->flashdata('messege');?>

    <?php echo form_open_multipart('user/edituser'); ?>
        <div class="row">
            <div class="col-lg-3">
                <label for="">Email</label>
                <input type="text" class="form-control" name="email" value="<?=$user['email']?>" id="email" readonly>
            </div>
            <div class="col-lg-3">
                <label for="">Nama User</label>
                <input type="text" class="form-control" name="name" value="<?=$user['name']?>" id="name">
                <?=form_error('name', ' <small class="text-danger pl-3">', '</small>');?>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-3">
                <label for="">NIK</label>
                <input type="text" class="form-control" name="nik" value="<?=$user['nik']?>" id="nik" >
                <?=form_error('nik', ' <small class="text-danger pl-3">', '</small>');?>
            </div>
            <div class="col-lg-3">
                <label for="">Jabatan</label>
                <select name="jabatan" id="jabatan" class="form-control">
                    <?php
$i = 1;
foreach ($jabatan as $j):

?>

                            <option value="<?=$j['nmjab']?>"><?=$j['nmjab']?></option>
                    <?php
endforeach;
?>
                </select>
                <?=form_error('jabatan', ' <small class="text-danger pl-3">', '</small>');?>
            </div>
        </div>
        <?php
if ($user['jenkel'] == 'L') {
    $jen = 'Laki-Laki';
} else {
    $jen = 'Perempuan';
}
?>
        <div class="row">
            <div class="col-lg-2">
                <label for="">Jenis Kelamin</label>
                <select name="jenkel" id="jenkel" class="form-control">
                    <option value="<?=$user['jenkel']?>"><?=$jen?></option>
                    <option value="L">Laki-laki</option>
                    <option value="P">Perempuan</option>

                </select>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-2">
                <label for="">Tgl Lahir</label>
                <input type="text" class="form-control" name="tgllahir" value="<?=$user['tgllahir']?>" id="tgllahir" data-provide="datepicker" data-date-format="yyyy-mm-dd" >
            </div>
        </div>

        <div class="row">
            <div class="col-lg-4">
                <label for="">Foto Profile</label>
                <img src="<?=base_url('assets/img/profile/') . $user['image']?>"  class="img-thumbnail" alt="">
                <small class="text-danger">besar ukuran foto tidak boleh lebih dari 2MB</small>
            </div>
            <div class="col-lg-4">
                <div class="custom-file">
                    <input type="file" class="custom-file-input" id="image" name="image" >
                    <label class="custom-file-label" for="image">Pilih Gambar</label>
                </div>
            </div>
        </div>

        <button type="submit" class="btn btn-warning mt-3">Edit</button>
        <a href="<?=base_url('user/index')?>" class="btn btn-danger mt-3">Kembali</a>
    </form>
</div>