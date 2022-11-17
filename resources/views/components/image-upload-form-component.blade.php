
<div class="row">

        <div class="col-12 col-md-6">
            <div class="form-group">
                <label>Upload Image</label>
                <div class="input-group">
                    <span class="input-group-btn">
                        <span class="btn btn-default btn-file">
                            Browse… <input type="file" id="imgInp">
                        </span>
                    </span>
                    <input type="text" class="form-control" readonly>
                </div>
                <img id='img-upload'/>
            </div>
        </div>

    </div>
    @push('custom-scripts')
    <script>
    //upload image form
    $(document).ready( function() {
        $(document).on('change', '.btn-file :file', function() {
        var input = $(this),
            label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
        input.trigger('fileselect', [label]);
        });

        $('.btn-file :file').on('fileselect', function(event, label) {

            var input = $(this).parents('.input-group').find(':text'),
                log = label;

            if( input.length ) {
                input.val(log);
            } else {
                if( log ) alert(log);
            }

        });
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#img-upload').attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            }
        }

        $("#imgInp").change(function(){
            readURL(this);
        });

        $('#imgInp').change(function(){
            //on change event
            formdata = new FormData();
            if($(this).prop('files').length > 0)
            {
                file =$(this).prop('files')[0];
                formdata.append("image", file);
            }
        });

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
        // $('#upload').on('click',function(e){
        //         e.preventDefault();
        //         let cc=function create(mod){
        //             alert(mod);
        //         }
        //         uploadImage(cc);
        // });
    });

    </script>
@endpush
