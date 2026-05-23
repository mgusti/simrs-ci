<div class="container-fluid">

    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
    <?= $this->session->flashdata('messege'); ?>

    <table class="table" id="example">
        <thead>
            <tr>
                <th scope="col">No.</th>
                <th scope="col">ID Tindakan</th>
                <th scope="col">Jenis Tindakan</th>

            </tr>
        </thead>
        <tbody>
        <?php
        
            $i=1;
            foreach ($tindakan as  $t):
        ?>
            <tr>
                <th scope="row"><?= $i++?></th>
                <td><?= $t['id_tindakan']?></td>
                <td><?= $t['nama_tindakan']?></td>
            </tr>
            <?php
                endforeach;
            ?>
        </tbody>
    </table>
</div>