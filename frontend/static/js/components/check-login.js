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
        return true;
    } else {
        // User is not logged in, show login modal
        const modal = document.getElementById("login-modal");
        modal.classList.add("show");
        modal.style.display = "block";
        return false;
    }
}

export { checkLoggedIn };