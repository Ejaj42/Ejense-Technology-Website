document.addEventListener("DOMContentLoaded", function() {
    // Get the current URL
    var currentUrl = window.location.href;

    // Check if the URL ends with .html
    if (currentUrl.endsWith('.html')) {
        // Remove .html extension
        var newUrl = currentUrl.replace(/\.html$/, '');

        // Replace the browser's current history entry without .html extension
        history.replaceState(null, null, newUrl);
    }
});



$(document).ready(function() {
    // Attach an input event listener to the textarea
    $('#message').on('input', function() {
        // Check the length of the entered text
        var charCount = $(this).val().length;

        // Display an alert when the character count reaches 500
        if (charCount === 500) {            

            displayValidationModal("You have reached the maximum character limit (500).", 'Message');
        }
    });
});
    

function performSearch() {
    
    // Get the search keyword
    var searchKeyword = document.querySelector('#searchModal input').value;

    // Check if the search keyword matches the desired condition
    if (searchKeyword.toLowerCase() === 'contact') {
        // Redirect to contact.html
        window.location.href = 'contact.html';
    } else {
        // Handle other search actions as needed
        alert('Performing search for: ' + searchKeyword);
    }

    // Close the search modal
    $('#searchModal').modal('hide');
}


    
    function validateForm() {

        startLoading();
        // Validate name field
        var name = document.getElementById('name').value;
        if (name === "") {
            displayValidationModal("Please enter your name.", 'Name');
            return;
        }

        // Validate company field
        var company = document.getElementById('company').value;
        if (company === "") {
            displayValidationModal("Please enter your company name.", 'Company Name');
            return;
        }

        // Validate email field
        var emailInput = document.getElementById('email');
        var emailValue = emailInput.value.trim();
        var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if (!emailRegex.test(emailValue)) {
            displayValidationModal("Please enter a valid email address.", 'Email');
            return;
        }

        // Validate service field
        var service = document.getElementById('service').value;
        if (service === "Select Service") {
            displayValidationModal("Please select a service.", 'Service');
            return;
        }

        // Validate message field
        var message = document.getElementById('message').value;
        if (message === "") {
            displayValidationModal("Please enter your message.", 'Message');
            return;
        }
        debugger;
      // If all validations pass, submit the form
        sendDataToServer(1);
    }



    function sendDataToServer(Type) {
    debugger;
    // Get form data
var name = document.getElementById('name').value;
var company = document.getElementById('company').value;
var email = document.getElementById('email').value;
var service = document.getElementById('service').value;
var message = document.getElementById('message').value;
var type1 = Type;
    // Create a data object to send to the server
    var postData = {
        name: name,
        company: company,
        email: email,
        service: service,
        message: message,
        type: type1
        // Add other form fields as needed
    };


 // Convert the data to JSON format
 const jsonData = JSON.stringify(postData);

// Set up the HTTP request
const xhr = new XMLHttpRequest();
const url ="http://ejense.in/api_submit_quote.php"; // Server

xhr.open("POST", url, true);
xhr.setRequestHeader("Content-Type", "application/json");

// Define the callback function to handle the response
xhr.onreadystatechange = function () {
    if (xhr.readyState === 4) { // Request is complete
        if (xhr.status === 201) {
            // Successful response
            console.log("Success:", xhr.responseText);
            displayValidationModal("Thank you for expressing interest for request a quote with Ejense Technology. Our sales executive will reach out to you shortly at the provided email. Thank you for choosing Ejense Technology.","");

           
            return;
        } else {
            // Error response
            console.error("Error:", xhr.responseText);            
            displayValidationModal("Error submitting request. Please try again.","");
        }
    }
};

// Send the request
xhr.send(jsonData);

}



function sendDataToServerData_signup(Type) {
    
    // Get form data
var name = 'NA';
var company = 'NA';
var email = document.getElementById('signupemail').value;
var service ='NA';
var message = 'NA';
var type ='2';
    // Create a data object to send to the server
    var postData = {
        name: name,
        company: company,
        email: email,
        service: service,
        message: message,
        type: type
        // Add other form fields as needed
    };


 // Convert the data to JSON format
 const jsonData = JSON.stringify(postData);

// Set up the HTTP request
const xhr = new XMLHttpRequest();
const url ="http://ejense.in/api_submit_quote.php"; // Server

xhr.open("POST", url, true);
xhr.setRequestHeader("Content-Type", "application/json");

// Define the callback function to handle the response
xhr.onreadystatechange = function () {
    if (xhr.readyState === 4) { // Request is complete
        if (xhr.status === 201) {
            // Successful response
            console.log("Success:", xhr.responseText);
            displayValidationModal_signup("Thank you for showing interest and signing up with Ejense Technology. HR representative will contact you soon at the registered email. Thanks for choosing Ejense Technology.","");

           
            return;
        } else {
            // Error response
            console.error("Error:", xhr.responseText);            
            displayValidationModal_signup("Error submitting request. Please try again.","");
        }
    }
};

// Send the request
xhr.send(jsonData);

}
    
    function displayValidationModal(message, fieldName) {

        // Clear form values after submission
document.getElementById('name').value = '';
document.getElementById('company').value = '';
document.getElementById('email').value = '';
document.getElementById('service').value = 'Select Service';
document.getElementById('message').value = '';
document.getElementById('signupemail').value = '';

        var validationMessageElement = document.getElementById('validationMessage');
        validationMessageElement.textContent = `${message}`;

        // Show the modal
        var validationModal = new bootstrap.Modal(document.getElementById('validationModal'));
        validationModal.show();
    }


    function displayValidationModal_signup(message, fieldName) {

         debugger;
         document.getElementById('signupemail').value = '';


        var validationMessageElement = document.getElementById('validationMessage');
        validationMessageElement.textContent = `${message}`;

        // Show the modal
        var validationModal = new bootstrap.Modal(document.getElementById('validationModal'));
        validationModal.show();
    }




    // Signup Button 


    function validateAndSignUp() {
        debugger;
        startLoading();
            // Get the email input value
            var emailInput = document.getElementById('signupemail').value;

            // Validate email format
            var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (!emailRegex.test(emailInput)) {                
                displayValidationModal_signup("Please enter a valid email address.","");
               //  showAlertAndRedirect ("Please enter a valid email address.","index.html");
                return;
            }
             // If all validations pass, submit the form
             sendDataToServerData_signup(2);
            // If validation passes, log success (replace with actual signup logic)
            console.log("Thank you for showing interest and signing up with Ejense Technology. Our sales executive or HR representative will contact you soon at the registered email. Thanks for choosing Ejense Technology.");
           // showAlertAndRedirect ("Thank you for showing interest and signing up with Ejense Technology. Our sales executive or HR representative will contact you soon at the registered email. Thanks for choosing Ejense Technology.","index.html");
          //  displayValidationModal("Thank you for showing interest and signing up with Ejense Technology. Our sales executive or HR representative will contact you soon at the registered email. Thanks for choosing Ejense Technology.","");
            
            // Clear the form after signup (optional)
            document.getElementById('signupForm').reset();



            
        }

        function showAlertAndRedirect(message, destination) {
    // Display an alert
    alert(message);
    var destination1="http://ejense.in/"+destination;
    // Redirect to the specified destination (home page in this case)
    window.location.href = destination1;
}
    


