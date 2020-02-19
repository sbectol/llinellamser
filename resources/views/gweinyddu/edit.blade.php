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
                <div class="card-header">Golygu Digwyddiad / Edit Event</div>

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

        

        <div class="form-group row mb-0">
                <div class="col-md-6 offset-md-2">
                    <button type="submit" class="btn btn-primary btn-lg mb-4">Cadw / Save</button>
                </div>
            </div>

        <input id="asset_type" type="hidden" name="asset_type" value="{{$timeline->asset_type}}"/>
        <input id="asset" type="hidden" name="asset" value="{{$timeline->asset}}"/>
        <input id="asset_cym" type="hidden" name="asset_cym" value="{{$timeline->asset_cym}}"/>
        <input id="image" type="hidden" name="image" value="{{$timeline->image}}"/>
        </form>

        <div class="card-header mb-4">Ffeiliau Presennol / Current Files
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
                            @if ($timeline->asset)
                            <button class="btn btn-danger float-right btn-sm" type="button" ontouchstart="hideEngFile()" onclick="hideEngFile()">
                                <i class="fas fa-trash-alt"> Dileu / Delete</i>
                            </button>
                            @endif
                            <div class="card-title"> Ffeil Saesneg / English Language File 
                                </div>
                            @if ($timeline->asset)
                            <div id="englishfile">
                                
                                
                                <div class="card-text">@php echo substr($timeline->asset,14) @endphp
                                </div>
                                 @if ($timeline->asset_type == 'audio')
                                <audio controls>
                                <source src="{{asset($timeline->asset)}}">
                                </audio>
                                 @else ($timeline->asset_type == 'video')
                                 <video controls width='100%'>
                                <source src="{{asset($timeline->asset)}}">
                                </video>
                                @endif
                            </div>
                            @else
                            <p class="card-text">Dim ffeil ar hyn o bryd. / No current file.</p>
                            @endif
                            
                        </div>
                    </div>
                </div>
            
                <div class="collapse" id="ffeilCym" data-parent="#accordion">
                    <div class="card">
                        <div class="card-body">
                            @if ($timeline->asset_cym)
                             <button class="btn btn-danger float-right btn-sm" type="button" ontouchstart="hideWelshFile()" onclick="hideWelshFile()">
                                <i class="fas fa-trash-alt"> Dileu / Delete</i>
                             </button>
                            @endif
                            
                            <div class="card-title"> Ffeil Cymraeg / Welsh Language File
                            </div>
                            @if ($timeline->asset_cym)
                            <div id="welshfile">
                                <div class="card-text">@php echo substr($timeline->asset_cym,14) @endphp
                                </div>
                                @if ($timeline->asset_type == 'audio')
                                <audio controls>
                                <source src="{{asset($timeline->asset_cym)}}">
                                </audio>
                                @else ($timeline->asset_type == 'video')
                                <video controls width='405'>
                                 <source src="{{asset($timeline->asset_cym)}}">
                                </video>
                                @endif
                            </div>
                            @else
                            <p class="card-text">Dim ffeil ar hyn o bryd. / No current file.</p>
                             @endif
                         </div>
                    </div>
                </div>
           
                <div class="collapse" id="llun" data-parent="#accordion">
                    <div class="card">
                        <div class="card-body">
                            @if ($timeline->image)
                             <button class="btn btn-danger float-right btn-sm" type="button" ontouchstart="hidePicture()" onclick="hidePicture()">
                                <i class="fas fa-trash-alt"> Dileu / Delete</i>
                             </button>
                            @endif
                            
                            <div class="card-title"> Llun / Image
                            </div>
                            <div id="picture">
                                 <div class="card-text">@php echo substr($timeline->image,14) @endphp
                                 </div>
                                @if ($timeline->image)
                                <img class="card-img-bottom" src="{{asset($timeline->image)}}">
                                @else
                                <p class="card-text">Dim ffeil ar hyn o bryd. / No current file.</p>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    
        <div class="card-header mb-2">Ailosod Ffeilau / Update Files</div>
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
                <div class="card-header">Llun  / Image</div>
            <form method="post" action="{{route('upload')}}" enctype="multipart/form-data" class="dropzone" id="dropzone3">
            @csrf
            </form>
            </div>
        </div>
    
        @yield('javascript')
       
                </div>
            </div>
        </div>
    </div>

    @endsection
 
    @section('javascript')
    <script type="text/javascript">
            Dropzone.options.dropzone =
            { dictDefaultMessage:"Drop file here to upload. / Gollwng ffeil yma i'w lanlwytho",
                dictRemoveFile : "Remove file / Tynnu ffeil",
                dictCancelUpload : "Cancel / Canslo",
                maxFiles:1,
            init: function() {
                this.on("maxfilesexceeded", function(file) {
                    this.removeAllFiles();
                    this.addFile(file);
                });
            }, acceptedFiles: ".mp3,.mp4",
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
            { dictDefaultMessage:"Drop file here to upload. / Gollwng ffeil yma i'w lanlwytho",
                dictRemoveFile : "Remove file / Tynnu ffeil",
                dictCancelUpload : "Cancel / Canslo",
                maxFiles:1,
            init: function() {
                this.on("maxfilesexceeded", function(file) {
                    this.removeAllFiles();
                    this.addFile(file);
                });
            }, acceptedFiles: ".mp3,.mp4",
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
            { dictDefaultMessage:"Drop file here to upload. / Gollwng ffeil yma i'w lanlwytho",
                dictRemoveFile : "Remove file / Tynnu Ffeil",
                dictCancelUpload : "Cancel / Canslo",
                maxFiles:1,
            init: function() {
                this.on("maxfilesexceeded", function(file) {
                    this.removeAllFiles();
                    this.addFile(file);
                });
            }, acceptedFiles: ".jpeg,.jpg,.png,.gif",
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
        
            function hideEngFile() {
                document.getElementById("englishfile").style.display= "none";
                document.getElementById("asset").value="";
                assetChecker();
                
                };
            function hideWelshFile() {
                document.getElementById("welshfile").style.display= "none";
                document.getElementById("asset_cym").value="";
                assetChecker();
               
                };
            function hidePicture() {
                document.getElementById("picture").style.display= "none";
                document.getElementById("image").value="storage/files/llythyr-papur.jpg";
                assetChecker();
                
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
    @endsection