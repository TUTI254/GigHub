<h1>{{$heading}}</h1>
{{-- if there are no listings, display a message --}}
@if(count($listings) == 0)
    <p>No Gigs Found!</p>
@endif
{{-- if there are listings, display them --}}
    @foreach($listings as $listing)
        <a href="/listings/{{$listing['id']}}">{{$listing['title']}}</a>
        <p>{{$listing['description']}}</p>
    @endforeach

