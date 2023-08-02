@extends('layouts.contacts')


@section('content')

    <header class="bg-white shadow">
        <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
            Contacts List
        </div>
    </header>

        <div class="container" style="padding: 20px;">

            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif


            <div class="row mt-16">
                @foreach($contacts as $contact)
                    <div class="col-md-4 mb-4">
                        <div class="card" style="width: 18rem;">

                            <div class="card-body">
                                <h5 class="card-title">{{$contact->name}}</h5>
                                <p class="card-text">{{$contact->phone}}</p>
                                <p class="card-text">{{$contact->email}}</p>

                                <a href="{{route('contacts.show',$contact->id)}}"
                                   class="btn btn-secondary mt-4">Show</a>
                                <a href="{{route('contacts.edit',$contact->id)}}" class="btn btn-primary mt-4">Edit</a>

                                <a href="javascript:void(0)"
                                   onclick="delete_item({{$contact->id}})"
                                   data-bs-toggle="modal" data-bs-target="#delete_modal"
                                   class="btn btn-danger mt-4">
                                    delete </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <ul>

            </ul>

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
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <p>Confirm delete Contact.</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Delete</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    @endsection

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
<script>
    function delete_item(id) {
        $('#contact_id').val(id);
        var url = "{{url('contacts')}}/" + id;
        $('#delete_form').attr('action', url);
    }
</script>
