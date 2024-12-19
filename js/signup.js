document.addEventListener('DOMContentLoaded', function() {
    const signupDiv = document.querySelector('.signup');
    const loginDiv = document.querySelector('.login');
    const toggleBtns = document.querySelectorAll('.toggle-btn');
    const formTitle = document.querySelector('.form-title');

    // Initially show signup form
    signupDiv.classList.add('active');

    toggleBtns.forEach(btn => {
        btn.addEventListener('click', function(e) {
            e.preventDefault();
            
            if (signupDiv.classList.contains('active')) {
                // Switch to login (signup exits left, login enters from right)
                signupDiv.classList.add('inactive');
                signupDiv.classList.remove('active');
                
                setTimeout(() => {
                    signupDiv.classList.remove('inactive');
                    loginDiv.classList.add('active');
                    formTitle.textContent = 'Login';
                }, 500);
            } else {
                // Switch to signup (login exits right, signup enters from left)
                loginDiv.classList.add('inactive');
                loginDiv.classList.remove('active');
                
                setTimeout(() => {
                    loginDiv.classList.remove('inactive');
                    signupDiv.classList.add('active');
                    formTitle.textContent = 'Create Account';
                }, 500);
            }
        });
    });
}); 