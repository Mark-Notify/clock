<?php
	include('theme/header.php');
	include('theme/menu.php');
?>

<style type="text/css">

</style>

<?php
  $grand_total = 0;
  // Calculate grand total.
  if ($cart = $this->cart->contents()):
  foreach ($cart as $data):
  $grand_total = $grand_total + $data['subtotal'];
  endforeach;
  endif;
?>



<?php
	include("theme/footer.php");
?>

<script type="text/javascript">

</script>