<div class="container">
     <div>
        <x-image-upload-form-component/>

     </div>
     <form action="{{route('articles.store')}}" method="post" id="newarticle" class="">
        <form  class="">
        @csrf
        @method('put')

        <div class="form-group row">
            <div class="col-12 col-md-6">
                <label for="title" >Article Title</label>
                @if(isset($article))
                  <input class="form-control" type="text" name="title" value="{{$article->title}}" >
                @else
                   <input class="form-control" type="text" name="title" >
                @endif
            </div>
        </div>
        <div class="for-group row">
            <div class="col-12 col-md-6">
                <label for="title">Article body</label>
                @if(isset($article))
                     <textarea class="form-control" name="body" id="body" cols="30" rows="5">{{$article->body}}</textarea>
                @else
                    <textarea class="form-control" name="body" id="body" cols="30" rows="5"></textarea>
                @endif

                @if(isset($article))
                    <input type="hidden" id="image_url" name="image_url" value="{{$article->images[0]}}">
                @else
                    <input type="hidden" id="image_url" name="image_url" value="">
                @endif
                </div>
        </div>
        <div class="for-group row">
            <div class="col-12 col-md-6">
                <label for="title">Article tags</label>
                @if(isset($article))
                  <x-tag-select-component :tags="$tags" :article="$article"/>
                @else
                  <x-tag-select-component :tags="$tags" :article="null" />
                @endif
            </div>
        </div>
        <div class="for-group row mt-4">
            <div class="col-12 col-md-6">
                <button id="postarticle"  class="btn btn-primary" > PostArticle</button>
            </div>

        </div>
        </div>

    </form>
 </div>
@push('custom-scripts')
    <script>
        //upload image form
        $(document).ready( function() {
            $('#postarticle').on('click',function(e){
                e.preventDefault();

                let articleuploader=function create(image_url){
                    $('#image_url').val(image_url);
                    $('#newarticle').submit();
                }
                uploadImage(articleuploader);
            });
        });
        //image uploader
        function uploadImage(createModel) {
            //accept callback function and executed it after success
            const formData = new FormData();
            const fileField = document.querySelector('input[type="file"]');

            formData.append('image', fileField.files[0]);
            $.ajax({
                url: '/images/store',
                type: 'POST',
                headers: {'X-CSRF-TOKEN': $('input[name="_token"]').attr('value')},
                success: function(result) {
                    createModel(result);
                },
                data:formData,
                error:function(result){
                    createModel(result);
                },
                processData: false,
                contentType: false
            });
        }

    </script>
@endpush
