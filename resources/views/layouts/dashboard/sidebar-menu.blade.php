<div class="sidebar-menu">
    <ul class="menu">
        <li class="sidebar-item {{ request()->is('beranda') ? 'active' : '' }}">
            <a href="{{ route('dashboard.index') }}" class="sidebar-link">
                <i class="bi bi-house-fill"></i>
                <span>Beranda</span>
            </a>
        </li>
        
        <li class="sidebar-item {{ request()->is('beranda/daftar-dokter*') ? 'active' : '' }}">
            <a href="{{ route('dashboard.doctor.index') }}" class="sidebar-link">
                <i class="bi bi-person-fill"></i>
                <span>Daftar Dokter</span>
            </a>
        </li>
        
        <li class="sidebar-item {{ request()->is('beranda/janji-temu-saya*') ? 'active' : '' }}">
            <a href="{{ route('dashboard.appointment.index') }}" class="sidebar-link">
                <i class="bi bi-calendar-check-fill"></i>
                <span>Janji Temu Saya</span>
            </a>
        </li>
    </ul>
</div>
