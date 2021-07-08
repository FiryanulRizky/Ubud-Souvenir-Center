importScripts('https://www.gstatic.com/firebasejs/8.6.3/firebase-app.js');
importScripts('https://www.gstatic.com/firebasejs/8.6.3/firebase-messaging.js');

var config = {
    apiKey: "AIzaSyB6iLyyomN8imw9UFEpLxE3eQFTDS7J4v4",
    authDomain: "ubud-souvenir-center-31b00.firebaseapp.com",
    databaseURL: "https://ubud-souvenir-center-31b00-default-rtdb.asia-southeast1.firebasedatabase.app",
    projectId: "ubud-souvenir-center-31b00",
    storageBucket: "ubud-souvenir-center-31b00.appspot.com",
    messagingSenderId: "739637309963",
    appId: "1:739637309963:web:4471b06178038a6b5a4d0e",
    measurementId: "G-1MM2GTHTHK"
  };
  firebase.initializeApp(config);
  
  // Retrieve Firebase Messaging object.
const messaging = firebase.messaging();


messaging.setBackgroundMessageHandler(function(payload) {
    
 var  title =payload.data.title;
  
 var options ={
        body: payload.data.body,
        icon: payload.data.icon,
        image: payload.data.image,
     data:{
            time: new Date(Date.now()).toString(),
            click_action: payload.data.click_action
        }
      
  };
 return self.registration.showNotification(title, options);

  
});


self.addEventListener('notificationclick', function(event) {

   var action_click=event.notification.data.click_action;
  event.notification.close();

  event.waitUntil(
    clients.openWindow(action_click)
  );
});
