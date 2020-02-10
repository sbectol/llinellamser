@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
        <!-- displays errors -->
        @if (count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
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
                <input id="dyddiad" type ="text"  class="form-control" name="dyddiad" value=""/>
            </div>
        </div>

        








        <div class="form-group row mb-0">
                <div class="col-md-6 offset-md-2">
                    <button type="submit" class="btn btn-primary btn-lg mb-4">Save</button>
                </div>
            </div>
        <input id="asset_type" type="hidden" name="asset_type" value="text"/>
        <input id="asset" type="hidden" name="asset" value=""/>
        <input id="asset_cym" type="hidden" name="asset_cym" value=""/>
        <input id="image" type="hidden" name="image" value="storage/files/llythyr-papur.jpg"/>
        </form>
        <div class="card-header mb-2">Uchwanegu Ffeiliau / Add Files</div>
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
            { dictDefaultMessage:"Drop file here to upload. / tobetranslated",
                dictRemoveFile : "Remove file / tobetranslated",
                dictCancelUpload : "Cancel / Canslo",

                maxFiles:1,
init: function() {
      this.on("maxfilesexceeded", function(file) {
            this.removeAllFiles();
            this.addFile(file);
      });
},   acceptedFiles: ".mp3,.mp4",
                addRemoveLinks: true,
                timeout: 60000,
                success: function (file, response) {
                    console.log(response.filename);
                    document.getElementById("asset").value=response.filename;
                    assetChecker();
                },
                error: function (file, response) {
                    return false;
                }
            };
        </script>

<script type="text/javascript">
    Dropzone.options.dropzone2 =
    {
        dictDefaultMessage:"Drop file here to upload. / tobetranslated",
        dictRemoveFile : "Remove file / tobetranslated",
        dictCancelUpload : "Cancel / Canslo",
        
        
        maxFiles:1,
init: function() {
this.on("maxfilesexceeded", function(file) {
    this.removeAllFiles();
    this.addFile(file);
});
},   acceptedFiles: ".mp3,.mp4",
        addRemoveLinks: true,
        timeout: 60000,
        success: function (file, response) {
            console.log(response.filename);
            document.getElementById("asset_cym").value=response.filename;
            assetChecker();
        },
        error: function (file, response) {
            return false;
        }
    };
</script>
<script type="text/javascript">
    Dropzone.options.dropzone3 =
    {
        dictDefaultMessage:"Drop file here to upload. / tobetranslated",
        dictRemoveFile : "Remove file / tobetranslated",
        dictCancelUpload : "Cancel / Canslo",
        maxFiles:1,
init: function() {
this.on("maxfilesexceeded", function(file) {
    this.removeAllFiles();
    this.addFile(file);
});
},   acceptedFiles: ".jpeg,.jpg,.png,.gif",
        addRemoveLinks: true,
        timeout: 60000,
        success: function (file, response) {
            console.log(response.filename);
            document.getElementById("image").value=response.filename;
            assetChecker();
        },
        error: function (file, response) {
            return false;
        }
    };
</script>
<script type="text/javascript">
            function assetChecker() {
                if (document.getElementById("asset").value) { 
                    if (document.getElementById("asset").value.toLowerCase().endsWith(".mp4")) {
                        document.getElementById("asset_type").value="video";
                    }
                    else 
                    {
                        document.getElementById("asset_type").value="audio";
                    }
                }
                else if (document.getElementById("asset_cym").value) {
                    if (document.getElementById("asset_cym").value.toLowerCase().endsWith(".mp4")) {
                        document.getElementById("asset_type").value="video";
                    }
                    else
                    {
                        document.getElementById("asset_type").value="audio";
                    }
                }
                else { 
                    if (document.getElementById("image").value != "storage/files/llythyr-papur.jpg") {
                        document.getElementById("asset_type").value="image";
                        }
                    else
                    { document.getElementById("asset_type").value="text";
                    }
                    }   
            };
</script>
                </div>
            </div>
        </div>
    </div>

    @endsection
