"use strict";
! function() {
    var t = window.driftt = window.drift = window.driftt || [];
    if (!t.init) {
        if (t.invoked) return void(window.console && console.error && console.error("Drift snippet included twice."));
        t.invoked = !0, t.methods = ["identify", "config", "track", "reset", "debug", "show", "ping", "page", "hide", "off", "on"],
            t.factory = function(e) {
                return function() {
                    var n = Array.prototype.slice.call(arguments);
                    return n.unshift(e), t.push(n), t;
                };
            }, t.methods.forEach(function(e) {
                t[e] = t.factory(e);
            }), t.load = function(t) {
                var e = 3e5,
                    n = Math.ceil(new Date() / e) * e,
                    o = document.createElement("script");
                o.type = "text/javascript", o.async = !0, o.crossorigin = "anonymous", o.src = "https://js.driftt.com/include/" + n + "/" + t + ".js";
                var i = document.getElementsByTagName("script")[0];
                i.parentNode.insertBefore(o, i);
            };
    }
}();
drift.SNIPPET_VERSION = '0.3.1';
drift.load('seyce7efcprn');








$(document).ready(function() {
    var itemsMainDiv = ('.MultiCarousel');
    var itemsDiv = ('.MultiCarousel-inner');
    var itemWidth = "";

    $('.leftLst, .rightLst').click(function() {
        var condition = $(this).hasClass("leftLst");
        if (condition)
            click(0, this);
        else
            click(1, this)
    });

    ResCarouselSize();




    $(window).resize(function() {
        ResCarouselSize();
    });

    //this function define the size of the items
    function ResCarouselSize() {
        var incno = 0;
        var dataItems = ("data-items");
        var itemClass = ('.item');
        var id = 0;
        var btnParentSb = '';
        var itemsSplit = '';
        var sampwidth = $(itemsMainDiv).width();
        var bodyWidth = $('body').width();
        $(itemsDiv).each(function() {
            id = id + 1;
            var itemNumbers = $(this).find(itemClass).length;
            btnParentSb = $(this).parent().attr(dataItems);
            itemsSplit = btnParentSb.split(',');
            $(this).parent().attr("id", "MultiCarousel" + id);


            if (bodyWidth >= 1200) {
                incno = itemsSplit[0];
                itemWidth = sampwidth / incno;
            } else if (bodyWidth >= 992) {
                incno = itemsSplit[2];
                itemWidth = sampwidth / incno;
            } else if (bodyWidth >= 768) {
                incno = itemsSplit[1];
                itemWidth = sampwidth / incno;
            } else {
                incno = itemsSplit[0];
                itemWidth = sampwidth / incno;
            }
            $(this).css({
                'transform': 'translateX(0px)',
                'width': itemWidth * itemNumbers
            });
            $(this).find(itemClass).each(function() {
                $(this).outerWidth(itemWidth);
            });

            $(".leftLst").addClass("over");
            $(".rightLst").removeClass("over");

        });
    }


    //this function used to move the items
    function ResCarousel(e, el, s) {
        var leftBtn = ('.leftLst');
        var rightBtn = ('.rightLst');
        var translateXval = '';
        var divStyle = $(el + ' ' + itemsDiv).css('transform');
        var values = divStyle.match(/-?[\d\.]+/g);
        var xds = Math.abs(values[4]);
        if (e == 0) {
            translateXval = parseInt(xds) - parseInt(itemWidth * s);
            $(el + ' ' + rightBtn).removeClass("over");

            if (translateXval <= itemWidth / 2) {
                translateXval = 0;
                $(el + ' ' + leftBtn).addClass("over");
            }
        } else if (e == 1) {
            var itemsCondition = $(el).find(itemsDiv).width() - $(el).width();
            translateXval = parseInt(xds) + parseInt(itemWidth * s);
            $(el + ' ' + leftBtn).removeClass("over");

            if (translateXval >= itemsCondition - itemWidth / 2) {
                translateXval = itemsCondition;
                $(el + ' ' + rightBtn).addClass("over");
            }
        }
        $(el + ' ' + itemsDiv).css('transform', 'translateX(' + -translateXval + 'px)');
    }

    //It is used to get some elements from btn
    function click(ell, ee) {
        var Parent = "#" + $(ee).parent().attr("id");
        var slide = $(Parent).attr("data-slide");
        ResCarousel(ell, Parent, slide);
    }

});

//  ==============================================================================
//                                     globalsite 
//  ==============================================================================

window.dataLayer = window.dataLayer || [];

function gtag() {
    dataLayer.push(arguments);
}
gtag('js', new Date());
gtag('config', 'AW-798495665');

//  ==============================================================================
//                                      gtag-message
//  ==============================================================================
var x = 0;
var myVar = setInterval(function() {
    if (x == 0) {
        if (jQuery('[class="toast-message"]:contains("Thanks, We will get back")').is(":visible")) {
            gtag('event', 'conversion', {
                'send_to': 'AW-798495665/01k3CMPCwZYBELGn4PwC'
            });
            clearInterval(myVar);
            x = 1;
        }
    }
}, 1000);

