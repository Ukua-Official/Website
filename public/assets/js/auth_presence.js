class UkuaAuthPresence {

    _cI

    constructor() {
        firebase.auth().Gc(u =>
            u && firebase.database().ref(`private/${u.uid}/settings/public_online`).on('value', (a,b) => this._li(a.val(), u)))
    }

    _li(_b, u) {
        !_b && this._cI && clearInterval(this._cI)
        !_b && firebase.database().ref(`public/${u.uid}`).update({"last_online": null})
        _b && (this._cI = setInterval(() => firebase.database().ref(`public/${u.uid}`).update({"last_online": new Date()}), 60000))
    }

}

$(document).ready(() => new UkuaAuthPresence())