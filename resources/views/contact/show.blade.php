@extends('layouts.contacts')


@section('content')

    <header class="bg-white shadow">
        <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
            {{$contact->name}}
        </div>
    </header>
        <div class="container" style="padding: 20px;">

            <div class="card mt-5">
                <div class="card-header">
                    {{$contact->name}}
                </div>
                <div class="card-body">
                    <h5 class="card-title">Name : {{ $contact->name }} (#{{$contact->id}})</h5>
                    <p class="card-text">Phone : {{$contact->phone}}</p>
                    <p class="card-text">E-mail : {{$contact->email}}</p>
                    <p class="card-text">Address : {{$contact->address}}</p>
                    <a href="{{route('contacts.edit',$contact->id)}}" class="btn btn-primary mt-3">Edit</a>
                </div>
            </div>

        </div>

        <!-- Modal -->
        {{--    Delete Modal--}}
        <div class="modal fade" id="delete_modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form id="delete_form" method="post" action="">
                        @csrf
                        @method('DELETE')
                        <input name="id" id="contact_id" class="form-control" type="hidden">
                        <input name="_method" type="hidden" value="DELETE">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                            <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <p>Confirm delete Contact.</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Delete</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    @endsection

<script>
    function delete_item(id) {
        $('#contact_id').val(id);
        var url = "{{url('contacts')}}/" + id;
        $('#delete_form').attr('action', url);
    }
</script>