//  ==============================================================================
//                                      gtag
//  ==============================================================================
if (window.location.pathname == "/thank-you") {
    gtag('event', 'conversion', {
        'send_to': 'AW-798495665/ilpaCOv7hpYBELGn4PwC'
    });
}

//  ==============================================================================
//                                      tagname
//  ==============================================================================

//  (function(h,o,t,j,a,r){
//      h.hj=h.hj||function(){(h.hj.q=h.hj.q||[]).push(arguments)};
//      h._hjSettings={hjid:1340200,hjsv:6};
//      a=o.getElementsByTagName('head')[0];
//      r=o.createElement('script');r.async=1;
//      r.src=t+h._hjSettings.hjid+j+h._hjSettings.hjsv;
//      a.appendChild(r);
//  })(window,document,'https://static.hotjar.com/c/hotjar-','.js?sv=');


//  ==============================================================================
//                                       leady_track_key
//  ==============================================================================

// var leady_track_key = "YWA0U0SyzqEbNvOU";
// (function() {
//     var l = document.createElement("script");
//     l.type = "text/javascript";
//     l.async = true;
//     l.src = 'https://t.leady.com/' + leady_track_key + "/L.js";
//     var s = document.getElementsByTagName("script")[0];
//     s.parentNode.insertBefore(l, s);
// })();


//  ==============================================================================
//                                     Twitter universal website tag code
//  ==============================================================================


! function(e, t, n, s, u, a) {
    e.twq || (s = e.twq = function() {
            s.exe ? s.exe.apply(s, arguments) : s.queue.push(arguments);
        }, s.version = '1.1', s.queue = [], u = t.createElement(n), u.async = !0, u.src = '//static.ads-twitter.com/uwt.js',
        a = t.getElementsByTagName(n)[0], a.parentNode.insertBefore(u, a))
}(window, document, 'script');
// Insert Twitter Pixel ID and Standard Event data below
twq('init', 'o3rhw');
twq('track', 'PageView');



//  ==============================================================================
//                                 Facebook Pixel Code
//  ==============================================================================




! function(f, b, e, v, n, t, s) {
    if (f.fbq) return;
    n = f.fbq = function() {
        n.callMethod ?
            n.callMethod.apply(n, arguments) : n.queue.push(arguments)
    };
    if (!f._fbq) f._fbq = n;
    n.push = n;
    n.loaded = !0;
    n.version = '2.0';
    n.queue = [];
    t = b.createElement(e);
    t.async = !0;
    t.src = v;
    s = b.getElementsByTagName(e)[0];
    s.parentNode.insertBefore(t, s)
}(window, document, 'script',
    'https://connect.facebook.net/en_US/fbevents.js');
fbq('init', '293803691516941');
fbq('track', 'PageView');



//  ==============================================================================
//                                 JS Helper
//  ==============================================================================

// ! function(q, e, v, n, t, s) {
//     if (q.qp) return;
//     n = q.qp = function() { n.qp ? n.qp.apply(n, arguments) : n.queue.push(arguments); };
//     n.queue = [];
//     t = document.createElement(e);
//     t.async = !0;
//     t.src = v;
//     s = document.getElementsByTagName(e)[0];
//     s.parentNode.insertBefore(t, s);
// }(window, 'script', 'https://a.quora.com/qevents.js');
// qp('init', '7b677ae6b57b44a9a68da93e1038cf9a');
// qp('track', 'ViewContent');


//  ==============================================================================
//                                 goog letagmanager
//  ==============================================================================


// (function(w, d, s, l, i) {
//     w[l] = w[l] || [];
//     w[l].push({
//         'gtm.start': new Date().getTime(),
//         event: 'gtm.js'
//     });
//     var f = d.getElementsByTagName(s)[0],
//         j = d.createElement(s),
//         dl = l != 'dataLayer' ? '&l=' + l : '';
//     j.async = true;
//     j.src =
//         'https://www.googletagmanager.com/gtm.js?id=' + i + dl;
//     f.parentNode.insertBefore(j, f);
// })(window, document, 'script', 'dataLayer', 'GTM-WKGBD9D');

//  ==============================================================================
//                                 subscribersSiteId
//  ==============================================================================

var subscribersSiteId = '9ee9ff55-22a4-4a7c-b992-819d02118d73';
// src="https://cdn.subscribers.com/assets/subscribers.js">

//  ==============================================================================
//                                subscribersSiteId
//  ==============================================================================

! function(w, d, s, l, i) {
    w[l] = w[l] || [];
    w[l].push({
        'gtm.start': new Date().getTime(),
        event: 'gtm.js'
    });
    var f = d.getElementsByTagName(s)[0],
        j = d.createElement(s),
        dl = l != 'dataLayer' ? '&l=' + l : '';
    j.async = true;
    j.src =
        'https://www.googletagmanager.com/gtm.js?id=' + i + dl;
    f.parentNode.insertBefore(j, f);
}(window, document, 'script', 'dataLayer', 'GTM-N3CM643');