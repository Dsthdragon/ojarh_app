<?php
class Users{
    //DB Stuff
    private $conn;
    private $table = 'users';

    public $role;
    public $userid;
    public $username;
    public $password;
    public $email;
    public $fname;
    public $lname;
    public $phone;
    public $state;
    public $address;
    public $confCode;
    public $status;
    public $datereg;

    public $marketid;
    public $marketname;
    public $marketchair;
    public $marketstate;
    public $marketaddress;
    public $marketdescrip;
    public $marketimg;
    public $marketstatus;
    public $created_by;


    public $brandid;
    public $brandtitle;
    public $brandimg;
    public $brandcreated;

    public $file_name;
    public $file_tmp;
    public $file_type;
    public $file_size;

    public $catid;
    public $catname;
    public $catdescription;
    public $created_at;
    public $t_product;

    public $plan;
    public $lastlogin;

    public $title;
    public $body;
    public $generatedlink;
    public $butt;

    public function __construct($db){
        $this->conn = $db;
    }

    public function getUser(){
        return $this->user;
    }

    //create_user
    public function create_user(){
        $this->userid = mt_rand(100000, 999999);
        $this->status = 0;
        $this->confCode = 'Starter';

        if($this->isUsernameExit($this->username)) {
            echo 'username';
            return false;
        }

        if($this->isEmailExit()){
            echo 'email';
            return false;
        }

        $query = "INSERT INTO users (userid,username,email,password,fname,lname,phone,country,state,address,currency,status,role) VALUES (:userid,:username,:email,:password,:fname,:lname,:phone,:country,:state,:address,:currency,:status,:role)";

        $stmt = $this->conn->prepare($query);

        $this->userid = htmlspecialchars(strip_tags($this->userid));
        $this->username = htmlspecialchars(strip_tags($this->username));
        $this->email = htmlspecialchars(strip_tags($this->email));
        $this->password = htmlspecialchars(strip_tags(password_hash($this->password, PASSWORD_BCRYPT, array("cost" => 12))));
        $this->fname = htmlspecialchars(strip_tags($this->fname));
        $this->lname = htmlspecialchars(strip_tags($this->lname));
        $this->phone = htmlspecialchars(strip_tags($this->phone));
        $this->state = htmlspecialchars(strip_tags($this->state));
        $this->country = htmlspecialchars(strip_tags($this->country));
        $this->address = htmlspecialchars(strip_tags($this->address));
        $this->status = htmlspecialchars(strip_tags($this->status));
        $this->role = htmlspecialchars(strip_tags($this->role));
        if($this->role == 'Admin' || $this->role == 'Sub Admin'){
            $this->status = 1;
        }

        if($this->role == 'Seller'){
            $this->currency = '#';
        }elseif($this->role == 'International'){
            $this->currency = '$';
        }

        if($this->role == 'Buyer' && $this->country == 'Nigeria'){
            $this->currency = '#';
        }else{
            $this->currency = '$';
        }

        $stmt->bindValue('userid', $this->userid);
        $stmt->bindValue('username', $this->username);
        $stmt->bindValue('email', $this->email);
        $stmt->bindValue('password', $this->password);
        $stmt->bindValue('fname', $this->fname);
        $stmt->bindValue('lname', $this->lname);
        $stmt->bindValue('phone', $this->phone);
        $stmt->bindValue('state', $this->state);
        $stmt->bindValue('address', $this->address);
        $stmt->bindValue('status', $this->status);
        $stmt->bindValue('country', $this->country);
        $stmt->bindValue('role', $this->role);
        $stmt->bindValue('currency', $this->currency);

        if($stmt->execute()){
            $this->userid = $this->userid;
            $this->title = "New ".$this->role." Registration";
            $this->body = "This Seller Just Registered". ' - ' .$this->username;
            $this->generatedlink = "seller_details.php?sellerid=".$this->userid;
            $this->notifications();

            if($this->role == 'Seller' || $this->role == 'International'){
                $this->userAcctType($this->userid, 'Starter');
                return true;
            }else if($this->role == 'Buyer'){
                $this->userAcctType($this->userid, 'Buyer');
                return true;
            }
            return true;
        }else{
            echo 'Could not create account, try again later!';
            return false;
        }
    }

    public function userAcctType($userid, $account_type){

            $query = "INSERT INTO account_info (userid,account_type) VALUES (:userid,:account_type)";

            $stmt = $this->conn->prepare($query);

            $stmt->bindValue('userid', $userid);
            $stmt->bindValue('account_type', $account_type);

            if($stmt->execute()){
                return true;
            }
            printf("Error: %s.\n", $stmt->error);
            return false;
    }

    public function create_ads(){
        
    }

    public function upgrade_plan(){

        if($this->checkCurrentAcctType()){
            echo 'already';
            return false;
        }

        if($this->durate == 1){
            $this->startDate =  date('Y-m-d');
            $this->endDate = date('Y-m-d', strtotime($this->startDate. ' +30 days')); // Y-m-d
        }elseif($this->durate == 6){
            $this->startDate =  date('Y-m-d');
            $this->endDate = date('Y-m-d', strtotime($this->startDate. ' +180 days')); // Y-m-d
        }elseif($this->durate == 12){
            $this->startDate =  date('Y-m-d');
            $this->endDate = date('Y-m-d', strtotime($this->startDate. ' +365 days')); // Y-m-d
        }

        $query = "UPDATE account_info SET account_type=:account_type, durate=:durate, startDate=:startDate, endDate=:endDate WHERE userid=:userid";

        $stmt = $this->conn->prepare($query);

        $this->plan = htmlspecialchars(strip_tags($this->plan));
        $this->durate = htmlspecialchars(strip_tags($this->durate));
        $this->startDate = htmlspecialchars(strip_tags($this->startDate));
        $this->endDate = htmlspecialchars(strip_tags($this->endDate));
        $this->userid = htmlspecialchars(strip_tags($this->userid));

        $stmt->bindValue('account_type', $this->plan);
        $stmt->bindValue('durate', $this->durate);
        $stmt->bindValue('startDate', $this->startDate);
        $stmt->bindValue('endDate', $this->endDate);
        $stmt->bindValue('userid', $this->userid);

        if($stmt->execute()){
            $userid = $this->userid;

            $this->userid = $this->userid;
            $this->title = 'Seller Account Upgraded' ;
            $this->body = 'A Seller just upgraded his/her account to: '. $this->plan;
            $this->generatedlink = "seller_details.php?sellerid=".$this->userid;
            $this->notifications();
            // $this->updateAcct($this->durate);
            $this->paymentHistory($this->durate, 'Account Upgrade', 'Admin');
            $this->logout();

            return true;
        }
        printf("Error: %s.\n", $stmt->error);
        return false;
    }

    public function checkCurrentAcctType(){
        $query = "SELECT * FROM account_info WHERE userid=:userid AND account_type=:confCode";
        $stmt = $this->conn->prepare($query);
        $this->userid = htmlspecialchars(strip_tags($this->userid));
        $this->plan = htmlspecialchars(strip_tags($this->plan));
        $stmt->bindValue(':confCode', $this->plan);
        $stmt->bindValue(':userid', $this->userid);
        $stmt->execute();
        if($stmt->rowCount() > 0){
            return true;
        }
    }

    public function paymentHistory($durate, $task, $to){

        $this->durate = $durate;
        $this->transid = mt_rand(100000, 999999);

        $query = "INSERT INTO payment_history (transid,userid,task,paymentto,startDate,endDate)
            VALUES (:transid,:userid,:task,:paymentto,:startDate,:endDate)";

        $stmt = $this->conn->prepare($query);
        $this->transid = htmlspecialchars(strip_tags($this->transid));
        $this->userid = htmlspecialchars(strip_tags($this->userid));
        $this->task = htmlspecialchars(strip_tags($task));
        $this->paymentto = htmlspecialchars(strip_tags($to));
        $this->startDate = htmlspecialchars(strip_tags($this->startDate));
        $this->endDate = htmlspecialchars(strip_tags($this->endDate));

        $stmt->bindValue('transid', $this->transid);
        $stmt->bindValue('userid', $this->userid);
        $stmt->bindValue('task', $task);
        $stmt->bindValue('paymentto', $to);
        $stmt->bindValue('startDate', $this->startDate);
        $stmt->bindValue('endDate', $this->endDate);

        if($stmt->execute()){
            return true;
        }
        printf("Error: %s.\n", $stmt->error);
        return false;
    }

    public function updatePersonalInfo(){

        $query = "UPDATE users SET fname=:fname, lname=:lname, phone=:phone, address=:address, state=:state, country=:country WHERE userid=:userid";

        $stmt = $this->conn->prepare($query);

        $this->fname = htmlspecialchars(strip_tags($this->fname));
        $this->lname = htmlspecialchars(strip_tags($this->lname));
        $this->phone = htmlspecialchars(strip_tags($this->phone));
        $this->address = htmlspecialchars(strip_tags($this->address));
        $this->state = htmlspecialchars(strip_tags($this->state));
        $this->country = htmlspecialchars(strip_tags($this->country));
        $this->userid = htmlspecialchars(strip_tags($this->userid));

        $stmt->bindValue('fname', $this->fname);
        $stmt->bindValue('lname', $this->lname);
        $stmt->bindValue('phone', $this->phone);
        $stmt->bindValue('address', $this->address);
        $stmt->bindValue('state', $this->state);
        $stmt->bindValue('country', $this->country);
        $stmt->bindValue('userid', $this->userid);

        if($stmt->execute()){
            return true;
        }
        printf("Error: %s.\n", $stmt->error);
        return false;
    }

    public function createBusinessInfo(){

        if($this->checkBizInfo($this->userid)){
            echo 'exist';
            return false;
        }

        $this->cardsettings = 1;

        $query = "INSERT INTO business (userid,bizname,bizphone,bizemail,bizstate,bizmarket,bizaddress,bizwebsite,bizregdate,cardsettings,status) VALUES (:userid,:bizname,:bizphone,:bizemail,:bizstate,:bizmarket,:bizaddress,:bizwebsite,:bizregdate,:cardsettings,:status)";

        $stmt = $this->conn->prepare($query);

        $this->userid = htmlspecialchars(strip_tags($this->userid));
        $this->bizname = htmlspecialchars(strip_tags($this->bizname));
        $this->bizphone = htmlspecialchars(strip_tags($this->bizphone));
        $this->bizemail = htmlspecialchars(strip_tags($this->bizemail));
        $this->bizstate = json_encode($this->bizstate);
        $this->bizmarket = json_encode($this->bizmarket);
        $this->bizaddress = htmlspecialchars(strip_tags($this->bizaddress));
        $this->bizwebsite = htmlspecialchars(strip_tags($this->bizwebsite));
        $this->bizregdate = htmlspecialchars(strip_tags($this->bizregdate));
        $this->cardsettings = htmlspecialchars(strip_tags($this->cardsettings));
        $this->status = htmlspecialchars(strip_tags($this->status));

        $stmt->bindValue('userid', $this->userid);
        $stmt->bindValue('bizname', $this->bizname);
        $stmt->bindValue('bizphone', $this->bizphone);
        $stmt->bindValue('bizemail', $this->bizemail);
        $stmt->bindValue('bizstate', $this->bizstate);
        $stmt->bindValue('bizmarket', $this->bizmarket);
        $stmt->bindValue('bizaddress', $this->bizaddress);
        $stmt->bindValue('bizwebsite', $this->bizwebsite);
        $stmt->bindValue('bizregdate', $this->bizregdate);
        $stmt->bindValue('cardsettings', $this->cardsettings);
        $stmt->bindValue('status', $this->status);

        if($stmt->execute()){
            $this->userid = $this->userid;
            $this->title = "New Business Information Created";
            $this->body = "A new business information has been created!";
            $this->generatedlink = "seller_details.php?sellerid=".$this->userid;
            $this->notifications();

            return true;
        }
        printf("Error: %s.\n", $stmt->error);
        return false;
    }

    public function createBusinessForeign(){

        if($this->checkBizInfo($this->userid)){
            echo 'exist';
            return false;
        }

        $this->cardsettings = 1;

        $query = "INSERT INTO business (userid,bizname,bizphone,bizemail,bizmarket,bizstate,bizaddress,bizwebsite,bizregdate,cardsettings,status) VALUES (:userid,:bizname,:bizphone,:bizemail,:bizmarket,:bizstate,:bizaddress,:bizwebsite,:bizregdate,:cardsettings,:status)";

        $stmt = $this->conn->prepare($query);

        $this->userid = htmlspecialchars(strip_tags($this->userid));
        $this->bizname = htmlspecialchars(strip_tags($this->bizname));
        $this->bizphone = htmlspecialchars(strip_tags($this->bizphone));
        $this->bizemail = htmlspecialchars(strip_tags($this->bizemail));
        $this->bizcountry = htmlspecialchars(strip_tags($this->bizcountry));
        $this->bizstate = htmlspecialchars(strip_tags($this->bizstate));
        $this->bizaddress = htmlspecialchars(strip_tags($this->bizaddress));
        $this->bizwebsite = htmlspecialchars(strip_tags($this->bizwebsite));
        $this->bizregdate = htmlspecialchars(strip_tags($this->bizregdate));
        $this->cardsettings = htmlspecialchars(strip_tags($this->cardsettings));
        $this->status = htmlspecialchars(strip_tags($this->status));

        $stmt->bindValue('userid', $this->userid);
        $stmt->bindValue('bizname', $this->bizname);
        $stmt->bindValue('bizphone', $this->bizphone);
        $stmt->bindValue('bizemail', $this->bizemail);
        $stmt->bindValue('bizmarket', $this->bizcountry);
        $stmt->bindValue('bizstate', $this->bizstate);
        $stmt->bindValue('bizaddress', $this->bizaddress);
        $stmt->bindValue('bizwebsite', $this->bizwebsite);
        $stmt->bindValue('bizregdate', $this->bizregdate);
        $stmt->bindValue('cardsettings', $this->cardsettings);
        $stmt->bindValue('status', $this->status);

        if($stmt->execute()){
            $this->userid = $this->userid;
            $this->title = "New International Business Information Created";
            $this->body = "A new business information has been created!";
            $this->generatedlink = "seller_details.php?sellerid=".$this->userid;
            $this->notifications();

            return true;
        }
        printf("Error: %s.\n", $stmt->error);
        return false;
    }

    /* business Details check */
    public function checkBizInfo($userid){
        $stmtbiz = $this->conn->prepare("SELECT * FROM business WHERE userid=:userid AND status=:status");
        $stmtbiz->bindValue("userid", $this->userid);
        $stmtbiz->bindValue("status", $this->status);
        $stmtbiz->execute();
        if($stmtbiz->rowCount() > 0){
            return true;
        }
    }

    /* business Details */
    public function bizDetails($userid){
        // $this->status = 'Updated';
        $stmtbiz = $this->conn->prepare("SELECT * FROM business WHERE userid=:userid AND status=:status OR status=:status2");
        $stmtbiz->bindValue("userid", $userid);
        $stmtbiz->bindValue("status", 'Updated');
        $stmtbiz->bindValue("status2", 'Updateable');
        $stmtbiz->execute();
        if($stmtbiz->rowCount() > 0){
            $data = $stmtbiz->fetch(PDO::FETCH_OBJ); //User data
            return $data;
        }else{
            return 'empty';
        }
    }

    public function updatereturnpolicy(){

        $query = "UPDATE business SET returnpolicy=:return_policy WHERE userid=:userid";

        $stmt = $this->conn->prepare($query);

        $this->return_policy = htmlentities($this->return_policy);
        $this->userid = htmlspecialchars(strip_tags($this->userid));

        $stmt->bindValue('userid', $this->userid);
        $stmt->bindValue('return_policy', $this->return_policy);

        if($stmt->execute()){
            return true;
        }
        printf("Error: %s.\n", $stmt->error);
        return false;
    }

    public function updatedisclaimer(){

        $query = "UPDATE business SET disclaimer=:sellerdisclaimer WHERE userid=:userid";

        $stmt = $this->conn->prepare($query);

        $this->sellerdisclaimer = htmlentities($this->sellerdisclaimer);
        $this->userid = htmlspecialchars(strip_tags($this->userid));

        $stmt->bindValue('userid', $this->userid);
        $stmt->bindValue('sellerdisclaimer', $this->sellerdisclaimer);

        if($stmt->execute()){
            return true;
        }
        printf("Error: %s.\n", $stmt->error);
        return false;
    }

    public function updatetimedelivery(){

        $query = "UPDATE business SET timedelivery=:time_delivery WHERE userid=:userid";

        $stmt = $this->conn->prepare($query);

        $this->time_delivery = htmlentities($this->time_delivery);
        $this->userid = htmlspecialchars(strip_tags($this->userid));

        $stmt->bindValue('userid', $this->userid);
        $stmt->bindValue('time_delivery', $this->time_delivery);

        if($stmt->execute()){
            return true;
        }
        printf("Error: %s.\n", $stmt->error);
        return false;
    }

    public function updatevideolink(){

        $query = "UPDATE business SET videolink=:videolink WHERE userid=:userid";

        $stmt = $this->conn->prepare($query);

        $this->videolink = htmlentities($this->videolink);
        $this->userid = htmlspecialchars(strip_tags($this->userid));

        $stmt->bindValue('userid', $this->userid);
        $stmt->bindValue('videolink', $this->videolink);

        if($stmt->execute()){
            return true;
        }
        printf("Error: %s.\n", $stmt->error);
        return false;
    }

    public function addstoreimage(){

        $query = "UPDATE business SET storeimage=:storeimage WHERE userid=:userid";

        $stmt = $this->conn->prepare($query);

        $this->storeimage = $this->storeimage;
        $this->userid = htmlspecialchars(strip_tags($this->userid));

        $stmt->bindValue('userid', $this->userid);
        $stmt->bindValue('storeimage', $this->storeimage);

        if($stmt->execute()){
            return true;
        }
        printf("Error: %s.\n", $stmt->error);
        return false;
    }

