@extends('layouts.app')

@section('content')
	<div class="container">
		<div class="row">
			<div class="col-md-10 col-md-offset-1">
				<div class="panel panel-default">
					<div class="panel-heading">Create a new event</div>

					<div class="panel-body">
						<div class="alert alert-info">
							<p>Here you can create your event!</p>
						</div>

						{!! Form::open(['route' => 'events.store']) !!}
							<div class="form-group">
								{{ Form::label('title', null, ['class' => 'control-label']) }}
								{{ Form::text('title', null, array_merge(['class' => 'form-control'], [])) }}
							</div>
							<div class="form-group">
								{{ Form::label('description', null, ['class' => 'control-label']) }}
								{{ Form::textarea('description', null, array_merge(['class' => 'form-control'], [])) }}
							</div>

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
