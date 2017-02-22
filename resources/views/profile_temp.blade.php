@extends('layouts.master')

@section('content')
    <section class="basic-content">
        <div class="cover-photo" style="background: url('uploads/images/users/1487674760_users.jpg');">

        </div>

        <div class="container">
            <div class="row">
                <div class="col-md-8 col-md-offset-2 text-center">
                    <div class="card basic-profile">
                        <img src="{!! asset($authUser->image) !!}" alt="profile-photo" class="img-responsive img-circle center-block" style="width: 124px; height: 124px;">
                        <h2>{{$authUser->name}}</h2>
                        <p><strong>Email:</strong> <u>{{$authUser->email}}</u> </p>
                        <p><strong>Mobile No:</strong> {{$authUser->contact}}</p>
                        <p><strong>Address:</strong> {{$authUser->adress}}</p>
                        <p><strong>CV:</strong> <a href="{!! $authUser->CV !!}">Download CV</a></p>
                    </div>
                </div>
            </div>
        </div>
    </section>


    {{--SKills
            1.Proffessional Skills:

                @foreach($authUser->skills as $skill )
                    {{$skill->name}}
                @endforeach


            2. Volunteering Skills:

                @foreach($authUser->volunteeringskill as $volunteskill )
                    {{$volunteskill->name}}
                @endforeach
    --}}


    {{--Achievements Cards--}}
    {{--
        Add new Achievements not added yet
        <a href="{{ route('achievement.create') }}">ADD YOUR ACHIEVEMENTS </a>
    --}}

    <section class="container">

        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="card achievements">
                    <h4>Achievements: </h4>
                    @if(count($achievements))
                        @foreach($achievements as $achievement)
                            <div class="single-achievement">
                                <div class="row">
                                    <div class="col-md-6">
                                        <h3>{{ $achievement->title }} </h3>
                                    </div>
                                    <div class="col-md-6">
                                        <a href="{{ route('achievement.edit', $achievement->id) }}"><button class="btn btn-primary" type="button">EDit</button></a>
                                        <a href="{{ route('achievement.delete', $achievement->id) }}"><button class="btn btn-danger" type="button">Delete </button></a>
                                    </div>
                                </div>

                                <p>{{ $achievement->issuer }}</p>
                                <p>{{ $achievement->year }}</p>
                                <p>{{ $achievement->details }}</p>
                            </div>
                            @endforeach
                        @else
                            No data found
                        @endif
                </div>
            </div>
        </div>
    </section>

    {{--Projects Cards--}}
    {{--
        Add new Projects not added yet
        <a href="{{ route('project.create') }}">Add your projects </a>
     --}}
    <section class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="card achievements">
                    <h4>Projects: </h4>
                    @if(count($projects))
                        @foreach($projects as $project)
                            <div class="single-achievement">
                                <div class="row">
                                    <div class="col-md-6">
                                        <h3>{!! $project->name !!}</h3>
                                    </div>
                                    <div class="col-md-6">
                                        <a href="{{ route('project.edit', $project->id) }}"><button class="btn btn-primary" type="button">EDit</button></a>
                                        <a href="{{ route('project.delete', $project->id) }}"><button class="btn btn-danger" type="button">Delete </button></a>
                                    </div>
                                </div>

                                <p><a href="{!! $project->link !!}">{{ $project->link }}</a> </p>
                                <p>{{ $project->details }}</p>

                            </div>
                        @endforeach
                    @else
                        No data found
                    @endif
                </div>
            </div>
        </div>
    </section>

    {{--Papers Cards--}}
    {{--
        Add new Papers not added yet
        <a href="{{ route('paper.create') }}">Add your papers </a>
     --}}
    <section class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="card achievements">
                    <h4>Publications: </h4>
                    @if(count($papers))
                        @foreach($papers as $paper)
                            <div class="single-achievement">
                                <div class="row">
                                    <div class="col-md-6">
                                        <h3>{!! $paper->name !!}</h3>
                                    </div>
                                    <div class="col-md-6">
                                        <a href="{{ route('paper.edit', $paper->id) }}"><button class="btn btn-primary" type="button">EDit</button></a>
                                        <a href="{{ route('paper.delete', $paper->id) }}"><button class="btn btn-danger" type="button">Delete </button></a>
                                    </div>
                                </div>

                                <p><a href="{!! $paper->link !!}">{{ $paper->link }}</a> </p>
                                <p>{{ $paper->details }}</p>

                            </div>
                        @endforeach
                    @else
                        No data found
                    @endif
                </div>
            </div>
        </div>
    </section>

@endsection