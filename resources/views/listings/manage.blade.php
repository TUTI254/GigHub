@extends('layout')
@section('content')

    <div class="bg-gray-50 border border-gray-200 p-10 rounded">
        <header>
            <h1
                class="text-3xl text-center font-bold my-6 uppercase"
            >
                Manage Gigs
            </h1>
        </header>

        <table class="w-full table-auto rounded-sm">
            <tbody>
                @unless ($listings->isEmpty())
                @foreach ($listings as $listing)
                <tr class="border-gray-300">
                    <td
                        class="px-4 py-8 border-t border-b border-gray-300 text-lg"
                    >
                        <a href="">
                           {{ $listing->title }}
                        </a>
                    </td>
                    <td
                        class="px-4 py-8 border-t border-b border-gray-300 text-lg"
                    >
                        <a
                            href="/listings/{{$listing->id}}/edit"
                            class="text-blue-400 px-6 py-2 rounded-xl"
                            ><i
                                class="fa-solid fa-pen-to-square"
                            ></i>
                            Edit</a
                        >
                    </td>
                    <td
                        class="px-4 py-8 border-t border-b border-gray-300 text-lg"
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
                    </td>
                </tr>
                @endforeach
                @else
                <tr class="border-gray-300">
                    <td
                        class="px-4 py-8 border-t border-b border-gray-300 text-lg"
                        colspan="3"
                    >
                        <p class="text-center">
                            You have not created any gigs yet.
                        </p>
                    </td>

                @endunless

            </tbody>
        </table>
    </div>
@endsection
