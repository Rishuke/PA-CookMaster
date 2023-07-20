<div class="container">
    <h1>Votre panier</h1>

    <?php //var_dump($params);
    ?>

    <div class="list mb-2">
        <?php foreach ($params['products'] as $product) : ?>
            <div class="list-group-item d-flex justify-content-between align-items-center">
                <div>
                    <?= $product['name'] ?>
                </div>
                <div class="d-flex align-items-center">
                    <div class="me-3">
                        <?= $product['price'] ?> $

                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
    <a href="/pay" class="btn btn-primary">Payer</a>

</div>