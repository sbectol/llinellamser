@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Golygu Diwgyddiad / Edit Event</div>

                <div class="card-body">
<form class="form-signin" method="POST" action="/gweinyddu/golygu/{{$timeline->id}}">


    {{ csrf_field() }}


        <div class="form-group row">
            <label for="title_cym" class="col-md-2 col-form-label text-md-right">Teitl</label>

            <div class="col-md-10">
                <textarea id="title_cym" rows="3" class="form-control" name="title_cym" value="">{{$timeline->title_cym}}</textarea>
            </div>
        </div>


        <div class="form-group row">
            <label for="title" class="col-md-2 col-form-label text-md-right">Title</label>

            <div class="col-md-10">
                <textarea id="title" rows="3" class="form-control" name="title" value="">{{$timeline->title}}</textarea>
            </div>
        </div>

        <div class="form-group row">
            <label for="dyddiad" class="col-md-2 col-form-label text-md-right">Blwyddyn / Year</label>

            <div class="col-md-10">
                <input id="dyddiad" type ="text"  class="form-control" name="dyddiad" value="{{$timeline->dyddiad}}" />
            </div>
        </div>

        <div class="form-group row">
            <label for="asset_type" class="col-md-2 col-form-label text-md-right">Math / Type</label>

            <div class="col-md-10">
                <select id="asset_type" rows="10" class="form-control" name="asset_type" value="">
                    <option @if($timeline->asset_type =='audio') selected @endif value="audio">Sain / Audio</option>
                    <option @if($timeline->asset_type =='video') selected @endif value="video">Fideo / Video</option>
                    <option @if($timeline->asset_type =='image') selected @endif value="image">Llun / Picture</option>
                    <option @if($timeline->asset_type =='text') selected @endif value="text">Testun / Text</option>

                </select>

            </div>
        </div>







        <div class="form-group row mb-0">
                <div class="col-md-6 offset-md-2">
                    <button type="submit" class="btn btn-primary btn-lg mb-2">Save</button>
                </div>
            </div>
        <input id="asset" type="hidden" name="asset" value="{{$timeline->asset}}"/>
        <input id="asset_cym" type="hidden" name="asset_cym" value="{{$timeline->asset_cym}}"/>
        <input id="image" type="hidden" name="image" value="{{$timeline->image}}"/>
        </form>

        <div class="card-header">Ffeilau / Current Files
            <div id="accordion">   
                <button class="btn btn-outline-secondary btn-sm" type="button" 
                data-toggle="collapse" data-target="#ffeilSaesneg" aria-expanded="false" aria-controls="ffeilSaesneg">
                Ffeil Saesneg <br /> / English Language File
                </button>
                <button class="btn btn-outline-secondary btn-sm" type="button" 
                    data-toggle="collapse" data-target="#ffeilCym" aria-expanded="false" aria-controls="ffeilCym">
                    Ffeil Cymraeg <br /> / Welsh Language File
                </button>
                <button class="btn btn-outline-secondary btn-sm" type="button" 
                    data-toggle="collapse" data-target="#llun" aria-expanded="false" aria-controls="llun">
                    Llun <br /> / Image
                </button>
                
                <div class="collapse" id="ffeilSaesneg" data-parent="#accordion">
                    <div class="card">
                        <div class="card-body">
                            <button class="btn btn-danger btn-lg" type="button"><i class="fas fa-trash-alt"> Dileu / Delete</i>
                            </button>
                        </div>
                        <div class="card-title">Ffeil Saesneg / English Language File</div>
                        <div class="card-text">@php echo substr($timeline->asset,14) @endphp</div>
                        @if ($timeline->asset_type == 'audio')
                            <audio controls>
                            <source src="{{asset($timeline->asset)}}">
                            </audio>
                        @elseif ($timeline->asset_type == 'video')
                            <video controls width='405'>
                            <source src="{{asset($timeline->asset)}}">
                            </video>
                        @else
                            <p class="card-text">Dim ffeil ar hyn o bryd. / No current file.</p>
                        @endif
                    </div>
                </div>
            
            <div class="collapse" id="ffeilCym" data-parent="#accordion">
                <div class="card">
                    <div class="card-body">
                        <div class="card-title">Ffeil Cymraeg / Welsh Language File</div>
                        <p class="card-text">@php echo substr($timeline->asset_cym,14) @endphp</p>
                        @if ($timeline->asset_type == 'audio')
                            <audio controls>
                            <source src="{{asset($timeline->asset_cym)}}">
                            </audio>
                        @elseif ($timeline->asset_type == 'video')
                            <video controls width='405'>
                            <source src="{{asset($timeline->asset_cym)}}">
                            </video>
                        @else
                            <p class="card-text">Dim ffeil ar hyn o bryd. / No current file.</p>
                        @endif
                    </div>
                </div>
            </div>
           
            <div class="collapse" id="llun" data-parent="#accordion">
                <div class="card">
                    <div class="card-body">
                        <div class="card-title">Llun / Image</div>
                        <p class="card-text">@php echo substr($timeline->image,14) @endphp</p>
                        <img class="card-img-bottom" src="{{asset($timeline->image)}}">
                    </div>
                </div>
            </div>

        </div>
    
        <div class="card-header">Ailosod Ffeilau / Update Files</div>
        <div class="form-group row mb-0" id="file">
            <div class="col">
                <div class="card-header">Ffeil Saesneg / English Language File</div>
            <form method="post" action="{{route('upload')}}" enctype="multipart/form-data" class="dropzone" id="dropzone">
             @csrf
            </form>
            </div>
            <div class="col">
                <div class="card-header">Ffeil Cymraeg / Welsh Language File</div>
            <form method="post" action="{{route('upload')}}" enctype="multipart/form-data" class="dropzone" id="dropzone2">
            @csrf
            </form>
            </div>
            <div class="col">
                <div class="card-header">Llun / Image</div>
            <form method="post" action="{{route('upload')}}" enctype="multipart/form-data" class="dropzone" id="dropzone3">
            @csrf
            </form>
            </div>
        </div>

        <script type="text/javascript">
            Dropzone.options.dropzone =
            { maxFiles:1,
            init: function() {
                this.on("maxfilesexceeded", function(file) {
                    this.removeAllFiles();
                    this.addFile(file);
                });
            }, acceptedFiles: ".jpeg,.jpg,.png,.gif,.mp3",
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
            { maxFiles:1,
            init: function() {
                this.on("maxfilesexceeded", function(file) {
                    this.removeAllFiles();
                    this.addFile(file);
                });
            }, acceptedFiles: ".jpeg,.jpg,.png,.gif,.mp3",
                addRemoveLinks: true,
                timeout: 60000,
                success: function (file, response) {
                    console.log(response.filename);
                    document.getElementById("asset-cym").value=response.filename;

                },
                error: function (file, response) {
                    return false;
                }
                };
        </script>
        <script type="text/javascript">
            Dropzone.options.dropzone3 =
            { maxFiles:1,
            init: function() {
                this.on("maxfilesexceeded", function(file) {
                    this.removeAllFiles();
                    this.addFile(file);
                });
            }, acceptedFiles: ".jpeg,.jpg,.png,.gif,.mp3",
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
