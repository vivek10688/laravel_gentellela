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
                                        <th>Email</th>
                                        <th>Username</th>
                                        <th>Last Updated</th>
                                        <th>Status</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if(!empty($users)){ $i=1; foreach ($users as $user) {?>
                                    <tr>
                                         <td>
                                            <?php echo $i++; ?>
                                        </td>
                                        <td>
                                            <?php echo ucfirst($user->first_name.' '.$user->last_name); ?>
                                        </td>
                                        <td>
                                            <?php echo $user->email; ?>
                                        </td>
                                        <td>
                                            <?php echo $user->username; ?>
                                        </td>
                                        <td>
                                            <?php echo date("d-m-Y", strtotime($user->created_on)); ?>
                                        </td>
                                        <td>
                                            <?php if($user->is_active==1){ echo 'Active';}else{echo 'Inactive';} ?>
                                        </td>
                                        <td>
                                            <meta name="_token" content="{{ csrf_token() }}"/>
                                            <a class="glyphicon glyphicon-edit" href="<?php echo url('edit_users/'.$user->id)?>" ></a> | <a class="glyphicon glyphicon-trash" href="#" onclick="delete_record('users','<?php echo $user->id?>')"></a> | <a class="glyphicon glyphicon-retweet" href="#" onclick="change_status('users','<?php echo $user->id?>','<?php echo $user->is_active?>')"></a>
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
</script>