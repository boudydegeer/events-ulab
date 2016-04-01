@extends('layouts.app')

@section('content')
	<div class="container">
		<div class="row">
			<div class="col-md-10 col-md-offset-1">
				<div class="panel panel-default">
					<div class="panel-heading">Bienvenido!</div>

					<div class="panel-body">
						Actualmente hay {{ $events->count() }} evento disponibles.

						<ul>
							@foreach($events as $event)
								<li><a href="{{ url('/', [$event->slug]) }}">{{$event->title}}</a></li>
							@endforeach
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection
