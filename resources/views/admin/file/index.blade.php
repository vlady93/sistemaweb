@extends('layouts.admin')
@section('title','Gestión de categorías')
@section('styles')
<style type="text/css">
    .unstyled-button {
        border: none;
        padding: 0;
        background: none;
      }
</style>

@endsection
@section('options')
@endsection
@section('preference')
@endsection
@section('content')
<div class="content-wrapper">
  <div class="container">
    <div class="row">
        <div class="col">
            <div class="card-columns">
                @foreach ($files as $file)
                    
               
                <div class="card">
                    <img class="card-img-top" src="{{asset($file->url)}}" alt="">
                    <div class="card-body">
                        <h4 class="card-title">{{asset($file->url)}}</h4>
                        <p class="card-text">Text</p>
                    </div>
                </div>

                @endforeach
            </div>
        </div>
    </div>
</div>
</div>
@endsection
@section('scripts')
{!! Html::script('melody/js/data-table.js') !!}
@endsection