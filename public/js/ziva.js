function validateEmail(email) {
    const re = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    return re.test(email.toLowerCase());
}
document.addEventListener("DOMContentLoaded", function () {
    // Create mobile menu trigger if doesn't exist
    if (!document.querySelector(".mobile-menu-trigger")) {
        const trigger = document.createElement("div");
        trigger.className = "mobile-menu-trigger d-lg-none";
        trigger.innerHTML = '<i class="zmdi zmdi-menu"></i>';

        // Insert trigger in header
        const headerRow = document.querySelector(
            ".header-bottom .container .row"
        );
        if (headerRow) {
            const lastCol =
                headerRow.querySelector(".col-xs-9") ||
                headerRow.lastElementChild;
            lastCol.prepend(trigger);

            // Get dropdown reference
            const dropdown = document.getElementById("mobile-dropdown");
            const menuIcon = trigger.querySelector("i");

            // Toggle menu on click
            trigger.addEventListener("click", function (e) {
                e.stopPropagation();
                dropdown.classList.toggle("active");

                // Toggle between menu and close icons
                if (dropdown.classList.contains("active")) {
                    menuIcon.classList.remove("zmdi-menu");
                    menuIcon.classList.add("zmdi-close");
                } else {
                    menuIcon.classList.remove("zmdi-close");
                    menuIcon.classList.add("zmdi-menu");
                }
            });
        }
    }

    // Close menu when clicking outside
    document.addEventListener("click", function () {
        const dropdown = document.getElementById("mobile-dropdown");
        const trigger = document.querySelector(".mobile-menu-trigger");

        if (dropdown && dropdown.classList.contains("active")) {
            dropdown.classList.remove("active");
            if (trigger) {
                const menuIcon = trigger.querySelector("i");
                menuIcon.classList.remove("zmdi-close");
                menuIcon.classList.add("zmdi-menu");
            }
        }
    });

    // Prevent menu from closing when clicking inside
    document
        .getElementById("mobile-dropdown")
        ?.addEventListener("click", function (e) {
            e.stopPropagation();
        });

    // Immediately apply styles in case JS overrides them
    setTimeout(function () {
        const menuArea = document.querySelector(".mobile-menu-area");
        if (menuArea) {
            menuArea.style.backgroundColor = "#2a3b2c";
            menuArea.style.display = "block";
        }

        const dropdown = document.getElementById("mobile-dropdown");
        if (dropdown) {
            dropdown.style.backgroundColor = "#2a3b2c";
        }
    }, 100);
});

