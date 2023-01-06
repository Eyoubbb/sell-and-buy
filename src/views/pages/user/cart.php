<section class="cart">
    <h1><?= NAV_CART ?></h1>

    <div class="cart-items-container">
        <?php
            print_r($data['cart']);
            print($user->getId());
            // foreach ($data['cart'] as $product) {

            //     $creator = $data['creators'][$product->getCreatorId()];
                
            //     require PATH_COMPONENTS . 'product.php';
            // }
        ?>
    </div>
</section>