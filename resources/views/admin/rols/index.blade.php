@component('adminlte::layouts.app')


		@component('components.box')
			@slot('boxTitle')
				Roles de usuario <a href="{{ url("/admin/rols/create") }}" ><button class="btn btn-success btn-sm">Nuevo</button></a>
			@endslot

			@include('admin.rols.table')
		@endcomponent

		@component('components.modal_delete')
				@slot('modalTitle','Eliminar rol')

				Seguro que desea eliminar el rol
		@endcomponent


@endcomponent