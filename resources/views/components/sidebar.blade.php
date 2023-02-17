<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="index.html">SPP</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="index.html">St</a>
        </div>
        <ul class="sidebar-menu">
            <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{ url('dashboard') }}" aria-expanded="false"><i class="mdi mdi-view-dashboard"></i><span class="hide-menu">Dashboard</span></a></li>
					{{-- @if(auth()->user()->level == 'admin') --}}
                        		<li class="sidebar-item">
							<a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{ url('dashboard/data-siswa') }}" aria-expanded="false">
								<i class="fa fa-user fa-1x"></i>
								<span class="hide-menu">Data Siswa</span>
							</a>
						</li>
                        		<li class="sidebar-item">
							<a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{ url('dashboard/data-petugas') }}" aria-expanded="false">
								<i class="fa fa-user-circle fa-1x"></i>
								<span class="hide-menu">Data Petugas</span>
							</a>
						</li>
                        		<li class="sidebar-item">
							 <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{ url('dashboard/data-kelas') }}" aria-expanded="false">
								<i class="mdi mdi-home-variant"></i>
									<span class="hide-menu">Data Kelas</span>
							</a>
						</li>
						<li class="sidebar-item">
							<a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{ url('dashboard/data-spp') }}" aria-expanded="false">
								<i class="mdi mdi-cash-usd"></i>
									<span class="hide-menu">Data SPP</span>
							</a>
						</li>
                              {{-- @endif
                              @if(auth()->user()->level == 'admin' || auth()->user()->level == 'petugas') --}}
						<li class="sidebar-item">
							<a class="sidebar-liauth()->user()->level == 'admin'nk waves-effect waves-dark sidebar-link" href="{{ url('dashboard/pembayaran') }}" aria-expanded="false">
								<i class="mdi mdi-cash"></i>
									<span class="hide-menu">Entri Transaksi Pembayaran</span>
							</a>
						</li>
                              {{-- @endif                        --}}
						<li class="sidebar-item">
							<a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{ url('dashboard/histori') }}" aria-expanded="false">
								<i class="mdi mdi-note-multiple"></i>
									<span class="hide-menu">History Pembayaran</span>
							</a>
						</li>
                              {{-- @if(auth()->user()->level == 'admin') --}}
						<li class="sidebar-item">
							<a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{ url('dashboard/laporan') }}" aria-expanded="false">
								<i class="mdi mdi-file-document"></i>
									<span class="hide-menu">Generate Laporan</span>
							</a>
					     </li>
				         {{-- @endif   --}}
                    </ul>
                    
    </aside>
</div>
