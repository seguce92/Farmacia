@extends("adminlte::layouts.app")


@section("content")
	<div class="row">
	<div class="col-md-12">
	<div class="box">
	<div class="box-header with-border">
	<h3 class="box-title">
		<strong>
			Administración de Usuarios <a href="{{ url("/admin/user/create") }}" ><button class="btn btn-success btn-sm">Nuevo</button></a>
		</strong>
	</h3>
	<div class="box-tools pull-right">
	<button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>

	<button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
	</div>
	</div>
	<!-- /.box-header -->
	<div class="box-body">
	<div class="row">
	<div class="col-md-12">
		<table class="table table-condensed table-hover table-bordered" id="myTable">
			<thead>
			<tr>
				<th>Id</th>
				<th>Nombre</th>
				<th>Usuario</th>
				<th>Email</th>
				<th width="10%">Operación</th>
			</tr>
			</thead>
			<tbody>
			@foreach($users as $user)
				<tr>
					<td>{{$user->id}}</td>
					<td>{{$user->name}}</td>
					<td>{{$user->username}}</td>
					<td>{{$user->email}}</td>
					<td>
						<a href="{{ action('AdminUserControler@edit',$user->id) }}" class="btn btn-xs btn-info">
							<span class="glyphicon glyphicon-edit" data-toggle="tooltip" title="Editar"></span>
						</a>

						<a href="{{ action('AdminUserControler@menu',$user->id) }}" class="btn btn-xs btn-default">
							<span class="glyphicon glyphicon-list-alt" data-toggle="tooltip" title="Menu"></span>
						</a>

						<a data-toggle="modal" href="#modal-delete" data-action="{{action('AdminUserControler@destroy',["id" => $user->id])}}" class="btn btn-xs btn-danger btn-delete">
							<span class="glyphicon glyphicon-remove" data-toggle="tooltip" title="Eliminar"></span>
						</a>
					</td>
				</tr>
			@endforeach
			</tbody>
		</table>
	</div>
	</div>
	</div>
	</div><!-- /.row -->
	</div><!-- /.box-body -->
	</div><!-- /.box -->

@stop
@push("scripts")
	<script>
		$(function(){
			$('#myTable').DataTable();

			$(".btn-delete").click(function () {
				var  acction =$(this).data("action");
				console.log("El formulario tomara el valor de "+acction);
				$("#form-delete").attr("action",acction);
			})
		});
	</script>
@endpush
