<form action="{{ route('pedido-produto.store', ['pedido' => $pedido])}}" method="POST">
    @csrf
    <select name="produto_id">
        <option>-- Selecione um produto --</option>

        @foreach ($produtos as $produto )
            <option value="{{$produto->id}}" {{ old('produto_id') == $produto->id ? 'selected' : ''  }}>{{$produto->nome}}</option>                
            @error('produto_id')
                {{$message}}
            @enderror
        @endforeach
    </select>

    <input type="number" name="quantidade" value="{{old('quantidade') ? old('quantidade') : ''}}" placeholder="Quantidade" class="borda-preta ">
    @error('quantidade')
        {{$message}}
    @enderror

    <button type="submit">Cadastrar</button>
</form>