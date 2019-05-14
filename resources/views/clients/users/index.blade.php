@extends('layouts.index')

@section('content')
	<user-index :prop_users="{{ $jsonUsers }}"></user-index>
@endsection
