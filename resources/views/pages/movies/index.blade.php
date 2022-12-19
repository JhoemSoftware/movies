@extends('pages.layouts.app')
@section('titlePage', 'Películas')
@section('content')
    <div>
        <h1>Películas</h1>
        @if ($portafolio)
            @foreach ($portafolio as $item)
            <article class="post no-image">
                <div class="content-post">
                    <header class="container-flex space-between">
                        <div class="date">
                            <span class="c-gray-1">{{ $item->age }}</span>
                        </div>
                        <div class="post-category">
                            <span class="category text-capitalize">{{ $item->genre }}</span>
                        </div>
                    </header>
                    <h1>{{ $item->title }}</h1>
                    <div class="divider"></div>
                    <p>{{ $item->description }}</p>
                    <footer class="container-flex space-between">
                        <div class="read-more">
                            <p class="text-uppercase c-green"> {{ $item->number_stock }} Unidades disponibles </p>
                        </div>
                    </footer>
                </div>
            </article>
            @endforeach
        @else
            <h3>No hay Películas para mostrar</h3>
        @endif
    </div>
    </div>
@endsection()