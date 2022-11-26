@if ($errors->any())
    <div class="alert alert-danger alert-dismissible fade show" data-dismiss="alert">
        <ul class="mb-0">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
        <a href = "#" class = "close" data-dismiss = "alert">
            &times;
         </a>
    </div>
@endif
