@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                {{--<div class="panel-heading">post</div>--}}
                Project add page.
                <br/>
                <br/>

                {{--{!! ! Form::open([ 'id' => 'post-question-form']) !!}--}}
                {!!  Form::open([ 'route' => 'paper.store', 'method' => 'post']) !!}

                {!! Form::label('name', 'Paper Title:' ) !!}
                {!! Form::text('name', null, ['id' => 'name', 'class' =>'form-control', 'placeholder' => 'Title']) !!}

                <br>

                {!! Form::label('link', 'Link:') !!}
                {!! Form::text('link', null, ['id' => 'link', 'class' =>'form-control', 'placeholder' => 'Link' ]) !!}

                {{--{{ Form::url('webpage', 'http://a.com', ['class' => 'field']) }}--}}

                <br>

                {!! Form::label('details', 'Details') !!}
                {!! Form::textarea( 'details', null, [ 'id' => 'details', 'class' => 'form-control', 'placeholder' => 'Details' ]) !!}

                <br>
                {!!   Form::submit('Submit', ['class' => 'btn btn-success']) !!}

                {!! Form::close() !!}

            </div>
        </div>
    </div>

@endsection