   $(document).ready(function(){
              $.ajax({
                url:"/Email System/Ajax Requests/isAdmin.php",
                method:"GET",
                dataType:"json",}).done(function(response){

                if(response!=="Admin")
                {
                    window.location.href="../login.php";
                }
              
                });
            });
        document.getElementById("plan_form").addEventListener('submit',function(e){
            e.preventDefault();
price=document.getElementById("plan_price").value;
email_number=document.getElementById("email_number").value;
description=document.getElementById("plan_description").value;

type=document.getElementById("type").value;
console.log(type);

$.ajax({
    url:"/Email System/Ajax Requests/add_plan.php",
    type:"post",
    data:{price:price,email_number:email_number,description:description,type:type},
     dataType: "json",
    success:function(data)
   {
   

    if(data['feedback']==true)
    {
       Swal.fire({
  icon: 'success',
  title: 'Added SuccessFully',
  text: 'Something went wrong!',
  
}).then((result)=>{
        window.location.href="plans.php";
        
       });
    }
    else
{
    alert(data);
}

   }

})
        })