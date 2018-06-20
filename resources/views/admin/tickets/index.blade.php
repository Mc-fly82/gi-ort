@extends('layouts.app')

@section('content')
	<div class="container-fluid">
		<div class="row align-self-stretch justify-content-md-center">
			<div class="col-md-12 my-3">
				<div class="bg-light px-5 py-4">
					<div class="row">
						<div class="col-8">
							<h2>Gestion des tickets: </h2><small>Crééz, mettez à jour ou supprimez des tickets</small>
						</div>
						<div class=" col-1 ml-auto">
							<a class="px-2 btn btn-danger align-middle" href="{{route('admin.tickets.create')}}"> Créer un Ticket</a>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="row align-self-stretch justify-content-md-center">
			<div class="left-col col-md-2 my-4">
				<div class="bo-menu p-0 bg-light">
					<ul class="list-group list-group-flush">
					<li class="list-group-item py-4"><a href="{{route('admin.categories.index')}}">Gestion des Catégories</a></li>
						<li class="list-group-item py-4"><a href="{{route('admin.users.index')}}">Gestion des Utilisateurs</a></li>
						<li class="list-group-item py-4"><a href="{{route('admin.tickets.index')}}">Gestion des Tickets</a></li>
					</ul>
				</div>
			</div>
			<div class="right-col col col-md-10 my-4">
				<div class="p-0 bg-light">
					<table class="table table-striped">
						<thead>
						<tr>
							<th scope="col">Titre du ticket</th>
							<th scope="col">Catégorie</th>
							<th scope="col">Ouvert par</th>
							<th scope="col">Priorité</th>
							<th scope="col">Statut</th>
							<th scope="col">Action</th>
						</tr>
						</thead>
						<tbody>
						@foreach($tickets as $ticket)
							<tr>
								<td style="width: 60%">
									<span>{{$ticket->objet}} :
										<small>{{$ticket->description}}</small>
									</span>
								</td>
								<td>{{$ticket->category->name}}</td>
								<td>{{$ticket->user->name}}</td>
								<td>{{$ticket->priority}}</td>
								<td>{{$ticket->status}}</td>
								<td>
									<a href="{{route('admin.tickets.show', ['ticket' => $ticket])}}">voir</a>
									<a href="{{route('admin.tickets.edit', ['ticket' => $ticket])}}">editer</a>
								</td>
							</tr>
						@endforeach
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
@endSection