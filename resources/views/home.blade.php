@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
        </div>

        @if (session('status'))

            <div class="alert alert-success">

                {!! session('status') !!}
            </div>
        @endif
        <div class="row" style="background: white ; height:555px; display:flex;">
            <div class="col-8">
                <form method="POST" action="{{ route('qr') }}">
                    @csrf

                    <div class="form-group">
                        <label for="name">Name</label>
                        <input id="name" class="form-control" type="text" name="name" value="{{ old('name') }}"
                            placeholder="Enter the Name of The QR Code ">
                        @error('name')
                            <span class="invalid-feedback d-block" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="body">Body</label>
                        <input id="body" class="form-control" type="text" name="body" value="{{ old('body') }}"
                            placeholder="Enter the Body of The Qr Code">
                        @error('body')
                            <span class="invalid-feedback d-block" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <button type="submit" class=" btn btn-primary">Generate QR </button>



                </form>
            </div>
            <div class="col-4">

                <h1 class="m-2"> Qr code</h1>

                @if (session('code'))

                <img src="{{ asset("images/qr_code/example.png") }}">

                @endif




            </div>

        </div>
    </div>



@endsection
