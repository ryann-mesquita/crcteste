{{-- @include('admin.includes.alerts')
 --}}

<div class="form-group col-md-5">
    <label>Nome:</label>
    <input type="text" name="name" id="name" class="form-control input-sm" placeholder="Nome:" value="{{ $user->name ?? old('name') }}">
</div>
<div class="form-group col-md-5">
    <label>Telefone:</label>
    <input type="text" name="telefone" id="telefone" class="form-control input-sm" placeholder="(00) 0 0000 0000" value="{{ $user->telefone ?? old('telefone') }}">
</div>
<div class="form-group col-md-5">
    <label>Data:</label>
    <input type="date" name="data" id="data" class="form-control input-sm" placeholder="Telefone:" value="{{ $user->data ?? old('data') }}">
</div>
<div class="form-group col-md-5">
    <label>E-mail:</label>
    <input type="text" name="email" id="email" class="form-control input-sm" placeholder="email:" value="{{ $user->email ?? old('email') }}">
</div>
<div class="form-group col-md-5">
    <label>CPF ou CNPJ</label>
    <input type="text" name="cpfcnpj" id="cpfcnpj" class="form-control input-sm" placeholder="CPF ou CNPJ:" value="{{ $user->cpfcnpj ?? old('cpfcnpj') }}">
</div>
<div class="form-group col-md-10">
    <label>Mensagem</label>
    <textarea class="form-control" id="mensagem" name="mensagem" id="mensagem" rows="3"></textarea>
  </div>
<div class="form-group col-md-4">
    <button type="submit" class="btn btn-dark">Cadastrar</button>
</div>