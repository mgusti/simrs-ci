      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; SIMRS HAM 2023</span>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->

      </div>
      <!-- End of Content Wrapper -->

      </div>
      <!-- End of Page Wrapper -->

      <!-- Scroll to Top Button-->
      <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
      </a>

      <!-- Logout Modal-->
      <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Anda Yakin untuk Keluar ?</h5>
              <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
              </button>
            </div>
            <div class="modal-body"></div>
            <div class="modal-footer">
              <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
              <a class="btn btn-primary" href="<?= base_url('auth/logout'); ?>">Logout</a>
            </div>
          </div>
        </div>
      </div>

      <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
      <script src="https://code.jquery.com/ui/1.14.0/jquery-ui.js" integrity="sha256-u0L8aA6Ev3bY2HI4y0CAyr9H8FRWgX4hZ9+K7C2nzdc=" crossorigin="anonymous"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/4.6.2/js/bootstrap.bundle.min.js" integrity="sha512-igl8WEUuas9k5dtnhKqyyld6TzzRjvMqLC79jkgT3z02FvJyHAuUtyemm/P/jYSne1xwFI06ezQxEwweaiV7VA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.10.0/js/bootstrap-datepicker.min.js" integrity="sha512-LsnSViqQyaXpD4mBBdRYeP6sRwJiJveh2ZIbW41EBrNmKxgr/LFZIiWT6yr+nycvhvauz8c2nYMhrP80YhG7Cw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/4.4.1/chart.min.js" integrity="sha512-L0Shl7nXXzIlBSUUPpxrokqq4ojqgZFQczTYlGjzONGTDAcLremjwaWv5A+EDLnxhQzY5xUZPWLOLqYRkY0Cbw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
      <!-- DATATABLE -->
      <script src="https://cdn.datatables.net/v/bs4/dt-2.1.8/af-2.7.0/cr-2.0.4/date-1.5.4/fh-4.0.1/r-3.0.3/sc-2.4.3/sb-1.8.1/sp-2.3.3/sl-2.1.0/datatables.min.js"></script>
      <!-- Custom scripts for all pages-->
      <script src="<?= base_url('assets/'); ?>js/sb-admin-2.min.js"></script>

      <!-- closetab/kembali ditindakan -->
      <script>
        function closeTab() {
          window.close();
        }
      </script>

      <script>
        const inputNomr = document.getElementById('nomr');

        inputNomr.addEventListener('input', function() {
          // Hanya izinkan angka dan batasi maksimal 8 karakter
          this.value = this.value.replace(/[^0-9]/g, ''); // Menghapus karakter selain angka

          // Cek jika panjang input lebih dari 8 karakter
          if (this.value.length > 8) {
            // Hapus karakter tambahan setelah 8 digit
            this.value = this.value.slice(0, 8);
          }
        });
      </script>

      <script>
        function showWarning() {
          alert("Hanya bisa dihapus atau diedit oleh petugas yang menginput!");
        }
      </script>

      <script>
        // Fungsi untuk memformat angka menjadi format rupiah
        function formatRupiah(angka) {
          let number_string = angka.replace(/[^,\d]/g, '').toString(),
            split = number_string.split(','),
            sisa = split[0].length % 3,
            rupiah = split[0].substr(0, sisa),
            ribuan = split[0].substr(sisa).match(/\d{3}/gi);

          if (ribuan) {
            let separator = sisa ? '.' : '';
            rupiah += separator + ribuan.join('.');
          }

          return 'Rp ' + rupiah;
        }

        // Fungsi untuk menghapus format rupiah dan mengubah kembali ke angka biasa
        function unformatRupiah(angka) {
          return angka.replace(/[^,\d]/g, '');
        }

        // Fungsi untuk memformat input saat di ketik dan update hidden input, serta validasi input
        function formatInputRupiah(inputElement, hiddenElement, errorMessageElement) {
          inputElement.addEventListener('input', function(e) {
            let rawValue = this.value; // Ambil nilai asli dari input
            let formattedValue = unformatRupiah(rawValue); // Hilangkan format Rupiah

            // Validasi input: jika ada karakter selain angka, tampilkan pesan error
            if (/[^\d]/.test(formattedValue)) {
              errorMessageElement.style.display = 'block'; // Tampilkan pesan error
              this.classList.add('is-invalid'); // Tambahkan kelas error
              hiddenElement.value = ''; // Kosongkan hidden input
            } else {
              errorMessageElement.style.display = 'none'; // Sembunyikan pesan error
              this.classList.remove('is-invalid'); // Hapus kelas error
              this.value = formatRupiah(formattedValue); // Format input menjadi Rupiah
              hiddenElement.value = formattedValue; // Simpan nilai asli di hidden input
            }
          });
        }

        // Memformat input dan mengupdate hidden input
        const formattedBiayaInput = document.getElementById('formatted_biaya');
        const hiddenBiayaInput = document.getElementById('biaya');
        const errorMessageElement = document.getElementById('error-message'); // Elemen pesan error
        formatInputRupiah(formattedBiayaInput, hiddenBiayaInput, errorMessageElement);
      </script>

      <!-- Select2 -->
      <script>
        $(document).ready(function() {
          $('#poli2').select2({
            placeholder: "Pilih ruangan",
            allowClear: true,
            width: '100%', // Gunakan 100% agar lebar menyesuaikan kontainer induk
            dropdownParent: $('#exampleModal') // Ini memastikan dropdown di dalam modal
          });
          $('#poliedit').select2({
            placeholder: "Pilih ruangan",
            allowClear: true,
            width: '100%', // Gunakan 100% agar lebar menyesuaikan kontainer induk
            dropdownParent: $('#editDetailPasienModal') // Ini memastikan dropdown di dalam modal
          });
          $('#kelasedit').select2({
            placeholder: "Pilih kelas",
            allowClear: true,
            width: '100%', // Gunakan 100% agar lebar menyesuaikan kontainer induk
            dropdownParent: $('#editDetailPasienModal') // Ini memastikan dropdown di dalam modal
          });
          $('#poli').select2({
            placeholder: "Pilih ruangan",
            allowClear: true,
            width: '100%', // Gunakan 100% agar lebar menyesuaikan kontainer induk // Ini memastikan dropdown di dalam modal
          });
          $('#bulan').select2({
            placeholder: "Pilih bulan",
            allowClear: true,
            width: '100%', // Gunakan 100% agar lebar menyesuaikan kontainer induk // Ini memastikan dropdown di dalam modal
          });
          $('#dok').select2({
            placeholder: "Pilih dokter",
            allowClear: true,
            width: '100%',
            dropdownParent: $('#exampleModal') // Gunakan 100% untuk menyesuaikan lebar
          });
          $('#kelas').select2({
            placeholder: "Pilih kelas",
            allowClear: true,
            width: '100%',
            dropdownParent: $('#exampleModal') // Gunakan 100% untuk menyesuaikan lebar
          });
          $('#dok1').select2({
            placeholder: "Pilih dokter",
            allowClear: true,
            width: '100%',
            dropdownParent: $('#editDetailPasienModal') // Gunakan 100% untuk menyesuaikan lebar
          });
          // Atur CSS secara langsung untuk tinggi dan padding
          $('.select2-container--default .select2-selection--single').css({
            'height': '38px', // Atur tinggi elemen
            'padding': '5px 12px',
            'border': '1px solid #ced4da',
            'border-radius': '4px',
            'box-shadow': 'none'
          });
        });
      </script>

      <!-- Format Tanggal Ketika Tambah memunculkan Nama Bulan -->
      <script>
        const inputTanggal = document.getElementById('tanggal');
        const spanTanggalIndo = document.getElementById('tanggal_indo');

        inputTanggal.addEventListener('change', function() {
          const tanggal = this.value; // Ambil nilai tanggal (format Y-m-d)

          if (tanggal) {
            // Panggil helper tanggal_indo melalui AJAX
            fetch('<?= base_url('billing/tanggal_indo_helper') ?>', {
                method: 'POST',
                headers: {
                  'Content-Type': 'application/json'
                },
                body: JSON.stringify({
                  tanggal: tanggal
                })
              })
              .then(response => response.json())
              .then(data => {
                // Tampilkan tanggal dalam format Indonesia
                spanTanggalIndo.textContent = 'Tanggal: ' + data.formatted_tanggal;
              })
              .catch(error => console.error('Error:', error));
          } else {
            spanTanggalIndo.textContent = ''; // Kosongkan jika tidak ada tanggal
          }
        });
      </script>

      <script>
        $('.form-check-input').on('click', function() {

          const menuId = $(this).data('menu');
          const roleId = $(this).data('role');

          $.ajax({

            url: "<?= base_url('admin/changeAccess'); ?>",
            type: 'post',
            data: {
              menuId: menuId,
              roleId: roleId
            },
            success: function() {
              document.location.href = "<?= base_url('admin/roleAccess/'); ?>" + roleId;
            }
          });

        });
      </script>

      <!-- DATATABLES SCRIPT -->
      <script>
        $(document).ready(function() {
          $('#example').DataTable({
            responsive: true
          });

          // tagihanpoliview
          $('#example1').DataTable({
            layout: {
              topStart: 'info',
              bottom: 'paging',
              bottomStart: null,
              bottomEnd: null
            },
            responsive: true,
            "columnDefs": [{
              "className": "text-center", // Menambahkan kelas text-center ke kolom tertentu
              "targets": "_all" // Terapkan ke semua kolom, bisa juga ke kolom tertentu (misal: [0, 2, 4])
            }],
          });

          // tindakanview
          $('#example2').DataTable({
            responsive: true,
            "paging": false, // Tidak menggunakan pagination
            "searching": false, // Menghilangkan kolom pencarian
            "ordering": true, // Mengaktifkan sorting (opsional, bisa dihilangkan jika tidak diperlukan)
            "info": false,
            "columnDefs": [{
              "className": "text-center", // Menambahkan kelas text-center ke kolom tertentu
              "targets": "_all" // Terapkan ke semua kolom, bisa juga ke kolom tertentu (misal: [0, 2, 4])
            }],
          });
        });
      </script>

      <script>
        $('#carirm').on('click', function() {
          var nomr = $('#nomr').val();
          if (nomr == "") {
            alert("nomr harus disi");
          } else {
            $.ajax({
              type: 'post',
              url: "<?= base_url('pendaftaran/caripasien/'); ?>" + nomr,
              dataType: 'json',
              data: "nomr" + nomr,
              success: function(a) {
                if (a < 1) {
                  alert("data tidak ditemukan");
                } else {
                  document.getElementById("nokartu").value = a["nokartu"];
                  document.getElementById("nama").value = a["nama_pasien"];
                  document.getElementById("nik").value = a["no_ktp"];
                  document.getElementById("tgl_lahir").value = a["tgl_lahir"];
                  document.getElementById("alamat").value = a["alamat"];
                  document.getElementById("jenkel").value = a["jenkel"];
                }
              }
            });
          }
        });
      </script>

      <script>
        $(document).ready(function() {
          $('#provinsi').change(function() {
            var provinsi_id = $(this).val();

            $.ajax({
              type: 'post',
              url: "<?= base_url('php/kabupaten.php'); ?>",
              data: "prov_id=" + provinsi_id,
              success: function(response) {
                $('#kabupaten').html(response);

              }
            });

          })
        });
      </script>

      <script>
        $(document).ready(function() {
          $('#kabupaten').change(function() {
            var provinsi_id = $(this).val();


            $.ajax({
              type: 'post',
              url: "<?= base_url('php/kecamatan.php'); ?>",
              data: "prov_id=" + provinsi_id,
              success: function(response) {
                $('#kecamatan').html(response);
                $('#kode_prov').html(response);
              }
            });

          })
        });
      </script>

      <script>
        function kodea() {
          var tes = document.getElementById("provinsi").value;
          var x = document.getElementById("provinsi");
          var nama = x.selectedIndex;
          document.getElementById("kode_provinsi").value = tes;
          document.getElementById("nama_provinsi").value = x.options[nama].text;
        }
      </script>
      <script>
        function kode2b() {
          var kab1 = document.getElementById("kabupaten").value;
          var kab2 = document.getElementById("kabupaten");
          var kab3 = kab2.selectedIndex;
          document.getElementById("kode_kabupaten").value = kab1;
          document.getElementById("nama_kabupaten").value = kab2.options[kab3].text;
        }
      </script>

      <script>
        function kode3c() {
          var kec1 = document.getElementById("kecamatan").value;
          var kec2 = document.getElementById("kecamatan");
          var kec3 = kec2.selectedIndex;
          document.getElementById("kode_kecamatan").value = kec1;
          document.getElementById("nama_kecamatan").value = kec2.options[kec3].text;
        }
      </script>

      <script>
        $(document).ready(function() {
          $('#btncari1').click(function() {
            var cari1 = $("#cari1").val();
            //console.log(cari);

            $.ajax({
              type: 'get',
              url: "<?= base_url('php/caripasienktp.php'); ?>",

              data: "cari1=" + cari1,
              success: function(tes) {
                obj = JSON.parse(tes);
                //console.log(tes);
                $('#alert1').html(obj.metaData.message);
                $('#alert2').html(obj.metaData.code);
                $('#nomr1').val(obj.response.peserta.mr.noMR);
                $('#nik1').val(obj.response.peserta.nik);
                $('#nokartu1').val(obj.response.peserta.noKartu);
                $('#nama1').val(obj.response.peserta.nama);
                $('#jenkel1').val(obj.response.peserta.sex);
                $('#tgllahir1').val(obj.response.peserta.tglLahir);
                $('#no_hp1').val(obj.response.peserta.noTelepon);
                $('#status1').val(obj.response.peserta.statusPeserta.keterangan);
                $('#dinso1').val(obj.response.peserta.informasi.dinsos);
                $('#nosktm1').val(obj.response.peserta.informasi.noSKTM);
                $('#porlanisprb1').val(obj.response.peserta.informasi.porlanisPRB);
              }
            });
          });


        });
      </script>

      <script>
        $(document).ready(function() {
          $('#btncari2').click(function() {
            var cari2 = $("#cari2").val();
            //console.log(cari);

            $.ajax({
              type: 'get',
              url: "<?= base_url('php/caripasiennokartu1.php'); ?>",

              data: "cari2=" + cari2,
              success: function(tes) {
                obj = JSON.parse(tes);
                //console.log(tes);
                $('#alert11').html(obj.metaData.message);
                $('#alert22').html(obj.metaData.code);
                $('#nomr2').val(obj.response.peserta.mr.noMR);
                $('#nik2').val(obj.response.peserta.nik);
                $('#nokartu2').val(obj.response.peserta.noKartu);
                $('#nama2').val(obj.response.peserta.nama);
                $('#jenkel2').val(obj.response.peserta.sex);
                $('#tgllahir2').val(obj.response.peserta.tglLahir);
                $('#no_hp2').val(obj.response.peserta.noTelepon);
                $('#status2').val(obj.response.peserta.statusPeserta.keterangan);
                $('#dinso2').val(obj.response.peserta.informasi.dinsos);
                $('#nosktm2').val(obj.response.peserta.informasi.noSKTM);
                $('#porlanisprb2').val(obj.response.peserta.informasi.porlanisPRB);
              }
            });
          });


        });
      </script>

      <script>
        function myFunction() {
          var checkBox = document.getElementById("cob1");
          var asuransi = document.getElementById("asuransi");
          var asuransi1 = document.getElementById("asuransi1");
          if (checkBox.checked == true) {
            asuransi.style.display = "block";
            asuransi1.style.display = "block";
          } else {
            asuransi.style.display = "none";
            asuransi1.style.display = "none";
          }
        }
      </script>

      <script>
        function myFunction() {
          var checkBox = document.getElementById("laka1");
          var kecelakaan = document.getElementById("kecelakaan");

          if (checkBox.checked == true) {
            kecelakaan.style.display = "block";

          } else {
            kecelakaan.style.display = "none";

          }
        }
      </script>

      <script>
        $(document).ready(function() {
          $('#provinsi1').change(function() {
            var provinsi_id = $(this).val();
            $.ajax({
              type: 'post',
              url: "<?= base_url('php/kabupaten.php'); ?>",
              data: "prov_id=" + provinsi_id,
              success: function(response) {
                $('#kabupaten1').html(response);

              }
            });

          })
        });
      </script>

      <script>
        $(document).ready(function() {
          $('#kabupaten1').change(function() {
            var provinsi_id = $(this).val();
            $.ajax({
              type: 'post',
              url: "<?= base_url('php/kecamatan.php'); ?>",
              data: "prov_id=" + provinsi_id,
              success: function(response) {
                $('#kecamatan1').html(response);
                $('#kode_prov1').html(response);
              }
            });
          })
        });
      </script>

      <script>
        function kode() {
          var tes = document.getElementById("provinsi1").value;
          var x = document.getElementById("provinsi1");
          var nama = x.selectedIndex;
          document.getElementById("kode_provinsi1").value = tes;
          document.getElementById("nama_provinsi1").value = x.options[nama].text;
        }
      </script>
      <script>
        function kode2() {
          var kab1 = document.getElementById("kabupaten1").value;
          var kab2 = document.getElementById("kabupaten1");
          var kab3 = kab2.selectedIndex;
          document.getElementById("kode_kabupaten1").value = kab1;
          document.getElementById("nama_kabupaten1").value = kab2.options[kab3].text;
        }
      </script>

      <script>
        function kode3() {
          var kec1 = document.getElementById("kecamatan1").value;
          var kec2 = document.getElementById("kecamatan1");
          var kec3 = kec2.selectedIndex;
          document.getElementById("kode_kecamatan1").value = kec1;
          document.getElementById("nama_kecamatan1").value = kec2.options[kec3].text;
        }
      </script>

      <script>
        $(document).ready(function() {
          $('#carifaskes').click(function() {
            var nokartu = $("#nokartu").val();
            var pilihfaskes = $('#pilihfaskes option:selected').val();
            if (pilihfaskes == '1') {
              $.ajax({
                type: 'get',
                url: "<?= base_url('php/rujukanfaskes1.php'); ?>",
                data: "nokartu=" + nokartu,
                success: function(response) {
                  $('#isi').html(response);
                }
              });
            } else if (pilihfaskes == '2') {
              $.ajax({
                type: 'get',
                url: "<?= base_url('php/rujukan.php'); ?>",
                data: "nokartu=" + nokartu,
                success: function(response) {
                  $('#isi').html(response);
                }
              });
            }
          })
        })
      </script>

      <script>
        $(document).ready(function() {
          $('#diagawal1').keyup(function() {
            var query = $(this).val();
            $.ajax({
              minlength: 3,
              url: "<?= base_url('php/diagnosa.php'); ?>",
              method: "POST",
              data: {
                query: query
              },
              success: function(data) {
                console.log(data)
                $('#list').html(data);
              }
            });
          })
        });
      </script>

      <script>
        $(document).ready(function() {
          $('#jnspelayanan').change(function() {
            var pelayanan = $("#jnspelayanan").val();
            var tglpelayanan = $("#tglsep").val();
            var spesialis = $("#poli").val();

            $.ajax({
              url: "<?= base_url('php/dokterdpjp.php'); ?>",
              method: "get",
              data: {
                pelayanan: pelayanan,
                tglpelayanan: tglpelayanan,
                spesialis: spesialis
              },
              success: function(data) {
                $('#kodedpjp1').html(data);
              }
            });
          })
        })
      </script>

      <script>
        $(document).ready(function() {
          $('#carikunjungan').click(function() {
            var tglsepkunjungan = $("#tglsepkunjungan").val();
            var jnspel = $("#jnspel").val();
            $.ajax({

              url: "<?= base_url('php/datakunjungan.php'); ?>",
              method: "post",
              data: {
                tglsepkunjungan: tglsepkunjungan,
                jnspel: jnspel
              },
              success: function(data) {
                $('#tabel').html(data);
              }
            });
          })
        })
      </script>

      <script>
        $(document).ready(function() {
          $('#carihistori').click(function() {
            var nokartu1 = $("#nokartu1").val();
            var tglmulai = $("#tglmulai").val();
            var tglakhir = $("#tglakhir").val();
            $.ajax({
              url: "<?= base_url('php/datahistori.php'); ?>",
              method: "GET",
              data: {
                nokartu1: nokartu1,
                tglmulai: tglmulai,
                tglakhir: tglakhir
              },
              success: function(data) {
                $('#juancok').html(data);
              }
            });
          })
        })
      </script>

      <script>
        $(document).ready(function() {
          $('#kelas1').change(function() {
            var jenkel1 = $("#jenkel1").val();
            var kelas1 = $("#kelas1").val();
            var subbidang1 = $("#subbidang1").val();
            $.ajax({
              url: "<?= base_url('inap/caribed'); ?>",
              method: "post",
              data: {
                jenkel1: jenkel1,
                kelas1: kelas1,
                subbidang1: subbidang1
              },
              success: function(data) {
                //console.log(data);
                $('#bed1').html(data);
              }
            });
          })
        })
      </script>
      <script>
        $(document).ready(function() {
          $('#kode_obat').keyup(function() {
            var kode_obat = $("#kode_obat").val();
            $.ajax({
              minlength: 3,
              url: "<?= base_url('inap/cariobat'); ?>",
              method: "post",
              data: {
                kode_obat: kode_obat
              },
              success: function(data) {
                obj = JSON.parse(data);
                console.log(data);
                $('#nama_obat').val(obj.nama_brng);
                $('#satuan').val(obj.satuan);
              }
            });
          })
        });
      </script>

      <script>
        $(document).ready(function() {
          $('#idtindakan1').keyup(function() {
            var idtindakan1 = $("#idtindakan1").val();
            $.ajax({
              url: "<?= base_url('inap/caritindakan') ?>",
              method: "get",
              data: {
                idtindakan1: idtindakan1
              },
              success: function(data) {
                //obj = JSON.parse(data);
                //console.log(data);
                $('#jnspelayanan1').html(data);
              }
            })
          });
        });
      </script>

      <script>
        $(document).ready(function() {
          $('#idtindakan1').keyup(function() {
            var idtindakan1 = $("#idtindakan1").val();
            $.ajax({
              url: "<?= base_url('inap/caritindakan1') ?>",
              method: "get",
              data: {
                idtindakan1: idtindakan1
              },
              success: function(data) {
                obj = JSON.parse(data);
                //console.log(data);
                $('#namatindakan1').val(obj.nama_tindakan);

              }
            })
          });
        });
      </script>

      <script>
        $(document).ready(function() {
          $('#jenispen').keyup(function() {
            var jenispen = $("#jenispen").val();
            $.ajax({
              url: "<?= base_url('inap/caripelpenunjang') ?>",
              method: "get",
              data: {
                jenispen: jenispen
              },
              success: function(data) {
                obj = JSON.parse(data);
                //console.log(data);
                $('#nmjenispen').val(obj.nama_pelayanan);

              }
            })
          });
        });
      </script>

      <script>
        $(document).ready(function() {
          $('#jenispen').keyup(function() {
            var jenispen = $("#jenispen").val();
            $.ajax({
              url: "<?= base_url('inap/caripenunjangmedis') ?>",
              method: "get",
              data: {
                jenispen: jenispen
              },
              success: function(data) {
                //obj = JSON.parse(data);
                //console.log(data);
                $('#penunjang_medis').html(data);

              }
            })
          });
        });
      </script>


      <script>
        $('#but').click(function() {
          var a = $('#nosep1').val();
          var c = $('#idtindakan1').val();
          var d = $('#jnspelayanan1').val();
          var e = $('#tgltindakan1').val();
          var f = $('#dokter1').val();
          var g = $('#petugas1').val();
          var h = $('#tglsep4').val();
          $('#nosep2').val(a);
          $('#idtindakan2').val(c);
          $('#jnspelayanan2').val(d);
          $('#tgltindakan2').val(e);
          $('#dokter2').val(f);
          $('#petugas2').val(g);
          $('#tglsep5').val(h);

        })
      </script>

      <script>
        $(document).ready(function() {
          $('#caripoli').keyup(function() {
            var query2 = $(this).val();
            $.ajax({
              minlength: 3,
              url: "<?= base_url('php/poli.php'); ?>",
              method: "POST",
              data: {
                query2: query2
              },
              success: function(data) {
                $('#list2').html(data);
              }
            });
          })
        });
      </script>

      <script>
        $(document).ready(function() {
          $('#faskes1').keyup(function() {
            var query3 = $(this).val();
            var jnsfaskes = $("#jnsfaskes").val();
            $.ajax({
              minlength: 3,
              url: "<?= base_url('php/faskes.php'); ?>",
              method: "POST",
              data: {
                query3: query3,
                jnsfaskes: jnsfaskes
              },
              success: function(data) {

                $('#list3').html(data);
              }
            });
          })
        });
      </script>
      <script>
        $(document).ready(function() {
          var jnspelayanan1 = $("#jnspelayanan1").val();
          var tglsep = $("#tglsep").val();
          var spesialis = $("#poli1").val();
          $.ajax({
            url: "<?= base_url('php/dokterdpjp2.php'); ?>",
            method: "get",
            data: {
              jnspelayanan1: jnspelayanan1,
              tglsep: tglsep,
              spesialis: spesialis
            },
            success: function(data1) {
              $('#dokter').html(data1);

            }
          });

        })
      </script>

      <!--Start of Tawk.to Script-->
      <script type="text/javascript">
        var Tawk_API = Tawk_API || {},
          Tawk_LoadStart = new Date();
        (function() {
          var s1 = document.createElement("script"),
            s0 = document.getElementsByTagName("script")[0];
          s1.async = true;
          s1.src = 'https://embed.tawk.to/5e4a78efa89cda5a18866101/default';
          s1.charset = 'UTF-8';
          s1.setAttribute('crossorigin', '*');
          s0.parentNode.insertBefore(s1, s0);
        })();
      </script>

      <script>
        $('.custom-file-input').on('change', function() {
          let fileName = $(this).val().split('//').pop();
          $(this).next('.custom-file-label').addClass("selected").html(fileName);
        })
      </script>

      <script>
        $(document).ready(function() {
          $('#role').change(function() {
            var role = $("#role").val();

            $.ajax({
              url: "<?= base_url('admin/caribidang'); ?>",
              method: "post",
              data: {
                role: role
              },
              success: function(data) {

                //console.log(data);
                $('#subbidang').html(data);
              }
            });
          })
        })
      </script>

      <script>
        $(document).ready(function() {
          $('#ourForm').submit(function(e) {
            var form = this;
            e.preventDefault();
            // Check Passwords are the same
            if ($('#nomr1').val() == $('#nomr2').val()) {
              // Submit Form

              form.submit();
            } else {
              // Complain bitterly
              alert('no mr tidak sama, silahkan perbaiki data pasien terlebih dahulu');
              return false;
            }
          });
        });
      </script>

      <script>
        $(function() {
          $("#barang-autocomplete").autocomplete({
            source: "<?= base_url('farmasi/autobarang') ?>"
          });
        });
      </script>

      <script>
        $(document).ready(function() {
          $('#barang-autocomplete').keyup(function() {
            var nmbarang = $(this).val();
            $.ajax({
              url: "<?= base_url('farmasi/completebarang'); ?>",
              method: "get",
              data: {
                nmbarang: nmbarang
              },
              success: function(data) {
                obj = JSON.parse(data);
                //console.log(obj.kd_barang);
                $('#kdbarang').val(obj.kd_barang);
                $('#tipebarang').val(obj.tipe_barang);
                $('#satuan').val(obj.satuan);
                $('#stok').val(obj.stok);
              }
            });
          })
        });
      </script>

      <script>
        $(document).ready(function() {
          $('#hargasatuan').keyup(function() {
            var qty = $('#qty').val();
            var harga = $('#hargasatuan').val();

            var jumlah = qty * harga;
            $('#jumlah').val(jumlah);
            $('#jumlahtagihan').val(jumlah);
          })
        })
      </script>

      <script>
        // $('document').ready(function () {
        //  setInterval(function () {getRealData()}, 1000);//request every x seconds

        //  });

        // function getRealData() {
        // $.ajax({
        //          url: "",
        //          type: "POST",
        //          data: {
        //              name: name
        //          },
        //          cache: false,
        //          success: function (data) {

        //           $('#tampil').html(data);

        //          }
        //      })
        //  }
        $('#pulang').keyup(function() {
          var pulang = $('#pulang').val();
          var awal = $('#awal').val();
          var hasil = pulang - awal;
          $('#jarak').val(hasil);
        })
      </script>

      <script>
        $('#editTindakanModal').on('show.bs.modal', function(event) {
          var button = $(event.relatedTarget); // Button yang memicu modal
          var no = button.data('id'); // Ambil data dari atribut data-id
          var tindakan = button.data('tindakan');
          var biaya = button.data('biaya');
          var keterangan = button.data('keterangan');
          var kode = button.data('kode')

          var modal = $(this);
          // Isi nilai input di modal dengan data dari tombol
          modal.find('.modal-body #no').val(no);
          modal.find('.modal-body #tindakan').val(tindakan);
          modal.find('.modal-body #biaya').val(biaya);
          modal.find('.modal-body #keterangan').val(keterangan);
          modal.find('.modal-body #kode').val(kode);

          // Ubah action form agar sesuai dengan data 'no' pasien
          modal.find('#editTindakanForm').attr('action', '<?= base_url('billing/edittindakan/') ?>' + no + '/' + kode);
        });
      </script>
      </body>

      </html>