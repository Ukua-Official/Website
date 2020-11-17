class UkuaLoading {

    _pE
    _pTE
    _nL
    _b

    constructor() {
        firebase.auth().Gc(u => {
            if (this._b) window.location.replace('/auth')
            this._b = true
            this._nL = $('#navList')
            if (u) {
                this._pE = $('.page-event')
                this._pTE = $('.page-event #pageTextEvent')
                firebase.database().ref(`public/${u.uid}`).once('value')
                    .then(d => {
                        $('#navLoading').remove()
                        this._nL.append(
                            "<li class='navigation-item'><a class='navigation-link' href='/friends'><i class='fa fa-users'></i>&nbsp;Amis<span class='badge badge-pill badge-danger float-right notification' id='nav-friends'>?</span></a></li>" +
                            "<li class='navigation-item'><a class='navigation-link' href='/messages'><i class='fa fa-envelope-o'></i>&nbsp;Messages<span class='badge badge-pill badge-danger float-right notification' id='nav-messages'>?</span></a></li>" +
                            "<li class='navigation-item dropdown'><a class='dropdown-toggle navigation-link' data-toggle='dropdown'><img alt='X' class='rounded-circle' height='20' loading='lazy' src='" + (d.val().photoUrl ? unescape(d.val().photoUrl) : "https://www.gravatar.com/avatar?s=128") + "' width='20'>&nbsp;" + d.val().username + "</a>" +
                            "<div class='dropdown-menu border-0 p-0'>" +
                            "<div class='gradient item-1'><a class='dropdown-item' href='/auth/profile'><i class='fa fa-user'></i>&nbsp;Profile</a></div>" +
                            "<div class='gradient item-2'><a class='dropdown-item' href='/auth/settings'><i class='fa fa-gear'></i>&nbsp;Paramètres</a></div>" +
                            "<div class='gradient item-3'><a class='dropdown-item' href='/logout'><i class='fa fa-sign-out'></i>&nbsp;Se deconnecter</a></div>" +
                            "</div>" +
                            "</li>");
                    })
                    .catch(e => {
                        this._pE.addClass('show')
                        this._pTE.append('<h3 class="p-1">Impossible de charger la page. (' + e.toString() + ')</h3>')
                    })
            } else {
                $('#navLoading').remove()
                this._nL.append("<li class='navigation-item'><a class='navigation-link' href='/auth'><i class='fa fa-sign-in'></i>&nbsp;Se connecter</a></li>")
            }
            $('main.page').addClass('show')
        })

        try {
            firebase.database().ref().child(".info/connected").on("value", a => $("#status").css("color", true === a.val() ? "#3dcf00" : "#c80000"))
        } catch (a) {
            $("#status").css("color", "#c80000")
        }
    }
}

$(document).ready(() => new UkuaLoading())