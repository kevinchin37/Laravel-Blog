@extends('admin.layouts.master')

@section('header_title', 'Create')

@section('main_content')
	<div class="row post-edit-wrapper">
		<div class="col-md-12">
			<form action="/admin/roles" method="POST">
				@csrf
				<div class="form-group">
					<label for="role-name">Name</label>
					<input id="role-name" class="form-control w-25" type="text" name="name" placeholder="Editor" />
				</div>

				<label>Permissions</label>
				<div class="form-group">
					@foreach ($permissions as $permission)
						<div class="form-check form-check-inline">
							<div class="form-check-input">
								<input type="checkbox" name="permissions[]" value="{{ $permission->id }}" id="{{ $permission->action }}"/>
								<label class="form-check-label" for="{{ $permission->action }}">
									{{ $permission->action }}
								</label>
							</div>
						</div>
					@endforeach
				</div>

				<div class="form-group">
					<button type="submit" class="btn btn-primary mt-3">Create</button>
				</div>
			</form>
		</div>
	</div>
@endsection
