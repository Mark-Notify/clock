
<?php
  include('theme/header.php');
  include('theme/menu.php');
?>
      <div class="container">
        <div class="row">
          <div class="col-lg-8">

            <div class="card animated fadeInLeftTiny animation-delay-5">
              <div class="card-body card-body-big">
<?php
  foreach($post as $rows){
?>
                <h1 class="no-mt"><?php echo $rows['title']?></h1>
                <div class="mb-4">
                  <img src="<?= base_url() ?>/upload/<?php echo $rows['profile']?>" class="rounded-circle mr-1" width="10%"> by
                  <a href="javascript:void(0)"><?php echo $rows['name']?></a> in
                  <a href="javascript:void(0)" class="ms-tag ms-tag-info">ขายสินค้า</a>
                  <span class="ml-1 d-none d-sm-inline">
                    <i class="fa fa-time mr-05 color-info"></i>
                    <span class="color-medium-dark"><?php echo $rows['date1']?></span>
                  </span>
                  <span class="ml-1">
                    <i class="fa fa-comments color-success mr-05"></i> <?= count($comment); ?>
                  </span>
                </div>
                <img src="<?= base_url() ?>/upload/<?php echo $rows['image']?>" alt="" class="img-fluid mb-4">
                <p><?php echo $rows['detail']?></p>
              </div>
<?php } ?>
            </div>

          </div>
          <div class="col-lg-4">
            <div class="card animated fadeInUp animation-delay-7">
              <div class="ms-hero-bg-info ms-hero-img-mountain">
                <h3 class="color-white index-1 text-center no-m pt-4"><?php echo $rows['name']?></h3>
                <div class="color-medium index-1 text-center np-m">@<?php echo $rows['user']?></div>
                <img src="<?= base_url() ?>/upload/<?php echo $rows['profile']?>" alt="..." class="img-avatar-circle"> </div>
              <div class="card-body pt-4 text-center">
                <h3 class="color-primary">About</h3>
                <p><?php echo $rows['about']?>.</p>
                <a href="javascript:void(0)" class="btn-circle btn-circle-raised btn-circle-xs mt-1 mr-1 no-mr-md btn-google">
                  <i class="zmdi zmdi-google"></i>
                </a>
                <a href="javascript:void(0)" class="btn-circle btn-circle-raised btn-circle-xs mt-1 mr-1 no-mr-md btn-facebook">
                  <i class="zmdi zmdi-facebook"></i>
                </a>
                <a href="javascript:void(0)" class="btn-circle btn-circle-raised btn-circle-xs mt-1 mr-1 no-mr-md btn-twitter">
                  <i class="zmdi zmdi-twitter"></i>
                </a>
                <a href="javascript:void(0)" class="btn-circle btn-circle-raised btn-circle-xs mt-1 mr-1 no-mr-md btn-instagram">
                  <i class="zmdi zmdi-instagram"></i>
                </a>
              </div>
            </div>
          </div>
        </div>
        <div class="row wow materialUp animation-delay-8">
          <div class="col-md-12">
            <h2 class="color-primary right-line">Comments</h2>
            <ul class="ms-timeline">
          <?php
            if(isset($comment) && is_array($comment)){
                foreach($comment as $row){
          ?>
              <li class="ms-timeline-item wow materialUp">
                <div class="ms-timeline-date">
                  <time class="timeline-time" datetime="">
                    <span><?php echo $row['c_name']?></span>
                  </time>
                  <i class="ms-timeline-point bg-primary"></i>
                  <img src="<?= base_url() ?>/upload/<?php echo $row['c_profile']?>" class="ms-timeline-point-img" width="10%" style="margin-top: -44px;"> 
                </div>
                <div class="card card-primary">
                  <div class="card-body">
                    <p><?php echo $row['c_detail']?>.</p>
                  </div>
                    <!-- <span class="color-medium-dark"><?php echo $row['c_date1']?></span> -->
                </div>
              </li>
          <?php 
              }
            } 
          ?>
            </ul>
          </div>
        </div>
        <br>
        
        <?php
            if ($this->session->userdata('name') != '') {
              $name         = $this->session->userdata('name');
              $user         = $this->session->userdata('user');
              $profile      = $this->session->userdata('profile');
          ?>
        
        <div class="row">
          <div class="col-md-12">
            <div class="card card-primary animated fadeInUp animation-delay-7">
              <div class="card-body">
                <h2 class="color-primary text-center">แสดงความคิดเห็น</h2>
                <form class="form-horizontal" action="<?= base_url("forum/insert_com");?>" method="post">
                  <fieldset class="container">
                    <div class="form-group row">
                      <label for="textArea" class="col-lg-2 control-label"></label>
                      <div class="col-lg-9">
                        <input type="hidden" name="c_name" value="<?= $user ?> "> 
                        <input type="hidden" name="c_profile" value="<?= $profile ?>"> 
                        <input type="hidden" name="c_post_id" value="<?php echo $rows['id']?>"> 
                        <textarea class="form-control" rows="6" id="textArea" placeholder="Your comment..." name="detail"></textarea>
                      </div>
                    </div>
                    <div class="form-group row justify-content-end">
                      <div class="col-lg-10">
                        <button type="submit" class="btn btn-raised btn-primary">Comment</button>
                        <button type="button" class="btn btn-danger">Cancel</button>
                      </div>
                    </div>
                  </fieldset>
                </form>
              </div>
            </div>
          </div>
        </div>
        <?php
          }
        ?>
      </div>
      <!-- container -->
<?php
  include("theme/footer.php");
?>

