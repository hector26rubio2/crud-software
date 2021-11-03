@extends('dashboard.master')
@section('content')
    <h6>Crear Categoría</h6>
    <form action=" {{ route('category.store') }} " method="POST">
        @include('dashboard.categories._form')
    </form>
@endsection
