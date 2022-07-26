<!-- Content -->
<main role="main" class="container">
<?php $this->load->view('layouts/alert'); ?>
<?= $this->session->flashdata('message'); ?>
<div class="row">
                    <div class="col-md-12">
                        <div class="card mb-3">
                            <div class="card-body">
                                <form action="<?= base_url("shop/search") ?>" method="post">
                                    <div class="input-group">
                                        <input type="text" name="keyword" placeholder="Cari produk disini..." value="<?= $this->session->userdata('keyword'); ?>" class="form-control">
                                        <div class="input-group-append">
                                            <button type="submit" class="btn btn-primary">
                                                <i class="fas fa-search"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
            </div>
            <!-- End of Pencarian -->
    <div class="row">
        <div class="col-md-9">
            <!-- Produk -->
            <div class="row">
                <?php foreach ($content as $row) :?>
                <div class="col-md-4">
                    <div class="card mb-3">
                        <figure class="figure">
                            <div class="figure-image">
                                <img src="<?= $row->image ? base_url("assets/images/product/$row->image") : base_url("assets/images/product/default.jpg"); ?>" style="height:250px;width:100%" class="figure-img img-fluid rounded">
                                <a href="<?= base_url("product/detail/$row->id") ?>" class="d-flex justify-content-center"></a>
                            </div>
                        </figure>
                        <div class="card-body">
                            <h5 class="card-title">
                                <?= $row->product_title ?>
                            </h5>
                            <p class="card-text"> <strong>Rp.<?= number_format($row->price, 0, ',', '.') ?>,-</strong> </p>
                            <!-- <p class="card-text"> <?= $row->description ?> </p> -->
                            <a href="<?= base_url("shop/category/$row->category_slug") ?>" class="badge badge-primary"> <i class="fas fa-tags"> <?= $row->category_title ?></i></a>
                        </div>
                        <div class="card-footer">
                            <form action="<?= base_url("cart/add") ?>" method="POST">
                                <div class="btn-group" role="group" aria-label="Basic example">
                                    <input type="hidden" name="id_product" value="<?= $row->id ?>" style="border-radius: 5px">
                                    <input type="number" name="qty" value="1" min="0" max="10" class="form-control" readonly style="border: none;" >
                                    <button type="submit" class="btn btn-primary" data-toggle="tooltip" title="Add to Cart" style="height: 30px; padding: 0 10px 0 10px; margin-left: 10px; border-radius: 5px"> <i class="fas fa-cart-plus"></i> </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
            <!-- End of Produk -->

            <!-- Pagination -->
            <nav aria-label="Page navigation example">
                <?= $pagination; ?>
            </nav>
            <!-- End of Pagination -->
        </div>
        <div class="col-md-3">
            <!-- Pencarian -->

            <!-- Kategori -->
            <div class="row">
                    <div class="col-md-12">
                        <div class="card mb-3">
                            <div class="card-header">
                                Kategori
                            </div>
                            <div class="card-body">
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item"><a href="<?= base_url() ?>">Semua Kategori</a></li>
                                    <?php foreach (getCategories() as $category) :?>
                                    <li class="list-group-item"><a href="<?= base_url("shop/category/$category->slug") ?>"><?= $category->title; ?></a></li>
                                    <?php endforeach; ?>
                                </ul>
                            </div>
                        </div>
                    </div>
            </div>
            <!-- End of Kategori -->
        </div>
    </div>
</main>
<!-- End Content -->
