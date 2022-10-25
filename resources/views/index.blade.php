<x-layout>

   @include('partials._banner')

  <div id="app">
    <table>
      <tr>
        <th>#</th>
        <th>nume</th>
        <th>prenume</th>
        <th>cnp</th>
        <th>salariu</th>
        <th>nume departament</th>
        <th>descriere departament</th>
      </tr>
      {{-- {{ dd($employees) }} --}}
      @foreach($employees as $employee)
        <tr value="{{ $employee->id }}" class="{{ ($employee->status == 0) ? 'danger' : '' }}">
          <td>{{ ($employees->currentpage() - 1) * $employees->perpage() + $loop->index + 1 }}</td>
          <td>{{ $employee->nume}}</td>
          <td>{{ $employee->prenume}}</td>
          <td>{{ $employee->cnp}}</td>
          <td>{{ $employee->salariu}}</td>
          <td>{{ $employee->departament->nume}}</td>
          <td>{{ $employee->departament->descriere}}</td>
        </tr>
      @endforeach
    </table>
  </div>
  {{ $employees->onEachSide(5)->links() }}
  @guest
  <div class='w-full, p-8 text:lg flex justify-center'>
    You must be logged in to see the recipes.  <a href="{{ route('register') }}" class="hover:text-laravel"><span class='color-success mx-2'> Register</span></a> or         <a href="{{ route('login') }}" class="hover:text-laravel"> <span class='color-success mx-2'> Login</span></a>
  </div>
  @endguest

  @auth
    {{-- <x-recipe_new :categories="$categories" />
    <x-recipe_edit :categories="$categories" :recipe="$recipe" /> --}}
  @endauth

  <script src="{{ mix('js/app.js') }}"></script>
  <script src="{{ mix('js/main.js') }}"></script>
</x-layout>
  