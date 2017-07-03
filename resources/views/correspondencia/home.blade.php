<!doctype html>
<html lang="{{ config('app.locale') }}">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<title>Correspondencia</title>

		<!-- Fonts -->
		<link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

		<!-- Styles -->
		<link href="{{ asset('/css/bootstrap.min.css') }}" rel="stylesheet">
		<link href="{{ asset('/css/estilo.css') }}" rel="stylesheet">
		<link href="{{ asset('/css/font-awesome.min.css') }}" rel="stylesheet">
		<link href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.5/sweetalert2.min.css" rel="stylesheet">
		<style>

		</style>
	</head>
	<body>
		<div class="flex-center position-ref full-height">

		@if(session('status'))
			<div class="alert alert-info">
				<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
				{{ session('status') }}
			</div>
		@endif

			<div class="content">
				<div class="title m-b-md">
					Correspondencia
				</div>
				<table class="table table-striped table-bordered table-hover" id="table-consulta">
					<thead>
						<tr>
							<th>Nombre</th>
							<th>Opciones</th>
						</tr>
					</thead>
					<tbody>
						@foreach($correspondencias as $correspondenciaLista)
						<tr>
							<td>{{$correspondenciaLista->valor}}</td>
							<td>
								<a class="btn btn-small btn-info" href="{{ URL::to('correspondenciaEdit/' . $correspondenciaLista->id) }}"><i class="fa fa-pencil-square-o"></i></a>
								{!! Form::open(array('url' => 'correspondenciaDelete/' . $correspondenciaLista->id,'id'=>'formEliminarcorrespondencia'.$correspondenciaLista->id)) !!}
									{!! Form::hidden('_method', 'DELETE') !!}
									<button type="button" role="button" class="btn btn-small btn-danger botonEliminarcorrespondencia" target="#formEliminarcorrespondencia{{$correspondenciaLista->id}}"><i class="fa fa-times"></i></button>
								{!! Form::close() !!}
							</td>
						</tr>
						@endforeach
					</tbody>
				</table>
			</div>

			<div class="container">
				<div class="row">
					<div class="col-md-8 col-md-offset-3">
						<div class="panel panel-default">
							<div class="panel-heading">
								<h3 class="panel-title">Nueva correpodencia</h3>
							</div>
							<div class="panel-body">
								@if(isset($correspondencia))
								{!! Form::model($correspondencia, [
									'method' => 'PUT',
									'route' => ['correspondenciaUpdate', $correspondencia->id]
									]) !!}
								@else
								{!! Form::open(array('url' => 'correspondenciaStore','id'=>'avisosForm')) !!}
								@endif
								<fieldset>

									<div class="form-group">
										{!! Form::label('Valor', 'Valor:') !!}
										{!! Form::text('valor', null, ['placeholder' => 'Valor', 'class' => 'form-control', 'required' => 'required'])!!}
									</div>
									<div class="form-group">
										{!! Form::submit('Guardar', ['class' => 'btn btn-lg btn-primary btn-block']) !!}
									</div>
								</fieldset>
								{!! Form::close() !!}
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<script type="text/javascript" src="{{ URL::asset('js/jquery.min.js') }}"></script>
		<script src="https://npmcdn.com/tether@1.2.4/dist/js/tether.min.js"></script>
		<script type="text/javascript" src="{{ URL::asset('js/bootstrap.min.js') }}"></script>
		<script src="https://npmcdn.com/tether@1.2.4/dist/js/tether.min.js"></script>
		<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.5/sweetalert2.min.js"></script>

		<script type="text/javascript">
			$(".botonEliminarcorrespondencia").click(function ()
				{
					
					target = $(this).attr("target");
					console.log(target);
					swal({
						title: "Eliminar aviso",
						text: "¿Está seguro de eliminar este registro?",
						type: "warning",
						showCancelButton: true,
						confirmButtonColor: "#DD6B55",
						confirmButtonText: "Sí, eliminar!",
						cancelButtonText: "Cancelar"
					}).then(function () {
							$(target).submit();
						}).catch(swal.noop);;




				});
		</script>
	</body>
</html>
