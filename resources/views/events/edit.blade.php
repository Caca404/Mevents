@extends('layouts.main')

@section('title', 'Editando: '.$event->title)

@section("content")
    <div class="col-md-6 offset-md-3" id="event-create-container">
        <h1>Editando: {{ $event->title }}</h1>
        <form action="/events/update/{{ $event->id }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="image">Imagem do evento:</label>
                <input type="file" class="form-control-file" id="image" name="image">
                <img src="/img/events/{{ $event->image }}" alt="{{ $event->title }}" class="img-preview">
            </div>
            <div class="form-group">
                <label for="title">Evento:</label>
                <input type="text" class="form-control" id="title" name="title" placeholder="Nome do evento" value="{{ $event->title }}">
            </div>
            <div class="form-group">
                <label for="date">Data do evento:</label>
                <input type="date" class="form-control" id="date" name="date" value="{{ $event->date->format('Y-m-d') }}">
            </div>
            <div class="form-group">
                <label for="city">Cidade:</label>
                <input type="text" class="form-control" id="city" name="city" placeholder="Local do evento" value="{{ $event->city }}">
            </div>
            <div class="form-group">
                <label for="private">O evento é privado?</label>
                <select name="private" id="private" class="form-control">
                    <option value="0" {{ $event->private == 0 ? "selected='selected'" : "" }}>Não</option>
                    <option value="1" {{ $event->private == 1 ? "selected='selected'" : "" }}>Sim</option>
                </select>
            </div>
            <div class="form-group">
                <label for="description">Descrição</label>
                <textarea class="form-control" id="description" name="description" placeholder="O que vai acontecer no evento?">{{ $event->description }}</textarea>
            </div>
            <div class="form-group">
                <label for="ite">Adicionar itens de infraestrutura:</label>
                <div class="form-group">
                    <input type="checkbox" name="itens[]" value="Cadeiras" {{ array_search('Cadeiras', $event->itens) !== false ? "checked='checked'" : "" }}> Cadeiras
                </div>
                <div class="form-group">
                    <input type="checkbox" name="itens[]" value="Palco" {{ array_search('Palco', $event->itens) !== false ? "checked='checked'" : "" }}> Palco
                </div>
                <div class="form-group">
                    <input type="checkbox" name="itens[]" value="Cerveja gratis" {{ array_search('Cerveja gratis', $event->itens) !== false ? "checked='checked'" : "" }}> Cerveja grátis
                </div>
                <div class="form-group">
                    <input type="checkbox" name="itens[]" value="Open food" {{ array_search('Open food', $event->itens) !== false ? "checked='checked'" : "" }}> Open Food
                </div>
                <div class="form-group">
                    <input type="checkbox" name="itens[]" value="Brindes" {{ array_search('Brindes', $event->itens) !== false ? "checked='checked'" : "" }}> Brindes
                </div>
                
            </div>
            <input type="submit" class="btn btn-primary" value="Editar Evento">
        </form>
    </div>

@endsection