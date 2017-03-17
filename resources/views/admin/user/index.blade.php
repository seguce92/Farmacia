@component('adminlte::layouts.app')


	@component('components.box')
		@slot('boxTitle')
		Administración de Usuarios <a href="{{ url("/admin/user/create") }}" ><button class="btn btn-success btn-sm">Nuevo</button></a>
		@endslot

		<div class="table-responsive">

			{!! $dataTable->table() !!}
		</div>

	@endcomponent



	@push('scripts')
	<script src="/vendor/datatables/buttons.server-side.js"></script>
	{!! $dataTable->scripts() !!}
	@endpush

@endcomponent