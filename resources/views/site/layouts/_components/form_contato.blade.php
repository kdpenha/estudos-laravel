<form action="{{route('site.contato')}}" method="post">
    @csrf
    <input name="nome" type="text" placeholder="Nome" class="{{$borda}}" value="{{old('nome')}}">
    <br>
    <input name="telefone" type="text" placeholder="Telefone" class="{{$borda}}" value="{{old('telefone')}}">
    <br>
    <input name="email" type="text" placeholder="E-mail" class="{{$borda}}" value="{{old('email')}}">
    <br>
    <select name="motivo_contato" class="{{$borda}}">
        <option value="">Qual o motivo do contato?</option>
        <option value="1">Dúvida</option>
        <option value="2">Elogio</option>
        <option value="3">Reclamação</option>
    </select>
    <br>
    <textarea name="mensagem" class="{{$borda}}">{{(old('mensagem') != '') ? old('mensagem') : 'Preencha aqui sua mensagem.'}}
    </textarea>
    <br>
    <button type="submit" class="borda-preta">ENVIAR</button>
    {{$slot}}
</form>

<div style="width:100%; background:red;">
    <pre>
        {{print_r($errors)}}
    </pre>
</div>
