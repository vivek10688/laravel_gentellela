@include('partials.header')
@include('partials.sidebar') 
            <div class="right_col" role="main">
                <div class="col-md-12 col-sm-8 col-xs-12">
                    <div class="tile">
                    <div class="t-header">
                        <div class="th-title"><span class="glyphicon glyphicon-align-justify" aria-hidden="true"></span> Edit User</div>
                    </div>
                    <div class="t-body tb-padding">
                        <div class="row">
                            <?php //echo '<pre>'; print_r($users);?>
                    <form class="form-horizontal" id="form_register" method="POST" action="<?php echo url('update_user/'.$users[0]->id)?>">
                        {{ csrf_field() }}
                        <div class="form-group{{ $errors->has('first_name') ? ' has-error' : '' }}">
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="first_name">First name:</label>
                            <div class="col-sm-5">
                                <span class="error text-danger"></span>
                                <input type="text" class="form-control" name="first_name" id="first_name" placeholder="First Name" value="{{$users[0]->first_name}}" required="required" autocomplete="off">
                                 @if ($errors->has('first_name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('first_name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="pwd">Last name:</label>
                            <div class="col-sm-5">
                                <span class="error text-danger"></span>
                                <input type="text" class="form-control" name="last_name" id="last_name" placeholder="Last Name" value="{{$users[0]->last_name}}" required="required" autocomplete="off">
                                 @if ($errors->has('last_name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('last_name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="email">Username:</label>
                            <div class="col-sm-5">
                                <span class="error text-danger"></span>
                                <input type="text" class="form-control" name="username" id="username" placeholder="Username" value="{{$users[0]->username}}" required="required" autocomplete="off">
                                 @if ($errors->has('username'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('username') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="email">Email:</label>
                            <div class="col-sm-5">
                                <span class="error text-danger"></span>
                                <input type="email" class="form-control" name="email" id="email" placeholder="Email" value="{{$users[0]->email}}" required="required" autocomplete="off">
                                 @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-10">
                                <input type="submit" name="submit" value="Submit" class="btn btn-primary">
                                <input type="reset" name="reset" class="btn btn-danger" value="Reset">
                            </div>
                        </div>
                    </form>
                    </div>
                    </div>
                </div>
                </div>
            </div>
@include('partials.footer')