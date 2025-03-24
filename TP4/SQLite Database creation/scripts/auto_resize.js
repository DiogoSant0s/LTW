document.addEventListener("DOMContentLoaded", function () {
    const textareas = document.querySelectorAll("textarea");

    textareas.forEach((textarea) => {
        // Adjust height on page load if the textarea already has content
        if (textarea.value.trim() !== "") {
            textarea.style.height = "auto"; // Reset height
            textarea.style.height = textarea.scrollHeight + "px"; // Set height based on content
        }

        // Adjust height dynamically as the user types
        textarea.addEventListener("input", function () {
            this.style.height = "auto"; // Reset height to calculate new height
            this.style.height = this.scrollHeight + "px"; // Set height based on content
        });
    });
});
