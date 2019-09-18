// Your web app's Firebase configuration
var firebaseConfig = {
    apiKey: "AIzaSyBSnyvd7oeATPvwQ4qN9SIJlTqLu0r0lrc",
    authDomain: "danasyariahmotor-7d5fa.firebaseapp.com",
    databaseURL: "https://danasyariahmotor-7d5fa.firebaseio.com",
    projectId: "danasyariahmotor-7d5fa",
    storageBucket: "danasyariahmotor-7d5fa.appspot.com",
    messagingSenderId: "780727453679",
    appId: "1:780727453679:web:26a45203b939207d"
};
// Initialize Firebase
firebase.initializeApp(firebaseConfig);

var messaging = firebase.messaging();
messaging.usePublicVapidKey("BCsvwDcwJYLc0IgS39hKO6Tr9WVtWasFqarVMosCP4ViTodcDRDKQc9-A4Rma3Bk2LhyVXtJNOZkoc6dPQH6cxQ");

function sendTokenToServer(currentToken){
    console.log('sendTokenToServer', currentToken);
    $.ajax({
        type: 'POST',
        url: base_url + '/firebase/user/send_token_to_server',
        data: {
            token: currentToken
        },
        success: function(response){
            console.log(response);
        }
    });
}

function updateUIForPushEnabled(currentToken){
    console.log('updateUIForPushEnabled', currentToken)
}

function updateUIForPushPermissionRequired(){
    console.log('updateUIForPushPermissionRequired')
}

function setTokenSentToServer(status){
    console.log('setTokenSentToServer', status)
}

function showToken(message, err){
    console.log('showToken', message, err)
}

messaging.requestPermission().then(function() {
    console.log('Notification permission granted.');
    // TODO(developer): Retrieve an Instance ID token for use with FCM.
    messaging.getToken().then(function(currentToken) {
        if (currentToken) {
            sendTokenToServer(currentToken);
            updateUIForPushEnabled(currentToken);
        } else {
            // Show permission request.
            console.log('No Instance ID token available. Request permission to generate one.');
            // Show permission UI.
            updateUIForPushPermissionRequired();
            setTokenSentToServer(false);
        }
    }).catch(function(err) {
        console.log('An error occurred while retrieving token. ', err);
        showToken('Error retrieving Instance ID token. ', err);
        setTokenSentToServer(false);
    });


    // Callback fired if Instance ID token is updated.
    messaging.onTokenRefresh(function() {
        messaging.getToken().then(function(refreshedToken) {
            console.log('Token refreshed.');
            // Indicate that the new Instance ID token has not yet been sent to the
            // app server.
            setTokenSentToServer(false);
            // Send Instance ID token to app server.
            sendTokenToServer(refreshedToken);
            // ...
        }).catch(function(err) {
            console.log('Unable to retrieve refreshed token ', err);
            showToken('Unable to retrieve refreshed token ', err);
        });
    });

}).catch(function(err) {
    console.log('Unable to get permission to notify.', err);
});


messaging.onMessage(function(payload) {
    console.log('Message received. ', payload);
});