<!-- Sidebar -->
<div class="sidebar sidebar-style-2">
    <div class="sidebar-wrapper scrollbar scrollbar-inner">
        <div class="sidebar-content">
            <div class="user">
                <div class="avatar-sm float-left mr-2">
                    <img src="{{ url('atlantis/assets/img/profile.jpg') }}" alt="..." class="avatar-img rounded-circle">
                </div>
                <div class="info">
                    <a data-toggle="collapse" href="#" aria-expanded="true">
                        <span>
                            {{ Session::get('name') }}
                            <span class="user-level">Welcome</span>
                        </span>
                    </a>
                </div>
            </div>
            <ul class="nav nav-primary">
                <li class="nav-section">
                    <span class="sidebar-mini-icon">
                        <i class="fa fa-ellipsis-h"></i>
                    </span>
                    <h4 class="text-section">Billing</h4>
                </li>
                <li class="nav-item">
                    <a href="{{ route('jurnal-harian.index') }}">
                        <i class="flaticon-add-user"></i>
                        <p>Jurnal Harian</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('user-baru.index') }}">
                        <i class="flaticon-add-user"></i>
                        <p>User Baru</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('tagihan-bulanan.index') }}">
                        <i class="fas fa-money-check-alt"></i>
                        <p>Tagihan Bulanan</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('user-close.index') }}">
                        <i class="fas fa-check"></i>
                        <p>Data User Close</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('user-hold.index') }}">
                        <i class="fas fa-times"></i>
                        <p>Data User Hold</p>
                    </a>
                </li>
                <li class="nav-section">
                    <span class="sidebar-mini-icon">
                        <i class="fa fa-ellipsis-h"></i>
                    </span>
                    <h4 class="text-section">Marketing</h4>
                </li>
                <li class="nav-item">
                    <a href="{{ route('user-prospek.index') }}">
                        <i class="fas fa-user-plus"></i>
                        <p>User Prospek</p>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>
<!-- End Sidebar -->