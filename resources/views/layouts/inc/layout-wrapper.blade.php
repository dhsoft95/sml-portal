<div class="vertical-menu">

    <div data-simplebar class="h-100">

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                <li class="menu-title" data-key="t-menu">Menu</li>

                <li>
                    <a href="">
                        <i data-feather="home"></i>
                        <span data-key="t-dashboard">Dashboard</span>
                    </a>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow">
                        <i data-feather="users"></i>
                        <span data-key="t-apps">User Matrix</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li>
                            <a href="apps-calendar.html">
                                <span data-key="t-calendar">All Registers Users</span>
                            </a>
                        </li>

                        <li>
                            <a href="apps-chat.html">
                                <span data-key="t-chat">All Active users</span>
                            </a>
                        </li>

                        <li>
                            <a href="apps-chat.html">
                                <span data-key="t-chat">All In-active users</span>
                            </a>
                        </li>
                        <li>
                            <a href="apps-chat.html">
                                <span data-key="t-chat">All Churn users</span>
                            </a>
                        </li>

                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow">
                        <i data-feather="settings"></i>
                        <span data-key="t-authentication">Service Desk </span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
{{--                        <li><a href="/service-desk" data-key="t-login">Analytics</a></li>--}}
                        <li><a href="{{ route('service-desk') }}" data-key="t-login">Analytics</a></li>
                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow">
                        <i data-feather="share-2"></i>
                        <span data-key="t-multi-level">Multi Level</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="true">
                        <li><a href="javascript: void(0);" data-key="t-level-1-1">Level 1.1</a></li>
                        <li>
                            <a href="javascript: void(0);" class="has-arrow" data-key="t-level-1-2">Level 1.2</a>
                            <ul class="sub-menu" aria-expanded="true">
                                <li><a href="javascript: void(0);" data-key="t-level-2-1">Level 2.1</a></li>
                                <li><a href="javascript: void(0);" data-key="t-level-2-2">Level 2.2</a></li>
                            </ul>
                        </li>
                    </ul>
                </li>

            </ul>

        </div>
        <!-- Sidebar -->
    </div>
</div>
<!-- Left Sidebar End -->
