
<li class="menu-header"><i class="fas fa-landmark"></i><span> Menu Utama Customer</span></li>
<li class="nav-item{{ request()->is('view') ? ' active' : '' }}"><a href="{{ url('/anggota/peminjaman') }}"><i class="fas fa-user-friends"></i><span>Peminjaman</span></a></li>
<li class="nav-item{{ request()->is('view') ? ' active' : '' }}"><a href="{{ url('/anggota/sanksi') }}"><i class="fas fa-user-friends"></i><span>Sanksi</span></a></li>