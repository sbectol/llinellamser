@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Uchwanegu Diwgyddiad / Add Event</div>

                <div class="card-body">
<form class="form-signin" method="POST" action="/gweinyddu/uchwanegu/">


    {{ csrf_field() }}


        <div class="form-group row">
            <label for="title_cym" class="col-md-2 col-form-label text-md-right">Teitl</label>

            <div class="col-md-10">
                <textarea id="title_cym" rows="3" class="form-control" name="title_cym" value=""></textarea>
            </div>
        </div>


        <div class="form-group row">
            <label for="title" class="col-md-2 col-form-label text-md-right">Title</label>

            <div class="col-md-10">
                <textarea id="title" rows="3" class="form-control" name="title" value=""></textarea>
            </div>
        </div>

        <div class="form-group row">
            <label for="dyddiad" class="col-md-2 col-form-label text-md-right">Blwyddyn / Year</label>

            <div class="col-md-10">
                <input id="dyddiad" type ="text"  class="form-control" name="dyddiad" value="" />
            </div>
        </div>

        <div class="form-group row">
            <label for="asset_type" class="col-md-2 col-form-label text-md-right">Math / Type</label>

            <div class="col-md-10">
                <select id="asset_type" rows="10" class="form-control" name="asset_type" value="">
                    <option value="audio">Sain / Audio</option>
                    <option value="video">Fideo / Video</option>
                    <option value="image">Llun / Picture</option>
                    <option value="text">Testun / Text</option>

                </select>

            </div>
        </div>








        <div class="form-group row mb-0">
                <div class="col-md-6 offset-md-2">
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </div>
        <input id="asset" type="hidden" name="asset" value=""/>
        <input id="asset_cym" type="hidden" name="asset_cym" value=""/>
        <input id="image" type="hidden" name="image" value=""/>
        </form>
        <div class="card-header">Uchwanegu Ffeiliau / Add Files</div>
        <div class="form-group row mb-0" id="file">
            <div class="col">
                <div class="card-header">Ffeil Saesneg / English Language File</div>
            <form method="post" action="{{ route('upload') }}" enctype="multipart/form-data" class="dropzone" id="dropzone">
                @csrf
            </form>
            </div>
            <div class="col">
                <div class="card-header">Ffeil Cymraeg / Welsh Language File</div>
            <form method="post" action="{{ route('upload') }}" enctype="multipart/form-data" class="dropzone" id="dropzone2">
            @csrf
            </form>
            </div>
            <div class="col">
                <div class="card-header">Llun / Image</div>
            <form method="post" action="{{ route('upload') }}" enctype="multipart/form-data" class="dropzone" id="dropzone3">
            @csrf
            </form>
            </div>
        </div>

        <script type="text/javascript">
            Dropzone.options.dropzone =
            {

                maxFiles:1,
init: function() {
      this.on("maxfilesexceeded", function(file) {
            this.removeAllFiles();
            this.addFile(file);
      });
},   acceptedFiles: ".jpeg,.jpg,.png,.gif,.mp3",
                addRemoveLinks: true,
                timeout: 60000,
                success: function (file, response) {
                    console.log(response.filename);
                    document.getElementById("asset").value=response.filename;
                },
                error: function (file, response) {
                    return false;
                }
            };
        </script>

<script type="text/javascript">
    Dropzone.options.dropzone2 =
    {

        maxFiles:1,
init: function() {
this.on("maxfilesexceeded", function(file) {
    this.removeAllFiles();
    this.addFile(file);
});
},   acceptedFiles: ".jpeg,.jpg,.png,.gif,.mp3",
        addRemoveLinks: true,
        timeout: 60000,
        success: function (file, response) {
            console.log(response.filename);
            document.getElementById("asset_cym").value=response.filename;
        },
        error: function (file, response) {
            return false;
        }
    };
</script>
<script type="text/javascript">
    Dropzone.options.dropzone3 =
    {

        maxFiles:1,
init: function() {
this.on("maxfilesexceeded", function(file) {
    this.removeAllFiles();
    this.addFile(file);
});
},   acceptedFiles: ".jpeg,.jpg,.png,.gif,.mp3",
        addRemoveLinks: true,
        timeout: 60000,
        success: function (file, response) {
            console.log(response.filename);
            document.getElementById("image").value=response.filename;
        },
        error: function (file, response) {
            return false;
        }
    };
</script>

                </div>
            </div>
        </div>
    </div>

    @endsection
