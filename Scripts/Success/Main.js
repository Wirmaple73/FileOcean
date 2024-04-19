// [+] Show Modal
setTimeout(() => {
    swal.fire({
        icon:"success",
        title:"Done !",
        text : "Account created successfully :)",
        confirmButtonText:"<span>Login Now</span>"
    }).then((result) => {
        if(result.isConfirmed){
            location.replace("Login.php")
        }
    });
},1000)