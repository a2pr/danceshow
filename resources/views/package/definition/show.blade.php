@include('../default')
<div>
    <div>
        <h3>Definaçao de Pacote</h3>
        <p>Id: {{ $packageDefinition->id }}</p>
        <p>Type: {{ $packageDefinition->type }}</p>
        <p>Nome: {{ $packageDefinition->name }}</p>
        <p>Descriçao: {{ $packageDefinition->description }}</p>
        <p>Duraçao: {{ $packageDefinition->package_duration }}</p>
        <p>Quantidade: {{ $packageDefinition->package_amount }}</p>

        <a href="{{ route('package-definition.edit', $packageDefinition) }}">Editar Definaçao de Pacote</a>
        <a href="{{ route('package-definition.destroy', $packageDefinition) }}" onclick="event.preventDefault(); document.getElementById('delete-form').submit();">
            Apagar definaçao de Pacote
        </a>
        <form id="delete-form" action="{{ route('package-definition.destroy', $packageDefinition) }}" method="POST" style="display: none;">
            @csrf
            @method('DELETE')
        </form>
    </div>
    <hr>
</div>
