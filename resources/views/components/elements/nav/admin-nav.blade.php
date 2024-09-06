<aside class="col-lg-3 d-none d-lg-block sidebar">
    <div class="card bg-transparent border-0">
        <div class="card-body bg-white rounded-4 pb-4">
            <a href="{{ route('admin.profile.index') }}" title="Profil" class="text-decoration-none">
                <div class="rounded-circle overflow-hidden avatar-profile mx-auto mb-2 mt-3">
                    <img src="{{ $user->avatar ? asset($user->avatar) : 'https://ui-avatars.com/api/?background=00754b&color=fff&name=' . $user->name }}"
                        alt="Avatar" class="img-fluid avatar-image" />
                </div>
                <h6 class="card-title text-center nama-user m-0">{{ $user->name }}</h6>
                <p class="card-text text-black text-center text-nowrap text-truncate">{{ $user->email }}</p>
            </a>

            <h6 class="fw-bold mt-4 mb-1">Menu</h6>
            <hr class="my-2" />
            <a href="" class="link {{ request()->is('/admin/dashboard') || request()->is('/admin') ? 'active' : '' }}">
                <i class="fa-solid fa-chart-simple"></i>Dashboard
            </a>

            @can('campaign.index')
            <a href="{{ route('admin.campaign.index') }}"
                class="link {{ request()->routeIs('admin.campaign.index') ? 'active' :'' }}">
                <i class="fa-solid fa-seedling"></i>Campaign
            </a>
            @endcan

            {{-- <a href="" class="link {{ request()->is('/admin/reports') ? 'active' :'' }}">
                <i class="fa-solid fa-file"></i>Report
            </a> --}}


            <h6 class="fw-bold mt-4 mb-1">User Management</h6>
            <hr class="my-2" />
            @can('user.index')
            <a href="{{route('admin.user.index')}}"
                class="link {{ request()->routeIs('admin.user.index') ? 'active' :'' }}">
                <i class="fa-solid fa-user"></i>User
            </a>

            @endcan

            @can('role.index')
            <a href="{{ route('admin.role.index') }}"
                class="link {{ request()->routeIs('admin.role.index') ? 'active' :'' }}">
                <i class="fa-solid fa-sitemap"></i>Role
            </a>
            @endcan

            @can('permission.index')
            <a href="{{ route('admin.permission.index') }}"
                class="link {{ request()->routeIs('admin.permission.index') ? 'active' :'' }}">
                <i class="fa-solid fa-shield-halved"></i>Permission
            </a>
            @endcan
        </div>
    </div>
</aside>
<!-- End of Sidebar Large -->

<!-- Menu Small -->
<section class="col-12 position-fixed mobile-layout d-block d-lg-none">
    <div class="card-bottom-mobile">
        <ul class="sidebar-link">

            <li class="list-group-item">
                <a href="#" class="link">
                    <a href=""
                        class="link {{ request()->is('/admin/dashboard') ||request()->is('/admin') ? 'active' :'' }}">
                        <i class="fa-solid fa-chart-simple"></i>Dashboard
                    </a>
                </a>
            </li>

            {{-- <li class="list-group-item">
                <a href="{{ route('admin.campaign.index') }}"
                    class="link {{ request()->routeIs('admin.campaign.index') ? 'active' :'' }}">
                    <i class="fa-solid fa-file"></i>Report
                </a>
            </li> --}}

            @can('campaign.index')
            <li class="list-group-item">
                <a href="{{ route('admin.campaign.index') }}"
                    class="link {{ request()->is('/admin/campaigns') ? 'active' :'' }}">
                    <i class="fa-solid fa-seedling"></i>Campaign
                </a>
            </li>
            @endcan

            @can('user.index')
            <li class="list-group-item">
                <a href="{{ route('admin.user.index') }}"
                    class="link {{ request()->is('/admin/users') ? 'active' :'' }}">
                    <i class="fa-solid fa-users"></i>User
                </a>
            </li>
            @endcan

            <li class="list-group-item">
                <a href="{{route('admin.profile.index')}}"
                    class="link {{ request()->is('/admin/profile') ? 'active' :'' }}">
                    <i class="fa-solid fa-user"></i>Profile
                </a>
            </li>
        </ul>
    </div>
</section>
<!-- End of Menu Small -->