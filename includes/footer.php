<?php
if(isset($_POST['emailsubscibe']))
{
$subscriberemail=$_POST['subscriberemail'];
$sql ="SELECT SubscriberEmail FROM tblsubscribers WHERE SubscriberEmail=:subscriberemail";
$query= $dbh -> prepare($sql);
$query-> bindParam(':subscriberemail', $subscriberemail, PDO::PARAM_STR);
$query-> execute();
$results = $query -> fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query -> rowCount() > 0)
{
echo "<script>alert('Already Subscribed.');</script>";
}
else{
$sql="INSERT INTO  tblsubscribers(SubscriberEmail) VALUES(:subscriberemail)";
$query = $dbh->prepare($sql);
$query->bindParam(':subscriberemail',$subscriberemail,PDO::PARAM_STR);
$query->execute();
$lastInsertId = $dbh->lastInsertId();
if($lastInsertId)
{
echo "<script>alert('Subscribed successfully.');</script>";
}
else
{
echo "<script>alert('Something went wrong. Please try again');</script>";
}
}
}
?>

<footer>
  <div class="footer-top">
    <div class="container">
      <div class="row">

        <div class="col-md-6">
          <h6>About Us</h6>
          <ul>


          <li><a href="page.php?type=aboutus">Carental</a></li>
            <li><a href="page.php?type=faqs">FAQs</a></li>
            <li><a href="page.php?type=privacy">Privacy</a></li>
          <li><a href="page.php?type=terms">Terms of use</a></li>
               <li><a href="admin/">Admin Login</a></li>
          </ul>
        </div>

        <div class="col-md-3 col-sm-6">
          <h6>NHẬN THÔNG BÁO</h6>
          <div class="newsletter-form">
            <form method="post">
              <div class="form-group">
                <input type="email" name="subscriberemail" class="form-control newsletter-input" required placeholder="Địa chỉ email" />
              </div>
              <button type="submit" name="emailsubscibe" class="btn btn-block">Nhận thông báo <span class="angle_arrow"><i class="fa fa-angle-right" aria-hidden="true"></i></span></button>
            </form>
            <p class="subscribed-text">*Chúng tôi sẽ gửi thông báo cho bạn về những ưu đãi tốt hằng tuần.</p>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="footer-bottom">
    <div class="container">
      <div class="row">
        <div class="col-md-6 col-md-push-6 text-right">
          <div class="footer_widget">
            <p>Kết nối với chúng tôi:</p>
            <ul>
              <li><a href="https://www.facebook.com/comtamsuonbichaopla70/"><i class="fa fa-facebook-square" aria-hidden="true"></i></a></li>
              <li><a href="https://www.instagram.com/moih._.ahh/"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
</footer>
