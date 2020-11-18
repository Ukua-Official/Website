class UkuaAuth {

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
            if (u) console.log('go profile')//window.location.replace('/profile')
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
                        .then(() =>
                            firebase.auth().Tc(_e, _p)
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
                        firebase.database().ref(`users`).orderByChild("username").equalTo(_u).once('value')
                            .then(a => {
                                a.exists() ?
                                    this._cefs('event-error', this._sUfE, this._sUfTE, 'Inscription échouée. (auth/username-already-in-use)') :
                                    firebase.auth().wb(firebase.auth.Auth.Persistence.sd)
                                        .then(() =>
                                            firebase.auth().dc(_e, _p)
                                                .then(() => {
                                                    firebase.database().ref(`users/${firebase.auth().currentUser.uid}`).child('username').set(_u)
                                                        .then(() => firebase.database().ref(`users/${firebase.auth().currentUser.uid}`).child('created').set(new Date().toString())
                                                            .then(() => this._cefs('event-success', this._sUfE, this._sUfTE, 'Inscription avec succès, redirection dans quelques instants...'))
                                                            .catch(e => this._cefs('event-warning', this._sUfE, this._sUfTE, 'Inscription imcomplète. (' + e.code + ')')))
                                                        .catch(e => this._cefs('event-warning', this._sUfE, this._sUfTE, 'Inscription imcomplète. (' + e.code + ')'))
                                                })
                                                .catch(e => this._cefs('event-error', this._sUfE, this._sUfTE, 'Inscription échouée. (' + e.code + ')')))
                                        .catch(e => this._cefs('event-error', this._sUfE, this._sUfTE, 'Inscription échouée. (' + e.code + ')'));
                            })
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

$(document).ready(() => new UkuaAuth())

/*

 firebase.database().ref(`public`).once('value').then(a => {

a.forEach((k) => {console.log(k.key, k.val())})

 })


 firebase.database().ref('public/lCxsZYAfDXd1MrrMCRegg7AOBoJ2/last_online').once('value').then(a => console.log(new Date(a.val())))
 */