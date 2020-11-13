<?php
new UkuaPage(
    "Ukua | Logout",
    /** @lang HTML */ "",
    /** @lang JavaScript */ "$(document).ready(() => {
    firebase.auth().onAuthStateChanged(function (user) {
        if (user)
            firebase.auth().signOut().then(function () {
                // Sign-out successful.
            }).catch(function (error) {
                // An error happened.
            });
        window.location.replace('/')
    })
})");