<header>
  <nav class="flex justify-between items-center container">
    <a href="{{ route('home') }}"><img src="{{asset('images/logo.svg')}}" alt="logo" class="logo" id="logo" /></a>
    <ul class="flex space-x-3 space-x-12 md:space-x-10 mr-6 text-sm">
      @auth
      <li>
        <a href="{{route('home')}}">
          <span class="lowercase primary-color">
            <i class="fa-solid fa-user md:inline-block"></i> <span class='mx-1 hidden md:inline-block'>Panou ({{auth()->user()->name}})</span>
          </span>
        </a>
      </li>
      <li>
        <a href="{{route('employee_index')}}">
          <span class="lowercase cursor-pointer primary-color">
            <i class="fa-solid fa-th-list "></i> <span class='mx-1 hidden md:inline-block'>Angajati</span>
          </span>
        </a>
      </li>
      <li>
        <a href="{{route('departament_index')}}">
          <span class="lowercase cursor-pointer primary-color">
            <i class="fa-solid fa-server "></i> <span class='mx-1 hidden md:inline-block'>Departamente</span>
          </span>
        </a>
      </li>
      <li>
        <form class="inline" method="POST" action="/logout">
          @csrf
          <button type="submit">
            <i class="fa-solid fa-right-from-bracket color-danger"></i> <span class='color-danger mx-1 hidden md:inline-block'> Logout</span>
          </button>
        </form>
      </li>
      @else
      <li>
      <a href="{{ route('register') }}" class="hover:text-laravel"><i class="fa-solid fa-user-plus color-success"></i> <span class='color-success mx-1'> Register</span></a>
      </li>
      <li>
        <a href="{{ route('login') }}" class="hover:text-laravel"><i class="fa-solid fa-arrow-right-to-bracket color-success"></i> <span class='color-success mx-1'> Login</span></a>
      </li>
      @endauth
    </ul>
  </nav>
</header>