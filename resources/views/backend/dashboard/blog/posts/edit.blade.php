@extends('backend.dashboard.layouts.app', ['activePage' => 'posts', 'title' => 'Light Bootstrap Dashboard Laravel by Creative Tim & UPDIVISION', 'navName' => 'Table List', 'activeButton' => 'blog'])

@section('content')
    <style>
        .imagePreviewUpdate {
            width: 100%;
            height: 180px;
            background-position: center center;
            background: url({{ $post->cover_image }});
            background-color: #fff;
            background-size: cover;
            background-repeat: no-repeat;
            display: inline-block;
            box-shadow: 0px -3px 6px 2px rgba(0, 0, 0, 0.2);
        }
    </style>
<form action="{{ route('backend.posts.update', $post->id) }}" method="post" enctype="multipart/form-data">
    <div class="row">
        <div class="col-md-8">
                @csrf
                @method('PUT')
                <div class="row justify-content-center">
                    <div class="card col-md-12">
                        <div class="card-body row">
                            @include('includes.validation-form')

                            <div class="col-md-12 mb-2">
                                <label for="name">Name:</label>
                                <input type="text" name="name" id="name" value="{{ $post->name }}"
                                    class="form-control">
                            </div>
                            <div class="col-md-6 mb-2">
                                <label for="name">Parent:</label>
                                <div class="row">
                                    <div class="col-md-12">
                                        <select class="form-select" name="categorie_id" data-live-search="true">
                                            <option selected disabled>Select Categorie</option>
                                            @foreach ($categories as $categorie)
                                                <option value="{{ $categorie->id }}"
                                                    @if($post->categorie_id == $categorie->id)
                                                        selected
                                                    @endif
                                                    data-tokens="{{ $categorie->category_name }}">
                                                    {{ $categorie->category_name }}</option>
                                            @endforeach

                                        </select>
                                    </div>
                                </div>


                            </div>
                            <div class="col-md-6 mb-2">
                                <label for="name">Slug:</label>
                                <input type="text" name="slug" id="slug" value="{{ $post->slug }}"
                                    class="form-control">
                            </div>
                            <div class="col-md-12 mb-2">
                                <label for="desc">Post:</label>
                                <textarea name="post" id="desc" rows="3" class="form-control">
                                    {{ $post->post }}
                                </textarea>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
        <div class="col-md-4">
            <!-- Card -->
            <div class="card mb-4">
                <div class="card-header">
                    <h3 class="card-header-title">Featured Image</h3>
                </div>
                <div class="card-body">
                    <div class="imagePreviewUpdate"></div>
                    <label class="btn btn-primary">
                        Upload<input type="file" name="cover_image"
                            class="uploadFile img" value="Upload Photo"
                            style="width: 0px;height: 0px;overflow: hidden;">
                    </label>
                </div>
            </div>
            <!-- End Card -->
            
            <!-- Card -->
            <div class="card mb-4">
                <div class="card-header">
                    <h3 class="card-header-title">Publish</h3>
                    <small class="text-muted">2 days ago</small>
                </div>
                <div class="card-body">
                    <button type="submit" class="btn btn-lg btn-primary">Update</button>
                </div>
            </div>
            <!-- End Card -->
        </div>
    </div>
</form>
@endsection

@section('js_content')
    <script>
        $(document).ready(function() {
            $('#desc').trumbowyg();
            $('#name').keyup(function() {
                var slug = $(this).val()

                if (slug.charAt(slug.length - 1) != " ") {
                    $('#slug').val(slug.replace(/\s+/g, '-').toLowerCase());
                }

            })
        })
        $(".imgAdd").click(function() {
            $(this).closest(".row").find('.imgAdd').before(
                '<div class="col-sm-2 imgUp"><div class="imagePreview"></div><label class="btn btn-primary">Upload<input type="file" class="uploadFile img" value="Upload Photo" style="width:0px;height:0px;overflow:hidden;"></label><i class="fa fa-times del"></i></div>'
            );
        });
        $(document).on("click", "i.del", function() {
            $(this).parent().remove();
        });
        $(function() {
            $(document).on("change", ".uploadFile", function() {
                var uploadFile = $(this);
                var files = !!this.files ? this.files : [];
                if (!files.length || !window.FileReader)
                    return; // no file selected, or no FileReader support

                if (/^image/.test(files[0].type)) { // only image file
                    var reader = new FileReader(); // instance of the FileReader
                    reader.readAsDataURL(files[0]); // read the local file

                    reader.onloadend = function() { // set image data as background of div
                        //alert(uploadFile.closest(".upimage").find('.imagePreview').length);
                        uploadFile.closest(".imgUp").find('.imagePreview').css("background-image",
                            "url(" + this.result + ")");
                    }
                }

            });
        });
    </script>
@endsection
