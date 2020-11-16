<?php
new UkuaPage(
    "Ukua | " . UkuaMessages::getMessage('Authentication', Ukua::getLang()),
    UkuaMessages::getMessage('Auth-desc', Ukua::getLang()),
    /** @lang HTML */ "<!--suppress HtmlFormInputWithoutLabel, HtmlUnknownTarget -->
<main class='page'>
    <section class='page-section'>
        <div class='container'>
            <div class='row d-flex justify-content-center align-items-center'>
                <div class='col-md-12 col-lg-5 col-xl-5 text-left'>
                    <form class='p-5' id='signIn' method='post'>
                        <h1 class='text-center'>Connexion</h1>
                        <div class='form-group'>
                            <label>
                                <i class='fa fa-envelope'></i>&nbsp;Adresse mail<span class='text-danger'>*</span>
                            </label>
                            <input autocomplete='off' class='form-control' inputmode='email' name='email' required
                                   type='email'>
                        </div>
                        <div class='form-group'>
                            <label>
                                <i class='fa fa-lock'></i>&nbsp;Mot de passe<span class='text-danger'>*</span>
                            </label>
                            <input autocomplete='off' class='form-control' maxlength='32' minlength='8' name='password'
                                   pattern='^(?=.*[A-Za-z])(?=.*\d)(?=.*[@$!%*#?&])[A-Za-z\d@$!%*#?&]{8,32}$'
                                   required type='password'>
                            <div class='form-tooltips'>
                                <ul class='list-unstyled border rounded shadow-sm p-1'>
                                    <li>
                                        Au moins un chiffre <strong>[0-9]</strong>
                                    </li>
                                    <li>
                                        Au moins un caractère minuscule <strong>[a-z]</strong>
                                    </li>
                                    <li>
                                        Au moins un caractère majuscule <strong>[A-Z]</strong>
                                    </li>
                                    <li class='li-sm'>
                                        Au moins un caractère spécial
                                        <strong>[*.!@#$%^&amp;(){}[]:;&lt;&gt;,.?/~_+-=|\]</strong>
                                    </li>
                                    <li>
                                        Au moins <strong>8</strong> caractères, mais pas plus de <strong>32</strong>.
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class='form-group'>
                            <small class='form-check text-center'>
                                <input name='remember_me' type='checkbox' class='form-check-input'>
                                <label class='form-check-label'>&nbsp;Se souvenir de moi?</label>
                            </small>
                        </div>
                        <div class='form-event'>
                            <ul class='list-unstyled border rounded shadow-sm p-2'>
                                <li class='text-center' id='signInText'>
                                    <span class='spinner-grow spinner-grow-sm' role='status'></span>
                                </li>
                            </ul>
                        </div>
                        <div class='form-group'>
                            <button class='btn ukua-btn btn-block' data-bs-hover-animate='pulse' type='submit'>
                                Se connecter
                            </button>
                            <small class='form-text text-center'>
                                <a href='/forgot'>Mot de passe oublié?</a>
                            </small>
                        </div>
                    </form>
                </div>
                <div class='col-lg-1 d-flex justify-content-center align-items-center or'>
                    <p>Ou</p>
                </div>
                <div class='col-md-12 col-lg-5 col-xl-5 text-left'>
                    <form class='p-5' id='signUp' method='post'>
                        <h1 class='text-center'>Inscription</h1>
                        <div class='form-group'>
                            <label>
                                <i class='fa fa-envelope'></i>&nbsp;Adresse mail<span class='text-danger'>*</span>
                            </label>
                            <input autocomplete='off' class='form-control' inputmode='email' name='email' required
                                   type='email'>
                        </div>
                        <div class='form-group'>
                            <label>
                                <i class='fa fa-tag'></i>&nbsp;Nom d'utilisateur<span class='text-danger'>*</span>
                            </label>
                            <div class='input-group'>
                                <div class='input-group-prepend'>
                                    <span class='input-group-text'>@</span>
                                </div>
                                <input autocomplete='off' class='form-control' maxlength='16' minlength='3'
                                       name='pseudo'
                                       pattern='^([a-zA-Z_.0-9]){3,16}$' required type='text'/>
                                <div class='form-tooltips'>
                                    <ul class='list-unstyled border rounded shadow-sm p-1'>
                                        <li>
                                            Doit-être composer de chiffre <strong>[0-9]</strong>
                                        </li>
                                        <li>
                                            Doit-être composer de minuscule ou majuscule <strong>[a-Z]</strong>
                                        </li>
                                        <li>
                                            Ne dois pas contenir de caractère spécial sauf <strong>[._]</strong>.
                                        </li>
                                        <li>
                                            Au moins <strong>3</strong> caractères, mais pas plus de <strong>16</strong>.
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class='form-group'>
                            <label>
                                <i class='fa fa-lock'></i>&nbsp;Mot de passe<span class='text-danger'>*</span>
                            </label>
                            <input autocomplete='off' class='form-control' maxlength='32' minlength='8' name='password'
                                   pattern='^(?=.*[A-Za-z])(?=.*\d)(?=.*[@$!%*#?&])[A-Za-z\d@$!%*#?&]{8,32}$'
                                   required type='password'>
                            <div class='form-tooltips'>
                                <ul class='list-unstyled border rounded shadow-sm p-1'>
                                    <li>
                                        Au moins un chiffre <strong>[0-9]</strong>
                                    </li>
                                    <li>
                                        Au moins un caractère minuscule <strong>[a-z]</strong>
                                    </li>
                                    <li>
                                        Au moins un caractère majuscule <strong>[A-Z]</strong>
                                    </li>
                                    <li class='li-sm'>
                                        Au moins un caractère spécial
                                        <strong>[*.!@#$%^&amp;(){}[]:;&lt;&gt;,.?/~_+-=|\]</strong>
                                    </li>
                                    <li>
                                        Au moins <strong>8</strong> caractères, mais pas plus de <strong>32</strong>.
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class='form-group'>
                            <label>
                                <i class='fa fa-lock'></i>&nbsp;Confirmation du mot de passe<span
                                    class='text-danger'>*</span>
                            </label>
                            <input autocomplete='off' class='form-control' name='c_password'
                                   pattern='^(?=.*[A-Za-z])(?=.*\d)(?=.*[@$!%*#?&])[A-Za-z\d@$!%*#?&]{8,32}$'
                                   required type='password'>
                            <div class='form-tooltips'>
                                <ul class='list-unstyled border rounded shadow-sm p-1'>
                                    <li>
                                        Au moins un chiffre <strong>[0-9]</strong>
                                    </li>
                                    <li>
                                        Au moins un caractère minuscule <strong>[a-z]</strong>
                                    </li>
                                    <li>
                                        Au moins un caractère majuscule <strong>[A-Z]</strong>
                                    </li>
                                    <li class='li-sm'>
                                        Au moins un caractère spécial
                                        <strong>[*.!@#$%^&amp;(){}[]:;&lt;&gt;,.?/~_+-=|\]</strong>
                                    </li>
                                    <li>
                                        Au moins <strong>8</strong> caractères, mais pas plus de <strong>32</strong>.
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class='form-event'>
                            <ul class='list-unstyled border rounded shadow-sm p-2'>
                                <li class='text-center' id='signUpText'>
                                    <span class='spinner-grow spinner-grow-sm' role='status'></span>
                                </li>
                            </ul>
                        </div>
                        <div class='form-group'>
                            <button class='btn ukua-btn btn-block' data-bs-hover-animate='pulse' type='submit'>
                                S'inscrire
                            </button>
                            <small class='form-text'>
                                En cliquant sur ce bouton, vous accepter nos <a href='/legals'>Conditions
                                d'Utilisations</a>.
                            </small>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</main>",
    /** @lang JavaScript */ "$(document).ready(() => {
    firebase.auth().Gc(function (user) {
        if (user) window.location.replace('/profile')
    })
})

$('form#signIn').submit(function (event) {
    let loadingEvent = $('form#signIn .form-event')
    let loadingText = $('form#signIn .form-event #signInText')
    loadingEvent.removeClass('event-success event-error')
    loadingEvent.addClass('show')
    loadingText.html('<span class=\'spinner-grow spinner-grow-sm\' role=\'status\'></span>&nbsp;Chargement...')
    event.preventDefault()
    let values = $(this).serializeArray()
    let email = values[0]['value']
    let password = values[1]['value']
    let remember_me = values.length === 3
    firebase.auth().wb(remember_me ? firebase.auth.Auth.Persistence.qd : firebase.auth.Auth.Persistence.sd)
        .then(() => {
            firebase.auth().Tc(email, password)
                .then(function () {
                    loadingEvent.addClass('event-success')
                    loadingText.html('<span class=\'spinner-grow spinner-grow-sm\' role=\'status\'></span>&nbsp;Connexion avec succès, redirection dans quelques instants...')
                })
                .catch(function (error) {
                    loadingEvent.addClass('event-error')
                    loadingText.html('<span class=\'spinner-grow spinner-grow-sm\' role=\'status\'></span>&nbsp;Connexion échouée. (' + error.code + ')')
                })
        })
        .catch(function (error) {
            loadingEvent.addClass('event-error')
            loadingText.html('<span class=\'spinner-grow spinner-grow-sm\' role=\'status\'></span>&nbsp;Connexion échouée. (' + error.code + ')')
        })
})

$('form#signUp').submit(function (event) {
    let loadingEvent = $('form#signUp .form-event')
    let loadingText = $('form#signUp .form-event #signUpText')
    loadingEvent.removeClass('event-success event-error')
    loadingEvent.addClass('show')
    loadingText.html('<span class=\'spinner-grow spinner-grow-sm\' role=\'status\'></span>&nbsp;Chargement...')
    event.preventDefault()
    let values = $(this).serializeArray()
    let email = values[0]['value']
    let username = values[1]['value']
    let password = values[2]['value']
    let c_password = values[3]['value']
    if (password === c_password) {
        firebase.database().ref('users').once('value')
            .then(function (dataSnapshot) {
                if (!dataSnapshot.forEach(element => {
                    if (username === element.val().username)
                        return true
                }))
                    firebase.auth().wb(firebase.auth.Auth.Persistence.sd)
                        .then(() => {
                            firebase.auth().dc(email, password)
                                .then(function () {
                                    firebase.database().ref('users/' + firebase.auth().currentUser.uid).set({
                                        'uid': firebase.auth().currentUser.uid,
                                        'username': username
                                    })
                                    loadingEvent.addClass('event-success')
                                    loadingText.html('<span class=\'spinner-grow spinner-grow-sm\' role=\'status\'></span>&nbsp;Inscription avec succès, redirection dans quelques instants...')
                                })
                                .catch(function (error) {
                                    loadingEvent.addClass('event-error')
                                    loadingText.html('<span class=\'spinner-grow spinner-grow-sm\' role=\'status\'></span>&nbsp;Inscription échouée. (' + error.code + ')')
                                })
                        })
                        .catch(function (error) {
                            loadingEvent.addClass('event-error')
                            loadingText.html('<span class=\'spinner-grow spinner-grow-sm\' role=\'status\'></span>&nbsp;Inscription échouée. (' + error.code + ')')
                        })
                else {
                    loadingEvent.addClass('event-error')
                    loadingText.html('<span class=\'spinner-grow spinner-grow-sm\' role=\'status\'></span>&nbsp;Inscription échouée.<br/>Le nom d\'utilisateur est déjà pris.')
                }
            })
    } else {
        loadingEvent.addClass('event-error')
        loadingText.html('<span class=\'spinner-grow spinner-grow-sm\' role=\'status\'></span>&nbsp;Inscription échouée.<br/>Les mots de passe ne correspondent pas.')
    }
})"
);