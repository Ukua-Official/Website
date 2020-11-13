<?php
new UkuaPage(
    "Ukua",
    /** @lang HTML */ "<main class='page'>
    <section class='page-section'>
        <div class='container'>
            <div class='page-title strong'>
                <p>Home</p>
            </div>
        </div>
    </section>
</main>",
    /** @lang JavaScript */ "$(document).ready(() => {
    firebase.auth().onAuthStateChanged(function (user) {
        window.location.replace(user ? '/profile' : '/auth/sign')
    })
})"
);