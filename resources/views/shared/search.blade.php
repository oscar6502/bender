<h1 class="display-4 text-info">Bender</h1>
<p class="lead text-black">Base de conocimientos. <i class="fas fa-hdd"></i></p>

{{-- Search --}}
<form method="GET" action="/search">               
    <div class="input-group shadow-sm">
        <input type="text" id="q" name="q" class="form-control" placeholder="Ingrese su busqueda" value="{{ Request::get('q') ?? '' }}">
        <div class="input-group-append">
            <button type="submit" class="btn btn-secondary shadow-sm"> <i class="fas fa-search"></i> Buscar</button>
        </div>
    </div>     
</form>
