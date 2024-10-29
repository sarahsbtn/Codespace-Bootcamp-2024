// Script for search box underline to remain when box open
document.addEventListener("DOMContentLoaded", function() {
    const searchDropdown = document.getElementById('searchDropdown');
    if (searchDropdown) {
        function toggleSearchActive() {
            searchDropdown.classList.toggle('active');
        }
    } else {
        console.warn('Search dropdown element not found. Search script will not run.');
    }
});

// Script for product page - countdown timer for next day delivery 
document.addEventListener("DOMContentLoaded", function() {
    const countdownElement = document.getElementById('countdown');
    if (countdownElement) {
        // Set the delivery deadline to today 3 PM
        const deliveryDeadline = new Date();
        deliveryDeadline.setHours(15, 0, 0, 0);

        // Check if the current time is past the deadline
        const now = new Date();
        if (now.getTime() > deliveryDeadline.getTime()) {
            // If so, move the deadline to the next day at 3 PM
            deliveryDeadline.setDate(deliveryDeadline.getDate() + 1);
        }

        // Function to update the countdown display
        const updateCountdown = () => {
            const now = new Date();
            const timeRemaining = deliveryDeadline - now; // Calculate time remaining

            // Calculate hours, minutes, and seconds remaining
            const hours = Math.floor((timeRemaining % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            const minutes = Math.floor((timeRemaining % (1000 * 60 * 60)) / (1000 * 60));
            const seconds = Math.floor((timeRemaining % (1000 * 60)) / 1000);

            // Update the countdown display based on remaining time
            if (timeRemaining > 0) {
                countdownElement.innerHTML = `Order within ${hours}h ${minutes}m ${seconds}s for next-day delivery!`;
            } else {
                countdownElement.innerHTML = "The deadline for next-day delivery has passed.";
            }
        };

        // Set an interval to update the countdown every second
        setInterval(updateCountdown, 1000);
    } else {
        console.warn('Countdown element not found. Countdown script will not run.');
    }
});

// Script for added to cart notification 
document.addEventListener("DOMContentLoaded", function() {
    var notification = document.getElementById('notification');

    // Check if the notification exists and is not empty
    if (notification && notification.innerHTML.trim() !== '') {
        // Show the notification
        notification.style.display = 'block'; // Make it visible
        
        // Wait for 3 seconds before starting to fade
        setTimeout(function() {
            notification.style.opacity = '0'; // Start fading out
            
            // Wait for the fade out transition to complete before hiding it
            setTimeout(function() {
                notification.style.visibility = 'hidden'; // Hide the box
                notification.style.display = 'none'; // Optional: Remove from layout
            }, 1000); // Match this to the CSS transition duration
        }, 3000); // Keep visible for 3 seconds
    }
});