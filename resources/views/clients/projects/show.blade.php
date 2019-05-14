@extends('layouts.index')

@section('content')
	<project-show :prop_project="{{ $objProject }}" :prop_user_options="{{ $arrUserOptions }}"></project-show>
@endsection
