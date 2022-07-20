<div class="text-center">
    <img
      src="{{asset('assets/images/siswa.png')}}"
      alt="Avatar"
      class="rounded-circle"
      width="50px"
      width="50px"
    />
    <h5 class="mt-2 text-white">
      {{auth()->guard('siswa')->user()->nama}}
    </h5>
    <p class="text-white">
      {{auth()->guard('siswa')->user()->nis}}
    </p>
    <hr>
  </div>
  <ul class="sidebar-menu sm-active-button-bg">
    <li class="sidebar-menu-item active">
        <a class="sidebar-menu-button" href="{{route('siswa.dashboard')}}">
            <i class="sidebar-menu-icon sidebar-menu-icon--left material-icons">account_box</i> Dashboard
        </a>
    </li>
</ul>