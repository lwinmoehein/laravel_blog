<div>
    <div id="notification-list">
            @foreach($notifications as $notification)
                <x-notification-component :notification="$notification"/>
            @endforeach
       </div>
</div>
