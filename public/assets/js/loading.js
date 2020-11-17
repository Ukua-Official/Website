class UkuaLoading {

    _pE
    _pTE
    _nL
    _b

    constructor() {
        firebase.auth().Gc(u => {
            if (this._b) window.location.replace('/auth')
            this._b = true
            this._pE = $('.page-event')
            this._pTE = $('.page-event #pageTextEvent')
            this._nL = $('#navList')
            $('#navLoading').remove()
            if (u) {
                firebase.database().ref(`public/${u.uid}`).once('value')
                    .then(() => {

                    })
                    .catch(e => {
                        this._pE.addClass('show')
                        this._pTE.append('<h3 class="p-1">Impossible de charger la page. (' + e.toString() + ')</h3>')
                    })
            } else this._nL.append("<li class='navigation-item'><a class='navigation-link' href='/auth'><i class='fa fa-sign-in'></i>&nbsp;Se connecter</a></li>")
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

$(document).ready(() => {

    firebase.auth().Gc(function (user) {

        $('#navLoading').remove()

        if (user) {

            firebase.database().ref('users/' + user.uid + '/').once('value')
                .then(function (dataSnapshot) {

                    $('#navList').append(
                        "<li class='navigation-item'>" +
                        "<a class='navigation-link' href='/friends' id='nav-friends'>" +
                        "<i class='fa fa-users'></i>" +
                        "&nbsp;Amis" +
                        "<span class='badge badge-pill badge-danger float-right'>+1</span>" +
                        "</a>" +
                        "</li>" +
                        "<li class='navigation-item'>" +
                        "<a class='navigation-link' href='/messages' id='nav-messages'>" +
                        "<i class='fa fa-envelope-o'></i>" +
                        "&nbsp;Messages" +
                        "<span class='badge badge-pill badge-danger float-right'>+1</span>" +
                        "</a>" +
                        "</li>" +
                        "<li class='navigation-item dropdown'>" +
                        "<a class='dropdown-toggle navigation-link' data-toggle='dropdown'>" +
                        "<img alt='X' class='rounded-circle' height='32' loading='lazy' src='" + (dataSnapshot.val().photoUrl ? dataSnapshot.val().photoUrl : "https://www.gravatar.com/avatar?s=128") + "' width='32'>" +
                        "</a>" +
                        "<div class='dropdown-menu border-0 p-0'>" +
                        "<div class='gradient item-1'>" +
                        "<a class='dropdown-item' href='/profile'>" +
                        "<i class='fa fa-user'></i>" +
                        "&nbsp;Profile" +
                        "</a>" +
                        "</div>" +
                        "<div class='gradient item-2'>" +
                        "<a class='dropdown-item' href='/settings'>" +
                        "<i class='fa fa-gear'></i>" +
                        "&nbsp;Paramètres" +
                        "</a>" +
                        "</div>" +
                        "<div class='gradient item-3'>" +
                        "<a class='dropdown-item' href='/logout'>" +
                        "<i class='fa fa-sign-out'></i>" +
                        "&nbsp;Se deconnecter" +
                        "</a>" +
                        "</div>" +
                        "</div>" +
                        "</li>")

                })

        } else {

            $('#navList').append(
                "<li class='navigation-item'>" +
                "<a class='navigation-link' href='/sign'>" +
                "<i class='fa fa-sign-in'></i>" +
                "&nbsp;Se connecter" +
                "</a>" +
                "</li>")

        }
    })
})