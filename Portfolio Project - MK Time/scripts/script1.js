// Script for promo messages 
function Common() {
    let self = this;
    this.promoBar =
        {
            promoItems: null,
            currentItem: 0,
            numberOfItems: 0,
        };
		
    this.initialisePromo = function () {
        /* Get all items in promo bar */
        let promoItems = $("#promo > div");
        /* Set values */
        this.promoBar.promoItems = promoItems;
        this.promoBar.numberOfItems = promoItems.length;
        /* Initiate promo loop to show next item */
        this.startDelay();
    }
        this.startDelay = function () {
            /* Wait 4 seconds then show the next message */
            setTimeout(function () {
                self.showNextPromoItem()
            }, 3000);
    }
    this.showNextPromoItem = function () {
        /* Fade out the current item */
        $(self.promoBar.promoItems).fadeOut("slow").promise().done(function () {
            /* Increment current promo item counter */
            if (self.promoBar.currentItem >= (self.promoBar.numberOfItems - 1)) {
                /* Reset counter to zero */
                self.promoBar.currentItem = 0;
            } else {
                /* Increase counter by 1 */
                self.promoBar.currentItem++;
            }
            /* Fade in the next item */
            $(self.promoBar.promoItems).eq(self.promoBar.currentItem).fadeIn("slow", function () {
                /* Delay before showing next item */
                self.startDelay();
            });
        });
    }
}
$(document).ready(function () {
    app.common = new Common();
    app.common.initialisePromo();
});

// Script for product page - countdown timer for next day delivery 
document.addEventListener("DOMContentLoaded", function() {
    const countdownElement = document.getElementById('countdown');
    if (countdownElement) {
        // Set delivery deadline to today 3 PM
        const deliveryDeadline = new Date();
        deliveryDeadline.setHours(15, 0, 0, 0);

        // Check if current time is past the deadline
        const now = new Date();
        if (now.getTime() > deliveryDeadline.getTime()) {
            // If so, move deadline to the next day at 3 PM
            deliveryDeadline.setDate(deliveryDeadline.getDate() + 1);
        }

        // Function to update countdown display
        const updateCountdown = () => {
            const now = new Date();
            const timeRemaining = deliveryDeadline - now; // Calculate time remaining

            // Calculate hours, minutes, and seconds remaining
            const hours = Math.floor((timeRemaining % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            const minutes = Math.floor((timeRemaining % (1000 * 60 * 60)) / (1000 * 60));
            const seconds = Math.floor((timeRemaining % (1000 * 60)) / 1000);

            // Update countdown display based on remaining time
            if (timeRemaining > 0) {
                countdownElement.innerHTML = `Order within ${hours}h ${minutes}m ${seconds}s for next-day delivery!`;
            } else {
                countdownElement.innerHTML = "The deadline for next-day delivery has passed.";
            }
        };

        // Set interval to updates countdown every second
        setInterval(updateCountdown, 1000);
    } else {
        console.warn('Countdown element not found. Countdown script will not run.');
    }
});

// Script for added to cart notification 
document.addEventListener("DOMContentLoaded", function() {
    var notification = document.getElementById('notification');

    // Check if notification exists and is not empty
    if (notification && notification.innerHTML.trim() !== '') {
        // Show notification
        notification.style.display = 'block'; 
        
        // Wait for 3 seconds before starting to fade
        setTimeout(function() {
            notification.style.opacity = '0'; 
            
            // Wait for fade out transition to complete before hiding it
            setTimeout(function() {
                notification.style.visibility = 'hidden'; 
                notification.style.display = 'none';
            }, 1000); 
        }, 3000); // Keep visible for 3 seconds
    }
});