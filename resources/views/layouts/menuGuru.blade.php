<div class="text-center">
    <img
      src="{{asset('assets/images/guru.png')}}"
      alt="Avatar"
      class="rounded-circle"
      width="50px"
      width="50px"
    />
    <h5 class="mt-2 text-white">
      {{auth()->guard('guru')->user()->nama}}
    </h5>
    <p class="text-white">
      {{auth()->guard('guru')->user()->nip}}
    </p>
    <hr>
  </div>
  <ul class="sidebar-menu sm-active-button-bg">
    <li class="sidebar-menu-item active">
        <a class="sidebar-menu-button" href="{{route('guru.dashboard')}}">
            <i class="sidebar-menu-icon sidebar-menu-icon--left material-icons">account_box</i> Dashboard
        </a>
    </li>
   
</ul>