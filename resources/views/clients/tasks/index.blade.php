@extends('layouts.index')

@section('content')
	<task-index :prop_paginate_tasks="{{ $jsonTasks }}" :prop_options="{{ $options }}"></task-index>
@endsection
