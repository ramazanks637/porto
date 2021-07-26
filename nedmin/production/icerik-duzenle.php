<?php
include 'header.php';
include '../netting/baglan.php';

$iceriksor = $db->prepare("SELECT * from icerik where  icerik_id =:icerik_id");
$iceriksor->execute(array(
    'icerik_id' => $_GET['icerik_id']
));
$icerikcek = $iceriksor->fetch(PDO::FETCH_ASSOC);
?>
<head>
    <script src="https://cdn.ckeditor.com/4.16.0/standard/ckeditor.js"></script>
</head>

<!-- /top navigation -->

<!-- page content -->
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>İçerik İşlemleri</h3>
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
                                <h2 >İçerik işlemleri <small>
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
                                <a href="icerik.php"> <button class="btn btn-warning">
                                        <i class="fa fa-undo" aria-hidden="true"></i> Geri Dön
                                    </button></a>

                            </div>
                            <div class="clearfix"></div>
                        </div>

                        <div class="x_content">
                            <form action="../netting/islem.php" method="POST" enctype="multipart/form-data"
                                  id="demo-form2" data-parsley-validate
                                  class="form-horizontal form-label-left">


                                <input type="hidden" name="icerik_id" value="<?php echo $icerikcek['icerik_id'] ?>">
                                <input type="hidden" name="icerik_resimyol" value="<?php echo $icerikcek['icerik_resimyol'] ?>">

                                <div class="form-group">
                                    <label class="control-label col-md-2 col-sm-2 col-xs-12" for="first-name">Seçili Resim<span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <img width="200" height="100" src="../../<?php echo $icerikcek['icerik_resimyol']?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-2 col-sm-2 col-xs-12" for="first-name">Resim
                                        Seç<span class="required">*</span></label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="file" id="first-name"  name="icerik_resimyol"
                                               class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-2 col-sm-2 col-xs-12" for="first-name">İçerik
                                        Ad<span class="required">*</span></label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="text" id="first-name" required="required" name="icerik_ad"
                                               value="<?php echo $icerikcek['icerik_ad'] ?>"
                                               class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-2 col-sm-2 col-xs-12" for="first-name">İçerik Zaman<span class="required">*</span></label>

                                    <div class="col-md-3">
                                        <input type="date" id="first-name" required="required" value="<?php echo date('Y-m-d')?>" name="icerik_tarih"
                                               class="form-control col-md-7 col-xs-12">
                                    </div>
                                    <div class="col-md-2">
                                        <input type="time" id="first-name" required="required" value="<?php echo date('H:i:s')?>" name="icerik_saat"
                                               class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-2 col-sm-2 col-xs-12" for="first-name">İçerik<span class="required">*</span>
                                    </label>
                                    <div class="col-md-9 col-sm-9 col-xs-12">

                                        <textarea class="ckeditor" id="editor1" name="icerik_detay" ><?php echo $icerikcek['icerik_detay'] ?></textarea>

                                        <script type="text/javascript">

                                            CKEDITOR.replace('editor1',
                                                {
                                                    filebrowserBrowseUrl : 'ckfinder/ckfinder.html',
                                                    filebrowserImageBrowseUrl : 'ckfinder/ckfinder.html?type=Images',
                                                    filebrowserFlashBrowseUrl : 'ckfinder/ckfinder.html?type=Flash',
                                                    filebrowserUploadUrl : 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
                                                    filebrowserImageUploadUrl : 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
                                                    filebrowserFlashUploadUrl : 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash',
                                                    forcePasteAsPlainText: true
                                                }
                                            ); </script>
                                    </div>



                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-2 col-sm-2 col-xs-12" for="first-name">İçerik
                                        Durum<span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <select id="heard" class="form-control" name="icerik_durum" required>

                                            <?php

                                            if ($icerikcek['icerik_durum'] == 1) { ?>

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
                                    <button type="submit" name="icerikduzenle" class="btn btn-primary">Kaydet
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
