document.addEventListener("DOMContentLoaded", function () {
    const notification = document.querySelector(".notification");
    if (notification) {
        // Hide the notification after 3 seconds
        setTimeout(() => {
            notification.classList.add("hide");
        }, 3000);

        // Remove the notification from the DOM after the transition
        notification.addEventListener("transitionend", () => {
            notification.remove();
        });
    }
});
