<div id='banner'>
  <img style="width:100%" src="/images/banner.jpg" alt='banner'>
  <div class='banner-text'>
    <div class='flex-column align-center'>
      <img src="{{asset('images/logo.svg')}}" alt="logo" class="logo"/>
      <div class='text-sm primary-color text-center pt-1'>- Technology innovations -</div>
    </div>
    
    <div class='flex flex-column w-100'>
      <div class='flex justify-between'> <span>Angajati activi: </span><span>{{ $employeesCount }}</span></div>
      <div class='flex justify-between'> <span>Departamente active: </span><span>{{ $departamentsCount }}</span></div>
    </div>
  <a href="{{route('employee_index')}}"><div class="btn btn-success">Lista angajati</div></a>
  </div>
 </div>