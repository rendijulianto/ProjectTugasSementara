<div class="text-center">
    <img
      src="{{asset('assets/images/admin.png')}}"
      alt="Avatar"
      class="rounded-circle"
      width="50px"
      width="50px"
    />
    <h5 class="mt-2 text-white">
      {{auth()->guard('admin')->user()->username}}
    </h5>

    <hr>
  </div>
  <ul class="sidebar-menu sm-active-button-bg">
    <li class="sidebar-menu-item active">
        <a class="sidebar-menu-button" href="{{route('admin.dashboard')}}">
            <i class="sidebar-menu-icon sidebar-menu-icon--left material-icons">account_box</i> Dashboard
        </a>
    </li>
    <div class="sidebar-heading">Siswa</div>
    <ul class="sidebar-menu sm-active-button-bg">
        <li class="sidebar-menu-item">
            <a class="sidebar-menu-button" href="{{route('admin.siswa.index')}}">
                <i class="sidebar-menu-icon sidebar-menu-icon--left material-icons">school</i> Kelola Siswa
            </a>
        </li>
    </ul>
    <div class="sidebar-heading">Guru</div>
    <ul class="sidebar-menu sm-active-button-bg">
        <li class="sidebar-menu-item">
            <a class="sidebar-menu-button" href="{{route('admin.guru.index')}}">
                <i class="sidebar-menu-icon sidebar-menu-icon--left material-icons">person_outline</i> Kelola Guru
            </a>
        </li>
    </ul>
    <div class="sidebar-heading">
        Pembelajaran
    </div>
    <ul class="sidebar-menu sm-active-button-bg">
        <li class="sidebar-menu-item">
            <a class="sidebar-menu-button" href="{{route('admin.kurikulum.index')}}">
                <i class="sidebar-menu-icon sidebar-menu-icon--left material-icons">dvr</i> Kelola Kurikulum
            </a>
        </li>
        <li class="sidebar-menu-item">
            <a class="sidebar-menu-button" href="{{route('admin.mataPelajaran.index')}}">
                <i class="sidebar-menu-icon sidebar-menu-icon--left material-icons">import_contacts</i> Kelola Mata Pelajaran
            </a>
        </li>
        <li class="sidebar-menu-item">
            <a class="sidebar-menu-button" href="{{route('admin.kelas.index')}}">
                <i class="sidebar-menu-icon sidebar-menu-icon--left material-icons">class</i> Kelola Kelas
            </a>
        </li>
    </ul>
    <div class="sidebar-heading">
        Laporan
    </div>
    <ul class="sidebar-menu sm-active-button-bg">
        <li class="sidebar-menu-item">
            <a class="sidebar-menu-button" href="{{route('admin.laporan')}}">
                <i class="sidebar-menu-icon sidebar-menu-icon--left material-icons">poll</i> Buat Laporan
            </a>
        </li>
    </ul>
</ul>