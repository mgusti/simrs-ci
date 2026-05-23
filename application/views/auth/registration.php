  <div class="container">
    <div class="card o-hidden border-0 shadow-lg my-5 col-lg-7 mx-auto">
      <div class="card-body p-0">
        <!-- Nested Row within Card Body -->
        <div class="row">
          <div class="col-lg">
            <div class="p-5">
              <div class="text-center">
                <h1 class="h4 text-gray-900 mb-4">Daftar Akun</h1>
              </div>
              <form class="user" method="post" action="<?=base_url('auth/registration');?>">
                <div class="form-group">
                  <input type="text" class="form-control form-control-user" id="name" name="name" placeholder="Nama Lengkap" value="<?=set_value('name');?>">
                  <?=form_error('name', ' <small class="text-danger pl-3">', '</small>');?>
                </div>
                <div class="form-group">
                  <input type="text" class="form-control form-control-user" id="email" name="email" placeholder="Alamat Email" value="<?=set_value('email');?>">
                  <?=form_error('email', ' <small class="text-danger pl-3">', '</small>');?>
                </div>
                <div class="form-row">
                <div class="form-group col-md-6">
                <label for="role_id">Role</label>
                      <select name="role_id" id="role_id" class="form-control" value="<?=set_value('role_id');?>">
                        <option value="">-Pilih-</option>
                        <option value="15">Billing</option>
                      </select>
                      <?=form_error('role_id', ' <small class="text-danger ">', '</small>');?>
                </div>
                <div class="form-group col-md-6">
                <label for="subbidang">Sub Bidang</label>
                      <select name="subbidang" id="subbidang" class="form-control" value="<?=set_value('subbidang');?>">
                        <option value="">-Pilih-</option>
                        <?php
foreach ($subbidang as $sb):
?>
                        <option value="<?=$sb['kdsub']?>"><?=$sb['nmsub']?></option>
                        <?php
endforeach;
?>
                      </select>
                      <?=form_error('subbidang', ' <small class="text-danger ">', '</small>');?>
                </div>
              </div>

                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="password" class="form-control form-control-user" id="password" name="password" placeholder="Password">
                    <?=form_error('password', ' <small class="text-danger pl-3">', '</small>');?>
                  </div>
                  <div class="col-sm-6">
                    <input type="password" class="form-control form-control-user" id="cpassword" name="cpassword" placeholder="Ulangi Password">
                    <?=form_error('cpassword', ' <small class="text-danger pl-3">', '</small>');?>
                  </div>
                </div>

                <button type="submit" class="btn btn-primary btn-user btn-block">
                  Daftar Akun
                </button>

                <div class="text-center">
                  <a class="small" href="<?=base_url('auth');?>">Sudah Memiliki Akun? Login!</a>
                </div>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>