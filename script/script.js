function checkPasswordStrength(){
    var password_value = document.getElementById('password').value;
    let i = 0;

    if (password_value.match(/[a-z]+/)) {
      i = i + 1;
    }
    if (password_value.match(/[A-Z]+/)) {
      i += 1;
    }
    if (password_value.match(/[0-9]+/)) {
      i += 1;
    }
    if (password_value.match(/[ `!@#$%^&*()_+\-=\[\]{};':"\\|,.<>\/?~]+/)) {
      i += 1;
    }
    if (password_value.length >= 8) {
      i += 1;
    }

    if (password_value) {
        if (i >= 1 && i < 3) {
          document.getElementById("strongPassword").innerHTML = "weak password";
          document.getElementById("strongPassword").style.color = "red";
        } else if (i >= 3 && i < 5) {
          document.getElementById("strongPassword").innerHTML =
            "medium password";
          document.getElementById("strongPassword").style.color = "orange";
        } else if (i >= 5) {
          document.getElementById("strongPassword").innerHTML =
            "STRONG password";
          document.getElementById("strongPassword").style.color = "green";
        }
      } else {
        document.getElementById("strongPassword").innerHTML = "";
      }

    
}

function confirmPassword(){
    var password = document.getElementById('password').value;
    var confirmpassword = document.getElementById('confirmpassword').value;

    if( password !== confirmpassword){
        document.getElementById("confirmPassword").innerHTML = "Password doesn't match";
        document.getElementById("strongPassword").style.color = "red";
        return false;
    } else{
        return true;
    }

}



    function togglePasswordVisibility(inputId) {
        var passwordInput = document.getElementById(inputId);
        var toggleButton = document.querySelector(`#${inputId} + button`);

        if (passwordInput.type === "password") {
            passwordInput.type = "text";
            toggleButton.textContent = "Hide";
        } else {
            passwordInput.type = "password";
            toggleButton.textContent = "Show";
        }
    }



