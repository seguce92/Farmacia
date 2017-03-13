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
		<table class="table table-condensed table-hover" id="myTable">
			<thead>
			<tr>
				<th>Id</th>
				<th>Nombre</th>
				<th>Usuario</th>
				<th>Email</th>
				<th>Operación</th>
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
							Editar
						</a>

						<a href="{{ action('AdminUserControler@menu',$user->id) }}" class="btn btn-xs btn-info">
							Menu
						</a>

						<a data-toggle="modal" href="#modal-delete" data-action="{{action('AdminUserControler@destroy',["id" => $user->id])}}" class="btn btn-xs btn-danger btn-delete">
							Eliminar
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


	<div class="modal fade" id="modal-delete">
		<form action="" method="post" role="form" id="form-delete" >
			{{ csrf_field() }}
			{{method_field('DELETE')}}
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						<h4 class="modal-title">Eliminar usuario</h4>
					</div>
					<div class="modal-body">
						Seguro que desea eliminar?
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">No</button>
						<button type="submit" class="btn btn-primary">Si</button>
					</div>
				</div><!-- /.modal-content -->
			</div><!-- /.modal-dialog -->
		</form>
	</div><!-- /.modal -->
@stop
@push("scripts")
	<script>
		$(function(){
			//$('#myTable').DataTable();

			$(".btn-delete").click(function () {
				var  acction =$(this).data("action");
				console.log("El formulario tomara el valor de "+acction);
				$("#form-delete").attr("action",acction);
			})
		});
	</script>
@endpush
