<!-- Sidebar -->
<div class="sidebar">
    <ul class="nav flex-column p-3 text-white">
        <li class="nav-item">
            <a class="nav-link text-white" href="?action=admin">Trang Chủ</a>
        </li>
        <li class="nav-item">
            <a class="nav-link text-white" data-bs-toggle="collapse" href="#productMenu" role="button" aria-expanded="false" aria-controls="productMenu">
                Product
            </a>
            <div class="collapse" id="productMenu">
                <ul class="nav flex-column ms-3">
                    <li class="nav-item">
                        <a class="nav-link text-white" href="?action=admin&act=list">List</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="?action=admin&act=add">Add</a>
                    </li>
                </ul>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link text-white" data-bs-toggle="collapse" href="#categoryMenu" role="button" aria-expanded="false" aria-controls="categoryMenu">
                Category
            </a>
            <div class="collapse" id="categoryMenu">
                <ul class="nav flex-column ms-3">
                    <li class="nav-item">
                        <a class="nav-link text-white" href="?action=category&act=list">List</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="?action=category&act=add">Add</a>
                    </li>
                </ul>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link text-white" data-bs-toggle="collapse" href="#userMenu" role="button" aria-expanded="false" aria-controls="userMenu">
                User
            </a>
            <div class="collapse" id="userMenu">
                <ul class="nav flex-column ms-3">
                    <li class="nav-item">
                        <a class="nav-link text-white" href="?action=admin&act=userList">List</a>
                    </li>
                </ul>
            </div>
        </li>
    </ul>
</div>