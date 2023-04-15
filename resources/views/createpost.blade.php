<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create Post') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-6">
                                <form method="post" action="{{route('storepost')}}">
                                    @csrf
                                    <div class="form-group">
                                        <label>Categories</label>
                                        <select name="categories_id" class="form-control" required>
                                            <option value="">Select Category</option>
                                            @foreach($categories as $key => $value)
                                                <option value="{{ $value->id }}">{{ $value->category_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group mt-2">
                                        <label>Post</label>
                                        <textarea name="post" class="form-control" rows="5" required></textarea>
                                    </div>
                                    <div class="form-group mt-2">
                                        <button type="submit" class="btn btn-md btn-success" style="float: right">Submit</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