$(document).ready(function () {
    $(
        "#subscribe-to-newsletters, #subscribe-to-newsletters-from-blog-details"
    ).on("submit", function (event) {
        event.preventDefault(); // Prevent the form from submitting normally

        // Get the email input value
        const data = $(`#${event.target.getAttribute("id")}`).serializeArray();
        Swal.fire({
            title: "You are about to subscribe to our news letters, proceed?",
            icon: "info",
            showCancelButton: true,
            confirmButtonText: "Yes, Proceed",
            cancelButtonText: `No, Cancel`,
            reverseButtons: true,
        }).then((result) => {
            /* Read more about isConfirmed, isDenied below */
            if (result.isConfirmed) {
                $.ajax({
                    type: "POST",
                    url: "/subscribe-to-newsletters",
                    data: data,
                    success: function (response) {
                        Swal.close(); // Close the Swal loading dialog
                        if (response.success) {
                            Swal.fire({
                                icon: "success",
                                title: "Subscribed!",
                                text: "You have successfully subscribed to our newsletters.",
                            });
                        } else {
                            Swal.fire({
                                icon: "error",
                                title: "Error!",
                                text:
                                    response.message ||
                                    "An error occurred while subscribing.",
                            });
                        }
                    },
                    error: function (error) {
                        Swal.close(); // Close the Swal loading dialog
                        Swal.fire({
                            icon: "error",
                            title: "Oops...",
                            text: "Something went wrong! Please try again later.",
                        });
                    },
                    beforeSend: function () {
                        Swal.fire({
                            title: "Processing...",
                            text: "Please wait while we process your subscription.",
                            allowOutsideClick: false,
                            didOpen: () => {
                                Swal.showLoading();
                            },
                        });
                    },
                });
            }
        });
    });
});
// Contact form submission with validation and AJAX
$(document).ready(function () {
    $("#contact-form").on("submit", function (e) {
        e.preventDefault();

        // Get form fields
        const data = $(this).serializeArray();
        const name = data.find((field) => field.name === "name").value.trim();
        const email = data.find((field) => field.name === "email").value.trim();
        const message = data
            .find((field) => field.name === "message")
            .value.trim();
        const phone = data.find((field) => field.name === "phone").value.trim();

        // Validate fields
        if (!name || !email || !message) {
            Swal.fire({
                icon: "error",
                title: "Validation Error",
                text: "Please fill in all required fields: Name, Email, Phone, and Message.",
            });
            return;
        }

        if (phone && !/^\d+$/.test(phone)) {
            Swal.fire({
                icon: "error",
                title: "Validation Error",
                text: "Please enter a valid phone number.",
            });
            return;
        }

        if (!validateEmail(email)) {
            Swal.fire({
                icon: "error",
                title: "Validation Error",
                text: "Please enter a valid email address.",
            });
            return;
        }
        // Prepare data for submission
        // AJAX submission
        $.ajax({
            url: "/send-message",
            method: "POST",
            data: data,
            beforeSend: function () {
                Swal.fire({
                    title: "Sending...",
                    text: "Please wait while we send your message.",
                    allowOutsideClick: false,
                    didOpen: () => Swal.showLoading(),
                });
            },
            success: function (response) {
                if (response.success) {
                    Swal.fire({
                        icon: "success",
                        title: "Message Sent!",
                        text: "Your message has been sent successfully. We will get back to you soon.",
                    }).then(() => {
                        // Optionally reset the form
                        $("#contact-form")[0].reset();
                    });
                } else {
                    Swal.fire({
                        icon: "error",
                        title: "Error",
                        text:
                            response.message ||
                            "An error occurred while sending your message.",
                    });
                }
            },
            error: function (xhr) {
                let errorMsg = "Something went wrong. Please try again.";
                if (xhr.responseJSON?.message) {
                    errorMsg = xhr.responseJSON.message;
                }
                Swal.fire({
                    icon: "error",
                    title: "Error",
                    text: errorMsg,
                });
            },
            complete: function () {
                // Optionally do something after request completes
            },
        });
    });
});

//blog-comment-form
$(document).ready(function () {
    $("#blog-comment-form").on("submit", function (e) {
        e.preventDefault();

        // Get form fields
        const data = $(this).serializeArray();
        const name = data.find((field) => field.name === "name").value.trim();
        const email = data.find((field) => field.name === "email").value.trim();
        const message = data
            .find((field) => field.name === "comment")
            .value.trim();

        // Validate fields
        if (!name || !email || !message) {
            Swal.fire({
                icon: "error",
                title: "Validation Error",
                text: "Please fill in all required fields: Name, Email, and Message.",
            });
            return;
        }

        if (!validateEmail(email)) {
            Swal.fire({
                icon: "error",
                title: "Validation Error",
                text: "Please enter a valid email address.",
            });
            return;
        }

        // Prepare data for submission
        // AJAX submission
        $.ajax({
            url: "/blog/comment",
            method: "POST",
            data: data,
            beforeSend: function () {
                Swal.fire({
                    title: "Sending...",
                    text: "Please wait while we send your comment.",
                    allowOutsideClick: false,
                    didOpen: () => Swal.showLoading(),
                });
            },
            success: function (response) {
                if (response.success) {
                    Swal.fire({
                        icon: "success",
                        title: "Comment Posted!",
                        text: "Your comment has been posted successfully",
                    }).then(() => {
                        // Optionally reset the form
                        $("#blog-comment-form")[0].reset();
                        // reload the page to show the new comment
                        location.reload();
                    });
                } else {
                    Swal.fire({
                        icon: "error",
                        title: "Error",
                        text:
                            response.message ||
                            "An error occurred while posting your comment.",
                    });
                }
            },
            error: function (xhr) {
                let errorMsg = "Something went wrong. Please try again.";
                if (xhr.responseJSON?.message) {
                    errorMsg = xhr.responseJSON.message;
                }
                Swal.fire({
                    icon: "error",
                    title: "Error",
                    text: errorMsg,
                });
            },
        });
    });
});

