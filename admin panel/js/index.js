$(document).ready(function(){
                $.ajax({
                url:"/Email System/Ajax Requests/isAdmin.php",
                method:"GET",
                dataType:"json",}).done(function(response){

                if(response!=="Admin")
                {
                    console.log("workin....");
                 $("#admin_right").css("display","none");   
                }
              
                });
})