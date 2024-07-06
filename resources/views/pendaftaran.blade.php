@extends('layout.main')

@section('container')
<div class="container">
    <div class="row" style="height: 100%; margin-top:200px; margin-bottom: 100px">
          <div class="col-md-8 offset-md-2">
              <h1 class="text-center">Booking</h1><hr>
              @livewire('multi-step-form')
          </div>
    </div>
</div>
 
 @livewireScripts
@endsection