// like-blog-post
$(document).ready(function () {
    $("#like-blog-post").on("click", function (e) {
        e.preventDefault();
        const blogPostId = $(this).data("blog-post-id");
        const blogLikeCount = $(this).data("blog-like-count");
        const _token = document
            .querySelector('meta[name="csrf-token"]')
            .getAttribute("content");
        const blogLikeCountElement = $("#blog-like-count");

        if (!blogPostId && !blogLikeCount && !_token) {
            Swal.fire({
                icon: "error",
                title: "Error",
                text: "Invalid blog post data.",
            });
            return;
        }
        // add like on the element for quick feedback
        $("#like-blog-post").data("blog-like-count", (blogLikeCount || 0) + 1);
        $.ajax({
            url: "/blog/like",
            method: "POST",
            data: {
                blog_post_id: blogPostId,
                _token: _token,
            },
            success: function (response) {
                Swal.close(); // Close the Swal loading dialog
                if (response.success) {
                    const newLikeCount = response.removed_like
                        ? blogLikeCount - 1
                        : blogLikeCount + 1;
                    blogLikeCountElement.text(newLikeCount);
                    $("#like-blog-post").data("blog-like-count", newLikeCount);
                    // animate / shake the like button
                    if (!response.removed_like) {
                        // change color to green
                        $(this).css("color", "green");
                    } else {
                        // change color to red
                        $(this).css("color", "red");
                    }
                }
            },
            error: function (xhr) {
                Swal.close(); // Close the Swal loading dialog
                let errorMsg = "Something went wrong. Please try again.";
                Swal.fire({
                    icon: "error",
                    title: "Error",
                    text: errorMsg,
                });
            },
        });
    });
});
const bookService = (serviceName, whatsappNumber) => {
    Swal.fire({
        title: `<h5>Book ${serviceName}</h5>`,
        html: `<style>
                    .form-label {
                        text-align: left !important;
                        display: block;
                    }
                </style>
                <hr/>
                <div class="text-muted mb-1">
                    Please fill in the details below to book the service.
                </div>
                <div class="mb-1">
                    <label for="swal-name" class="form-label">Full Name</label>
                    <input type="text" id="swal-name" class="form-control mb-2" placeholder="Full Name" autocomplete="off">
                </div>
                <div class="mb-1">
                    <div class="row">
                        <div class="col-md-6">
                            <label for="swal-phone" class="form-label">Phone Number</label>
                            <input type="tel" id="swal-phone" class="form-control mb-2" placeholder="Active phone number" autocomplete="off">
                        </div>
                        <div class="col-md-6">
                            <label for="swal-email" class="form-label">Email</label>
                            <input type="email" id="swal-email" class="form-control mb-2" placeholder="Active email address" autocomplete="off">
                        </div>
                    </div>
                </div>
                <div class="mb-1">
                    <div class="row">
                        <div class="col-md-6">
                            <label for="swal-date" class="form-label">Preferred Date</label>
                            <input type="date" id="swal-date" class="form-control mb-2" placeholder="Preferred Date" required>
                        </div>
                        <div class="col-md-6">
                            <label for="swal-time" class="form-label">Preferred Time</label>
                            <input type="time" id="swal-time" class="form-control mb-2" placeholder="Preferred Time">
                        </div>
                    <div>
                </div>
                <!-- Number of people -->
                <div class="mb-1">
                    <label for="swal-number-of-people" class="form-label">Number of People</label>
                    <input type="number" id="swal-number-of-people" class="form-control mb-2" placeholder="Number of People" min="1" value="1">
                </div>
                <!-- Message -->
                <div class="mb-1">
                    <label for="swal-message" class="form-label">Additional Message</label>
                    <textarea id="swal-message" class="form-control mb-2" placeholder="Any additional message or request"></textarea>
                </div>
            `,
        confirmButtonText: "Continue to Book",
        confirmButtonColor: "#253d2b",
        showCancelButton: true,
        focusConfirm: false,
        reverseButtons: true,
        preConfirm: () => {
            const name = document.getElementById("swal-name").value.trim();
            const email = document.getElementById("swal-email").value.trim();
            const phone = document.getElementById("swal-phone").value.trim();
            const date = document.getElementById("swal-date").value;
            //swal-time
            const time = document.getElementById("swal-time").value;
            const numberOfPeople = document.getElementById(
                "swal-number-of-people"
            ).value;
            const message = document
                .getElementById("swal-message")
                .value.trim();

            if (
                !name ||
                !email ||
                !phone ||
                !date ||
                !numberOfPeople ||
                !time
            ) {
                Swal.showValidationMessage("Please fill in all fields");
                return false;
            }

            return { name, email, phone, date, message, time, numberOfPeople };
        },
    }).then((result) => {
        if (result.isConfirmed) {
            const { name, email, phone, date, message, time, numberOfPeople } =
                result.value;
            let textMessage = `Hello, I would like to book for *${serviceName}*.\n\nName: ${name}\nEmail: ${email}\nPhone: ${phone}\nPreferred Date: ${date}\nPreferred Time: ${time}\nNumber of People: ${numberOfPeople}`;
            if (message) {
                textMessage += `\n\n ${message}`;
            }

            const encodedMessage = encodeURIComponent(textMessage);
            const formattedNumber = whatsappNumber.replace(/\D/g, "");
            const _token = document
                .querySelector('meta[name="csrf-token"]')
                .getAttribute("content");
            // send data to book-service first through AJAX
            const note = `Booking Request for ${serviceName}: ${message}, Number of People: ${numberOfPeople}`;
            $.ajax({
                type: "POST",
                url: "/book-service",
                data: {
                    service_id,
                    name,
                    email,
                    phone,
                    preferred_date: date,
                    note,
                    _token,
                    service_name: serviceName,
                    preferred_time: time,
                    number_of_people: numberOfPeople,
                },
                beforeSend: function () {
                    Swal.fire({
                        title: "Processing...",
                        text: "Please wait while we process your booking.",
                        allowOutsideClick: false,
                        didOpen: () => Swal.showLoading(),
                    });
                },
                success: function (response) {
                    Swal.close(); // Close the Swal loading dialog
                    if (response.success) {
                        Swal.fire({
                            icon: "success",
                            title: "Booking Successful!",
                            text: "Your booking request has been sent successfully. We will contact you soon.",
                        }).then(() => {
                            window.open(
                                `https://wa.me/${formattedNumber}?text=${encodedMessage}`,
                                "_blank"
                            );
                        });
                    } else {
                        Swal.fire({
                            icon: "error",
                            title: "Error!",
                            text:
                                response.message ||
                                "An error occurred while processing your booking.",
                        });
                    }
                },
                error: function (error) {
                    Swal.close(); // Close the Swal loading dialog
                    Swal.fire({
                        icon: "error",
                        text: "Something went wrong! Please try again later.",
                    });
                },
            });
        }
    });
};

