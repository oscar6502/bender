@extends('layouts.app')

@section('content')

<div class="container">

        <form method="POST" action="/articles">
            @csrf
            @include('shared.form')


    </form>

</div>

@endsection        