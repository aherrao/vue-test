@extends('layouts.index')

@section('content')
	<user-create :prop_user="{{ $objUser }}" :prop_user_options="{{ $arrUserOptions }}"></profile-create>
@endsection
