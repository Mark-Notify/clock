<!-- Modal -->
<div class="modal-dialog modal-lg animated zoomIn animated-3x"role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h2 class="modal-title color-primary" id="myModalLabel2" style="font-family: 'Prompt', sans-serif;">Shopping cart</h2>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="false">
                  <i class="fa fa-close"></i>
                </span>
              </button>
            </div>
            <div class="modal-body">
              <h1 class="right-line color-primary">
                <h3 style="font-family: 'Prompt', sans-serif;">
                  <strong>Total:</strong>
                  <span class="grandtotal"></span>
                </h3>
              </h1>
              <div class="row">
                <div class="col-md-12">
                  <div class="card mb-1">
                    <table class="table table-responsive table-no-border vertical-center">
                      <?php 
                        if(isset($cart) && is_array($cart) && count($cart)){
                        $i=1;
                        foreach ($cart as $key => $data) { 
                      ?>
                      <tr class="item first rowid<?php echo $data['rowid'] ?>">
                        <td >
                          <img src="<?= base_url(); ?>/upload/<?= $data['image'] ?>" alt="<?= $data['id'] ?>" width="100px"> 
                        </td>
                        <td class="d-none d-sm-block">
                          <textarea cols=30" rows="3" disabled style="border: none; background-color: #fff;"><?= $data['name'] ?></textarea>
                        </td>
                        <td class="price">
                          <span class="color-primary price<?= $data['rowid'] ?>"><?= $data['price'] ?></span>
                        </td>
                        <td class="qnt-count">
                          <div class="form-inline input-number">
                            <input type="number" class="form-control form-control-number quantity qty<?= $data['rowid'] ?>" pattern="[0-9]*" min="1" max="10" value="<?= $data['qty'] ?>" onchange="javascript:updateproduct('<?= $data['rowid'] ?>')">
                          </div>
                        </td>
                        <td class="total">
                          <span class="color-success subtotal subtotal<?= $data['rowid'] ?>">
                            <?= $data['subtotal'] ?>
                          </span>
                        </td>
                        <td>
                          <i class="material-icons" style="cursor: pointer; color: red;" onclick="javascript:deleteproduct('<?= $data['rowid'] ?>')">
                          delete_forever
                        </i>
                        </td>
                      </tr>
                      <?php
                            $i++;
                          } 
                        }
                      ?>
                    </table>
                  </div>
                </div>
              </div>
            </div>
            <div class="modal-footer">
              <button type="submit" class="btn btn-danger" onclick="javascript:deleteproduct('all')">Emty Cart</button>
              <a href="<?= site_url('order') ?>" class="btn btn-raised btn-success">ชำระเงิน</a>
            </div>
          </div>
        </div>
      </div>



<script type="text/javascript">
function deleteproduct(rowid)
{
  var answer = confirm ("Are you sure you want to delete?");
  if (answer)
  {
    $.ajax({
        type: "POST",
        url: "<?= site_url('home/remove');?>",
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
  // alert(qty);
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