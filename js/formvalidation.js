// Common validation functions
const showError = (input, message) => {
    const formControl = input.parentElement;
    const errorMessage = formControl.querySelector('.error-message') || document.createElement('small');
    errorMessage.className = 'error-message';
    errorMessage.style.color = '#e74c3c';
    errorMessage.textContent = message;
    if (!formControl.contains(errorMessage)) {  // Fix 1: Remove extra parenthesis
        formControl.appendChild(errorMessage);
    }
    input.classList.add('error-border');
};

const clearErrors = () => {
    document.querySelectorAll('.error-message').forEach(el => el.remove());
    document.querySelectorAll('.error-border').forEach(el => el.classList.remove('error-border'));
};  // Fix 2: Remove extra parenthesis

// Signup Validation
if (document.getElementById('signupForm')) {
    document.getElementById('signupForm').addEventListener('submit', (e) => {
        e.preventDefault();
        clearErrors();

        const password = document.getElementById('password');
        const confirmPassword = document.getElementById('confirmPassword');

        // Password validation
        if (password.value === '') {
            showError(password, 'Password is required');
            isValid = false;
        } else if (password.value.length < 8) {
            showError(password, 'Password must be at least 8 characters');
            isValid = false;
        } else if (!/[A-Z]/.test(password.value)) {  // Fix 3: Remove extra parenthesis
            showError(password, 'Password must contain at least one uppercase letter');
            isValid = false;
        }

        // Confirm Password validation
        if (confirmPassword.value === '') {
            showError(confirmPassword, 'Please confirm your password');
            isValid = false;
        } else if (password.value !== confirmPassword.value) {  // Fix 4: Remove extra parenthesis
            showError(confirmPassword, 'Passwords do not match');
            isValid = false;
        }
    });
}
// Signin Validation
if (document.getElementById('signinForm')) {
    document.getElementById('signinForm').addEventListener('submit', (e) => {
        e.preventDefault();
        clearErrors();

        const email = document.getElementById('loginEmail');
        const password = document.getElementById('loginPassword');

        let isValid = true;

        // Email validation
        if (email.value.trim() === '') {
            showError(email, 'Email is required');
            isValid = false;
        } else if (!isValidEmail(email.value)) {
            showError(email, 'Invalid email format');
            isValid = false;
        }

        // Password validation
        if (password.value === '') {
            showError(password, 'Password is required');
            isValid = false;
        }

        if (isValid) {
            e.target.submit();
        }
    });
}