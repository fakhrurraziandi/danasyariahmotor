
$(function(){

    var base_url = $('meta[name="base-url"]').attr('content') ;
    
    var OneSignal = window.OneSignal || [];
    OneSignal.push(function() {
        OneSignal.init({
            appId: "071722b3-d4cc-4c96-9f3a-52d0d52ac4fe",
        });

        OneSignal.getUserId( function(userId) {
            $.ajax({
                type: 'POST',
                url: base_url + '/onesignal/admin/sendUserId',
                data: {
                    userId: userId
                },
                success: function(response){
                    console.log(response);
                }
            })
        });

        OneSignal.on('subscriptionChange', function(isSubscribed) {
            if (isSubscribed) {
                // The user is subscribed
                //   Either the user subscribed for the first time
                //   Or the user was subscribed -> unsubscribed -> subscribed
                OneSignal.getUserId( function(userId) {
                    $.ajax({
                        type: 'POST',
                        url: base_url + '/onesignal/admin/sendUserId',
                        data: {
                            userId: userId
                        },
                        success: function(response){
                            console.log(response);
                        }
                    })
                });
            }
        });
    });
});

