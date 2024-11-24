@extends('layouts.main')

@section('title', 'HackToon')

@section('content')
<body>

<h2 class="text-center">Agende seu Serviço com <span id="profissional-name"></span></h2>

<div class="container-agendamento">
    
    <div class="form-group">
        <div class="section-title">Informações do Cliente</div>
        <label for="customer-name">Nome Completo</label>
        <input type="text" class="form-control" id="customer-name" name="customer-name" required>

        <label for="customer-phone" class="mt-3">Telefone</label>
        <input type="text" class="form-control" id="customer-phone" name="customer-phone" placeholder="(XX) XXXXX-XXXX" required>

        <label for="customer-email" class="mt-3">E-mail</label>
        <input type="email" class="form-control" id="customer-email" name="customer-email" required>
    </div>
    
    <div class="form-group">
        <div class="detalhes-servicos">Detalhes do Serviço</div>
        <label for="service">Serviço</label>
        <select class="form-control" id="service" name="service" required>
            <option value="consulta">Consulta</option>
            <option value="corte_de_cabelo">Corte de Cabelo</option>
            <option value="massagem">Massagem</option>
        </select>
    </div> 

    <div class="form-group">
        <div class="section-title">Escolha a Data e Hora</div>
        <label for="date">Data</label>
        <input type="date" class="form-control" id="date" name="date" required>

        <label for="time" class="mt-3">Hora</label>
        <input type="time" class="form-control" id="time" name="time" required>
    </div>

    <div class="form-group">
        <div class="section-title">Localização</div>
        <label for="location">Endereço do Profissional</label>
        <input type="text" class="form-control" id="location" name="location" placeholder="Endereço do profissional" required>
    </div>

    <button type="submit" class="btn btn-success btn-block mt-4">Agendar</button>
    
    <div class="footer">
        <p>&copy; 2024 Todos os direitos reservados</p>
    </div>
</div>
@endsection
