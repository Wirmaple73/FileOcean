// [+] Variables
const acceptTermBtn = $.querySelector(".form-option__input");
const duplicateUserDataAPI = "API/DuplicateUserDataChecker.php";
const usernameInput = $.querySelector(".input-box__input[data-name='username']");
const emailInput = $.querySelector(".input-box__input[data-name='email']");

// [+] Functions
function checkInputValidation(){
    let hasAcceptTerm = acceptTermBtn.checked;
    let username, email, pass, passS2, usernameNotDuplicate, emailNotDuplicate;
    let isMatch = false;

    if(hasAcceptTerm){
        duplicateUserDataChecker(usernameInput, usernameValidateRegEx, "username");
        duplicateUserDataChecker(emailInput, emailValidateRegEx, "email");

        usernameNotDuplicate = +usernameInput.dataset.ok;
        emailNotDuplicate = +emailInput.dataset.ok;

        if(usernameNotDuplicate && emailNotDuplicate){
            inputElems.forEach((input) => {
                (input.dataset.name === "username") && (username = inputValidate.call(input, usernameValidateRegEx, "The entered username is invalid.", false));
                (input.dataset.name === "email") && (email = inputValidate.call(input, emailValidateRegEx, "The entered email address is invalid.", false));
                (input.dataset.name === "password") && (pass = inputValidate.call(input, passwordValidateRegEx, "The entered password is either too short or too long.", false));
                (input.dataset.name === "passwordS2") && (passS2 = inputValidate.call(input, passwordValidateRegEx, "The entered password is either too short or too long.", false));
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
        }
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
function duplicateUserDataChecker(targetInput, regExP, dataType){
    let inputValue;
    if(regExP.test(targetInput.value.trim())){
        inputValue = targetInput.value.trim();
    }

    if(inputValue){
        let data = {
            dataType: dataType,
            value: inputValue
        }

        let fetchToDuplicateEmail = fetch(duplicateUserDataAPI, {
            method : "POST",
            headers : {
                "Content-type" : "application/json"
            },
            body : JSON.stringify(data)
        });

        fetchToDuplicateEmail.then(async (resolved) => {
            if(resolved.status === 200){
                let apiRequest = await resolved.json();
                if(!apiRequest.isUnique){
                    targetInput.setAttribute("data-ok", 0);
                    showModal(`The entered "${dataType}" is already in use by another user !`, false);
                    invalidInput(targetInput);
                }else{
                    targetInput.setAttribute("data-ok", 1);
                    validInput(targetInput);
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

    (input.dataset.name === "username"   &&
    input.addEventListener("blur", (event) =>
        duplicateUserDataChecker(input, usernameValidateRegEx, "username")));

    (input.dataset.name === "email"   &&
        input.addEventListener("blur", (event) =>
            duplicateUserDataChecker(input, emailValidateRegEx, "email")));
});

acceptTermBtn.addEventListener("input", acceptTermHandler);
subButton.addEventListener("click", checkInputValidation);