@extends('layouts.app')

@section('content')

<div class="container">

    @include('shared.search')

 <p class="h5 text-success mt-4">Resultados <span class="badge badge-success">{{ $articles->total() }}</span> </p> 

    @if (count($articles) <= 0)

    <div class="alert alert-warning mt-4" role="alert">
        No se encontraron resultdos!
    </div>

    @endif

   
    <table class="table table-hover mt-3">
        <tbody>
        @foreach($articles as $article)        
              <tr>
                <th scope="row">{{ $article->id }}</th>
                <td>{{ $article->description }}</td>
                <td class="text-right">
                <a class="btn btn-outline-info btn-sm" href="articles/{{ $article->id }}" value="Aprobar"><i class="fas fa-folder-open"></i> Abrir</a>
                </td>
              </tr>                       
        @endforeach     
        </tbody>
    </table>


  {{ $articles->appends(['q' => Request::get('q')])->links() }} 

        
</div>

@endsection    