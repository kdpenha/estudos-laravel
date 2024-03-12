@extends('app.layouts.basico')

@section('titulo', 'Pedido Produto')
        
@section('conteudo')
    
    <div class="conteudo-pagina">
        <div class="titulo-pagina-2">
            <p>Adicionar produtos ao pedido</p>
        </div>

        <div class="menu">
            <ul>
                <li><a href="{{route('pedido.index')}}">Voltar</a></li>
                <li><a href="">Consulta</a></li>
            </ul>
        </div>

        <div class="informacao-pagina">

            <h4>Detalhes do pedido</h4>
            <p>ID do pedido: {{$pedido->id}}</p>
            <p>CLIENTE: {{$pedido->cliente_id}}</p>

            <div style="width:90%; margin-left:auto; margin-right:auto;">
                
                <h4>Itens do pedido</h4>
                <table border="1" width="100%">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nome</th>
                            <th>Data de inclusao do item no pedido</th>
                        </tr>
                    </thead>
                    
                    <tbody>
                        @foreach ($produtos as $produto)
                        <tr>
                            <td>{{$produto->id}}</td>
                            <td>{{$produto->nome}}</td>
                            <td>{{$produto->created_at->format('d/m/Y')}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

                {{$pedido}}
                @component('app.pedido_produto._components.form_create', ['pedido' => $pedido, 'produtos' => $produtos])
                @endcomponent
            </div>
        </div>
    </div>

@endsection