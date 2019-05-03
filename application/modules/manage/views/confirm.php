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
                <th>รหัสสั่งซื้อ</th>
                <th>ชื่อ</th>
                <th>ที่อยู่</th>
                <th>รายละเอียด</th>
                <th>วันที่</th>
              </tr>
            </thead>
            <tbody>
            <?php 
              if(isset($confirm) && is_array($confirm) && count($confirm)){
              $i=1;
              foreach ($confirm as $key => $rows) { 
            ?>
              <tr>
                <td width="5%" align="center"><?php echo $i ?></td>
                <td width="10%"><?php echo $rows['track_id'] ?></td>
                <td width="15%"><?php echo $rows['name'] ?></td>
                <td width="15%"><?php echo $rows['address'] ?></td>
                <td width="10%" align="center">
                  <a href="<?= base_url("manage/confirm_detail")?>/<?= $rows['customerid']?>" class="btn-circle btn-skype">
                    <i class="fa fa-search" style="font-size: 25;" title="แก้ไข"></i>
                  </a>
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