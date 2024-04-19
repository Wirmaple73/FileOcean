// [+] Show Modal
setTimeout(() => {
    swal.fire({
        icon:"success",
        title:"Registration Successful",
        text : "Your account has been successfully created.",
        confirmButtonText:"<span>Proceed to the main page</span>"
    }).then((result) => {
        if(result.isConfirmed){
            location.replace("Index.php")
        }
    });
},100)

// Automatically redirect the user to the main page after a while
setTimeout(() => {
    location.replace("Index.php");
}, 5000);
