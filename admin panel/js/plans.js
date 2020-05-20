  $plan="";
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

loadData();
})
        function loadData()
        {
            console.log("loadData");
            $plan_table=document.getElementById('plans');
            $("#plans").empty();
          
   $.ajax({
 url:"/Email System/Ajax Requests/all_plans.php",
                method:"GET",
     dataType: "json",
   }).done(function(data){
    console.log(data);
    for(var single_table of data)
{
    $plan+="<tr>";
    $plan+='<td>'+single_table[0]+'</td>';
    $plan+=` <td>`+single_table[4]+`</td>`;
    $plan+=` <td>`+single_table[2]+`</td>`;
    $plan+=` <td>`+single_table[3]+`</td>`;

    $plan+=`<td>`+single_table[1]+`</td>`;
    $plan+=`<td><a href="#"  onclick="edit_plan(`+single_table[0]+`)" ><i class="fa fa-edit"></i></a></td>`;

    $plan+="</tr>";
}
$plan_table.innerHTML=$plan;

   });
        }
         id="";
    function edit_plan(e)
    {
        console.log(e);
        id=e;
        $.ajax({
            url:"/Email System/Ajax Requests/edit_plan.php",
            method:"post",
            data:{id:e},
            dataType:"json",
            success:function(data)
            {
                $("#myModal").modal('show');
document.getElementById('plan_price').value=data['price'];
document.getElementById('email_number').value=data['emails'];
document.getElementById('plan_description').value=data['description'];
document.getElementById('type').value=data['plan_name'];


            }
        })
    }
    document.getElementById('plan_form').addEventListener('submit',function(e){
        e.preventDefault();
        price=document.getElementById('plan_price').value;
email_number=document.getElementById('email_number').value;
description=document.getElementById('plan_description').value;
type=document.getElementById('type').value;
$.ajax({
    url:"/Email System/Ajax Requests/update_plan.php",
    method:"POST",
    dataType:"json",
    data:{id:id,price:price,email_number:email_number,description:description,type:type},
    success:function(data)
    {
if(data['feedback'])
{
                $("#myModal").modal('hide');

     Swal.fire({
  icon: 'success',
  title: 'Updated SuccessFully',
  text: 'Something went wrong!',
  
}).then(function(result){
    window.location.href="plans.php";
});
    }
}
})
    })