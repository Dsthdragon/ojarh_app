<div class="section-content pt-5"
     style="background-image: url(assets/images/bg_overlay.jpg); background-repeat: no-repeat; background-size: cover; background-position: center center;">
    <div class="container">
        <div class="wraper-inner">
            <div class="row">
                <div class="col-12 col-md-12 bg-white mb-5">
                    <div class="formaccount formlogin">
                        <form method="post" action="/account" id="create_customer" accept-charset="UTF-8">
                            <input type="hidden" name="form_type" value="create_customer"/>
                            <input type="hidden" name="utf8" value="✓"/>
                            <h1 class="page-title" style="color:  #C60219 !important;">Quick Order Form</h1>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <div class="col-md -6">
                                            <label for="FirstName">Select Product Category</label>
                                            <select class="form-control" id="product_category" name="product_category">
                                                <option value="">Category</option>
                                                <option value="1">Category 1</option>
                                                <option value="2">Category 2</option>
                                                <option value="3">Category 3</option>
                                                <option value="4">Category 4</option>
                                                <option value="5">Category 5</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <label for="FirstName">Sub-category</label>
                                            <select class="form-control" id="product_category"
                                                    name="product_category">
                                                <option value="">Sub Category</option>
                                                <option value="1">Sub Category 1</option>
                                                <option value="2">Sub Category 2</option>
                                                <option value="3">Sub Category 3</option>
                                                <option value="4">Sub Category 4</option>
                                                <option value="5">Sub Category 5</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <label for="FirstName">Select Product</label>
                                            <select class="form-control" id="product_category"
                                                    name="product_category">
                                                <option value="">Product</option>
                                                <option value="1">Product 1</option>
                                                <option value="2">Product 2</option>
                                                <option value="3">Product 3</option>
                                                <option value="4">Product 4</option>
                                                <option value="5">Product 5</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <label for="FirstName">Quantity</label>
                                            <input class="form-control" type="number" name="customer[email]" class=""
                                                   autocorrect="off" autocapitalize="off">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="LastName">Full Name</label>
                                        <input class="form-control" type="text" name="customer[last_name]">
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-md-6">
                                            <label for="Email">Email</label>
                                            <input class="form-control" type="email" name="customer[email]" class=""
                                                   autocorrect="off" autocapitalize="off">
                                        </div>
                                        <div class="col-md-6">
                                            <label for="Email">Phone Number</label>
                                            <input class="form-control" type="number" name="customer[phone]">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="LastName">Delivery Address:</label>
                                        <input class="form-control" type="text" name="customer[last_name]">
                                    </div>
                                    <div class="form-group">
                                        <label for="CreatePassword">Additional Message</label>
                                        <textarea id="message" rows="2" class="form-control"></textarea>
                                    </div>
                                    <p class="text-center cr_acc">
                                        <input type="submit" value="Place Order" class="btn btn-danger btn-lg">
                                    </p>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>