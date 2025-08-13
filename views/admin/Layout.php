<?php include 'Header.php'; ?>
<?php include 'Sidebar.php'; ?>

<!-- Phần Content Chính -->
<div class="content">
    <?php 
    if (isset($view)) {
        include $view;
    } else {
        echo "<h2>Chào mừng đến với Admin Dashboard</h2>";
    }
    ?>
</div>

<?php include 'Footer.php'; ?>