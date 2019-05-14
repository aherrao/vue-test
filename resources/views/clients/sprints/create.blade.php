@extends('layouts.index')

@section('content')
	<sprint-create :prop_sprint="{{ $objSprint }}" :prop_project_options="{{ $arrProjectOptions }}"></sprint-create>
@endsection
