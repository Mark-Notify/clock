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
              <i class="zmdi zmdi-graduation-cap"></i>ตารางแสดงรายการสินค้า</h3>
          </div>
          <table class="table table-no-border table-striped">
            <thead>
              <tr>
                <th align="center">#</th>
                <th>รูป</th>
                <th>ราคา</th>
                <th>ชื่อภาษาไทย</th>
                <th>ชื่อภาษาอังกฤษ</th>
                <th>รายละเอียดภาษาไทย</th>
                <th>รายละเอียดภาษาอังกฤษ</th>
                <th>จัดการ</th>
              </tr>
            </thead>
            <tbody>
            <?php 
              if(isset($products) && is_array($products) && count($products)){
              $i=1;
              foreach ($products as $key => $rows) { 
            ?>
              <tr>
                <td width="5%"><?php echo $i ?></td>
                <td width="15%">
                  <img src="<?= base_url().'upload/'.$rows['image'] ?>" width="100%">
                </td>
                <td width="10%"><?php echo $rows['price'] ?></td>
                <td width="15%"><?php echo $rows['name_th'] ?></td>
                <td width="15%"><?php echo $rows['name_en'] ?></td>
                <td width="20%"><?php echo $rows['detail_th'] ?></td>
                <td width="20%"><?php echo substr($rows['detail_en'], 0, 50)  ?></td>
                <td width="12%">
                  <a href="<?= base_url("manage/edit")?>/<?= $rows['id']?>" class="btn-circle btn-skype">
                    <i class="fas fa-pencil-alt" style="font-size: 25;" title="แก้ไข"></i>
                  </a>

                  <a href="" class="btn-circle btn-soundcloud" onclick="del(<?= $rows['id'] ?>);">
                    <i class="material-icons" style="font-size: 25;" title="ลบ">delete_forever</i>
                  </a>
                </td> 
              </tr>
            <?php
                  $i++;
                } //<?= base_url("manage/delete").'/'.$rows['id']
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