@component('adminlte::layouts.app')

	<div class="content">
		@include('flash::message')

	@component('components.box')
		@slot('boxTitle')
		Usuarios <a href="{{ url("/admin/user/create") }}" ><button class="btn btn-success btn-sm">Nuevo</button></a>
		@endslot

		{!! $dataTable->table(['width' => '100%']) !!}

	@endcomponent
	</div>


	@push('scripts')
	<script src="/vendor/datatables/buttons.server-side.js"></script>
	{!! $dataTable->scripts() !!}
	@endpush

@endcomponent