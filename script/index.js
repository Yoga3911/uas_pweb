$(document).ready(function(){
    $('.title').css('opacity', 1);
    $('.myTombol').css('opacity', 0.7); 
    setTimeout(function() {
        $('.myTombol2').css('opacity', 1); 
      }, 1500);

    let timeout;
    let password = document.getElementById('password_r')
    let strengthBadge = document.getElementById('StrengthDisp')

    let strongPassword = new RegExp('(?=.*[A-Z])(?=.*[0-9])(?=.{12,})')
    let strongPassword2 = new RegExp('(?=.*[a-z])(?=.*[0-9])(?=.{12,})')
    let mediumPassword = new RegExp('(?=.*[a-z])(?=.*[0-9])(?=.{6,})')
    let mediumPassword2 = new RegExp('(?=.*[A-Z])(?=.*[0-9])(?=.{6,})')
    function StrengthChecker(PasswordParameter) {
        if (strongPassword.test(PasswordParameter) || strongPassword2.test(PasswordParameter)) {
            strengthBadge.style.backgroundColor = "green"
            strengthBadge.textContent = "Strong"
        } else if (mediumPassword.test(PasswordParameter) || mediumPassword2.test(PasswordParameter)) {
            strengthBadge.style.backgroundColor = "blue"
            strengthBadge.textContent = "Medium"
        } else {
            strengthBadge.style.backgroundColor = "red"
            strengthBadge.textContent = "Weak"
        }
    }

    password.addEventListener("input", () => {
        strengthBadge.style.display = "block"
        clearTimeout(timeout);
        timeout = setTimeout(() => StrengthChecker(password.value), 200);
        if (password.value.length !== 0) {
            strengthBadge.style.display != "block"
        } else {
            strengthBadge.style.display = "none"
        }
    });
})