<nav class="navbar navbar-expand px-3 border-bottom d-flex align-items-center justify-content-between mb-3"><button class="btn btn-primary" type="button"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icon-tabler-menu-2 navbar-toggler-icon">
    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
    <path d="M4 6l16 0"></path>
    <path d="M4 12l16 0"></path>
    <path d="M4 18l16 0"></path>
</svg></button>
<div class="d-flex align-items-center">
    @if(auth()->check())
        <span class="pe-2 border-end">{{ auth()->user()->nama_lengkap }}</span>
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            @method('POST')
            <button class="btn btn-primary ms-2" type="submit">Logout</button>
        </form>
        @else
        <span class="pe-2 border-end">Guest</span>
        <a class="btn btn-primary ms-2" href="{{ url('auth/login') }}">Login</a>
    @endif
</div>
</nav>
