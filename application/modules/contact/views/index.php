<?php
	include('theme/header.php');
	include('theme/menu.php');
?>
      <div class="ms-hero-page-override ms-hero-img-team ms-hero-bg-royal">
        <div class="container">
          <div class="text-center">
            <h1 style="font-family: 'Prompt', sans-serif;" class="no-m ms-site-title color-white center-block ms-site-title-lg mt-2 animated zoomInDown animation-delay-5">รายชื่อสมาชิกกลุ่ม</h1>
            <!-- <p class="lead lead-lg color-light text-center center-block mt-2 mw-800 text-uppercase fw-300 animated fadeInUp animation-delay-7">This is what our customers say about us and our products. Get to know the
              <span class="color-warning">Material Style</span> experience today.</p> -->
          </div>
        </div>
      </div>

      <div class="container">
        <div class="card card-hero card-flat bg-transparent">
          <div class="row">
            <div class="col-lg-4 col-md-6">
              <div class="card mt-4 card-primary wow zoomInUp animation-delay-7">
                <div class="ms-hero-bg-primary ms-hero-img-coffee">
                  <h3 class="color-white index-1 text-center no-m pt-4">Kritsana Siritho</h3>
                  <div class="color-medium index-1 text-center np-m">@MarkDev407</div>
                  <img src="<?= base_url()?>/images/1851.jpg" width="100%" class="img-avatar-circle"> </div>
                <blockquote class="blockquote mt-4" align="center">
                  <p><img src="<?= base_url()?>/images/mark.jpg" width="50%"></p>
                  <footer>นาย กฤษณะ  ศิริโท
                    <cite title="Source Title">58011851</cite>
                  </footer>
                </blockquote>
              </div>
            </div>

            <div class="col-lg-4 col-md-6">
              <div class="card mt-4 card-royal wow zoomInUp animation-delay-7">
                <div class="ms-hero-bg-royal ms-hero-img-city2">
                  <h3 class="color-white index-1 text-center no-m pt-4">Thanchanok  Barisri</h3>
                  <div class="color-medium index-1 text-center np-m">@Yuiiko</div>
                  <img src="<?= base_url()?>/images/1713.jpg" class="img-avatar-circle"> </div>
                <blockquote class="blockquote mt-4" align="center">
                  <p><img src="<?= base_url()?>/images/jj.jpg" width="50%"></p>
                  <footer>นางสาว ธันย์ชนก  บาริศรี
                    <cite title="Source Title">58011713</cite>
                  </footer>
                </blockquote>
              </div>
            </div>

            <div class="col-lg-4 col-md-6">
              <div class="card mt-4 card-info wow zoomInUp animation-delay-7">
                <div class="ms-hero-bg-info ms-hero-img-airplane">
                  <h3 class="color-white index-1 text-center no-m pt-4">Pudtipong  Tossapan</h3>
                  <div class="color-medium index-1 text-center np-m">@JJ</div>
                  <img src="<?= base_url()?>/images/1164.jpg" class="img-avatar-circle"> </div>
                <blockquote class="blockquote mt-4" align="center">
                  <p><img src="<?= base_url()?>/images/yuii.jpg" width="50%"></p>
                  <footer>นาย พุฒิพงษ์  ทศพันธ์
                    <cite title="Source Title">58011164</cite>
                  </footer>
                </blockquote>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="container">
        <div class="row">
          <div class="col-xl-8 col-lg-7">
            <div class="card card-primary animated fadeInUp animation-delay-7">
              <div class="ms-hero-bg-primary ms-hero-img-mountain">
                <h2 class="text-center no-m pt-4 pb-4 color-white index-1">
                  <?= label("Contact"); ?>
                </h2>
              </div>
              <div class="card-body">
                <form class="form-horizontal" action="<?= base_url() ?>/contact/insert_contact" method="post">
                  <fieldset class="container">
                    <div class="form-group row">
                      <label for="inputEmail" autocomplete="false" class="col-lg-2 control-label">Name</label>
                      <div class="col-lg-9">
                        <input type="text" class="form-control" name="name" placeholder="Name"> </div>
                    </div>
                    <div class="form-group row">
                      <label for="inputEmail" autocomplete="false" class="col-lg-2 control-label">Email</label>
                      <div class="col-lg-9">
                        <input type="email" class="form-control" name="email" placeholder="Email"> </div>
                    </div>
                    <div class="form-group row">
                      <label for="inputEmail" autocomplete="false" class="col-lg-2 control-label">Subject</label>
                      <div class="col-lg-9">
                        <input type="text" class="form-control" name="subject" placeholder="Subject"> </div>
                    </div>
                    <div class="form-group row">
                      <label for="textArea" class="col-lg-2 control-label">Message</label>
                      <div class="col-lg-9">
                        <textarea class="form-control" rows="3" name="message" id="textArea" placeholder="Your message..."></textarea>
                      </div>
                    </div>
                    <div class="form-group row justify-content-end">
                      <div class="col-lg-10">
                        <button type="submit" class="btn btn-raised btn-primary">Send Message</button>
                        <button type="button" class="btn btn-danger">Cancel</button>
                      </div>
                    </div>
                  </fieldset>
                </form>
              </div>
            </div>
          </div>
          <div class="col-xl-4 col-lg-5">
            <div class="card card-primary animated fadeInUp animation-delay-7">
              <div class="card-body">
                <div class="text-center mb-2">
                  <span class="ms-logo ms-logo-sm mr-1">8</span>
                  <h3 class="no-m ms-site-title">Old
                    <span>Clock</span>
                  </h3>
                </div>
                <address class="no-mb">
                  <p>
                    <i class="color-danger-light fa fa-pin mr-1"></i> 306 ซอย ลาดพร้าว 107 แยก 23</p>
                  <p>
                    <i class="color-warning-light fa fa-map mr-1"></i> แขวง คลองจั่น เขต บางกะปิ กรุงเทพมหานคร 10240</p>
                  <p>
                    <i class="color-info-light fa fa-email mr-1"></i>
                    <a href="mailto:joe@example.com">example@rbac.com</a>
                  </p>
                  <p>
                    <i class="color-royal-light fa fa-phone mr-1"></i>02 375 4480 </p>
                </address>
              </div>
            </div>
            <div class="card card-primary animated fadeInUp animation-delay-7">
              <div class="card-header">
                <h3 class="card-title">
                  <i class="fa fa-map"></i>Map</h3>
              </div>
              <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3874.978931489885!2d100.63575281483081!3d13.780143590329178!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x311d621ebf896443%3A0xe92d160fcde72d8e!2z4Lih4Lir4Liy4Lin4Li04LiX4Lii4Liy4Lil4Lix4Lii4Lij4Lix4LiV4LiZ4Lia4Lix4LiT4LiR4Li04LiV!5e0!3m2!1sth!2sth!4v1549688969817" width="100%" height="340" frameborder="0" style="border:0" allowfullscreen></iframe>
            </div>
          </div>
        </div>
      </div>

<?php
	include("theme/footer.php");
?>
