   $.ajax({
                url:"/Email System/Ajax Requests/isAdmin.php",
                method:"GET",
                dataType:"json",}).done(function(response){

                if(response!=="Admin")
                {
                    window.location.href="../emails.php";
                }
              
                });
   $r_p="";
           $.ajax({
        url:"/Email System/Ajax Requests/admin_user.php",
        method:"GET",
        dataType:"json"
    }).done(function(data){
        console.log(data);
       my_id=data.owner;
for(var single_table of data.users)
{

   

  if(single_table[0]!==my_id)
  {
    $r_p+="<tr>";
   $r_p+='<td>'+single_table[0]+'</td>';
   $r_p+='<td>'+single_table[1]+'</td>';
   $r_p+='<td>'+single_table[2]+'</td>';
     if(single_table[12]==1)
   {
   $r_p+=`<td><button onclick="DeActivate(`+single_table[0]+`)" class="btn btn-danger">DeActivate</td>`;

   }
   else
   {
   $r_p+=`<td><button onclick="activate(`+single_table[0]+`)" class="btn btn-success">Activate</td>`;

   }
  }

   $r_p+="</tr>";
   



}
document.getElementById("user_data").innerHTML=$r_p;
    })
    function activate(id)
    {
$.ajax({
    url:"/Email System/Ajax Requests/updateStatus.php",
    method:"POST",
    dataType:"json",
    data:{activate:id},
    success:function(response)
    {
           Swal.fire({
  icon: 'success',
  title: 'User Activated SuccessFully',
  text: 'Something went wrong!',
  
}).then(function(result){
    window.location.href="all_users.php";
});
    }
})
    }
    function DeActivate(id)
    {
$.ajax({
    url:"/Email System/Ajax Requests/updateStatus.php",
    method:"POST",
    dataType:"json",
    data:{dactivate:id},
    success:function(response)
    {
           Swal.fire({
  icon: 'success',
  title: 'User DeActivated SuccessFully',
  text: 'Something went wrong!',
  
}).then(function(result){
    window.location.href="all_users.php";
});
    }
})
    }