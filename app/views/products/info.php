<div class="container mt-5">
    <div class="card" style="width: 18rem;">
    <div class="card-body">
        <h5 class="card-title"><?= $data["products"]["name"] ?></h5>
        <h6 class="card-subtitle mb-2 text-body-secondary"><?= $data["products"]["price"] ?></h6>
        <p class="card-text"><?= $data["products"]["description"] ?></p>
        <a href="<?=BASE_URL?>/products" class="card-link">Back</a>
    </div>
    </div>
</div>