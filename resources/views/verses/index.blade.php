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
    </div>
</x-app-layout>
