@extends('layouts.app')

@section('content')
<main id="main" class="main">
    <div class="container-fluid" style="margin-top:30px">
        <div class="container">
            @livewire('show', ['users' => $users, 'messages' => $messages, 'sender' => $sender])
        </div>
    </div>
    </main><!-- End #main -->

@endsection
