<form action="{{route('site.contato')}}" method="post">
    @csrf
    <input name="nome" type="text" placeholder="Nome" class="{{$borda}}" value="{{old('nome')}}">
    <br>
    <input name="telefone" type="text" placeholder="Telefone" class="{{$borda}}" value="{{old('telefone')}}">
    <br>
    <input name="email" type="text" placeholder="E-mail" class="{{$borda}}" value="{{old('email')}}">
    <br>
    <select name="motivo_contato_id" class="{{$borda}}">
        <option value="">Qual o motivo do contato?</option>
        @foreach ($motivo_contatos as $chave => $motivo)
            <option value="{{$motivo->id}}" {{old('motivo_contato_id') == $motivo->id ? 'selected' : ''}}>{{$motivo->motivo_contato}}</option>
        @endforeach

        {{--
        <option value="1" {{old('motivo_contato') == 1 ? 'selected' : ''}}>Dúvida</option>
        <option value="2" {{old('motivo_contato') == 2 ? 'selected' : ''}}>Elogio</option>
        <option value="3" {{old('motivo_contato') == 3 ? 'selected' : ''}}>Reclamação</option>
        --}}
    </select>
    <br>
    <textarea name="mensagem" class="{{$borda}}">{{(old('mensagem') != '') ? old('mensagem') : 'Preencha aqui sua mensagem.'}}
    </textarea>
    <br>
    <button type="submit" class="borda-preta">ENVIAR</button>
    {{$slot}}
</form>
@if($errors->any())
    <div style="width:100%; background:red;">
        @foreach($errors->all() as $erro)
            {{$erro}}
        @endforeach
    </div>
@endif