const bookServiceFromDetails = (serviceName, whatsappNumber) => {
    Swal.fire({
        html: `You are about to book the service: <strong>${serviceName}</strong>. Book Now?`,
        confirmButtonText: "Yes, Book Now",
        confirmButtonColor: "#253d2b",
        showCancelButton: true,
        focusConfirm: false,
        reverseButtons: true,
        icon: "info",
    }).then((result) => {
        if (result.isConfirmed) {
            const formData = $("#book-service-form").serializeArray();
            const {
                name,
                email,
                phone,
                preferred_date,
                message,
                preferred_time,
                number_of_people,
                service_id,
                _token,
            } = formData.reduce((acc, field) => {
                acc[field.name] = field.value.trim();
                return acc;
            }, {});

            if (
                !name ||
                !email ||
                !phone ||
                !preferred_date ||
                !number_of_people
            ) {
                Swal.fire({
                    icon: "error",
                    title: "Validation Error",
                    text: "Please fill in all required fields: Name, Email, Phone, Preferred Date, Preferred Time, and Number of People.",
                });
                return;
            }

            let textMessage = `Hello, I would like to book for *${serviceName}*.\n\nName: ${name}\nEmail: ${email}\nPhone: ${phone}\nPreferred Date: ${preferred_date}\nPreferred Time: ${preferred_time}\nNumber of People: ${number_of_people}`;
            if (message) {
                textMessage += `\n\n ${message}`;
            }

            const encodedMessage = encodeURIComponent(textMessage);
            const formattedNumber = whatsappNumber.replace(/\D/g, "");
            // send data to book-service first through AJAX
            const note = `Booking Request for ${serviceName}: ${message}, Number of People: ${number_of_people}`;
            $.ajax({
                type: "POST",
                url: "/book-service",
                data: {
                    service_id,
                    name,
                    email,
                    phone,
                    preferred_date,
                    note,
                    _token,
                    service_name: serviceName,
                    preferred_time,
                    number_of_people,
                },
                beforeSend: function () {
                    Swal.fire({
                        title: "Booking...",
                        text: "Please wait while we process your booking.",
                        allowOutsideClick: false,
                        didOpen: () => Swal.showLoading(),
                    });
                },
                success: function (response) {
                    Swal.close(); // Close the Swal loading dialog
                    if (response.success) {
                        Swal.fire({
                            icon: "success",
                            title: "Booking Successful!",
                            text: "Your booking request has been sent successfully. We will contact you soon.",
                        }).then(() => {
                            // reset the form
                            $("#book-service-form")[0].reset();
                            window.open(
                                `https://wa.me/${formattedNumber}?text=${encodedMessage}`,
                                "_blank"
                            );
                        });
                    } else {
                        Swal.fire({
                            icon: "error",
                            title: "Error!",
                            text:
                                response.message ||
                                "An error occurred while processing your booking.",
                        });
                    }
                },
                error: function (error) {
                    Swal.close(); // Close the Swal loading dialog
                    Swal.fire({
                        icon: "error",
                        text: "Something went wrong! Please try again later.",
                    });
                },
            });
        }
    });
};
const openWhatsApp = (whatsappNumber) => {
    Swal.fire({
        title: "Contact Us on WhatsApp",
        text: "Click the button below to chat with us on WhatsApp.",
        icon: "info",
        confirmButtonText: "Chat on WhatsApp",
        showCancelButton: true,
        cancelButtonText: "Cancel",
        reverseButtons: true,
    }).then((result) => {
        if (result.isConfirmed) {
            const formattedNumber = whatsappNumber.replace(/\D/g, "");
            const message = "Hello, I would like to get in touch with you.";
            const whatsappURL = `https://wa.me/${formattedNumber}?text=${encodeURIComponent(
                message
            )}`;
            window.open(whatsappURL, "_blank");
        }
    });
};

const replyComment = (userName) => {
    const commentInput = document.getElementsByName("comment")[0];
    if (commentInput) {
        commentInput.value = `@${userName}, `;
        console.log(`Replying to ${userName}`);
        commentInput.focus();
    }
};
