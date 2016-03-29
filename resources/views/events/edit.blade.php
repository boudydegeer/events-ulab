@extends('layouts.app')

@section('content')
	<div class="container">
		<div class="row">
			<div class="col-md-10 col-md-offset-1">
				<div class="panel panel-default">
					<div class="panel-heading">Update event <strong>{{$event->title}}</strong></div>

					<div class="panel-body">
						<div class="alert alert-info">
							<p>Here you can edit your event!</p>
						</div>

						@if(count($errors) > 0)
							<div class="alert alert-danger">
								@foreach($errors->all() as $error)
									<li>{{$error}}</li>
								@endforeach
							</div>
						@endif


						{!! Form::open(['route' => ['events.update', $event->id], 'method' => 'put']) !!}

						<div class="form-group">
							{{ Form::label('title', 'Title', ['class' => 'control-label']) }}
							{{ Form::text('title', $event->title, array_merge(['class' => 'form-control'], [])) }}
						</div>

						<div class="form-group">
							{{ Form::label('description', 'Description', ['class' => 'control-label']) }}
							{{ Form::textarea('description', $event->description, array_merge(['class' => 'form-control'], [])) }}
						</div>

						<fieldset>
							<legend>Tickets</legend>

							@foreach($event->tickets as $ticket)
								<div class="form-group">
									{{ Form::label('tickets[$ticket->id][amount]', 'Amount', ['class' => 'control-label']) }}
									{{ Form::number('tickets[$ticket->id][amount]', $event->count()?:null , array_merge(['class' => 'form-control'], [])) }}
								</div>

								<div class="form-group">
									{{ Form::label('tickets[$ticket->id][price]', 'Price (in €)', ['class' => 'control-label']) }}
									{{ Form::number('tickets[$ticket->id][price]', $event->count()?:null , array_merge(['class' => 'form-control'], [])) }}
								</div>

								<div class="form-group">
									{{ Form::label('tickets[$ticket->id][discount]', 'Discount (in %)', ['class' => 'control-label']) }}
									{{ Form::number('tickets[$ticket->id][discount]', $event->count()?:null , array_merge(['class' => 'form-control'], [])) }}
								</div>

								<div class="form-group">
									{{ Form::label('tickets[$ticket->id][code]', 'Code', ['class' => 'control-label']) }}
									{{ Form::text('tickets[$ticket->id][code]', $event->count()?:null , array_merge(['class' => 'form-control'], [])) }}
								</div>
							@endforeach
						</fieldset>

						<div class="form-group">
							{{ Form::submit('Submit', ['class' => 'pull-right btn btn-info']) }}
						</div>

						{!! Form::close() !!}
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection
