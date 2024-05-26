@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])
@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'Edit Menu Makanan', 'titleSub' => 'Admin'])
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="card mb-4">
                    <div class="card-header pb-0 d-flex align-items-center justify-content-between">
                        <h6>Edit Menu Makanan</h6>
                    </div>
                    <div class="card-body">
                        <form role="form" method="POST" action="" enctype="multipart/form-data">
                            @csrf
                            @method('put')
                            
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection