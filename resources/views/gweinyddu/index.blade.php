@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dangosfwrdd / Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <a href="/gweinyddu/uchwanegu"><i class="fas fa-plus"></i></a>
                    <ul>
                    @foreach ($timeline as $key=>$input)
                        <li>{{$timeline[$key]->dyddiad}} - {{$timeline[$key]->title_cym}} <a href="/gweinyddu/golygu/{{ $timeline[$key]->id }}"><i class="fas fa-edit"></i></a> <a href="/gweinyddu/dileu/{{ $timeline[$key]->id }}"><i class="fas fa-trash-alt"></i></a></li>

                    @endforeach
                    </ul>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
