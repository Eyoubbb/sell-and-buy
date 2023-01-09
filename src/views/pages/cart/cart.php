<?=
    $homeUrl = $data['routes']['GET:Home#index']->getUrl();
    $deleteCart = $data['routes']['GET:Cart#delete']->getUrl();
?>

<section class="cart">
    <nav>
        <h1><?= NAV_CART ?></h1>
    </nav>
    <div class="cart-items-container">
        <?php

            if (!isset($data['cart'])) {
                echo '<p>' . CART_EMPTY . '</p>';
            } else {
                $labelProduct = CART_LABEL_PRODUCT;
                $labelQuantity = CART_LABEL_QUANTITY;
                $labelPrice = CART_LABEL_PRICE;
                $labelTotal = CART_LABEL_TOTAL;
                echo <<<HTML
                <table>
                    <tr>
                        <td></th>
                        <td></th>
                        <td>$labelProduct</th>
                        <td>$labelQuantity</th>
                        <td>$labelPrice</th>
                        <td>$labelTotal</th>
                    </tr>
                HTML;

                foreach ($data['products'] as $product) {
                    
                    $creator = $data['creators'][$product->getCreatorId()];

                    require PATH_COMPONENTS . 'cart.php';
                }

                echo <<<HTML
                </table>
                HTML;
            }
        ?>

        <?php if(isset($data['cart'])): ?>
            <div class="info-cart">
                <div class="cart-buttons">
                    <button>
                        <a href="<?= $homeUrl ?>" class="btn btn-primary"><?= CART_CONTINUE ?></a>
                    </button>
                    <button>
                        <a href="<?= $deleteCart ?>" class="btn btn-primary"><?= CART_DELETE ?></a>
                    </button>
                </div>
            </div>
            <div class="checkout">
                <div class="cart-total">
                    <table>
                        <td>
                            <tr>
                                <td><?= CART_TOTAL  ?></td>
                                <td><?= $data['count']['quantity'] ?></td>
                            </tr>
                        </td>
                        <td>
                            <tr>
                                <td><?= CART_EXPEDITION  ?></td>
                                <td>
                                    <ul>
                                        <li>
                                            <input type="radio" name="expedition" id="expedition">
                                            <label for="">Retrait sur place</label>
                                        </li>
                                        <li>
                                            <input type="radio" name="expedition" id="expedition">
                                            <label for="">Collisimo</label>
                                        </li>
                                        <li>
                                            <input type="radio" name="expedition" id="expedition">
                                            <label for="">Mondial Relay</label>
                                        </li>
                                        <li>
                                            <input type="radio" name="expedition" id="expedition">
                                            <label for="">Cronopost</label>
                                        </li>
                                    </ul>
                                </td>
                            </tr>
                        </td>
                        <td>
                            <tr>
                                <td><?= CART_PRICE  ?></td>
                                <td><?= $data['total']['cart_price'] ?> €</td>
                            </tr>
                        </td>
                        <td>
                            <tr>
                                <td><?= CART_PRICE_DISCOUNT  ?></td>
                                <td><?= $data['total']['cart_price_discount'] ?> €</td>
                            </tr>
                        </td>


                    </table>
                </div>

                <div class="cart-buttons">
                    <button>
                        <a href="<?= $homeUrl ?>" class="btn btn-primary"><?= CART_CHECKOUT ?></a>
                    </button>
                </div>
            </div>
        <?php endif ?>
    </div>
</section>