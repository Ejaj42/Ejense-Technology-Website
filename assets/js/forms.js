/**
 * Ejense Technology — Form Handling
 * Maintains compatibility with api_submit_quote.php backend
 */
(function () {
    'use strict';

    var API_URL = '/api_submit_quote.php';

    function getApiUrl() {
        // Use relative path for portability across environments
        var base = window.location.origin;
        var path = window.location.pathname.replace(/\/[^/]*$/, '');
        return base + path + '/api_submit_quote.php';
    }

    function isValidEmail(email) {
        return /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email);
    }

    function showModal(message) {
        var el = document.getElementById('validationMessage');
        if (el) el.textContent = message;
        var modalEl = document.getElementById('validationModal');
        if (modalEl && typeof bootstrap !== 'undefined') {
            bootstrap.Modal.getOrCreateInstance(modalEl).show();
        }
    }

    function clearQuoteForm() {
        ['name', 'company', 'email', 'message'].forEach(function (id) {
            var el = document.getElementById(id);
            if (el) el.value = '';
        });
        var service = document.getElementById('service');
        if (service) service.selectedIndex = 0;
        var signup = document.getElementById('signupemail');
        if (signup) signup.value = '';
    }

    function clearContactForm() {
        ['name', 'email', 'message', 'mobile_number'].forEach(function (id) {
            var el = document.getElementById(id);
            if (el) el.value = '';
        });
        var subject = document.getElementById('Subject');
        if (subject) subject.selectedIndex = 0;
    }

    function sendToServer(data, successMsg, clearFn) {
        var csrf = document.querySelector('input[name="csrf_token"]');
        if (!csrf || !csrf.value) {
            showModal('Your session has expired. Please refresh the page and try again.');
            return;
        }
        data.csrf_token = csrf.value;
        startLoading();
        var xhr = new XMLHttpRequest();
        xhr.open('POST', getApiUrl(), true);
        xhr.setRequestHeader('Content-Type', 'application/json');
        xhr.onreadystatechange = function () {
            if (xhr.readyState === 4) {
                stopLoading();
                if (xhr.status === 201) {
                    showModal(successMsg);
                    if (clearFn) clearFn();
                } else {
                    showModal('Error submitting request. Please try again.');
                }
            }
        };
        xhr.send(JSON.stringify(data));
    }

    // Quote form validation (type 1)
    window.validateForm = function () {
        var name = (document.getElementById('name') || {}).value || '';
        var company = (document.getElementById('company') || {}).value || '';
        var email = ((document.getElementById('email') || {}).value || '').trim();
        var service = (document.getElementById('service') || {}).value || '';
        var message = (document.getElementById('message') || {}).value || '';

        if (!name.trim()) { showModal('Please enter your name.'); return; }
        if (!company.trim()) { showModal('Please enter your company name.'); return; }
        if (!isValidEmail(email)) { showModal('Please enter a valid email address.'); return; }
        if (!service || service === 'Select Service') { showModal('Please select a service.'); return; }
        if (!message.trim()) { showModal('Please enter your message.'); return; }
        if (message.length > 500) { showModal('Message must be 500 characters or less.'); return; }

        sendToServer({
            name: name.trim(),
            company: company.trim(),
            email: email,
            service: service,
            message: message.trim(),
            type: '1'
        }, 'Thank you for expressing interest for request a quote with Ejense Technology. Our sales executive will reach out to you shortly at the provided email. Thank you for choosing Ejense Technology.', clearQuoteForm);
    };

    // Newsletter signup (type 2)
    window.validateAndSignUp = function () {
        var email = ((document.getElementById('signupemail') || {}).value || '').trim();
        if (!isValidEmail(email)) {
            showModal('Please enter a valid email address.');
            return;
        }
        sendToServer({
            name: 'NA',
            company: 'NA',
            email: email,
            service: 'NA',
            message: 'NA',
            type: '2'
        }, 'Thank you for showing interest and signing up with Ejense Technology. HR representative will contact you soon at the registered email. Thanks for choosing Ejense Technology.', function () {
            var el = document.getElementById('signupemail');
            if (el) el.value = '';
        });
    };

    // Contact form (type 3)
    window.validateAndSubmitFormCONTACTUS = function () {
        var name = (document.getElementById('name') || {}).value || '';
        var email = ((document.getElementById('email') || {}).value || '').trim();
        var subject = (document.getElementById('Subject') || {}).value || '';
        var mobile = (document.getElementById('mobile_number') || {}).value || '';
        var message = (document.getElementById('message') || {}).value || '';

        if (!name.trim()) { showModal('Please enter your name.'); return; }
        if (!isValidEmail(email)) { showModal('Please enter a valid email address.'); return; }
        if (!subject || subject === 'Select an inquiry subject') { showModal('Please Select an inquiry subject.'); return; }
        if (!mobile.trim()) { showModal('Please enter Valid Mobile Number.'); return; }
        if (!/^\d{1,15}$/.test(mobile.replace(/[\s\-+()]/g, ''))) { showModal('Please enter a valid mobile number.'); return; }
        if (!message.trim()) { showModal('Please enter your message.'); return; }

        sendToServer({
            name: name.trim(),
            company: subject,
            email: email,
            service: mobile.trim(),
            message: message.trim(),
            type: '3'
        }, 'Thank you for expressing interest in Ejense Technology. Our HR team will reach out to you shortly at the provided email. Thank you for choosing Ejense Technology.', clearContactForm);
    };

    // Character limit warning for message fields
    document.addEventListener('DOMContentLoaded', function () {
        var msg = document.getElementById('message');
        if (msg) {
            msg.addEventListener('input', function () {
                if (this.value.length >= 500) {
                    showModal('You have reached the maximum character limit (500).');
                }
            });
        }
    });

    // Legacy aliases for backward compatibility
    window.sendDataToServer = function () { validateForm(); };
    window.sendDataToServerData_signup = function () { validateAndSignUp(); };
    window.sendDataToServerContactus = function () { validateAndSubmitFormCONTACTUS(); };
    window.displayValidationModal = showModal;
    window.displayValidationModal_signup = showModal;
    window.displayValidationModal_contactus = showModal;

})();
