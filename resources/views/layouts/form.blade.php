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

<body class="">
  <main class="main-content  mt-0">
    <section>
      <div class="page-header min-vh-100">
        <div class="container">
          <div class="row">
            {{-- Left column --}}
            <div class="col-xl-4 col-lg-5 col-md-7 d-flex flex-column mx-lg-0 mx-auto">
              @yield('form-content')
              @if ($errors->has('id'))             
                <div class="alert ">
                  <div id="warning" class="text-lg text-danger text-center">{{$errors->first('id')}}</div>
                </div>          
              @endif  
            </div>

            {{-- Right column --}}            
            <div class="col-6 d-lg-flex d-none h-100 my-auto pe-0 position-absolute top-0 end-0 text-center justify-content-center flex-column">
              <div class="position-relative bg-gradient-primary h-100 m-3 px-7 border-radius-lg d-flex flex-column justify-content-center">
                <img src="../../../assets/img/shapes/pattern-lines.svg" alt="pattern-lines" class="position-absolute opacity-4 start-0">
                <div class="position-relative">
                  <img class="max-width-500 w-100 position-relative z-index-2" src="../../../assets/img/illustrations/rocket-white.png" alt="rocket">
                </div>
                
                <div class="mt-5">
                  @yield('graphic-discription')
                </div>                
              </div>
            </div>

          </div>
        </div>
      </div>
    </section>
  </main>

  @include('layouts.script')
</body>

</html>