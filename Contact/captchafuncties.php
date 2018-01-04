<?php
var allowSubmit = false;


function captcha_filled () {
    allowSubmit = true;
}


function captcha_expired () {
    allowSubmit = false;
}


function check_if_captcha_is_filled (e) {
    if(allowSubmit) return true;
    e.preventDefault();
    alert('Fill in the captcha!');
}
