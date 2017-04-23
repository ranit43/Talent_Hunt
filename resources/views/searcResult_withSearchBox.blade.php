@extends('layouts.master')

@section('content')



    <section class="search-result">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="card edit">
                    <div class="single edit-field">

                        <h4>Select talent with specific skills</h4>
                        @if($errors->has('skill') )
                            <div class="alert alert-danger">
                                {{ $errors->first('skill') }}
                            </div>

                        @endif

                        {!! Form::open(array('route' => 'searchResult') ) !!}

                        <div class="form-group">

                            @if( count($fields) )

                                <select class="form-control" name="field" id="field">
                                    <option value=""  > -- </option>
                                    @foreach($fields as $field )

                                        {{--{!! Form::checkbox('skill[]', $skill->id, in_array($skill->id, $mySkills) ? true : false) !!}--}}
                                        <option value="{{ $field }}"  > {{ $field  }}  </option>

                                    @endforeach
                                </select>
                            @else
                                no field
                            @endif
                        </div>



                        @if( count($fields_skills) )

                            @foreach($fields_skills as $key => $fields_skill)
                                <div class="form-group field-set" id="{{$key}}">
                                    <select class="skill-multiple form-control" multiple="multiple" name="skill[]">
                                        @foreach($fields_skill as $skill)

                                            <option value="{{ $skill->id }}"  > {{ $skill->name  }}  </option>
                                        @endforeach
                                    </select>
                                </div>
                            @endforeach

                        @else
                            No data found
                        @endif



                        <div class="form-group">
                            {{ Form::submit('Search', ['class' => 'btn btn-success']) }}
                        </div>
                        {!! Form::close() !!}

                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="row">
                    @foreach($users as $user)
                        <div class="col-md-4">
                            <div class="thumbnail text-center">

                                <img class="img-circle img-responsive" src="{{ asset( $user->image ) }}" style="width: 200px; height: 200px" alt="{{ $user->name  }}" >
                                <div class="caption">
                                    <h3><a href="{{ route('show_user_profile', $user->id) }}">{{ $user->name  }}</a> </h3>
                                    {{--<h3>{{ $user->name  }}</a> </h3>--}}
                                    {{--
                                        <li> <a href="{{ url('/edit', $authUser->id) }}">Edit</a> </li>

                                    <a href="{{ route('paper.edit', $paper->id) }}">--}}
                                        {{--<button class="btn btn-primary" type="button">--}}
                                            {{--<span class="glyphicon glyphicon-pencil"></span>--}}
                                        {{--</button>--}}
                                    {{--</a>--}}
                                    {{--<p>...</p>--}}
                                    <p>Email: {!! $user->email !!}</p>
                                    <p>Contact: {!! $user->contact !!}</p>
                                    CV: <a href="{!! $user->CV !!}">Download CV </a>
                                    <p>
                                        Professional Skill:
                                        <br>
                                        @foreach($user->skills as $skill )
                                            <span class="badge badge-success sr">{{$skill->name}}</span>
                                        @endforeach
                                    </p>

                                    {{--<p>
                                        <a href="#" class="btn btn-primary" role="button">Button</a>
                                        <a href="#" class="btn btn-default" role="button">Button</a>
                                    </p>--}}
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>


    </section>


    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
    <script type="text/javascript">
        $('.field-set').hide();
        $('.skill-multiple').select2();
        $('#field').select2().on('change', function (event) {
            console.log(event.target.value);
            $('.field-set').hide();
            $('#'+event.target.value).show();

        });
    </script>

@endsection