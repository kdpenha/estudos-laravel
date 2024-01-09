@extends('app.layouts.basico')

@section('titulo', 'Produto')
        
@section('conteudo')
    
    <div class="conteudo-pagina">
        <div class="titulo-pagina-2">
            <p>Adicionar produto</p>
        </div>

        <div class="menu">
            <ul>
                <li><a href="{{route('produto.index')}}">Voltar</a></li>
                <li><a href="">Consulta</a></li>
            </ul>
        </div>

        <div class="informacao-pagina">
            <div style="width:30%; margin-left:auto; margin-right:auto;">
                <form action="{{route('produto.store')}}" method="post">
                    @csrf
                    <input type="text" name="nome" value="" placeholder="Nome" class="borda-preta">
                    <div style="color:red;">
                        @error('nome')
                            {{$message}}
                        @enderror   
                    </div>

                    <input type="text" name="descricao" placeholder="Descricao" value="" class="borda-preta">
                    <div style="color:red;">
                        @error('descricao')
                            {{$message}}
                        @enderror   
                    </div>
                    
                    <input type="text" name="peso" placeholder="Peso" value="" class="borda-preta">
                    <div style="color:red;">
                        @error('peso')
                            {{$message}}
                        @enderror   
                    </div>
                    
                    <select name="unidade_id">
                        <option>-- Selecione a unidade de medida --</option>
            
                        @foreach ($unidades as $unidade)
                            <option value="{{$unidade->id}}">{{$unidade->descricao}}</option>                
                        @endforeach
                    </select>
                    <div style="color:red;">
                        @error('unidade_id')
                            {{$message}}
                        @enderror   
                    </div>
                        
                    <button type="submit" class="borda-preta">Cadastrar</button>
                </form>
            </div>
        </div>
    </div>

@endsection