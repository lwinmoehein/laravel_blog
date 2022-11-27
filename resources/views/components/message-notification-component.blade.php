@if(session()->has('message'))
 <div>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <a href = "#" class = "close" data-dismiss = "alert">
            &times;
         </a>
          {{ session()->get('message') }}
      </div>
 </div>
@endif
