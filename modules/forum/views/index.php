
<?php
  include('theme/header.php');
  include('theme/menu.php');
?>

      <div class="container">
        <div class="row">
          <div class="col-lg-8">
            <div class="alert alert-danger alert-dismissible" role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <i class="zmdi zmdi-close"></i>
              </button>
              <strong>
                <i class="zmdi zmdi-alert-triangle"></i> Warning!</strong> เรียนสมาชิกทุกท่านกรุณาเข้าสู่ระบบก่อนท่านจึงสามารถโพสต์หรือแสดงความคิดเห็นได้.
            </div>
            <?php
              $profile      = $this->session->userdata('profile');
              $profile_path = $this->session->userdata('profile_path');
              $name         = $this->session->userdata('name');

              if(isset($post) && is_array($post) && count($post)){
              $i=1;
              foreach ($post as $key => $data) {
            ?>
            <article class="card wow fadeInLeft animation-delay-5 mb-4">
              <div class="card-body overflow-hidden overflow-hidden">
                <div class="row">
                  <div class="col-xl-6">
                    <img src="<?= base_url() ?>/upload/<?= $data['image'] ?>" alt="" class="img-fluid mb-4" width="100%"> </div>
                  <div class="col-xl-6">
                    <h3 class="no-mt">
                      <a href="<?php echo base_url('forum/comment/');?><?= $data['id'] ?>"><?= $data['title'] ?></a>
                    </h3>
                    <p class="mb-4"><?= $data['detail'] ?>.</p>
                  </div>
                </div>
                <div class="row">
                  <div class="col-lg-8">
                    <img src="<?= $data['profile_path'] ?>\<?= $data['profile'] ?>" width="10%" class="rounded-circle mr-1"> by
                    <a href="javascript:void(0)"><?= $data['name'] ?></a> in
                    <a href="javascript:void(0)" class="ms-tag ms-tag-info">ขายสินค้า</a>
                    <span class="ml-1 d-none d-sm-inline">
                      <i class="zmdi zmdi-time mr-05 color-info"></i>
                      <span class="color-medium-dark"><?= $data['date1'] ?></span>
                    </span>
                  </div>
                  <?php if ($this->session->userdata('user') != ''): ?>
                  <div class="col-lg-4 text-right">
                    <a href="<?php echo base_url('forum/comment/');?><?= $data['id'] ?>" class="btn btn-primary btn-raised btn-block animate-icon">แสดงความคิดเห็น
                    </a>
                  </div>
                  <?php endif; ?>
                </div>
              </div>
            </article>
            <?php
                  $i++;
                }
              }
            ?>

          </div>
          <div class="col-lg-4">
            <?php
              if ($this->session->userdata('user') != '') {
                $user         = $this->session->userdata('user');
                $name         = $this->session->userdata('name');
                $profile      = $this->session->userdata('profile');
                $profile_path = $this->session->userdata('profile_path');
                $about        = $this->session->userdata('about');
                $status       = $this->session->userdata('status');
                // echo "have session";
            ?>
            <a href="#" class="btn btn-block btn-xlg btn-raised btn-raised btn-info" data-toggle="modal" data-target="#postModel">
              ตั้งกระทู้
            </a>
            <div class="modal modal-info" id="postModel" tabindex="-1" role="dialog" aria-labelledby="myModalLabel6">
            <div class="modal-dialog modal-lg zoomIn animated-3x" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h3 class="modal-title" id="myModalLabel6">ตั้งกระทู้</h3>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">
                      <i class="zmdi zmdi-close"></i>
                    </span>
                  </button>
                </div>
                <div class="modal-body">
                  <div class="col-lg-12 ms-paper-content-container">
                    <div class="ms-paper-content">
                      <section class="ms-component-section">
                        <form action="<?php echo base_url("forum/insert_item"); ?>" method="post" enctype="multipart/form-data" class="form-horizontal">
                          <fieldset>
                            <div class="form-group row">
                              <label for="inputEmail" autocomplete="false" class="col-lg-2 control-label">
                                หัวข้อ
                              </label>
                              <div class="col-lg-10">
                                <input type="text" name="title" class="form-control" placeholder="Title">
                                <input type="hidden" name="s_name" value="<?= $name ?>">
                                <input type="hidden" name="s_user" value="<?= $user ?>">
                                <input type="hidden" name="s_about" value="<?= $about ?>">
                                <input type="hidden" name="s_profile" value="<?= $profile ?>">
                                <input type="hidden" name="s_profile_path" value="<?= $profile_path ?>">
                              </div>
                            </div>

                            <div class="form-group row justify-content-end">
                              <label for="inputFile" class="col-lg-2 control-label">
                                เพิ่มรูปภาพ
                              </label>
                              <div class="col-lg-10">
                                <input type="text" readonly="" class="form-control" placeholder="Browse...">
                                <input type="file" name="file[]" id="inputFile"> </div>
                            </div>
                            <div class="form-group row justify-content-end">
                              <label for="textArea" class="col-lg-2 control-label">รายละเอียด</label>
                              <div class="col-lg-10">
                                <textarea class="form-control" name="detail" rows="3" id="detail"></textarea>
                                <span class="help-block">Plese Input Detail.</span>
                              </div>
                            </div>
                          </fieldset>
                        <!-- card-code -->
                      </section>
                      </div>
                      <div class="modal-footer">
                        <button type="submit" class="btn btn-primary btn-raised">Post</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                      </div>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="card animated fadeInUp animation-delay-7">
              <div class="ms-hero-bg-info ms-hero-img-mountain">
                <h3 class="color-white index-1 text-center no-m pt-4"><?= $name ?></h3>
                <div class="color-medium index-1 text-center np-m">@<?= $user ?></div>
                <img src="<?= $profile_path ?>\<?= $profile ?>" class="img-avatar-circle" width="100%"> </div>
              <div class="card-body overflow-hidden pt-4 text-center">
                <h3 class="color-primary">About me</h3>
                <p><?= $about ?>.</p>
                <a href="javascript:void(0)" class="btn-circle btn-circle-raised btn-circle-xs mt-1 mr-1 no-mr-md btn-google">
                  <i class="fab fa-google"></i>
                </a>
                <a href="javascript:void(0)" class="btn-circle btn-circle-raised btn-circle-xs mt-1 mr-1 no-mr-md btn-facebook">
                  <i class="fab fa-facebook"></i>
                </a>
                <a href="javascript:void(0)" class="btn-circle btn-circle-raised btn-circle-xs mt-1 mr-1 no-mr-md btn-twitter">
                  <i class="fab fa-twitter"></i>
                </a>
                <a href="javascript:void(0)" class="btn-circle btn-circle-raised btn-circle-xs mt-1 mr-1 no-mr-md btn-instagram">
                  <i class="fab fa-instagram"></i>
                </a>
              </div>
            </div>
            <?php
              }
            ?>
            <div class="card card-primary animated fadeInUp animation-delay-7">
              <div class="card-header">
                <h3 class="card-title">
                  <i class="zmdi zmdi-apps"></i> Navigation</h3>
              </div>
              <div class="card-tabs">
                <ul class="nav nav-tabs nav-tabs-transparent indicator-primary nav-tabs-full nav-tabs-4" role="tablist">
                  <li class="nav-item">
                    <a href="#favorite" aria-controls="favorite" role="tab" data-toggle="tab" class="nav-link withoutripple active">
                      <i class="no-mr zmdi zmdi-star"></i>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="#categories" aria-controls="categories" role="tab" data-toggle="tab" class="nav-link withoutripple">
                      <i class="no-mr zmdi zmdi-folder"></i>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="#archives" aria-controls="archives" role="tab" data-toggle="tab" class="nav-link withoutripple">
                      <i class="no-mr zmdi zmdi-time"></i>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="#tags" aria-controls="tags" role="tab" data-toggle="tab" class="nav-link withoutripple">
                      <i class="no-mr zmdi zmdi-tag-more"></i>
                    </a>
                  </li>
                </ul>
              </div>
              <div class="tab-content">
                <div role="tabpanel" class="tab-pane fade active show" id="favorite">
                  <div class="card-body overflow-hidden">
                    <div class="ms-media-list">
            <?php
              $profile      = $this->session->userdata('profile');
              $profile_path = $this->session->userdata('profile_path');
              $name         = $this->session->userdata('name');

              if(isset($post) && is_array($post) && count($post)){
              $i=1;
              foreach ($post as $key => $data) {
            ?>
                      <div class="media mb-2">
                        <div class="media-left media-middle">
                          <a href="#">
                            <img class="d-flex mr-3 media-object media-object-circle" src="<?= base_url() ?>/upload/<?= $data['image'] ?>" alt="..."> </a>
                        </div>
                        <div class="media-body">
                          <a href="javascript:void(0)" class="media-heading"><?= $data['title'] ?></a>
                          <div class="media-footer text-small">
                            <span class="mr-1">
                              <i class="zmdi zmdi-time color-info mr-05"></i><?= $data['date1'] ?></span>
                            <span>
                              <i class="zmdi zmdi-folder-outline color-success mr-05"></i>
                              <a href="javascript:void(0)">ขายสินค้า</a>
                            </span>
                          </div>
                        </div>
                      </div>
            <?php
                  $i++;
                }
              }
            ?>

                    </div>
                  </div>
                </div>
                <div role="tabpanel" class="tab-pane fade" id="categories">
                  <div class="list-group">
                    <a href="javascript:void(0)" class="list-group-item list-group-item-action withripple">
                      <i class=" color-info zmdi zmdi-cocktail"></i>Design
                      <span class="ml-auto badge-pill badge-pill-info">25</span>
                    </a>
                    <a href="javascript:void(0)" class="list-group-item list-group-item-action withripple">
                      <i class=" color-warning zmdi zmdi-collection-image"></i> Graphics
                      <span class="ml-auto badge-pill badge-pill-warning">14</span>
                    </a>
                    <a href="javascript:void(0)" class="list-group-item list-group-item-action withripple">
                      <i class=" color-danger zmdi zmdi-case-check"></i> Productivity
                      <span class="ml-auto badge-pill badge-pill-danger">7</span>
                    </a>
                    <a href="javascript:void(0)" class="list-group-item list-group-item-action withripple">
                      <i class=" color-royal zmdi zmdi-folder-star-alt"></i>Resources
                      <span class="ml-auto badge-pill badge-pill-royal">67</span>
                    </a>
                    <a href="javascript:void(0)" class="list-group-item list-group-item-action withripple">
                      <i class=" color-success zmdi zmdi-play-circle-outline"></i>Multimedia
                      <span class="ml-auto badge-pill badge-pill-success">32</span>
                    </a>
                  </div>
                </div>
                <div role="tabpanel" class="tab-pane fade" id="archives">
                  <div class="list-group">
                    <a href="javascript:void(0)" class="list-group-item list-group-item-action withripple">
                      <i class="zmdi zmdi-calendar"></i> January 2016
                      <span class="ml-auto badge-pill">25</span>
                    </a>
                    <a href="javascript:void(0)" class="list-group-item list-group-item-action withripple">
                      <i class="zmdi zmdi-calendar"></i> February 2016
                      <span class="ml-auto badge-pill">14</span>
                    </a>
                    <a href="javascript:void(0)" class="list-group-item list-group-item-action withripple">
                      <i class="zmdi zmdi-calendar"></i> March 2016
                      <span class="ml-auto badge-pill">9</span>
                    </a>
                    <a href="javascript:void(0)" class="list-group-item list-group-item-action withripple">
                      <i class="zmdi zmdi-calendar"></i> April 2016
                      <span class="ml-auto badge-pill">12</span>
                    </a>
                    <a href="javascript:void(0)" class="list-group-item list-group-item-action withripple">
                      <i class="zmdi zmdi-calendar"></i> June 2016
                      <span class="ml-auto badge-pill">65</span>
                    </a>
                  </div>
                </div>
                <div role="tabpanel" class="tab-pane fade" id="tags">
                  <div class="card-body overflow-hidden overflow-hidden text-center">
                    <a href="javascript:void(0)" class="ms-tag ms-tag-primary">Design</a>
                    <a href="javascript:void(0)" class="ms-tag ms-tag-primary">Productivity</a>
                    <a href="javascript:void(0)" class="ms-tag ms-tag-primary">Web</a>
                    <a href="javascript:void(0)" class="ms-tag ms-tag-primary">Resources</a>
                    <a href="javascript:void(0)" class="ms-tag ms-tag-primary">Multimedia</a>
                    <a href="javascript:void(0)" class="ms-tag ms-tag-primary">HTML5</a>
                    <a href="javascript:void(0)" class="ms-tag ms-tag-primary">CSS3</a>
                    <a href="javascript:void(0)" class="ms-tag ms-tag-primary">Javascript</a>
                    <a href="javascript:void(0)" class="ms-tag ms-tag-primary">Jquery</a>
                    <a href="javascript:void(0)" class="ms-tag ms-tag-primary">Bootstrap</a>
                    <a href="javascript:void(0)" class="ms-tag ms-tag-primary">Angular</a>
                    <a href="javascript:void(0)" class="ms-tag ms-tag-primary">Gulp</a>
                    <a href="javascript:void(0)" class="ms-tag ms-tag-primary">Atom</a>
                    <a href="javascript:void(0)" class="ms-tag ms-tag-primary">Fonts</a>
                    <a href="javascript:void(0)" class="ms-tag ms-tag-primary">Pictures</a>
                    <a href="javascript:void(0)" class="ms-tag ms-tag-primary">Developers</a>
                    <a href="javascript:void(0)" class="ms-tag ms-tag-primary">Code</a>
                    <a href="javascript:void(0)" class="ms-tag ms-tag-primary">SASS</a>
                    <a href="javascript:void(0)" class="ms-tag ms-tag-primary">Less</a>
                  </div>
                </div>
              </div>
            </div>
            <!-- <div class="card card-success animated fadeInUp animation-delay-7">
              <div class="card-header">
                <h3 class="card-title">
                  <i class="zmdi zmdi-play-circle-outline"></i> Feature Video</h3>
              </div>
              <div class="js-player" data-plyr-provider="vimeo" data-plyr-embed-id="94747106"></div>
            </div> -->
            <div class="card card-primary animated fadeInUp animation-delay-7">
              <div class="card-header">
                <h3 class="card-title">
                  <i class="zmdi zmdi-widgets"></i> ข้อความจากทีมพัฒนา</h3>
              </div>
              <div class="card-body overflow-hidden">
                <p>เนื่องจากการโพสต์ข้อความในกระดานการซื้อขายสินค้านี้
                จะไม่มีการลบหรือแก้ไขข้อความเพราะฉะนั้นการโพสต์ข้อความใดๆ
                ที่ไม่เหมาะสมจะถูกลบจากการเป็นสมาชิกและจะดำเนินการตามความผิด...
                <i class="text-right">ขอขอบคุณ ทีมพัฒนา</i>.</p>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- container -->

      <hr>
<?php
  include("theme/footer.php");
?>

<script>
    CKEDITOR.replace( 'detail' );
</script>
