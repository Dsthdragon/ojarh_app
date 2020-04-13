<?php
include('../api/config/Database.php');
include('../api/models/session.php');
if(!isset($_SESSION['role']) || empty($_SESSION['role'])  || $_SESSION['role']!='Seller')
{
    session_destroy();
    session_unset();
    header("Location: " . BASE_URL);
}
?>
<?php include 'inc/header.php'; ?>
<div class="app-inner-layout app-inner-layout-page">
    <div class="app-inner-layout__wrapper">
        <div class="app-inner-layout__content">
            <div class="tab-content">
                <div class="container-fluid">
                    <?php 
                    if($acctType->account_type == 'Starter'){
                        echo '<div class="card-body row">
                        <div class="alert alert-danger show col-md-12" role="alert">
                        You can do more when you upgrade your account to BASIC &amp; PREMIUM!
                        <a href="#"><button class="btn btn-warning btn-sm"  data-toggle="modal" data-target="#exampleModal">Upgrade Now!</button></a>
                        </div>
                        </div>';
                    }elseif($acctType->account_type == 'Basic'){
                        echo '<div class="card-body row">
                        <div class="alert alert-danger show col-md-12" role="alert">
                        You can do more when you upgrade your account to PREMIUM!
                        <a href="#"><button class="btn btn-warning btn-sm" data-toggle="modal" data-target="#exampleModal">Upgrade Now!</button></a>
                        </div>
                        </div>';
                    }
                    ?>
                    <?php 
                    if($acctType->account_type == 'Premium' && $userClass->bizDetails($userid) == 'empty'){
                        echo '<div class="card-body row">
                        <div class="alert alert-danger show col-md-12" role="alert">
                        You have to update your business information <a href="business_setting.php"><button class="btn btn-info btn-sm">Update business profile</button></a>
                        </div>
                        </div>';
                    }else{

                    }
                    ?>
                    <div class="card no-shadow bg-transparent no-border rm-borders mb-3">
                        <div class="card">
                            <div class="container">
                                <div class="row m-5">
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="heading heading-2 text-center mb-70">
                                            <h2 class="heading--title">My Ads</h2>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="main-card mb-3 card">
                                            <div class="card-body">
                                                <table style="width: 100%;" id="example" class="table table-hover table-striped table-bordered table-responsive">
                                                    <thead style="width: 100%;">
                                                        <tr style="width: 100%;">
                                                            <th>IMG</th>
                                                            <th>Link</th>
                                                            <th>End Date</th>
                                                            <th>Created On</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php foreach ($userClass->get_user_ads($_SESSION['userid']) as $key => $value): ?>
                                                            <tr>
                                                                <td>
                                                                    <img src='../public/ads/<?= $value['img'] ?>' width="150" />
                                                                </td>
                                                                <td><?= $value['link'] ?></td>
                                                                <td><?= $value['end_date'] ?></td>
                                                                <td><?= $value['created'] ?></td>
                                                            </tr>
                                                        <?php endforeach ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include 'inc/footer.php'; ?>