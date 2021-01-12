<!-- Notifications Dropdown Menu -->
<li class="nav-item dropdown">
    <a class="nav-link" data-toggle="dropdown" href="#">
        <i class="far fa-bell"></i>
        @if($unreadNotifications->count())
        <span class="badge badge-warning navbar-badge">{{$unreadNotifications->count()}}</span>
        @endif
    </a>
{{--    @dump($unreadNotifications)--}}
    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
        <span class="dropdown-item dropdown-header"> Notifications</span>
        <div class="dropdown-divider"></div>
        @forelse($unreadNotifications as $notification)
        <a href="#" class="dropdown-item">
            <i class="fas fa-envelope mr-2"></i> {!! $notification->data['message'] !!}
            <span class="float-right text-muted text-sm">{{ $notification->created_at->diffForHumans() }}</span>
        </a>
        @empty

            <span class="text-danger text-sm">No Notifications!</span>
        @endforelse

        <div class="dropdown-divider"></div>
        <a href="{{ route('notification.mark-all-as-read') }}" class="dropdown-item dropdown-footer">Mark All As Read</a>
    </div>
</li>

