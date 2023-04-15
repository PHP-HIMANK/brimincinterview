<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Profile') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-6">
                                <form method="post" action="{{route('updateprofile')}}" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class="form-group">
                                        <label>Name</label>
                                        <input type="text" name="name" class="form-control" value="{{$user->name}}" required>
                                    </div>
                                    <div class="form-group mt-2">
                                        <label>User Picture</label>
                                        <input type="file" name="image" class="form-control" accept=".png,.jpg,.jpeg,.tif,.gif">
                                    </div>
                                    <div class="form-group mt-2">
                                        <label>Linkedin profile link</label>
                                        <input type="text" name="linkedin" class="form-control">
                                    </div>
                                    <div class="form-group mt-2">
                                        <label>Facebook profile link</label>
                                        <input type="text" name="facebook" class="form-control">
                                    </div>
                                    <div class="form-group mt-2">
                                        <label>Instagram profile link</label>
                                        <input type="text" name="instagram" class="form-control">
                                    </div>
                                    <input type="hidden" name="id" value="{{$id}}">
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
