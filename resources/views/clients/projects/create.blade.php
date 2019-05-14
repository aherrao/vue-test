@extends('layouts.index')

@section('content')
	<project-create :prop_project="{{ $objProject }}" :prop_user_options="{{ $arrUserOptions }}"></project-create>
@endsection
