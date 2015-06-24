@extends('app')
 
@section('content')
    <h2>Area</h2>
     @if ( !$AZArea->count() )
        You have no projects
    @else
        <ul>
            @foreach( $AZArea as $project )
                <li><a href="{{ route('AZArea.show', $project->id) }}">{{ $project->name }}</a></li>
            @endforeach
        </ul>
    @endif
@endsection

