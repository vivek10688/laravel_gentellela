@include('partials.header')
@include('partials.sidebar') 
            <div class="right_col" role="main">
                <div class="col-md-12 col-sm-8 col-xs-12">
                    <div class="tile">
                    <div class="t-header">
                        <div class="th-title"><span class="glyphicon glyphicon-align-justify" aria-hidden="true"></span> View All Users</div>
                    </div>
                    <div class="t-body tb-padding">
                        <div class="row">
                            <table class="table table-striped table-bordered table-hover display nowrap" cellspacing="0" width="100%" id="myTable1">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Year</th>
                                        <th>Month</th>
                                        <th>Basic</th>
                                        <th>House rent allowance</th>
                                        <th>Travel Allowance</th>
                                        <th>Extra</th>
                                        <th>Total</th>
                                        <th>Last Updated</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if(!empty($salary)){ $i=1; foreach ($salary as $sal) {?>
                                    <tr>
                                         <td>
                                            <?php echo $i++; ?>
                                        </td>
                                        <td>
                                            <?php foreach ($users as $user) {
                                                if($sal->user_id==$user->id){ echo ucfirst($user->first_name.' '.$user->last_name); 
                                            } }?>
                                        </td>
                                        <td>
                                            <?php echo $sal->year; ?>
                                        </td>
                                        <td>
                                            <?php echo $sal->month; ?>
                                        </td>
                                        <td>
                                            <?php echo $sal->basic_salary;?>
                                        </td>
                                        <td>
                                            <?php echo $sal->hra;?>
                                        </td>
                                        <td>
                                            <?php echo $sal->travel_allowance;?>
                                        </td>
                                        <td>
                                            <?php echo $sal->extra;?>
                                        </td>
                                        <td>
                                            <?php echo $sal->total;?>
                                        </td>
                                        <td>
                                            <?php echo date("d-m-Y", strtotime($sal->created_on)); ?>
                                        </td>
                                        <td>
                                            <?php if($sal->is_active==1){ echo 'Active';}else{echo 'Inactive';} ?>
                                        </td>
                                        <td>
                                            <meta name="_token" content="{{ csrf_token() }}"/>
                                            <a class="glyphicon glyphicon-edit" href="<?php echo url('edit_salary/'.$sal->id)?>" ></a> | <a class="glyphicon glyphicon-trash" href="#" onclick="delete_record('users_salary','<?php echo $sal->id?>')"></a> | <a class="glyphicon glyphicon-retweet" href="#" onclick="change_status('users_salary','<?php echo $sal->id?>','<?php echo $sal->is_active?>')"></a>
                                        </td>
                                    </tr>
                                    <?php }}?>
                                </tbody>
                            </table>
                    </div>
                    </div>
                </div>
                </div>
            </div>
@include('partials.footer')

<script type="text/javascript">
    $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
    }
});

    var dtTable = $('#myTable1').DataTable({
        responsive: true,
    });
</script>