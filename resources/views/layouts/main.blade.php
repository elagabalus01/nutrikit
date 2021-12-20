@extends('layouts.base')
@section('header')
@if(Auth::check())
    @include('layouts.navbarLogged')
@else
    @include('layouts.navbarGuest')
@endif
@endsection
@section('footer')
<!-- @include('layouts.footer') -->
@endsection