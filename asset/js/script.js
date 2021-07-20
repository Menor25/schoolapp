// Navigation on scroll
window.addEventListener("scroll", function(){
    const header = document.querySelector("header");
    header.classList.toggle('sticky', window.scrollY > 0);
});

//Mobile navigation
function toggleMenu() {


const openNav = document.querySelector(".open-btn");
const closeNav = document.querySelector(".close-btn");
const menu = document.querySelector(".nav-link");

const menuLeft = menu.getBoundingClientRect().left;

openNav.addEventListener("click", () => {
    if(menuLeft < 0) {
        menu.classList.add("show");
    }
});

closeNav.addEventListener("click", () => {
    if(menuLeft < 0) {
        menu.classList.remove("show");
    }
});

function toggleClose() {
    closeNav.addEventListener("click", () => {
        menu.classList.remove("show");
    });
}
};

//admission input validation
const form = document.getElementById('form');
const fullName = document.getElementById('fullName');
const dob = document.getElementById('dob');
const fatherName = document.getElementById('fatherName');
const gender = document.getElementById('gender');
const phoneNo = document.getElementById('phoneNo');
const address = document.getElementById('address');
const lga = document.getElementById('lga');
const state = document.getElementById('state');
const stusername = document.getElementById('stusername');
const stpassword = document.getElementById('stpassword');

//when the form is click
form.addEventListener('submit', (e) => {
    e.preventDefault()

    checkInputs();
    checkLogin();
});

function checkInputs() {
    //get the values from the inputs
    const fullNameValue = fullName.value;
    const dobValue = dob.value;
    const fatherNameValue = fatherName.value;
    const genderValue = gender.value;
    const phoneNoValue = phoneNo.value;
    const addressValue = address.value;
    const lgaValue = lga.value;
    const stateValue = state.value;

    if(fullNameValue === '') {
        //show error message (add error class)
        setErrorFor(fullName, 'Please fill in your full name');
    } else {
        //add success class
        setSuccessFor(fullName);
    };

    if(dobValue === '') {
        //show error message (add error class)
        setErrorFor(dob, 'Please select your date of birth');
    } else {
        //add success class
        setSuccessFor(dob);
    };

    if(fatherNameValue === '') {
        //show error message (add error class)
        setErrorFor(fatherName, 'Please fill in your father\'s name');
    } else {
        //add success class
        setSuccessFor(fatherName);
    };

    if(genderValue === '') {
        //show error message (add error class)
        setErrorFor(gender, 'Please select your gender');
    } else {
        //add success class
        setSuccessFor(gender);
    };

    if(phoneNoValue === '') {
        //show error message (add error class)
        setErrorFor(phoneNo, 'Please fill in your phone number');
    } else {
        //add success class
        setSuccessFor(phoneNo);
    };

    if(addressValue === '') {
        //show error message (add error class)
        setErrorFor(address, 'Please fill in your house address');
    } else {
        //add success class
        setSuccessFor(address);
    };

    if(lgaValue === '') {
        //show error message (add error class)
        setErrorFor(lga, 'Please fill in your LGA');
    } else {
        //add success class
        setSuccessFor(lga);
    };

    if(stateValue === '') {
        //show error message (add error class)
        setErrorFor(state, 'Please fill in your state of origin');
    } else {
        //add success class
        setSuccessFor(state);
    };
}

function checkLogin() {
    //get the values from the inputs
    const stusernameValue = stusername.value;
    const stpasswordValue = stpassword.value;
    const stpass = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}$/;

    if(stusernameValue === '') {
        //show error message (add error class)
        setErrorFor(stusername, 'Please fill in your username');
    } else {
        //add success class
        setSuccessFor(stusername);
    };

    if(stpasswordValue === '') {
        //show error message (add error class)
        setErrorFor(stpassword, 'Please fill in your password');
    } else if (stpasswordValue.match(stpass)) {
        //add success class
        setSuccessFor(stpassword);
    } else {
        
        setErrorFor(stpassword, 'Password must contain at least 8 char, 1 uppercase, 1 lowercase and number');
    };

}

function setErrorFor(input, message) {
    const inputBox = input.parentElement;
    const small = inputBox.querySelector('small');

    //add error message inside small
    small.innerText = message;

    //add error class
    inputBox.className = 'inputBox error';

}

function setSuccessFor(input) {
    const inputBox = input.parentElement;

    //add error class
    inputBox.className = 'inputBox success';
    
}

//AOS
!(function($) {
    "use strict";
    
    // Init AOS
    function aos_init() {
      AOS.init({
        duration: 1000,
        once: true
      });
    }
    $(window).on('load', function() {
      aos_init();
    });

    // Initiate venobox (lightbox feature used in portofilo)
    $(document).ready(function() {
        $('.venobox').venobox();
      });

    // Team carousel (uses the Owl Carousel library)
    // Team carousel (uses the Owl Carousel library)
  $(".team-carousel").owlCarousel({
    autoplay: true,
    dots: true,
    loop: true,
    responsive: {
      0: {
        items: 1
      },
      768: {
        items: 2
      },
      900: {
        items: 3
      }
    }
  });
  
  })(jQuery);

  /*==== Modal Script ======*/
  document.getElementById('login').addEventListener('click', function() {
      document.querySelector('.modal-bg').style.display = "flex";
  });

  document.querySelector('.close').addEventListener('click', function() {
    document.querySelector('.modal-bg').style.display = "none";
});

  
/*====== Back to top ======*/
var btn = $('#backTop');
$(window).scroll(function(){
    if($(window).scrollTop() > 300) {
        btn.addClass('show');
    } else {
        btn.removeClass('show');
    }
});

/*====== Slide ======*/
var slides = document.querySelectorAll('.slide');
var btns = document.querySelectorAll('.btn-control');
let currentSlide = 1;

// Script for image manual navigation
var manualNav = function(manual){
    slides.forEach((slide) => {
        slide.classList.remove('active');

        btns.forEach((btn) => {
            btn.classList.remove('active');
        });
    });

    slides[manual].classList.add('active');
    btns[manual].classList.add('active');
}

btns.forEach((btn, i) => {
    btn.addEventListener("click", () => {
        manualNav(i)
        currentSlide = i
    });
});

// Javascript for image slider autoplay navigation
var repeat = function(activeClass){
    let active = document.getElementsByClassName('active');
    let i = 1;

    var repeater = () => {
        setTimeout(function(){
            [...active].forEach((activeSlide) => {
                activeSlide.classList.remove('active');
            });

            slides[i].classList.add('active');
            btns[i].classList.add('active');
            i++

            if(slides.length == i){
                i = 0
            }
            if(i >= slides.length){
                return;
            }
            repeater();
        }, 10000);
    }
    repeater();
}
repeat();



