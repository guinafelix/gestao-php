<form action={{ route('site.contato') }} method="POST">
    @csrf
    <input type="nome" placeholder="Nome" class="borda-preta">
    <br>
    <input type="telefone" placeholder="Telefone" class="borda-preta">
    <br>
    <input type="email" placeholder="E-mail" class="borda-preta">
    <br>
    <select name="motivo_contato" class="borda-preta">
        <option value="">Qual o motivo do contato?</option>
        <option value="1">Dúvida</option>
        <option value="2">Elogio</option>
        <option value="3">Reclamação</option>
    </select>
    <br>
    <textarea name="mensage" class="borda-preta">Preencha aqui a sua mensagem</textarea>
    <br>
    <button type="submit" class="borda-preta">ENVIAR</button>
</form>
