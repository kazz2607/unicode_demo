<li class="nav-item dropdown">
  <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
      Thành viên
  </a>
  <ul class="dropdown-menu">
      <li><a class="dropdown-item" href="{{ route('users.index')}}">Thành viên</a></li>
      <li><a class="dropdown-item" href="{{ route('users.create')}}">Thêm thành viên</a></li>
      <div class="dropdown-divider"></div>
      <li><a class="dropdown-item" href="#">Nhóm thành viên</a></li>
      <li><a class="dropdown-item" href="#">Thêm nhóm thành viên</a></li>
  </ul>
</li>

<li class="nav-item dropdown">
  <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
      Bài viết
  </a>
  <ul class="dropdown-menu">
      <li><a class="dropdown-item" href="{{ route('posts.index')}}">Bài viết</a></li>
      <li><a class="dropdown-item" href="{{ route('posts.create')}}">Thêm bài viết</a></li>
      <div class="dropdown-divider"></div>
      <li><a class="dropdown-item" href="#">Chuyên mục</a></li>
      <li><a class="dropdown-item" href="#">Thêm chuyên mục</a></li>
  </ul>
</li>

<li class="nav-item dropdown">
  <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
      Cấu hình
  </a>
  <ul class="dropdown-menu">
      <li><a class="dropdown-item" href="#">Cấu hình</a></li>
      <li><a class="dropdown-item" href="#">Thêm thành viên</a></li>
  </ul>
</li>