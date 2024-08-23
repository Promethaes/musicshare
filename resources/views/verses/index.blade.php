<x-app-layout>
    <div class="max-w-2xl mx-auto p-4 sm:p-6 lg:p-8">
        <form method="POST" action="{{ route('verses.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="custom-file">
                <input type="file" name="file" class="custom-file-input" id="chooseFile">
                <label class="custom-file-label" for="chooseFile">Select file</label>
            </div>

            <x-primary-button type="submit" class="mt-4">{{ __('Add Your Verse') }}</x-primary-button>
        </form>
        @if (count($errors) > 0)
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach

                </ul>
            </div>
        @endif
        @if (session('message'))
            <div class="alert alert-success">
                <p>{{ session('message') }}</p>
            </div>
        @endif

        <div class="mt-6 bg-white shadow-sm rounded-lg divide-y">

            @foreach ($verses as $verse)
                <div class="p-6 flex space-x-2">

                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-600 -scale-x-100" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">

                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" />

                    </svg>

                    <div class="flex-1">

                        <div class="flex justify-between items-center">

                            <div>

                                <span class="text-gray-800">{{ $verse->user->name }}</span>

                                <small
                                    class="ml-2 text-sm text-gray-600">{{ $verse->created_at->format('j M Y, g:i a') }}</small>

                            </div>

                        </div>

                        <p class="mt-4 text-lg text-gray-900">{{ $verse->name }}</p>

                    </div>

                </div>
            @endforeach

        </div>
    </div>
</x-app-layout>
