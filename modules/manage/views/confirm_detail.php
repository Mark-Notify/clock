<?php
    include('theme/header.php');
    include('theme/menu.php');
?>
<div class="ms-hero ms-hero-img-wall ms-bg-fixed pb-4">
  
<div class="row">
  <label class="col-lg-1"></label>
  <div class="col-lg-10 ms-paper-content-container">
    <div class="ms-paper-content">
      <section class="ms-component-section">
        <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title">
              <i class="fa fa-graduation-cap"></i>ตารางแสดงรายละเอียดผู้มาติดต่อ</h3>
          </div>
          <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
            <thead>
              <tr align="center">
                <th align="center">#</th>
                <th>ชื่อสินค้า</th>
                <th>ราคา</th>
                <th>จำนวน</th>
                <th>ราคารวม</th>
                <th>สถานะ</th>
                <th>วันที่</th>
              </tr>
            </thead>
            <tbody>
            <?php 
              if(isset($detail) && is_array($detail) && count($detail)){
              $i=1;
              foreach ($detail as $key => $rows) { 
            ?>
              <tr>
                <td width="5%" align="center"><?php echo $rows['productid'] ?></td>
                <td width="20%"><?php echo $rows[label("name")]; ?></td>
                <td width="5%" align="center"><?php echo number_format($rows['price']) ?></td>
                <td width="5%" align="center"><?php echo number_format($rows['quantity']) ?> </td>
                <td width="5%" align="center"><?php echo number_format($rows['price']*$rows['quantity'])  ?></td>
                <td width="5%" align="center">
                  <label class="label color-danger">จ่ายแล้ว</label>
                </td>
                <td width="15%"><?php echo $rows['date1'] ?></td>
              </tr>
            <?php
                  $i++;
                }
              }
            ?>
            </tbody>
          </table>
        </div>
      </section>
    </div>
  </div>
</div>
</div>

<?php
    include("theme/footer.php");
?>

<script type="text/javascript">

  $(document).ready(function() {
      $('#dataTables').DataTable({
          responsive: true
      });
  });

</script>