<header class="topbar">
    <nav class="navbar top-navbar navbar-expand-md navbar-dark">
        <div class="navbar-header">
            <a class="nav-toggler waves-effect waves-light d-block d-md-none" href="javascript:void(0)">
                <i class="ti-menu ti-close"></i>
            </a>

            <div class="navbar-brand">
                <a href="{{ route('dashboard') }}" class="logo">
                    <b class="logo-icon">
                        <img src="../../assets/images/logo-icon.png" alt="homepage" class="dark-logo" />
                        <img src="../../assets/images/logo-light-icon.png" alt="homepage" class="light-logo" />
                    </b>
                    <span class="logo-text">
                        <img src="../../assets/images/logo-text.png" alt="homepage" class="dark-logo" />
                        <img src="../../assets/images/logo-light-text.png" class="light-logo" alt="homepage" />
                    </span>
                </a>
                <a class="sidebartoggler d-none d-md-block" href="javascript:void(0)" data-sidebartype="mini-sidebar">
                    <i class="mdi mdi-toggle-switch mdi-toggle-switch-off font-20"></i>
                </a>
            </div>
            <a class="topbartoggler d-block d-md-none waves-effect waves-light" href="javascript:void(0)"
                data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                aria-expanded="false" aria-label="Toggle navigation">
                <i class="ti-more"></i>
            </a>
        </div>
        <div class="navbar-collapse collapse" id="navbarSupportedContent">
            <ul class="navbar-nav float-left mr-auto">
                <li class="nav-item search-box">
                    <a class="nav-link waves-effect waves-dark" href="javascript:void(0)">
                        <div class="d-flex align-items-center">
                            <i class="mdi mdi-magnify font-20 mr-1"></i>
                            <div class="ml-1 d-none d-sm-block">
                                <span>Search</span>
                            </div>
                        </div>
                    </a>
                    <form class="app-search position-absolute">
                        <input type="text" id="routeSearch" class="form-control" placeholder="Search &amp; enter">
                        <a class="srh-btn" href="javascript:void(0)">
                            <i class="ti-close"></i>
                        </a>
                    </form>

                    <!-- Dropdown for filtered routes -->
                    <div id="routeDropdown" class="dropdown-menu"
                        style="display: none; position: absolute; width: 100%; max-height: 200px; overflow-y: auto;">
                        <!-- Filtered route items will appear here -->
                    </div>
                </li>
            </ul>

            <ul class="navbar-nav float-right">
                <li class="nav-item dropdown border-right">
                    <a class="nav-link dropdown-toggle waves-effect waves-dark" href="" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                        <i class="mdi mdi-bell-outline font-22"></i>
                        <span class="badge badge-pill badge-info noti">3</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right mailbox animated bounceInDown">
                        <span class="with-arrow">
                            <span class="bg-primary"></span>
                        </span>
                        <ul class="list-style-none">
                            <li>
                                <div class="drop-title bg-primary text-white">
                                    <h4 class="m-b-0 m-t-5">4 New</h4>
                                    <span class="font-light">Notifications</span>
                                </div>
                            </li>
                            <li>
                                <div class="message-center notifications">
                                    <a href="javascript:void(0)" class="message-item">
                                        <span class="btn btn-danger btn-circle">
                                            <i class="fa fa-link"></i>
                                        </span>
                                        <div class="mail-contnet">
                                            <h5 class="message-title">Luanch Admin</h5>
                                            <span class="mail-desc">Just see the my new admin!</span>
                                            <span class="time">9:30 AM</span>
                                        </div>
                                    </a>
                                    <a href="javascript:void(0)" class="message-item">
                                        <span class="btn btn-success btn-circle">
                                            <i class="ti-calendar"></i>
                                        </span>
                                        <div class="mail-contnet">
                                            <h5 class="message-title">Event today</h5>
                                            <span class="mail-desc">Just a reminder that you have event</span>
                                            <span class="time">9:10 AM</span>
                                        </div>
                                    </a>
                                    <a href="javascript:void(0)" class="message-item">
                                        <span class="btn btn-info btn-circle">
                                            <i class="ti-settings"></i>
                                        </span>
                                        <div class="mail-contnet">
                                            <h5 class="message-title">Settings</h5>
                                            <span class="mail-desc">You can customize this template as you want</span>
                                            <span class="time">9:08 AM</span>
                                        </div>
                                    </a>
                                    <a href="javascript:void(0)" class="message-item">
                                        <span class="btn btn-primary btn-circle">
                                            <i class="ti-user"></i>
                                        </span>
                                        <div class="mail-contnet">
                                            <h5 class="message-title">Pavan kumar</h5>
                                            <span class="mail-desc">Just see the my admin!</span>
                                            <span class="time">9:02 AM</span>
                                        </div>
                                    </a>
                                </div>
                            </li>
                            <li>
                                <a class="nav-link text-center m-b-5 text-dark" href="javascript:void(0);">
                                    <strong>Check all notifications</strong>
                                    <i class="fa fa-angle-right"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle waves-effect waves-dark pro-pic" href=""
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <img src="{{ __(auth()->user()->getImage()) }}" alt="user" class="rounded-circle"
                            width="40" height="40">
                        <span class="m-l-5 font-medium d-none d-sm-inline-block"> @auth('admin')
                                {{ __(auth()->user()->name) }}
                            @endauth <i class="mdi mdi-chevron-down"></i></span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right user-dd animated flipInY">
                        <span class="with-arrow">
                            <span class="bg-primary"></span>
                        </span>
                        <div class="d-flex no-block align-items-center p-15 bg-primary text-white m-b-10">
                            <div class="">
                                <img src="{{ __(auth()->user()->getImage()) }}" alt="user" class="rounded-circle"
                                    width="60" height="60">
                            </div>
                            <div class="m-l-10">
                                <h4 class="m-b-0">{{ __(auth()->user()->name) }}</h4>
                                <p class=" m-b-0">{{ __(auth()->user()->email) }}</p>
                            </div>
                        </div>
                        <div class="profile-dis scrollable">
                            <a class="dropdown-item" href="{{ route('profile.index') }}">
                                <i class="ti-user m-r-5 m-l-5"></i> @lang('My Profile') </a>
                            <a class="dropdown-item" href="javascript:void(0)"
                                onclick="document.querySelector('#logutForm').submit()">
                                <i class="fa fa-power-off m-r-5 m-l-5"></i> @lang('Logout') </a>
                            <form id="logutForm" action="{{ route('logout') }}" method="POST">
                                @method('DELETE')
                                @csrf
                            </form>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </nav>

    @push('scripts')
        <script>
            function loadRoutes(query = '') {
                $.ajax({
                    url: '/all-routes',
                    method: 'GET',
                    success: function(data) {
                        let filteredRoutes = data.filter(function(route) {
                            const uri = route.uri ? route.uri.toLowerCase() :
                            '';
                            const name = route.name ? route.name.toLowerCase() :
                            '';
                            return uri.includes(query.toLowerCase()) || name.includes(query.toLowerCase());
                        });

                        let dropdownHtml = '';
                        filteredRoutes.forEach(function(route) {
                            dropdownHtml += `
                            <a href="${route.uri}" class="dropdown-item">
                                <strong>${route.name}</strong><br>
                                <small>${route.uri}</small>
                            </a>
                        `;
                        });

                        if (dropdownHtml.length > 0) {
                            $('#routeDropdown').html(dropdownHtml).show();
                        } else {
                            $('#routeDropdown').html('<div class="dropdown-item">No results found</div>').show();
                        }
                    }
                });
            }

            $('#routeSearch').on('input', function() {
                const query = $(this).val();
                if (query.length > 0) {
                    loadRoutes(query);
                } else {
                    $('#routeDropdown').hide();
                }
            });

            $('.srh-btn').on('click', function() {
                $('#routeSearch').val('');
                $('#routeDropdown').hide();
            });
        </script>
    @endpush

</header>
