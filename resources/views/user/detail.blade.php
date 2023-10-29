@extends('layout')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <table class="table table-bordered table-stripped">
                    <tr>
                        <th>Profile Picture</th>
                        <td><img class="img" height="100" src="{{\Illuminate\Support\Facades\Storage::disk('public')->url($user->profile_pic)}}"> </td>
                    </tr>
                    <tr>
                        <th>Name</th>
                        <td>{{$user->name}}</td>
                    </tr>
                    <tr>
                        <th>Email</th>
                        <td>{{$user->email}}</td>
                    </tr>
                    <tr>
                        <th>Phone</th>
                        <td>{{$user->phone}}</td>
                    </tr>
                    <tr>
                        <th>Date of birth</th>
                        <td>{{ucfirst($user->dob)}}</td>
                    </tr>
                    <tr>
                        <th>Gender</th>
                        <td>{{ucfirst($user->gender)}}</td>
                    </tr>

                    <tr>
                        <th>
                            State
                        </th>
                        <td>
                            {{ucfirst($user->state->title)}}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            City
                        </th>
                        <td>
                            {{ucfirst($user->city->title)}}
                        </td>
                    </tr>
                    <tr>
                        <th>Skills</th>
                        <td>{{ucfirst(join(', ', $user->skills))}}</td>
                    </tr>
                </table>
                <h3>Education</h3>
                <table class="table table-bordered">
                    <tr>
                        <th>Field</th>
                        <th>year</th>
                    </tr>
                    @foreach($user->education as $education)
                        <tr>
                            <th>{{$education['field']}}</th>
                            <th>{{$education['year']}}</th>
                        </tr>
                    @endforeach
                </table>

                <h3>Profession: {{ucwords($user->profession)}}</h3>
                <table class="table table-bordered">
                    @foreach($user->profession_details as $key=>$value)
                        <tr>
                            <th>{{ucwords(str_replace('_', ' ',$key))}}</th>
                            <td>{{ucwords(str_replace('_', ' ', $value))}}</td>
                        </tr>
                    @endforeach
                </table>

                <h3>Certificates</h3>
                <table class="table table-bordered">
                    @foreach($user->certificates as $certificate)
                        <tr>
                            <td><a target="_blank" href="{{\Illuminate\Support\Facades\Storage::disk('public')->url($certificate)}}">{{str_replace('documents/','',  $certificate)}}</a> </td>
                        </tr>
                    @endforeach
                </table>

            </div>
        </div>
    </div>
@endsection
