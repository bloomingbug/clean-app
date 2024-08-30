<aside class="col-lg-3 d-none d-lg-block sidebar">
    <div class="card bg-transparent border-0">
        <div class="card-body bg-white rounded-4">

            <a href="{{ route('cleanfund.index') }}"
                class="link {{ request()->routeIs('cleanfund.index')  ? 'active' : '' }}">
                <i class="fa-solid fa-circle-dollar-to-slot"></i>CleanFund
            </a>
            <a href="{{route('home')}}" class="link {{ request()->routeIs('home') ? 'active' :'' }}">
                <i class="fa-solid fa-seedling"></i>CleanUp
            </a>
            <a href="{{ route('cleanact.index') }}"
                class="link {{ request()->routeIs('cleanact.index') ? 'active' :'' }}">
                <i class="fa-solid fa-fire"></i>CleanAct
            </a>
        </div>
    </div>
</aside>
<!-- End of Sidebar Large -->

<!-- Menu Small -->
<section class="col-12 position-fixed mobile-layout d-block d-lg-none">
    <div class="card-bottom-mobile">
        <ul class="sidebar-link">
            <li class="list-group-item">
                <a href="{{ route('cleanfund.index') }}"
                    class="link {{ request()->routeIs('cleanfund.index')  ? 'active' :'' }}">
                    <i class="fa-solid fa-circle-dollar-to-slot"></i>CleanFund
                </a>
            </li>

            <li class="list-group-item">
                <a href="{{ route('home') }}" class="link {{ request()->routeIs('home') ? 'active' :'' }}">
                    <i class="fa-solid fa-seedling"></i>CleanUp
                </a>
            </li>
            <li class="list-group-item">
                <a href="{{ route('cleanact.index') }}"
                    class="link {{ request()->routeIs('cleanact.index') ? 'active' :'' }}">
                    <i class="fa-solid fa-fire"></i>CleanAct
                </a>
            </li>
        </ul>
    </div>
</section>
<!-- End of Menu Small -->