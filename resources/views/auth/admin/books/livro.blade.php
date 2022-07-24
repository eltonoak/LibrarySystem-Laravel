{{-- {{dd(Auth::user())}} --}}

@extends('layouts.baseAuth')
@extends('layouts.app')
@section('content')
  @section('dashboard')
  @include('bookdetail')
  @endsection
  @endsection

