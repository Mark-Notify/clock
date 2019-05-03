
<?php
  // echo base_url();
  include('theme/header.php');
  include('theme/menu.php');
  include('theme/slide.php');
?>


      <br />
      <div class="container-fluid">
        <div class="row">
          <div class="order-lg-2 col-lg-3">
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">search</h3>
              </div>
              <div class="card-body">
                <form class="form-horizontal" id="Filters">
                  <!-- <h4 class="mb-1 no-mt">Devices</h4> -->
                  <fieldset>
                    <div class="form-group no-mt">
                      <div class="checkbox">
                        <label>
                          <input type="checkbox" style="border: 2px solid rgba(4, 0, 0, 0.62);" value=".watch"><?= label("watch"); ?> </label>
                      </div>
                      <div class="checkbox">
                        <label>
                          <input type="checkbox" style="border: 2px solid rgba(4, 0, 0, 0.62);" value=".parts"><?= label("parts"); ?></label>
                      </div>
                    </div>
                    <form class="form-horizontal">
                      <h4>Sort by</h4>
                      <select id="SortSelect" class="form-control selectpicker" data-dropup-auto="false">
                        <option value="random"><?= label("Popular"); ?></option>
                        <option value="price:asc"><?= label("PriceLH"); ?></option>
                        <option value="price:desc"><?= label("PriceHL"); ?></option>
                        <option value="date:asc"><?= label("DateLH"); ?></option>
                        <option value="date:desc"><?= label("DateHL"); ?></option>
                      </select>
                    </form>
                    <button class="btn btn-danger btn-block no-mb mt-2" id="Reset">
                      <i class="fa fa-delete"></i> Clear Filters
                    </button>
                  </fieldset>
                  <fieldset>
                    <h4 class="mb-1">จำนวนคนเข้าเว็บ</h4>
                    <div class="form-group no-mt">
                      <img src="https://smallseotools.com/counterDisplay?code=37143a1c9ab2d8533f7a9c8716c351da&style=0003&pad=8&type=page&initCount=54631" border="0">
                      &nbsp;&nbsp;คน
                    </div>
                  </fieldset>
                </form>
              </div>
            </div>
          </div>

          <div class="order-lg-1 col-lg-9">
            <div class="row" id="Container">
              <?php 
                if(isset($products) && is_array($products) && count($products)){
                $i=1;
                foreach ($products as $key => $data) { 
              ?>
              <div class="col-xl-4 col-md-6 mix <?= $data['categories'] ?>" data-price="<?= $data['price'] ?>" data-date="<?= $data['date1'] ?>">
                <div class="card ms-feature">
                  <div class="card-body overflow-hidden text-center">
                    <a href="<?= base_url() ?>home/detail/<?= $data['id'] ?>">
                      <img src="<?= base_url() ?>/upload/<?= $data['image'] ?>" rel="<?= $data['image'] ?>" alt="" class="img-fluid center-block image<?= $data['id'] ?>" width="100%">
                    
                      <h4 class="text-normal text-center name<?= $data['id'] ?>" rel="<?= $data['id'] ?>"><?= $data[label("name")] ?></h4>
                      <div class="mt-2">
                        <span>
                          <s class="color-danger"><?= $data['price_full'] ?></s> 
                        </span>
                        <span class="ms-tag ms-tag-success price<?= $data['id'] ?>" rel="<?= $data['price'] ?>">
                          <?= $data['price'] ?>
                        </span>
                      </div>
                    </a>
                    <button class="btn btn-primary btn-sm btn-block btn-raised mt-2 no-mb" onclick="javascript:addtocart(<?= $data['id'] ?>)">Add to Cart
                    </button>
                    <!-- <a href="" class="btn btn-primary btn-sm btn-block btn-raised mt-2 no-mb">
                      <i class="fa fa-shopping-cart-plus"></i> Add to Cart</a> -->
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
      </div>
      <!-- container -->

<div class="modal fade bs-example-modal-lg displaycontent" id="myModal" tabindex="-1" >
  <div class="modal-dialog modal-lg animated zoomIn animated-3x"role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h2 class="modal-title color-primary" id="myModalLabel2">Cart</h2>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">
            <i class="fa fa-close"></i>
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
<hr>
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
