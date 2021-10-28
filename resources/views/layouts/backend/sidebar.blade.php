        <div class="sidebar-wrapper">
          <div>
            <div class="logo-wrapper"><a href="index-2.html"><img class="img-fluid for-light" src="{{ asset('templates/backend/CyberFrostModernTheme') }}/images/logo/logo.png" alt="" style="max-width: 80%;"><img class="img-fluid for-dark" src="{{ asset('templates/backend/CyberFrostModernTheme') }}/images/logo/logo_dark.png" alt="" style="max-width: 80%;"></a>
              <div class="back-btn"><i class="fa fa-angle-left"></i></div>
              <div class="toggle-sidebar"><i class="status_toggle middle sidebar-toggle" data-feather="grid"> </i></div>
            </div>
            <div class="logo-icon-wrapper"><a href="index-2.html"><img class="img-fluid" src="{{ asset('templates/backend/CyberFrostModernTheme') }}/images/logo/logo-icon.png" alt=""></a></div>
            <nav class="sidebar-main">
              <div class="left-arrow" id="left-arrow"><i data-feather="arrow-left"></i></div>
              <div id="sidebar-menu">
                <ul class="sidebar-links" id="simple-bar">
                  <li class="back-btn"><a href="index-2.html"><img class="img-fluid" src="{{ asset('templates/backend/CyberFrostModernTheme') }}/images/logo/logo-icon.png" alt=""></a>
                    <div class="mobile-back text-end"><span>Back</span><i class="fa fa-angle-right ps-2" aria-hidden="true"></i></div>
                  </li>
                  <li class="sidebar-list"><a class="sidebar-link sidebar-title link-nav {{ Request::is('admin') ? 'active' : '' }}" href="{{ route('admin.index') }}"><i data-feather="home"> </i><span>Dashboard</span></a></li>
                  @if (Auth::user()->user_level != 'member')
                  <li class="sidebar-list"><a class="sidebar-link sidebar-title" href="#"><i data-feather="box"></i><span>Master</span></a>
                    <ul class="sidebar-submenu">
                      <li><a href="{{ route('admin.dompet.index') }}">Dompet</a></li>
                      <li><a href="{{ route('admin.kategori.index') }}">Kategori</a></li>
                    </ul>
                  </li>

                  <li class="sidebar-list"><a class="sidebar-link sidebar-title" href="#"><i data-feather="credit-card"></i><span>Transaksi</span></a>
                    <ul class="sidebar-submenu">
                      <li><a href="{{ route('admin.dompet.masuk.index') }}">Dompet Masuk</a></li>
                      <li><a href="{{ route('admin.dompet.keluar.index') }}">Dompet Keluar</a></li>
                    </ul>
                  </li>

                  <li class="sidebar-list"><a class="sidebar-link sidebar-title" href="#"><i data-feather="printer"></i><span>Laporan</span></a>
                    <ul class="sidebar-submenu">
                      <li><a href="{{ route('admin.laporan.index') }}">Laporan Transaksi</a></li>
                    </ul>
                  </li>
                  @endif
                </ul>
              </div>
              <div class="right-arrow" id="right-arrow"><i data-feather="arrow-right"></i></div>
            </nav>
          </div>
        </div>