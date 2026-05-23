  <!-- Begin Page Content -->
  <div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <div class="row">
      <div class="col-lg">
        <table class="table">
          <thead class="thead-light">
            <tr>
              <th scope="col">#</th>
              <th scope="col">NAMA KAMAR</th>
              <th scope="col">JUMLAH BED</th>
              <th scope="col">BED TERISI</th>
              <th scope="col">BED KOSONG</th>

            </tr>

          </thead>
          <tbody>
            <?php $i = 1; ?>
            <?php foreach ($bgsl as $bg) : ?>
              <tr>
                <th scope="row"><?= $i; ?></th>
                <td><?= $bg['nm_bangsal'];  ?></td>
                <td></td>
                <td>@mdo</td>
                <td>@mdo</td>
              </tr>
              <?php $i++; ?>
            <?php endforeach; ?>
          </tbody>
        </table>

      </div>
    </div>

  </div>
  <!-- /.container-fluid -->

  </div>
  <!-- End of Main Content -->