@extends('layouts.app')

@section('content')

<div class="container">

<form method="POST" action="/articles/{{$article->id}}">
            @csrf
            @method('PUT')
            @include('shared.form')

</form>

</div>

@endsection    