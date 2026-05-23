<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Surat Jalan</title>
</head>
<style>
    img {
        width: 80px;
    }

    hr {
        border: 5px solid;
        border-radius: 5px;
    }

    .kolom {
        float: left;
        width: 50%;
        padding: 10px;
        height: auto;
    }



    .rows:after {
        content: "";
        display: table;
        clear: both;
    }

    @media screen and (max-width: 600px) {
        .column {
            width: 100px;
        }
    }
</style>

<body>
    <div class="container  mt-5 ">
        <div style="text-align: justify;" class="mt-2 mb-2">
            <img src="<?= base_url('assets/img/logo.png') ?>" style="float: left; margin: 0px 9px 3px 0px;" />
            <h2>RSUD H. ABDUL MANAP KOTA JAMBI</h2>
            <span>Jl. Raden Syahbudin, Mayang Mangurai, Alam Barajo, Kota Jambi, Jambi 36129</span>
            <br>
            <br>
            <hr>
        </div>

        <h3 class="text-center"> SURAT JALAN PENGGUNAAN AMBULANCE</h3>
        <h5 class="text-center">Nomor : <?= $surat['nomor'] ?></h5>

        <div class="container ">
            <div class="rows">
                <div class="kolom d-flex justify-content-center">
                    <table>
                        <tr>
                            <th>Nomor Polisi</th>
                            <th>:</th>
                            <td><?= $surat['nopol'] ?></td>

                        </tr>
                        <tr>
                            <th>Driver</th>
                            <th>:</th>
                            <td><?= $surat['supir'] ?></td>
                            <td></td>

                        </tr>
                    </table>
                </div>

                <div class="kolom d-flex justify-content-center">
                    <table>
                        <tr>
                            <th>Tgl Berangkat</th>
                            <th>:</th>
                            <td><?= $surat['tgl_jalan'] ?></td>
                        </tr>
                        <tr>
                            <th>Jam Berangkat</th>
                            <th>:</th>
                            <td><?= $surat['jam'] ?></td>
                        </tr>
                    </table>
                </div>
            </div>

        </div>

        <div class=" mt-3 ">
            <p> Dengan ini menerangkan bahawa ambulance ini sedang digunakan</p>
            <table class="table table-bordered">
                <tr>
                    <th>Oleh</th>

                    <td><?= $surat['pengguna'] ?></td>
                </tr>
                <tr>
                    <th>Tujuan</th>

                    <td><?= $surat['tujuan'] ?></td>
                </tr>
                <tr>
                    <th>Keperluan</th>

                    <td><?= $surat['keperluan'] ?></td>
                </tr>
            </table>
        </div>



        <table class="text-center kolom">
            <tr>
                <th><br></th>
            </tr>
            <tr>
                <td>Driver</td>
            </tr>
            <tr>
                <td></td>
            </tr>
            <tr>
                <td><br></td>
            </tr>
            <tr>
                <td><br></td>
            </tr>
            <tr>
                <td><?= $surat['supir'] ?></td>
            </tr>
        </table>
        <table class="text-center kolom">
            <tr>
                <th>
                    <?= $surat['tgl_jalan'] ?>
                </th>
            </tr>
            <tr>
                <td>Petugas</td>
            </tr>
            <tr>
                <td></td>
            </tr>
            <tr>
                <td><br></td>
            </tr>
            <tr>
                <td><br></td>
            </tr>
            <tr>
                <td><?= $surat['petugas'] ?></td>
            </tr>
        </table>



    </div>



    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>