    //check if give username exist in the database
    public function userLogin($username, $password){

        if($this->isUsernameExit($username)){
            $pdo = getDB();
            $stmt = $pdo->prepare('SELECT * FROM users WHERE username = ? limit 1');
            $stmt->execute([$username]);
            $user = $stmt->fetch();

            if (password_verify($password, $user['password'])) {
                if ($user['status'] == 1) {
                    $this->user = $user;
                    session_regenerate_id();
                    $_SESSION['userid'] = $user['userid'];
                    $_SESSION['role'] = $user['role'];

                    $this->updateLastLogin();

                    $this->userid = $user['userid'];
                    $this->title = $user['username']. ' ' . 'just logged in!';
                    $this->body = "A User Logged in at ". ' - ' .date('Y-m-d H:i:s');
                    $this->generatedlink = "seller_details.php?sellerid=".$this->userid;
                    $this->notifications();

                    echo $user['role'];
                    return true;
                } else {
                    echo 'Inactive';
                    return false;
                }
            } else {
            echo 'Invalid';
                return false;
            }
        }else{
            echo 'Invalid';
            return false;
        }

    }



    public function updateLastLogin(){

        $this->lastlogin = date('Y-m-d H:i:s');

        $sqli = "UPDATE users SET lastlogin=:lastlogin WHERE userid=:userid";
        $stmti = $this->conn->prepare($sqli);
        $stmti->bindParam(':lastlogin', $this->lastlogin);
        $stmti->bindParam(':userid', $_SESSION['userid']);
        if($stmti->execute()){
            return true;
        }
    }

    public function create_market(){

            $query = "INSERT INTO market (marketid,marketname,marketstate,marketaddress,marketchairman,marketimg,marketstatus,created_by)
                VALUES (:marketid,:marketname,:marketstate,:marketaddress,:marketchairman,:marketimg,:marketstatus,:created_by)";

            $stmt = $this->conn->prepare($query);

            $this->marketid = htmlspecialchars(strip_tags($this->marketid));
            $this->marketname = htmlspecialchars(strip_tags($this->marketname));
            $this->marketstate = htmlspecialchars(strip_tags($this->marketstate));
            $this->marketaddress = htmlspecialchars(strip_tags($this->marketaddress));
            $this->marketchairman = htmlspecialchars(strip_tags($this->marketchairman));
            $this->marketimg = htmlspecialchars(strip_tags($this->marketimg));
            $this->marketstatus = htmlspecialchars(strip_tags($this->marketstatus));
            $this->created_by = htmlspecialchars(strip_tags($this->created_by));

            $stmt->bindValue('marketid', $this->marketid);
            $stmt->bindValue('marketname', $this->marketname);
            $stmt->bindValue('marketstate', $this->marketstate);
            $stmt->bindValue('marketaddress', $this->marketaddress);
            $stmt->bindValue('marketchairman', $this->marketchairman);
            $stmt->bindValue('marketimg', $this->marketimg);
            $stmt->bindValue('marketstatus', $this->marketstatus);
            $stmt->bindValue('created_by', $this->created_by);

            if($stmt->execute()){
                $this->marketcategory($this->marketid, $this->marketstate);
                $this->userid = 'all';
                $this->title = 'New Market Created!';
                $this->body = 'A new market has been created by the Admin. Explore!';
                $this->generatedlink = "market_setting.php?marketid=".$this->marketid;
                $this->notifications();
                return true;

            }
            printf("Error: %s.\n", $stmt->error);
            return false;
    }

    public function marketcategory($marketid, $marketstate){
        $array = $this->marketcategories;
        foreach($array as $item) {
            $this->splititem = explode("-", $item);
            $this->item1 = $this->splititem[0];
            $this->item2 = $this->splititem[1];
            $stmt = $this->conn->prepare("INSERT INTO marketproductid(marketid,categoryid,marketstate,categoryname) VALUES(:marketid,:categoryid,:marketstate,:categoryname)");
            $stmt->bindValue(':marketid', $this->marketid);
            $stmt->bindValue(':categoryid', $this->item2);
            $stmt->bindValue(':marketstate', $this->marketstate);
            $stmt->bindValue(':categoryname', $this->item1);
            $stmt->execute();
        }
    }

    //Get Markets
    public function market_list(){

        $sql = 'SELECT * FROM market ORDER BY id';
        foreach ($this->conn->query($sql) as $row) {
            echo '<li class="list-group-item">
                <div class="todo-indicator bg-info"></div>
                <div class="widget-content p-0">
                    <div class="widget-content-wrapper">
                        <div class="widget-content-left mr-3">
                            <div class="widget-content-left">
                                <img width="42" class="rounded" src="../seller/marketImage/'.$row['marketname'].'/'.$row['marketimg'].'" alt="">
                            </div>
                        </div>
                        <div class="widget-content-left">
                            <div class="widget-heading">'.$row['marketname'].' ['.$row['marketstate'].']</div>
                            <div class="widget-subheading">'.$row['marketaddress'].'</div>
                        </div>
                        <div class="widget-content-right widget-content-actions">
                            <button class="border-0 btn-transition btn btn-outline-info" title="Add Category"><i class="fa fa-plus"></i></button>
                        </div>
                    </div>
                </div>
            </li>';
        }
    }

    //Get Markets into dropdown list
    public function market_dropdown_list(){
        $sql = 'SELECT * FROM market ORDER BY id DESC';
        foreach ($this->conn->query($sql) as $row) {
            echo '<option value="'.$row['marketid'].'">'.$row['marketname'].'</option>';
        }
    }

    public function updateprofilepic(){
        if($this->isProPicExist()){
            $sqli = "UPDATE profilepic SET file_name=:file_name WHERE userid=:userid";
            $stmt = $this->conn->prepare($sqli);
            $this->userid = htmlspecialchars(strip_tags($this->userid));
            $this->file_name = htmlspecialchars(strip_tags($this->file_name));
            $stmt->bindValue('userid', $this->userid);
            $stmt->bindValue('file_name', $this->file_name);

            if($stmt->execute()){
                $this->userid = $this->userid;
                $this->title = 'New Profile Picture Update';
                $this->body = 'A user just update his/her profile picture!';
                $this->generatedlink = "user_details?userid=".$this->userid;
                $this->notifications();
                return true;
            }
            printf("Error: %s.\n", $stmt->error);
            return false;
        }

        $query = "INSERT INTO profilepic (userid,file_name,status) VALUES (:userid,:file_name,:status)";
        $stmt = $this->conn->prepare($query);
        $this->userid = htmlspecialchars(strip_tags($this->userid));
        $this->file_name = htmlspecialchars(strip_tags($this->file_name));
        $this->status = htmlspecialchars(strip_tags($this->status));

        $stmt->bindValue('userid', $this->userid);
        $stmt->bindValue('file_name', $this->file_name);
        $stmt->bindValue('status', $this->status);

        if($stmt->execute()){
            $this->userid = $this->userid;
            $this->title = 'New Profile Picture Update';
            $this->body = 'A user just update his/her profile picture!';
            $this->generatedlink = "user_details?userid=".$this->userid;
            $this->notifications();
            return true;
        }
        printf("Error: %s.\n", $stmt->error);
        return false;
    }

