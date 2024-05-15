// [+] Variables
const acceptTermBtn = $.querySelector(".form-option__input");
const emailInput = $.querySelector(".input-box__input[data-name='email']");
const duplicateEmailCheckerAPI = "API/DuplicateEmailChecker.php";

// [+] Functions
function checkInputValidation(){
    let hasAcceptTerm = acceptTermBtn.checked;
    let username, email, pass, passS2;
    let isMatch = false;
    if(hasAcceptTerm){
        inputElems.forEach((input) => {
            (input.dataset.name === "username") && (username = inputValidate.call(input, usernameValidateRegEx, "The entered username is invalid.", false));
            (input.dataset.name === "email") && (email = inputValidate.call(input, emailValidateRegEx, "The entered email address is invalid.", false));
            (input.dataset.name === "password") && (pass = inputValidate.call(input, passwordValidateRegEx, "The entered password is either too short or too long.", false));
            (input.dataset.name === "passwordS2") && (passS2 = inputValidate.call(input, passwordValidateRegEx, "The entered password is either too short or too long.", false));
            console.log(username, email, pass, passS2)
            if(username && email && pass && passS2){
                if(pass !== passS2){
                    showModal("Your password does not match your confirmation password.", false);
                    invalidInput(inputElems[2]);
                    invalidInput(inputElems[3]);
                }else{
                    form.submit();
                }
            }
        });
    }else{
        acceptTermBtn.nextElementSibling.classList.add("form-option__text--invalid");
    }


}
function acceptTermHandler(){
    if(acceptTermBtn.checked){
        subButton.classList.add("sub-button--active");
        acceptTermBtn.nextElementSibling.classList.remove("form-option__text--invalid");
    }else{
        subButton.classList.remove("sub-button--active");
    }
}
function duplicateEmailChecker(){
    let emailValue;
    if(emailValidateRegEx.test(emailInput.value.trim())){
        emailValue = emailInput.value.trim();
    }

    if(emailValue){
        let emailJson = {
            email : emailValue
        }
        let fetchToDuplicateEmail = fetch(duplicateEmailCheckerAPI, {
            method : "POST",
            headers : {
                "Content-type" : "application/json"
            },
            body : JSON.stringify(emailJson)
        });

        fetchToDuplicateEmail.then(async (resolved) => {
            if(resolved.status === 200){
                let apiRequest = await resolved.json();
                if(!apiRequest.is_unique){
                    showModal("The email you entered has already been exist",false);
                    invalidInput(emailInput);
                    isOk = false;
                }else{
                    validInput(emailInput);
                    isOk = true;
                }
            }
        })
    }
}

// [+] Events
inputElems.forEach((input) => {
    if(input.dataset.name === "passwordS2"){
        input.addEventListener("keydown", (event) => {
            (event.key === "Enter") && (checkInputValidation());
        });
    }
});

acceptTermBtn.addEventListener("input", acceptTermHandler);
subButton.addEventListener("click", checkInputValidation);
emailInput.addEventListener("blur", duplicateEmailChecker);