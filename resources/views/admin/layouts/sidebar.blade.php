<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="/manages">3SBOOK</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="/manages">3S</a>
        </div>

        <ul class="sidebar-menu">
            <li class="menu-header">Blog</li>

            <li><a class="nav-link" href="{{ route('manages.index') }}"><i class="fas fa-fire"></i>
                    <span>Manage</span></a></li>

            <li class="dropdown">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-th"></i><span>Category</span></a>
                <ul class="dropdown-menu">
                    <li><a class="nav-link" href="{{ route('categories.index') }}">List Category</a></li>
                </ul>
            </li>

            <li class="dropdown">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-tags"></i><span>Tag</span></a>
                <ul class="dropdown-menu">
                    <li><a class="nav-link" href="{{ route('tags.index') }}">List Tag</a></li>
                </ul>
            </li>

            <li class="dropdown">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-file-alt"></i><span>Book</span></a>
                <ul class="dropdown-menu">
                    <li><a class="nav-link" href="{{ route('books.index') }}">List Book</a></li>
                </ul>
            </li>

            <li class="dropdown">
                <a href="#" class="nav-link has-dropdown"><i class="fa fas fa-columns"></i><span>Order</span></a>
                <ul class="dropdown-menu">
                    <li><a class="nav-link" href="{{ route('orders.index') }}">List Order</a></li>
                </ul>
            </li>
        </ul>

    </aside>
</div>
