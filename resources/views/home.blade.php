@extends('layouts.app')

@section('content')
    <div class="lg:flex lg:justify-between">
        {{--        sidebar-left--}}
        <div class="lg:w-32">
            @include('_sidebar-links')
        </div>

        {{--content--}}
        <div class="lg:flex-1 lg:mx-10" style="max-width: 700px">

            @include('_publish-tweet-panel')

            <div class="border border-gray-300 rounded-lg">
                @include('_tweet')
                @include('_tweet')
                @include('_tweet')
                @include('_tweet')
                @include('_tweet')
            </div>

        </div>

        {{--        sidebar-right--}}
        <div class="lg:w-1/6 bg-blue-100 p-4 rounded-lg">
            @include('_friend-list')
        </div>
    </div>
@endsection
