<?php
    include '../php/koneksi.php';
?>

<hr>

<div class="container-fluid">
                <!-- Page Heading -->
                <h1 class="h3 mb-2 text-gray-800 text-center">Edit dan Hapus data </h1>
                <p class="mb-4 text-center">Berguna jika ingin memodifikasi data</p>
                <!-- DataTales Example -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3  bg-dark ">
                        <h6 class="m-0 font-weight-bold text-light">Table Edit dan Hapus Minuman</h6>
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
                                    <th>Opsi</th>
                                </tr>
                            </thead>
                                <tbody>
                                <?php
                                    $sql = "SELECT * FROM minuman";
                                    $result = mysqli_query($konek, $sql);
                                    $no = 1;
                                    
                                    if (mysqli_num_rows($result) > 0) {
                                    // output data of each row
                                    while($row = mysqli_fetch_assoc($result)) {

                                        $id = $row['id_minuman'];
                                        $nama = $row['nama_minuman'];
                                        $harga = $row['harga_minuman'];
                                        $stok = $row['stok_minuman'];
                                        $foto = $row['gambar'];


                                        echo "<tr>";
                                        echo "<td class='text-center' width='2%'>$no</td>";
                                        echo "<td width='15%'>$nama</td>";
                                        echo "<td class='text-center' width='12%'>Rp " . number_format($harga, 0, ',', '.') . "</td>";
                                        echo "<td class='text-center' width='12%'>$stok</td>";
                                        echo "<td class='text-center'><img src='../pages/data/uploads/$foto' style='width: 200px; height: auto;'></td>";

                                        echo "<td class='text-center' width='10%'>";

                                        echo "<a href='data/Minuman_Edit.php?id=$id' class='btn btn-sm btn-success'>Edit</a>";
                                        echo "<hr>";
                                        echo "<a href='data/Minuman_DeleteProcess.php?id=$id' class='btn btn-sm btn-danger' onclick=\"return confirm('Yakin ingin menghapus data ini?');\">Hapus</a>";

                                        echo "</td>";

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
