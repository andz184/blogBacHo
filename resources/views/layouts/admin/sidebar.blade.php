<!-- Thêm vào menu sidebar -->
<li class="nav-item">
    <a href="{{ route('admin.stages.index') }}" class="nav-link {{ request()->routeIs('admin.stages.*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-clock"></i>
        <p>Quản lý giai đoạn</p>
    </a>
</li>
