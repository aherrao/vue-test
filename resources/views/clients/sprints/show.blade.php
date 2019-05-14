@extends('layouts.index')

@section('content')
	<sprint-show :prop_sprint="{{ $objSprint }}" :prop_project_options="{{ $arrProjectOptions }}"></sprint-show>
@endsection
