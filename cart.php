<?php session_start();
if (empty($_SESSION['loginname'])) {
    header('Location:/login.php');
    exit;
} ?>
<?php require 'inc/data/products.php'; ?>
<?php require 'inc/head.php'; ?>
<section class="cookies container-fluid">
    <div class="row">
        <!-- TODO : Display shopping cart items from $_SESSION here. -->
        <?php
        $cart = [];
if (!empty($_SESSION['loginname'])) {
    if (!empty($_SESSION['cart'])) {
        $keys = array_keys($_SESSION['cart']);
        foreach ($keys as $item) {
            if (array_key_exists($item, $catalog)) {
                $catalog[$item] += array('id' => $item) ;
                $cart[] = $catalog[$item];
            }
        }
    }
}
        ?>
        <?php foreach ($cart as $item) {?>
        <p><?= $item['name']; ?>
    </div>
  <?php } ?>
</section>
<?php require 'inc/foot.php'; ?>
