<?= $this->include('layout/header') ?>

<div class="layout-wrapper layout-content-navbar">
    <div class="layout-container">
        
        <?= $this->include('layout/sidebar') ?>
        
        <div class="layout-page">
            
            <?= $this->include('layout/navbar') ?>
            
            <div class="content-wrapper">
                
                <?= $this->renderSection('content') ?>
                
                <?= $this->include('layout/footer') ?>
                <div class="content-backdrop fade"></div>
            </div>
        </div>
    </div>
    <div class="layout-overlay layout-menu-toggle"></div>
</div>

<script src="<?= base_url('assets/vendor/libs/jquery/jquery.js') ?>"></script>
<script src="<?= base_url('assets/vendor/libs/popper/popper.js') ?>"></script>
<script src="<?= base_url('assets/vendor/js/bootstrap.js') ?>"></script>
<script src="<?= base_url('assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js') ?>"></script>
<script src="<?= base_url('assets/vendor/js/menu.js') ?>"></script>
<script src="<?= base_url('assets/js/main.js') ?>"></script>

<!-- Tambahan tempat untuk menyisipkan script canvas/custom js pada halaman tertentu -->
<?= $this->renderSection('scripts') ?>

</body>
</html>