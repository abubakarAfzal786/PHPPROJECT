<?php
include("MiddleWare/planMiddleware.php");

$plan=new planMiddleware();

?>

<!DOCTYPE html>
<html>
<head>
  <title>Pricing</title>
  <link rel="stylesheet" type="text/css" href="assets/css/pricing.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">

<!-- jQuery library -->

<!-- Popper JS -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<!-- Latest compiled JavaScript -->
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
<link rel="stylesheet" type="text/css" href="assets/css/util.css">
  <link rel="stylesheet" type="text/css" href="assets/css/main.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<link href="https://fonts.googleapis.com/css?family=Kaushan+Script" rel="stylesheet">
      <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
</head>
<body>
<section class="pricing py-5">
  <div class="container">
    <div class="row" id="pricing">
      <!-- Free Tier -->
     
      <!-- Plus Tier -->
 
      <!-- Pro Tier -->
  <!--       <div class="col-lg-4">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title text-muted text-uppercase text-center">Pro</h5>
              <h6 class="card-price text-center">$49<span class="period">/month</span></h6>
              <hr>
              <ul class="fa-ul">
                <li><span class="fa-li"><i class="fas fa-check"></i></span><strong>Unlimited Users</strong></li>
                <li><span class="fa-li"><i class="fas fa-check"></i></span>150GB Storage</li>
                <li><span class="fa-li"><i class="fas fa-check"></i></span>Unlimited Public Projects</li>
                <li><span class="fa-li"><i class="fas fa-check"></i></span>Community Access</li>
                <li><span class="fa-li"><i class="fas fa-check"></i></span>Unlimited Private Projects</li>
                <li><span class="fa-li"><i class="fas fa-check"></i></span>Dedicated Phone Support</li>
                <li><span class="fa-li"><i class="fas fa-check"></i></span><strong>Unlimited</strong> Free Subdomains</li>
                <li><span class="fa-li"><i class="fas fa-check"></i></span>Monthly Status Reports</li>
              </ul>
              <a href="#" class="btn btn-block btn-primary text-uppercase">Buy</a>
            </div>
          </div>
        </div> -->
    </div>
        
  </div>
</section>
<script>
  $(document).ready(function(){

            $plan_table=document.getElementById('pricing');
           $plan="";
          
   $.ajax({
 url:"/Email System/Ajax Requests/all_plans.php",
                method:"GET",
     dataType: "json",
   }).done(function(data){
    console.log(data);
    for(var single_table of data)
{
  

    $plan+=` <div class="col-lg-4" style="margin-top:30px;">
        <div class="card mb-5 mb-lg-0">
          <div class="card-body">
            <h5 class="card-title text-muted text-uppercase text-center">`+single_table[2]+`</h5>
            <h6 class="card-price text-center">$`+single_table[4]+`<span class="period">/month</span></h6>
            <hr>
            <ul class="fa-ul">
              <li><span class="fa-li"><i class="fa fa-check"></i></span>`+single_table[1]+`</li>
              <li><span class="fa-li"><i class="fa fa-check"></i></span>`+single_table[3]+` Emails</li>

              
            </ul>
            <a href="#" onclick="BuyPlan(`+single_table[0]+`)" class="btn btn-block btn-primary text-uppercase">Buy</a>
          </div>
        </div>
      </div>`;
}
$plan_table.innerHTML=$plan;

   });
  })
  function BuyPlan(id)
  {
    $.ajax({
      url:"/Email System/Ajax Requests/BuyPlan.php",
      method:"POST",
      dataType:"json",
      data:{id,id},
      success:function(response)
      {
       Swal.fire({
  icon: 'success',
  title: 'Plan Purchased SuccessFully',
  text: 'Something went wrong!',
  
}).then((result)=>{
        window.location.href="admin panel/emails.php";
        
       });
      }
    })
  }
</script>
</body>
</html>