@props(['listing'])

    <div class="bg-gray-50 border border-gray-200 rounded-xl p-4 shadow-lg">
        <div class="flex">
            <img
                class="hidden w-40 mr-6 md:block"
                src="{{$listing->logo ? asset('storage/'.$listing->logo):asset('images/logo.png')}}"
                alt="job logo"
            />
            <div>
                <h3 class="text-2xl">
                    <a href="/listings/{{$listing->id}}">{{$listing->title}}</a>
                </h3>
                <div class="text-xl font-bold mb-4">{{$listing->company}}</div>
                <x-listing-tags :tags-csv="$listing->tags" />
                <div class="text-xs mt-4">
                    <i class="fa-solid fa-location-dot"> {{$listing->location}}</i>
                </div>
            </div>
        </div>
    </div>
