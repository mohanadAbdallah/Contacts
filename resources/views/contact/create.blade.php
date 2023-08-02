@extends('layouts.contacts')

@section('content')
    <header class="bg-white shadow">
        <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
            Create Contact
        </div>
    </header>

    <div class="container" style="padding: 20px;">

        @if($errors->any())
            @foreach($errors->all() as $error)
                <div class="alert alert-danger">
                    {{ $error }}
                </div>
            @endforeach
        @endif
        <form action="{{ route('contacts.store')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-floating mb-3">
                <input type="text" class="form-control" {{old('name')}} id="name" name="name" placeholder="Classroom Name">
                <label for="name">name</label>
            </div>

            <div class="form-floating mb-3">
                <input type="text" class="form-control" {{old('email')}} id="email" name="email" placeholder="E-mail">
                <label for="subject">E-mail</label>
            </div>
            <div class="form-floating mb-3">
                <input type="text" class="form-control"  {{old('phone')}} id="phone" name="phone" placeholder="Phone">
                <label for="phone">Phone</label>
            </div>

            <div class="form-floating mb-3">
                <input type="text" class="form-control" {{old('address')}} id="address" name="address" placeholder="Address">
                <label for="address">Address</label>
            </div>

            <x-primary-button>{{ __('Save') }}</x-primary-button>

        </form>
    </div>
@endsection
