<aside id="sidebar" class="shadow-sm bg-primary text-light">
    <div class="h-100">
        <div class="d-flex justify-content-center sidebar-logo py-4"><a href="/"><img class="img-fluid me-2"
                    src="{{ asset('assets/img/logo-kominfo-transparent.png') }}" width="40">Diskominfotik</a></div>
        <ul class="sidebar-nav">
            <li class="sidebar-item"><a class="d-flex align-items-center sidebar-link" href="{{ url('/') }}"><svg
                        class="icon icon-tabler icon-tabler-home me-1" xmlns="http://www.w3.org/2000/svg" width="1em"
                        height="1em" viewbox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                        stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                        <path d="M5 12l-2 0l9 -9l9 9l-2 0"></path>
                        <path d="M5 12v7a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-7"></path>
                        <path d="M9 21v-6a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v6"></path>
                    </svg>Dashboard</a></li>
            <li class="sidebar-header">Data Master</li>
            <li class="sidebar-item"><a class="d-flex align-items-center sidebar-link collapsed"
                    data-bs-toggle="collapse" data-bs-target="#pages" aria-expanded="false" aria-controls="pages"><svg
                        class="icon icon-tabler icon-tabler-mail me-1" xmlns="http://www.w3.org/2000/svg" width="1em"
                        height="1em" viewbox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                        stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                        <path d="M3 7a2 2 0 0 1 2 -2h14a2 2 0 0 1 2 2v10a2 2 0 0 1 -2 2h-14a2 2 0 0 1 -2 -2v-10z">
                        </path>
                        <path d="M3 7l9 6l9 -6"></path>
                    </svg>Surat</a>
                <ul class="list-unstyled sidebar-dropdown collapse" id="pages" data-bs-parent="#sidebar">
                    <li class="sidebar-item ps-3"><a class="sidebar-link ms-1"
                            href="{{ url('/surat/surat-masuk') }}">Surat Masuk</a>
                    </li>
                    <li class="sidebar-item ps-3"><a class="sidebar-link ms-1"
                            href="{{ url('/surat/surat-keluar') }}">Surat
                            Keluar</a></li>
                </ul>
            </li>
            <li class="sidebar-item"><a class="d-flex align-items-center sidebar-link collapsed"
                    data-bs-toggle="collapse" data-bs-target="#auth" aria-expanded="false" aria-controls="auth"><svg
                        class="icon icon-tabler icon-tabler-settings me-1" xmlns="http://www.w3.org/2000/svg"
                        width="1em" height="1em" viewbox="0 0 24 24" stroke-width="2" stroke="currentColor"
                        fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                        <path
                            d="M10.325 4.317c.426 -1.756 2.924 -1.756 3.35 0a1.724 1.724 0 0 0 2.573 1.066c1.543 -.94 3.31 .826 2.37 2.37a1.724 1.724 0 0 0 1.065 2.572c1.756 .426 1.756 2.924 0 3.35a1.724 1.724 0 0 0 -1.066 2.573c.94 1.543 -.826 3.31 -2.37 2.37a1.724 1.724 0 0 0 -2.572 1.065c-.426 1.756 -2.924 1.756 -3.35 0a1.724 1.724 0 0 0 -2.573 -1.066c-1.543 .94 -3.31 -.826 -2.37 -2.37a1.724 1.724 0 0 0 -1.065 -2.572c-1.756 -.426 -1.756 -2.924 0 -3.35a1.724 1.724 0 0 0 1.066 -2.573c-.94 -1.543 .826 -3.31 2.37 -2.37c1 .608 2.296 .07 2.572 -1.065z">
                        </path>
                        <path d="M9 12a3 3 0 1 0 6 0a3 3 0 0 0 -6 0"></path>
                    </svg>Pengaturan</a>
                <ul class="list-unstyled sidebar-dropdown collapse" id="auth" data-bs-parent="#sidebar">
                    {{-- <li class="sidebar-item ps-3"><a class="sidebar-link ms-1"
                            href="{{ url('/pengaturan/users') }}">Users</a></li> --}}
                            @if(auth()->user()->level !== 'user')
            <li class="sidebar-item ps-3"><a class="sidebar-link ms-1"
                    href="{{ url('/pengaturan/users') }}">Users</a></li>
                            @endif
                    <li class="sidebar-item ps-3"><a class="sidebar-link ms-1"
                            href="{{ url('/pengaturan/profile') }}">Profile</a></li>
                </ul>
            </li>
            <li class="sidebar-item"><a class="d-flex align-items-center sidebar-link collapsed"
                    data-bs-toggle="collapse" data-bs-target="#dashboard" aria-expanded="false"
                    aria-controls="dashboard"><svg class="icon icon-tabler icon-tabler-file-text me-1"
                        xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewbox="0 0 24 24"
                        stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
                        stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                        <path d="M14 3v4a1 1 0 0 0 1 1h4"></path>
                        <path d="M17 21h-10a2 2 0 0 1 -2 -2v-14a2 2 0 0 1 2 -2h7l5 5v11a2 2 0 0 1 -2 2z"></path>
                        <path d="M9 9l1 0"></path>
                        <path d="M9 13l6 0"></path>
                        <path d="M9 17l6 0"></path>
                    </svg>Laporan</a>
                <ul class="list-unstyled sidebar-dropdown collapse" id="dashboard" data-bs-parent="#sidebar">
                    <li class="sidebar-item ps-3"><a class="sidebar-link ms-1"
                            href="{{ url('/laporan/laporan-surat-masuk') }}">Laporan
                            Surat Masuk</a></li>
                    <li class="sidebar-item ps-3"><a class="sidebar-link ms-1"
                            href="{{ url('/laporan/laporan-surat-keluar') }}">Laporan
                            Surat Keluar</a></li>
                </ul>
            </li>
            <li class="sidebar-header"> Lainnya</li>
            <li class="sidebar-item"><a class="d-flex align-items-center sidebar-link"
                    href="{{ url('/tentang') }}"><svg class="icon icon-tabler icon-tabler-info-circle me-1"
                        xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewbox="0 0 24 24"
                        stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
                        stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                        <path d="M3 12a9 9 0 1 0 18 0a9 9 0 0 0 -18 0"></path>
                        <path d="M12 9h.01"></path>
                        <path d="M11 12h1v4h1"></path>
                    </svg>Tentang Diskominfotik</a></li>
        </ul>
    </div>
</aside>
