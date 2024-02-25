@extends('layouts.app')
@section('title', 'Package Definition Page')

@section('content')
    <div class="container">
        <h2>Adicionar Pacote</h2>
        <div class="col-6">
            <form method="post" action="{{ route('package-definition.store') }}">
                @csrf
                <div class="form-group">
                    <label for="name">Nome:</label>
                    <input type="text" class="form-control" id="name" name="name" required>
                </div>
                <br/>
                <div class="form-group">
                    <select id="type" class="form-control" name="type">
                        <option value="" disabled selected>Opções</option>
                        <option value="amount">Pacote por aulas</option>
                        <option value="interval">Pacote por intervalo</option>
                    </select>
                </div>
                <br/>
                <div class="form-group">
                    <label for="description">Descrição:</label>
                    <input type="text" class="form-control" id="description" name="description" required>
                </div>
                <br/>
                <div class="form-group">
                    <label for="description">Duração do pacote:</label>
                    <select class="form-control" id="package_duration" name="package_duration">
                        <option value="" disabled selected>Opções</option>
                        <option value="P1M">1 Mês</option>
                        <option value="P1W">1 semana</option>
                        <option value="P2W">2 semana</option>
                    </select>
                </div>
                <br/>
                <div class="form-group">
                    <label for="package_amount">Quantidade de aulas:</label>
                    <input type="number" class="form-control" id="package_amount" name="package_amount">
                </div>
                <br/>
                <button type="submit" class="btn btn-primary">Enviar</button>
            </form>
        </div>
    </div>
@endsection
