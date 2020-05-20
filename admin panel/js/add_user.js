 $r_p="";
    $("#add").prop("disabled", true);

    $(document).ready(function(){
        $select=document.getElementById("type");
        console.log($select);
             $.ajax({
        url:"/Email System/Ajax Requests/all_roles.php",
        method:"GET",
        dataType:"json"
    }).done(function(data){
        console.log(data);
for(var single_table of data)
{
if(single_table[1]!='Admin' && single_table[1]!='Marchent')
{

   $r_p+=`<option value=`+single_table[0]+`>`+single_table[1]+`</option>`;
}
}
document.getElementById("type").innerHTML=$r_p;
    })
    document.getElementById('add_user').addEventListener('submit',function(e){
        e.preventDefault();
        name=document.getElementById("name").value;
                email=document.getElementById("email").value;
                password=document.getElementById("password").value;

      $.ajax({
                    url:"/Email System/Ajax Requests/add_user.php",
                    method:"POST",
                    dataType:"json",
                    data:{email:email,password:password,name:name},
                    success:function(response)
                    {
                        console.log(response);
                        if(response==true)
                        {
   Swal.fire({
  icon: 'success',
  title: 'User SuccessFully',
  text: 'Something went wrong!',
  
}).then((result)=>{
        window.location.href="add_user.php";
        
       });
                        }
                        else
                        {
   Swal.fire({
  icon: 'error',
  title: 'Please Try Again',
  text: 'Something went wrong!',
  
}).then((result)=>{
        window.location.href="add_user.php";
        
       });


                        }
                    }
                })
    });
        document.getElementById("email").addEventListener('blur',function(){
                email=document.getElementById('email').value;
                $.ajax({
                    url:"/Email System/Ajax Requests/emailValidation.php",
                    method:"POST",
                    dataType:"json",
                    data:{email:email},
                    success:function(response)
                    {
                        console.log(response);
                        if(response==true)
                        {
document.getElementById("email_error").innerHTML="<p style='color:red;'>This Email is Already Exits</p>";

                        }
                        else
                        {
$("#add").prop('disabled',false);
$("#email_error").empty();

                        }
                    }
                })
            })
});