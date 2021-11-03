{{-- falsificación de peticiones en sitios cruzados --}}
@csrf
@include('dashboard.structure.validation-error')
<div class="form-group">
    {{-- input:text --}}
    <input class="form-control" type="text" name="publication" id="publication" placeholder="Nombre publicación"
        value="{{ old('publication', $post->publication) }}">
</div>
<div class="form-group">
    <select class="custom-select" name="category_id" id="category_id" aria-label="Default">
        <option selected disabled>Selecciona una opción</option>
        @foreach ($categories as $category_name => $id)
            <option {{ $post->category_id == $id ? 'selected="selected"' : '' }} value="{{ $id }}">
                {{ $category_name }}
            </option>
        @endforeach
    </select>
</div>
<div class="form-group">
    <select class="form-group" name="state_publication" id="state_publication">
        @include('dashboard.components.state_options',['val'=> $post -> state_publication])
    </select>

</div>
<div class="form-group">
    <textarea class="form-control" name="content_publication" id="content_publication" cols="30" rows="10"
        placeholder="Contenido de la publicación ">{{ old('content_publication', $post->content_publication) }}</textarea>
</div>

<button type="submit" class="btn btn-success">Aceptar</button>
<a class="btn btn-danger" href="{{ URL::previous() }}">Cancelar </a>
