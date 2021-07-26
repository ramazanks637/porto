<?php
include 'header.php';
include '../netting/baglan.php';

$slidersor = $db->prepare("SELECT * from slider where  slider_id =:slider_id");
$slidersor->execute(array(
    'slider_id' => $_GET['slider_id']
));
$slidercek = $slidersor->fetch(PDO::FETCH_ASSOC);
?>

<!-- /top navigation -->

<!-- page content -->
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Ayarlar</h3>
            </div>
            <!--
          <div class="title_right">
            <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
              <div class="input-group">
                <input type="text" class="form-control" placeholder="Anahtar Kelimeniz...">
                <span class="input-group-btn">
                  <button class="btn btn-default" type="button">Ara</button>
                </span>
              </div>
            </div>
          </div>
          -->
        </div>

        <div class="clearfix"></div>

        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">
                        <div class="x_title">
                            <div align="left" class="col-md-6">
                                <h2 >Slider işlemleri <small>
                                        <?php
                                        if (isset($_GET['durum'])) {
                                            if ($_GET['durum'] == 'ok') { ?>
                                                <b style="color:green;">İşlem Başarılı</b>
                                            <?php } elseif ($_GET['durum'] == 'no') { ?>
                                                <b style="color:#ff0000;">İşlem Başarısız</b>
                                            <?php }
                                        } ?></small></h2>
                            </div>
                            <div align="right" class="col-md-6">
                                <a href="slider.php"> <button class="btn btn-warning">
                                        <i class="fa fa-undo" aria-hidden="true"></i> Geri Dön
                                    </button></a>

                            </div>
                            <div class="clearfix"></div>
                        </div>

                        <div class="x_content">
                            <form action="../netting/islem.php" method="POST" enctype="multipart/form-data"
                                  id="demo-form2" data-parsley-validate
                                  class="form-horizontal form-label-left">


                                <input type="hidden" name="slider_id" value="<?php echo $slidercek['slider_id'] ?>">
                                <input type="hidden" name="slider_resimyol" value="<?php echo $slidercek['slider_resimyol'] ?>">

                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Seçili Resim<span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <img width="200" height="100" src="../../<?php echo $slidercek['slider_resimyol']?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Resim
                                        Seç<span class="required">*</span></label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="file" id="first-name"  name="slider_resimyol"
                                               class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Slider
                                        Ad<span class="required">*</span></label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="text" id="first-name" required="required" name="slider_ad"
                                               value="<?php echo $slidercek['slider_ad'] ?>"
                                               class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Slider
                                        Link<span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="text" id="first-name" name="slider_link"
                                               value="<?php echo $slidercek['slider_link'] ?>"
                                               class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Slider
                                        Sıra<span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="text" id="first-name" required="required" name="slider_sira"
                                               value="<?php echo $slidercek['slider_sira'] ?>"
                                               class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Slider
                                        Durum<span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <select id="heard" class="form-control" name="slider_durum" required>

                                            <?php

                                            if ($slidercek['slider_durum'] == 1) { ?>

                                                <option value="1">Aktif</option>
                                                <option value="0">Pasif</option>

                                            <?php } else { ?>

                                                <option value="0">Pasif</option>
                                                <option value="1">Aktif</option>

                                            <?php } ?>


                                        </select>
                                    </div>
                                </div>

                                <div align="right" class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                    <button type="submit" name="sliderduzenle" class="btn btn-primary">Kaydet
                                    </button>

                                </div>


                            </form>

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
