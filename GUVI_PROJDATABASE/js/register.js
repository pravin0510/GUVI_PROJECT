function execute(){
    $(document).ready(function() {
    
        // $("#submit").click(function() {
        
            var email = $("#email").val();
            var password  = $("#password").val();
            var c_password = $("#c-password").val();

            if(email === "") {
                alert("Please enter your email id.");
                return false;
        }

        if(password === ""){
            alert("Please enter your password");
            return false;
        }

            if(password !== c_password){
                alert("Check your password");
                return false;
            }
            
            $.ajax({
                type: "POST",
                url: "php/register.php",
                data: {
                    email : email,
                    upswd : password
                },
                // cache: false,
                // function(){console.log("hello")},
                success: function(data) {
                    console.log(data);
                    window.location.href="login.html";
                    alert(data);
                },
                error: function(xhr, status, error) {
                    console.error(xhr);
                }
            });
        
        });
    
    // });
}