// [+] Variables
const inputBox = $.querySelectorAll(".input-box");
const inputElems = $.querySelectorAll(".input-box__input");
const subButton = $.querySelector(".sub-button");
const modalElem =  $.querySelector(".modal");
const passShowButtons = $.querySelectorAll(".input-box__eye");
const modalValue = $.querySelector(".modal__value");
const form = $.querySelector(".form");

// [+] Regular expression patterns
const emailValidateRegEx = /^[A-Za-z0-9.+\-_~!#$%&‘'/=^{}|*?`]+@[A-Za-z0-9][A-Za-z0-9-]*(?:\.[A-Za-z0-9-]+)+[A-Za-z0-9]$/;
const usernameValidateRegEx = /^[A-Za-z0-9!@#$&\-_.]{2,20}$/;
const passwordValidateRegEx = /^.{8,20}$/;

// [+] Functions
function preventDefaultHandler(event){
    event.preventDefault();
}
function focusOnInputHandler(){
    inputBox.forEach((box) => {
        box.classList.remove("input-box--focus");
    });
    (!this.classList.contains("input-box--active")) && (this.classList.add("input-box--active"));
    this.children[1].focus();
    this.classList.add("input-box--focus");
}
function showPasswordHandler(){
    if(this.classList.contains("fa-eye-slash")){
        this.classList.replace("fa-eye-slash", "fa-eye");
        this.previousElementSibling.setAttribute("type", "text");
    }else if(this.classList.contains("fa-eye")){
        this.classList.replace("fa-eye", "fa-eye-slash");
        this.previousElementSibling.setAttribute("type", "password");
    }
}
function validInput(input){
    let el = input.parentElement;
    el.className = "input-box";
    el.classList.add("input-box--valid");
}
function invalidInput(input){
    let el = input.parentElement;
    el.className = "input-box";
    el.classList.add("input-box--invalid");
}
function showModal(modalText, modalStatus){
    if(modalStatus){
        modalElem.style.cssText = "background-color: #26B401;";
    }else{
        modalElem.style.cssText = "background-color: #EC3F35;";
    }
    modalElem.classList.add("modal--show");
    modalValue.innerHTML = modalText ?? ". . .";
    closeModal();
}
function closeModal(){
    setTimeout(() => {
        modalElem.classList.remove("modal--show");
        setTimeout(() => {
            modalElem.style.cssText = "background-color: transparent;";
            modalValue.innerHTML = "";
        },600)
    }, 3000);
}
function showAdvanceModal(modalTitle, modalCaption, modalIcon, modalButtonText){
    swal.fire({
        title: modalTitle,
        text: modalCaption,
        icon: modalIcon,
        confirmButtonText: modalButtonText
    });
}
function inputValidate(regEx, modalValue, modalStatus){
    let inputValue = this.value.trim();
    let returnValue;
    if(regEx.test(inputValue)){
        returnValue = inputValue;
        validInput(this);
    }else{
        invalidInput(this);
        showModal(modalValue, modalStatus);
    }
    return returnValue;
}

// [+] Events
form.addEventListener("submit", preventDefaultHandler)
inputBox.forEach((input) => {
    input.addEventListener("click", focusOnInputHandler);
    input.addEventListener("paste", preventDefaultHandler);
    input.addEventListener("copy", preventDefaultHandler);
    input.addEventListener("cut", preventDefaultHandler);
});
inputElems.forEach((input) => {
    input.addEventListener("focus", (event) =>{
        let parentEl = event.target.parentElement;
        focusOnInputHandler.call(parentEl);
    });

});
passShowButtons.forEach((button) => {
    button.addEventListener("click", showPasswordHandler);
});