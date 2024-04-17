// [+] Functions
function checkInputValidation(){
    let email, pass;
    inputElems.forEach((input) => {
        (input.dataset.name === "email") && (email = inputValidate.call(input, emailValidateRegEx, "The entered email address is invalid !", false));
        (input.dataset.name === "password") && (pass = inputValidate.call(input, passwordValidateRegEx, "The entered password is either too short or too long !", false));
        if(email && pass){
            form.submit();
        }
    });
}
// [+] Events
subButton.addEventListener("click", checkInputValidation);
inputElems.forEach((input) => {
    if(input.dataset.name === "password"){
        input.addEventListener("keydown", (event) => {
            (event.key === "Enter") && (checkInputValidation());
        });
    }
});