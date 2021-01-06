<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
            <!-- Sidebar user panel -->

            <!-- search form -->

            <!-- /.search form -->
            <!-- sidebar menu: : style can be found in sidebar.less -->
            <ul class="sidebar-menu" data-widget="tree">
                <li class="header">MAIN NAVIGATION</li>
                <!-- <li class="active treeview">
                        <a href="/home">
                            <i class="fa fa-dashboard"></i> <span>Daoard</span>
                            <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                            <ul class="treeview-menu">
                                <li class="active"><a href="/home"><i class="fa fa-circle-o"></i> Dashboard v1</a></li>
                                <li><a href="index2.html"><i class="fa fa-circle-o"></i> Dashboard v2</a></li>
                            </ul>
                        </li>
                        <li class="treeview">
                        <a href="#">
                            <i class="fa fa-folder"></i> <span>Examples</span>
                            <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="pages/examples/invoice.html"><i class="fa fa-circle-o"></i> Invoice</a></li>
                            <li><a href="pages/examples/profile.html"><i class="fa fa-circle-o"></i> Profile</a></li>
                            <li><a href="pages/examples/login.html"><i class="fa fa-circle-o"></i> Login</a></li>
                        </ul>
                     </li> -->

                    {{--  <li><a href=""><i class="fa fa-user"></i> <span>DASHBOARD</span></a></li>
                    <li><a href="{{ route('admin.food.index') }}"><i class="fa fa-user"></i> <span>MENU MAKANAN</span></a></li>
                    <li><a href="{{ route('admin.drink.index') }}"><i class="fa fa-book"></i> <span>MENU MINUMAN</span></a></li>
                    <li><a href="{{ route('admin.visitor.index') }}"><i class="fa fa-book"></i> <span>DATA PENGUNJUNG</span></a></li>  --}}
                    <li><a href="{{ route('admin.dashboard.index') }}"><i class="fa fa-user"></i> <span>DASHBOARD</span></a></li>
                    {{-- <li><a href="/home"><i class="fa fa-user"></i> <span>DASHBOARD</span></a></li> --}}
                    <li><a href="{{ route('admin.katagori.index') }}"><i class="fa fa-user"></i> <span>KATEGORI</span></a></li>
                    <li><a href="{{ route('admin.produk.index') }}"><i class="fa fa-user"></i> <span>PRODUK</span></a></li>
                    <li><a href="{{ route('admin.transaksi.index') }}"><i class="fa fa-user"></i> <span>TRANSAKSI</span></a></li>
                    <li><a href="{{ route('admin.provinsi.index') }}"><i class="fa fa-user"></i> <span>PROVINSI</span></a></li>
                    <li><a href="{{ route('admin.kabupaten.index') }}"><i class="fa fa-user"></i> <span>KABUPATEN</span></a></li>
                    <li><a href="{{ route('admin.kota.index') }}"><i class="fa fa-user"></i> <span>KOTA</span></a></li>

                     <li class="treeview">
                        <a href="#">
                          <i class="fa fa-pie-chart"></i>
                          <span>LAPORAN</span>
                          <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                          </span>
                        </a>
                        <ul class="treeview-menu">
                          <li><a href="{{ route('admin.laporan.top-user') }}"><i class="fa fa-circle-o"></i>DATA USER</a></l>
                          <li><a href="{{ route('admin.laporan.top-produk') }}"><i class="fa fa-circle-o"></i>DATA PRODUK</a></l>
                          <li><a href=""><i class="fa fa-circle-o"></i>GRAFIG PENJUALAN PRODUK</a></l>
                          <li><a href="{{ route('admin.laporan.produkmahal') }}"><i class="fa fa-circle-o"></i>PRODUK TERMAHAL </a></li>
                          <li><a href="{{ route('admin.laporan.produkmurah') }}"><i class="fa fa-circle-o"></i>PRODUK TERMURAH</a></l>
                          {{-- <li><a href=""><i class="fa fa-circle-o"></i>TRANSAKSI TERBANYAK </a></li>
                          <li><a href=""><i class="fa fa-circle-o"></i>TRANSAKSI TERKECIL </a></li> --}}
                        </ul>
                    </li>

                <li class="header">LABELS</li>
            </ul>
    </section>
    <!-- /.sidebar -->
  </aside>























