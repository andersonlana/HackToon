@extends('layouts.main')

@section('title',  'Criar Agendamento')

@section('content')

<div id="tarefa-create-container" class="col-md-6 offset-md-3">
   <h3 class="text-center titulo-agendamento">Faça seu agendamento</h3>   

   <form action="/salvar-agendamento" method="POST" >
      @csrf
      <input type="hidden" name="IdServico" value="{{$servico->IdServicos}}"  >
      <div class="container-agendamento">
         <div class="row">

            <h3 class="text-center mb-4">{{$servico->NomeServico}}</h3>
            <p>{{$servico->Descricao}}</p>

            <div class="form-group spacing col-6">
               
               <label for="estado" class="label-agendamento">Estado</label>
               <select class="form-control" id="estado" name="estado" required>
                  <option value="" disabled selected>Selecione seu estado</option>
                  <option value="AC">Acre (AC)</option>
                  <option value="AL">Alagoas (AL)</option>
                  <option value="AP">Amapá (AP)</option>
                  <option value="AM">Amazonas (AM)</option>
                  <option value="BA">Bahia (BA)</option>
                  <option value="CE">Ceará (CE)</option>
                  <option value="DF">Distrito Federal (DF)</option>
                  <option value="ES">Espírito Santo (ES)</option>
                  <option value="GO">Goiás (GO)</option>
                  <option value="MA">Maranhão (MA)</option>
                  <option value="MT">Mato Grosso (MT)</option>
                  <option value="MS">Mato Grosso do Sul (MS)</option>
                  <option value="MG">Minas Gerais (MG)</option>
                  <option value="PA">Pará (PA)</option>
                  <option value="PB">Paraíba (PB)</option>
                  <option value="PR">Paraná (PR)</option>
                  <option value="PE">Pernambuco (PE)</option>
                  <option value="PI">Piauí (PI)</option>
                  <option value="RJ">Rio de Janeiro (RJ)</option>
                  <option value="RN">Rio Grande do Norte (RN)</option>
                  <option value="RS">Rio Grande do Sul (RS)</option>
                  <option value="RO">Rondônia (RO)</option>
                  <option value="RR">Roraima (RR)</option>
                  <option value="SC">Santa Catarina (SC)</option>
                  <option value="SP">São Paulo (SP)</option>
                  <option value="SE">Sergipe (SE)</option>
                  <option value="TO">Tocantins (TO)</option>
               </select>
            </div>
            <div class="form-group spacing col-6">
               <label for="customer-email" class="label-agendamento">Cidade</label>
               <input type="text" class="form-control" id="customer-email" name="customer-email" required>
            </div>
         </div>
         <div class="form-group spacing">
            <label for="description" class="label-agendamento">Data e Hora</label>
            <input type="datetime-local" class="form-control" name="calendario" >
         </div>
         <div class="form-group spacing">
            <label for="servico" class="label-agendamento">Profissional</label>
            <select name="IdProfissionais" id="IdProfissionais" class="form-control">
               <option value="" disabled selected>Selecione um Profissional</option>
               @foreach($usuarios as $usuario)
               <option value="{{ $usuario->id }}">{{ $usuario->name }} - R${{ $usuario->Preco }}</option>
               @endforeach
            </select>
         </div>
         <div class="form-group input-cadastro mx-auto">
         <label class="label-agendamento" for="telefone">Telefone</label>
         <input type="text" class="form-control mascara-telefone" name="telefone"
         minlenght="10" maxlenght="11">
      </div>
         <div class="form-group spacing div-agendamento">
            <input type="submit" class="btn btn-primary spacing bt-salvar" value="Agendar">
         </div>
   </form>
   </div>
</div>
<script>
   document.getElementById('estado').addEventListener('change', function () {
    const estado = this.value;

    // Limpa as opções atuais
    const profissionaisSelect = document.getElementById('IdProfissionais');
    profissionaisSelect.innerHTML = '<option value="" disabled selected>Selecione um Profissional</option>';

    // Faz a requisição AJAX para buscar os profissionais
    fetch(`/usuarios-por-estado/${estado}`, {
        method: 'GET',
        headers: {
            'Content-Type': 'application/json',
        }
    })
    .then(response => response.json())
    .then(data => {
        // Popula a lista de profissionais com os dados retornados
        data.forEach(usuario => {
            const option = document.createElement('option');
            option.value = usuario.id;
            option.textContent = `${usuario.nome} - R$${usuario.Preco}`;
            profissionaisSelect.appendChild(option);
        });
    })
    .catch(error => {
        console.error('Erro ao buscar usuários:', error);
    });
});

</script>
@endsection