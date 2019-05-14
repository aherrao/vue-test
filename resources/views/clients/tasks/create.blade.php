@extends('layouts.index')

@section('content')
	<task-create :prop_task="{{ $objTask }}" :prop_options="{{ $options }}"></task-create>
@endsection
