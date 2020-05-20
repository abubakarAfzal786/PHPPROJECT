   

   $.ajax({
                url:"/Email System/Ajax Requests/isAdmin.php",
                method:"GET",
                dataType:"json",}).done(function(response){

                if(response!=="Marchent")
                {
                    window.location.href="../login.php";
                }
              
                });
 $r_p="";
                    $.ajax({
        url:"/Email System/Ajax Requests/marchent_email.php",
        method:"GET",
        dataType:"json"
    }).done(function(data){
        console.log(data);
for(var single_table of data)
{

   $r_p+="<tr>";
   $r_p+='<td>'+single_table[0]+'</td>';
   $r_p+='<td>'+single_table[1]+'</td>';
   $r_p+='<td>'+single_table[2]+'</td>';
   $r_p+='<td>'+single_table[3]+'</td>';
   $r_p+='<td>'+single_table[4]+'</td>';
   $r_p+='<td>'+single_table[5]+'</td>';
   $r_p+='<td>'+single_table[6]+'</td>';
   $r_p+='<td>'+single_table[7]+'</td>';
   $r_p+='<td>'+single_table[8]+'</td>';
   $r_p+='<td>'+single_table[9]+'</td>';



 

   $r_p+="</tr>";
   


}

document.getElementById("marchent_email").innerHTML=$r_p;
    })
    setInterval(function(){
      $.ajax({
        url:"/Email System/Ajax Requests/cronjob.php",
        method:"GET",
        dataType:"json"

      }).done(function(data){
        console.log(data);
      })
    },24* 60 * 60 * 1000)