@extends('dashboard.master')
@section('content')
    <a href="{{ route('category.create') }}" class="btn btn-inf btn-small mb-3">Crear Categoría</a>
    <h6>Listar Categorías</h6>
    <table id="example" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                {{-- <th>Código</th> --}}
                <th>Categoría</th>
                <th>Contenido</th>
                <th>Opciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($categories as $category)
                <tr>
                    {{-- <td scope="row"> {{ $category->id }}</td> --}}
                    <td> {{ $category->category_name }}</td>
                    <td> {{ $category->content_publication }}</td>
                    <td>
                        <a href="{{ route('category.edit', $category->id) }}" class="btn btn-info btn-sm">Editar</a>
                        <a href="{{ route('category.show', $category->id) }}" class="btn btn-info btn-sm">Ver</a>
                        <button data-toggle="modal" class="btn btn-danger btn-sm" data-bs-toggle="modal"
                            data-target="#exampleModal" data-id="{{ $category->id }}">Eliminar</button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
{{ $categories->links() }}


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"></h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                ¿Seguro deseas eliminar la categoría?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                <form id="deletePost" action="{{ route('category.destroy', 0) }}"
                    data-action="{{ route('category.destroy', 0) }}" method="POST">
                    @method('DELETE')
                    @csrf
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
    window.onload = function() {
        $('#exampleModal').on('show.bs.modal', function(event) {
            // Button that triggered the modal
            var button = $(event.relatedTarget)
            var id = button.data('id')
            action = $('#deletePost').attr('data-action').slice(0, -1)
            action += id
            console.log(action)
            $('#deletePost').attr('action', action)
            var modal = $(this)
            modal.find('.modal-title').text('Vas a eliminar la categoría: ' + id)

        })

    }
</script>
