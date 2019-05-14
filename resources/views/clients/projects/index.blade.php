@extends('layouts.index')

@section('content')
	<project-index :prop_projects="{{ $jsonProjects }}"></project-index>
@endsection
