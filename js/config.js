// config.js
const API_BASE_URL = "http://localhost:3000"; // Local



// const API_BASE_URL = "http://ejense.in/api_submit_quote.php"; // Server
export default API_BASE_URL;


// JavaScript code to redirect if SSL is not applied
window.onload = function() {
    // Check if the page is accessed using HTTPS
    if (window.location.protocol !== "https:") {
        // Redirect to the non-SSL version of the site
        window.location.href = "http://www.ejense.in";
    }
};