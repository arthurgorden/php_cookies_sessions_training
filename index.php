<?php session_start();
// var_dump($_SESSION);
// var_dump($_POST);
// var_dump($_GET);
$productId = 0;
function addToCart(int $id)
{
    if (!isset($_GET['add_to_cart'])) {
        $_SESSION['cart'] = [];
    }
    if (!empty($_SESSION['cart'][$_GET['add_to_cart']])) {
        $id = $_GET['add_to_cart'];
        $_SESSION['cart'][$id]++;
    } else {
        $id = $_GET['add_to_cart'];
        $_SESSION['cart'][$id] = 1;
    }
}
if (isset($_GET['add_to_cart'])) {
    addToCart($productId);
    // var_dump($productId);
} ?>
<?php require 'inc/data/products.php'; ?>
<?php require 'inc/head.php'; ?>
<section class="cookies container-fluid">
    <div class="row">
        <?php foreach ($catalog as $id => $cookie) { ?>
            <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
                <figure class="thumbnail text-center">
                    <img src="assets/img/product-<?= $id; ?>.jpg" alt="<?= $cookie['name']; ?>" class="img-responsive">
                    <figcaption class="caption">
                        <h3><?= $cookie['name']; ?></h3>
                        <p><?= $cookie['description']; ?></p>
                        <a href="?add_to_cart=<?= $id; ?>" class="btn btn-primary">
                            <span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Add to cart
                        </a>
                    </figcaption>
                </figure>
            </div>
        <?php } ?>
    </div>
</section>
<?php require 'inc/foot.php'; ?>
