@if (isset($produto_detalhe->id))
    <form action="{{route('produto.update', ['produto' => $produto_detalhe->id])}}" method="post">
        @csrf
        @method('PUT')
@else
    <form action="{{route('produto-detalhe.store')}}" method="post">
        @csrf
@endif

    <input type="text" name="produto_id" value="{{$produto_detalhe->produto_id ?? old('produto_id')}}" placeholder="ID do produto" class="borda-preta">
    <div style="color:red;">
        @error('produto_id')
            {{$message}}
        @enderror   
    </div>

    <input type="text" name="comprimento" placeholder="Comprimento" value="{{$produto_detalhe->comprimento ?? old('comprimento')}}" class="borda-preta">
    <div style="color:red;">
        @error('comprimento')
            {{$message}}
        @enderror   
    </div>
    
    <input type="text" name="largura" placeholder="Peso" value="{{$produto_detalhe->largura ?? old('largura')}}" class="borda-preta">
    <div style="color:red;">
        @error('largura')
            {{$message}}
        @enderror   
    </div>

    <input type="text" name="altura" placeholder="altura" value="{{$produto_detalhe->altura ?? old('altura')}}" class="borda-preta">
    <div style="color:red;">
        @error('altura')
            {{$message}}
        @enderror   
    </div>
    
    <select name="unidade_id">
        <option>-- Selecione a unidade de medida --</option>

        @foreach ($unidades as $unidade)
            <option value="{{$unidade->id}}" {{ ($produto_detalhe->unidade_id ?? old('unidade_id')) == $unidade->id ? 'selected' : ''  }}>{{$unidade->descricao}}</option>                
        @endforeach
    </select>
    <div style="color:red;">
        @error('unidade_id')
            {{$message}}
        @enderror   
    </div>
        
    <button type="submit" class="borda-preta">{{isset($produto_detalhe->id) ? 'Editar' : 'Cadastrar'}}</button>
</form>