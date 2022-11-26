<div>
    <hr/>
    <div class="">
        <div class="mb-0 d-flex align-items-start" data-toggle="collapse" data-target="{{'#notification-'.$notification->id}}">
            <span class="btn font-weight-bold text-left"  aria-expanded="true" aria-controls="{{'notification-'.$notification->id}}">
              <i class="mr-2 fa fa-certificate text-success"></i>  {{$notification->data['title']}}
            </span>
        </div>
    </div>

    <div id="{{'notification-'.$notification->id}}" class="collapse"  data-parent="#notification-list">
        <div class="card-body py-0">
            {{$notification->data['description']}}
        </div>
    </div>
    <hr/>
</div>
