const fistNameInput = document.querySelector('input[name=firstName]');
const lastNameInput = document.querySelector('input[name=lastName]');
const passwordInput = document.querySelector('input[name=password]');
const submitBtn = document.querySelector('input[type=submit]');
const showIcon = document.querySelector('.show-hide-icon');

const firstNameInputInitValue = fistNameInput.value;
const lastNameInputInitValue = lastNameInput.value;
const passwordInputInitValue = passwordInput.value;

showIcon.addEventListener('click', function () {
   if (this.classList.contains('fa-eye')){
       this.toggleClasses('fa-eye', 'fa-eye-slash');
       passwordInput.setAttribute('type', 'text');
   }else {
       this.toggleClasses('fa-eye-slash', 'fa-eye');
       passwordInput.setAttribute('type', 'password');
   }
});

document.querySelector('.name-edit-pen').addEventListener('click', function () {
    changeInputEditIcon(this, fistNameInput, lastNameInput);
});

document.querySelector('.password-edit-pen').addEventListener('click', function () {
    changeInputEditIcon(this, passwordInput);
    showIcon.click();
});

function changeInputEditIcon(item, firstInpute, secondInpute) {
    if (item.classList.contains('fa-x')){
        item.toggleClasses('fa-x', 'fa-pen');
        firstInpute.disabled = true;
        secondInpute!=null?secondInpute.disabled = true:'';
    }else{
        item.toggleClasses('fa-pen', 'fa-x')
        firstInpute.disabled = false;
        secondInpute!=null?secondInpute.disabled = false:'';
    }
}

for (const input of [fistNameInput, lastNameInput, passwordInput]) {
    input.addEventListener('input', evt => {

        // disabling and enabling the submit btn when data not equal the initial value
        let isInitData = fistNameInput.value !== firstNameInputInitValue || lastNameInput.value !== lastNameInputInitValue || passwordInput.value !== passwordInputInitValue;
        if (isInitData)
            disableSubmitBtn(false);
        else disableSubmitBtn(true);

        // input error when the data length is lower of requirements
        if (input === passwordInput && input.value.length < 6) {
            setInputInError(true);
        }else if(input === passwordInput && input.value.length >= 6){
            setInputInError(false);
        }

        if ((input === fistNameInput || input === lastNameInput) && input.value.length < 4){
            setInputInError(true);
        }else if ((input === fistNameInput || input === lastNameInput) && input.value.length >= 4)setInputInError(false);

        function setInputInError(isInError) {
            if (isInError){
                errorToggle('border-0', 'border-danger', true);
            }else if (!isInError && isInitData){
                errorToggle('border-danger', 'border-0', false);
            }
            function errorToggle(removeClass, addClass, disableBtn){
                input.toggleClasses(removeClass, addClass);
                disableSubmitBtn(disableBtn);
            }
        }
        function disableSubmitBtn(isEnabled){
            submitBtn.disabled = isEnabled;
        }

        // enable all inputs when submit so the data can be read in the searver
        submitBtn.addEventListener('click', function () {
            input.disabled = false;
        });

    });
}


HTMLElement.prototype.toggleClasses = function (removedValue, addedValue){
    if (removedValue !== null )this.classList.remove(removedValue);
    if (addedValue !== null ) this.classList.add(addedValue);
}