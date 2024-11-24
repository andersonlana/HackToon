@extends('layouts.main')

@section('title',  'Criar Agendamento')

@section('content')

<div id="tarefa-create-container" class="col-md-6 offset-md-3">
   <h2 class="text-center">Agendamento</h2>   

   <form action="/salvar-agendamento" method="POST" >
      @csrf
      <input type="hidden" name="IdServico" value="{{$servico->IdServicos}}"  >
      <div class="container-agendamento">
         <div class="row">

            <h3 class="text-center mb-4">{{$servico->NomeServico}}</h3>
            <p>{{$servico->Descricao}}</p>

            <div class="form-group spacing col-6">
               
               <label for="estado" class="mt-2">Estado</label>
               <select class="form-control mt-2" id="estado" name="estado" required>
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
               <label for="customer-email" class="mt-2">Cidade</label>
               <input type="text" class="form-control mt-2" id="customer-email" name="customer-email" required>
            </div>
         </div>
         <div class="form-group spacing">
            <label for="description" class="mt-2">Data e Hora:</label>
            <input type="datetime-local" class="form-control mt-2" name="calendario" >
         </div>
         <div class="form-group spacing">
            <label for="servico" class="mt-2">Profissional:</label>
            <select name="IdProfissionais" id="IdProfissionais" class="form-control mt-2">
               <option value="" disabled selected>Selecione um Profissional</option>
               @foreach($usuarios as $usuario)
               <option value="{{ $usuario->id }}">{{ $usuario->name }}</option>
               @endforeach
            </select>
         </div>
         <div class="form-group input-cadastro mx-auto">
         <label class="label-cadastro" for="telefone">Telefone</label>
         <input type="text" class="form-control mascara-telefone" name="telefone"
         minlenght="10" maxlenght="11">
      </div>
         <div class="form-group spacing input-agendamento">
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
            option.textContent = usuario.nome;
            profissionaisSelect.appendChild(option);
        });
    })
    .catch(error => {
        console.error('Erro ao buscar usuários:', error);
    });
});

</script>
@endsection