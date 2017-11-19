@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Register</div>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('register') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('firstname') ? ' has-error' : '' }}">
                            <label for="firstname" class="col-md-4 control-label">FirstName</label>

                            <div class="col-md-6">
                                <input id="firstname" type="text" class="form-control" name="firstname" value="{{ old('firstname') }}" required autofocus>

                                @if ($errors->has('firstname'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('firstname') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                        
                         <div class="form-group{{ $errors->has('lastname') ? ' has-error' : '' }}">
                            <label for="lastname" class="col-md-4 control-label">LastName</label>

                            <div class="col-md-6">
                                <input id="lastname" type="text" class="form-control" name="lastname" value="{{ old('lastname') }}" required autofocus>

                                @if ($errors->has('lastname'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('lastname') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                        
                           <!-- select -->
                <select class="form-control" name="university">
                    <optgroup label="Popular">
                      <option value="AFE">Afe Babalola University</option>
                      <option value="BAB">Babcock University</option>
                      <option value="COV">Covenant University</option>
                      <option value="RED">Redeemer's University</option>
                      <option value="lAG">University of Lagos</option>
                      <option value="BEN">University of Benin</option>
                    </optgroup>
                    <optgroup label="All">
                      <option value="ABU">Abia State University</option>
                      <option value="ATB">Abubakar Tafawa Balewa University</option>
                      <option value="AU">Achievers University, Owo</option>
                      <option value="ASU">Adamawa State University</option>
                      <option value="AAU">Adekunle Ajasin University</option>
                      <option value="ADE">Adeleke University</option>
                      <option value="AFE">Afe Babalola University</option>
                      <option value="AUST">African University of Science and Technology</option>
                      <option value="AHBU">Ahmadu Bello University</option>
                      <option value="ACU">Ajayi Crowther University</option>
                      <option value="AKSU">Akwa Ibom State University</option>
                      <option value="AHU">Al-Hikmah University</option>
                      <option value="AQU">Al-Qalam University Katsina</option>
                      <option value="AMU">Ambrose Alli University</option>
                      <option value="AUN">American University of Nigeria</option>
                      <option value="BU">Babcock University</option>
                      <option value="BSU">Bauchi State University</option>
                      <option value="BUN">Bayero University Kano</option>
                      <option value="BAZE">Baze University</option>
                      <option value="BELLS">Bells University of Technology</option>
                      <option value="BIU">Benson Idahosa University</option>
                      <option value="">Benue State University</option>
                      <option value="">Bingham University</option>
                      <option value="">Bowen University</option>
                      <option value="">Caleb University</option>
                      <option value="">Caritas University</option>
                      <option value="">Chukwuemeka Odumegwu Ojukwu University</option>
                      <option value="">Covenant University</option>
                      <option value="">Crawford University</option>
                      <option value="">Crescent University, Abeokuta</option>
                      <option value="">Cross River University of Technology</option>
                      <option value="">Delta State University, Abraka</option>
                      <option value="">Ebonyi State University</option>
                      <option value="">Ekiti State University, Ado Ekiti</option>
                      <option value="">Elizade University</option>
                      <option value="">Enugu State University of Science and Technology</option>
                      <option value="">Federal University of Petroleum Resources</option>
                      <option value="">Federal University of Technology, Akure</option>
                      <option value="">Federal University of Technology, Minna</option>
                      <option value="">Federal University of Technology, Owerri</option>
                      <option value="">Federal University Oye-Ekiti</option>
                      <option value="">Federal University, Dutse</option>
                      <option value="">Federal University, Dutsin-Ma</option>
                      <option value="">Federal University, Kashere</option>
                      <option value="">Federal University, Lafia</option>
                      <option value="">Federal University, Lokoja</option>
                      <option value="">Federal University, Ndufu-Alike</option>
                      <option value="">Federal University, Otuoke</option>
                      <option value="">Federal University, Wukari</option>
                      <option value="">Fountain University</option>
                      <option value="">Godfrey Okoye University</option>
                      <option value="">Gombe State University</option>
                      <option value="">Ibrahim Badamasi Babangida University</option>
                      <option value="">Igbinedion University Okada</option>
                      <option value="">Imo State University</option>
                      <option value="">Joseph Ayo Babalola University</option>
                      <option value="">Kaduna State University</option>
                      <option value="">Kano University of Science and Technology</option>
                      <option value="">Kebbi State University of Science and Technology</option>
                      <option value="">Kogi State University</option>
                      <option value="">Kwara State University</option>
                      <option value="">Kwararafa University Wukari</option>
                      <option value="">Ladoke Akintola University of Technology</option>
                      <option value="">Lagos State University</option>
                      <option value="">Landmark University</option>
                      <option value="">Lead City University</option>
                      <option value="">Madonna University</option>
                      <option value="">Michael Okpara University of Agriculture</option>
                      <option value="">Modibbo Adama University of Technology</option>
                      <option value="">Nasarawa State University</option>
                      <option value="">Niger Delta University</option>
                      <option value="">Nile University of Nigeria</option>
                      <option value="">Nnamdi Azikiwe University</option>
                      <option value="">Northwest University Kano</option>
                      <option value="">Novena University</option>
                      <option value="">Obafemi Awolowo University</option>
                      <option value="">Obong University</option>
                      <option value="">Oduduwa University</option>
                      <option value="">Olabisi Onabanjo University</option>
                      <option value="">Ondo State University of Science and Technology</option>
                      <option value="">Osun State University</option>
                      <option value="">Pan African University</option>
                      <option value="">Paul University</option>
                      <option value="">Plateau State University</option>
                      <option value="">Redeemer's University</option>
                      <option value="">Rhema University</option>
                      <option value="">Rivers State University of Science and Technology</option>
                      <option value="">Salem University</option>
                      <option value="">Samuel Adegboyega University</option>
                      <option value="">Sokoto State University</option>
                      <option value="">Tai Solarin University of Education</option>
                      <option value="">Tansian University</option>
                      <option value="">Taraba State University</option>
                      <option value="">Umaru Musa Yar'Adua University</option>
                      <option value="">University of Abuja</option>
                      <option value="">University of Agriculture, Abeokuta</option>
                      <option value="">University of Agriculture, Makurdi</option>
                      <option value="">University of Benin</option>
                      <option value="">University of Calabar</option>
                      <option value="">University of Ibadan</option>
                      <option value="">University of Ilorin</option>
                      <option value="">University of Jos</option>
                      <option value="">University of Lagos</option>
                      <option value="">University of Maiduguri</option>
                      <option value="">University of Mkar</option>
                      <option value="">University of Port Harcourt</option>
                      <option value="">University of Uyo</option>
                      <option value="">Usmanu Danfodio University</option>
                      <option value="">Veritas University</option>
                      <option value="">Wellspring University</option>
                      <option value="">Wesley University of Science and Technology</option>
                      <option value="">Western Delta University</option>
                      <option value="">Yobe State University</option>
                    </optgroup>
                  
                </select><!-- select -->
                        
                        
                       <input type="hidden" name="user_type" value="student">
                        

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                        
                         <div class="form-group{{ $errors->has('mobilenumber') ? ' has-error' : '' }}">
                            <label for="mobilenumber" class="col-md-4 control-label">MobileNumber</label>

                            <div class="col-md-6">
                                <input id="mobilenumber" type="text" class="form-control" name="mobilenumber" value="{{ old('mobilenumber') }}" required autofocus>

                                @if ($errors->has('mobilenumber'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('mobilenumber') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Register
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
