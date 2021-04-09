@extends('layouts.admin')



@section('content')

    <div class="div-for-toaster pt-5">
        @if (session('status'))
            <div class="alert alert-success text-center">
                {{ session('status') }}
            </div>
        @endif
    </div>



    <h2 class="text-center">Dobrodosli</h2>




@endsection
