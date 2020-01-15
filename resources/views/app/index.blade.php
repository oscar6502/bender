@extends('layouts.app')

@section('content')

<div class="container">

{{-- {{ Auth::user()->admin }} --}}


    {{-- Search --}}
    @include('shared.search')





    @foreach($my_pending_approval as $article_pending)   
        <div class="alert alert-warning mt-4 " role="alert">
            <p> Mis pendientes de aprobacion </p>
            <i class="fas fa-sticky-note"></i>  {{ $article_pending->description }} <a href="articles/{{ $article_pending->id }}" class="alert-link text-primary">Click</a> para ver el articulo.
        </div>
    @endforeach 






    {{-- Notificaciones --}}
    @if($not_checked > 0 && Auth::user()->admin == true)

    <p class="h5 text-danger   mt-4">Notificaciones <i class="fas fa-bell"></i></p> 
    <div class="alert alert-warning   shadow1" role="alert">
        Hay {{ $not_checked }} articulo pendientes a revisar
    </div>
    
    @endif

    {{-- Ultimos articulos --}}


    <p class="h5 text-warning mt-4">Ultimos articulos <i class="fas fa-rss"></i></p>  


    @if (count($last_articles) <= 0)
    No hay articulos.
    @endif

    @foreach($last_articles as $article)   
        <div class="alert alert-info " role="alert">
            <i class="fas fa-sticky-note"></i>  {{ $article->description }} <a href="articles/{{ $article->id }}" class="alert-link text-primary">Click</a> para ver el articulo.
        </div>
    @endforeach 
    
  
    {{-- Top --}}

    <p class="h5 text-primary mt-4 mb-2">Top <i class="fas fa-trophy"></i></p>   


    <div class="card shadow-sm">
        
        <div class="card-body">

    @if (count($tops) <= 0)
    No hay tops
    @endif

            @foreach($tops as $top)   
                <p>
                    <i class="fas fa-star text-warning"></i>
                    <span class="font-weight-bolder"> {{ $top->author }} </span> -> Contribuciones: {{ $top->posts }}            
                </p>
            @endforeach 
        </div>
    </div>

</div>

@endsection