var notificationsWrapper = $('.dropdown-notifications');
var notificationsToggle = notificationsWrapper.find('a[data-toggle]');

var notificationsCountElem = notificationsToggle.find('span[data-count]');
var notificationsCount = parseInt(notificationsCountElem.data('count'));
var notifications = notificationsWrapper.find('div.dropdown-menu');

// Subscribe to the channel we specified in our Laravel Event
// var channel = pusher.subscribe('new-notification');
// // Bind a function to a Event (the full Laravel class)

// channel.bind("App\\Events\\NewNotification", function(data) {
//     console.log(data);
// });


/*
channel.bind('App\\Events\\NewNotification', function (data) {
    var existingNotifications = notifications.html();
    var newNotificationHtml =
     `<a href="`+ data.user_id +`">
        <div class="media-body">
            <h6 class="media-heading text-right">` + data.post_id +`</h6> 
            <p class="notification-text font-small-3 text-muted text-right">` + data.nbr_place_res + `</p>
            

        </div>
    </a>`;
    notifications.html(newNotificationHtml + existingNotifications);
    notificationsCount += 1;
    notificationsCountElem.attr('data-count', notificationsCount);
    notificationsWrapper.find('.notif-count').text(notificationsCount);
    notificationsWrapper.show();
});
// */ 