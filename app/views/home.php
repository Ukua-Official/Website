<?php
new UkuaPage(
    "Ukua",
    "<main class='page'>
    <section class='page-section'>
        <div class='container'>
            <div class='page-title strong'>
                <p>Home</p>
            </div>
        </div>
    </section>
</main>",
    "$(document).ready(() => {
    window.location.replace(firebase.auth().currentUser ? '/profile' : '/auth/sign');
})"
);