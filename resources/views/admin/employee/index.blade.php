<x-layout>

  <div>
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
  {{ $employees->onEachSide(1)->appends(request()->except('page'))->links() }}

  <script src="{{ mix('js/app.js') }}"></script>
  <script src="{{ mix('js/main.js') }}"></script>
</x-layout>
  