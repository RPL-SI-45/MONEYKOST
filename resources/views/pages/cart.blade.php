@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])
@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'Cart Pemesanan', 'titleSub' => 'Customer : '. Auth::user()->username])

@endsection