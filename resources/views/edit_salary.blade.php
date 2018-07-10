@include('partials.header')
@include('partials.sidebar') 
            <div class="right_col" role="main">
                <div class="col-md-12 col-sm-8 col-xs-12">
                    <div class="tile">
                    <div class="t-header">
                        <div class="th-title"><span class="glyphicon glyphicon-align-justify" aria-hidden="true"></span> Edit Salary</div>
                    </div>
                    <div class="t-body tb-padding">
                        <div class="row">
                    <form class="form-horizontal" id="form_register" method="POST" action="<?php echo url('update_salary/'.$salary[0]->id)?>">
                        {{ csrf_field() }}
                        <div class="form-group{{ $errors->has('first_name') ? ' has-error' : '' }}">
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="first_name">Employee:</label>
                            <div class="col-sm-5">
                                <span class="error text-danger"></span>
                                <select name="user_id" class="form-control">
                                    <option value="">--Select Employee--</option>
                                    @foreach($users as $user)
                                    <option value="{{$user->id}}" <?php if($user->id==$salary[0]->user_id){ echo 'selected';}?>>{{Ucwords($user->first_name.' '.$user->last_name)}}</option>
                                    @endforeach
                                </select>
                                 @if ($errors->has('user_id'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('user_id') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="status">Year:</label>
                            <div class="col-sm-5">
                                <span class="error text-danger"></span>
                                <select name="year" class="form-control" required="required">
                                    <option value="">Select Year</option>
                                    <option value="2017"<?php if($salary[0]->year=='2017'){ echo 'selected';}?>>2017</option>
                                    <option value="2018"<?php if($salary[0]->year=='2018'){ echo 'selected';}?>>2018</option>
                                    <option value="2019"<?php if($salary[0]->year=='2019'){ echo 'selected';}?>>2019</option>
                                    <option value="2020"<?php if($salary[0]->year=='2020'){ echo 'selected';}?>>2020</option>
                                    <option value="2021"<?php if($salary[0]->year=='2021'){ echo 'selected';}?>>2021</option>
                                    <option value="2022"<?php if($salary[0]->year=='2022'){ echo 'selected';}?>>2022</option>
                                </select>
                                 @if ($errors->has('year'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('year') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="month">Month:</label>
                            <div class="col-sm-5">
                                <span class="error text-danger"></span>
                                <select name="month" class="form-control" required="required">
                                    <option value="">Select Month</option>
                                    <option value="january"<?php if($salary[0]->month=='january'){ echo 'selected';}?>>January</option>
                                    <option value="february"<?php if($salary[0]->month=='february'){ echo 'selected';}?>>February</option>
                                     <option value="march"<?php if($salary[0]->month=='march'){ echo 'selected';}?>>March</option>
                                    <option value="april"<?php if($salary[0]->month=='april'){ echo 'selected';}?>>April</option>
                                     <option value="may"<?php if($salary[0]->month=='may'){ echo 'selected';}?>>May</option>
                                    <option value="june"<?php if($salary[0]->month=='june'){ echo 'selected';}?>>June</option>
                                    <option value="july"<?php if($salary[0]->month=='july'){ echo 'selected';}?>>July</option>
                                    <option value="august"<?php if($salary[0]->month=='august'){ echo 'selected';}?>>August</option>
                                     <option value="september"<?php if($salary[0]->month=='september'){ echo 'selected';}?>>September</option>
                                    <option value="october"<?php if($salary[0]->month=='october'){ echo 'selected';}?>>October</option>
                                     <option value="november"<?php if($salary[0]->month=='november'){ echo 'selected';}?>>November</option>
                                    <option value="december"<?php if($salary[0]->month=='december'){ echo 'selected';}?>>December</option>
                                </select>
                                 @if ($errors->has('month'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('month') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                         <div class="form-group">
                            <label class="control-label col-sm-2" for="pwd">Basic Salary:</label>
                            <div class="col-sm-5">
                                <span class="error text-danger"></span>
                                <input type="text" class="form-control" name="basic_salary" id="basic_salary" placeholder="Basic Salary (in numbers only)" value="{{$salary[0]->basic_salary}}" required="required" autocomplete="off"  onkeypress="return isNumber(event)">
                                 @if ($errors->has('basic_salary'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('basic_salary') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="email">House Rent Allowance:</label>
                            <div class="col-sm-5">
                                <span class="error text-danger"></span>
                                <input type="text" class="form-control" name="hra" id="hra" placeholder="House Rent Allowance (in numbers only)" value="{{$salary[0]->hra}}" required="required" autocomplete="off" onkeypress="return isNumber(event)">
                                 @if ($errors->has('hra'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('hra') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="email">Travel Allowance:</label>
                            <div class="col-sm-5">
                                <span class="error text-danger"></span>
                                <input type="text" class="form-control" name="travel_allowance" id="travel_allowance" placeholder="Travel Allowance (in numbers only)" value="{{$salary[0]->travel_allowance}}" required="required" autocomplete="off" onchange="get_total()" onkeypress="return isNumber(event)">
                                 @if ($errors->has('travel_allowance'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('travel_allowance') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="extra">Extra:</label>
                            <div class="col-sm-5">
                                <span class="error text-danger"></span>
                                <input type="text" class="form-control" name="extra" id="extra" value="{{$salary[0]->extra}}" placeholder="Extra (in numbers only)" required="required" autocomplete="off" onchange="get_total()" onkeypress="return isNumber(event)">
                                 @if ($errors->has('extra'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('extra') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="extra">Total:</label>
                            <div class="col-sm-5">
                                <span class="error text-danger"></span>
                                <input type="text" class="form-control" name="total" id="total" value="{{$salary[0]->total}}" placeholder="Click me to get the total" readonly="readonly" onfocus="get_total()"> 
                                 @if ($errors->has('total'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('total') }}</strong>
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


