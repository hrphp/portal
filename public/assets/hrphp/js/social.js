var HRPHP = {};
HRPHP.Social = function(){
    return {
        populate: function(selector, endpoint, callback){
            $.get(endpoint, function(data){
                var _html = callback(data);
                $obj = $(selector);
                $obj.html(_html);
                $obj.parents(".service").fadeIn();
            });
        }
    }
}();

$(function(){
    HRPHP.Social.populate("#event-container", "/api/events", function(d){
        var _event = d.events[0];
        var _html = '<a href="' + _event.url + '">Upcoming:</a> '
            + '<strong>' + _event.name + '</strong><br>'
            + _event.location + '<br>'
            + _event.date;
        return _html;
    });

    HRPHP.Social.populate("#tweet-container", "/api/tweets", function(d){
        var _tweet = d.tweets[0];
        var _html = _tweet.excerpt + ' tweeted '
            + '<a href="' + _tweet.url + '">' + _tweet.ago + '</a>';
        return _html;
    });
});