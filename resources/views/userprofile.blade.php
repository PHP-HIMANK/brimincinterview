<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Profile') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="container">
                        <div class="row">
                            @if(Session::has('updateprofilesuccess'))
                                <h3>{{ Session::get('updateprofilesuccess') }}</h3>
                            @endif

                            <div class="table-responsive">
                                <table class="table table-stripped table-hover">
                                    <thead>
                                        <tr>
                                            <th>Sr. No.</th>
                                            <th>Profile Picture</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>LinkedIn</th>
                                            <th>Facebook</th>
                                            <th>Instagram</th>
                                            <th colspan="2">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($user as $key=>$value)
                                        <tr>
                                            <td>{{ ++$key }}</td>
                                            <td> @if($value->image) <img src="{{asset('/storage/userprofile/'.$value->image)}}" style="max-width:150px;max-height:150px"> @else No Picture @endif </td>
                                            <td>{{ $value->name }}</td>
                                            <td>{{ $value->email }}</td>
                                            <td>{{ $value->linkedin }}</td>
                                            <td>{{ $value->facebook }}</td>
                                            <td>{{ $value->instagram }}</td>
                                            <td><a href="{{route('editprofile',$value->id)}}" class="btn btn-sm btn-warning">Edit</a></td>
                                            <td>
                                                <form method="post" action="{{route('deleteprofile',$value->id)}}">
                                                    @csrf
                                                    @method('DELETE')
                                                    <input type="hidden" name="id" value="{{$value->id}}">
                                                    <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
