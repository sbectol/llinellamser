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
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </div>

        </form>

                </div>
            </div>
        </div>
    </div>

    @endsection
