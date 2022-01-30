<nav class="navbar navbar-expand-lg navbar-light bg-light mb-4">
  <div class="container">
    <a class="navbar-brand" href="/">Toko</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="mr-auto navbar-nav"></ul>
      <ul class="navbar-nav">
        <li class="nav-item active">
          <a class="nav-link" href="{{ URL::to('dahsboard') }}">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('products.index') }}">Produk</a>
        </li>
       
        <li class="nav-item">
        <x-jet-nav-link href="{{ url('http://127.0.0.1:8000/admin/orders') }}" style="text-decoration: none;color: black;">
                        {{ __('Data Order') }}
        </x-jet-nav-link>    
       </li>
        <li class="nav-item">
       
        <x-jet-nav-link href="{{ url('http://127.0.0.1:8000/admin/products') }}" style="text-decoration: none;color: black;">
           {{ __('Tambah Produk') }}
         </x-jet-nav-link>    
      </ul>
      <!-- carts -->
      <x-jet-nav-link href="{{ route('carts.index') }}" class="btn " style="text-decoration: none;color: black;">
                        <i class="fa fa-shopping-cart" aria-hidden="true"></i>{{ __('Cart ') }}<span class="badge bg-danger rounded-pill">{{ @count(session('cart')) }}</span>
                    </x-jet-nav-link>
                   <!--  carts -->
      <div class="dropdown">
  <button class="btn  dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
  {{ Auth::user()->name }}
  </button>
  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
  <form method="POST" action="{{ route('logout') }}">
                                @csrf

                                <x-jet-dropdown-link href="{{ route('logout') }}"
                                         onclick="event.preventDefault();
                                                this.closest('form').submit();" style="text-decoration: none">
                                    {{ __('Log Out') }}
                                </x-jet-dropdown-link>
                            </form>
  </div>
</div>
     
    </div>
  </div>
</nav>