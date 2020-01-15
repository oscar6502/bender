@extends('layouts.app')

@section('content')

<div class="container">

@if ( !$article->checked )
    <div class="alert alert-warning" role="alert">
        Este articulo esta pendiente de aprobacion.
    </div>
@endif

<p class="h5 mt-4"><i class="fas fa-book"></i> {{ $article->description }}</i> 

</p> 
  
    <p class="text-secondary">
        <i class="fas fa-feather-alt"></i>
         {{ $article->author ?? 'N/D' }} / <i class="fas fa-sync-alt"></i>         
        {{ Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $article->updated_at)->format('d-m-Y') }}    
        

        @if (Auth::user()->admin || $article->author == Auth::user()->name )

            <div class="dropdown dropright">
            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Acciones
            </button>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        
                <form method="POST" action="/articles/{{$article->id}}/check" class="">
                @csrf
                @method('PUT')
                    <button type="submit" class="dropdown-item"  onclick="return confirm('Esta seguro de aprobar el articulo ?')" ><i class="fas fa-check"></i> Aprobar </button>
                </form>
                        
                <div class="dropdown-divider"></div>

                <a class="dropdown-item" href="/articles/{{ $article->id }}/edit"><i class="fas fa-edit"></i>Editar</a>

                <div class="dropdown-divider"></div>

                <form method="POST" action="/articles/{{$article->id}}" class="">
                @csrf
                @method('DELETE')
                    <button type="submit" class="dropdown-item"  onclick="return confirm('Esta seguro de eliminar el articulo ?')" ><i class="fas fa-trash"></i> Eliminar </button>
                </form>

            </div>
            </div>

        @endif

    </p>

    <hr>

    <div class="mt-4">
        @if($content ==null)
            <div class="alert alert-warning   shadow1" role="alert">
                No se encuentra disponible la informacion del articulo
            </div>
        @else
            {!! $content ?? '' !!}
        @endif
    </div>

</div>

@endsection        