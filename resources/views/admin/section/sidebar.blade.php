<div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
    <div class="menu_section">
        <h3>General</h3>
        <ul class="nav side-menu">
            <li><a><i class="fa fa-home"></i> Dashboard<span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">
                    <li><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                </ul>
            </li>
            <li><a><i class="fa fa-spoon"></i> Menu <span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">
                    <li><a href="{{ route('menu.show') }}">Kelola Menu</a></li>
                    <li><a href="{{ route('menu.create') }}">Tambah Menu</a></li>

                </ul>
            </li>
            <li><a><i class="fa fa-shopping-bag"></i> Pesanan <span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">
                    <li><a href="pesananmasuk">Pesanan Masuk</a></li>
                    <li><a href="pesananselesai">Pesanan Selesai</a></li>
                </ul>
            </li>
            <li><a><i class="fa fa-file-text"></i> Laporan <span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">
                    <li><a href="laporan">Laporan</a></li>
                </ul>
            </li>
            <li><a><i class="fa fa-user-plus"></i> Kelola Karyawan <span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">
                    <li><a href="kelolakaryawan">Kelola Karyawan</a></li>
                    <li><a href="tambahkaryawanform">Tambah Karyawan</a></li>
                </ul>
            </li>
        </ul>
    </div>


</div>
<!-- /sidebar menu -->