    public function getBrands(){
        $query = "SELECT * FROM brand";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function create_brand(){

        $query = "INSERT INTO brand (title,img) VALUES (:title,:img)";

        $stmt = $this->conn->prepare($query);

        $stmt->bindValue(':title', htmlspecialchars(strip_tags($this->brandtitle)));
        $stmt->bindValue(':img', htmlspecialchars(strip_tags($this->brandimg)));

        if($stmt->execute()){
            return true;

        }
        printf("Error: %s.\n", $stmt->error);
        return false;
    }


    public function delete_brand(){
        $query = "DELETE FROM brand WHERE id = :id";

        $stmt = $this->conn->prepare($query);
        if($stmt->execute(array(":id" => $this->brandid))){
            return true;
        }

    }


    //Check if username exit;
    public function isBrandExist(){
        $query = "SELECT * FROM brand WHERE title=:title";
        $stmt = $this->conn->prepare($query);
        $this->brandtitle = htmlspecialchars(strip_tags($this->brandtitle));
        $stmt->bindValue(':title', $this->brandtitle);
        $stmt->execute();
        if($stmt->rowCount() > 0){
            // if(is_dir( "../../seller/marketImage/".$this->marketname )){
            //     return true;
            // }
            return true;
        }
    }

    public function readProfilePix($userid){
        $query = "SELECT * FROM profilepic WHERE userid = :userid";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam('userid', $userid);
        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        // return $row['file_name'];
        if($row['file_name'] == ''){
            echo '<img src="images/avatars/avatar.jpg" width="150" alt="Avatar 6">';
            return;
        }else{
            if($_SESSION['role'] == 'Seller'){
                echo '<img src="profilepicture/'.$userid.'/'.$row['file_name'].'"width="100" height="100" class="rounded-circle" alt="Profile Picture">';
                return;
            }elseif($_SESSION['role'] == 'Buyer'){
                echo '<img src="../seller/profilepicture/'.$userid.'/'.$row['file_name'].'"width="100" height="100" class="rounded-circle" alt="Profile Picture">';
                return;
            }elseif($_SESSION['role'] == 'International'){
                echo '<img src="../seller/profilepicture/'.$userid.'/'.$row['file_name'].'"width="100" height="100" class="rounded-circle" alt="Profile Picture">';
                return;
            }
        }
    }

    public function readProfilePix2($userid){
        $query = "SELECT * FROM profilepic WHERE userid = :userid";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam('userid', $userid);
        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        // return $row['file_name'];
        if($row['file_name'] == ''){
            echo '<img src="images/avatars/avatar.jpg" width="50" height="50" alt="Avatar 6">';
            return;
        }else{
            if($_SESSION['role'] == 'Seller'){
                echo '<img src="profilepicture/'.$userid.'/'.$row['file_name'].'"width="100" height="100" class="rounded-circle" alt="Profile Picture">';
                return;
            }elseif($_SESSION['role'] == 'Buyer'){
                echo '<img src="../seller/profilepicture/'.$userid.'/'.$row['file_name'].'"width="100" height="100" class="rounded-circle" alt="Profile Picture">';
                return;
            }elseif($_SESSION['role'] == 'International'){
                echo '<img src="../seller/profilepicture/'.$userid.'/'.$row['file_name'].'"width="100" height="100" class="rounded-circle" alt="Profile Picture">';
                return;
            }
        }
    }

    public function isProPicExist(){
        $query = "SELECT * FROM profilepic WHERE userid=:userid";
        $stmt = $this->conn->prepare($query);
        $this->userid = htmlspecialchars(strip_tags($this->userid));
        $stmt->bindValue(':userid', $this->userid);
        $stmt->execute();
        if($stmt->rowCount() > 0){
            return true;
        }
    }

    public function add_category(){

        if($this->isCatExist()){
            echo 'exist';
            return false;
        }

        $query = "INSERT INTO category (catid,catname,catdescription,catImage)
            VALUES (:catid,:catname,:catdescription,:catImage)";

        $stmt = $this->conn->prepare($query);

        $this->catid = htmlspecialchars(strip_tags($this->catid));
        $this->catname = htmlspecialchars(strip_tags($this->catname));
        $this->catdescription = htmlspecialchars(strip_tags($this->catdescription));
        $this->file_name = htmlspecialchars(strip_tags($this->file_name));

        $stmt->bindValue('catid', $this->catid);
        $stmt->bindValue('catname', $this->catname);
        $stmt->bindValue('catdescription', $this->catdescription);
        $stmt->bindValue(':catImage', $this->file_name);

        if($stmt->execute()){
            $this->userid = 'all';
            $this->title = 'New Category Created!';
            $this->body = 'A new category has been created by the Admin. Explore!';
            $this->generatedlink = "product_category.php?catid=".$this->catid;
            $this->notifications();
            return true;
        }
        printf("Error: %s.\n", $stmt->error);
        return false;
    }

    public function add_product(){

            $query = "INSERT INTO product_details (productid,userid,product_title,market,countryorigin,expiration,performance,size,color,product_category,product_description,pack0,pack1,pack2,pack3,pack4,pack5,pack6,pack7,pack8,img0,img1,img2,img3,img4,img5,img6,status,productavailability,topCatSetting )
                VALUES (:productid,:userid,:product_title,:market,:countryorigin,:expiration,:performance,:size,:color,:product_category,:product_description,:pack0,:pack1,:pack2,:pack3,:pack4,:pack5,:pack6,:pack7,:pack8,:img0,:img1,:img2,:img3,:img4,:img5,:img6,:status,:productavailability,:topCatSetting )";

            $stmt = $this->conn->prepare($query);

            $this->productid = htmlspecialchars(strip_tags($this->productid));
            $this->userid = htmlspecialchars(strip_tags($this->userid));
            $this->product_title = htmlspecialchars(strip_tags($this->product_title));
            $this->market = htmlspecialchars(strip_tags($this->market));
            $this->countryorigin = json_encode($this->countryorigin);
            $this->expiration = htmlspecialchars(strip_tags($this->expiration));
            $this->performance = htmlspecialchars(strip_tags($this->performance));
            $this->size = htmlentities($this->size);
            $this->color = htmlentities($this->color);
            $this->product_category = htmlspecialchars(strip_tags($this->product_category));
            $this->product_description = htmlentities($this->product_description);
            $this->pack0 = htmlentities($this->pack0);
            $this->pack1 = htmlentities($this->pack1);
            $this->pack2 = htmlentities($this->pack2);
            $this->pack3 = htmlentities($this->pack3);
            $this->pack4 = htmlentities($this->pack4);
            $this->pack5 = htmlentities($this->pack5);
            $this->pack6 = htmlentities($this->pack6);
            $this->pack7 = htmlentities($this->pack7);
            $this->pack8 = htmlentities($this->pack8);
            $this->img0 = htmlspecialchars(strip_tags($this->file_name0));
            $this->img1 = htmlspecialchars(strip_tags($this->file_name1));
            $this->img2 = htmlspecialchars(strip_tags($this->file_name2));
            $this->img3 = htmlspecialchars(strip_tags($this->file_name3));
            $this->img4 = htmlspecialchars(strip_tags($this->file_name4));
            $this->img5 = htmlspecialchars(strip_tags($this->file_name5));
            $this->img6 = htmlspecialchars(strip_tags($this->file_name6));
            $this->status = htmlspecialchars(strip_tags($this->productstatus));
            $this->productavailability = htmlspecialchars(strip_tags($this->productavailability));
            $this->topCatSetting = 0;

            $stmt->bindValue('productid', $this->productid);
            $stmt->bindValue('userid', $this->userid);
            $stmt->bindValue('product_title', $this->product_title);
            $stmt->bindValue('market', $this->market);
            $stmt->bindValue('countryorigin', $this->countryorigin);
            $stmt->bindValue('expiration', $this->expiration);
            $stmt->bindValue('performance', $this->performance);
            $stmt->bindValue('size', $this->size);
            $stmt->bindValue('color', $this->color);
            $stmt->bindValue('product_category', $this->product_category);
            $stmt->bindValue('product_description', $this->product_description);
            $stmt->bindValue('pack0', $this->pack0);
            $stmt->bindValue('pack1', $this->pack1);
            $stmt->bindValue('pack2', $this->pack2);
            $stmt->bindValue('pack3', $this->pack3);
            $stmt->bindValue('pack4', $this->pack4);
            $stmt->bindValue('pack5', $this->pack5);
            $stmt->bindValue('pack6', $this->pack6);
            $stmt->bindValue('pack7', $this->pack7);
            $stmt->bindValue('pack8', $this->pack8);
            $stmt->bindValue('img0', $this->img0);
            $stmt->bindValue('img1', $this->img1);
            $stmt->bindValue('img2', $this->img2);
            $stmt->bindValue('img3', $this->img3);
            $stmt->bindValue('img4', $this->img4);
            $stmt->bindValue('img5', $this->img5);
            $stmt->bindValue('img6', $this->img6);
            $stmt->bindValue('status', $this->status);
            $stmt->bindValue('productavailability', $this->productavailability);
            $stmt->bindValue('topCatSetting', $this->topCatSetting);

            if($stmt->execute()){
                $this->userid = $this->userid;
                $this->title = 'New Product Created!';
                $this->body = 'A new product has been created by the !'.$this->userid;
                $this->generatedlink = "product_details.php?productid=".$this->productid;
                $this->notifications();

                return true;
            }
            printf("Error: %s.\n", $stmt->error);
            return false;
    }

    public function fetch_product($marketid){
        $this->marketid = $marketid;
        $sql = 'SELECT * FROM marketproductid WHERE marketid='.$this->marketid;
        $kinging = $this->conn->query($sql);
        foreach ($kinging as $row) {
            $response[] = $row['categoryname'];
        }
        $tarrifList = json_encode($response);
        echo $tarrifList;
    }

    public function fetchCountries(){
        $sql = 'SELECT * FROM apps_countries ORDER BY id';
        foreach ($this->conn->query($sql) as $row) {
            echo '<option value="'.$row['country_name'].'">'.$row['country_name'].'</option>';
        }
    }

    public function fetchStates(){
        $sql = 'SELECT * FROM naija_states ORDER BY name';
        foreach ($this->conn->query($sql) as $row) {
            echo '<option value="'.$row['name'].'">'.$row['name'].'</option>';
        }
    }

    public function fetchStatesData(){
        $sql = 'SELECT * FROM naija_states ORDER BY name';
        $sth = $this->conn->prepare($sql);
        $sth->execute();
        return $sth->fetchAll();
    }


    public function add_accountdetails(){

        $this->me = $this->accountdetails($this->userid);
        if($this->me > 0){
            echo 'exist';
            return false;
        }

        $query = "INSERT INTO accountdetails (userid,accountname,accountnumber,bankname,accounttype,status)
            VALUES (:userid,:accountname,:accountnumber,:bankname,:accounttype,:status)";

        $stmt = $this->conn->prepare($query);

        $this->userid = htmlspecialchars(strip_tags($this->userid));
        $this->bankname = htmlspecialchars(strip_tags($this->bankname));
        $this->accountnumber = htmlspecialchars(strip_tags($this->accountnumber));
        $this->accountname = htmlspecialchars(strip_tags($this->accountname));
        $this->accounttype = htmlentities($this->accounttype);
        $this->status = htmlentities($this->status);

        $stmt->bindValue('userid', $this->userid);
        $stmt->bindValue('accountname', $this->accountname);
        $stmt->bindValue('accountnumber', $this->accountnumber);
        $stmt->bindValue('bankname', $this->bankname);
        $stmt->bindValue('accounttype', $this->accounttype);
        $stmt->bindValue('status', $this->status);

        if($stmt->execute()){
            $this->userid = $this->userid;
            $this->title = 'Seller Added Account Details';
            $this->body = 'A seller just updated his/her account details';
            $this->generatedlink = "seller_details.php?userid=".$this->userid;
            $this->notifications();

            return true;
        }
        printf("Error: %s.\n", $stmt->error);
        return false;
    }

    public function accountdetails($userid){
        $this->userid = $userid;
        $sql = "SELECT count(*) FROM `accountdetails` WHERE userid=:userid";
        $stmt = $this->conn->prepare($sql);

        $stmt->bindValue('userid', $userid);
        if($stmt->execute()){
            $number_of_rows = $stmt->fetchColumn();
            return $number_of_rows;
        }

    }

    public function acctdetails($userid){

        $stmtbiz = $this->conn->prepare("SELECT * FROM accountdetails WHERE userid=:userid");
        $stmtbiz->bindValue("userid", $userid);
        $stmtbiz->execute();
        if($stmtbiz->rowCount() > 0){
            $data = $stmtbiz->fetch(PDO::FETCH_OBJ); //User data
            return $data;
        }else{
            return 'empty';
        }
    }

    public function user_category(){

        if($this->isUserCatExist()){
            echo 'exist';
            return false;
        }

        $this->t_product = 0;

        $query = "INSERT INTO user_category (catid,userid,catname_u,catdescription_u,t_product)
            VALUES (:catid,:userid,:catname,:catdescription,:t_product)";

        $stmt = $this->conn->prepare($query);

        $this->catid = htmlspecialchars(strip_tags($this->catid));
        $this->catname = htmlspecialchars(strip_tags($this->catname));
        $this->catdescription = htmlspecialchars(strip_tags($this->catdescription));
        $this->t_product = htmlspecialchars(strip_tags($this->t_product));
        $this->userid = htmlspecialchars(strip_tags($this->userid));

        $stmt->bindValue('catid', $this->catid);
        $stmt->bindValue('catname', $this->catname);
        $stmt->bindValue('catdescription', $this->catdescription);
        $stmt->bindValue('t_product', $this->t_product);
        $stmt->bindValue('userid', $this->userid);

        if($stmt->execute()){
            $userid = $this->userid;

            $this->userid = $this->userid;
            $this->title = 'A Seller Create a Catalogue' ;
            $this->body = 'A seller just created a Catalogue!';
            $this->generatedlink = "seller_details.php?sellerid=".$this->userid;
            $this->notifications();
            return true;
        }else{
            printf("Error: %s.\n", $stmt->error);
            return false;
        }
    }

    //Get Categories
    public function category_list(){
        $sql = 'SELECT * FROM category ORDER BY id';
        foreach ($this->conn->query($sql) as $row) {
            echo '<li class="list-group-item">
                    <div class="todo-indicator bg-info"></div>
                    <div class="widget-content p-0">
                        <div class="widget-content-wrapper">
                            <div class="widget-content-left mr-3">
                                <div class="widget-content-left">
                                    <img width="42" class="rounded" src="../seller/catImage/'.$row['catid'].'/'.$row['catImage'].'" alt="">
                                </div>
                            </div>
                            <div class="widget-content-left">
                                <div class="widget-heading">'.$row['catname'].'</div>
                                <div class="widget-subheading">'.$row['catdescription'].'</div>
                            </div>
                            <div class="widget-content-right widget-content-actions">
                                <button class="border-0 btn-transition btn btn-outline-info" title="Add Category"><i class="fa fa-edit"></i></button>
                            </div>
                        </div>
                    </div>
                </li>';
        }
    }

    //Get category into dropdown list
    public function category_dropdown_list(){
        $sql = 'SELECT * FROM category ORDER BY id';
        foreach ($this->conn->query($sql) as $row) {
            echo '<option value="'.$row['catname'].'-'.$row['catid'].'">'.$row['catname'].'</option>';
        }
    }

    //Get User Categories List
    public function user_category_list($userid){
        $this->userid = $userid;
        $sql = 'SELECT * FROM user_category WHERE userid='.$this->userid;
        foreach ($this->conn->query($sql) as $row) {
            $cnt = $this->user_product_count($row['userid'], $row['catname_u']);
            echo '<li class="list-group-item">
                    <div class="widget-content p-0">
                        <div class="widget-content-wrapper">
                            <div class="widget-content-left">
                                <div class="widget-heading">'.$row['catname_u'].'</div>
                                <div class="widget-subheading mt-1 opacity-10">
                                    <span class="badge badge-sm badge-pill badge-primary">'.$cnt.' Products</span>
                                </div>
                            </div>
                            <div class="widget-content-right">
                                <div class="fsize-2 text-success">
                                    <button class="btn btn-sm btn-danger"><i class="fa fa-times"></i></button>
                                    <button class="btn btn-sm btn-info">View Details</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>';
        }
    }

    //Get User Categories List
    public function user_category_grid($userid){
        $this->userid = $userid;
        $sql = 'SELECT * FROM user_category WHERE userid='.$this->userid;
        foreach ($this->conn->query($sql) as $row) {
            $cnt = $this->user_product_count($row['userid'], $row['catname_u']);
            echo '<div>
                    <div class="slider-item">
                        <div class="card-shadow-primary card-border card">
                            <div class="dropdown-menu-header pt-5 text-center">
                                <i class="fa fa-shopping-basket fa-3x text-danger" style="color: #333333;"></i>
                            </div>
                            <div class="p-0" style="height: 120px !important;">
                                <ul class="rm-list-borders list-group list-group-flush">
                                    <li class="list-group-item">
                                        <div class="widget-content p-0 text-center">
                                            <div class="font-size-xlg text-muted">
                                                <h5 style="color: #333333;">'.$row['catname_u'].'</h5>
                                            </div>
                                            <div class="widget-heading">
                                                '.$cnt.'-products
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            <div class="text-center d-block card-footer">
                                <button class="btn btn-danger btn-sm">View all
                                </button>
                            </div>
                        </div>
                    </div>
                </div>';
        }
    }

    public function user_product_count($userid, $catname_u){
        $sql = "SELECT count(*) FROM `product_details` WHERE userid=:userid AND product_category=:product_category";
        $stmt = $this->conn->prepare($sql);

        $stmt->bindValue('userid', $userid);
        $stmt->bindValue('product_category', $catname_u);
        if($stmt->execute()){
            $number_of_rows = $stmt->fetchColumn();
            return $number_of_rows;
            // return;
        }
    }

    public function totaluserproduct($userid){
        $sql = "SELECT count(*) FROM `product_details` WHERE userid=:userid";
        $stmt = $this->conn->prepare($sql);

        $stmt->bindValue('userid', $userid);
        if($stmt->execute()){
            $number_of_rows = $stmt->fetchColumn();
            echo $number_of_rows;
            return;
        }
    }

    //Get User product List
    public function user_product_grid($userid){
        $this->userid = $userid;
        $sql = 'SELECT * FROM product_details WHERE userid='.$this->userid;
        foreach ($this->conn->query($sql) as $row) {
            echo '<div class="col-md-12 col-lg-6 col-xl-3">
                    <div class="card-shadow-primary card-border mb-3 card">
                        <div class="dropdown-menu-header" style="width: 100%; height: 180px; overflow: hidden;">
                            <img src="productimg/'.$row['productid'].'/'.$row['img0'].'" style="width: 100% !important; height: auto !important; margin: auto;" alt="Avatar 5">
                        </div>
                        <div class="p-3">
                            <ul class="rm-list-borders list-group list-group-flush">
                                <li class="list-group-item">
                                    <div class="widget-content p-0">
                                        <div class="widget-content-wrapper">
                                            <div class="widget-content-left">
                                                <div class="widget-heading"> '. $row['product_title'] .' </div>
                                                <div class="widget-subheading">
                                                     '. $row['product_category'] .'
                                                </div>
                                            </div>
                                            <div class="widget-content-right">
                                                <div class="font-size-sm text-muted">
                                                    <span class="badge badge-warning">'. $row['status'] .'</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <div class="text-center d-block card-footer">
                            <button class="btn btn-warning btn-sm">View Details
                            </button>
                            <button class="btn btn-danger btn-sm">Edit Product
                            </button>
                        </div>
                    </div>
                </div>';
        }
    }

    //Get User product Grid
    public function user_product_list($userid){
        $this->userid = $userid;

        if($this->isListExist()){
            echo '<tr>
                    <td>No record found!</td>
                </tr>';
            return true;
        }

        $sql = 'SELECT * FROM product_details WHERE userid='.$this->userid;
        foreach ($this->conn->query($sql) as $row) {

            if($row['status']=='Pending'){
                $butt = 'Waiting for approval!';
            }else{
                if($row['productavailability'] == 'Out of Stock'){
                    $butt = '<button class="btn btn-sm btn-outline-warning">In Stock</button>';
                }elseif($row['productavailability'] == 'In Stock'){
                    $butt = '<button class="btn btn-sm btn-outline-danger">Out of stock</button>';
                }
            }
            echo '<tr>
                    <td>'.$row['productid'].'</td>
                    <td>'.$row['product_title'].'</td>
                    <td>'.$row['product_category'].'</td>
                    <td>'.$row['productavailability'].'</td>
                    <td>'.$row['status'].'</td>
                    <td>'.$row['created_at'].'</td>
                    <td>'.$butt.'</td>
                </tr>';
        }
    }

    //Get Categories dropdown
    public function category_dropdown(){
        $sql = 'SELECT * FROM category ORDER BY id';
        foreach ($this->conn->query($sql) as $row) {
            echo '<option value="'.$row['catname'].'">'.$row['catname'].'</option>';
        }
    }

    //Get Categories dropdown
    public function category_dropdown_seller($userid){
        $this->userid = $userid;
        // $sql = 'SELECT * FROM user_category WHERE userid: ORDER BY id';
        $sql = 'SELECT * FROM user_category WHERE userid='.$this->userid;
        foreach ($this->conn->query($sql) as $row) {
            echo '<option value="'.$row['catname_u'].'">'.$row['catname_u'].'</option>';
        }
    }

    public function notifications(){
        $query = "INSERT INTO notifications (userid,title,body,generatedlink)
            VALUES (:userid,:title,:body,:generatedlink)";

        $stmt = $this->conn->prepare($query);
        $this->userid = htmlspecialchars(strip_tags($this->userid));
        $this->title = htmlspecialchars(strip_tags($this->title));
        $this->body = htmlspecialchars(strip_tags($this->body));
        $this->generatedlink = htmlspecialchars(strip_tags($this->generatedlink));

        $stmt->bindValue('userid', $this->userid);
        $stmt->bindValue('title', $this->title);
        $stmt->bindValue('body', $this->body);
        $stmt->bindValue('generatedlink', $this->generatedlink);

        if($stmt->execute()){
            return true;
        }
        printf("Error: %s.\n", $stmt->error);
        return false;
    }

    public function emailActivation($userid){
        $pdo = $this->conn;
        $stmt = $pdo->prepare('UPDATE users SET status = 1 WHERE userid = ?');
        $stmt->execute([$userid]);
        if ($stmt->rowCount() > 0) {
            $stmt = $pdo->prepare('SELECT * FROM users WHERE userid = ? and status = 1 limit 1');
            $stmt->execute([$userid]);
            $user = $stmt->fetch();

            $this->user = $user;
            session_regenerate_id();
            if (!empty($user['userid'])) {
                $_SESSION['user']['userid'] = $user['userid'];
                $_SESSION['user']['username'] = $user['username'];
                $_SESSION['user']['name'] = $user['name'];
                $_SESSION['user']['email'] = $user['email'];
                return true;
            } else {
                $this->msg = 'Account activitation failed.';
                return false;
            }
        } else {
            $this->msg = 'Account activitation failed.';
            return false;
        }
    }

    //Check if username exit;
    public function isUsernameExit($username){
        $query = "SELECT * FROM users WHERE username=:username";
        $stmt = $this->conn->prepare($query);
        $stmt->bindValue(':username', $username);
        $stmt->execute();
        if($stmt->rowCount() > 0){
            return true;
        }else{
            return false;
        }
    }

    //Check if username exit;
    public function isMarketExist(){
        $query = "SELECT * FROM market WHERE marketname=:marketname AND marketstate=:marketstate";
        $stmt = $this->conn->prepare($query);
        $this->marketname = htmlspecialchars(strip_tags($this->marketname));
        $this->marketstate = htmlspecialchars(strip_tags($this->marketstate));
        $stmt->bindValue(':marketname', $this->marketname);
        $stmt->bindValue(':marketstate', $this->marketstate);
        $stmt->execute();
        if($stmt->rowCount() > 0){
            // if(is_dir( "../../seller/marketImage/".$this->marketname )){
            //     return true;
            // }
            return true;
        }
    }

    //Check if username exit;
    public function isListExist(){
        $query = "SELECT * FROM product_details WHERE userid=:userid";
        $stmt = $this->conn->prepare($query);
        $this->userid = htmlspecialchars(strip_tags($this->userid));
        $stmt->bindValue(':userid', $this->userid);
        $stmt->execute();
        if($stmt->rowCount() < 1){
                return true;
        }
    }

    public function isCatExist(){
        $query = "SELECT * FROM category WHERE catname=:catname";
        $stmt = $this->conn->prepare($query);
        $this->catname = htmlspecialchars(strip_tags($this->catname));
        $stmt->bindValue(':catname', $this->catname);
        $stmt->execute();
        if($stmt->rowCount() > 0){
            return true;
        }
    }

    public function isUserCatExist(){
        $query = "SELECT * FROM user_category WHERE catname_u=:catname AND userid=:userid";
        $stmt = $this->conn->prepare($query);
        $this->catname = htmlspecialchars(strip_tags($this->catname));
        $this->userid = htmlspecialchars(strip_tags($this->userid));
        $stmt->bindValue(':catname', $this->catname);
        $stmt->bindValue(':userid', $this->userid);
        $stmt->execute();
        if($stmt->rowCount() > 0){
            return true;
        }
    }

    //Check if email exist
    public function isEmailExit(){
        $queryEmail = "SELECT * FROM  users WHERE email=:email";
        $stmtEmail = $this->conn->prepare($queryEmail);
        $this->email = htmlspecialchars(strip_tags($this->email));
        $stmtEmail->bindValue(':email', $this->email);
        $stmtEmail->execute();
        if($stmtEmail->rowCount() > 0){
            return true;
        }else{
            return false;
        }
    }

    /* User Details */
    public function userDetails($userid){
        try {
            $stmt = $this->conn->prepare("SELECT * FROM users WHERE userid=:userid");
            $stmt->bindParam("userid", $userid, PDO::PARAM_INT);
            $stmt->execute();
            $data = $stmt->fetch(PDO::FETCH_OBJ); //User data
            return $data;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    /* business Details */
    public function checkAcctType($userid){
        $stmtbiz = $this->conn->prepare("SELECT * FROM account_info WHERE userid=:userid");
        $stmtbiz->bindParam("userid", $userid, PDO::PARAM_INT);
        $stmtbiz->execute();
        $data = $stmtbiz->fetch(PDO::FETCH_OBJ); //User data
        return $data;
                // if($stmtbiz->rowCount() < 1){
        //     echo '<div class="card-body row">
        //             <div class="alert alert-danger show col-md-12" role="alert">
        //             You have to update your business information <a href="business_setting"><button class="btn btn-info btn-sm">Update business profile</button></a>
        //             </div>
        //         </div>';
        // }
    }

    public function logout(){
        $_SESSION['userid'] = null;
        session_regenerate_id();
        return true;
    }

    public function productCount()
    {
        $sth = $this->conn->prepare("SELECT * FROM product_details");
        $sth->execute();
        return $sth->rowCount();
    }

    public function marketCount()
    {
        $sth = $this->conn->prepare("SELECT * FROM market");
        $sth->execute();
        return $sth->rowCount();
    }

    public function categoryCount()
    {
        $sth = $this->conn->prepare("SELECT * FROM category");
        $sth->execute();
        return $sth->rowCount();
    }

    public function updateSettings($column, $value){
        $sth = $this->conn->prepare("UPDATE settings SET {$column}=:value");
        return $sth->execute(array(':value' => $value));
    }

    public function getSettings()
    {
        $sth = $this->conn->prepare("SELECT * FROM settings");
        $sth->execute();
        return $sth->fetch();
    }

    public function getUsersCount($role="")
    {
        $query = "";
        if($role != '')
        {
            $query = 'SELECT * FROM users WHERE role = "'.$role.'" ';
        } else {
            $query = 'SELECT * FROM users WHERE role != "Admin" AND role != "Sub Admin" ';
        }
        $sth = $this->conn->prepare($query);
        $sth->execute();
        return $sth->rowCount();
    }

    public function view_buyers($status = '')
    {
        $query = "";
        switch($status){
            case "active":
                $query = 'SELECT * FROM users WHERE role = "Buyer" AND status = 1 ORDER BY sn';
                break;
            case "inactive":
                $query = 'SELECT * FROM users WHERE role = "Buyer" AND status = 2 ORDER BY sn';
                break;
            case "pending":
                $query = 'SELECT * FROM users WHERE role = "Buyer" AND status = 0 ORDER BY sn';
                break;
            default:
                $query = 'SELECT * FROM users WHERE role = "Buyer" ORDER BY sn';
        }
        $sth = $this->conn->prepare($query);
        $sth->execute();
        return $sth->fetchAll();
    }

    public function view_admins($status = '')
    {
        $query = "";
        switch($status){
            case "active":
                $query = 'SELECT * FROM users WHERE (role = "Admin" OR role = "Sub Admin") AND status = 1 ORDER BY sn';
                break;
            case "inactive":
                $query = 'SELECT * FROM users WHERE (role = "Admin" OR role = "Sub Admin")  AND status = 2 ORDER BY sn';
                break;
            case "pending":
                $query = 'SELECT * FROM users WHERE (role = "Admin" OR role = "Sub Admin")  AND status = 0 ORDER BY sn';
                break;
            default:
                $query = 'SELECT * FROM users WHERE (role = "Admin" OR role = "Sub Admin")  ORDER BY sn';
        }
        $sth = $this->conn->prepare($query);
        $sth->execute();
        return $sth->fetchAll();
    }

    //Get all sellers
    public function view_all_seller(){

        $sql = 'SELECT * FROM users WHERE role = "Seller" OR role = "International" ORDER BY sn';
        foreach ($this->conn->query($sql) as $row) {

            if($row['status']==1){
                $butt = '<span class="badge badge-success">Active</span>';
                $btt = '<button class="mb-2 mr-2 btn btn-shadow btn-danger btn-sm" onclick="deactivateSeller('.$row['userid'].')"><i class="fa fa-times btn-icon-wrapper"></i></button>
                        <a href="seller_details.php?sellerid='.$row['userid'].'" class="mb-2 btn btn-shadow btn-info btn-sm"><i class="fa fa-address-card btn-icon-wrapper"></i></a>';
            }elseif($row['status']==0){
                $butt = '<span class="badge badge-warning">Pending</span>';
                $btt = '<button class="mb-2 mr-2 btn btn-shadow btn-outline-success btn-sm" onclick="activateSeller('.$row['userid'].')" style="float: left;"><i class="fa fa-check btn-icon-wrapper"></i></button>
                        <button class="mb-2 mr-2 btn btn-shadow btn-danger btn-sm" onclick="deactivateSeller('.$row['userid'].')"><i class="fa fa-times btn-icon-wrapper"></i></button>
                        <a href="seller_details.php?sellerid='.$row['userid'].'" class="mb-2 btn btn-shadow btn-info btn-sm"><i class="fa fa-address-card btn-icon-wrapper"></i></a>';
            }elseif($row['status']==2){
                $butt = '<span class="badge badge-danger">Inactive</span>';
                $btt = '<button class="mb-2 mr-2 btn btn-shadow btn-success btn-sm" onclick="activateSeller('.$row['userid'].')"><i class="fa fa-check btn-icon-wrapper"></i></button>
                        <a href="seller_details.php?sellerid='.$row['userid'].'" class="mb-2 btn btn-shadow btn-info btn-sm"><i class="fa fa-address-card btn-icon-wrapper"></i></a>';
            }
            echo '<tr>
                    <td>'.$row['userid'].'</td>
                    <td>'.$row['username'].'</td>
                    <td>'.$row['fname'].' '.$row['fname'].'</td>
                    <td>'.$row['email'].'</td>
                    <td>'.$row['phone'].'</td>
                    <td style="font-size: 13px;">'.$row['date_reg'].'</td>
                    <td>'.$butt.'</td>
                    <td>'.$btt.'</td>
                </tr>';
        }
    }
    //Get all pending seller
    public function view_pending_seller(){

        $sql = 'SELECT * FROM users WHERE (role = "Seller" OR role = "International") AND status=0 ORDER BY sn';
        foreach ($this->conn->query($sql) as $row) {

            if($row['status']==1){
                $butt = '<span class="badge badge-success">Active</span>';
            }elseif($row['status']==0){
                $butt = '<span class="badge badge-warning">Pending</span>';
            }elseif($row['status']==2){
                $butt = '<span class="badge badge-danger">Inactive</span>';
            }
            echo '<tr>
                    <td>'.$row['userid'].'</td>
                    <td>'.$row['username'].'</td>
                    <td>'.$row['fname'].' '.$row['fname'].'</td>
                    <td>'.$row['email'].'</td>
                    <td>'.$row['phone'].'</td>
                    <td style="font-size: 13px;">'.$row['date_reg'].'</td>
                    <td>'.$butt.'</td>
                    <td><button class="mb-2 mr-2 btn btn-shadow btn-outline-success btn-sm" onclick="activateSeller('.$row['userid'].')" style="float: left;"><i class="fa fa-check btn-icon-wrapper"></i></button>
                        <button class="mb-2 mr-2 btn btn-shadow btn-danger btn-sm" onclick="deactivateSeller('.$row['userid'].')"><i class="fa fa-times btn-icon-wrapper"></i></button>
                        <a href="seller_details.php?sellerid='.$row['userid'].'" class="mb-2 btn btn-shadow btn-info btn-sm"><i class="fa fa-address-card btn-icon-wrapper"></i></a></td>
                </tr>';
        }
    }
    //Get all active seller
    public function view_active_seller(){

        $sql = 'SELECT * FROM users WHERE (role = "Seller" OR role = "International") AND status=1 ORDER BY sn';
        foreach ($this->conn->query($sql) as $row) {

            if($row['status']==1){
                $butt = '<span class="badge badge-success">Active</span>';
            }elseif($row['status']==0){
                $butt = '<span class="badge badge-warning">Pending</span>';
            }elseif($row['status']==2){
                $butt = '<span class="badge badge-danger">Inactive</span>';
            }
            echo '<tr>
                    <td>'.$row['userid'].'</td>
                    <td>'.$row['username'].'</td>
                    <td>'.$row['fname'].' '.$row['fname'].'</td>
                    <td>'.$row['email'].'</td>
                    <td>'.$row['phone'].'</td>
                    <td style="font-size: 13px;">'.$row['date_reg'].'</td>
                    <td>'.$butt.'</td>
                    <td><button class="mb-2 mr-2 btn btn-shadow btn-danger btn-sm" onclick="deactivateSeller('.$row['userid'].')"><i class="fa fa-times btn-icon-wrapper"></i></button> <a href="seller_details.php?sellerid='.$row['userid'].'" class="mb-2 btn btn-shadow btn-info btn-sm"><i class="fa fa-address-card btn-icon-wrapper"></i></a></td>
                </tr>';
        }
    }
    //Get all inactive seller
    public function view_inactive_seller(){

        $sql = 'SELECT * FROM users WHERE (role = "Seller" OR role = "International") AND status=2 ORDER BY sn';
        foreach ($this->conn->query($sql) as $row) {

           if($row['status']==1){
                $butt = '<span class="badge badge-success">Active</span>';
            }elseif($row['status']==0){
                $butt = '<span class="badge badge-warning">Pending</span>';
            }elseif($row['status']==2){
                $butt = '<span class="badge badge-danger">Inactive</span>';
            }
            echo '<tr>
                    <td>'.$row['userid'].'</td>
                    <td>'.$row['username'].'</td>
                    <td>'.$row['fname'].' '.$row['fname'].'</td>
                    <td>'.$row['email'].'</td>
                    <td>'.$row['phone'].'</td>
                    <td style="font-size: 13px;">'.$row['date_reg'].'</td>
                    <td>'.$butt.'</td>
                    <td><button class="mb-2 mr-2 btn btn-shadow btn-outline-success btn-sm" style="float: left;" onclick="activateSeller('.$row['userid'].')"><i class="fa fa-check btn-icon-wrapper"></i></button> <a href="seller_details.php?sellerid='.$row['userid'].'" class="mb-2 btn btn-shadow btn-info btn-sm"><i class="fa fa-address-card btn-icon-wrapper"></i></a></td>
                </tr>';
        }
    }

    //Get all products
    public function view_all_products(){

        $sql = 'SELECT * FROM product_details ORDER BY id';
        foreach ($this->conn->query($sql) as $row) {

            $userInfo = $this->userDetails($row['userid']);

            if($row['status']=='Active'){
                $butt = '<span class="badge badge-success">Active</span>';
                $btt = '<button class="mb-2 btn btn-shadow btn-danger btn-sm" onclick="deactivateProduct('.$row['productid'].', '.$userInfo->userid.')"><i class="fa fa-times btn-icon-wrapper"></i></button>
                <a href="product_details.php?productid='.$row['productid'].'" class="mb-2 btn btn-shadow btn-info btn-sm"><i class="fa fa-shopping-cart btn-icon-wrapper"></i></a>';
            }elseif($row['status']=="Pending"){
                $butt = '<span class="badge badge-warning">Pending</span>';
                $btt = '<button class="mb-2 btn btn-shadow btn-outline-success btn-sm" onclick="activateProduct('.$row['productid'].', '.$userInfo->userid.')"><i class="fa fa-check btn-icon-wrapper"></i></button>
                        <button class="mb-2 btn btn-shadow btn-danger btn-sm" onclick="deactivateProduct('.$row['productid'].', '.$userInfo->userid.')"><i class="fa fa-times btn-icon-wrapper"></i></button>
                        <a href="product_details.php?productid='.$row['productid'].'" class="mb-2 btn btn-shadow btn-info btn-sm"><i class="fa fa-shopping-cart btn-icon-wrapper"></i></a>';
            }elseif($row['status']=='Inactive'){
                $butt = '<span class="badge badge-danger">Inactive</span>';
                $btt = '<button class="mb-2 btn btn-shadow btn-outline-success btn-sm" onclick="activateProduct('.$row['productid'].', '.$userInfo->userid.')"><i class="fa fa-check btn-icon-wrapper"></i></button>
                        <a href="product_details.php?productid='.$row['productid'].'" class="mb-2 btn btn-shadow btn-info btn-sm"><i class="fa fa-shopping-cart btn-icon-wrapper"></i></a>';
            }

            if($row['topCatSetting'] == 1){
                $checkers = 'Checked';
            }elseif($row['topCatSetting']==0){
                $checkers = '';
            }
            echo '<tr>
                    <td>'.$row['productid'].'</td>
                    <td>'.$row['product_title'].'</td>
                    <td>'.$row['product_category'].'</td>
                    <td>'.mb_substr(htmlspecialchars_decode($row['product_description']), 0, 30).'</td>
                    <td>'.$userInfo->username.'</td>
                    <td><input type="checkbox" data-toggle="toggle" onchange="return validate('.$row['productid'].')" id="productSetting" name="productSetting" data-size="mini" '.$checkers.'></td>
                    <td>'.$row['created_at'].'</td>
                    <td>'.$butt.'</td>
                    <td>'.$btt.'</td>
                </tr>';
        }
    }

    //Get all pending products
    public function view_pending_products(){

        $sql = 'SELECT * FROM product_details WHERE status="Pending" ORDER BY id';
        foreach ($this->conn->query($sql) as $row) {

            $userInfo = $this->userDetails($row['userid']);

            if($row['status']=='Active'){
                $butt = '<span class="badge badge-success">Active</span>';
            }elseif($row['status']=="Pending"){
                $butt = '<span class="badge badge-warning">Pending</span>';
            }elseif($row['status']=="Inactive"){
                $butt = '<span class="badge badge-danger">Inactive</span>';
            }
            echo '<tr>
                    <td>'.$row['productid'].'</td>
                    <td>'.$row['product_title'].'</td>
                    <td>'.$row['product_category'].'</td>
                    <td>'.mb_substr(htmlspecialchars_decode($row['product_description']), 0, 30).'</td>
                    <td>'.$userInfo->username.'</td>
                    <td>'.$row['created_at'].'</td>
                    <td>'.$butt.'</td>
                    <td>
                        <button class="mb-2 btn btn-shadow btn-outline-success btn-sm" onclick="activateProduct('.$row['productid'].', '.$userInfo->userid.')"><i class="fa fa-check btn-icon-wrapper"></i></button>
                        <button class="mb-2 btn btn-shadow btn-danger btn-sm" onclick="deactivateProduct('.$row['productid'].', '.$userInfo->userid.')"><i class="fa fa-times btn-icon-wrapper"></i></button>
                        <a href="product_details.php?productid='.$row['productid'].'" class="mb-2 btn btn-shadow btn-info btn-sm"><i class="fa fa-shopping-cart btn-icon-wrapper"></i></a></td>
                </tr>';
        }
    }

    //Get all active products
    public function view_active_products(){

        $sql = 'SELECT * FROM product_details WHERE status="Active" ORDER BY id';
        foreach ($this->conn->query($sql) as $row) {

            $userInfo = $this->userDetails($row['userid']);

            if($row['status']=='Active'){
                $butt = '<span class="badge badge-success">Active</span>';
            }elseif($row['status']=="Pending"){
                $butt = '<span class="badge badge-warning">Pending</span>';
            }elseif($row['status']=="Inactive"){
                $butt = '<span class="badge badge-danger">Inactive</span>';
            }

            if($row['topCatSetting'] == 1){
                $checkers = 'Checked';
            }elseif($row['topCatSetting']==0){
                $checkers = '';
            }
            echo '<tr>
                    <td>'.$row['productid'].'</td>
                    <td>'.$row['product_title'].'</td>
                    <td>'.$row['product_category'].'</td>
                    <td>'.mb_substr(htmlspecialchars_decode($row['product_description']), 0, 30).'</td>
                    <td>'.$userInfo->username.'</td>
                    <td><input type="checkbox" data-toggle="toggle" onchange="return validate('.$row['productid'].')" id="productSetting" name="productSetting" data-size="mini" '.$checkers.'></td>
                    <td>'.$row['created_at'].'</td>
                    <td>'.$butt.'</td>
                    <td>
                        <button class="mb-2 btn btn-shadow btn-outline-danger btn-sm" onclick="deactivateProduct('.$row['productid'].', '.$userInfo->userid.')">
                        <i class="fa fa-times btn-icon-wrapper"></i></button>
                        <a href="product_details.php?productid='.$row['productid'].'" class="mb-2 btn btn-shadow btn-info btn-sm"><i class="fa fa-shopping-cart btn-icon-wrapper"></i></a>
                    </td>
                </tr>';
        }
    }

    //Get all active products
    public function view_inactive_products(){

        $sql = 'SELECT * FROM product_details WHERE status="Inactive" ORDER BY id';
        foreach ($this->conn->query($sql) as $row) {

            $userInfo = $this->userDetails($row['userid']);

            if($row['status']=='Active'){
                $butt = '<span class="badge badge-success">Active</span>';
            }elseif($row['status']=="Pending"){
                $butt = '<span class="badge badge-warning">Pending</span>';
            }elseif($row['status']=="Inactive"){
                $butt = '<span class="badge badge-danger">Inactive</span>';
            }
            echo '<tr>
                    <td>'.$row['productid'].'</td>
                    <td>'.$row['product_title'].'</td>
                    <td>'.$row['product_category'].'</td>
                    <td>'.mb_substr(htmlspecialchars_decode($row['product_description']), 0, 30).'</td>
                    <td>'.$userInfo->username.'</td>
                    <td>'.$row['created_at'].'</td>
                    <td>'.$butt.'</td>
                    <td>
                        <button class="mb-2 btn btn-shadow btn-outline-success btn-sm" onclick="activateProduct('.$row['productid'].', '.$userInfo->userid.')">
                        <i class="fa fa-check btn-icon-wrapper"></i></button>
                        <a href="product_details.php?productid='.$row['productid'].'" class="mb-2 btn btn-shadow btn-info btn-sm"><i class="fa fa-shopping-cart btn-icon-wrapper"></i></a>
                    </td>
                </tr>';
        }
    }

    public function activateSeller(){
        $query = "UPDATE users SET status=:status WHERE userid=:userid";

        $stmt = $this->conn->prepare($query);

        $this->status = htmlspecialchars(strip_tags($this->status));
        $this->userid = htmlspecialchars(strip_tags($this->userid));

        $stmt->bindValue('status', $this->status);
        $stmt->bindValue('userid', $this->userid);

        if($stmt->execute()){
            $this->userid = $this->userid;
            $this->title = 'Account Approved' ;
            $this->body = 'Your account has been activate!';
            $this->generatedlink = "seller_details.php?sellerid=".$this->userid;
            $this->notifications();

            return true;
        }
        printf("Error: %s.\n", $stmt->error);
        return false;
    }

    public function deactivateSeller(){
        $query = "UPDATE users SET status=:status WHERE userid=:userid";

        $stmt = $this->conn->prepare($query);

        $this->status = htmlspecialchars(strip_tags($this->status));
        $this->userid = htmlspecialchars(strip_tags($this->userid));

        $stmt->bindValue('status', $this->status);
        $stmt->bindValue('userid', $this->userid);

        if($stmt->execute()){
            $userid = $this->userid;

            $this->userid = $this->userid;
            $this->title = 'Account Disapproved' ;
            $this->body = 'Your account has been Disapproved!';
            $this->generatedlink = "seller_details.php?sellerid=".$this->userid;
            $this->notifications();

            return true;
        }
        printf("Error: %s.\n", $stmt->error);
        return false;
    }

    public function activateProduct(){
        $query = "UPDATE product_details SET status=:status WHERE productid=:productid";

        $stmt = $this->conn->prepare($query);

        $this->status = htmlspecialchars(strip_tags($this->status));
        $this->productid = htmlspecialchars(strip_tags($this->productid));
        $this->sellerid = htmlspecialchars(strip_tags($this->sellerid));

        $stmt->bindValue('status', $this->status);
        $stmt->bindValue('productid', $this->productid);

        if($stmt->execute()){
            $this->userid = $this->sellerid;
            $this->title = 'Product Approved' ;
            $this->body = 'Your product has been approved!';
            $this->generatedlink = "product_details.php?productid=".$this->productid;
            $this->notifications();

            return true;
        }
        printf("Error: %s.\n", $stmt->error);
        return false;
    }

    public function deactivateProduct(){
        $query = "UPDATE product_details SET status=:status WHERE productid=:productid";

        $stmt = $this->conn->prepare($query);

        $this->status = htmlspecialchars(strip_tags($this->status));
        $this->productid = htmlspecialchars(strip_tags($this->productid));
        $this->sellerid = htmlspecialchars(strip_tags($this->sellerid));

        $stmt->bindValue('status', $this->status);
        $stmt->bindValue('productid', $this->productid);

        if($stmt->execute()){
            $this->userid = $this->sellerid;
            $this->title = 'Product Disapproved' ;
            $this->body = 'Your product was not approved!';
            $this->generatedlink = "product_details.php?productid=".$this->productid;
            $this->notifications();

            return true;
        }
        printf("Error: %s.\n", $stmt->error);
        return false;
    }

    // create dispute
    public function create_dispute(){

        $query = "INSERT INTO disputetbl (disputeid,senderid,againstid,subject,priority,details_priority,file_name,status)
            VALUES (:disputeid,:senderid,:againstid,:subject,:priority,:details_priority,:file_name,:status)";

        $stmt = $this->conn->prepare($query);

        $this->disputeid = htmlspecialchars(strip_tags($this->disputeid));
        $this->senderid = htmlspecialchars(strip_tags($this->senderid));
        $this->againstid = htmlspecialchars(strip_tags($this->againstid));
        $this->subject = htmlspecialchars(strip_tags($this->subject));
        $this->priority = htmlspecialchars(strip_tags($this->priority));
        $this->details_priority = htmlspecialchars(strip_tags($this->details_priority));
        $this->file_name = htmlspecialchars(strip_tags($this->file_name));
        $this->status = htmlspecialchars(strip_tags($this->disputestatus));

        $stmt->bindValue('disputeid', $this->disputeid);
        $stmt->bindValue('senderid', $this->senderid);
        $stmt->bindValue('againstid', $this->againstid);
        $stmt->bindValue('subject', $this->subject);
        $stmt->bindValue('priority', $this->priority);
        $stmt->bindValue('details_priority', $this->details_priority);
        $stmt->bindValue('file_name', $this->file_name);
        $stmt->bindValue('status', $this->status);

        if($stmt->execute()){
            $this->userid = $this->senderid;
            $this->title = 'New Dispute Created!';
            $this->body = 'A new dispute has been created!';
            $this->generatedlink = "dispute_details.php?disputeid=".$this->disputeid;
            if($this->notifications()){
                $this->userid = $this->againstid;
                $this->title = 'A Dispute Ticket Against You!';
                $this->body = 'A dispute ticket has been created againt you, please respond to it before we take the legal actions!';
                $this->generatedlink = "dispute_details.php?disputeid=".$this->disputeid;
                $this->notifications();
            }

            return true;
        }
        printf("Error: %s.\n", $stmt->error);
        return false;
    }

    //Get User dispute  List
    public function user_dispute_list($userid){
        $this->userid = $userid;
        $sql = 'SELECT * FROM disputetbl WHERE senderid='.$this->userid.' OR againstid= '.$this->userid;
        foreach ($this->conn->query($sql) as $row) {
            $cnt = $this->userDetails($row['senderid']);
            $cnt2 = $this->userDetails($row['againstid']);

            if($row['againstid'] == $_SESSION['userid']){
                $this->againster = "Filed against You";
            }elseif($row['senderid'] == $_SESSION['userid']){
                $this->againster = "You filed against ".ucfirst($cnt2->username);
            }

            $this->timestamp = $row['created_at'];
            $this->splitTimeStamp = explode(" ",$this->timestamp);
            $this->date = $this->splitTimeStamp[0];
            $this->time = $this->splitTimeStamp[1];

            if($row['status'] == 'Pending'){
                $this->stat = '<span class="badge badge-pill badge-sm badge-warning">Pending</span>';
                $this->ifnotpending = '<small class="badge badge-pill badge-sm badge-secondary text-capitalize">Admin<br>Reviewing</small>';
            }elseif($row['status'] == 'Resolved'){
                $this->stat = '<span class="badge badge-pill badge-sm badge-success">Resolved</span>';
                $this->ifnotpending = 'Closed';
            }elseif($row['status'] == 'In Progress'){
                $this->stat = '<span class="badge badge-pill badge-sm badge-info">In Progress</span>';
                $this->ifnotpending = '<a class="btn btn-info btn-sm text-white" id="'.$cnt->username.'-'.$cnt2->username.'" onclick="replyDispute('.$row['disputeid'].', '.$row['senderid'].', '.$row['againstid'].', this.id)"><i class="fa fa-reply fa-w-20 opacity-4"></i></a>';
            }elseif($row['status'] == 'Cancelled'){
                $this->stat = '<span class="badge badge-pill badge-sm badge-danger">Cancelled</span>';
                $this->ifnotpending = 'Closed';
            }
            echo '<tr>
                    <td>
                        <div class="widget-content p-0">
                            <div class="widget-content-wrapper">
                                <div class="widget-content-left mr-3">
                                    <i class="fa fa-file fa-2x"></i>
                                </div>
                                <div class="widget-content-left">
                                    <a href="dispute_details.php?disputeid='.$row['disputeid'].'"><div class="widget-heading">'.$row['subject'].'</div></a>
                                    <div class="widget-subheading">'. $this->againster .'</div>
                                </div>
                            </div>
                        </div>
                    </td>
                    <td class="text-left">'.$result = mb_substr($row['details_priority'], 0, 50).'</td>
                    <td>
                        '.$this->stat.'
                    </td>
                    <td>
                        '.$this->ifnotpending.'
                    </td>
                    <td class="text-right">
                        '.$this->date.'
                    </td>
                </tr>';
        }
    }

    // dispute count
    public function dispute_count($userid, $ss){
        $this->userid = $userid;
        $this->ss = ucfirst($ss);
        $sql = "SELECT count(*) FROM `disputetbl` WHERE (senderid=:userid OR againstid=:userid) AND status=:status";
        $stmt = $this->conn->prepare($sql);

        $stmt->bindValue('userid', $userid);
        $stmt->bindValue('status', $ss);
        if($stmt->execute()){
            $number_of_rows = $stmt->fetchColumn();
            echo $number_of_rows;
            return;
            // return;
        }


        // $result = $con->prepare($sql);
        // $result->execute();
        // $number_of_rows = $result->fetchColumn();
    }

    //Get all products
    public function view_all_dispute(){

        $sql = 'SELECT * FROM disputetbl ORDER BY id';
        foreach ($this->conn->query($sql) as $row) {

            $senderid = $this->userDetails($row['senderid']);
            $againstid = $this->userDetails($row['againstid']);

            if($row['status']=='Resolved'){
                $butt = '<span class="badge badge-success">Resolved</span>';
                $btt = '<a href="dispute_details.php?disputeid='.$row['disputeid'].'" class="mb-2 btn btn-shadow btn-info btn-sm"><i class="fa fa-file btn-icon-wrapper"></i></a>';
            }elseif($row['status']=="Pending"){
                $butt = '<span class="badge badge-warning">Pending</span>';
                $btt = '<button class="mb-2 btn btn-shadow btn-outline-success btn-sm" onclick="resolvedDispute('.$row['disputeid'].', '.$senderid->userid.', '.$againstid->userid.')"><i class="fa fa-check btn-icon-wrapper"></i></button>
                        <button class="mb-2 btn btn-shadow btn-danger btn-sm" onclick="cancelledDispute('.$row['disputeid'].', '.$senderid->userid.', '.$againstid->userid.')"><i class="fa fa-times btn-icon-wrapper"></i></button>
                        <a href="dispute_details.php?disputeid='.$row['disputeid'].'" class="mb-2 btn btn-shadow btn-info btn-sm"><i class="fa fa-file btn-icon-wrapper"></i></a>';
            }elseif($row['status']=='Cancelled'){
                $butt = '<span class="badge badge-danger">Cancelled</span>';
                $btt = '<a href="dispute_details.php?disputeid='.$row['disputeid'].'" class="mb-2 btn btn-shadow btn-info btn-sm"><i class="fa fa-file btn-icon-wrapper"></i></a>';
            }elseif($row['status']=='In Progress'){
                $butt = '<span class="badge badge-info">In Progress</span>';
                $btt = '<button class="mb-2 btn btn-shadow btn-outline-success btn-sm" onclick="resolvedDispute('.$row['disputeid'].', '.$senderid->userid.', '.$againstid->userid.')"><i class="fa fa-check btn-icon-wrapper"></i></button>
                <a href="dispute_details.php?disputeid='.$row['disputeid'].'" class="mb-2 btn btn-shadow btn-info btn-sm"><i class="fa fa-file btn-icon-wrapper"></i></a>';
            }
            echo '<tr>
                    <td><a href="dispute_details.php?disputeid='.$row['disputeid'].'">'.$row['disputeid'].'</a></td>
                    <td>'.$senderid->username.'<button type="button" class="btn btn-shadow btn-outline-info btn-sm" onclick="replySender('.$row['disputeid'].', '.$row['senderid'].', '.$row['againstid'].', this.id)" id="'.$senderid->username.'-'.$againstid->username.'"> <i class="fa fa-reply"></i></button></td>
                    <td>'.$againstid->username.'<button type="button" class="btn btn-shadow btn-outline-info btn-sm" onclick="replyAgainst('.$row['disputeid'].', '.$row['senderid'].', '.$row['againstid'].', this.id)" id="'.$senderid->username.'-'.$againstid->username.'"> <i class="fa fa-reply"></i></button></td>
                    <td>'.$row['subject'].'</td>
                    <td>'.$row['priority'].'</td>
                    <td>'.$row['created_at'].'</td>
                    <td>'.$butt.'</td>
                    <td>'.$btt.'</td>
                </tr>';
        }
    }

    //Get all products
    public function view_resolved_dispute(){

        $sql = 'SELECT * FROM disputetbl WHERE status="Resolved" ORDER BY id';
        foreach ($this->conn->query($sql) as $row) {

            $senderid = $this->userDetails($row['senderid']);
            $againstid = $this->userDetails($row['againstid']);

            echo '<tr>
                    <td><a href="dispute_details.php?disputeid='.$row['disputeid'].'">'.$row['disputeid'].'</a></td>
                    <td>'.$senderid->username.'<button type="button" class="btn btn-shadow btn-outline-info btn-sm" onclick="replySender('.$row['disputeid'].', '.$row['senderid'].', '.$row['againstid'].', this.id)" id="'.$senderid->username.'-'.$againstid->username.'"> <i class="fa fa-reply"></i></button></td>
                    <td>'.$againstid->username.'<button type="button" class="btn btn-shadow btn-outline-info btn-sm" onclick="replyAgainst('.$row['disputeid'].', '.$row['senderid'].', '.$row['againstid'].', this.id)" id="'.$senderid->username.'-'.$againstid->username.'"> <i class="fa fa-reply"></i></button></td>
                    <td>'.$row['subject'].'</td>
                    <td>'.$row['priority'].'</td>
                    <td>'.$row['created_at'].'</td>
                    <td><span class="badge badge-success">Resolved</span></td>
                    <td><a href="dispute_details.php?disputeid='.$row['disputeid'].'" class="mb-2 btn btn-shadow btn-info btn-sm"><i class="fa fa-file btn-icon-wrapper"></i></a></td>
                </tr>';
        }
    }

    public function view_inprogress_dispute(){

        $sql = 'SELECT * FROM disputetbl WHERE status="In Progress" ORDER BY id';
        foreach ($this->conn->query($sql) as $row) {

            $senderid = $this->userDetails($row['senderid']);
            $againstid = $this->userDetails($row['againstid']);

            echo '<tr>
                    <td><a href="dispute_details.php?disputeid='.$row['disputeid'].'">'.$row['disputeid'].'</a></td>
                    <td>'.$senderid->username.'<button type="button" class="btn btn-shadow btn-outline-info btn-sm" onclick="replySender('.$row['disputeid'].', '.$row['senderid'].', '.$row['againstid'].', this.id)" id="'.$senderid->username.'-'.$againstid->username.'"> <i class="fa fa-reply"></i></button></td>
                    <td>'.$againstid->username.'<button type="button" class="btn btn-shadow btn-outline-info btn-sm" onclick="replyAgainst('.$row['disputeid'].', '.$row['senderid'].', '.$row['againstid'].', this.id)" id="'.$senderid->username.'-'.$againstid->username.'"> <i class="fa fa-reply"></i></button></td>
                    <td>'.$row['subject'].'</td>
                    <td>'.$row['priority'].'</td>
                    <td>'.$row['created_at'].'</td>
                    <td><span class="badge badge-info">In Progress</span></td>
                    <td><button class="mb-2 btn btn-shadow btn-outline-success btn-sm" onclick="resolvedDispute('.$row['disputeid'].', '.$senderid->userid.', '.$againstid->userid.')"><i class="fa fa-check btn-icon-wrapper"></i></button><a href="dispute_details.php?disputeid='.$row['disputeid'].'" class="mb-2 btn btn-shadow btn-info btn-sm"><i class="fa fa-file btn-icon-wrapper"></i></a></td>
                </tr>';
        }
    }

    public function view_pending_dispute(){

        $sql = 'SELECT * FROM disputetbl WHERE status="Pending" ORDER BY id';
        foreach ($this->conn->query($sql) as $row) {

            $senderid = $this->userDetails($row['senderid']);
            $againstid = $this->userDetails($row['againstid']);

            echo '<tr>
                    <td><a href="dispute_details.php?disputeid='.$row['disputeid'].'">'.$row['disputeid'].'</a></td>
                    <td>'.$senderid->username.'<button type="button" class="btn btn-shadow btn-outline-info btn-sm" onclick="replySender('.$row['disputeid'].', '.$row['senderid'].', '.$row['againstid'].', this.id)" id="'.$senderid->username.'-'.$againstid->username.'"> <i class="fa fa-reply"></i></button></td>
                    <td>'.$againstid->username.'<button type="button" class="btn btn-shadow btn-outline-info btn-sm" onclick="replyAgainst('.$row['disputeid'].', '.$row['senderid'].', '.$row['againstid'].', this.id)" id="'.$senderid->username.'-'.$againstid->username.'"> <i class="fa fa-reply"></i></button></td>
                    <td>'.$row['subject'].'</td>
                    <td>'.$row['priority'].'</td>
                    <td>'.$row['created_at'].'</td>
                    <td><span class="badge badge-warning">Pending</span></td>
                    <td><button class="mb-2 btn btn-shadow btn-outline-success btn-sm" onclick="resolvedDispute('.$row['disputeid'].', '.$senderid->userid.', '.$againstid->userid.')"><i class="fa fa-check btn-icon-wrapper"></i></button>
                    <button class="mb-2 btn btn-shadow btn-danger btn-sm" onclick="cancelledDispute('.$row['disputeid'].', '.$senderid->userid.', '.$againstid->userid.')"><i class="fa fa-times btn-icon-wrapper"></i></button>
                    <a href="dispute_details.php?disputeid='.$row['disputeid'].'" class="mb-2 btn btn-shadow btn-info btn-sm"><i class="fa fa-file btn-icon-wrapper"></i></a></td>
                </tr>';
        }
    }

    public function view_cancelled_dispute(){

        $sql = 'SELECT * FROM disputetbl WHERE status="Cancelled" ORDER BY id';
        foreach ($this->conn->query($sql) as $row) {

            $senderid = $this->userDetails($row['senderid']);
            $againstid = $this->userDetails($row['againstid']);

            echo '<tr>
                    <td><a href="dispute_details.php?disputeid='.$row['disputeid'].'">'.$row['disputeid'].'</a></td>
                    <td>'.$senderid->username.'<button type="button" class="btn btn-shadow btn-outline-info btn-sm" onclick="replySender('.$row['disputeid'].', '.$row['senderid'].', '.$row['againstid'].', this.id)" id="'.$senderid->username.'-'.$againstid->username.'"> <i class="fa fa-reply"></i></button></td>
                    <td>'.$againstid->username.'<button type="button" class="btn btn-shadow btn-outline-info btn-sm" onclick="replyAgainst('.$row['disputeid'].', '.$row['senderid'].', '.$row['againstid'].', this.id)" id="'.$senderid->username.'-'.$againstid->username.'"> <i class="fa fa-reply"></i></button></td>
                    <td>'.$row['subject'].'</td>
                    <td>'.$row['priority'].'</td>
                    <td>'.$row['created_at'].'</td>
                    <td><span class="badge badge-danger">Cancelled</span></td>
                    <td><a href="dispute_details.php?disputeid='.$row['disputeid'].'" class="mb-2 btn btn-shadow btn-info btn-sm"><i class="fa fa-file btn-icon-wrapper"></i></a></td>
                </tr>';
        }
    }

    //process dispute
    public function processDispute(){

        $query = "INSERT INTO disputeresponse (disputeid,senderid,againstid,messageby,responsemessage)
                VALUES (:disputeid,:senderid,:againstid,:messageby,:responsemessage)";

        $stmt = $this->conn->prepare($query);

        $this->disputeid = htmlspecialchars(strip_tags($this->disputeid));
        $this->senderid = htmlspecialchars(strip_tags($this->senderid));
        $this->againstid = htmlspecialchars(strip_tags($this->againstid));
        $this->messageby = htmlspecialchars(strip_tags($this->messageby));
        $this->dispute_message = htmlspecialchars(strip_tags($this->dispute_message));

        $stmt->bindValue('disputeid', $this->disputeid);
        $stmt->bindValue('senderid', $this->senderid);
        $stmt->bindValue('againstid', $this->againstid);
        $stmt->bindValue('messageby', $this->messageby);
        $stmt->bindValue('responsemessage', $this->dispute_message);

        if($stmt->execute()){
            if($this->updateDisputeStatus($this->disputeid, $this->status)){
                $this->userid = $this->senderid;
                $this->title = 'RE: Your Dispute Ticket Response';
                $this->body = 'You got a response from the dispute ticket u created!';
                $this->generatedlink = "dispute_details.php?disputeid=".$this->disputeid;
                if($this->notifications()){
                    $this->userid = $this->againstid;
                    $this->title = 'RE: Dispute Response Against You';
                    $this->body = 'A dispute ticket has been opened against you!';
                    $this->generatedlink = "dispute_details.php?disputeid=".$this->disputeid;
                    $this->notifications();
                    return true;
                }
            }

        }
        printf("Error: %s.\n", $stmt->error);
        return false;
    }

    //process dispute
    public function processDisputeUser(){

        $query = "INSERT INTO disputeresponse (disputeid,senderid,againstid,messageby,responsemessage)
                VALUES (:disputeid,:senderid,:againstid,:messageby,:responsemessage)";

        $stmt = $this->conn->prepare($query);

        $this->disputeid = htmlspecialchars(strip_tags($this->disputeid));
        $this->senderid = htmlspecialchars(strip_tags($this->senderid));
        $this->againstid = htmlspecialchars(strip_tags($this->againstid));
        $this->messageby = htmlspecialchars(strip_tags($this->messageby));
        $this->dispute_message = htmlspecialchars(strip_tags($this->dispute_message));

        $stmt->bindValue('disputeid', $this->disputeid);
        $stmt->bindValue('senderid', $this->senderid);
        $stmt->bindValue('againstid', $this->againstid);
        $stmt->bindValue('messageby', $this->messageby);
        $stmt->bindValue('responsemessage', $this->dispute_message);

        if($stmt->execute()){
            $this->userid = $this->senderid;
            $this->title = 'RE: Your Dispute Ticket Response';
            $this->body = 'You got a response from the dispute ticket u created!';
            $this->generatedlink = "dispute_details.php?disputeid=".$this->disputeid;
            if($this->notifications()){
                $this->userid = $this->againstid;
                $this->title = 'RE: Dispute Response Against You';
                $this->body = 'A dispute ticket has been opened against you!';
                $this->generatedlink = "dispute_details.php?disputeid=".$this->disputeid;
                $this->notifications();
                return true;
            }

        }
        printf("Error: %s.\n", $stmt->error);
        return false;
    }

    //Update dispute status
    public function updateDisputeStatus($disputeid, $status){
        $this->disputeid = $disputeid;
        $this->status = $status;

        $query = "UPDATE disputetbl SET status=:status WHERE disputeid=:disputeid";

        $stmt = $this->conn->prepare($query);

        $this->status = htmlspecialchars(strip_tags($this->status));
        $this->disputeid = htmlspecialchars(strip_tags($this->disputeid));

        $stmt->bindValue('status', $this->status);
        $stmt->bindValue('disputeid', $this->disputeid);

        if($stmt->execute()){
            return true;
        }
        printf("Error: %s.\n", $stmt->error);
        return false;
    }

    public function readProfilePixController($userid){
        $query = "SELECT * FROM profilepic WHERE userid = :userid";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam('userid', $userid);
        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return $row['file_name'];
    }

    public function disputeinvolver($disputeid){
        $stmt = $this->conn->prepare("SELECT * FROM disputetbl WHERE disputeid=:disputeid");
        $stmt->bindParam("disputeid", $disputeid, PDO::PARAM_INT);
        $stmt->execute();
        $data = $stmt->fetch(PDO::FETCH_OBJ); //User data

        $senderDetails = $this->userDetails($data->senderid);
        $againstDetails = $this->userDetails($data->againstid);

        echo '<li class="nav-item">
                <button type="button" tabindex="0" class="dropdown-item">
                    <div class="widget-content p-0">
                        <div class="widget-content-wrapper">
                            <div class="widget-content-left mr-3">
                                <div class="avatar-icon-wrapper">
                                    <div class="badge badge-bottom badge-secondary badge-dot badge-dot-lg"></div>
                                    <div class="avatar-icon"><img src="images/avatars/avatar.jpg" alt=""></div>
                                </div>
                            </div>
                            <div class="widget-content-left">
                                <div class="widget-subheading">Super Admin</div>
                            </div>
                        </div>
                    </div>
                </button>
            </li>';

            echo '<li class="nav-item">
                    <button type="button" tabindex="0" class="dropdown-item">
                        <div class="widget-content p-0">
                            <div class="widget-content-wrapper">
                                <div class="widget-content-left mr-3">
                                    <div class="avatar-icon-wrapper">
                                        <div class="badge badge-bottom badge-success badge-dot badge-dot-lg"></div>
                                        <div class="avatar-icon"><img src="../seller/profilepicture/'.$senderDetails->userid.'/'.$this->readProfilePixController($senderDetails->userid).'"width="50" height="50" class="rounded-circle" alt="Profile Picture"></div>
                                    </div>
                                </div>
                                <div class="widget-content-left">
                                    <div class="widget-subheading">'.$senderDetails->username.'</div>
                                </div>
                            </div>
                        </div>
                    </button>
                </li>';

            echo '<li class="nav-item">
                        <button type="button" tabindex="0" class="dropdown-item">
                            <div class="widget-content p-0">
                                <div class="widget-content-wrapper">
                                    <div class="widget-content-left mr-3">
                                        <div class="avatar-icon-wrapper">
                                            <div class="badge badge-bottom badge-danger badge-dot badge-dot-lg"></div>
                                            <div class="avatar-icon"><img src="../seller/profilepicture/'.$againstDetails->userid.'/'.$this->readProfilePixController($againstDetails->userid).'"width="50" height="50" class="rounded-circle" alt="Profile Picture"></div>
                                        </div>
                                    </div>
                                    <div class="widget-content-left">
                                        <div class="widget-subheading">'.$againstDetails->username.'</div>
                                    </div>
                                </div>
                            </div>
                        </button>
                    </li>';
    }

    public function disputeMessages($disputeid){
        $stmt = $this->conn->prepare("SELECT * FROM disputetbl WHERE disputeid=:disputeid");
        $stmt->bindParam("disputeid", $disputeid, PDO::PARAM_INT);
        $stmt->execute();
        $data = $stmt->fetch(PDO::FETCH_OBJ);

        $senderDetails = $this->userDetails($data->senderid);
        $againstDetails = $this->userDetails($data->againstid);

        echo '<div class="chat-box-wrapper">
                <div>
                    <div class="avatar-icon-wrapper mr-1">
                        <div class="badge badge-bottom btn-shine badge-success badge-dot badge-dot-lg"></div>
                        <div class="avatar-icon avatar-icon-lg rounded">
                        <img src="../seller/profilepicture/'.$senderDetails->userid.'/'.$this->readProfilePixController($senderDetails->userid).'"width="50" height="50" class="rounded-circle" alt="Profile Picture">
                        </div>
                    </div>
                </div>
                <div>
                    <div class="chat-box bg-success text-white">'.$data->details_priority.'</div>
                </div>
            </div>
            <small class="opacity-6 float-right pr-4" style="margin-top: -20px;"><i class="fa fa-calendar-alt mr-1"></i> '.$data->created_at.'</small>
            <div class="divider"></div>';
        $this->viewAllDispute($disputeid, $senderDetails->userid, $againstDetails->userid);
    }

    //Get User dispute  List
    public function viewAllDispute($disputeid, $senderid, $againstid){
        $this->disputeid = $disputeid;
        $sql = 'SELECT * FROM disputeresponse WHERE disputeid='.$this->disputeid.' ORDER BY created_at ASC';
        foreach ($this->conn->query($sql) as $row) {
            if($row['messageby'] == 1111){
                $this->positiondis = '';
                $this->backgrounddis = 'bg-secondary';
                $this->imager = '<img src="images/avatars/avatar.jpg" alt="">';
            }elseif($row['messageby'] == $senderid){
                $this->positiondis = '';
                $this->backgrounddis = 'bg-success';
                $this->imager = '<img src="../seller/profilepicture/'.$senderid.'/'.$this->readProfilePixController($senderid).'"width="50" height="50" class="rounded-circle" alt="Profile Picture">';
            }elseif($row['messageby'] == $againstid){
                $this->positiondis = 'float-right';
                $this->backgrounddis = 'bg-danger';
                $this->imager = '<img src="../seller/profilepicture/'.$againstid.'/'.$this->readProfilePixController($againstid).'"width="50" height="50" class="rounded-circle" alt="Profile Picture">';
            }
            echo '<div class="chat-box-wrapper '.$this->positiondis.'">
                    <div>
                        <div class="avatar-icon-wrapper mr-1">
                            <div class="badge badge-bottom btn-shine badge-success badge-dot badge-dot-lg"></div>
                            <div class="avatar-icon avatar-icon-lg rounded">
                            '.$this->imager.'
                            </div>
                        </div>
                    </div>
                    <div>
                        <div class="chat-box '.$this->backgrounddis.' text-white">'.$row['responsemessage'].'</div>
                        <small class="opacity-6 float-right pr-4" ><i class="fa fa-calendar-alt mr-1"></i> '.$row['created_at'].'</small>
                    </div>
                </div>';
        }
    }

    //Check if username exit;
    public function isAgentExist(){
        $query = "SELECT * FROM agents WHERE agentemail=:agentemail";
        $stmt = $this->conn->prepare($query);
        $this->agentemail = htmlspecialchars(strip_tags($this->agentemail));
        $stmt->bindValue(':agentemail', $this->agentemail);
        $stmt->execute();
        if($stmt->rowCount() > 0){
            return true;
        }
    }

    //Create new agent
    public function create_agent(){

        $query = "INSERT INTO agents (agentid,agentfname,agentlname,agentphone,agentemail,agentaddress,agentstate,agentcountry,agentstatus,agentfile_name,agentpic_name)
        VALUES (:agentid,:agentfname,:agentlname,:agentphone,:agentemail,:agentaddress,:agentstate,:agentcountry,:agentstatus,:agentfile_name,:agentpic_name)";

        $stmt = $this->conn->prepare($query);

        $this->agentid = htmlspecialchars(strip_tags($this->agentid));
        $this->agentfname = htmlspecialchars(strip_tags($this->agentfname));
        $this->agentlname = htmlspecialchars(strip_tags($this->agentlname));
        $this->agentphone = htmlspecialchars(strip_tags($this->agentphone));
        $this->agentemail = htmlspecialchars(strip_tags($this->agentemail));
        $this->agentaddress = htmlspecialchars(strip_tags($this->agentaddress));
        $this->agentstate = htmlspecialchars(strip_tags($this->agentstate));
        $this->agentcountry = htmlspecialchars(strip_tags($this->agentcountry));
        $this->agentstatus = htmlspecialchars(strip_tags($this->agentstatus));
        $this->agentfile_name = htmlspecialchars(strip_tags($this->agentfile_name));
        $this->agentpic_name = htmlspecialchars(strip_tags($this->agentpic_name));

        $stmt->bindValue('agentid', $this->agentid);
        $stmt->bindValue('agentfname', $this->agentfname);
        $stmt->bindValue('agentlname', $this->agentlname);
        $stmt->bindValue('agentphone', $this->agentphone);
        $stmt->bindValue('agentemail', $this->agentemail);
        $stmt->bindValue('agentaddress', $this->agentaddress);
        $stmt->bindValue('agentstate', $this->agentstate);
        $stmt->bindValue('agentcountry', $this->agentcountry);
        $stmt->bindValue('agentstatus', $this->agentstatus);
        $stmt->bindValue('agentfile_name', $this->agentfile_name);
        $stmt->bindValue('agentpic_name', $this->agentpic_name);

        if($stmt->execute()){
            $this->agentid = $this->agentid;
            $this->title = "New Agent Created";
            $this->body = "A new agent has been created!";
            $this->generatedlink = "agent_details.php?sellerid=".$this->agentid;
            // $this->sendAgentEmail($this->agentemail);
            $this->notifications();
            return true;
        }
        printf("Error: %s.\n", $stmt->error);
        return false;
    }

    private function sendAgentEmail($email){
        $pdo = $this->conn;
        $stmt = $pdo->prepare('SELECT * FROM agents WHERE agentemail = ? limit 1');
        $stmt->execute([$email]);
        $code = $stmt->fetch();

        $subject = 'Confirm your registration';
        $message = 'You have register with Ojarh.com to become an agent. This is your Agent ID: ' . $code['agentid'] . '. You will get a notification when you have been accessed and verified.<br>thanks for joining Ojarh.com.';
        $headers = 'X-Mailer: PHP/' . phpversion();

        if (mail($email, $subject, $message, $headers)) {
            return true;
        } else {
            return false;
        }
    }

    //Get all active seller
    public function view_verified_agents(){
        // $sql = 'SELECT * FROM agents WHERE agentstatus="Inactive"';
        $sql = "SELECT count(*) FROM agents WHERE agentstatus = 'Activate'";
        $result = $this->conn->prepare($sql);
        $result->execute();
        if($result->fetchColumn() > 0){
            $sql = 'SELECT * FROM agents WHERE agentstatus="Activate"';
            foreach ($this->conn->query($sql) as $row) {
                if(count($row) < 1){
                    echo 'No agent registered yet!';
                    return;
                }
                if($row['agentstatus']=='Activate'){
                    $butt = '<span class="badge badge-success">Active</span>';
                }elseif($row['agentstatus']=='Pending'){
                    $butt = '<span class="badge badge-warning">Pending</span>';
                }elseif($row['agentstatus']=='Inactive'){
                    $butt = '<span class="badge badge-danger">Inactive</span>';
                }
                echo '<div class="collect col-md-3 mt-3">
                            <div class="collection-item">
                                <div style="height: 260px; width: 100%; background-image: url(agentprofilepic/'.$row['agentid'].'/'.$row['agentpic_name'].'); background-size: cover;"></div>
                                <img style="width: 70px !important; position: absolute; top: 0; right: 0; margin-right: 15px; opacity: 1;" src="assets/images/verified.png" class="img-icon"/>
                                <div class="collection-name">
                                    <h5 class="float-left pl-4">'.$row['agentlname']. ' ' .$row['agentfname'].'</h5>
                                    <button class="btn btn-danger btn-sm" onclick="agentDetails('.$row['agentid'].')">View Details</button>
                                </div>
                            </div>
                        </div>';
            }
        }else{
            echo 'No record found';
            return;
        }

    }

    /* single agent details */
    public function single_agent_details($agentid){
        try {
            $stmt = $this->conn->prepare("SELECT * FROM agents WHERE agentid=:agentid");
            $stmt->bindParam("agentid", $agentid, PDO::PARAM_INT);
            $stmt->execute();
            $data = $stmt->fetch(PDO::FETCH_OBJ); //User data
            return $data;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function imageCrop(){
        $image = imagecreatefromjpeg($_GET['src']);
        $filename = 'images/cropped_whatever.jpg';

        $thumb_width = 200;
        $thumb_height = 150;

        $width = imagesx($image);
        $height = imagesy($image);

        $original_aspect = $width / $height;
        $thumb_aspect = $thumb_width / $thumb_height;

        if ( $original_aspect >= $thumb_aspect )
        {
        // If image is wider than thumbnail (in aspect ratio sense)
        $new_height = $thumb_height;
        $new_width = $width / ($height / $thumb_height);
        }
        else
        {
        // If the thumbnail is wider than the image
        $new_width = $thumb_width;
        $new_height = $height / ($width / $thumb_width);
        }

        $thumb = imagecreatetruecolor( $thumb_width, $thumb_height );

        // Resize and crop
        imagecopyresampled($thumb,
                        $image,
                        0 - ($new_width - $thumb_width) / 2, // Center the image horizontally
                        0 - ($new_height - $thumb_height) / 2, // Center the image vertically
                        0, 0,
                        $new_width, $new_height,
                        $width, $height);
        imagejpeg($thumb, $filename, 80);
    }

    //Get all agents
    public function view_all_agents(){

        $sql = 'SELECT * FROM agents ORDER BY id';
        foreach ($this->conn->query($sql) as $row) {

            if($row['agentstatus']=='Activate'){
                $butt = '<span class="badge badge-success">Active</span>';
                $btt = '<button class="mb-2 mr-2 btn btn-shadow btn-danger btn-sm" onclick="deactivateAgent('.$row['agentid'].')"><i class="fa fa-times btn-icon-wrapper"></i></button>
                        <a href="agent_details.php?agentid='.$row['agentid'].'" class="mb-2 btn btn-shadow btn-info btn-sm"><i class="fa fa-address-card btn-icon-wrapper"></i></a>';
            }elseif($row['agentstatus']=='Pending'){
                $butt = '<span class="badge badge-warning">Pending</span>';
                $btt = '<button class="mb-2 mr-2 btn btn-shadow btn-outline-success btn-sm" onclick="activateAgent('.$row['agentid'].')" style="float: left;"><i class="fa fa-check btn-icon-wrapper"></i></button>
                        <button class="mb-2 mr-2 btn btn-shadow btn-danger btn-sm" onclick="deactivateAgent('.$row['agentid'].')"><i class="fa fa-times btn-icon-wrapper"></i></button>
                        <a href="agent_details.php?agentid='.$row['agentid'].'" class="mb-2 btn btn-shadow btn-info btn-sm"><i class="fa fa-address-card btn-icon-wrapper"></i></a>';
            }elseif($row['agentstatus']=='Inactive'){
                $butt = '<span class="badge badge-danger">Inactive</span>';
                $btt = '<button class="mb-2 mr-2 btn btn-shadow btn-success btn-sm" onclick="activateAgent('.$row['agentid'].')"><i class="fa fa-check btn-icon-wrapper"></i></button>
                        <a href="agent_details.php?agentid='.$row['agentid'].'" class="mb-2 btn btn-shadow btn-info btn-sm"><i class="fa fa-address-card btn-icon-wrapper"></i></a>';
            }
            echo '<tr>
                    <td>'.$row['agentid'].'</td>
                    <td>'.$row['agentlname'].' '.$row['agentfname'].'</td>
                    <td>'.$row['agentemail'].'</td>
                    <td>'.$row['agentphone'].'</td>
                    <td>'.ucfirst($row['agentaddress']).', '.ucfirst($row['agentstate']).', '.ucfirst($row['agentcountry']).'</td>
                    <td style="font-size: 13px;">'.$row['created_at'].'</td>
                    <td>'.$butt.'</td>
                    <td>'.$btt.'</td>
                </tr>';
        }
    }

    //Get all active agents
    public function view_all_active_agents(){

        $sql = 'SELECT * FROM agents WHERE agentstatus="Activate" ORDER BY id';
        foreach ($this->conn->query($sql) as $row) {
            echo '<tr>
                    <td>'.$row['agentid'].'</td>
                    <td>'.$row['agentlname'].' '.$row['agentfname'].'</td>
                    <td>'.$row['agentemail'].'</td>
                    <td>'.$row['agentphone'].'</td>
                    <td>'.ucfirst($row['agentaddress']).', '.ucfirst($row['agentstate']).', '.ucfirst($row['agentcountry']).'</td>
                    <td style="font-size: 13px;">'.$row['created_at'].'</td>
                    <td><span class="badge badge-success">Active</span></td>
                    <td><button class="mb-2 mr-2 btn btn-shadow btn-danger btn-sm" onclick="deactivateAgent('.$row['agentid'].')"><i class="fa fa-times btn-icon-wrapper"></i></button>
                    <a href="agent_details.php?agentid='.$row['agentid'].'" class="mb-2 btn btn-shadow btn-info btn-sm"><i class="fa fa-address-card btn-icon-wrapper"></i></a></td>
                </tr>';
        }
    }

    //Get all deactivated agents
    public function view_all_inactive_agents(){

        $sql = 'SELECT * FROM agents WHERE agentstatus="Deactivate" ORDER BY id';
        foreach ($this->conn->query($sql) as $row) {
            echo '<tr>
                    <td>'.$row['agentid'].'</td>
                    <td>'.$row['agentlname'].' '.$row['agentfname'].'</td>
                    <td>'.$row['agentemail'].'</td>
                    <td>'.$row['agentphone'].'</td>
                    <td>'.ucfirst($row['agentaddress']).', '.ucfirst($row['agentstate']).', '.ucfirst($row['agentcountry']).'</td>
                    <td style="font-size: 13px;">'.$row['created_at'].'</td>
                    <td><span class="badge badge-danger">Inactive</span></td>
                    <td><button class="mb-2 mr-2 btn btn-shadow btn-success btn-sm" onclick="activateAgent('.$row['agentid'].')"><i class="fa fa-check btn-icon-wrapper"></i></button>
                    <a href="agent_details.php?agentid='.$row['agentid'].'" class="mb-2 btn btn-shadow btn-info btn-sm"><i class="fa fa-address-card btn-icon-wrapper"></i></a></td>
                </tr>';
        }
    }

    //Get all pending agents
    public function view_all_pending_agents(){

        $sql = 'SELECT * FROM agents WHERE agentstatus="Pending" ORDER BY id';
        foreach ($this->conn->query($sql) as $row) {
            echo '<tr>
                    <td>'.$row['agentid'].'</td>
                    <td>'.$row['agentlname'].' '.$row['agentfname'].'</td>
                    <td>'.$row['agentemail'].'</td>
                    <td>'.$row['agentphone'].'</td>
                    <td>'.ucfirst($row['agentaddress']).', '.ucfirst($row['agentstate']).', '.ucfirst($row['agentcountry']).'</td>
                    <td style="font-size: 13px;">'.$row['created_at'].'</td>
                    <td><span class="badge badge-warning">Pending</span></td>
                    <td><button class="mb-2 mr-2 btn btn-shadow btn-outline-success btn-sm" onclick="activateAgent('.$row['agentid'].')" style="float: left;"><i class="fa fa-check btn-icon-wrapper"></i></button>
                    <button class="mb-2 mr-2 btn btn-shadow btn-danger btn-sm" onclick="deactivateAgent('.$row['agentid'].')"><i class="fa fa-times btn-icon-wrapper"></i></button>
                    <a href="agent_details.php?agentid='.$row['agentid'].'" class="mb-2 btn btn-shadow btn-info btn-sm"><i class="fa fa-address-card btn-icon-wrapper"></i></a></td>
                </tr>';
        }
    }

    public function activateAgent(){
        $query = "UPDATE agents SET agentstatus=:status WHERE agentid=:agentid";
        $stmt = $this->conn->prepare($query);
        $this->status = htmlspecialchars(strip_tags($this->status));
        $this->agentid = htmlspecialchars(strip_tags($this->agentid));
        $stmt->bindValue('status', $this->status);
        $stmt->bindValue('agentid', $this->agentid);
        if($stmt->execute()){
            $this->userid = $this->agentid;
            $this->title = 'Agent Activated' ;
            $this->body = 'Your account has been activated!';
            $this->generatedlink = "agent_details.php?agentid=".$this->agentid;
            // $this->agentActivationEmailSender($this->agentid);
            $this->notifications();
            return true;
        }
        printf("Error: %s.\n", $stmt->error);
        return false;
    }

    public function deactivateAgent(){
        $query = "UPDATE agents SET agentstatus=:status WHERE agentid=:agentid";
        $stmt = $this->conn->prepare($query);
        $this->status = htmlspecialchars(strip_tags($this->status));
        $this->agentid = htmlspecialchars(strip_tags($this->agentid));
        $stmt->bindValue('status', $this->status);
        $stmt->bindValue('agentid', $this->agentid);
        if($stmt->execute()){
            $this->userid = $this->agentid;
            $this->title = 'Agent Deactivated' ;
            $this->body = 'Your account has been deactivated!';
            $this->generatedlink = "agent_details.php?agentid=".$this->agentid;
            // $this->agentDeactivationEmailSender($this->agentid);
            $this->notifications();

            return true;
        }
        printf("Error: %s.\n", $stmt->error);
        return false;
    }

    private function agentActivationEmailSender($agentid){
        $pdo = $this->conn;
        $stmt = $pdo->prepare('SELECT * FROM agents WHERE agentid = ? limit 1');
        $stmt->execute([$agentid]);
        $code = $stmt->fetch();

        $this->email = $code['agentemail'];

        $subject = 'Confirm your registration';
        $message = 'You have register with Ojarh.com to become an agent. This is your Agent ID: ' . $code['agentid'] . '. You will get a notification when you have been accessed and verified.<br>thanks for joining Ojarh.com.';
        $headers = 'X-Mailer: PHP/' . phpversion();

        if (mail($this->email, $subject, $message, $headers)) {
            return true;
        } else {
            return false;
        }
    }

    private function agentDeactivationEmailSender($agentid){
        $pdo = $this->conn;
        $stmt = $pdo->prepare('SELECT * FROM agents WHERE agentid = ? limit 1');
        $stmt->execute([$agentid]);
        $code = $stmt->fetch();

        $this->email = $code['agentemail'];

        $subject = 'Confirm your registration';
        $message = 'You have register with Ojarh.com to become an agent. This is your Agent ID: ' . $code['agentid'] . '. You will get a notification when you have been accessed and verified.<br>thanks for joining Ojarh.com.';
        $headers = 'X-Mailer: PHP/' . phpversion();

        if (mail($this->email, $subject, $message, $headers)) {
            return true;
        } else {
            return false;
        }
    }

    //Check if verification exit;
    public function isVerifyExist(){
        $query = "SELECT * FROM verification WHERE userid=:userid";
        $stmt = $this->conn->prepare($query);
        $this->userid = htmlspecialchars(strip_tags($this->userid));
        $stmt->bindValue(':userid', $this->userid);
        $stmt->execute();
        if($stmt->rowCount() > 0){
            return true;
        }
    }

    public function submit_verify(){

        $this->t_product = 0;

        $query = "INSERT INTO verification (verifyid,userid,documenttype,verifyfile,verifystatus)
            VALUES (:verifyid,:userid,:documenttype,:verifyfile,:verifystatus)";

        $stmt = $this->conn->prepare($query);

        $this->verifyid = htmlspecialchars(strip_tags($this->verifyid));
        $this->userid = htmlspecialchars(strip_tags($this->userid));
        $this->documenttype = htmlspecialchars(strip_tags($this->verificationtype));
        $this->verifyfile = htmlspecialchars(strip_tags($this->file_name));
        $this->verifystatus = htmlspecialchars(strip_tags($this->verifystatus));

        $stmt->bindValue('verifyid', $this->verifyid);
        $stmt->bindValue('userid', $this->userid);
        $stmt->bindValue('documenttype', $this->documenttype);
        $stmt->bindValue('verifyfile', $this->verifyfile);
        $stmt->bindValue('verifystatus', $this->verifystatus);

        if($stmt->execute()){
            $this->userid = $this->userid;
            $this->title = 'Seller Verification' ;
            $this->body = 'A seller just submitted a ticket for verification!';
            $this->generatedlink = "seller_details.php?sellerid=".$this->userid;
            $this->notifications();
            return true;
        }else{
            printf("Error: %s.\n", $stmt->error);
            return false;
        }
    }

    //Get all agents
    public function view_all_verification(){

        $sql = 'SELECT * FROM verification ORDER BY id';
        foreach ($this->conn->query($sql) as $row) {

            $userInfo = $this->userDetails($row['userid']);

            if($row['verifystatus']=='Activate'){
                $butt = '<span class="badge badge-success">Verified</span>';
                $btt = '<button class="mb-2 mr-2 btn btn-shadow btn-danger btn-sm" onclick="deactivateVerify('.$row['verifyid'].', '.$row['userid'].')"><i class="fa fa-times btn-icon-wrapper"></i></button>
                        <a href="seller_details.php?userid='.$row['userid'].'" class="mb-2 btn btn-shadow btn-info btn-sm"><i class="fa fa-address-card btn-icon-wrapper"></i></a>';
            }elseif($row['verifystatus']=='Pending'){
                $butt = '<span class="badge badge-warning">Pending</span>';
                $btt = '<button class="mb-2 mr-2 btn btn-shadow btn-outline-success btn-sm" onclick="activateVerify('.$row['verifyid'].', '.$row['userid'].')" style="float: left;"><i class="fa fa-check btn-icon-wrapper"></i></button>
                        <button class="mb-2 mr-2 btn btn-shadow btn-danger btn-sm" onclick="deactivateVerify('.$row['verifyid'].', '.$row['userid'].')"><i class="fa fa-times btn-icon-wrapper"></i></button>
                        <a href="seller_details.php?userid='.$row['userid'].'" class="mb-2 btn btn-shadow btn-info btn-sm"><i class="fa fa-address-card btn-icon-wrapper"></i></a>';
            }elseif($row['verifystatus']=='Deactivate'){
                $butt = '<span class="badge badge-danger">Not Verified</span>';
                $btt = '<button class="mb-2 mr-2 btn btn-shadow btn-success btn-sm" onclick="activateVerify('.$row['verifyid'].', '.$row['userid'].')"><i class="fa fa-check btn-icon-wrapper"></i></button>
                        <a href="seller_details.php?userid='.$row['userid'].'" class="mb-2 btn btn-shadow btn-info btn-sm"><i class="fa fa-address-card btn-icon-wrapper"></i></a>';
            }
            echo '<tr>
                    <td>'.$row['verifyid'].'</td>
                    <td>'.$userInfo->lname.' '.$userInfo->fname.'</td>
                    <td>'.$userInfo->email.'</td>
                    <td>'.$userInfo->phone.'</td>
                    <td>'.ucfirst($row['documenttype']).'</td>
                    <td style="font-size: 13px;">'.$row['created_at'].'</td>
                    <td>'.$butt.'</td>
                    <td>'.$btt.'</td>
                </tr>';
        }
    }

    //Get all agents
    public function view_active_verification(){

       $sql = 'SELECT * FROM verification WHERE verifystatus="Activate" ORDER BY id';
       foreach ($this->conn->query($sql) as $row) {
           $userInfo = $this->userDetails($row['userid']);
           echo '<tr>
                   <td>'.$row['verifyid'].'</td>
                   <td>'.$userInfo->lname.' '.$userInfo->fname.'</td>
                   <td>'.$userInfo->email.'</td>
                   <td>'.$userInfo->phone.'</td>
                   <td>'.ucfirst($row['documenttype']).'</td>
                   <td style="font-size: 13px;">'.$row['created_at'].'</td>
                   <td><span class="badge badge-success">Verified</span></td>
                   <td><button class="mb-2 mr-2 btn btn-shadow btn-danger btn-sm" onclick="deactivateVerify('.$row['verifyid'].', '.$row['userid'].')"><i class="fa fa-times btn-icon-wrapper"></i></button>
                   <a href="seller_details.php?userid='.$row['userid'].'" class="mb-2 btn btn-shadow btn-info btn-sm"><i class="fa fa-address-card btn-icon-wrapper"></i></a></td>
               </tr>';
       }
   }

    //Get all agents
    public function view_pending_verification(){

       $sql = 'SELECT * FROM verification WHERE verifystatus="Pending" ORDER BY id';
       foreach ($this->conn->query($sql) as $row) {
           $userInfo = $this->userDetails($row['userid']);
           echo '<tr>
                   <td>'.$row['verifyid'].'</td>
                   <td>'.$userInfo->lname.' '.$userInfo->fname.'</td>
                   <td>'.$userInfo->email.'</td>
                   <td>'.$userInfo->phone.'</td>
                   <td>'.ucfirst($row['documenttype']).'</td>
                   <td style="font-size: 13px;">'.$row['created_at'].'</td>
                   <td><span class="badge badge-warning">Pending</span></td>
                   <td><button class="mb-2 mr-2 btn btn-shadow btn-outline-success btn-sm" onclick="activateVerify('.$row['verifyid'].', '.$row['userid'].')" style="float: left;"><i class="fa fa-check btn-icon-wrapper"></i></button>
                   <button class="mb-2 mr-2 btn btn-shadow btn-danger btn-sm" onclick="deactivateVerify('.$row['verifyid'].', '.$row['userid'].')"><i class="fa fa-times btn-icon-wrapper"></i></button>
                   <a href="seller_details.php?userid='.$row['userid'].'" class="mb-2 btn btn-shadow btn-info btn-sm"><i class="fa fa-address-card btn-icon-wrapper"></i></a></td>
               </tr>';
       }
   }

    //Get all agents
    public function view_cancelled_verification(){
        $sql = 'SELECT * FROM verification WHERE verifystatus="Deactivate" ORDER BY id';
        foreach ($this->conn->query($sql) as $row) {
            $userInfo = $this->userDetails($row['userid']);
            echo '<tr>
                    <td>'.$row['verifyid'].'</td>
                    <td>'.$userInfo->lname.' '.$userInfo->fname.'</td>
                    <td>'.$userInfo->email.'</td>
                    <td>'.$userInfo->phone.'</td>
                    <td>'.ucfirst($row['documenttype']).'</td>
                    <td style="font-size: 13px;">'.$row['created_at'].'</td>
                    <td><span class="badge badge-danger">Not Verified</span></td>
                    <td><button class="mb-2 mr-2 btn btn-shadow btn-success btn-sm" onclick="activateVerify('.$row['verifyid'].', '.$row['userid'].')"><i class="fa fa-check btn-icon-wrapper"></i></button>
                    <a href="seller_details.php?userid='.$row['userid'].'" class="mb-2 btn btn-shadow btn-info btn-sm"><i class="fa fa-address-card btn-icon-wrapper"></i></a></td>
                </tr>';
        }
    }

    public function activateVerify(){
        $query = "UPDATE verification SET verifystatus=:status WHERE verifyid=:verifyid";
        $stmt = $this->conn->prepare($query);
        $this->status = htmlspecialchars(strip_tags($this->status));
        $this->verifyid = htmlspecialchars(strip_tags($this->verifyid));
        $this->userid = htmlspecialchars(strip_tags($this->userid));
        $stmt->bindValue('status', $this->status);
        $stmt->bindValue('verifyid', $this->verifyid);
        if($stmt->execute()){
            $this->userid = $this->userid;
            $this->title = 'Seller Verification' ;
            $this->body = 'Your account has been verified!';
            $this->generatedlink = "seller_details.php?sellerid=".$this->userid;
            // $this->agentActivationEmailSender($this->agentid);
            $this->notifications();
            return true;
        }
        printf("Error: %s.\n", $stmt->error);
        return false;
    }

    public function deactivateVerify(){
        $query = "UPDATE verification SET verifystatus=:status WHERE verifyid=:verifyid";
        $stmt = $this->conn->prepare($query);
        $this->status = htmlspecialchars(strip_tags($this->status));
        $this->verifyid = htmlspecialchars(strip_tags($this->verifyid));
        $this->userid = htmlspecialchars(strip_tags($this->userid));
        $stmt->bindValue('status', $this->status);
        $stmt->bindValue('verifyid', $this->verifyid);
        if($stmt->execute()){
            $this->userid = $this->userid;
            $this->title = 'Seller Verification' ;
            $this->body = 'We counld not verify your details, please re-submit the application!';
            $this->generatedlink = "seller_details.php?sellerid=".$this->userid;
            // $this->agentDeactivationEmailSender($this->agentid);
            $this->notifications();

            return true;
        }
        printf("Error: %s.\n", $stmt->error);
        return false;
    }

    //Get category into dropdown list
    public function main_category_dropdown(){
        $sql = "SELECT * FROM category ORDER BY id";
        $query = $this->conn->prepare($sql);
        $query->execute();
        while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
          echo '<li class="vertical-item level1 toggle-menu vertical_drop css_parent" style="padding-top: 7px !important; padding-bottom: 7px !important; border-bottom: 1px solid #cfcfcf;">
                  <a class="menu-link" href="/collections/pet-supplies">
                      <span class="icon_items"><i class="fa fa-sun-o"></i></span>
                      <span class="menu-title" style="font-size: 14px;"><strong>'.$row['catname'].'</strong></span>
                      <span class="caret"><i class="fa fa-angle-down" aria-hidden="true"></i></span>
                  </a>
                  <ul class="vertical-drop drop-css drop-lv1 sub-menu" style="width:220px; ">
                    <li class="vertical-item sub-dropdown toggle-menu">
                        <a class="menu-link" href="/collections/frontpage" title="">Clothing<span class="caret"><i class="fa fa-angle-down" aria-hidden="true"></i></span></a>
                        <ul class="vertical-drop drop-lv2 dropdown-content sub-menu">
                            <li class="vertical-item level2 "><a href="/collections/electronics-computer" title="">Electronics& Computer</a></li>
                            <li class="vertical-item level2 "><a href="/collections/fashion" title="">Fashion</a></li>
                        </ul>
                    </li>
                  </ul>
              </li>';
        }
    }

    public function sub_main_state(){
        $sql = 'SELECT * FROM category ORDER BY id';
        foreach ($this->conn->query($sql) as $menu){
            echo '<li class="vertical-item level1 toggle-menu vertical_drop css_parent" style="padding-top: 7px !important; padding-bottom: 7px !important; border-bottom: 1px solid #cfcfcf;">';
            echo '<a class="menu-link" href="/collections/pet-supplies">';
            echo '<span class="icon_items"><i class="fa fa-sun-o"></i></span>';
            echo '<span class="menu-title" style="font-size: 14px;">'.$menu['catname'].'</span>';
            echo '<span class="caret"><i class="fa fa-angle-down" aria-hidden="true"></i></span>';
            echo '</a>';
            echo '<ul class="vertical-drop drop-css drop-lv1 sub-menu" style="width:220px; ">';
            $sql2 = 'SELECT DISTINCT(marketstate), categoryid  FROM marketproductid WHERE categoryid='.$menu['catid'];
            foreach($this->conn->query($sql2) as $submenu){
                echo '<li class="vertical-item sub-dropdown toggle-menu">';
                echo '<a class="menu-link" href="/collections/frontpage" title="">'.$submenu['marketstate'].'<span class="caret"><i class="fa fa-angle-down" aria-hidden="true"></i></span></a>';
                echo '<ul class="vertical-drop drop-lv2 dropdown-content sub-menu">';
                    $sql3 = 'SELECT DISTINCT(marketname) FROM market WHERE marketid IN ( SELECT marketid FROM marketproductid WHERE categoryid = "'. $submenu['categoryid'] .'" AND marketstate = "'. $submenu['marketstate'] .'"   )';
                    foreach($this->conn->query($sql3) as $submenu2){
                        echo '<li class="vertical-item level2 "><a href="/collections/electronics-computer" title="">'.$submenu2['marketname'].'</a></li>';
                    }
                echo '</ul>';
                echo '</li>';
            }
            echo '</ul>';
            echo '</li>';
        }
    }

    /* User Details */
    // public function marketdetails($userid){
    //     try {
    //         $stmt = $this->conn->prepare("SELECT * FROM users WHERE userid=:userid");
    //         $stmt->bindParam("userid", $userid, PDO::PARAM_INT);
    //         $stmt->execute();
    //         $data = $stmt->fetch(PDO::FETCH_OBJ); //User data
    //         return $data;
    //     } catch (PDOException $e) {
    //         echo $e->getMessage();
    //     }
    // }


    //Update dispute status
    public function updateProductSettings(){

        $query = "UPDATE product_details SET topCatSetting=:topCatSetting WHERE productid=:productid";

        $stmt = $this->conn->prepare($query);

        $this->productid = htmlspecialchars(strip_tags($this->productid));
        $this->productsetting = htmlspecialchars(strip_tags($this->productsetting));

        $stmt->bindValue('topCatSetting', $this->productsetting);
        $stmt->bindValue('productid', $this->productid);

        if($stmt->execute()){
            return true;
        }
        printf("Error: %s.\n", $stmt->error);
        return false;
    }

    //Get all active seller
    public function top_sellers_home_list(){
        $sql = "SELECT count(*) FROM business";
        $result = $this->conn->prepare($sql);
        $result->execute();
        if($result->fetchColumn() > 0){
            $sql = 'SELECT * FROM business';
            foreach ($this->conn->query($sql) as $row) {
                if($this->isUserVerified($row['userid'])){
                    $vrf = '<img style="width: 70px !important; position: absolute; top: 0; right: 0; opacity: 1;" src="assets/images/verified.png" class="img-icon"/>';
                }else{
                    $vrf = '';
                }
                $storeimgs = json_decode($row['storeimage']);
                echo '<div class="collect ">
                        <a href="#" class="collection-item">
                            <img class="collection-img img-responsive lazyload" data-sizes="auto" src="assets/images/seller1.jpg" alt="RT AaShop demo" data-src="assets/images/seller1.jpg"/>
                            '.$vrf.'
                            <div class="collection-name">
                                <h5 class="float-left pl-4">'.$row['bizname'].'</h5>
                                <a href="seller_details.php?sellerid='.$row['userid'].'"><button class="btn btn-success btn-sm">Visit Store</button></a>
                            </div>
                        </a>
                    </div>';
            }
        }else{
            echo 'No record found';
            return;
        }

    }

    //Check if verification exit;
    public function isUserVerified($userid){
        $query = "SELECT * FROM verification WHERE userid=:userid AND verifystatus=:verifystatus";
        $stmt = $this->conn->prepare($query);
        $this->userid = $userid;
        $this->verifystatus = 'Activate';
        $stmt->bindValue(':userid', $this->userid);
        $stmt->bindValue(':verifystatus', $this->verifystatus);
        $stmt->execute();
        if($stmt->rowCount() > 0){
            return true;
        }
    }

    //Get all Category details
    public function top_category_home_list(){
        $sql = "SELECT count(*) FROM category";
        $result = $this->conn->prepare($sql);
        $result->execute();
        if($result->fetchColumn() > 0){
            $sql = 'SELECT * FROM category ORDER BY RAND()';
            foreach ($this->conn->query($sql) as $row) {
                $this->counter = $this->product_count($row['catname']);
                echo '<div class="col-md-4">
                        <div class="item">
                            <div class="product-item" data-id="product-1873555030051">
                                <div class="product-item-container grid-view-item" style="height: 250px !important;">
                                    <div class="left-block">
                                        <div class="product-image-container product-image">
                                            <a class="grid-view-item__link image-ajax" href="category_details.php?catid='.$row['catid'].'">
                                                <img class="img-responsive s-img lazyload" data-sizes="auto" src="assets/images/product-loading.svg?466" data-src="seller/catImage/'.$row['catid'].'/'.$row['catImage'].'" alt=""/>
                                            </a>
                                        </div>
                                        <div class="box-labels">
                                            <span class="label-product label-sale">
                                                <span class="d-none" style="color: white !important;">Sale</span>'.$this->counter.'
                                            </span>
                                        </div>
                                        <div class="button-link pt-5">
                                            <div class="quickview-button">
                                                <a class="quickview iframe-link d-none d-xl-block btn_df" href="category_details.php?catid='.$row['catid'].'" title="Quick View"><i class="fa fa-eye"></i><span class="hidden">Quick View</span></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="right-block">
                                        <div class="caption">
                                            <h4 class="title-product text-center"><a class="product-name" href="category_details.php?catid='.$row['catid'].'" style="color: white !important; font-size: 18px !important;">'.$row['catname'].'</a></h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>';
            }
        }else{
            echo 'No record found';
            return;
        }

    }

    public function product_count($catname){
        $sql = "SELECT count(*) FROM `product_details` WHERE product_category=:product_category";
        $stmt = $this->conn->prepare($sql);

        $stmt->bindValue('product_category', $catname);
        if($stmt->execute()){
            $number_of_rows = $stmt->fetchColumn();
            return $number_of_rows;
        }
    }

    //Get all Category details
    public function top_selection_home_list(){
        $sql = "SELECT count(*) FROM product_details WHERE status='Active' AND topCatSetting=1";
        $result = $this->conn->prepare($sql);
        $result->execute();
        if($result->fetchColumn() > 0){
            $sql = 'SELECT * FROM product_details WHERE status="Active" AND topCatSetting=1 ORDER BY RAND()';
            foreach ($this->conn->query($sql) as $row) {
                $this->splitter = explode('+', $row['pack0']);
                $this->qnt = $this->splitter[0];
                $this->price = $this->splitter[1];
                $this->discount = $this->splitter[2];
                echo '<div class="col-md-4">
                        <div class="item">
                            <div class="product-item"
                                data-id="product-1873555030051">
                                <div class="product-item-container grid-view-item">
                                    <div class="left-block">
                                        <div class="product-image-container product-image">
                                            <a class="grid-view-item__link image-ajax" href="/collections/fashion/products/headphone">
                                                <img class="img-responsive s-img lazyload" data-sizes="auto" src="assets/images/product-loading.svg?466" data-src="seller/productimg/'.$row['productid'].'/'.$row['img0'].'" alt="headphone"/>
                                            </a>
                                        </div>
                                        <div class="box-labels">
                                            <span class="label-product label-sale"><span class="d-none">Discount</span>'.$this->discount.'%</span>
                                        </div>
                                        <div class="button-link">
                                            <div class="add-to-wishlist">
                                                <div class="default-wishbutton-headphone loading">
                                                    <a class="add-in-wishlist-js" style="cursor: pointer;" onclick="addFav('.$row['productid'].')"><i class="fa fa-heart-o"></i><span class="tooltip-label">Add to Favourite</span></a>
                                                </div>
                                                <div class="loadding-wishbutton-headphone loading" style="display: none; pointer-events: none">
                                                    <a class="add_to_wishlist" href="headphone"><i class="fa fa-circle-o-notch fa-spin"></i></a>
                                                </div>
                                                <div class="added-wishbutton-headphone loading" style="display: none;">
                                                    <a class="added-wishlist  add_to_wishlist" style="cursor: pointer;" onclick="addFav('.$row['productid'].')"><i class="fa fa-heart"></i><spanclass="tooltip-label">Add to Favourite</span></a>
                                                </div>
                                            </div>
                                            <div class="btn-button add-to-cart action  ">
                                                <input type="hidden" name="id" value="15567029436451"/>
                                                <a class="btn-addToCart grl btn_df" style="cursor: pointer;" onclick="add2cart('.$row['productid'].')" title="Add to cart"><i class="fa fa-shopping-basket"></i><span class="">Add to cart</span></a>
                                            </div>
                                            <div class="">
                                                <a class="quickview iframe-link d-none d-xl-block btn_df" href="product_details.php?productid='.$row['productid'].'" title="View Product Details"><i class="fa fa-search"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="right-block">
                                        <div class="caption">
                                            <h4 class="title-product"><a class="product-name" href="product_details.php?productid='.$row['productid'].'">'.$row['product_title'].'</a>
                                            </h4>
                                            <div class="price">
                                                <!-- snippet/product-price.liquid -->
                                                <span class="visually">As low as: </span>
                                                <span class="price-new"><span class=money>N'.number_format($this->price, 2).'<small>/per '.$this->qnt.'</small> </span></span>
                                            </div>
                                            <div class="custom-reviews hidden-xs">
                                                <span class="shopify-product-reviews-badge" data-id="1873555030051"></span>
                                            </div>

                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>';
            }
        }else{
            echo 'No record found';
            return;
        }

    }

    //Get all agents
    public function view_all_transactions(){

        $sql = 'SELECT * FROM agents ORDER BY id';
        foreach ($this->conn->query($sql) as $row) {

            if($row['agentstatus']=='Activate'){
                $butt = '<span class="badge badge-success">Active</span>';
                $btt = '<button class="mb-2 mr-2 btn btn-shadow btn-danger btn-sm" onclick="deactivateAgent('.$row['agentid'].')"><i class="fa fa-times btn-icon-wrapper"></i></button>
                        <a href="agent_details.php?agentid='.$row['agentid'].'" class="mb-2 btn btn-shadow btn-info btn-sm"><i class="fa fa-address-card btn-icon-wrapper"></i></a>';
            }elseif($row['agentstatus']=='Pending'){
                $butt = '<span class="badge badge-warning">Pending</span>';
                $btt = '<button class="mb-2 mr-2 btn btn-shadow btn-outline-success btn-sm" onclick="activateAgent('.$row['agentid'].')" style="float: left;"><i class="fa fa-check btn-icon-wrapper"></i></button>
                        <button class="mb-2 mr-2 btn btn-shadow btn-danger btn-sm" onclick="deactivateAgent('.$row['agentid'].')"><i class="fa fa-times btn-icon-wrapper"></i></button>
                        <a href="agent_details.php?agentid='.$row['agentid'].'" class="mb-2 btn btn-shadow btn-info btn-sm"><i class="fa fa-address-card btn-icon-wrapper"></i></a>';
            }elseif($row['agentstatus']=='Inactive'){
                $butt = '<span class="badge badge-danger">Inactive</span>';
                $btt = '<button class="mb-2 mr-2 btn btn-shadow btn-success btn-sm" onclick="activateAgent('.$row['agentid'].')"><i class="fa fa-check btn-icon-wrapper"></i></button>
                        <a href="agent_details.php?agentid='.$row['agentid'].'" class="mb-2 btn btn-shadow btn-info btn-sm"><i class="fa fa-address-card btn-icon-wrapper"></i></a>';
            }
            echo '<tr>
                    <td>'.$row['agentid'].'</td>
                    <td>'.$row['agentlname'].' '.$row['agentfname'].'</td>
                    <td>'.$row['agentemail'].'</td>
                    <td>'.$row['agentphone'].'</td>
                    <td>'.ucfirst($row['agentaddress']).', '.ucfirst($row['agentstate']).', '.ucfirst($row['agentcountry']).'</td>
                    <td style="font-size: 13px;">'.$row['created_at'].'</td>
                    <td>'.$butt.'</td>
                    <td>'.$btt.'</td>
                </tr>';
        }
    }

    //////////////////////////////
    //get product details by id //
    //////////////////////////////
    public function get_product_details($productID){

        $stm = $this->conn->prepare("SELECT * FROM product_details WHERE productid=:productid");
        $stm->bindValue("productid", $productID);
        $stm->execute();
        if($stm->rowCount() > 0){
            $product_details = $stm->fetch(PDO::FETCH_OBJ);
            return $product_details;
        }else{
            return null;
        }

    }

    //////////////////////////////
    //get category details by id //
    //////////////////////////////
    public function get_category_id($catname){
        $stm = $this->conn->prepare("SELECT * FROM category WHERE catname=:catname");
        $stm->bindValue("catname", $catname);
        $stm->execute();
        if($stm->rowCount() > 0){
            $category_details = $stm->fetch(PDO::FETCH_OBJ);
            return $category_details;

        }else{
            return null;
        }

    }

    //////////////////////////
    // add product to cart  //
    //////////////////////////
    public function add_to_cart ($productID) {

        if (isset($_SESSION['cart'])) { //first check if cart session is available

            if(!isset($_SESSION['cart'][$productID])) { //if the product id is not in cart
                $_SESSION['cart'][$productID] = 1; //then assin the product id

                return true; //item was successfully added to cart

            } else {
                return false; //this item is already in cart, can not add again
            }

        } else { //if cart session does not exist then create it and also add the product id to it
            $_SESSION['cart'][$productID] = 1;

            return true; //item was successfully added to cart
        }

    }

    //////////////////////////
    // remove product from cart  //
    //////////////////////////
    public function remove_from_cart ($productID) {

        // first check if cart session in available
        if(isset($_SESSION['cart'])) {

            // if cart session is set then chack if the product id in in cart
            if(isset($_SESSION['cart'][$productID])) {

                //if the product id is in cart then remove it from cart
                unset($_SESSION['cart'][$productID]); //then assin the product id

                return true; //item successfuly removed from cart
            } else {
                return false; //product is not in cart
            }
        } else {
            return false; //product not in cart
        }

    }

    public function get_product_pack($productID){
    }

    //Get category list for home listing
    public function get_all_category_list(){
        $sql = 'SELECT * FROM category ORDER BY id';
        foreach ($this->conn->query($sql) as $row) {
            $cnt = $this->category_count($row['catname']);
            $catID = $this->get_category_id($row['catname']);
            echo '<li><a href="category_list.php?categoryid='.$this->get_category_id($row['catname'])->catid.'">'.$row['catname'].'<span class="count">( '.$cnt.' )</span></a></li>';
        }
    }

    public function category_count($catname){
        $sql = "SELECT count(*) FROM `product_details` WHERE product_category=:product_category";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindValue('product_category', $catname);
        if($stmt->execute()){
            $number_of_rows = $stmt->fetchColumn();
            return $number_of_rows;
            // return;
        }
    }

    public function subscription(){

        if($this->isEmailExit()){
            echo 'You already subscribe to this list!';
            return false;
        }

        $query = "INSERT INTO subscription (email) VALUES (:email)";
        $stmt = $this->conn->prepare($query);

        $this->email = htmlspecialchars(strip_tags($this->email));

        $stmt->bindValue('email', $this->email);

        if($stmt->execute()){
            return true;
        }
        printf("Error: %s.\n", $stmt->error);
        return false;
    }

    public function ad_subscriptions(){
        return [
            array('id' => 1, 'title' => '1 Week', 'price' => '1500', 'days' => 7),
            array('id' => 2, 'title' => '2 Weeks', 'price' => '2000', 'days' => 14),
            array('id' => 3, 'title' => '1 Month', 'price' => '3500', 'days' => 30),
            array('id' => 4, 'title' => '3 Months', 'price' => '6000', 'days' => 90),
            array('id' => 5, 'title' => '6 Months', 'price' => '12000', 'days' => 180),
        ];
    }

    public function get_ads(){
        $sth = $this->conn->prepare('SELECT * FROM ad');
        $sth->execute();
        return $sth->fetchAll();
    }

    public function get_user_ads($user){
        $sth = $this->conn->prepare('SELECT * FROM ad WHERE userid = :userid');
        $sth->execute(array(':userid' => $user));
        return $sth->fetchAll();
    }

    public function create_ad($link, $img, $end_date){
        $sth = $this->conn->prepare('INSERT INTO ad (userid, link, img, end_date) VALUES (:userid, :link, :img, :end_date)');
        if($sth->execute(
            array(
                ':userid' => $_SESSION['userid'],
                ':link' => $link,
                ':img' => $img,
                ':end_date' => date('Y-m-d', strtotime(date('Y-m-d'). ' +'.$end_date.' days'))
            )
        )){
            return true;
        }
        return false;
    }

    public function subscribe_ad() {


        if($this->durate == 1){
            $this->startDate =  date('Y-m-d');
            $this->endDate = date('Y-m-d', strtotime($this->startDate. ' +30 days')); // Y-m-d
        }elseif($this->durate == 6){
            $this->startDate =  date('Y-m-d');
            $this->endDate = date('Y-m-d', strtotime($this->startDate. ' +180 days')); // Y-m-d
        }elseif($this->durate == 12){
            $this->startDate =  date('Y-m-d');
            $this->endDate = date('Y-m-d', strtotime($this->startDate. ' +365 days')); // Y-m-d
        }
    }

}