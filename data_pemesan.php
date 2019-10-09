<div id="frame-data-pengiriman">
    <h3>Alamat Prngiriman Barang</h3>

    <div id="frame-form-pengiriman">
        <form action="<?php echo BASE_URL."proses_pemesanan.php"; ?>" method="POST">
            <div class="element-form">
                <label>Nama Penerima</label>
                <span><input type="text" name="nama_penerima" /></span>
            </div>

            <div class="element-form">
                <label>Nomor Telepon</label>
                <span><input type="text" name="nomor_telepon" /></span>
            </div>

            <div class="element-form">
                <label>Alamat pengiriman</label>
                <span><textarea name="alamat"></textarea></span>
            </div>

            <div class="element-form">
                <label>Kota</label>
                <span>
                    <select name="kota">
                        <?php
                            $query = mysqli_query($koneksi, "SELECT * FROM kota");

                            while($row=mysqli_fetch_assoc($query)){
                                echo "<option value='$row[kota_id]>$row[kota]</option>";
                            }
                        ?>
                    </select>
                </span>
            </div>

            <div class="element-form">
                <span><input type="submit" value="submit" /></span>
            </div>
        </form>
    </div>
</div>

<div id="frame-data-detail">
    <h3>Detail Order</h3>                 

    <div id="frmae-detail-order">
        <table class="table-list">
            <tr>
                <th class="kiri">Nama Barang</th>
                <th class="tengah">Qty</th>
                <th class="kanan">Total</th>
            </tr>

            <?php 
                foreach($keranjang AS $key => $value){
                    $barang_id = $key;

                    $nama_barang = $value['nama_barang'];
                    $harga = $value['harga'];
                    $quantity = $value['quantity'];

                    $total = $quantity * $harga;
                    $subtotal = $subtotal + $total;

                    echo <tr>
                            <td class="kiri">$nama_barang</td>
                            <td class="tengah">$quantity</td>
                            <td class="kanan">".rupiah($total)."</td>
                        </tr>;
                }

                echo <tr>
                        <td class="kanan" colspan='2'><b>Subtotal</b></td>
                        <td class="kanan"><b>".rupiah($subtotal)."</b></td>
                    </tr>;
            ?>
        </table>
    </div>
</div>