document.addEventListener('DOMContentLoaded', (event) => {
    // Function to toggle the clicked class
    function toggleClickedClass(button) {
        button.classList.toggle('clicked');
    }

    // Handle heart button click
    const heartButtons = document.querySelectorAll('.heart-button');
    heartButtons.forEach(button => {
        button.addEventListener('click', () => {
            toggleClickedClass(button);
        });
    });

    // Handle trash button click
    const trashButtons = document.querySelectorAll('.trash-button');
    trashButtons.forEach(button => {
        button.addEventListener('click', () => {
            toggleClickedClass(button);
        });
    });

    // Handle decrease button click
    const decreaseButtons = document.querySelectorAll('.decrease-button');
    decreaseButtons.forEach(button => {
        button.addEventListener('click', () => {
            const quantityInput = button.nextElementSibling;
            if (quantityInput.value > 1) {
                quantityInput.value = parseInt(quantityInput.value) - 1;
            }
        });
    });

    // Handle increase button click
    const increaseButtons = document.querySelectorAll('.increase-button');
    increaseButtons.forEach(button => {
        button.addEventListener('click', () => {
            const quantityInput = button.previousElementSibling;
            quantityInput.value = parseInt(quantityInput.value) + 1;
        });
    });
});
