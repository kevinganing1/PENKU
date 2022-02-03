<?php

  include "koneksi.php";
  

  session_start();
  if (!isset($_SESSION["user_id"])) {
    header ("location: ../Tampilan_Login/login.php");
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <link rel="stylesheet" href="style.css?v=<?php echo time(); ?>">
    <title>Penku Pengatur Keuangan</title>
</head>

<body>
    <!--Sidebar-->

    <div class="sidebar">
        <div class="penku">
            <h2>Penku</h2>
            <hr />
        </div>
        <div class="menu dashboard" id="dashboard">Dashboard</div>
        <div class="menu incomes" id="incomes">Pendapatan</div>
        <div class="menu spendings" id="spendings">Pengeluaran</div>
        <div class="menu settings" id="settings">Profile</div>
        <div class="menu logout" id="logout"><a href="logout.php">Logout</a></div>
    </div>
    <!-- Akhir Sidebar -->

    <!-- Profile -->
    <?php
        $tampiluser =mysqli_query($koneksi, "SELECT * FROM pelaku_ukm WHERE id ='$_SESSION[user_id]'");
        $user =mysqli_fetch_array($tampiluser);

    ?>

    <div class="main-settings" id="main-settings">
        <div class="user-title">
            <img src="../img/profil.svg" alt="">
            <p class="jurnal">Nama : <?=$user['username']?> </p>
            <p class="email">E-mail : <?=$user['email']?> </p>
            <a href="updateprofile.php" class="btn-update">Update Profile </a>
        </div>
    </div>
    <!-- Ahkir Profile -->

    <!-- Dashboard -->
    <?php
        $tampiluser =mysqli_query($koneksi, "SELECT * FROM pelaku_ukm WHERE id ='$_SESSION[user_id]'");
        $user =mysqli_fetch_array($tampiluser);
    ?>

    <div class="main-dashboard" id="main-dashboard">
        <div class="user-title">
            <p>Jurnal Keuangan Toko <?=$user['username']?></p>
        </div>
        <!-- <div class="month-dashboard">
            <p>Januari</p>
            <div class="triangle"></div>
        </div>
        <div class="dropdown-months">
            <ul>
                <li><a href="">Januari 2021</a></li>
                <li><a href="">Februari 2021</a></li>
                <li><a href="">Maret 2021</a></li>
                <li><a href="">April 2021</a></li>
                <li><a href="">Mei 2021</a></li>
                <li><a href="">Juni 2021</a></li>
                <li><a href="">Juli 2021</a></li>
                <li><a href="">Agustus 2021</a></li>
                <li><a href="">September 2021</a></li>
                <li><a href="">Oktober 2021</a></li>
                <li><a href="">November 2021</a></li>
                <li><a href="">Desember 2021</a></li>
            </ul>
        </div> -->

        <!-- Total pengeluaran -->
        <?php
        $tampilpengeluaran =mysqli_query($koneksi, "SELECT SUM(jumlah) AS jumlaah FROM pengeluaran WHERE 
        user_id='$_SESSION[user_id]'");
        $data = mysqli_fetch_array ($tampilpengeluaran);
         ?>

        <div class="white-small-box total-balance">
            <div class="circle-little"></div>
            <p>Total Pengeluaran</p>
            <h2 style="color:red">Rp.<?php echo number_format($data['jumlaah'], 2, ',' , '.') ?></h2>
        </div>
        <!-- Ahkir total pengeluaran -->


        <!-- Total pendapatan -->
        <?php
        $tampilpengeluaran =mysqli_query($koneksi, "SELECT SUM(jumlah) AS jumlaaah FROM pendapatan WHERE 
        user_id='$_SESSION[user_id]'");
        $data = mysqli_fetch_array ($tampilpengeluaran);
         ?>
        <div class="white-small-box target-saving">
            <div class="circle-little"></div>
            <p>Total Pendapatan</p>
            <h2 style="color:green">Rp.<?php echo number_format($data['jumlaaah'], 2, ',' , '.')?></h2>
        </div>
        <!-- Ahkir pendapatan -->

        <!-- Total saldo -->
        <?php
        $tampilpengeluaran =mysqli_query($koneksi, "SELECT ((SELECT SUM(jumlah) AS jumlaaah FROM 
        pendapatan WHERE 
        user_id='$_SESSION[user_id]') - (SELECT SUM(jumlah) AS jumlaah FROM pengeluaran WHERE 
        user_id='$_SESSION[user_id]')) AS total");
        
        $data = mysqli_fetch_array ($tampilpengeluaran);
         ?>

        <div class="white-small-box target-outcome" style="margin: 200px 0px 0px 275px; text-align: center;">
            <div class="circle-little"></div>
            <p>Saldo Total</p>
            <h2 style="color:green">Rp.<?php echo number_format($data['total'], 2, ',' , '.')?></h2>
        </div>
        <!-- Ahkir total saldo -->


        <div class="white-large-box incomes-progress" style="margin: 150px 0px 0px 530px;">
            <div class="circle-3">
                <div class="round" data-value="0.6" data-thickness="6" data-size="80">
                    <strong></strong>
                    <span>Penjualan</span>
                </div>
                <div class="round" data-value="0.1" data-thickness="6" data-size="80">
                    <strong></strong>
                    <span>Investasi</span>
                </div>
                <div class="round" data-value="0.3" data-thickness="6" data-size="80">
                    <strong></strong>
                    <span id="round-2">Kerjasama</span>
                </div>
            </div>
            <h2>Pendapatan</h2>
        </div>

        <div class="white-large-box spendings-progress " style="margin: 150px 0px 0px 900px;">
            <div class="circle-3">
                <div class="round" data-value="0.5" data-thickness="6" data-size="80">
                    <strong></strong>
                    <span id="bahan">Beli Bahan</span>
                </div>
                <div class="round" data-value="0.4" data-thickness="6" data-size="80">
                    <strong></strong>
                    <span>Makanan</span>
                </div>
                <div class="round" data-value="0.1  " data-thickness="6" data-size="80">
                    <strong></strong>
                    <span id="round-2">Kendaraan</span>
                </div>
            </div>
            <h2>Pengeluaran</h2>
        </div>

        <table class="fixed-header" style="width: 850px; margin:50px 0px 0px 10px;">
            <thead>
                <div class="row">
                    <form method="POST" action="">
                        <input type="date" name="tgl_mulai" class="tgl">
                        <input type="date" name="tgl_selesai">
                        <input type="submit" name="filter_tgl" value="Filter"
                            style=" margin-left: 3px; background-color: #4CAF50; border:none; color: white; padding: 5px 8px; cursor: pointer;">
                    </form>
                </div>
                <tr>
                    <th>No</th>
                    <th>Aktivitas</th>
                    <th>Total</th>
                    <th>Tanggal</th>
                </tr>
            </thead>
            <tbody class="table-body">
                <!-- lihat hasil input -->
                <?php
                    $no = 1;
                    $lihat = mysqli_query($koneksi, "SELECT * FROM pendapatan WHERE 
                            user_id='$_SESSION[user_id]'");
                    
                    // Filter
                        if(isset($_POST['filter_tgl'])){
                            $mulai = $_POST['tgl_mulai'];
                            $selesai = $_POST['tgl_selesai'];
                            if($mulai && $selesai){
                                $lihat = mysqli_query($koneksi, "SELECT * FROM pendapatan 
                                WHERE user_id='$_SESSION[user_id]' AND  tanggal 
                                BETWEEN '$mulai' AND '$selesai' 
                                ORDER BY tanggal DESC");
                            }
                            
                            
                        }
                    // Ahkir Filter
                      
                      while($data = mysqli_fetch_array($lihat))
                      {
                    
                    ?>
                <!-- akhir lihat hasil input -->
                <tr>
                    <!-- Mengambil data di tabel  -->
                    <td><?= $no++ ?></td>
                    <td><?= $data['kategori']; ?></td>
                    <td style="color: green">Rp.<?= number_format($data['jumlah'], 2, ',' , '.') ?></td>
                    <td><?= $data['tanggal']; ?></td>
                </tr>
                <!-- tutup php -->
                <?php } ?>
                <!-- lihat hasil input -->
                <?php
                       
                        $lihat = mysqli_query($koneksi, "SELECT * FROM pengeluaran WHERE 
                                user_id='$_SESSION[user_id]'");
                        
                        // Filter
                            if(isset($_POST['filter_tgl'])){
                                $mulai = $_POST['tgl_mulai'];
                                $selesai = $_POST['tgl_selesai'];
                                if($mulai && $selesai){
                                    $lihat = mysqli_query($koneksi, "SELECT * FROM pengeluaran 
                                    WHERE user_id='$_SESSION[user_id]' AND  tanggal 
                                    BETWEEN '$mulai' AND '$selesai' 
                                    ORDER BY tanggal DESC");
                                }
                                
                                
                            }
                      
                      while($data = mysqli_fetch_array($lihat))
                      {
                    
                    ?>
                <!-- akhir lihat hasil input -->
                <tr>
                    <!-- Mengambil data di tabel  -->
                    <td><?= $no++ ?></td>
                    <td><?= $data['kategori']; ?></td>
                    <td style="color: red">Rp.<?= number_format($data['jumlah'], 2, ',' , '.') ?></td>
                    <td><?= $data['tanggal']; ?></td>
                </tr>
                <!-- tutup php -->
                <?php } ?>
            </tbody>
        </table>
    </div>
    <!-- Akhir Dashboard -->

    <!-- Pendapatan -->
    <div class="main-incomes" id="main-incomes">
        <div class="white-large-x-box input-incomes">
            <form action="prosesinput_incomes.php" method="POST">
                <input type="hidden" id="fname" name="user_id" value="<?php echo $_SESSION['user_id']  ?>" required>
                <label for="fname">Kategori</label>
                <input type="text" id="fname" name="kategori" required />
                <label for="fname">Deskripsi</label>
                <input type="text" id="fname" name="deskripsi" required />
                <label for="fname">Jumlah</label>
                <input type="text" id="fname" name="jumlah" required />
                <input type="date" id="fname" name="tanggal" required />
                <input type="submit" id="submit-button" value="Kirim"
                    style="background-color: #4CAF50; border:none; color: white; padding: 8px 10px; cursor: pointer; " />
            </form>
        </div>
        <div class="white-large-x-box table-incomes">
            <table class="fixed-header-incomes">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Aktivitas</th>
                        <th>Total</th>
                        <th>Tanggal</th>
                    </tr>
                </thead>
                <tbody class="table-body">
                    <!-- lihat hasil input -->
                    <?php
                      $no = 1;
                      $lihat = mysqli_query($koneksi, "SELECT * FROM pendapatan WHERE 
                      user_id='$_SESSION[user_id]'");
                      
                      while($data = mysqli_fetch_array($lihat))
                      {
                    
                    ?>
                    <!-- akhir lihat hasil input -->
                    <tr>
                        <!-- Mengambil data di tabel  -->
                        <td><?= $no++ ?></td>
                        <td><?= $data['kategori']; ?></td>
                        <td style="color: green">Rp<?= number_format($data['jumlah'], 2, ',' , '.') ?></td>
                        <td><?= $data['tanggal']; ?></td>
                    </tr>
                    <!-- tutup php -->
                    <?php } ?>
                </tbody>

            </table>
        </div>
        <div class="white-big-box incomes-progress-bar">
            <div class="bar-incomes">
                <li>
                    <h3>Penjualan</h3><span class="bar"><span class="bar-1"></span></span>
                </li>
                <li>
                    <h3>Investasi</h3><span class="bar"><span class="bar-2"></span></span>
                </li>
                <li>
                    <h3>Kerjasama</h3><span class="bar"><span class="bar-3"></span></span>
                </li>
                <li>
                    <h3>Saham</h3><span class="bar"><span class="bar-4"></span></span>
                </li>
                <li>
                    <h3>Sampingan</h3><span class="bar"><span class="bar-5"></span></span>
                </li>
            </div>
        </div>

    </div>

    <!-- Akhir Pendapatan -->

    <!-- Pengeluaran -->
    <div class="main-spendings" id="main-spendings">
        <div class="white-large-x-box input-spendings">
            <form action="prosesinput_pengeluaran.php" method="POST">
                <input type="hidden" id="fname" name="user_id" value="<?php echo $_SESSION['user_id']  ?>" required>
                <label for="fname">Kategori</label>
                <input type="text" id="fname" name="kategori" required />
                <label for="fname">Deskripsi</label>
                <input type="text" id="fname" name="deskripsi" required />
                <label for="fname">Jumlah</label>
                <input type="text" id="fname" name="jumlah" required />
                <input type="date" id="fname" name="tanggal" required />
                <input type="submit" id="submit-button" value="Kirim"
                    style="background-color: #4CAF50; border:none; color: white; padding: 8px 10px; cursor: pointer; " />
        </div>
        <div class="white-large-x-box table-spendings">
            <table class="fixed-header-spendings">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Aktivitas</th>
                        <th>Total</th>
                        <th>Tanggal</th>
                    </tr>
                </thead>
                <tbody class="table-body">
                    <!-- lihat hasil input -->
                    <?php
                      $nomor = 1;
                      $lht = mysqli_query($koneksi, "SELECT * FROM pengeluaran WHERE 
                      user_id='$_SESSION[user_id]'");
                      
                      while($data = mysqli_fetch_array($lht))
                      {
                    
                    ?>
                    <!-- akhir lihat hasil input -->
                    <tr>
                        <!-- Mengambil data di tabel  -->
                        <td><?= $nomor++ ?></td>
                        <td><?= $data['kategori']; ?></td>
                        <td style="color: red">Rp<?= number_format($data['jumlah'], 2, ',' , '.') ?></td>
                        <td><?= $data['tanggal']; ?></td>
                    </tr>
                    <!-- tutup php -->
                    <?php } ?>
                </tbody>
            </table>
        </div>
        <div class="white-big-box spendings-progress-bar">
            <div class="bar-spendings">
                <li>
                    <h3>Beli bahan</h3><span class="bar"><span class="bar-1"></span></span>
                </li>
                <li>
                    <h3>Makanan</h3><span class="bar"><span class="bar-2"></span></span>
                </li>
                <li>
                    <h3>Bensin</h3><span class="bar"><span class="bar-3"></span></span>
                </li>
                <li>
                    <h3>Pajak</h3><span class="bar"><span class="bar-4"></span></span>
                </li>
                <li>
                    <h3>Hobi</h3><span class="bar"><span class="bar-5"></span></span>
                </li>
            </div>
        </div>

    </div>
    <!-- Akhir pengeluaran -->

    <!-- JS -->
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-circle-progress/1.2.2/circle-progress.js">
    </script>
    <script>
    function Circlle(el) {
        $(el)
            .circleProgress({
                fill: {
                    color: "#ff5c5c"
                }
            })
            .on("circle-animation-progress", function(event, progress, stepValue) {
                $(this)
                    .find("strong")
                    .text(String(stepValue.toFixed(2)).substr(2) + "%");
            });
    }
    Circlle(".round");
    </script>
    <script src="script.js"></script>
</body>

</html>