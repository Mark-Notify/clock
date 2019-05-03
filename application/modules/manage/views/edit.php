<?php
	include('theme/header.php');
	include('theme/menu.php');
?>
<?php
	foreach ($products as $key => $rows) {
		# code...
	}
?>
            <!-- col-lg-3 -->
        <div class="container-fluid ms-hero ms-hero-img-wall ms-bg-fixed pb-4">
          <div class="row">
            <span class="col-lg-1"></span>
            <div class="order-lg-2 col-lg-5">
            <h2 class="section-title">แก้ไขสินค้า</h2>
              <div class="col-lg-12 ms-paper-content-container">
                <div class="ms-paper-content">
                  <section class="ms-component-section">
                    <h4 class="color-warning">ภาษาไทย</h4>
                      <form action="<?= base_url('manage/update_item') ?>" method="post" class="form-horizontal" enctype="multipart/form-data">
                      <fieldset>

                        <div class="form-group row">
                          <div class="col-lg-12">
                          <label for=""  class="">ชื่อสินค้า<strong>ภาษาไทย</strong> </label>
                          	<input type="hidden" name="id" value="<?php echo $rows['id'] ?>">
                            <input type="text" name="name_th" class="form-control" id="" placeholder="กรุณาใส่ชื่อสินค้า." value="<?php echo $rows['name_th'] ?>" style="color: #fff;" required="">
                          </div>
                            <!-- <span class="help-block">Input Your Name.</span> -->
                        </div>

                        <div class="form-group row">
                          <div class="col-lg-12">
                          <label for="inputFile" class="">เพิ่มรูปภาพ</label>
                            <input type="text" readonly="" class="form-control" placeholder="เลือกรูปภาพ..." style="color: #fff;">
                            <input type="file" name="file[]" id="inputFile">
                          </div>
                        </div>

												<div class="form-group row">
                          <div class="col-lg-10">
                          <label for=""  class="">ประเภทสินค้า</label>
                            <div class="radio radio-primary">
                              <label>
                                <input type="radio" name="cate" value="watch" required="" checked=""> นาฬิกา
                              </label>
                              <label>
                                <input type="radio" name="cate" value="part" required=""> อะไหล่
                              </label>
                            </div>
                          </div>
                        </div>

                        <div class="form-group row">
                          <div class="col-lg-12">
                          <label for="textArea" class="">รายละเอียดสินค้า<strong>ภาษาไทย</strong></label>
                            <textarea name="detail_th" class="form-control" rows="10" id="textArea" style="color: #fff;" required=""><?php echo $rows['detail_th'] ?></textarea>
                          </div>
                        </div>

                      </fieldset>
                    <!-- card-code -->
                  </section>
                </div>
              </div>
            </div>

            <div class="order-lg-2 col-lg-5">
              <div class="col-lg-12 ms-paper-content-container">
                <div class="ms-paper-content">
                  <section class="ms-component-section">
                    <h2 class="section-title">&nbsp;</h2>
                      <h4 class="color-warning">ภาษาอังกฤษ</h4>
                      <fieldset>
                        <div class="form-group row">
                          <div class="col-lg-12">
                          <label for=""  class="">ชื่อสินค้า<strong>ภาษาอังกฤษ</strong></label>
                            <input type="text" name="name_en" class="form-control" id="" value="<?php echo $rows['name_en'] ?>" placeholder="กรุณาใส่ชื่อสินค้า." style="color: #fff;" required="">
                          </div>
                            <!-- <span class="help-block">Input Your Name.</span> -->
                        </div>

												<div class="form-group row">
                          <div class="col-lg-6">
                          <label for=""  class="">ราคาสินค้าก่อนลดราคา</label>
                            <input type="number" pattern="[0-9]*" name="price" class="form-control" id="" value="<?php echo $rows['price_full'] ?>" placeholder="ระบุตัวเลข." style="color: #fff;" required="">
                          </div>
                          <div class="col-lg-6">
                          <label for=""  class="">ราคาสินค้าหลังลดราคา</label>
                            <input type="number" pattern="[0-9]*" name="price" class="form-control" id="" value="<?php echo $rows['price'] ?>" placeholder="ระบุตัวเลข." style="color: #fff;" required="">
                          </div>
                        </div>

                        <div class="form-group row">
                          <div class="col-lg-12">
                          <label for=""  class="">ส่วนลดเป็นเปอร์เซ็น</label>
                            <input type="number" pattern="([0-9]|[0-9]|[0-9])" maxlength="3" name="sale" value="<?php echo $rows['sale'] ?>" class="form-control" id="" placeholder="ระบุส่วนลด(เป็นเปอร์เซ็น)." style="color: #fff;" required="">
                          </div>
                            <!-- <span class="help-block">Input Your Name.</span> -->
                        </div>

                        <div class="form-group row">
                          <div class="col-lg-12">
                          <label for="textArea" class="">รายละเอียดสินค้า<strong>ภาษาอังกฤษ</strong></label>
                            <textarea name="detail_en" id="detail_en" class="form-control" rows="10" id="textArea"style="color: #fff;" required=""><?php echo $rows['detail_en'] ?></textarea>
                          </div>
                        </div>

                        <div class="form-group row" style="margin-left: -144px;margin-top: 18px;">
                          <div class="col-lg-10">
                            <button type="submit" class="btn btn-raised btn-primary">บันทึก</button>
                            <a href="<?= base_url("manage") ?>">
                              <button type="button" class="btn btn-danger">cancel</button>
                            </a>
                          </div>
                        </div>
                      </fieldset>

                    </form>
                    <!-- card-code -->
                  </section>
                </div>
              </div>
            </div>

          </div>
        </div>



<?php
	include("theme/footer.php");
?>

<script>
  CKEDITOR.replace( 'detail_en' );
  CKEDITOR.replace( 'detail_th' );
</script>