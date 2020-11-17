<?php
new UkuaPage(
    "Ukua",
    UkuaMessages::getMessage('Ukua-is', Ukua::getLang()),
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
    firebase.auth().Gc(function (user) {
        window.location.replace(user ? '/profile' : '/auth')
    })
})"
);