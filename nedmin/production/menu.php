<?php
include 'header.php';
include '../netting/baglan.php';

if (isset($_POST['arama'])) {
    $aranan = $_POST['aranan'];
    $menusor = $db->prepare("select * from menu where menu_ad LIKE '%$aranan%' order by menu_id ASC limit 25");
    $menusor->execute();
    $say = $menusor->rowCount();
} else {
    $menusor = $db->prepare("select * from menu order by menu_sira ASC limit 25");
    $menusor->execute();
    $say = $menusor->rowCount();
}


?>

<!-- /top navigation -->

<!-- page content -->
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">

        </div>
        <div class="col-md-12">
            <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">

                    <form action="" method="POST">
                        <div class="input-group">
                            <input type="text" class="form-control" name="aranan"
                                   placeholder="Anahtar Kelime Giriniz...">
                            <span class="input-group-btn">
                      <button class="btn btn-default" type="submit" name="arama">Ara!</button>
                    </span>
                        </div>
                    </form>
                </div>
            </div>
        </div>


        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">
                        <div class="x_title">
                            <div align="left" class="col-md-6">
                                <h2>Menü işlemleri <small>
                                        <?php
                                        echo $say . " Kayıt Listelendi";
                                        if (isset($_GET['durum'])) {
                                            if ($_GET['durum'] == 'ok') { ?>
                                                <b style="color:green;">İşlem Başarılı</b>
                                            <?php } elseif ($_GET['durum'] == 'no') { ?>
                                                <b style="color:#ff0000;">İşlem Başarısız</b>
                                            <?php }
                                        } ?></small></h2>
                            </div>
                            <div align="right" class="col-md-6">
                                <a href="menu-ekle.php">
                                    <button class="btn btn-danger">
                                        <i class="fa fa-plus" aria-hidden="true"></i> Yeni Ekle
                                    </button>
                                </a>

                            </div>
                            <div class="clearfix"></div>
                        </div>

                        <div class="x_content">
                            <div class="table-responsive">
                                <table class="table table-striped jambo_table bulk_action">
                                    <thead>
                                    <tr class="headings">


                                        <th class="column-title ">Menü Ad</th>
                                        <th class="column-title text-center">Üst Menü</th>
                                        <th class="column-title text-center">Menü Sıra</th>
                                        <th class="column-title text-center">Menü Durum</th>
                                        <th width="80" class="column-title"></th>
                                        <th width="80" class="column-title"></th>


                                    </tr>
                                    </thead>

                                    <tbody>

                                    <?php
                                    while ($menucek = $menusor->fetch(PDO::FETCH_ASSOC)) {
                                        ?>
                                        <tr>

                                            <td><?php echo $menucek['menu_ad'] ?></td>
                                            <td class="text-center "><?php echo $menucek['menu_ust'] ?></td>
                                            <td class="text-center "><?php echo $menucek['menu_sira'] ?></td>
                                            <td class="text-center "><?php

                                                if ($menucek['menu_durum'] == "1") {
                                                    echo "AKTİF";
                                                } else {
                                                    echo "PASİF";
                                                }
                                                ?>

                                            </td>


                                            <td class="text-center ">
                                                <a href="menu-duzenle.php?menu_id=<?php echo $menucek['menu_id'] ?>">
                                                    <button style="width: 80px" class="btn btn-primary btn-xs"><i
                                                                class="fa fa-pencil" aria-hidden="true"></i> Düzenle
                                                    </button>
                                                </a>
                                            </td>


                                            <td class="text-center "><a
                                                        href="../netting/islem.php?menusil=ok&menu_id=<?php echo $menucek['menu_id'] ?>">
                                                    <button style="width: 80px" class="btn btn-danger btn-xs">
                                                        <i class="fa fa-pencil" aria-hidden="true"></i> Sil
                                                    </button>
                                                </a>
                                            </td>


                                        </tr>
                                    <?php } ?>


                                    </tbody>

                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /page content -->

<!-- footer content -->


<?php include 'footer.php'; ?>
