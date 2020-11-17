class UkuaAuth {

    _sIfE
    _sIfTE
    _sUfE
    _sUfTE
    _fSi
    _isLT
    _cT

    constructor() {
        this._sIfE = $('form#signIn .form-event')
        this._sIfTE = $('form#signIn .form-event #signInText')
        this._sUfE = $('form#signUp .form-event')
        this._sUfTE = $('form#signUp .form-event #signUpText')
        this._fSi = $('form#signIn')

        firebase.auth().Gc(u => {
            if (u) window.location.replace('/profile')
        })

        this._fSi.submit(e => {
            e.preventDefault()
            this._sIfE.removeClass('event-success event-error')
            this._sIfE.addClass('show')
            this._cefs(null, null, this._sIfTE, 'Chargement...')
            let _v = this._fSi.serializeArray(), _e = _v[0]['value'], _p = _v[1]['value'], _r = _v.length === 3
            firebase.auth().wb(_r ? firebase.auth.Auth.Persistence.qd : firebase.auth.Auth.Persistence.sd)
                .then(() => {
                    firebase.auth().Tc(_e, _p)
                        .then(() => this._cefs('event-success', this._sIfE, this._sIfTE, 'Connexion avec succès, redirection dans quelques instants...'))
                        .catch(e => this._cefs('event-error', this._sIfE, this._sIfTE, 'Connexion échouée. (' + e.code + ')'))
                })
                .catch(e => this._cefs('event-error', this._sIfE, this._sIfTE, 'Connexion échouée. (' + e.code + ')'))
            this._lt(this._sIfE)
        })
    }

    _cefs(c, e, t, s) {
        c && e.addClass(c)
        t.html('<span class="spinner-grow spinner-grow-sm" role="status"></span>&nbsp;' + s)
        return true;
    }

    _lt(e) {
        this._isLT && clearTimeout(this._cT)
        this._isLT = true
        this._cT = setTimeout(() => e.removeClass("show"), 3e3)
        return true;
    }


}

$(document).ready(() => new UkuaAuth())

/*$('form#signIn').submit(function (event) {
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
})*/