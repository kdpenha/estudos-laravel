@if (isset($produto->id))
    <form action="{{route('produto.update', ['produto' => $produto->id])}}" method="post">
        @csrf
        @method('PUT')
@else
    <form action="{{route('produto.store')}}" method="post">
        @csrf
@endif

    <select name="fornecedor_id">
        <option>-- Selecione um fornecedor --</option>

        @foreach ($fornecedores as $fornecedor)
            <option value="{{$fornecedor->id}}" {{ ($produto->fornecedor_id ?? old('fornecedor_id')) == $fornecedor->id ? 'selected' : ''  }}>{{$fornecedor->nome}}</option>                
        @endforeach
    </select>
    <div style="color:red;">
        @error('fornecedor_id')
            {{$message}}
        @enderror   
    </div>

    <input type="text" name="nome" value="{{$produto->nome ?? old('nome')}}" placeholder="Nome" class="borda-preta">
    <div style="color:red;">
        @error('nome')
            {{$message}}
        @enderror   
    </div>

    <input type="text" name="descricao" placeholder="Descricao" value="{{$produto->descricao ?? old('descricao')}}" class="borda-preta">
    <div style="color:red;">
        @error('descricao')
            {{$message}}
        @enderror   
    </div>
    
    <input type="text" name="peso" placeholder="Peso" value="{{$produto->peso ?? old('peso')}}" class="borda-preta">
    <div style="color:red;">
        @error('peso')
            {{$message}}
        @enderror   
    </div>
    
    <select name="unidade_id">
        <option>-- Selecione a unidade de medida --</option>

        @foreach ($unidades as $unidade)
            <option value="{{$unidade->id}}" {{ ($produto->unidade_id ?? old('unidade_id')) == $unidade->id ? 'selected' : ''  }}>{{$unidade->descricao}}</option>                
        @endforeach
    </select>
    <div style="color:red;">
        @error('unidade_id')
            {{$message}}
        @enderror   
    </div>
        
    <button type="submit" class="borda-preta">{{isset($produto->id) ? 'Editar' : 'Cadastrar'}}</button>
</form>