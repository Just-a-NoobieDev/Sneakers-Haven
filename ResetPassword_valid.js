	//Validtion Code For Inputs

    const form = document.querySelector("form"),
    emailField = form.querySelector(".email-field"),
    emailInput = emailField.querySelector(".email")
    
  // Email Validtion
  function checkEmail() {
    const emaiPattern = /^[^ ]+@[^ ]+\.[a-z]{2,3}$/;
    if (!emailInput.value.match(emaiPattern)) {
      return emailField.classList.add("invalid"); //adding invalid class if email value do not mathced with email pattern
    }
    emailField.classList.remove("invalid"); //removing invalid class if email value matched with emaiPattern
  }
  
  // Calling Funtion on Form Sumbit
  form.addEventListener("submit", (e) => {
    e.preventDefault(); //preventing form submitting
    checkEmail();
  
    //calling function on key up
    emailInput.addEventListener("keyup", checkEmail);

    if (
      !emailField.classList.contains("invalid")
    ) {
      location.href = form.getAttribute("action");
    }
  });
 