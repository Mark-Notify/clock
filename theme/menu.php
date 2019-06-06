  <?php
    $url = $_SERVER["REQUEST_URI"];
    $curl = explode("/",$url);
  ?>
  <body style="font-family: 'Prompt', sans-serif;">
    <div id="ms-preload" class="ms-preload">
      <div id="status">
        <div class="spinner">
          <div class="dot1"></div>
          <div class="dot2"></div>
        </div>
      </div>
    </div>
    <div class="ms-site-container">
      <!-- Modal -->
      <div class="modal modal-primary" id="ms-account-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog animated zoomIn animated-3x" role="document">
          <div class="modal-content">
            <div class="modal-header d-block shadow-2dp no-pb">
              <button type="button" class="close d-inline pull-right mt-2" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">
                  <i class="zmdi zmdi-close"></i>
                </span>
              </button>
              <div class="modal-title text-center">
                <!-- <span class="ms-logo ms-logo-white ms-logo-sm mr-1">8</span> -->
                <img src="<?= base_url('images/logob.png')?>" width="40%">
                <!-- <h3 class="no-m ms-site-title">Old
                  <span>Clock.com</span>
                </h3> -->
              </div>
              <div class="modal-header-tabs">
                <ul class="nav nav-tabs nav-tabs-full nav-tabs-2 shadow-2dp" role="tablist">
                  <li class="nav-item">
                    <a class="nav-link withoutripple active" href="#login" aria-controls="login" role="tab" data-toggle="tab">
                      <i class="zmdi zmdi-user"></i> Login</a>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link withoutripple" href="#register" aria-controls="register" role="tab" data-toggle="tab">
                      <i class="zmdi zmdi-user-plus"></i> Register</a>
                    </a>
                  </li>
                </ul>
              </div>
            </div>
            <div class="modal-body">
              <div class="tab-content">
                <div role="tabpanel" class="tab-pane fade active show" id="login">
                  <form autocomplete="off" name="formLogin" action="<?= base_url('auth/login');?>" method="post">
                    <fieldset>
                      <div class="form-group label-floating">
                        <div class="input-group">
                          <span class="input-group-addon">
                            <i class="zmdi zmdi-user"></i>
                          </span>
                          <label class="control-label" for="ms-form-user">Username</label>
                          <input type="text" name="user" class="form-control" required=""> 
                        </div>
                      </div>
                      <div class="form-group label-floating">
                        <div class="input-group">
                          <span class="input-group-addon">
                            <i class="zmdi zmdi-lock"></i>
                          </span>
                          <label class="control-label" for="ms-form-pass">Password</label>
                          <input type="password" name="pass" class="form-control" required=""> 
                        </div>
                      </div>
                      <div class="row mt-2">
                        <div class="col-md-6">
                          <div class="form-group no-mt">
                            <div class="checkbox">
                              <label>
                                <input type="checkbox"> Remember Me </label>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <button type="submit" class="btn btn-raised btn-primary pull-right">Login</button>
                        </div>
                      </div>
                    </fieldset>
                  </form>
                  <!-- <div class="text-center">
                    <h3>Login with</h3>
                    <a href="javascript:void(0)" class="wave-effect-light btn btn-raised btn-facebook">
                      <i class="zmdi zmdi-facebook"></i> Facebook
                    </a>
                    <a href="javascript:void(0)" class="wave-effect-light btn btn-raised btn-twitter">
                      <i class="zmdi zmdi-twitter"></i> Twitter
                    </a>
                    <a href="javascript:void(0)" class="wave-effect-light btn btn-raised btn-google">
                      <i class="zmdi zmdi-google"></i> Google
                    </a>
                  </div> -->
                </div>
                <div role="tabpanel" class="tab-pane fade" id="register">
                  <form autocomplete="off" name="formRegis" action="<?= base_url('auth/insert_item');?>" method="post" enctype="multipart/form-data">
                    <fieldset>
                      <div class="form-group label-floating">
                        <div class="input-group">
                          <span class="input-group-addon">
                            <i class="zmdi zmdi-user"></i>
                          </span>
                          <label class="control-label" for="ms-form-user">Username</label>
                          <input type="text" name="user" class="form-control" required=""> 
                          <span class="help-block" style="color: red;">กรุณาระบุชื่อผู้ใช้.</span>
                        </div>
                      </div>
                      <div class="form-group label-floating">
                        <div class="input-group">
                          <span class="input-group-addon">
                            <i class="zmdi zmdi-lock"></i>
                          </span>
                          <label class="control-label" for="ms-form-pass">Password</label>
                          <input type="password" name="pass" class="form-control" required="">
                          <span class="help-block" style="color: red;">กรุณาระบุรหัสผ่าน.</span> 
                        </div>
                      </div>
                      <div class="form-group label-floating">
                        <div class="input-group">
                          <span class="input-group-addon">
                            <i class="zmdi zmdi-user"></i>
                          </span>
                          <label class="control-label" for="ms-form-name">Name</label>
                          <input type="text" name="name" class="form-control"  required=""> 
                          <span class="help-block" style="color: red;">กรุณาระบุชื่อ - นามสกุล.</span>
                        </div>
                      </div>
                      <div class="form-group label-floating">
                        <input type="file" name="file[]" id="inputFile4" required="">
                        <div class="input-group">
                            <span class="input-group-addon">
                                <i class="material-icons">attach_file</i>
                            </span>
                          <input type="text" readonly="" class="form-control" placeholder="เพิ่มรูปประจำตัว">
                          <span class="help-block" style="color: red;">กรุณาระบุเพิ่มรูปประจำตัว(นามสกุล gif,jpg,png เท่านั้น).</span>
                        </div>
                      </div>
                      <div class="form-group label-floating">
                        <div class="input-group">
                          <span class="input-group-addon">
                            <i class="zmdi zmdi-user"></i>
                          </span>
                          <label class="control-label" for="ms-form-name">About</label>
                          <input type="text" name="about" class="form-control" required=""> 
                          <span class="help-block" style="color: red;">อธิบายบางอย่างเกี่ยวกับคุณ.</span>
                        </div>
                      </div>
                      <hr>
                      <div class="text-center">
                        <button type="submit" class="wave-effect-light btn btn-raised btn-twitter">Register</button>
                        <button type="reset" class="wave-effect-light btn btn-raised btn-google">Reset</button>
                      </div>
                    </fieldset>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <header class="ms-header ms-header-dark">
        <!--ms-header-dark-->
        <div class="container container-full">
          <div class="ms-title">
            <a href="<?= site_url('home') ?>">
              <!-- <img src="assets/img/demo/logo-header.png" alt=""> -->
                <img src="<?= base_url('images/logow.png')?>" style="width: 20%;margin-top: 0px;">
                <!-- <span class="ms-logo animated zoomInDown animation-delay-5">8</span> -->
              <h1 class="animated fadeInRight animation-delay-6"></h1>
            </a>
          </div>
          <div class="header-right">
          <?php
            if (label("LA")=="en") {
          ?>
            <a href="<?= base_url('home/change/thailand') ?>" class="btn-circle btn-circle-primary no-focus animated zoomInDown animation-delay-8">
              <img src="<?= base_url('images/TH.png') ?>" width="60%">
            </a>
          <?php
            }
            elseif(label("LA")=="th")
            {
          ?>
            <a href="<?= base_url('home/change/english') ?>" class="btn-circle btn-circle-primary no-focus animated zoomInDown animation-delay-8">
              <img src="<?= base_url('images/EN.png') ?>" width="60%">
            </a>
          <?php
            }
          ?>
            

            <?php
              if ($this->session->userdata('user') != '') {
                echo "Wellcome >> ".$this->session->userdata('name');
            ?>
              <button class="btn-circle btn-circle-primary no-focus animated zoomInDown animation-delay-8" onclick="logout()"  data-toggle="tooltip" data-placement="top" title="ออกจากระบบ">
              <i class="fas fa-sign-out-alt"></i>
            </button>
            <?php
              }
              else
              {
                echo "เข้าสู่ระบบ >>";
            ?>
                  <a href="javascript:void(0)" class="btn-circle btn-circle-primary no-focus animated zoomInDown animation-delay-8" data-toggle="modal" data-target="#ms-account-modal" title="เข้าสู่ระบบ">
                  <i class="zmdi zmdi-account"></i>
                </a>
            <?php
              }
            ?>
            
            <!-- <form class="search-form animated zoomInDown animation-delay-9">
              <input id="search-box" type="text" class="search-input" placeholder="Search..." name="q" />
              <label for="search-box">
                <i class="zmdi zmdi-search"></i>
              </label>
            </form> -->
            <a href="javascript:void(0)" class="btn-ms-menu btn-circle btn-circle-primary ms-toggle-left animated zoomInDown animation-delay-10">
              <i class="zmdi zmdi-menu"></i>
            </a>

          </div>
        </div>
      </header>

      <nav class="navbar navbar-expand-md  navbar-static ms-navbar ms-navbar-white">
        <div class="container container-full">
          <div class="navbar-header">
            <a class="navbar-brand" href="<?= site_url('home') ?>">
              <img src="<?= base_url('images/logob.png')?>" style="width: 148px;margin-top: 2px;">
            </a>
          </div>

          <div class="collapse navbar-collapse" id="ms-navbar">
            <ul class="navbar-nav">
              <li class="nav-item dropdown <?php if($curl[1]=='home'){ echo 'active';} ?>">
                <a href="<?php echo base_url('home') ?>" class="nav-link dropdown-toggle animated fadeIn animation-delay-7 ">
                  <?= label("Home"); ?>
                </a>
              </li>

              <li class="nav-item dropdown <?php if($curl[1]=='forum'){ echo 'active';} ?>">
                <a href="<?php echo base_url()?>forum" class="nav-link dropdown-toggle animated fadeIn animation-delay-7 ">
                  <?= label("Forum"); ?>
                </a>
              </li>

              <li class="nav-item dropdown <?php if($curl[1]=='contact'){ echo 'active';} ?>">
                <a href="<?php echo base_url()?>contact" class="nav-link dropdown-toggle animated fadeIn animation-delay-7">
                  <?= label("Contact"); ?>
                </a>
              </li>

            </ul>
          </div>
          
          <div>
            <a href="javascript:void(0)" class="btn-circle btn-circle-raised mr-2" data-toggle="modal" data-target="#myModal" onclick="javascript:opencart()">
              <i class="material-icons" style="color: #000;">add_shopping_cart</i>
              <span class="badge-pill badge-pill-pink">
                <span class="cartcount"><?= count($this->cart->contents()); ?></span>
              </span>
            </a>
          <label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
            <a href="javascript:void(0)" class="ms-toggle-left btn-navbar-menu">
              <i class="fas fa-bars" style="color: #000;"></i>
            </a>
          </div>

        </div>
        <!-- container -->
      </nav>


<script type="text/javascript">
  function logout() 
  {
    // var answer = confirm ("Are you sure you want to logout?");
    // if (answer)
    // {
      $.ajax({
          url: "<?= site_url('auth/logout');?>"
      });
      location.reload();
    // }
  }

</script>