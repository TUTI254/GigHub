@extends('layout')

@section('content')
@include('partials._hero')
@include('partials._search')

    <div class="lg:grid lg:grid-cols-2 gap-4 space-y-4 md:space-y-1 mx-4 ">
        {{-- if there are no listings, display a message --}}
        @if(count($listings) == 0)
            <p>No Gigs Found!</p>
        @endif
        {{-- if there are listings, display them --}}
        @foreach($listings as $listing)
            <x-listing-card :listing="$listing" />
        @endforeach
        <div class="mt-6 p-4">{{$listings->links()}}</div>
    </div>

@endsection
