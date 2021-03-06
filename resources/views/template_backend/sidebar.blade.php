<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
      <div class="sidebar-brand">
        <a href="index.html">Coper Blog</a>
      </div>
      <div class="sidebar-brand sidebar-brand-sm">
        <a href="index.html">St</a>
      </div>
      <ul class="sidebar-menu">
        <li class="menu-header">Dashboard</li>
        <li class="dropdown">
          <a href="#" class="nav-link has-dropdown"><i class="fas fa-fire"></i><span>Dashboard</span></a>
          <ul class="dropdown-menu">
            <li><a class="nav-link" href="index-0.html">General Dashboard</a></li>
            <li><a class="nav-link" href="index.html">Ecommerce Dashboard</a></li>
          </ul>
        </li>
        <li class="menu-header">Menu</li>
        <li class="dropdown">
          <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-newspaper"></i></i> <span>Post</span></a>
          <ul class="dropdown-menu">
            <li><a class="nav-link" href="{{route('post.index')}}">List Posts</a></li>
            <li><a class="nav-link" href="{{route('post.tampil_hapus')}}">Trash Posts</a></li>
          </ul>
        </>
        <li class="dropdown">
          <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-cubes"></i> <span>Category</span></a>
          <ul class="dropdown-menu">
            <li><a class="nav-link" href="{{route('category.index')}}">List Category</a></li>
          </ul>
        </>
        <li class="dropdown">
          <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-tags"></i> <span>Tags</span></a>
          <ul class="dropdown-menu">
            <li><a class="nav-link" href="{{route('tag.index')}}">List Tags</a></li>
          </ul>
        </>
        <li class="dropdown">
          <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-users"></i> <span>Users</span></a>
          <ul class="dropdown-menu">
            <li><a class="nav-link" href="{{route('user.index')}}">List User</a></li>
          </ul>
        </>
        <li class=active><a class="nav-link" href="blank.html"><i class="far fa-square"></i> <span>Blank Page</span></a></li>
       </aside>
  </div>
