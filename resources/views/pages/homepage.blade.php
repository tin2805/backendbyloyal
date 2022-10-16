@extends('layout')
@section('content')

    <section class="joke">

    <?php
        $message = Session::get('messages');
        {{-- return $message; --}}
    ?>
    @if (isset($message))
        <div class="breadcrumb_title">
            <div class="row">
                <span class="joke_title">{{$message}}</span>
            </div>
        </div>
    @else
        <div class="breadcrumb_title">
            <div class="row">
                <span class="joke_title">A joke a day keeps doctor away</span>
                <span class="joke_idioms">If you joke wrong way, your teeth have to pay. (Serious)</span>
            </div>
        </div>
        <div class="body">
            <div class="container">
                <p class="joke_desc">
                    {{$joke->joke_desc}}
                </p>
                <span class="underlight"></span>
                <div class="submit_button">
                    <form action="{{URL::to('/nice-status/'.$joke->joke_id)}}" method="POST">
                        {{csrf_field()}}
                        <input type="hidden" name="joke_id_hidden" value="{{$joke->joke_id}}">
                        <button type="submit" class="btn btn-primary is-selected">This is Funny!</button>
                    </form>
                    <form method="post" action="{{URL::to('/nonice-status/'.$joke->joke_id)}}">
                        {{csrf_field()}}
                        <button type="submit" class="btn btn-success">This is not funny</button>
                    </form>
                </div>
            </div>
        </div>
    @endif
        <div class="reset"><a href="{{URL::to('/reset')}}">Reset all status</a></div>
    </section>

@endsection