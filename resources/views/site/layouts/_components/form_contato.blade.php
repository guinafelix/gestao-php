<form action={{ route('site.contato') }} method="POST">
    @csrf
    <input type="nome" placeholder="Nome" class="{{ $classe }}">
    <br>
    <input type="telefone" placeholder="Telefone" class="{{ $classe }}">
    <br>
    <input type="email" placeholder="E-mail" class="{{ $classe }}">
    <br>
    <select name="motivo_contato" class="{{ $classe }}">
        <option value="">Qual o motivo do contato?</option>
        <option value="1">Dúvida</option>
        <option value="2">Elogio</option>
        <option value="3">Reclamação</option>
    </select>
    <br>
    <textarea name="mensage" class="{{ $classe }}">Preencha aqui a sua mensagem</textarea>
    <br>
    <button type="submit" class="{{ $classe }}">ENVIAR</button>
</form>
