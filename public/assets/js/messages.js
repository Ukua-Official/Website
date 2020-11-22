class UkuaMessages {


    /*let c = {
        chats_private: {
            "uid1_uid2": {
                target_uid: '$tUid',
                messages: {
                    "Date": {
                        content: 'Coucou',
                        sent: 'Date',
                        received: 'Date',
                        read: 'Date'
                    }
                }
            }
        }
    }*/
    //check is friends
    //check confidentialité


    createChatPrivate(uid1, uid2) {
        let _uid1 = uid1 + '_' + uid2
        let _uid2 = uid2 + '_' + uid1
        let _uid1ref = firebase.database().ref('ukua/' + uid1 + '/chats_private/' + _uid1)
        let _uid2ref = firebase.database().ref('ukua/' + uid2 + '/chats_private/' + _uid2)
        _uid1ref.child('validation').set(true)
        _uid2ref.child('validation').set(true)
        let uid1ref = firebase.database().ref('chats_private/' + _uid1 + '/')
        let uid2ref = firebase.database().ref('chats_private/' + _uid2 + '/')
        uid1ref.child('target_uid').set(uid2)
        uid2ref.child('target_uid').set(uid1)
    }

}