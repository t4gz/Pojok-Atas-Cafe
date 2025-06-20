<?php
    include '../php/koneksi.php';
?>

<hr>

<div class="container-fluid">
    <h1 class="h3 mb-2 text-gray-800 text-center">View Data</h1>
    <p class="mb-4 text-center">Disini terpapar Data-data yang ada di Snack.</p>
    <div class="card shadow mb-4">
        <div class="card-header py-3 bg-dark">
            <h6 class="m-0 font-weight-bold text-light">Table View Snack</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr class="text-center">
                            <th>No</th>
                            <th>Nama</th>
                            <th>Harga</th>
                            <th>Stok</th>
                            <th>Foto</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                        $sql = "SELECT * FROM cemilan";
                        $result = mysqli_query($konek, $sql);
                        $no = 1;

                        if (mysqli_num_rows($result) > 0) {
                            while($row = mysqli_fetch_assoc($result)) {
                                $id = $row['id_cemilan'];
                                $nama = $row['nama_cemilan'];
                                $harga = $row['harga_cemilan'];
                                $stok = $row['stok_cemilan'];
                                $foto = $row['gambar'];

                                echo "<tr>";
                                echo "<td class='text-center' width='2%'>$no</td>";
                                echo "<td width='15%'>$nama</td>";
                                echo "<td class='text-center' width='12%'>Rp " . number_format($harga, 0, ',', '.') . "</td>";
                                echo "<td class='text-center' width='12%'>$stok</td>";
                                echo "<td class='text-center'><img src='../images/$foto' style='width: 200px; height: auto;'></td>";
                                echo "</tr>";
                                $no++;
                            }
                        } else {
                            echo "0 results";
                        }

                        mysqli_close($konek);
                    ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
