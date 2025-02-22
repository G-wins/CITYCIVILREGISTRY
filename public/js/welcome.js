// document.addEventListener("DOMContentLoaded", function () {
//     let lastScrollTop = window.scrollY;
//     const mainContent = document.querySelector(".mainContent");

//     window.addEventListener("scroll", function () {
//         let currentScroll = window.scrollY;
//         let screenHeight = window.innerHeight;
//         let mainContentTop = mainContent.offsetTop;

//         if (currentScroll < lastScrollTop - 10) { 
//             // scroll up
//             window.scrollTo({
//                 top: 0,
//                 behavior: "smooth"
//             });
//         } else if (currentScroll > lastScrollTop + 10) { 
//             // scroll down
//             window.scrollTo({
//                 top: mainContentTop,
//                 behavior: "smooth"
//             });
//         }

//         lastScrollTop = currentScroll;
//     });
// });

document.addEventListener("DOMContentLoaded", function () {
    const menuIcon = document.getElementById("menuIcon");
    const navMenu = document.getElementById("navMenu");

    // Toggle menu visibility smoothly
    menuIcon.addEventListener("click", function () {
        navMenu.classList.toggle("show");
    });

    // Close menu when clicking outside
    document.addEventListener("click", function (event) {
        if (!menuIcon.contains(event.target) && !navMenu.contains(event.target)) {
            navMenu.classList.remove("show");
        }
    });
});


// Modal and Button Elements
const proceedButton = document.getElementById("proceed-button");
const modal = document.getElementById("modal");
const closeModal = document.querySelector(".close");
const confirmProceed = document.getElementById("confirm-proceed");
const confirmRef = document.getElementById('confirm_reference');
const imageButton = document.getElementById("imgButton");
const imgModal = document.getElementById('imageModal');
const refNumberForm = document.getElementById('refNumberForm');

// Ensure modals are hidden initially
if (modal) modal.style.display = "none";
if (imgModal) imgModal.style.display = "none";

// Proceed Modal Logic
if (proceedButton) {
    proceedButton.onclick = function () {
        if (modal) modal.style.display = "flex";
    };
}

if (closeModal) {
    closeModal.onclick = function () {
        if (modal) modal.style.display = "none";
    };
}

if (confirmProceed) {
    confirmProceed.onclick = function () {
        const url = confirmProceed.getAttribute('data-url') || "{{ route('appointment.form') }}";
        window.location.href = url;
    };
}

// Click outside modal to close
window.onclick = function (event) {
    if (event.target === modal) {
        modal.style.display = "none";
    }
    if (event.target === imgModal) {
        imgModal.style.display = "none";
    }
};

// Image Modal Logic
if (imageButton) {
    imageButton.onclick = function () {
        if (imgModal) imgModal.style.display = "flex";
    };
}

if (document.getElementById('closeButton')) {
    document.getElementById('closeButton').addEventListener('click', function () {
        console.log('Modal close button clicked.');
        if (imgModal) imgModal.style.display = "none";
    });
}

// Prevent form submission if input is empty
if (refNumberForm) {
    refNumberForm.addEventListener('submit', function (event) {
        const refNumberInput = document.getElementById('refNumber');
        if (refNumberInput && refNumberInput.value.trim() === '') {
            event.preventDefault();
            alert('Please enter your reference number.');
        }
    });

    // Prevent Enter keypress if input is empty
    const refNumberInput = document.getElementById('refNumber');
    if (refNumberInput) {
        refNumberInput.addEventListener('keydown', function (event) {
            if (event.key === 'Enter' && this.value.trim() === '') {
                event.preventDefault();
                alert('Please enter your reference number.');
            }
        });
    }
}
