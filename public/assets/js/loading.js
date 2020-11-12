$(document).ready(() => {

    firebase.auth().onAuthStateChanged(function (user) {

        $('#navLoading').remove()

        console.log(firebase.auth().currentUser)
        console.log(user)
        if (user) {

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
                "<img alt='X' class='rounded-circle' height='32' loading='lazy' src='" + (user.photoUrl != null ? user.photoUrl : "https://www.gravatar.com/avatar?s=128") + "' width='32'>" +
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

    try {
        firebase.database().ref().child('.info/connected').on('value', connectedSnap => $("#status").css('color', connectedSnap.val() === true ? '#3dcf00' : '#c80000'));
        firebase.database().ref().child('.info/connected').on('value', connectedSnap => {
            $("#authStatus").css('color', connectedSnap.val() === true ? '#3dcf00' : '#c80000');
            $("#dbStatus").css('color', connectedSnap.val() === true ? '#3dcf00' : '#c80000');
        });
    } catch (e) {
        $("#status").css('color', '#c80000')
    }
})