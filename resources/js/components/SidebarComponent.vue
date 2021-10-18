<template>
    <div class="d-flex" id="wrapper">
    <!-- Sidebar -->
    <div class="bg-light border-right" id="sidebar-wrapper">
      <div class="sidebar-heading">YgnBuses.com </div>
      <div class="tabbar_wrapper">
        <table>   
          <td class="button-bar home_search_select"><a href="www.google.com"><i class="fa fa-bus"></i></a></td>
          <td><i class="fa fa-flag"></i></td>
          <td><i class="fa fa-ellipsis-h"></i></td>
        </table>
      </div>
      <div class="list-group list-group-flush">
        <a href="www.google.com" class="bus_content">
          <table>
            <td class="busline_color_box"></td>
            <td class="bus-icon"><i class="fa fa-bus"></i></td>
            <td class="bus-no">၁</td>
            <td class="arrow">></td>
          </table>
        </a>
        <a href="#" class="bus_content">
          <table>
            <td class="busline_color_box"></td>
            <td class="bus-icon"><i class="fa fa-bus"></i></td>
            <td class="bus-no">၂</td>
            <td class="arrow">></td>
          </table>
        </a>
        <a href="#" class="bus_content">
          <table>
            <td class="busline_color_box"></td>
            <td class="bus-icon"><i class="fa fa-bus"></i></td>
            <td class="bus-no">၃</td>
            <td class="arrow">></td>
          </table>
        </a>
        <a href="#" class="bus_content">
          <table>
            <td class="busline_color_box"></td>
            <td class="bus-icon"><i class="fa fa-bus"></i></td>
            <td class="bus-no">၄</td>
            <td class="arrow">></td>
          </table>
        </a>
        <a href="#" class="bus_content">
          <table>
            <td class="busline_color_box"></td>
            <td class="bus-icon"><i class="fa fa-bus"></i></td>
            <td class="bus-no">၅</td>
            <td class="arrow">></td>
          </table>
        </a>
      </div>
    </div>
    <!-- /#sidebar-wrapper -->
    <!-- Page Content -->
    <div id="page-content-wrapper">
      <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
        <button class="btn btn-primary" id="menu-toggle">Toggle Menu</button>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <!-- <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
            <li class="nav-item active">
              <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Link</a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Dropdown
              </a>
              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="#">Action</a>
                <a class="dropdown-item" href="#">Another action</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#">Something else here</a>
              </div>
            </li>
          </ul>
        </div> -->
      </nav>
      <div class="container-fluid">
        <h1 class="mt-4">Vuejs laravel Sidebar Responsive Template</h1>
        <p>Vuejs laravel Sidebar Responsive Template Vuejs laravel Sidebar Responsive Template Vuejs laravel Sidebar Responsive Template
          Vuejs laravel Sidebar Responsive Template Vuejs laravel Sidebar Responsive Template Vuejs laravel Sidebar Responsive Template
          Vuejs laravel Sidebar Responsive Template Vuejs laravel Sidebar Responsive Template Vuejs laravel Sidebar Responsive Template
        </p>
        
      </div>
    </div>
    <!-- /#page-content-wrapper -->
  </div>
  <!-- /#wrapper -->
</template>
<script>
    
    //Bootstrap libraries
    import 'bootstrap/dist/css/bootstrap.min.css';
    import 'bootstrap/dist/js/bootstrap.min.js';
    //jquery, popper.js libraries for bootstrap
    import 'jquery/dist/jquery.min.js';
    import 'popper.js/dist/umd/popper.min.js'
    import $ from 'jquery';
    export default {
     mounted() {
             // Sidebar Toggle Menu Click
             $("#menu-toggle").click(function(e) {
             e.preventDefault();
             $("#wrapper").toggleClass("toggled");
            });
        }
}
</script>