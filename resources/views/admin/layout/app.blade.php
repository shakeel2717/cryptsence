<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>@yield('title') | {{ env('APP_DESC') }}</title>
    <meta name="description" content="{{ env('APP_DESC') }}">
    <meta name="author" content="Asan Webs Development">
    <link rel="shortcut icon" href="assets/media/favicons/favicon.png">
    <link rel="icon" type="image/png" sizes="192x192" href="{{ asset('assets/media/favicons/favicon-192x192.png') }}">
    <link rel="apple-touch-icon" sizes="180x180"
        href="{{ asset('assets/media/favicons/apple-touch-icon-180x180.png') }}">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap">
    <link rel="stylesheet" id="css-main" href="{{ asset('assets/css/dashmix.min.css') }}">
    <link rel="stylesheet" id="css-theme" href="{{ asset('assets/css/themes/xwork.min.css') }}">
    @yield('head')
</head>

<body>
    <div id="page-container" class="sidebar-o side-scroll page-header-fixed page-header-dark main-content-narrow">
        <nav id="sidebar" aria-label="Main Navigation">
            <div class="smini-visible-block">
                <div class="content-header bg-header-dark">
                    <a class="font-w600 text-white tracking-wide" href="{{ route('user.dashboard') }}">
                        D<span class="opacity-75">x</span>
                    </a>
                </div>
            </div>
            <div class="smini-hidden">
                <div class="content-header justify-content-lg-center bg-header-dark">
                    <a class="font-w600 text-white tracking-wide" href="{{ route('user.dashboard') }}">
                        <img src="{{ asset('assets/brand/logo-light.png') }}" alt="Logo {{ env('APP_NAME') }}"
                            width="250">
                    </a>
                    <div class="d-lg-none">
                        <a class="text-white ml-2" data-toggle="layout" data-action="sidebar_close"
                            href="javascript:void(0)">
                            <i class="fa fa-times-circle"></i>
                        </a>
                    </div>
                </div>
            </div>
            <div class="js-sidebar-scroll">
                <div class="content-side content-side-full text-center bg-body-light">
                    <div class="smini-hide">
                        <img class="img-avatar" src="{{ asset('assets/media/avatars/avatar10.jpg') }}" alt="">
                        <div class="mt-3 font-w600">{{ Auth::user()->name }}</div>
                        <a class="link-fx text-muted" href="javascript:void(0)">Full Access</a>
                    </div>
                </div>
                <div class="content-side">
                    <ul class="nav-main">
                        <li class="nav-main-item">
                            <a class="nav-main-link active" href="{{ route('user.dashboard') }}">
                                <i class="nav-main-link-icon fa fa-rocket"></i>
                                <span class="nav-main-link-name">Overview</span>
                            </a>
                        </li>
                        <li class="nav-main-heading">Finance Manage</li>
                        <li class="nav-main-item">
                            <a class="nav-main-link" href="{{ route('admin.addBalance') }}">
                                <i class="nav-main-link-icon fa fa-money-bill"></i>
                                <span class="nav-main-link-name">Add Balance</span>
                            </a>
                        </li>

                        <li class="nav-main-heading">Statements</li>

                        <li class="nav-main-item">
                            <a class="nav-main-link" href="{{ route('admin.history.users') }}">
                                <i class="nav-main-link-icon fa fa-money-bill"></i>
                                <span class="nav-main-link-name">All Users</span>
                            </a>
                        </li>


                        <li class="nav-main-item">
                            <a class="nav-main-link" href="{{ route('admin.history.user.plan') }}">
                                <i class="nav-main-link-icon fa fa-money-bill"></i>
                                <span class="nav-main-link-name">User's Plans</span>
                            </a>
                        </li>


                        <li class="nav-main-item">
                            <a class="nav-main-link" href="{{ route('admin.history.deposits') }}">
                                <i class="nav-main-link-icon fa fa-money-bill"></i>
                                <span class="nav-main-link-name">Deposits</span>
                            </a>
                        </li>

                        <li class="nav-main-item">
                            <a class="nav-main-link" href="{{ route('admin.history.withdrawals.pending') }}">
                                <i class="nav-main-link-icon fa fa-money-bill"></i>
                                <span class="nav-main-link-name">Pending Withdrawals</span>
                            </a>
                        </li>

                        <li class="nav-main-item">
                            <a class="nav-main-link" href="{{ route('admin.history.withdrawals') }}">
                                <i class="nav-main-link-icon fa fa-money-bill"></i>
                                <span class="nav-main-link-name">All Withdrawals</span>
                            </a>
                        </li>

                        <li class="nav-main-item">
                            <a class="nav-main-link" href="{{ route('admin.history.rois') }}">
                                <i class="nav-main-link-icon fa fa-money-bill"></i>
                                <span class="nav-main-link-name">All Roi's</span>
                            </a>
                        </li>

                        <li class="nav-main-item">
                            <a class="nav-main-link" href="{{ route('admin.history.passive') }}">
                                <i class="nav-main-link-icon fa fa-money-bill"></i>
                                <span class="nav-main-link-name">All Passive TID</span>
                            </a>
                        </li>

                        <li class="nav-main-item">
                            <a class="nav-main-link" href="{{ route('admin.history.direct.commission') }}">
                                <i class="nav-main-link-icon fa fa-money-bill"></i>
                                <span class="nav-main-link-name">All Direct Commission</span>
                            </a>
                        </li>


                        <li class="nav-main-item">
                            <a class="nav-main-link" href="{{ route('admin.history.indirect.commission') }}">
                                <i class="nav-main-link-icon fa fa-money-bill"></i>
                                <span class="nav-main-link-name">All Indirect Commission</span>
                            </a>
                        </li>


                        <li class="nav-main-item">
                            <a class="nav-main-link" href="{{ route('admin.history.coinpayment') }}">
                                <i class="nav-main-link-icon fa fa-money-bill"></i>
                                <span class="nav-main-link-name">Coin Payments TID</span>
                            </a>
                        </li>


                        <li class="nav-main-heading">Exit</li>
                        <li class="nav-main-item">
                            <a class="nav-main-link" href="{{ route('user.plan.index') }}">
                                <i class="nav-main-link-icon fa fa-lock"></i>
                                <span class="nav-main-link-name">
                                    <form action="{{ route('logout') }}" method="POST">
                                        @csrf
                                        <button class="border-0 m-0 p-0" type="submit">
                                            Logout
                                        </button>
                                    </form>
                                </span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <header id="page-header">
            <div class="content-header">
                <div>
                    <button type="button" class="btn btn-dual" data-toggle="layout" data-action="sidebar_toggle">
                        <i class="fa fa-fw fa-stream fa-flip-horizontal"></i>
                    </button>
                </div>
                <div>
                    <div class="dropdown d-inline-block">
                        <button type="button" class="btn btn-dual" id="page-header-notifications-dropdown"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="far fa-fw fa-flag"></i>
                            <span class="badge badge-success badge-pill">0</span>
                        </button>
                        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right p-0"
                            aria-labelledby="page-header-notifications-dropdown">
                            <div class="bg-primary-darker rounded-top font-w600 text-white text-center p-3">
                                Notifications
                            </div>
                            <ul class="nav-items my-2">

                            </ul>
                            <div class="p-2 border-top">
                                <a class="btn btn-light btn-block text-center" href="javascript:void(0)">
                                    <i class="fa fa-fw fa-eye mr-1"></i> View All
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="dropdown d-inline-block">
                        <button type="button" class="btn btn-dual" id="page-header-user-dropdown"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="far fa-fw fa-user-circle"></i>
                            <i class="fa fa-fw fa-angle-down ml-1 d-none d-sm-inline-block"></i>
                        </button>
                        <div class="dropdown-menu dropdown-menu-right p-0" aria-labelledby="page-header-user-dropdown">
                            <div class="bg-primary-darker rounded-top font-w600 text-white text-center p-3">
                                <img class="img-avatar img-avatar48 img-avatar-thumb"
                                    src="{{ asset('assets/media/avatars/avatar10.jpg') }}" alt="">
                                <div class="pt-2">
                                    <a class="text-white font-w600"
                                        href="be_pages_generic_profile.html">{{ Auth::user()->name }}</a>
                                </div>
                            </div>
                            <div class="p-2">
                                <a class="dropdown-item" href="{{ route('user.profile.index') }}">
                                    <i class="fa fa-fw fa-cog mr-1"></i> My Account
                                </a>
                                <a class="dropdown-item" href="{{ route('user.profile.password.change') }}">
                                    <i class="fa fa-fw fa-cog mr-1"></i> Change Password
                                </a>
                                <div role="separator" class="dropdown-divider"></div>
                                <form action="{{ route('logout') }}" method="POST">
                                    @csrf
                                    <button type="submit" class="border-0 bg-white dropdown-item" type="submit"
                                        value="Sign Out"><i class="fa fa-fw fa-arrow-alt-circle-left mr-1"></i> Log
                                        Out</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div id="page-header-search" class="overlay-header bg-primary">
                <div class="content-header">
                    <form class="w-100" action="be_pages_generic_search.html" method="POST">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <button type="button" class="btn btn-primary" data-toggle="layout"
                                    data-action="header_search_off">
                                    <i class="fa fa-fw fa-times-circle"></i>
                                </button>
                            </div>
                            <input type="text" class="form-control border-0" placeholder="Search.."
                                id="page-header-search-input" name="page-header-search-input">
                        </div>
                    </form>
                </div>
            </div>
            <div id="page-header-loader" class="overlay-header bg-primary-dark">
                <div class="content-header">
                    <div class="w-100 text-center">
                        <i class="fa fa-fw fa-2x fa-sun fa-spin text-white"></i>
                    </div>
                </div>
            </div>
        </header>
        <main id="main-container">
            @yield('content')
        </main>
        <footer id="page-footer" class="bg-body">
            <div class="content py-0">
                <div class="row font-size-sm">
                    <div class="col-sm-6 order-sm-1 text-center text-sm-left">
                        <a class="font-w600" href="" target="_blank">{{ env('APP_NAME') }}</a>
                        &copy; <span data-toggle="year-copy"></span> All Rights Reserved!
                    </div>
                </div>
            </div>
        </footer>
    </div>
    <script src="{{ asset('assets/js/dashmix.core.min.js') }}"></script>
    <script src="{{ asset('assets/js/dashmix.app.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/datatables-bs5/js/dataTables.bootstrap5.min.js') }}"></script>
    <script src="{{ asset('assets/js/pages/be_tables_datatables.min.js') }}"></script>
    <x-alert />
    @yield('footer')
</body>

</html>
