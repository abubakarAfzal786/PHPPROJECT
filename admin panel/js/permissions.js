 $plan="";
    $id="";
    $permission=document.getElementById("permissions");
   
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
        });
function showPermission()
{
$("#addPermission").modal('show');
}
document.getElementById("permission_form").addEventListener('submit',function(e){
 e.preventDefault();
console.log("working");

permission=document.getElementById("permission").value;
$.ajax({
    url:"/Email System/Ajax Requests/add_permission.php",
    method:"POST",
    data:{permission:permission},
     dataType: "json",
    success:function(data)
   {
   

    if(data!=false)
    {

       Swal.fire({
  icon: 'success',
  title: 'Added SuccessFully',
  text: 'Something went wrong!',
  
}).then((result)=>{
       loadData();

$("#addPermission").modal('hide');
        
       });

    }
    else
{
    Swal.fire({
  icon: 'success',
  title: 'Added SuccessFully',
  text: data,
  
}).then((result)=>{
$("#addPermission").modal('hide');
       
        
       });
}

   }

})
        })
document.getElementById("edit_permission_form").addEventListener('submit',function(e){
    e.preventDefault();
   permission= document.getElementById("edit_permission").value;
   $.ajax({
    url:"/Email System/Ajax Requests/update_permission.php",
    method:"POST",
    dataType:"json",
    data:{permission:permission,id:id},
    success:function(data)
    {
   loadData();

         $("#editPermission").modal('hide');


              

     Swal.fire({
  icon: 'success',
  title: 'Updated SuccessFully',
  text: 'Something went wrong!',
  
});
    
    }
   })
})
function loadData()
{
    $.ajax({
        url:"/Email System/Ajax Requests/permissions.php",
        method:"GET",
        dataType:"json"
    }).done(function(data){
for(var single_table of data)
{
    $plan+="<tr>";
   $plan+='<td>'+single_table[0]+'</td>';
   $plan+='<td>'+single_table[1]+'</td>';

    $plan+=`<td><a href="#"  onclick="edit_permission(`+single_table[0]+`)" ><i class="fa fa-edit"></i></a></td>`;

    $plan+="</tr>";
}
$permission.innerHTML=$plan;
    })
}
function edit_permission(e)
{
    id=e;
    $.ajax({
            url:"/Email System/Ajax Requests/edit_permission.php",
            method:"post",
            data:{id:e},
            dataType:"json",
            success:function(data)
            {
                $("#editPermission").modal('show');
document.getElementById('edit_permission').value=data['permission'];


            }
        })
}
