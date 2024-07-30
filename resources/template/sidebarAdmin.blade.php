
<li class="menu-header"><i class="fas fa-landmark"></i><span> Menu Utama Admin</span></li>
<li class="nav-item{{ request()->is('pengguna') ? ' active' : '' }}"><a href="{{ url('/admin/pengguna') }}"><i class="fas fa-user-friends"></i><span> Pengguna</span></a></li>
<li class="nav-item{{ request()->is('customer') ? ' active' : '' }}"><a href="{{ url('/admin/anggota') }}"><i class="fas fa-chalkboard-teacher"></i><span>Anggota</span></a></li>
<li class="nav-item{{ request()->is('hargahariini') ? ' active' : '' }}"><a href="{{ url('/admin/buku') }}"><i class="fas fa-book-open"></i><span>Buku</span></a></li>
<li class="nav-item{{ request()->is('invoice') ? ' active' : '' }}"><a href="{{ url('/admin/peminjaman') }}"><i class="fas fa-users"></i><span>Peminjaman</span></a></li>
<li class="nav-item{{ request()->is('kamar') ? ' active' : '' }}"><a href="{{ url('/admin/penulis') }}"><i class="fas fa-user-graduate"></i><span>Penulis</span></a></li>
<li class="nav-item{{ request()->is('pembayaran') ? ' active' : '' }}"><a href="{{ url('/admin/rak') }}"><i class="fas fa-user-graduate"></i><span>Rak</span></a></li>
<li class="nav-item{{ request()->is('reservasi') ? ' active' : '' }}"><a href="{{ url('/admin/sanksi') }}"><i class="far fa-bell"></i><span>Sanksi</span></a></li>