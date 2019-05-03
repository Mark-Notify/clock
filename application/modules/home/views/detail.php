<?php
  include('theme/header.php');
  include('theme/menu.php');
?>
    
      <div class="container">
        <div class="row">
          <?php 
            if(isset($detail) && is_array($detail) && count($detail)){
            $i=1;
            foreach ($detail as $key => $data) { 
          ?>
          <div class="col-md-7">
            <div id="carousel-product" class="ms-carousel ms-carousel-thumb carousel slide animated zoomInUp animation-delay-5" data-ride="carousel" data-interval="0">
              <div class="card card-body">
                <!-- Wrapper for slides -->
                <div class="carousel-inner" role="listbox">
                  <div class="carousel-item active">
                    <img src="<?= base_url() ?>/upload/<?= $data['image'] ?>" rel="<?= $data['image'] ?>"  width="100%" alt="..." class="image<?= $data['id'] ?>"> 
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-5">
            <div class="card animated zoomInDown animation-delay-5">
              <div class="card-body">
                <h2 class="name<?= $data['id'] ?>" rel="<?= $data['id'] ?>"><?= $data[label("name")] ?></h2>
                <div class="mb-2 mt-4">
                  <div class="row">
                    <div class="col-sm-6">
                      <span class="mr-2">
                        <i class="fa fa-hc-lg fa-star color-warning"></i>
                        <i class="fa fa-hc-lg fa-star color-warning"></i>
                        <i class="fa fa-hc-lg fa-star color-warning"></i>
                        <i class="fa fa-hc-lg fa-star color-warning"></i>
                        <i class="fa fa-hc-lg fa-star"></i>
                      </span>
                    </div>
                    <div class="col-sm-6 text-center">
                      <h2 class="color-success no-m text-normal price<?= $data['id'] ?>" rel="<?= $data['price'] ?>">฿ <?= $data['price'] ?></h2>
                    </div>
                  </div>
                </div>
                <p class="lead"><?= $data[label("detail")] ?></p>
                <ul class="list-unstyled">
                  <li class="mb-2">
                    <strong>Sale : </strong>
                    <span class="ms-tag ms-tag-danger"><s>฿ <?= $data['price_full'] ?></s></span>
                  </li>
                  
                </ul>
                <a href="" onclick="javascript:addtocart(<?= $data['id'] ?>)" class="btn btn-primary btn-block btn-raised mt-2 no-mb">
                  <i class="fa fa-shopping-cart-plus"></i> Add to Cart</a>
              </div>
            </div>
            <div class="card card-success animated fadeInUp animation-delay-10">
              <div class="card-body overflow-hidden text-center">
                <i class="fab fa-5x mr-2 fa-cc-paypal" aria-hidden="true"></i>
                <i class="fab fa-5x mr-2 fa-cc-visa" aria-hidden="true"></i>
                <i class="fab fa-5x mr-2 fa-cc-mastercard" aria-hidden="true"></i>
              </div>
            </div>
          </div>
        </div>
        <?php
              $i++;
            }
          }
        ?>


        <h2 class="mt-4 mb-4 right-line">All Products</h2>
        <div class="row">
          <?php 
            if(isset($products) && is_array($products) && count($products)){
            $i=1;
            foreach ($products as $key => $data) { 
          ?>
            <div class="col-md-3">
              <div class="card ms-feature wow zoomInUp animation-delay-3">
                <div class="card-body overflow-hidden text-center">
                  <a href="<?= base_url() ?>home/detail/<?= $data['id'] ?>">
                    <img src="<?= base_url() ?>/upload/<?= $data['image'] ?>" rel="<?= $data['image'] ?>" alt="" class="img-fluid center-block image<?= $data['id'] ?>">
                  
                    <h4 class="text-normal text-center name<?= $data['id'] ?>" rel="<?= $data['id'] ?>">
                      <?= $data[label("name")] ?>
                    </h4>
                  </a>
                    <div class="mt-2">
                      <span class="mr-2">
                        <i class="fa fa-star color-warning"></i>
                        <i class="fa fa-star color-warning"></i>
                        <i class="fa fa-star color-warning"></i>
                        <i class="fa fa-star color-warning"></i>
                        <i class="fa fa-star"></i>
                      </span>
                      <span class="ms-tag ms-tag-success price<?= $data['id'] ?>" rel="<?= $data['price'] ?>">
                        ฿ <?= $data['price'] ?> 
                      </span>
                    </div>

                  <a href="" onclick="javascript:addtocart(<?= $data['id'] ?>)" class="btn btn-primary btn-sm btn-block btn-raised mt-2 no-mb">
                    <i class="fa fa-shopping-cart-plus"></i> Add to Cart</a>
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
      <!-- container -->
<div class="modal fade bs-example-modal-lg displaycontent" id="myModal" tabindex="-1" >
  <div class="modal-dialog modal-lg animated zoomIn animated-3x"role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h2 class="modal-title color-primary" id="myModalLabel2">Cart</h2>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">
            <i class="zmdi zmdi-close"></i>
          </span>
        </button>
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-danger" onclick="javascript:deleteproduct('all')">Emty Cart</button>
        <a href="<?= site_url('home/billing_view') ?>" class="btn btn-raised btn-success">ชำระเงิน</a>
      </div>
    </div>
  </div>
</div>

<?php
  include("theme/footer.php");
?>


<script type="text/javascript">
  function addtocart(p_id)
  {
    var price = $('.price'+p_id).attr('rel');
    var image = $('.image'+p_id).attr('rel');
    var name  = $('.name'+p_id).text();
    var id    = $('.name'+p_id).attr('rel');
    // alert(image);
    // alert(price);
    // alert(name);
    // alert(id);
    $.ajax({
      type: "POST",
      url: "<?php echo site_url('home/add');?>",
      data: "id="+id+"&image="+image+"&name="+name+"&price="+price,
      success: function (response) {
         $(".cartcount").text(response);
      }
    });
  }


  function opencart()
  {
      $.ajax({
        type: "POST",
        url: "<?= site_url('home/opencart');?>",
        data: "",
        success: function (response) {
        $(".displaycontent").html(response);
        }
      });
  }

  function deleteproduct(rowid)
  {
    var answer = confirm ("Are you sure you want to delete?");
    // location.reload();
    if (answer)
    {
      $.ajax({
          type: "POST",
          url: "<?php echo site_url('home/remove');?>",
          data: "rowid="+rowid,
          success: function (response) {
              $(".rowid"+rowid).remove(".rowid"+rowid); 
              $(".cartcount").text(response);  
              var total = 0;
              $('.subtotal').each(function(){
                  total += parseInt($(this).text());
                  $('.grandtotal').text(total);
              });             
          }
      });
    }
  }

    var total = 0;
    $('.subtotal').each(function(){
        total += parseInt($(this).text());
        $('.grandtotal').text(total);
    });


  function updateproduct(rowid)
  {
  var qty = $('.qty'+rowid).val();
  var price = $('.price'+rowid).text();
  var subtotal = $('.subtotal'+rowid).text();
    $.ajax({
        type: "POST",
        url: "<?= site_url('home/update_cart');?>",
        data: "rowid="+rowid+"&qty="+qty+"&price="+price+"&subtotal="+subtotal,
        success: function (response) {
          $('.subtotal'+rowid).text(response);
          var total = 0;
          $('.subtotal').each(function(){
              total += parseInt($(this).text());
              $('.grandtotal').text(total);
          });     
        }
    });
  }


</script>