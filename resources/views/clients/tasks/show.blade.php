@extends('layouts.index')

@section('content')
	<task-show :prop_task="{{ $objTask }}" :prop_options="{{ $options }}"></task-show>
@endsection
