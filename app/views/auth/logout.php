<?php
new UkuaPage(
    "Ukua | " . UkuaMessages::getMessage('Logout', Ukua::getLang()),
    UkuaMessages::getMessage('Logout-desc', Ukua::getLang()),
    /** @lang HTML */ "",
    /** @lang JavaScript */ "$(document).ready(() => {
    firebase.auth().Gc(function (user) {
        if (user)
            firebase.auth().zb().then(function () {
                // Sign-out successful.
            }).catch(function (error) {
                // An error happened.
            });
        window.location.replace('/')
    })
})");