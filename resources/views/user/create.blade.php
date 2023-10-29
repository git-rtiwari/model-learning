@extends('layout')
@section('content')
    <form method="post" action="{{route('users.store')}}" enctype="multipart/form-data">
        @csrf
        <div class="container">
            <div class="row mt-5">

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input name="name" type="text" required class="form-control @error('name') is-invalid @enderror"
                               id="name"
                               placeholder="Enter name">
                        <div class="invalid-feedback">
                            Please choose a valid name.
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="dob">Date of birth</label>
                        <input type="date" name="dob" required class="form-control @error('dob') is-invalid @enderror"
                               id="dob"
                               placeholder="Enter date of birth">
                        <div class="invalid-feedback">
                            Please enter a valid date of birth
                        </div>
                    </div>
                </div>


            </div>

            <div class="row">

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="phone">Phone</label>
                        <input type="tel" name="phone" class="form-control @error('phone') is-invalid @enderror"
                               id="phone"
                               placeholder="Enter phone number">
                        <div class="invalid-feedback">
                            Please enter a valid phone number.
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"
                               id="email"
                               placeholder="Enter email">
                        <div class="invalid-feedback">
                            Please enter a valid email.
                        </div>
                    </div>
                </div>


            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group @error('gender') is-invalid @enderror">
                        <label for="gender">Gender</label>
                        <div class="custom-control custom-radio">
                            <input type="radio" class="custom-control-input" id="gender-male" name="gender" value="male"
                                   required>
                            <label class="custom-control-label" for="gender-male">Male</label>
                        </div>
                        <div class="custom-control custom-radio mb-3">
                            <input type="radio" class="custom-control-input " id="gender-female" name="gender"
                                   value="female" required>
                            <label class="custom-control-label" for="gender-female">Female</label>
                        </div>
                    </div>
                    <div class="invalid-feedback">Invalid gender</div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="profile-pic"> Profile picture</label>
                        <input type="file" name="profile_pic" placeholder="select a profile pic"
                               class="form-control @error('profile_pic') is-invalid @enderror" id="profile-pic"
                               required>
                        <div class="invalid-feedback">
                            Please choose a valid profile pic
                        </div>
                    </div>
                </div>
            </div>

            <div class="row mt-3">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="state">State</label>
                        <select class="form-control @error('state') is-invalid @enderror" name="state" id="state"
                                required>
                            <option>Select state</option>
                            @foreach($states as $state)
                                <option value="{{$state->id}}">{{$state->title}}</option>
                            @endforeach
                        </select>
                        <div class="invalid-feedback">
                            Please select a valid state.
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="city">City</label>
                        <select type="text" name="city" class="form-control @error('city') is-invalid @enderror"
                                id="city"
                                placeholder="Enter city" required>
                            <option>Select City</option>
                        </select>
                        <div class="invalid-feedback">
                            Please enter a valid city.
                        </div>
                    </div>
                </div>
            </div>


            <div class="row">

                <div class="col-md-12">
                    <h4 class="mb-3">Education</h4>
                    <button type="button" class="btn btn-primary" id="add-more-education">Add</button>
                </div>
            </div>
            <div class="row eduction-wrap mt-3" id="education-wrap">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="education-field">Education area</label>
                        <input type="text" name="education[field][]"
                               class="form-control @error('education.field') is-invalid @enderror" id="education-field"
                               placeholder="Enter education" required>
                        <div class="invalid-feedback">
                            Please enter a valid education.
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="education-year">Education year</label>
                        <input type="number" name="education[year][]"
                               class="form-control @error('education.year') is-invalid @enderror" id="education-year"
                               placeholder="Enter education" required>
                        <div class="invalid-feedback">
                            Please enter a valid year.
                        </div>
                    </div>
                </div>

                <div class="col-md-12 mb-5">
                    <button type="button" class="btn btn-sm btn-danger remove-education">Remove</button>
                </div>
            </div>

            <div class="row">

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="skills">Skills</label>
                        <select name="skills[]" class="form-control @error('skills') is-invalid @enderror" id="skills"
                                multiple required>
                            <option value="python">Python</option>
                            <option value="Java">Java</option>
                            <option value="PHP">PHP</option>
                            <option value="Java Script">Java Script</option>
                            <option value="Go Lang">Go Lang</option>
                        </select>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="certificates">Certificates</label>
                        <input type="file" name="certificates[]"
                               class="form-control @error('certificates') is-invalid @enderror" id="certificates"
                               multiple required/>
                    </div>
                </div>

            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group @error('profession') is-invalid @enderror">
                        <label>Profession</label>
                        <div class="custom-control custom-radio">
                            <input type="radio" class="custom-control-input" id="profession-salaried" name="profession"
                                   value="salaried"
                                   required>
                            <label class="custom-control-label" for="profession-salaried">Salaried</label>
                        </div>
                        <div class="custom-control custom-radio mb-3">
                            <input type="radio" class="custom-control-input" id="profession-self-employed"
                                   name="profession"
                                   value="self-employed"
                                   required>
                            <label class="custom-control-label" for="profession-self-employed">Self-employed</label>
                        </div>
                    </div>
                    <div class="invalid-feedback">Invalid profession</div>
                </div>

            </div>

            <div class="row" id="salaried">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="company-name">Company name</label>
                        <input type="text" name="company_name"
                               class="form-control @error('company_name') is-invalid @enderror" id="company-name"
                               placeholder="Company name" required>
                        <div class="invalid-feedback">
                            Please enter a valid Company name.
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="started-year">Started year</label>
                        <input type="number" name="started_year"
                               class="form-control @error('started_year') is-invalid @enderror" id="started-year"
                               placeholder="Enter education" required>
                        <div class="invalid-feedback">
                            Please enter a valid year.
                        </div>
                    </div>
                </div>
            </div>

            <div class="row" id="self-employed">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="business_name">Business Name</label>
                        <input type="text" name="business_name"
                               class="form-control @error('business_name') is-invalid @enderror" id="business_name"
                               placeholder="Business Name" required>
                        <div class="invalid-feedback">
                            Please enter a valid Business Name.
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="location">Location</label>
                        <input type="text" name="location" class="form-control @error('location') is-invalid @enderror"
                               id="location"
                               placeholder="Enter Location" required>
                        <div class="invalid-feedback">
                            Please enter a valid Location.
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>

        </div>
    </form>
    <script>
        var stateCityMap = @json($stateCityMap);
        let dropdown = $('#city');
        $('#state').change(function () {
            dropdown.empty();
            $.each(stateCityMap[$(this).val()], function () {
                dropdown.append($("<option />").val(this.id).text(this.title));
            });
        })

        $('#add-more-education').click(function () {
            $(".eduction-wrap").last().after($(".eduction-wrap").first().clone())
        })
        $('body').click(function (e) {
            if ($(".eduction-wrap").length !== 1 && $(e.target).hasClass('remove-education')) {
                $(e.target).parents('.eduction-wrap').remove();
            }
        })
        $('[name="profession"]').change(function (){
            let profession = $(this).val();
            $(`#${profession}`).show();

            if(profession === 'salaried'){
                $('#self-employed').hide()
            }
            if(profession === 'self-employed'){
                $('#salaried').hide();
            }
        })
        $(document).ready(function(){
            $('#salaried').hide();
            $('#self-employed').hide();
        })
    </script>
@endsection
