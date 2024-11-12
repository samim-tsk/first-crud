<aside class="left-sidebar">
    <div class="scroll-sidebar">
        <nav class="sidebar-nav">
            <ul id="sidebarnav">
                <li class="nav-small-cap">
                    <i class="mdi mdi-dots-horizontal"></i>
                    <span class="hide-menu">Brands</span>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{ route('brands.index') }}" aria-expanded="false">
                        <i class="mdi mdi-image-filter-tilt-shift"></i>
                        <span class="hide-menu"> @lang('Brands') </span>
                    </a>
                </li>
                <li class="nav-small-cap">
                    <i class="mdi mdi-dots-horizontal"></i>
                    <span class="hide-menu">{{ __('Categories') }}</span>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{ route('categories.index') }}" aria-expanded="false">
                        <i class="mdi mdi-image-filter-tilt-shift"></i>
                        <span class="hide-menu"> @lang('Categories') </span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a onclick="document.querySelector('#logutForm').submit()" class="sidebar-link waves-effect waves-dark sidebar-link" href="javascript:void(0)">
                        <i class="mdi mdi-directions"></i>
                        <span class="hide-menu">Log Out</span>
                    </a>
                    <form id="logutForm" action="{{ route('logout') }}" method="POST">
                        @method('DELETE')
                        @csrf
                    </form>
                </li>
            </ul>
        </nav>
    </div>
</aside>