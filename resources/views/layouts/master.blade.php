<!--
=========================================================
* Soft UI Dashboard PRO - v1.0.4
=========================================================

* Product Page:  https://themes.getbootstrap.com/product/soft-ui-dashboard-pro/ 
* Copyright 2021 Creative Tim (https://www.creative-tim.com)
* Coded by Creative Tim

=========================================================

* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
-->
<!DOCTYPE html>
<html lang="en">

  @include('layouts.head')

  <body class="g-sidenav-show  bg-gray-100">
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
      @include('layouts.navbar')
      @yield('main-content')    
    </main>

    @include('layouts.fixed_plugin')
    
    
    @include('layouts.script')
    
  </body>

</html>