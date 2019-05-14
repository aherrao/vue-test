@extends('layouts.index')

@section('content')
	<sprint-index :prop_sprints="{{ $jsonSprints }}"></sprint-index>
@endsection
