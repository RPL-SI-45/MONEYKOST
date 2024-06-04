@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'Notification', 'titleSub' => 'Admin : '. Auth::user()->username])
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="card mb-4">
                    <div class="card-header pb-0 d-flex align-items-center justify-content-between">
                        <h6>Notifikasi</h6>
                    </div>
                    <div class="card-body">
                        @forelse ($notifications as $notification)
                            <div class="card mb-3">
                                <div class="card-body d-flex justify-content-between align-items-start">
                                    <div class="flex-grow-1">
                                        <h5 class="card-title"><strong>{{ $notification->data['title'] }}</strong></h5>
                                        <p class="card-text">{{ nl2br(e($notification->data['message'])) }}</p>
                                    </div>
                                    <div class="text-right">
                                        <p class="card-text mb-2"><small class="text-muted">{{ $notification->created_at->format('d M Y H:i') }}</small></p>
                                        <a href="{{ $notification->data['url'] }}" class="btn btn-primary btn-sm">Lihat detail</a>
                                        <a href="{{ route('notifications.markAsRead', $notification->id) }}" class="btn btn-secondary btn-sm">Mark as read</a>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <div class="card">
                                <div class="card-body">
                                    <p class="card-text">No notifications found.</p>
                                </div>
                            </div>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection