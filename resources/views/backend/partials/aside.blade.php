<aside class="menu-sidebar d-none d-lg-block">
    <div class="logo">
        <a href="#">
        <h4>ADMIN PANEL </h4>
            <!--<img src="images/icon/logo.png" alt="Admin panel" />-->
        </a>
    </div>
    <div class="menu-sidebar__content js-scrollbar1">
        <nav class="navbar-sidebar">
            <ul class="list-unstyled navbar__list">
                <li class="active has-sub">
                    <a class="js-arrow" href="index.html">
                        <i class="fas fa-tachometer-alt"></i>Dashboard</a>
                 
                </li>
                 <li class="has-sub">
                    <a class="js-arrow" href="#">
                        <i class="fa fa-users"></i>Users</a>
                   <ul class="list-unstyled navbar__sub-list js-sub-list">
                   
                        <li>
                            <a href="index.html"> <i class="fa fa-user-plus"></i>Add New</a>
                        </li>
                        <li>
                            <a href="add-category/create"><i class="fa fa-user"></i>All Users</a>
                        </li>
                   
                    </ul>
                </li>
                <li class="has-sub">
                    <a class="js-arrow" href="#">
                        <i class="fa fa-newspaper-o"></i>News</a>
                   <ul class="list-unstyled navbar__sub-list js-sub-list">
                   <li>
                            <a href="{{route('admin.add-news.index')}}"> <i class="fas fa-chart-bar"></i>All News</a>
                        </li>
                        <li>
                            <a href="{{route('admin.add-news.create')}}"> <i class="fa fa-plus-square"></i>Add News</a>
                        </li>
                        

                    </ul>
                </li>
                <li class="has-sub">
                    <a class="js-arrow" href="#">
                    <i class="fas fa-file-alt"></i>Pages</a>
                   <ul class="list-unstyled navbar__sub-list js-sub-list">
                   <li>
                            <a href="index.html"> <i class="fas fa-chart-bar"></i>Pages</a>
                        </li>
                        <li>
                            <a href="index.html"> <i class="fa fa-plus-square"></i>Add Pages</a>
                        </li>
                
                    </ul>
                </li>
                <li class="has-sub">
                    <a class="js-arrow" href="#">
                    <i class="fa fa-picture-o"></i>Media</a>
                   <ul class="list-unstyled navbar__sub-list js-sub-list">
                   <li>
                            <a href="index.html"> <i class="fa fa-picture-o"></i>Library</a>
                        </li>
                        <li>
                            <a href="index.html"> <i class="fa fa-plus-square"></i>Add New</a>
                        </li>
                
                    </ul>
                </li>
               <li class="has-sub">
                    <a class="js-arrow" href="#">
                    <i class="fa fa-picture-o"></i>Setting</a>
                   <ul class="list-unstyled navbar__sub-list js-sub-list">
                   <li>
                            <a href="index.html"> <i class="fa fa-picture-o"></i>General</a>
                        </li>
                        <li>
                            <a href="index.html"> <i class="fa fa-plus-square"></i>Appearances</a>
                        </li>
                
                    </ul>
                </li>
            </ul>
        </nav>
    </div>
</aside>