// Contact us Code 



function validateAndSubmitFormCONTACTUS() {
    startLoading();
    debugger;
    // Validate name field
    var name = document.getElementById('name').value;
    if (name === "") {
        displayValidationModal_contactus("Please enter your name.", 'Name');
        return;
    }

    

    // Validate email field
    var emailInput = document.getElementById('email');
    var emailValue = emailInput.value.trim();
    var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (!emailRegex.test(emailValue)) {
        displayValidationModal_contactus("Please enter a valid email address.", 'Email');
        return;
    }

    

   // Validate Subject field
   var subject = document.getElementById('Subject').value;
   if (subject === "Select an inquiry subject") {
    displayValidationModal_contactus("Please Select an inquiry subject.", 'Subject');
       return;
   }




 // Regular expression to check if the mobile number is numeric and up to 10 digits
 // Validate name field
 var mobile_number = document.getElementById('mobile_number').value;
 if (mobile_number === "") {
     displayValidationModal_contactus("Please enter Valid Mobile Number.", 'Mobile Number');
     return;
 }

    // Validate message field
    var message = document.getElementById('message').value;
    if (message === "") {
        displayValidationModal_contactus("Please enter your message.", 'Message');
        return;
    }
    debugger;
  // If all validations pass, submit the form
  sendDataToServerContactus(3);

        document.getElementById('quoteForm').reset();
}


function sendDataToServerContactus(Type) {
    debugger;
    // Get form data
var name = document.getElementById('name').value;
var company = document.getElementById('Subject').value;
var email = document.getElementById('email').value;
var service = document.getElementById('mobile_number').value;
var message = document.getElementById('message').value;
var type1 = Type;
    // Create a data object to send to the server
    var postData = {
        name: name,
        company: company,
        email: email,
        service: service,
        message: message,
        type: type1
        // Add other form fields as needed
    };


 // Convert the data to JSON format
 const jsonData = JSON.stringify(postData);

// Set up the HTTP request
const xhr = new XMLHttpRequest();
const url ="http://ejense.in/api_submit_quote.php"; // Server

xhr.open("POST", url, true);
xhr.setRequestHeader("Content-Type", "application/json");

// Define the callback function to handle the response
xhr.onreadystatechange = function () {
    if (xhr.readyState === 4) { // Request is complete
        if (xhr.status === 201) {
            // Successful response
            console.log("Success:", xhr.responseText);
            displayValidationModal_contactus("Thank you for expressing interest in Ejense Technology. Our HR team will reach out to you shortly at the provided email. Thank you for choosing Ejense Technology.","");

           
            return;
        } else {
            // Error response
            console.error("Error:", xhr.responseText);            
            displayValidationModal_contactus("Error submitting request. Please try again.","");
        }
    }
};

// Send the request
xhr.send(jsonData);

}



function displayValidationModal_contactus(message, fieldName) {
debugger;
    // Clear form values after submission
document.getElementById('name').value = '';
document.getElementById('Subject').value = 'Select an inquiry subject';
document.getElementById('email').value = '';
document.getElementById('message').value = '';
document.getElementById('mobile_number').value = '';
document.getElementById('signupemail').value = '';


    var validationMessageElement = document.getElementById('validationMessage');
    validationMessageElement.textContent = `${message}`;

    // Show the modal
    var validationModal = new bootstrap.Modal(document.getElementById('validationModal'));
    validationModal.show();
}

function startLoading() {
    var overlay = document.getElementById('overlay');
    var loader = document.getElementById('loader');
    var content = document.getElementById('content');

    overlay.style.display = 'block';
    loader.style.display = 'block';

    // Simulate fetching data from the model (replace with your actual model fetching logic)
    fetchModelData().then(function () {
        overlay.style.display = 'none';
        loader.style.display = 'none';
        content.style.display = 'block';
    });
}

// Placeholder function to simulate fetching data from the model
function fetchModelData() {
    return new Promise(function (resolve) {
        setTimeout(function () {
            resolve();
        }, 2000); // Simulating a 2-second delay, replace with actual model fetching time
    });
}