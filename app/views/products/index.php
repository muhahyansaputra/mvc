<h4>Products</h4>
<div class="container">
    
<div class="row">
    <div class="col-lg-6">
        <?php Flasher::flash(); ?>
    </div>
</div>
    <button type="button" class="btn btn-primary modal-add" data-bs-toggle="modal" data-bs-target="#exampleModal">
        Add Data
    </button>
    <div class="row mt-3">
        <div class="col-lg-6">
            <form action="<?=BASE_URL?>/products/search" method="post">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Find Product..." aria-label="Find Product..." aria-describedby="button-addon2" autocomplete="off" name="keyword" id="keyword">
                    <button class="btn btn-outline-primary" type="submit" id="button-search">Search</button>
                </div>
            </form>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-6">
            <table class="table bordered">
                <tr>
                    <th>#</th>
                    <th>Product Name</th>
                    <th>Action</th>
                </tr>
                <?php foreach($data['products'] as $product) :?>
                    <tr>
                        <td></td>
                        <td><?= $product["name"] ?></td>
                        <td>
                            <a href="<?=BASE_URL?>/products/info/<?=$product["product_id"]?>" class="badge bg-info">Detail</a>
                            <a href="<?=BASE_URL?>/products/update/<?=$product["product_id"]?>" class="badge bg-warning modal-update" data-bs-toggle="modal" data-bs-target="#exampleModal" data-idproduct="<?=$product["product_id"]?>">Update</a>
                            <a href="<?=BASE_URL?>/products/delete/<?=$product["product_id"]?>" class="badge bg-danger" onclick="return confirm('Delete this data?')">Delete</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </table>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Add Product</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="<?=BASE_URL?>/products/add" method="post">
            <input type="hidden" name="id" id="id">
            <div class="mb-3">
                <label for="name" class="form-label">Nama Product</label>
                <input type="text" class="form-control" id="name" aria-describedby="emailHelp" name="name">
            </div>
            <div class="mb-3">
                <label for="stock" class="form-label">Stock</label>
                <input type="number" class="form-control" id="stock" name="stock">
            </div>
            <div class="mb-3">
                <label for="price" class="form-label">Price</label>
                <input type="number" class="form-control" id="price" name="price">
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea name="description" id="description" class="form-control"></textarea>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary" name="submit">Save</button>
        </div>
    </form>
    </div>
  </div>
</div>