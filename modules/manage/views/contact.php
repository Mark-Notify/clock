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
              <i class="zmdi zmdi-graduation-cap"></i>ตารางแสดงรายละเอียดผู้มาติดต่อ</h3>
          </div>
          <table class="table table-no-border table-striped">
            <thead>
              <tr>
                <th align="center">#</th>
                <th>ชื่อ</th>
                <th>E-mail</th>
                <th>หัวข้อ</th>
                <th>รายละเอียด</th>
                <th>วันที่</th>
              </tr>
            </thead>
            <tbody>
            <?php 
              if(isset($contact) && is_array($contact) && count($contact)){
              $i=1;
              foreach ($contact as $key => $rows) { 
            ?>
              <tr>
                <td width="5%"><?php echo $i ?></td>
                <td width="10%"><?php echo $rows['name'] ?></td>
                <td width="15%"><?php echo $rows['email'] ?></td>
                <td width="15%"><?php echo $rows['subject'] ?></td>
                <td width="20%"><?php echo $rows['message'] ?></td>
                <td width="15%"><?php echo $rows['create_date'] ?></td>
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
  function del($id)
  {
    var answer = confirm ("Are you sure you want to delete?");
    if (answer)
    {
      $.ajax({
        url: "<?= site_url('manage/delete/');?>"+$id
      });
      location.reload();
    }
  }
</script>