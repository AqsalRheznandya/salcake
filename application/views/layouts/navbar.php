<nav class="navbar navbar-expand-md navbar-dark fixed-top bg-primary">
    <div class="container">
        <a class="navbar-brand" href="<?= base_url('home'); ?>">SALCAKE</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse"
            aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse" style="margin-left:20px; color:#fff;">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="<?= base_url('home'); ?>"  style="color:#fff">Home <span class="sr-only">(current)</span></a>
                </li>
                <?php $role = $this->session->userdata('role'); ?>
                <?php if ($role == 'admin') : ?> 
                <li class="nav-item ">
                    <a class="nav-link" href="<?= base_url('order'); ?>" class="dropdown-item" style="color:#fff">Pesanan</a>                   
                </li>
                <li class="nav-item "> 
                    <a class="nav-link" href="<?= base_url('product'); ?>" class="dropdown-item" style="color:#fff">Produk</a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link" href="<?= base_url('user'); ?>" class="dropdown-item" style="color:#fff">Pengguna</a>  
                </li>
                <li class="nav-item ">
                    <a class="nav-link" href="<?= base_url('category'); ?>" class="dropdown-item" style="color:#fff">Kategori</a>
                </li>
                <?php endif; ?>
            </ul>
            <ul class="navbar-nav">

                <?php if (!$this->session->userdata('is_login')) : ?>
                <li class="nav-item">
                    <a href="<?= base_url('/login'); ?>" class="nav-link" style="color:#fff">Login</a>
                </li>
                <li class="nav-item">
                    <a href="<?= base_url('/register'); ?>" class="nav-link" style="color:#fff">Register</a>
                </li>
                <?php else : ?>
                <li class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" id="dropdown2" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false"  style="color:#fff">
                        Hai, <?= ucwords($this->session->userdata('name')); ?>
                    </a>
                    <?php if ($role == 'admin') : ?> 
                    <div class="dropdown-menu" aria-labelledby="dropdown2">
                        <a href="<?= base_url('Profile'); ?>" class="dropdown-item" >Profile</a>
                        <a href="<?= base_url('/logout'); ?>" onclick="return confirm('Yakin ingin keluar?')" class="dropdown-item">Keluar</a>
                    </div>
                    <?php else : ?>
                    <div class="dropdown-menu" aria-labelledby="dropdown2">
                        <a href="<?= base_url('Profile'); ?>" class="dropdown-item">Profile</a>
                        <a href="<?= base_url('myorder'); ?>" class="dropdown-item">Pesananku</a>
                        <a href="<?= base_url('logout'); ?>" onclick="return confirm('Yakin ingin keluar?')" class="dropdown-item">Keluar</a>
                    </div>
                    <li class="nav-item">
                        <a href="<?= base_url('cart'); ?>" class="nav-link"> <i class="fas fa-shopping-cart"></i> Keranjang (<?= getCart(); ?>) </a>
                    </li>
                    <?php endif; ?>
                </li>
                <?php endif; ?>
            </ul>
        </div>
    </div>
</nav>