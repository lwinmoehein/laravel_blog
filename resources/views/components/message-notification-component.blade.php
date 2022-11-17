@if(session()->has('message'))
 <div class="p-4">
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <a href = "#" class = "close" data-dismiss = "alert">
            &times;
         </a>
          {{ session()->get('message') }}
      </div>
 </div>
@endif
