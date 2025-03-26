<nav class="navbar navbar-expand-lg navbar-light" style="background-color: #FF8C00;">
    <div class="d-flex align-items-center">
        <a class="navbar-brand text-black d-flex align-items-center">
            <img src="{{ asset('images/albertos.png') }}" alt="Albertos Pizza Logo"
                style="height: 100px; margin-left: 10px;">
            <h1 style="font-size: 3rem;">Albertos Pizza</h1>
        </a>
        <span class="text-black me-4" style="font-family: 'Playfair Display', serif; font-size: 3rem;">
            {{ Auth::user()->username }}
        </span>
    </div>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav mx-auto">
            {{-- <li class="nav-item">
                <a class="nav-link text-black" href="/home">Home</a>
            </li> --}}
            <li class="nav-item">
                <a class="nav-link text-black" href="/dashboard">Dashboard</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-black"
                    href="{{ route('product.index', ['user_id' => auth()->user()->id]) }}">Products</a>
                {{-- <a class="nav-link text-white" href="/products/{{ Auth::id() }}/{{ Auth::user()->isAdmin }}">Products</a> --}}
            </li>
            <li class="nav-item">
                <a class="nav-link text-black" href="/sales">Sales</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-black" href="/transaction/{{ Auth::id() }}">Transaction</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-black" href="/products/archive">Archived Products</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-black" href="/cancelled-transactions">Cancelled Transactions</a>
            </li>
            @if (Auth::user()->isAdmin)
                <li class="nav-item">
                    <a class="nav-link text-black" href="/users">Create User</a>
                </li>
            @endif

            {{-- <li class="nav-item">
                <a class="nav-link text-white" href="/users">Create User</a>
            </li> --}}
            <a class="nav-link text-black" href="{{ route('admin.logout') }}">Logout</a>
        </ul>
    </div>
</nav>
