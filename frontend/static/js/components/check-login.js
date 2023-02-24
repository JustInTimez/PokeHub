function checkLoggedIn() {
    const isLoggedIn = localStorage.getItem("isLoggedIn");

    if (isLoggedIn) {
        // User is logged in, do something
        // Remove overlay
        overlay.style.display = "none";

        // Close the modal
        const modal = document.querySelector('#login-modal');
        modal.classList.remove('show');
        modal.setAttribute('aria-hidden', 'true');
        modal.setAttribute('style', 'display: none');
        console.log("User is logged in.");

        // Update Menu for logged IN Trainer
        const loginState = document.getElementById('log-in-state');
        loginState.innerHTML = '<a href="#" onclick="logOut()">Log out</a>';

        // Attach click event listener to LogOut link
        const logInState = document.getElementById('log-in-state');
        logInState.addEventListener('click', logOut);

        return true;
    } else {
        // User is not logged in, show login modal
        const modal = document.getElementById("login-modal");
        modal.classList.add("show");
        modal.style.display = "block";

        // Update Menu for logged OUT Trainer
        loginState.innerHTML = '<a href="#">Log in</a>';

        return false;
    }
}

function logOut() {
    localStorage.removeItem('isLoggedIn');
    window.location.replace("index.html");
}

export { checkLoggedIn };