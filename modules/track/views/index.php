<?php
	include('theme/header.php');
	include('theme/menu.php');
  $t = rand(100000000,999999999);
?>

      <div class="ms-hero-page ms-hero-img-city ms-hero-bg-primary mb-4">
        <div class="container">
          <div class="text-center">
            <h1 class="no-m ms-site-title color-white center-block ms-site-title-lg mt-2 animated zoomInDown animation-delay-5">สถานะการสั่งซื้อ</h1>
            <p class="lead lead-lg color-light text-center center-block mt-2 mw-800 text-uppercase fw-300 animated fadeInUp animation-delay-7 mb-4">
              <span class="color-warning">
                รหัสการสั่งซื้อของคุณคือ TH<?php echo $t;?>
              </span>
            </p>
            <!-- <a href="javascript:void(0)" class="btn btn-raised btn-white color-primary">
              <i class="zmdi zmdi-desktop-mac"></i> View Projects
            </a> -->
          </div>
        </div>
      </div>
      <!-- <label class="col-cs-1"></label> -->
      <div class="container container-full">
        <div class="">
          <div class="row">
            <div class="col-lg-12 ms-paper-menu-left-container">
              <div class="ms-paper-menu-left">
                <div class="col-lg-12 ms-paper-content-container">
                  <div class="ms-paper-content">
                    <section class="ms-component-section">
                      <h2 class="section-title">Tracking <?php echo 'TH'.$t;?></h2>
                      <input type="text" class="ms-slider" data-slider-ticks="[0, 100, 200, 300, 400]" data-slider-ticks-snap-bounds="5" data-slider-value="200" data-slider-ticks-labels='["ยืนยันการสั่งซื้อ", "เคอร์รี่เข้ารับพัสดุแล้ว", " พัสดุถึงสาขาปลายทาง", "พัสดุรอนำส่ง", "ถึงมือผู้รับแล้ว"]' />
                    </section>
                  </div>
                  <!-- ms-paper-content -->
                </div>
                <!-- col-lg-9 -->
              </div>
            </div>
          </div>
        </div>
      </div>

<?php
	include("theme/footer.php");
?>
