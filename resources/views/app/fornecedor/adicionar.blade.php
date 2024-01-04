@extends('app.layouts.basico')

@section('titulo', 'Fornecedor')
        
@section('conteudo')
    
    <div class="conteudo-pagina">
        <div class="titulo-pagina-2">
            <p>Fornecedor - Adicionar</p>
        </div>

        <div class="menu">
            <ul>
                <li><a href="{{route('app.fornecedor.adicionar')}}">Novo</a></li>
                <li><a href="{{route('app.fornecedor')}}">Consulta</a></li>
            </ul>
        </div>

        <div class="informacao-pagina">
            <div style="width:30%; margin-left:auto; margin-right:auto;">
                <form action="{{route('app.fornecedor.adicionar')}}" method="post">
                    @csrf
                    <input type="text" name="nome" value="{{$fornecedor->nome ?? old('nome')}}" placeholder="Nome" class="borda-preta">
                        <div style="color:red;">
                            @error('nome')
                            {{$message}}
                            @enderror
                        </div>
                    <input type="text" name="site" placeholder="Site" value="{{$fornecedor->site ?? old('site')}}" class="borda-preta">
                        <div style="color:red;">
                            @error('nome')
                            {{$message}}
                            @enderror
                        </div>
                    <input type="text" name="uf" placeholder="UF" value="{{$fornecedor->uf ?? old('uf')}}" class="borda-preta">
                        <div style="color:red;">
                            @error('nome')
                            {{$message}}
                            @enderror
                        </div>
                    <input type="text" name="email" placeholder="E-mail" value="{{$fornecedor->email ?? old('email')}}" class="borda-preta">
                        <div style="color:red;">
                            @error('nome')
                            {{$message}}
                            @enderror
                        </div>
                    <button type="submit" class="borda-preta">Cadastrar</button>
                </form>
                @if (isset($msg) && $msg != '')
                    <div style="color:green">
                        {{$msg}}
                    </div>                      
                @endif
            </div>
        </div>
    </div>

@endsection