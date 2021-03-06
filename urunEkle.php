<?php
require "header.php";
?>

<title>Ürün Ekle</title>

<section>
    <div class="personelEkle background-photo">
        <form action="" method="POST" class="personelForm">
            <div class="personelIsımler" style="margin-left:400px">
                <input type="text" name="urunAdi" placeholder="Ürün Adı" value="">
                <input type="text" name="urunStok" placeholder="Ürün Stok" value="">
                <select style="height: 50px; width:200px;" name="kategori">
                    <option value="">Kategori Seçiniz</option>
                    <?php
                    $sorgu2 = $dbbaglanti->prepare("SELECT * FROM kategori");
                    $sorgu2->execute();
                    while ($satir2 = $sorgu2->fetch(PDO::FETCH_ASSOC)) { ?>
                        <option value="<?= $satir2["kategoriId"] ?>"><?= $satir2["kategoriAdi"] ?></option>

                    <?php

                    }
                    ?>
                </select>
                <select style="height: 50px; width:200px;" name="marka">
                    <option value="">Marka Seçiniz</option>
                    <?php
                    $sorgu2 = $dbbaglanti->prepare("SELECT * FROM markalar");
                    $sorgu2->execute();
                    while ($satir2 = $sorgu2->fetch(PDO::FETCH_ASSOC)) { ?>
                        <option value="<?= $satir2["markaId"] ?>"><?= $satir2["markaAdi"] ?></option>

                    <?php

                    }
                    ?>
                </select>
                <select style="height: 50px; width:200px;" name="cinsiyet">
                    <option value="">Cinsiyet Seçiniz</option>
                    <option value="E">Erkek</option>
                    <option value="K">Kadın</option>
                    <option value="U">Unisex</option>
                </select>
                <select style="height: 50px; width:200px;" name="urunNumara">
                    <option value="">Numara Seçiniz</option>
                    <?php
                    for ($i = 35; $i <= 45; $i++) {
                    ?>
                        <option value="<?= $i ?>"><?= $i ?></option>
                    <?php
                    }

                    ?>
                </select>
                <select style="height: 50px; width:200px;" name="renk">
                    <option value="">Renk Seçiniz</option>
                    <?php
                    $renkler = array("Siyah", "Gri", "Beyaz", "Kırmızı", "Sarı", "Yeşil", "Mavi", "Mor", "Turuncu", "Pembe");
                    foreach ($renkler as $renk) { ?>
                        <option value="<?= $renk ?>"><?= $renk ?></option>
                    <?php

                    }
                    ?>
                </select>
            </div>
            <div class="personelGiris">
                <button class="personelEkleKaydet btn btn-purple" type="submit" name="personelEkleButton">Kaydet</button>
            </div>
        </form>
    </div>
</section>
<?php
if (isset($_POST["personelEkleButton"])) {
    $sorgu = $dbbaglanti->prepare("INSERT INTO urunler SET urunAdi = ?, urunStok = ?, urunKategoriId = ?, urunMarka = ?, urunCinsiyet = ?, urunNumara = ?, urunRenk = ?");
    $sorgu->execute(array(
        $_POST["urunAdi"], $_POST["urunStok"], $_POST["kategori"], $_POST["marka"], $_POST["cinsiyet"], $_POST["urunNumara"], $_POST["renk"]
    ));
}
?>

</body>

</html>