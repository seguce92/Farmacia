@component('adminlte::layouts.app')


		@component('components.box')
			@slot('boxTitle')
				Roles de usuario <a href="{{ url("/admin/rols/create") }}" ><button class="btn btn-success btn-sm">Nuevo</button></a>
			@endslot

			{{--@include('admin.rols.table')--}}
			{!! $dataTable->table() !!}

		@endcomponent



@push('scripts')
<script src="/vendor/datatables/buttons.server-side.js"></script>
{!! $dataTable->scripts() !!}
@endpush

@endcomponent