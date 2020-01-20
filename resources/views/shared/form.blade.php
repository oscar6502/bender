<div class="h3 text-warning">Nuevo articulo</div>

<p class="h5 text-info1 mt-4"><i class="fas fa-edit"></i> Editor </p>     

<input type="text" class="form-control mb-3" placeholder="Titulo..." name="description" id="description" value="{{ $article->description ?? null}}" required>

<textarea class="summernote mt-3" name="post" id="post"> {{ $content ?? null}} </textarea>


        @if (Auth::user()->admin)
        
        <div class="form-group form-check mt-4">
          <input type="checkbox" class="form-check-input" id="checked" name="checked"         
          {{ isset($article) ? ($article->checked ? 'checked' : '') : ''}}>
          <label class="form-check-label" for="exampleCheck1">Aprobado</label>
        </div>

        @endif

<div class="mt-3 mb-4">
<button type="submit" class="btn btn-sm btn-danger"><i class="fas fa-save"></i> Guardar</button>
<a href="/" class="btn btn-sm btn-secondary"><i class="fas fa-eject"></i> Descartar</a>
</div>

<script type="text/javascript">

    $('.summernote').summernote({
      placeholder: 'Descripcion',        
      height: 400,
      tabsize: 2,
      followingToolbar: true,
      toolbar: [
  ['style', ['style']],
  ['font', ['bold', 'underline', 'clear']],
  ['fontname', ['fontname']],
  ['fontsize', ['fontsize']],
  ['color', ['color']],
  ['para', ['ul', 'ol', 'paragraph']],
  ['table', ['table']],
  ['insert', ['link', 'picture', 'video']],
  ['view', ['fullscreen']],
      ]
    });

</script>
