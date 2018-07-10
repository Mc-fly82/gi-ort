@extends('layouts.app')

@section('content')
	<div class="container-fluid">
		<div class="row">
			<div class="col-12">
				<div class="card-body list-intro">
					<div class="d-flex align-items-center">
						<h3><i class="fas fa-check"></i> Vos tickets:</h3>
						<div class="ml-auto">
							{{ Form::open( ['method' => 'GET']) }}
								<div class="align-items-center d-flex flex-row justify-content-end">
									<span class="mr-3">catégories:</span>
									<select name="category" class="form-control mr-3 px-3 form-control-sm">
										<option value="0">Toutes</option>
										@foreach($categories as $category)
											<option {{request()->get('category') == $category->id ? 'selected' : ''}} 
												value="{{$category->id}}">{{$category->name}}</option>
										@endforeach
									</select>
									<span class="mr-3">status:</span> 
									<select name="status" class="form-control mr-3 form-control-sm">
										<option value="0">Tous</option>
										@foreach($tickets_status as $value)
											<option {{request()->get('status') == $value ? 'selected' : ''}} 
												value="{{$value}}">{{str_replace('_',' ',$value)}}</option>	
										@endforeach
									</select>
									<span class="mr-3">priority:</span>
									<select name="category" class="form-control mr-3 form-control-sm">
										<option value="0">Toutes</option>
										@foreach($categories as $category)
											<option value="{{$category->id}}">{{$category->name}}</option>
										@endforeach
									</select>
									<input type="submit" value="Filtre" class="btn btn-success ">
								</div>
							{{ Form::close()}}
						</div>
					</div>
				</div>
			</div>
			<div class="container-fluid">
				<div class="row align-self-stretch justify-content-md-center">
					<div class="col-md-12">
						<div class="listing-tickets mt-3">
							<table class="table table-striped">
								<thead>
								<tr>
									<th scope="col">Titre du ticket</th>
									<th scope="col">Catégorie</th>
									<th scope="col">Ouvert par</th>
									<th scope="col">Priorité</th>
									<th scope="col">Statut</th>
									<th scope="col">Type</th>
									<th scope="col">Date de création</th>
									<th scope="col">Action</th>
								</tr>
								</thead>
								<tbody>
								@foreach($tickets as $ticket)

									<tr class="ticket" data-content="{{$ticket->description}}">
										<td>
											<span><strong>{{$ticket->objet}} : </strong></span>
											<small>{{str_limit($ticket->description,100,'...')}}</small>
										</td>
										<td>{{$ticket->category->name}}</td>
										<td>{{$ticket->user->name}}</td>
										<td class="text-priority-{{$ticket->priority}}">{{$ticket->priority}}</td>
										<td class="text-status-{{$ticket->status}}"></td>
										<td>{{$ticket->type}}</td>
										<td>{{$ticket->created_at}}</td>
										<td><a href="{{route('tickets.show', ['ticket' => $ticket])}}">voir</a></td>
									</tr>
								@endforeach

								</tbody>
							</table>
						</div>
						{{--{{$tickets->links()}}--}}
					</div>
				</div>
			</div>
		</div>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

		<script>
			
		$(document).ready(function(){
			$(".text-status-ouvert").html('<i style=" color: green;" class="fas fa-battery-empty"></i>&nbsp;ouvert');
			$(".text-status-fermé").html('<i style=" color: red;" class="fas fa-battery-full"></i>&nbsp;fermé');
			$(".text-status-en_cours").html('<i style=" color: orange;" class="fas fa-battery-half"></i>&nbsp;en cours');
			$(".text-priority-urgent").html('urgent&nbsp;<i style=" color: red;" class="fas fa-exclamation"></i> ');
		});
		</script>
	</div>@endsection
