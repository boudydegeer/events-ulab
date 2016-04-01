@extends('layouts.app')

@section('title', $event->title)

@section('navbar')
	@parent
@endsection

@section('content')
	<div class="container">
		<div class="row">
			<div class="col-md-10 col-md-offset-1">
				<div class="panel panel-default">
					<div class="panel-heading">{{ $event->title }}</div>

					<div class="panel-body">
						@if (session('status'))
							<div class="row">
								<div class="col-sm-6 col-sm-offset-3">
									<div class="alert alert-success">
										Gracias, ya tienes tu sitio reservado, te hemos enviado un email con los datos de la reserva.
									</div>
								</div>
							</div>

						@else


							<div class="row">
								<div class="col-sm-8 col-sm-offset-2">
									@include('common.forms.errors')
								</div>
							</div>

							{!! Form::open(['route' => ['events.tickets.payments', $event->slug, $event->tickets()->first()->id]]) !!}
							<fieldset class="col-sm-8 col-sm-offset-2">
								<legend>Datos personales</legend>
								<div class="form-group row">
									<div class="col-sm-6">
										{{ Form::label('name', 'Nombre', ['class' => 'control-label']) }}
										{{ Form::text('name', old('name'), array_merge(['class' => 'form-control'], [])) }}
									</div>
									<div class="col-sm-6">
										{{ Form::label('lastname', 'Apellidos', ['class' => 'control-label']) }}
										{{ Form::text('lastname', old('lastname'), array_merge(['class' => 'form-control'], [])) }}
									</div>
								</div>

								<div class="form-group row">
									<div class="col-sm-6">
										{{ Form::label('email', 'Email', ['class' => 'control-label']) }}
										{{ Form::email('email', old('email'), array_merge(['class' => 'form-control'], [])) }}
									</div>

									<div class="col-sm-6">
										{{ Form::label('phone', 'Telefono', ['class' => 'control-label']) }}
										{{ Form::text('phone', old('phone'), array_merge(['class' => 'form-control'], [])) }}
									</div>
								</div>
							</fieldset>
							<fieldset class="col-sm-8 col-sm-offset-2">
								<legend>Forma de pago</legend>
								<credit-card
									:number="{{old('card')}}"
									:month="{{old('month')}}"
									:year="{{old('year')}}"
									:cvc="{{old('cvc')}}"
								>
								</credit-card>
							</fieldset>

							<fieldset class="col-sm-8 col-sm-offset-2">
								<legend>Cupón</legend>
								<discount-coupon :when-applied="applyDiscount"></discount-coupon>
							</fieldset>

							<fieldset class="col-sm-8 col-sm-offset-2">
								<legend>Datos de pago</legend>
								<div class="form-group row">
									<div class="col-sm-12">
										<price-table
											:ticket="{{$event->ticket()}}"
											:event="{{$event}}"
											:coupon="coupon"
										>
										</price-table>
									</div>
								</div>
							</fieldset>
							<fieldset class="col-sm-8 col-sm-offset-2">
								<div class="form-group">
									<button type="submit"
									        class="pull-right btn"
									        v-bind:class="{ 'disabled' : !isValid , 'btn-info' : isValid }"
									        :disabled="!isValid"
									>
										Pagar ahora y reservar mi plaza
									</button>
								</div>
							</fieldset>
							{!! Form::close() !!}
						@endif
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection
