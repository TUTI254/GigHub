@extends('layout')

@section('content')
@include('partials._search')

    <a href="/" class="inline-block text-black md:ml-8 ml-4 mb-4"><i class="fa-solid fa-arrow-left"></i> Back</a>
    <div class="md:w-3/4 w-full mx-auto">
        <div class="bg-gray-50 border border-gray-200 p-6 rounded-lg shadow-lg">
            <div class="flex justify-between items-center mb-3">
                <a
                    href="/listings/{{$listing->id}}/edit"
                    class="block bg-laravel text-gray-500  py-2 px-4 rounded-xl hover:opacity-80"
                    ><i class="fa-solid fa-pencil"></i>
                    Edit Gig</a
                >

                <form
                    method="POST"
                    action="/listings/{{$listing->id}}">
                    @csrf
                    @method('DELETE')
                    <button
                        class="block bg-gray-600 text-laravel  py-2 px-4 rounded-xl hover:opacity-80"
                        ><i class="fa-solid fa-trash"></i>
                        Delete Gig
                    </button>
                </form>
            </div>
            <div class="border border-gray-200 w-full mb-2"></div>
            <div
                class="flex flex-col items-center justify-center text-center"
            >
                <img
                    class="w-48 mr-6 mb-6 mt-3"
                    src="{{$listing->logo ? asset('storage/'.$listing->logo):asset('images/logo.png')}}"
                    alt="listing logo"
                />

                <h3 class="text-2xl mb-2">{{$listing->title}}</h3>
                <div class="text-xl font-bold mb-4">{{$listing->company}}</div>
                <x-listing-tags :tags-csv="$listing->tags" />
                <div class="text-lg my-4">
                    <i class="fa-solid fa-location-dot"> {{ $listing->location}}</i>
                </div>
                <div class="border border-gray-200 w-full mb-6"></div>
                <div>
                    <h3 class="text-3xl font-bold mb-4">
                        Job Description
                    </h3>
                    <div class="text-lg space-y-6">
                        {{$listing->description}}
                        <div class="flex justify-evenly items-center">
                            <a
                                href="mailto:{{$listing->email}}}"
                                class="block bg-laravel text-gray-500 mt-6 py-2 px-4 rounded-xl hover:opacity-80"
                                ><i class="fa-solid fa-envelope"></i>
                                Contact Employer</a
                            >

                            <a
                                href="{{$listing->website}}"
                                target="_blank"
                                class="block bg-black text-laravel mt-6 py-2 px-4 rounded-xl hover:opacity-80"
                                ><i class="fa-solid fa-globe"></i> Visit
                                Website</a
                            >
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

