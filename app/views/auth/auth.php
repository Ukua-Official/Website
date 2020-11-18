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
                                   pattern='^(?=.*[A-Za-z])(?=.*\d)(?=.*[@$!%*#?&])[A-Za-z\d@$!%*#?&]{7,32}$'
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
                                   pattern='^(?=.*[A-Za-z])(?=.*\d)(?=.*[@$!%*#?&])[A-Za-z\d@$!%*#?&]{7,32}$'
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
    /** @lang JavaScript */ "class UkuaAuth {

    _sIfE
    _sIfTE
    _sUfE
    _sUfTE
    _fSi
    _fSu
    _isLT
    _cT

    constructor() {
        firebase.auth().Gc(u => {
            if (u) window.location.replace('/profile')
            else {
                this._sIfE = $('form#signIn .form-event')
                this._sIfTE = $('form#signIn .form-event #signInText')
                this._sUfE = $('form#signUp .form-event')
                this._sUfTE = $('form#signUp .form-event #signUpText')
                this._fSi = $('form#signIn')
                this._fSu = $('form#signUp')

                this._fSi.submit(e => {
                    e.preventDefault()
                    this._sIfE.removeClass('event-success event-error')
                    this._sIfE.addClass('show')
                    this._cefs(null, null, this._sIfTE, 'Chargement...')
                    let _v = this._fSi.serializeArray(), _e = _v[0]['value'], _p = _v[1]['value'], _r = _v.length === 3
                    firebase.auth().wb(_r ? firebase.auth.Auth.Persistence.qd : firebase.auth.Auth.Persistence.sd)
                        .then(() => firebase.auth().Tc(_e, _p)
                            .then(() => this._cefs('event-success', this._sIfE, this._sIfTE, 'Connexion avec succès, redirection dans quelques instants...'))
                            .catch(e => this._cefs('event-error', this._sIfE, this._sIfTE, 'Connexion échouée. (' + e.code + ')')))
                        .catch(e => this._cefs('event-error', this._sIfE, this._sIfTE, 'Connexion échouée. (' + e.code + ')'))
                    this._lt(this._sIfE)
                })

                this._fSu.submit(e => {
                    e.preventDefault()
                    this._sUfE.removeClass('event-success event-error')
                    this._sUfE.addClass('show')
                    this._cefs(null, null, this._sUfTE, 'Chargement...')
                    let _v = this._fSu.serializeArray(), _e = _v[0]['value'], _u = _v[1]['value'], _p = _v[2]['value'],
                        _pc = _v[3]['value']
                    _p === _pc ?
                        firebase.database().ref('users').orderByChild('username').equalTo(_u).once('value')
                            .then(a => a.exists() ?
                                this._cefs('event-error', this._sUfE, this._sUfTE, 'Inscription échouée. (auth/username-already-in-use)') :
                                firebase.auth().wb(firebase.auth.Auth.Persistence.sd)
                                    .then(() => firebase.auth().dc(_e, _p)
                                        .then(() => firebase.database().ref('users/' + firebase.auth().currentUser.uid + '/username').set(_u)
                                            .then(() => firebase.database().ref('users/' + firebase.auth().currentUser.uid + '/created')
                                                .set(new Date().toString())
                                                .then(() => this._cefs('event-success', this._sUfE, this._sUfTE, 'Inscription avec succès, redirection dans quelques instants...'))
                                                .catch(e => this._cefs('event-warning', this._sUfE, this._sUfTE, 'Inscription imcomplète. (' + e.code + ')')))
                                            .catch(e => this._cefs('event-warning', this._sUfE, this._sUfTE, 'Inscription imcomplète. (' + e.code + ')')))
                                        .catch(e => this._cefs('event-error', this._sUfE, this._sUfTE, 'Inscription échouée. (' + e.code + ')')))
                                    .catch(e => this._cefs('event-error', this._sUfE, this._sUfTE, 'Inscription échouée. (' + e.code + ')')))
                            .catch(e => this._cefs('event-error', this._sUfE, this._sUfTE, 'Inscription échouée. (' + e.code + ')')) :
                        this._cefs('event-error', this._sUfE, this._sUfTE, 'Inscription échouée. (auth/password-does-not-match)')
                    this._lt(this._sUfE)
                })
            }
        })
    }

    _cefs(c, e, t, s) {
        c && e.addClass(c)
        t.html('<span class=\'spinner-grow spinner-grow-sm\' role=\'status\'></span>&nbsp;' + s)
        return true
    }

    _lt(e) {
        this._isLT && clearTimeout(this._cT)
        this._isLT = true
        this._cT = setTimeout(() => e.removeClass('show'), 3e3)
        return true
    }

}

$(document).ready(() => new UkuaAuth())"
);