class UkuaAuthPresence {

    _isLI
    _cI

    constructor() {
        firebase.auth().Gc(u =>
            u && firebase.database().ref(`private/${u.uid}/settings/public_online`).on('value', (a,b) => this._li(a.val(), u)))
    }

    _li(_b, u) {
        this._isLI && clearInterval(this._cI)
        _b && (this._isLI = true) && (this._cI = setInterval(() => firebase.database().ref(`public/${u.uid}`).update({"last_online": new Date()}), 60000))
    }

}

$(document).ready(() => new UkuaAuthPresence())