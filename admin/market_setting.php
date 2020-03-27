<?php
include('../api/config/Database.php');
include('../api/models/session.php');
if(!isset($_SESSION['role']) || empty($_SESSION['role'])  || $_SESSION['role']!='Admin')
    {
        session_destroy();
        session_unset();
        header("Location: " . BASE_URL);
    }

    // if(isset($_POST['marketname'])){
    //   $userClass->market_list();
    // }
?>
<?Php include_once('inc/header.php'); ?>
                    <div class="app-inner-layout app-inner-layout-page">
                        <div class="app-inner-layout__wrapper">
                            <div class="app-inner-layout__content">
                                <div class="tab-content">
                                    <div class="container-fluid">
                                        <div class="row">
                                          <div class="col-md-12 col-lg-6 col-xl-6">
                                              <div class="main-card mb-3 card">
                                                  <div class="card-body"><h5 class="card-title">Add New Market</h5>
                                                    <hr>
                                                    <?php if(isset($_GET['result'])){ echo '<div class="alert alert-success">'.$_GET['result'].'</div>';} ?>
                                                      <form action="../api/controllers/market_add.php" method="post" enctype="multipart/form-data">
                                                          <div class="position-relative form-group">
                                                            <label for="marketname" class="">Market Name</label>
                                                            <input name="marketname" id="marketname" type="text" class="form-control">
                                                          </div>
                                                          <div class="position-relative form-group">
                                                            <label for="state" class="">Choose State Location of the Market</label>
                                                            <select class="form-control" name="marketstate" id="marketstate">
                                                              <option value="" selected="selected">Select State</option>
                                                              <option value="Abia" label="Abia">Abia</option>
                                                              <option value="Abuja" label="Abuja">Abuja</option>
                                                              <option value="Adamawa" label="Adamawa">Adamawa</option>
                                                              <option value="Akwa Ibom" label="Akwa Ibom">Akwa Ibom</option>
                                                              <option value="Anambra" label="Anambra">Anambra</option>
                                                              <option value="Bauchi" label="Bauchi">Bauchi</option>
                                                              <option value="Bayelsa" label="Bayelsa">Bayelsa</option>
                                                              <option value="Benue" label="Benue">Benue</option>
                                                              <option value="Borno" label="Borno">Borno</option>
                                                              <option value="Cross River" label="Cross River">Cross River</option>
                                                              <option value="Delta" label="Delta">Delta</option>
                                                              <option value="Ebonyi" label="Ebonyi">Ebonyi</option>
                                                              <option value="Edo" label="Edo">Edo</option>
                                                              <option value="Ekiti" label="Ekiti">Ekiti</option>
                                                              <option value="Enugu" label="Enugu">Enugu</option>
                                                              <option value="Gombe" label="Gombe">Gombe</option>
                                                              <option value="Imo" label="Imo">Imo</option>
                                                              <option value="Jigawa" label="Jigawa">Jigawa</option>
                                                              <option value="Kaduna" label="Kaduna">Kaduna</option>
                                                              <option value="Kano" label="Kano">Kano</option>
                                                              <option value="Katsina" label="Katsina">Katsina</option>
                                                              <option value="Kebbi" label="Kebbi">Kebbi</option>
                                                              <option value="Kogi" label="Kogi">Kogi</option>
                                                              <option value="Kwara" label="Kwara">Kwara</option>
                                                              <option value="Lagos" label="Lagos">Lagos</option>
                                                              <option value="Nasarawa" label="Nasarawa">Nasarawa</option>
                                                              <option value="Niger" label="Niger">Niger</option>
                                                              <option value="Ogun" label="Ogun">Ogun</option>
                                                              <option value="Ondo" label="Ondo">Ondo</option>
                                                              <option value="Osun" label="Osun">Osun</option>
                                                              <option value="Oyo" label="Oyo">Oyo</option>
                                                              <option value="Plateau" label="Plateau">Plateau</option>
                                                              <option value="Rivers" label="Rivers">Rivers</option>
                                                              <option value="Sokoto" label="Sokoto">Sokoto</option>
                                                              <option value="Taraba" label="Taraba">Taraba</option>
                                                              <option value="Yobe" label="Yobe">Yobe</option>
                                                              <option value="Zamfara" label="Zamfara">Zamfara</option>
                                                            </select>
                                                          </div>
                                                          <div class="form-group row">
                                                                <div class="col-md-12">
                                                                    <label for="exampleEmail5">Product Categories</label>
                                                                    <select multiple="multiple" class="multiselect-dropdown form-control" name="marketcategories[]" id="marketcategories[]" required="required">
                                                                        <?php $userClass->category_dropdown_list(); ?>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                          <div class="position-relative form-group">
                                                              <label for="marketaddress" class="">Market Address</label>
                                                              <textarea class="form-control" rows="2" id="marketaddress" name="marketaddress"></textarea>
                                                          </div>
                                                          <div class="position-relative form-group">
                                                            <label for="marketchair" class="">Market Chairman Name</label>
                                                            <input name="marketchairman" id="marketchairman" type="text" class="form-control">
                                                          </div>
                                                          <div class="position-relative form-group">
                                                            <label for="marketfile" class="">Upload market Image</label>
                                                            <input name="marketimg" id="marketimg" type="file" class="form-control-file">
                                                                <p class="form-text text-danger"><em>Icon image must be in png, jpg or gif, and must me 50 X 50 in dimension.</em></p>
                                                          </div>
                                                          <button type="submit" class="mt-1 btn btn-primary" id="marketBtn">Create Category</button>
                                                      </form>
                                                  </div>
                                              </div>
                                          </div>
                                          <div class="col-md-12 col-lg-6 col-xl-6">
                                            <div class="main-card mb-3 card">
                                                <div class="card-header">Market List</div>
                                                <ul class="todo-list-wrapper list-group list-group-flush">
                                                    <?php $userClass->market_list(); ?>
                                                </ul>
                                            </div>
                                          </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
<?Php include_once('inc/footer.php'); ?>
