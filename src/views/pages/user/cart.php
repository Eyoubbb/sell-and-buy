<section class="cart">
    <h1><?= NAV_CART ?></h1>

    <div class="cart-items-container">
        <?php
            print_r($data['cart']);

            if ($data['cart'] === false) {
                echo '<p>Cart is empty</p>';
            } else {
                echo '<p>Cart is not empty</p>';
            }
            // foreach ($data['cart'] as $product) {

            //     $creator = $data['creators'][$product->getCreatorId()];
                
            //     require PATH_COMPONENTS . 'product.php';
            // }
        ?>
    </div>
</section>