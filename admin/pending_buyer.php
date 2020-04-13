<?php
include('../api/config/Database.php');
include('../api/models/session.php');
include('can_access.php');
?>
<?Php include_once('inc/header.php'); ?>
    <div class="app-inner-layout app-inner-layout-page">
        <div class="app-inner-layout__wrapper">
            <div class="app-inner-layout__content">
                <div class="tab-content">
                    <div class="container-fluid">
                        <div class="card no-shadow bg-transparent no-border rm-borders mb-3">
                            <div class="card">
                                    <div class="container">
                                        <div class="row m-5">
                                            <div class="col-xs-12 col-sm-12 col-md-12">
                                                <div class="heading heading-2 text-center mb-70">
                                                    <h2 class="heading--title">List of Pending Buyers</h2>
                                                </div>
                                                <div id="result"></div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="main-card mb-3 card">
                                                    <div class="card-body">
                                                        <table style="width: 100%;" id="example" class="table table-hover table-striped table-bordered">
                                                            <thead>
                                                            <tr>
                                                                <th>Buyer ID</th>
                                                                <th>Username</th>
                                                                <th>Full Name</th>
                                                                <th>Email</th>
                                                                <th>Phone</th>
                                                                <th>Date Registered</th>
                                                                <th>status</th>
                                                                <th>Action</th>
                                                            </tr>
                                                            </thead>
                                                            <tbody>
                                                            <?php foreach($userClass->view_buyers('pending') as $key => $value): ?>
                                                                <tr>
                                                                    <td><?= $value['userid']; ?></td>
                                                                    <td><?= $value['username']; ?></td>
                                                                    <td><?= $value['fname']; ?> <?= $value['lname']; ?></td>
                                                                    <td><?= $value['email']; ?></td>
                                                                    <td><?= $value['phone']; ?></td>
                                                                    <td><?= $value['date_reg']; ?></td>
                                                                    
                                                                    <?php if($value['status']==1): ?>
                                                                        <td><span class="badge badge-success">Active</span></td>
                                                                    <?php elseif($value['status']==0): ?>
                                                                        <td><span class="badge badge-warning">Pending</span></td> 
                                                                    <?php elseif($value['status']==2): ?>
                                                                        <td><span class="badge badge-danger">Inactive</span></td> 
                                                                    <?php endif; ?>
                                                                    <td>
                                                                        <button class="mb-2 mr-2 btn btn-shadow btn-success btn-sm" onclick="activateSeller('<?= $value['userid'] ?>', 'Buyer')">
                                                                            <i class="fa fa-check btn-icon-wrapper"></i>
                                                                        </button>
                                                                        <a href="seller_details.php?sellerid=<?= $value['userid'] ?>" class="mb-2 btn btn-shadow btn-info btn-sm">
                                                                            <i class="fa fa-address-card btn-icon-wrapper"></i>
                                                                        </a>
                                                                    </td> 
                                                                </tr>
                                                            <?php endforeach; ?>
                                                            </tbody>
                                                            <!-- <tfoot>
                                                                <tr>
                                                                    <th>Product ID</th>
                                                                    <th>Product title</th>
                                                                    <th>Product Category</th>
                                                                    <th>Product Availability</th>
                                                                    <th>Status</th>
                                                                    <th>Created On</th>
                                                                </tr>
                                                            </tfoot> -->
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
<?php include_once('inc/footer.php'); ?>
