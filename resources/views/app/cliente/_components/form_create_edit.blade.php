@if(isset($cliente->id))
    <form action="{{ route('cliente.update', ['cliente' => $cliente->id])}}" method="POST"> 
        @csrf
        @method('PUT')
@else
    <form action="{{ route('cliente.store')}}" method="POST"> 
        @csrf
@endif
        <input type="text" name="nome" placeholder="Nome" value="{{ isset($cliente->id) ? $cliente->nome : old('nome') }}">
        @error('nome')
            {{$message}}
        @enderror

        <button type="submit">Cadastrar</button>
    </form>
