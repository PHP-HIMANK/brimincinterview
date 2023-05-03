<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Posts') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <a href="{{route('createpost')}}" class="btn btn-sm btn-primary">Create Post</a>
                    <div class="container">
                        <div class="row">
                            @if(Session::has('updatepostsuccess'))
                                <h4 class="text-red" style="color:green">{{ Session::get('updatepostsuccess') }}</h4>
                            @endif
                            @if(Session::has('createpostsuccess'))
                                <h4 class="text-red" style="color:green">{{ Session::get('createpostsuccess') }}</h4>
                            @endif
                            @if(Session::has('delete_success'))
                                <h4 class="text-success" style="color:green">{{ Session::get('delete_success') }}</h4>
                            @endif
                            @if(Session::has('delet_error'))
                                <h4 class="text-danger" style="color:red">{{ Session::get('delet_error') }}</h4>
                            @endif

                            <div class="table-responsive">
                                <table class="table table-stripped table-hover" id="postdatatable">
                                    <thead>
                                        <tr>
                                            <th>Sr. No.</th>
                                            <th id="thcategory">Category</th>
                                            <th id="thpost">Post</th>
                                            <th colspan="2">Actions</th>
                                            {{-- <th><input type="text" id="tabletextsearch"></th> --}}
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($posts as $key=>$value)
                                        <tr id="trlatest_{{ ++$key }}_val" class="trlatest">
                                            <td>{{ $key }}</td>
                                            <td class="tdcategory" id="tdcategory_{{ $key }}_cat">{{ $value->category->category_name }}</td>
                                            <td id="tdpost_{{ $key }}_post">{{ $value->post }}</td>
                                            <td><a href="{{route('editpost',$value->id)}}" class="btn btn-sm btn-warning">Edit</a></td>
                                            <td>
                                                <form method="post" action="{{route('deletepost',$value->id)}}">
                                                    @csrf
                                                    @method('DELETE')
                                                    <input type="hidden" name="id" value="{{$value->id}}">
                                                    <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                                </form>
                                            </td>
                                            {{-- <td></td> --}}
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
    <script>
        $(document).ready(function () {
            $('#postdatatable').DataTable();
        });
    </script>
    {{-- <script>
        $(document).ready(function(){
            $("#tabletextsearch").on('keyup',function(){
                var values = $(this).val();
                var trlength = $('tbody tr').length;
                for(var i=1;i<=trlength;i++) {
                    if($("#tdcategory_"+i+"_cat").text() == values) { //|| $('#tdpost_'+i+'_post').text() == values) {
                        console.log('if '+i);
                        $('#trlatest_'+i+'_val').show();
                    } else {
                        console.log('else '+i);
                        console.log($("#tdcategory_"+i+"_cat").text());
                        console.log('values = '+values);
                        console.log($('#tdpost_'+i+'_post').text());
                        $('#trlatest_'+i+'_val').hide();
                        console.log('\n\n');
                    }
                }
            });
        });
    </script> --}}
</x-app-layout>
