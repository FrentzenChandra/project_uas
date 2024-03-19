getCartCount();

$.ajaxSetup({
    complete: function () {
        getCartCount();
    },
});

function getCartCount() {
    $.ajax({
        method: "get",
        url: "/status",
        success: function (response) {
            document.querySelector(".wishlist-status").innerHTML =
                response.wishlist_count;
            document.querySelector(".cart-status").innerHTML =
                response.cart_count;
        },
    });
}

// Ini autoNumeric
const inputs = document.querySelectorAll(".autoNumeric");
for (let input of inputs) {
    let anElement = new AutoNumeric(input, {
        currencySymbol: "Rp.",
        allowDecimalPadding: false,
        digitGroupSeparator: " ",
    });
}

const inputPercents = document.querySelectorAll(".autoNumericPercentage");
for (let input of inputPercents) {
    let anElement = new AutoNumeric(
        input,
        AutoNumeric.getPredefinedOptions().percentageEU2decPos
    );
}

// Side button bar
const sideBarButton = document.querySelector("#iconNavbarSidenav");

sideBarButton.addEventListener("click", function () {
    document.querySelector("body").classList.toggle("g-sidenav-pinned");
});

$(document).ready(function () {
    var maxLength = 100;
    var moretxt = "...Read More";
    var lesstxt = "...Read Less";
    $(".countParawords").each(function () {
        var myStr = $(this).text();
        if ($.trim(myStr).length > maxLength) {
            var newStr = myStr.substring(0, maxLength);
            var removedStr = myStr.substring(maxLength, $.trim(myStr).length);
            $(this).empty().html(newStr);
            $(this).append('<span class="more-text">' + removedStr + "</span>");
            $(this).append(
                ' <a href="javascript:void(0);" class="read-more more">' +
                    moretxt +
                    "</a>"
            );
        }
    });
    $(".read-more").click(function () {
        if ($(this).hasClass("more")) {
            $(this).removeClass("more");
            $(this).text(lesstxt);
            $(this).siblings(".more-text").show();
        } else {
            $(this).addClass("more");
            $(this).text(moretxt);
            $(this).siblings(".more-text").hide();
        }
    });
});

// Input img
const chooseFile = document.getElementById("choose-file");
const imgPreview = document.getElementById("img-preview");

function getImgData() {
    const files = chooseFile.files[0];
    if (files) {
        const fileReader = new FileReader();
        fileReader.readAsDataURL(files);
        fileReader.addEventListener("load", function () {
            imgPreview2 = document.querySelector("#image-preview2");
            imgPreview.style.display = "block";
            imgPreview2.src = this.result;
        });
    }
}

chooseFile.addEventListener("change", function () {
    getImgData();
});

// Form validate

// Example starter JavaScript for disabling form submissions if there are invalid fields
(() => {
    "use strict";

    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    const forms = document.querySelectorAll(".needs-validation");

    // Loop over them and prevent submission
    Array.from(forms).forEach((form) => {
        form.addEventListener(
            "submit",
            (event) => {
                if (!form.checkValidity()) {
                    event.preventDefault();
                    event.stopPropagation();
                }

                form.classList.add("was-validated");
            },
            false
        );
    });
})();
