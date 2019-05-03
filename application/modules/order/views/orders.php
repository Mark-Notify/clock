<?php
	include('theme/header.php');
	include('theme/menu.php');
?>

  <?php
    $grand_total = 0;
    // Calculate grand total.
    if ($cart = $this->cart->contents()):
    foreach ($cart as $data):
    $grand_total = $grand_total + $data['subtotal'];
    endforeach;
    endif;
  ?>

      <div class="container-fluid ms-hero ms-hero-img-wall ms-bg-fixed pb-4">
        <div class="row index-1">
          
          <div class="order-lg-2 col-lg-2">
            <div class="col-md-12">
              <div class="card card-royal text-center">
                <div class="card-body">
                  <span class="ms-icon ms-icon-circle ms-icon-xlg color-royal">
                    <i class="fa fa-cart-plus"></i>
                  </span>
                  <h2 class="color-royal">
                    <span class="counter"><?= number_format("$grand_total"); ?></span>
                  </h2>
                  <h4 class="color-royal">Cart Total</h4>
                </div>
              </div>
            </div>
            <h4 class="color-primary" align="center" style="background-color: #9C27B0; border-radius: 200rem">นาย กฤษณะ ศิริโท <br>9838-4291-63<br>ธนาคารกรุงไทย</h4>
          </div>

          <div class="order-lg-2 col-lg-7">
            <div class="col-lg-12 ms-paper-content-container">
              <div class="ms-paper-content">
                <section class="ms-component-section">
                  <h2 class="section-title">Check Out</h2>
                  
                  <form action="<?= site_url('order/save_order') ?>" method="post" class="form-horizontal" autocomplete="off">
                    <fieldset>

                      <div class="form-group row">
                        <label for="" autocomplete="false" class="col-lg-2 control-label">ชื่อ</label>
                        <div class="col-lg-10">
                          <input type="text" name="name" class="form-control" id="" placeholder="Input Your Name." style="color: #fff;" required="กรุณาใส่ชื่อ"> 
                        </div>
                          <span class="help-block">Input Your Name.</span>
                      </div>

                      <div class="form-group row justify-content-end">
                        <label for="textArea" class="col-lg-2 control-label">ที่อยู่</label>
                        <div class="col-lg-10">
                          <textarea name="address" class="form-control" rows="3" id="textArea" style="color: #fff;" required=""></textarea>
                          <span class="help-block">Input Your Address.</span>
                        </div>
                      </div>

                      <div class="form-group row">
                        <label for="" autocomplete="false" class="col-lg-2 control-label">Email</label>
                        <div class="col-lg-10">
                          <input type="mail" name="email" class="form-control" id="" placeholder="Input Your Email." style="color: #fff;" required=""> 
                        </div>
                      </div>

                      <div class="form-group row">
                        <label for="" autocomplete="false" class="col-lg-2 control-label">เบอร์มือถือ</label>
                        <div class="col-lg-10">
                          <input type="number" name="phone" class="form-control" pattern="[0-9]*" id="" placeholder="Input Your Phone Number." style="color: #fff;" required=""> 
                        </div>
                      </div>

                      <div class="form-group row justify-content-end row" style="margin-top: 0;">
                        <label for="" autocomplete="false" class="col-lg-2 control-label">สถานะการจ่ายเงิน</label>
                        <div class="col-lg-10">
                          <div class="checkbox">
                            <label>
                              <input type="checkbox" name="status" value="Y" required=""> จ่ายแล้ว 
                            </label>
                            <span class="help-block" style="color: red;">
                            ชำระสินค้าผ่าน QR Code พร้อมเพย์ด้านขวามือ.
                          </span>
                          </div>
                        </div>
                      </div>

                      <div class="form-group row justify-content-end">
                        <div class="col-lg-10">
                          <button type="submit" class="btn btn-raised btn-primary">บันทึก</button>
                          <button type="reset" class="btn btn-danger">Clear</button>
                        </div>
                      </div>
                    </fieldset>
                  </form>
                  <!-- card-code -->
                </section>
              </div>
            </div>
          </div>

          <div class="order-lg-2 col-lg-3">
            <div class="col-md-12">
              <h4 class="color-warning" align="center" style="background-color: #9C27B0; border-radius: 200rem">ชำระสินค้าผ่านบริการพร้อมเพย์ <br> หลังจากนั้นกดบันทึกข้อมูล
              </h4>
              <img src="<?= base_url("/images/PP.jpg"); ?>" width="100%">

            </div>
          </div>

        </div>
      </div>

<?php
	include("theme/footer.php");
?>
