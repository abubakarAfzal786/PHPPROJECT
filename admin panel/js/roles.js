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

 $.ajax({
        url:"/Email System/Ajax Requests/permissions.php",
        method:"GET",
        dataType:"json"
    }).done(function(data){
        $all_permissions=data;
for(var single_table of data)
{
    $plan+=`<label><input type="checkbox" id="permissions" name="permissions[]" value="`+single_table[0]+`">&nbsp;&nbsp;`+single_table[1]+`</label>&nbsp;&nbsp;&nbsp;&nbsp;`;
  
}
$permission.innerHTML=$plan;
    });
            $.ajax({
        url:"/Email System/Ajax Requests/all_roles.php",
        method:"GET",
        dataType:"json"
    }).done(function(data){
        console.log(data);
for(var single_table of data)
{

   $r_p+="<tr>";
   $r_p+='<td>'+single_table[0]+'</td>';
   $r_p+='<td>'+single_table[1]+'</td>';
   $r_p+=`<td><ul id="render_permission`+single_table[0]+`"></ul></td>`;
   $r_p+=`<td><a href="#"  onclick="edit_role(`+single_table[0]+`)" ><i class="fa fa-edit"></i></a></td>`;

   $r_p+="</tr>";
   

loadPermission(single_table[0]);

}
$table.innerHTML=$r_p;
    })
        })
        all_permissions="";
         $plan="";
        $edit_p="";
        $edit_per=document.getElementById("edit_permission_select");
        $r_p="";
        $permission=document.getElementById("permission_select");
        $table=document.getElementById("role_permissions");
       
        role_id="";
        document.getElementById("add_roles").addEventListener("submit",function(e){
e.preventDefault();
permission=[];
permission=$( "input[name='permissions[]']:checked" ).map(function() {return this.value;}).get();
role=document.getElementById("role").value;
$.ajax({
    url:"/Email System/Ajax Requests/role.php",
    method:"POST",
    dataType:"json",
    data:{permission:permission,role:role},
    success:function(data)
    {
    Swal.fire({
  icon: 'success',
  title: 'Added SuccessFully',
  text: 'Something went wrong!',
  
}).then(function(result){
    window.location.href="roles.php";
});
    }
})
console.log(permission);
        });
       
        function showRole()
        {
$("#showRole").modal('show');

        }
    
     function loadPermission(id)
     {
        console.log("Load Permission");
           $.ajax({
    url:"/Email System/Ajax Requests/role_permission.php",
    method:"POST",
    dataType:"json",
    data:{id:id},
    success:function(permissions)
    {
        console.log(permissions);
if(permissions.length>0)
{
         var s_p="";
         console.log(s_p);
     for(var single_permission of permissions)
    {
s_p+="<li>"+single_permission[1]+"</li>";
    }
    document.getElementById("render_permission"+id).innerHTML=s_p;

}

    }
   })
     }
     function edit_role(id)
     {
        
role_id=id;
        $.ajax({
            url:"/Email System/Ajax Requests/edit_role.php",
            dataType:"json",
            data:{id:id},
            method:"POST",
            success:function(response)
            {
                my_permission=response.permission;
                $("#editRole").modal('show');
document.getElementById("edit_role").value=response.role['role'];
 $.ajax({
        url:"/Email System/Ajax Requests/permissions.php",
        method:"GET",
        dataType:"json"
    }).done(function(data){
         for(var all_permission of data){
           
if(my_permission.some(per=>per.permission==all_permission[1]))
 {
 $edit_p+=`<label><input type="checkbox" id="permissions" name="permissions[]" value="`+all_permission[0]+`" checked>&nbsp;&nbsp;`+all_permission[1]+`</label>&nbsp;&nbsp;&nbsp;&nbsp;`;
 }
 else
 {
     $edit_p+=`<label><input type="checkbox" id="permissions" name="permissions[]" value="`+all_permission[0]+`">&nbsp;&nbsp;`+all_permission[1]+`</label>&nbsp;&nbsp;&nbsp;&nbsp;`;  
 }
  $edit_per.innerHTML=$edit_p;
 }
})
}
    })
}
document.getElementById("updateRole").addEventListener('submit',function(e){

    e.preventDefault();
    permission=[];
permission=$( "input[name='permissions[]']:checked" ).map(function() {return this.value;}).get();
name=document.getElementById("edit_role").value;
$.ajax({
    url:"/Email System/Ajax Requests/updateRole.php",
    method:"POST",
    dataType:"json",
    data:{permission:permission,name:name,id:role_id},
    success:function(response)
    {
if(response==true)
{
    Swal.fire({
  icon: 'success',
  title: 'Updated SuccessFully',
  text: 'Something went wrong!',
  
}).then(function(result){
    window.location.href="roles.php";
});
}
}
})
});