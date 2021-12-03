@extends('layouts.master')

@section('main-content')
  <style>
    #loading{
      z-index: 10000; 
      opacity: 0.5;
      position: absolute; 
      width: 100%; 
      left: 0px;
      top:0px;
                          
      height: 100%; 
      background: black;
    }
  </style>
  <div class="container-fluid py-4">
    @include('homepage.main_data')

    @include('homepage.popups.create')  

    @include('homepage.popups.update')

    @include('homepage.popups.delete')

    {{-- <div class="modal fade" id="loading-modal" tabindex="-1" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="deleteModalLabel">Edit a user</h5>
            <button type="button" class="align-center" data-bs-dismiss="modal" aria-label="Close">x</button>
          </div>
          <div class="modal-body">
            
          </div>          
        </div>
      </div>
    </div>--}}
  </div>
  
  <div id="loading" style=" display:none">
          <div style="position: absolute; left: 50%; top: 300px">
              <div class="spinner-border" role="status">
                    <span class="visually-hidden">Loading data...</span>
              </div>
          </div>
  </div>
@endsection
<script src="{{asset('assets/js/homepage.js')}}"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

