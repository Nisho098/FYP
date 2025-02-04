document.addEventListener('DOMContentLoaded', function () {
    // Generic dropdown toggle functionality
    document.querySelectorAll('.dropdown-btn').forEach((dropdownBtn) => {
        dropdownBtn.addEventListener('click', function (e) {
            e.stopPropagation(); // Prevent closing the dropdown when clicking inside it
            const dropdownMenu = dropdownBtn.nextElementSibling;

            if (!dropdownMenu) {
                console.error("Dropdown menu not found for the button.");
                return;
            }

            // Close any open dropdowns
            document.querySelectorAll('.dropdown-menu').forEach((menu) => {
                if (menu !== dropdownMenu) menu.style.display = 'none';
            });

            // Toggle visibility of the current dropdown
            dropdownMenu.style.display = dropdownMenu.style.display === 'block' ? 'none' : 'block';

            // Optional: Adjust position to avoid viewport overflow
            const dropdownRect = dropdownBtn.getBoundingClientRect();
            const dropdownWidth = dropdownMenu.offsetWidth;

            if (dropdownRect.right + dropdownWidth > window.innerWidth) {
                dropdownMenu.style.left = `-${dropdownWidth + 10}px`; // Shift dropdown to the left
            } else {
                dropdownMenu.style.left = `${dropdownRect.width + 10}px`; // Keep dropdown on the right
            }
        });
    });

    // Close all dropdowns when clicking outside
    document.addEventListener('click', function () {
        document.querySelectorAll('.dropdown-menu').forEach((menu) => {
            menu.style.display = 'none';
        });
    });

    // Specific event for the "View Details" button
    document.querySelectorAll('.details-btn').forEach((detailsBtn) => {
        detailsBtn.addEventListener('click', function () {
            alert('Job details coming soon...');
        });
    });
});
