<div class="border border-blue-400 rounded-lg px-8 py-6 mb-8">
    <form method="POST" action="/tweets">
        @csrf
        <textarea name="body" id="" class="w-full outline-none" placeholder="what's up docs?"></textarea>

        <hr class="my-4">

        <footer class="flex justify-between">
            <img
                src="{{auth()->user()->avatar}}"
                alt="your avatar"
                class="rounded-full mr-2"
            >
            <button type="submit" class="bg-blue-500 text-white rounded-lg shadow py-2 px-2 outline-none">Tweet-a-roo!</button>
        </footer>
    </form>

    @error('body')
    <p class="text-red-500 text-sm mt-2">{{$message}}</p>
    @enderror
</div>
