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
                    <div class="app-inner-layout chat-layout">
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
                        <div class="app-inner-layout__wrapper">
                            <div class="app-inner-layout__content card">
                                <div class="table-responsive">
                                    <div class="app-inner-layout__top-pane">
                                        <!-- <div class="pane-left">
                                            <div class="mobile-app-menu-btn">
                                                <button type="button" class="hamburger hamburger--elastic">
                                        <span class="hamburger-box">
                                            <span class="hamburger-inner"></span>
                                        </span>
                                                </button>
                                            </div>
                                            <div class="avatar-icon-wrapper mr-2">
                                                <div class="badge badge-bottom btn-shine badge-success badge-dot badge-dot-lg"></div>
                                                <div class="avatar-icon avatar-icon-xl rounded">
                                                	<img width="82" src="images/avatars/avatar.jpg" alt="">
                                                </div>
                                            </div>
                                            <h4 class="mb-0 text-nowrap">Chad Evans
                                                <div class="opacity-7">Last Seen Online: <span class="opacity-8">10 minutes ago</span>
                                                </div>
                                            </h4>
                                        </div> -->
                                        <div class="pane-right">
                                            <div class="btn-group dropdown">
                                                <button type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="ml-2 dropdown-toggle btn btn-primary">
			                                        <span class="opacity-7 mr-1">
			                                            <i class="fa fa-cog"></i>
			                                        </span> Actions
                                                </button>
                                                <div tabindex="-1" role="menu" aria-hidden="true"
                                                     class="dropdown-menu dropdown-menu-right">
                                                    <ul class="nav flex-column">
                                                        <li class="nav-item-header nav-item">Activity</li>
                                                        <li class="nav-item"><a href="javascript:void(0);"
                                                                                class="nav-link">Chat
                                                            <div class="ml-auto badge badge-pill badge-info">8</div>
                                                        </a></li>
                                                        <li class="nav-item"><a href="javascript:void(0);"
                                                                                class="nav-link">Recover Password</a>
                                                        </li>
                                                        <li class="nav-item-header nav-item">My Account</li>
                                                        <li class="nav-item"><a href="javascript:void(0);"
                                                                                class="nav-link">Settings
                                                            <div class="ml-auto badge badge-success">New</div>
                                                        </a></li>
                                                        <li class="nav-item"><a href="javascript:void(0);"
                                                                                class="nav-link">Messages
                                                            <div class="ml-auto badge badge-warning">512</div>
                                                        </a></li>
                                                        <li class="nav-item"><a href="javascript:void(0);"
                                                                                class="nav-link">Logs</a></li>
                                                        <li class="nav-item-divider nav-item"></li>
                                                        <li class="nav-item-btn nav-item">
                                                            <button class="btn-wide btn-shadow btn btn-danger btn-sm">
                                                                Cancel
                                                            </button>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="chat-wrapper">
                                        <div class="chat-box-wrapper">
                                            <div>
                                                <div class="avatar-icon-wrapper mr-1">
                                                    <div class="badge badge-bottom btn-shine badge-success badge-dot badge-dot-lg"></div>
                                                    <div class="avatar-icon avatar-icon-lg rounded">
                                                        <img src="images/avatars/avatar.jpg" alt="">
                                                    </div>
                                                </div>
                                            </div>
                                            <div>
                                                <div class="chat-box">No message yet!</div>
                                            </div>
                                        </div>
                                        <!-- <div class="float-right">
                                            <div class="chat-box-wrapper chat-box-wrapper-right">
                                                <div>
                                                    <div class="chat-box">Expound the actual teachings of the great
                                                        explorer of the truth, the master-builder of human happiness.
                                                    </div>
                                                    <small class="opacity-6">
                                                        <i class="fa fa-calendar-alt mr-1"></i>
                                                        11:01 AM | Yesterday
                                                    </small>
                                                </div>
                                                <div>
                                                    <div class="avatar-icon-wrapper ml-1">
                                                        <div class="badge badge-bottom btn-shine badge-success badge-dot badge-dot-lg"></div>
                                                        <div class="avatar-icon avatar-icon-lg rounded"><img
                                                                src="images/avatars/2.jpg"
                                                                alt=""></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="chat-box-wrapper">
                                            <div>
                                                <div class="avatar-icon-wrapper mr-1">
                                                    <div class="badge badge-bottom btn-shine badge-success badge-dot badge-dot-lg"></div>
                                                    <div class="avatar-icon avatar-icon-lg rounded"><img
                                                            src="images/avatars/2.jpg"
                                                            alt=""></div>
                                                </div>
                                            </div>
                                            <div>
                                                <div class="chat-box">But I must explain to you how all this mistaken
                                                    idea of denouncing pleasure and praising pain was born and I will
                                                    give you a complete account of the system.
                                                </div>
                                                <small class="opacity-6">
                                                    <i class="fa fa-calendar-alt mr-1"></i>
                                                    11:01 AM | Yesterday
                                                </small>
                                            </div>
                                        </div>
                                        <div class="float-right">
                                            <div class="chat-box-wrapper chat-box-wrapper-right">
                                                <div>
                                                    <div class="chat-box">Denouncing pleasure and praising pain was born
                                                        and I will give you a complete account.
                                                    </div>
                                                    <small class="opacity-6">
                                                        <i class="fa fa-calendar-alt mr-1"></i>
                                                        11:01 AM | Yesterday
                                                    </small>
                                                </div>
                                                <div>
                                                    <div class="avatar-icon-wrapper ml-1">
                                                        <div class="badge badge-bottom btn-shine badge-success badge-dot badge-dot-lg"></div>
                                                        <div class="avatar-icon avatar-icon-lg rounded"><img
                                                                src="images/avatars/3.jpg"
                                                                alt=""></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="chat-box-wrapper">
                                            <div>
                                                <div class="avatar-icon-wrapper mr-1">
                                                    <div class="badge badge-bottom btn-shine badge-success badge-dot badge-dot-lg"></div>
                                                    <div class="avatar-icon avatar-icon-lg rounded"><img
                                                            src="images/avatars/2.jpg"
                                                            alt=""></div>
                                                </div>
                                            </div>
                                            <div>
                                                <div class="chat-box">Born and I will give you a complete account of the
                                                    system.
                                                </div>
                                                <small class="opacity-6">
                                                    <i class="fa fa-calendar-alt mr-1"></i>
                                                    11:01 AM | Yesterday
                                                </small>
                                            </div>
                                        </div>
                                        <div class="float-right">
                                            <div class="chat-box-wrapper chat-box-wrapper-right">
                                                <div>
                                                    <div class="chat-box">The master-builder of human happiness.</div>
                                                    <small class="opacity-6">
                                                        <i class="fa fa-calendar-alt mr-1"></i>
                                                        11:01 AM | Yesterday
                                                    </small>
                                                </div>
                                                <div>
                                                    <div class="avatar-icon-wrapper ml-1">
                                                        <div class="badge badge-bottom btn-shine badge-success badge-dot badge-dot-lg"></div>
                                                        <div class="avatar-icon avatar-icon-lg rounded"><img
                                                                src="images/avatars/3.jpg"
                                                                alt=""></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="chat-box-wrapper">
                                            <div>
                                                <div class="avatar-icon-wrapper mr-1">
                                                    <div class="badge badge-bottom btn-shine badge-success badge-dot badge-dot-lg"></div>
                                                    <div class="avatar-icon avatar-icon-lg rounded"><img
                                                            src="images/avatars/2.jpg" alt=""></div>
                                                </div>
                                            </div>
                                            <div>
                                                <div class="chat-box">Mistaken idea of denouncing pleasure and praising
                                                    pain was born and I will give you
                                                </div>
                                                <small class="opacity-6">
                                                    <i class="fa fa-calendar-alt mr-1"></i>
                                                    11:01 AM | Yesterday
                                                </small>
                                            </div>
                                        </div> -->
                                    </div>
                                    <!-- <div class="app-inner-layout__bottom-pane d-block text-center">
                                        <div class="mb-0 position-relative row form-group">
                                            <div class="col-sm-12">
                                                <input placeholder="Write here and hit enter to send..." type="text"
                                                       class="form-control-lg form-control">
                                            </div>
                                        </div>
                                    </div> -->
                                </div>
                            </div>
                            <div class="app-inner-layout__sidebar card">
                                <div class="app-inner-layout__sidebar-header">
                                    <ul class="nav flex-column">
                                        <li class="pt-4 pl-3 pr-3 pb-3 nav-item">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text">
                                                        <i class="fa fa-search"></i>
                                                    </div>
                                                </div>
                                                <input placeholder="Search..." type="text" class="form-control"></div>
                                        </li>
                                        <li class="nav-item-header nav-item">Messaging</li>
                                    </ul>
                                </div>
                                <ul class="nav flex-column">
                                	<li class="nav-item">
                                		<button type="button" tabindex="0" class="dropdown-item active">
                                            <div class="widget-content p-0">
                                                <div class="widget-content-wrapper">
                                                    <div class="widget-content-left mr-3">
                                                        <div class="avatar-icon-wrapper">
                                                            <div class="badge badge-bottom badge-danger badge-dot badge-dot-lg"></div>
                                                            <div class="avatar-icon"><img src="images/avatars/avatar.jpg" alt=""></div>
                                                        </div>
                                                    </div>
                                                    <div class="widget-content-left">
                                                        <div class="widget-subheading">No chat initiated yet!</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </button>
                                	</li>
                                    <!-- <li class="nav-item">
                                        <button type="button" tabindex="0" class="dropdown-item active">
                                            <div class="widget-content p-0">
                                                <div class="widget-content-wrapper">
                                                    <div class="widget-content-left mr-3">
                                                        <div class="avatar-icon-wrapper">
                                                            <div class="badge badge-bottom badge-success badge-dot badge-dot-lg"></div>
                                                            <div class="avatar-icon"><img
                                                                    src="images/avatars/3.jpg"
                                                                    alt=""></div>
                                                        </div>
                                                    </div>
                                                    <div class="widget-content-left">
                                                        <div class="widget-heading">Chad Evans</div>
                                                        <div class="widget-subheading">Vivamus elementum semper nisi.
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </button>
                                    </li> -->
                                </ul>
                                <!-- <div class="app-inner-layout__sidebar-footer pb-3">
                                    <ul class="nav flex-column">
                                        <li class="nav-item-divider nav-item"></li>
                                        <li class="nav-item-header nav-item">Offline Friends</li>
                                        <li class="text-center p-2 nav-item">
                                            <div class="avatar-wrapper avatar-wrapper-overlap">
                                                <div class="avatar-icon-wrapper">
                                                    <div class="badge badge-bottom badge-danger badge-dot badge-dot-lg"></div>
                                                    <div class="avatar-icon rounded"><img
                                                            src="images/avatars/5.jpg"
                                                            alt=""></div>
                                                </div>
                                                <div class="avatar-icon-wrapper">
                                                    <div class="badge badge-bottom badge-danger badge-dot badge-dot-lg"></div>
                                                    <div class="avatar-icon rounded"><img
                                                            src="images/avatars/10.jpg"
                                                            alt=""></div>
                                                </div>
                                                <div class="avatar-icon-wrapper">
                                                    <div class="badge badge-bottom badge-danger badge-dot badge-dot-lg"></div>
                                                    <div class="avatar-icon rounded"><img
                                                            src="images/avatars/7.jpg"
                                                            alt=""></div>
                                                </div>
                                                <div class="avatar-icon-wrapper">
                                                    <div class="badge badge-bottom badge-danger badge-dot badge-dot-lg"></div>
                                                    <div class="avatar-icon rounded"><img
                                                            src="images/avatars/8.jpg"
                                                            alt=""></div>
                                                </div>
                                                <div class="avatar-icon-wrapper">
                                                    <div class="badge badge-bottom badge-danger badge-dot badge-dot-lg"></div>
                                                    <div class="avatar-icon rounded"><img
                                                            src="images/avatars/1.jpg"
                                                            alt=""></div>
                                                </div>
                                                <div class="avatar-icon-wrapper">
                                                    <div class="badge badge-bottom badge-danger badge-dot badge-dot-lg"></div>
                                                    <div class="avatar-icon rounded"><img
                                                            src="images/avatars/2.jpg"
                                                            alt=""></div>
                                                </div>
                                                <div class="avatar-icon-wrapper">
                                                    <div class="badge badge-bottom badge-danger badge-dot badge-dot-lg"></div>
                                                    <div class="avatar-icon rounded"><img
                                                            src="images/avatars/3.jpg"
                                                            alt=""></div>
                                                </div>
                                                <div class="avatar-icon-wrapper">
                                                    <div class="badge badge-bottom badge-danger badge-dot badge-dot-lg"></div>
                                                    <div class="avatar-icon rounded"><img
                                                            src="images/avatars/4.jpg"
                                                            alt=""></div>
                                                </div>
                                                <div class="avatar-icon-wrapper avatar-icon-add">
                                                    <div class="avatar-icon rounded"><i>+</i></div>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="nav-item-btn text-center nav-item">
                                            <button class="btn-wide btn-pill btn btn-success btn-sm">Offline Group
                                                Conversation
                                            </button>
                                        </li>
                                    </ul>
                                </div> -->
                            </div>
                        </div>
                    </div>
<?php include 'inc/footer.php'; ?>