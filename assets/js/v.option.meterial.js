// var base_url = "https://44.24-444.com/";
var base_url = "http://localhost:8080/betscore_front/";

function betscore24() {
    // $("#lodingPage").show();
    $("#liveGif").show();
    $("#upGif").hide();
    $("#live_bets_all").show();
    $("#live_bets_by_cat").hide();
    $("#live_bets_by_single_match").hide();
    $("#adv_bets_all").hide();
    $("#adv_bets_by_cat").hide();
    $("#adv_bets_by_single_match").hide();
    $.ajax({type: 'POST', url: base_url + "get_bet_all"}).done(function (response) {
        $("#current_session").val("in_play");
        $("#live_bets_all").html(response);
        // $("#lodingPage").hide();
    });
}

function live_bets_all() {
    // $("#lodingPage").show();
    $("#liveGif").show();
    $("#upGif").hide();
    $("#advance_play").hide();
    $("#in_play").show();
    $("#live_bets_all").show();
    $("#live_bets_by_cat").hide();
    $("#live_bets_by_single_match").hide();
    $("#adv_bets_all").hide();
    $("#adv_bets_by_cat").hide();
    $("#adv_bets_by_single_match").hide();
    $.ajax({type: 'POST', url: base_url + "get_bet_all"}).done(function (response) {
        window.scrollTo({top: 380, behavior: 'smooth'});
        $("#current_session").val("in_play");
        $("#live_bets_all").html(response);
        // $("#lodingPage").hide();
    });
}

function live_bets_by_cat(id) {
    // $("#lodingPage").show();
    $("#liveGif").show();
    $("#upGif").hide();
    $("#advance_play").hide();
    $("#in_play").show();
    $("#live_bets_all").hide();
    $("#live_bets_by_cat").show();
    $("#live_bets_by_single_match").hide();
    $("#adv_bets_all").hide();
    $("#adv_bets_by_cat").hide();
    $("#adv_bets_by_single_match").hide();
    $.ajax({type: 'POST', url: base_url + "get_bet_by_cat", data: {sports_id: id}}).done(function (response) {
        window.scrollTo({top: 380, behavior: 'smooth'});
        $("#live_bets_by_cat").html(response);
        $("#current_session").val("in_play_cat");
        $("#sports_id_get").val(id);
        // $("#lodingPage").hide();
    });
}

function live_bets_by_single_match(id) {
    $("#liveGif").show();
    $("#upGif").hide();
    // $('#lodingPage').show();
    $("#advance_play").hide();
    $("#in_play").show();
    $("#live_bets_all").hide();
    $("#live_bets_by_cat").hide();
    $("#live_bets_by_single_match").show();
    $("#adv_bets_all").hide();
    $("#adv_bets_by_cat").hide();
    $("#adv_bets_by_single_match").hide();
    $.ajax({
        type: 'POST',
        url: base_url + "live_bets_by_single_match",
        data: {sports_id: id}
    }).done(function (response) {
        window.scrollTo({top: 380, behavior: 'smooth'});
        $("#live_bets_by_single_match").html(response);
        $("#current_session").val("in_play_single");
        $("#sports_id_get").val(id);
        // $('#lodingPage').hide();
    });
}

function adv_bets_all() {
    // $("#lodingPage").show();
    $("#liveGif").hide();
    $("#upGif").show();
    $("#advance_play").show();
    $("#in_play").hide();
    $("#live_bets_all").hide();
    $("#live_bets_by_cat").hide();
    $("#live_bets_by_single_match").hide();
    $("#adv_bets_all").show();
    $("#adv_bets_by_cat").hide();
    $("#adv_bets_by_single_match").hide();
    $.ajax({type: 'POST', url: base_url + "upcoming_get_bet_all"}).done(function (response) {
        window.scrollTo({top: 380, behavior: 'smooth'});
        $("#adv_bets_all").html(response);
        $("#current_session").val("up_play");
        // $("#lodingPage").hide();
    });
}

function adv_bets_by_cat(id) {
    // $("#lodingPage").show();
    $("#liveGif").hide();
    $("#upGif").show();
    $("#advance_play").show();
    $("#in_play").hide();
    $("#live_bets_all").hide();
    $("#live_bets_by_cat").hide();
    $("#live_bets_by_single_match").hide();
    $("#adv_bets_all").hide();
    $("#adv_bets_by_cat").show();
    $("#adv_bets_by_single_match").hide();
    $.ajax({
        type: 'POST',
        url: base_url + 'betoption/upcoming_get_bet_by_cat',
        data: {sports_id: id}
    }).done(function (response) {
        window.scrollTo({top: 380, behavior: 'smooth'});
        $("#adv_bets_by_cat").html(response);
        $("#sports_id_get").val(id);
        $("#current_session").val("up_play_cat");
        // $("#lodingPage").hide();
    });
}

function adv_bets_by_single_match(id) {
    $("#liveGif").hide();
    $("#upGif").show();
    // $('#lodingPage').show();
    $("#advance_play").show();
    $("#in_play").hide();
    $("#live_bets_all").hide();
    $("#live_bets_by_cat").hide();
    $("#live_bets_by_single_match").hide();
    $("#adv_bets_all").hide();
    $("#adv_bets_by_cat").hide();
    $("#adv_bets_by_single_match").show();
    $.ajax({type: 'POST', url: base_url + 'adv_bets_by_single_match', data: {sports_id: id}}).done(function (response) {
        window.scrollTo({top: 380, behavior: 'smooth'});
        $("#adv_bets_by_single_match").html(response);
        $("#sports_id_get").val(id);
        $("#current_session").val("up_play_single");
        // $('#lodingPage').hide();
    });
}

function live_bets_all_web_socket() {
    // $("#lodingPage").show();
    $.ajax({type: 'POST', url: base_url + "get_bet_all"}).done(function (response) {
        $("#live_bets_all").html(response);
        $("#current_session").val("in_play");
        // $("#lodingPage").hide();
    });
}

function live_bets_by_cat_web_socket(id) {
    // $("#lodingPage").show();
    $.ajax({type: 'POST', url: base_url + "get_bet_by_cat", data: {sports_id: id}}).done(function (response) {
        $("#live_bets_by_cat").html(response);
        $("#current_session").val("in_play_cat");
        $("#sports_id_get").val(id);
        // $("#lodingPage").hide();
    });
}

function live_bets_by_single_match_web_socket(id) {
    $("#liveGif").show();
    $.ajax({
        type: 'POST',
        url: base_url + "live_bets_by_single_match",
        data: {sports_id: id}
    }).done(function (response) {
        $("#live_bets_by_single_match").html(response);
        $("#current_session").val("in_play_single");
        $("#sports_id_get").val(id);
        // $('#lodingPage').hide();
    });
}

function adv_bets_all_web_socket() {
    // $("#lodingPage").show();
    $.ajax({type: 'POST', url: base_url + "upcoming_get_bet_all"}).done(function (response) {
        $("#adv_bets_all").html(response);
        $("#current_session").val("up_play");
        // $("#lodingPage").hide();
    });
}

function adv_bets_by_cat_web_socket(id) {
    // $("#lodingPage").show();
    $.ajax({
        type: 'POST',
        url: base_url + 'betoption/upcoming_get_bet_by_cat',
        data: {sports_id: id}
    }).done(function (response) {
        $("#adv_bets_by_cat").html(response);
        $("#current_session").val("up_play_cat");
        $("#sports_id_get").val(id);
        // $("#lodingPage").hide();
    });
}

function adv_bets_by_single_match_web_socket(id) {
    $("#liveGif").hide();
    $.ajax({type: 'POST', url: base_url + 'adv_bets_by_single_match', data: {sports_id: id}}).done(function (response) {
        $("#adv_bets_by_single_match").html(response);
        $("#current_session").val("up_play_single");
        $("#sports_id_get").val(id);
        // $('#lodingPage').hide();
    });
}

function football_score() {
    // $("#lodingPage").show();
    $.ajax({type: 'POST', url: base_url + "f_s_s", dataType: 'json'}).done(function (response) {
        $("#f_s_s").html("");
        $('#f_s_s').html('<div id="owl-football-score" class="owl-carousel owlccc"></div>');
        for (var i = 0; i < response.obj.length; i++) {
            $("#owl-football-score").append('\t\t\t\t<div class="item" style="height: 155px;">\n' + '\t\t\t\t\t<div data-sportid="2" class="new-event__game">\n' + '\t\t\t\t\t\t<a href="javascript:void(0);"\n' + '\t\t\t\t\t\t   class="new-event__title">' + response.obj[i].league_title + '</a>\n' + '\t\t\t\t\t\t<div class="new-event__wrap">\n' + '\t\t\t\t\t\t\t<div class="new-event__beginning">\n' + '\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<span class="new-event__half">\n' + '\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<span>' + response.obj[i].team1 + ' &nbsp;</span>\n' + '\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<span class="live-match-title"> VS </span>\n' + '\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<span>&nbsp;' + response.obj[i].team2 + '</span>\n' + '\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t</span>\n' + '\t\t\t\t\t\t\t\t<span class="new-event__time">' + response.obj[i].notification + '</span>\n' + '\t\t\t\t\t\t\t</div>\n' + '\n' + '\t\t\t\t\t\t\t<div class="new-event__teams">\n' + '\t\t\t\t\t\t\t\t<div class="new-event__team">\n' + '\t\t\t\t\t\t\t\t\t<div class="event-team__logo">\n' + '\t\t\t\t\t\t\t\t\t\t<img\n' + '\t\t\t\t\t\t\t\t\t\t\tstyle="width: 40px!important;height: 40px!important;"\n' + '\t\t\t\t\t\t\t\t\t\t\tsrc="' + response.obj[i].icon1 + '">\n' + '\t\t\t\t\t\t\t\t\t</div>\n' + '\t\t\t\t\t\t\t\t\t<div class="event-team__name">' + response.obj[i].team1 + '</div>\n' + '\t\t\t\t\t\t\t\t</div>\n' + '\n' + '\n' + '\t\t\t\t\t\t\t\t<div class="new-event__score">\n' + '\t\t\t\t\t\t\t\t\t<div class="event-score__number">\n' + '\t\t\t\t\t\t\t\t\t\t<span class="football_score1_id_"' + response.obj[i].id + '>' + response.obj[i].score_1 + '</span></div>\n' + '\t\t\t\t\t\t\t\t\t<div class="event-score__divider"></div>\n' + '\t\t\t\t\t\t\t\t\t<div class="event-score__number">\n' + '\t\t\t\t\t\t\t\t\t\t<span class="football_score2_id_"' + response.obj[i].id + '>' + response.obj[i].score_2 + '</span></div>\n' + '\t\t\t\t\t\t\t\t</div>\n' + '\n' + '\n' + '\t\t\t\t\t\t\t\t<div class="new-event__team">\n' + '\t\t\t\t\t\t\t\t\t<div class="event-team__logo">\n' + '\t\t\t\t\t\t\t\t\t\t<img\n' + '\t\t\t\t\t\t\t\t\t\t\tstyle="width: 40px!important;height: 40px!important;"\n' + '\t\t\t\t\t\t\t\t\t\t\tsrc="' + response.obj[i].icon2 + '">\n' + '\t\t\t\t\t\t\t\t\t</div>\n' + '\t\t\t\t\t\t\t\t\t<div class="event-team__name">' + response.obj[i].team2 + '</div>\n' + '\t\t\t\t\t\t\t\t</div>\n' + ' \n' + '\t\t\t\t\t\t\t</div>\n' + '\t\t\t\t\t\t</div>\n' + '\t\t\t\t\t</div>\n' + '\t\t\t\t</div>');
        }
        ;$("#owl-football-score").owlCarousel({
            items: 1,
            loop: true,
            nav: false,
            margin: 10,
            autoplay: true,
            dots: false,
            responsiveClass: true,
            autoplayTimeout: 5000,
            autoplayHoverPause: true
        });
        // $("#lodingPage").hide();
    });
}

function cricket_score(id) {
    // $("#lodingPage").show();
    $.ajax({type: 'POST', url: base_url + "c_s_s", dataType: 'json'}).done(function (response) {
        $("#c_s_s").html("");
        $('#c_s_s').html('<div id="owl-cricket-score" class="owl-carousel"></div>');
        for (var i = 0; i < response.obj.length; i++) {
            $("#owl-cricket-score").append('<div class="item" style="height: 155px;">\n' + '\t\t\t\t\t\t\t\t\t\t\t<div data-sportid="2" class="new-event__game">\n' + '\t\t\t\t\t\t\t\t\t\t\t\t<a href="javascript:void(0);"\n' + '\t\t\t\t\t\t\t\t\t\t\t\t   class="new-event__title">' + response.obj[i].league_title + '</a>\n' + '\t\t\t\t\t\t\t\t\t\t\t\t<div class="new-event__wrap">\n' + '\t\t\t\t\t\t\t\t\t\t\t\t\t<marquee behavior = \'scroll\' direction = \'left\' onmouseout=this.start(); onmouseover=this.stop(); scrollamount=\'2\' scrolldelay=\'40\' truespeed=\'truespeed\'>\n' + '\t\t\t\t\t\t\t\t\t\t\t\t\t\t<div class="new-event__beginning">\n' + '\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<span class="new-event__half">\n' + '\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<span>' + response.obj[i].team1 + '&nbsp;</span>\n' + '\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<span class="live-match-title"> VS </span>\n' + '\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<span>&nbsp;' + response.obj[i].team2 + '</span>\n' + '\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<span class="new-event__time">&nbsp;&nbsp;|&nbsp;&nbsp;' + response.obj[i].notification + '</span>\n' + '\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t</span>\n' + '\t\t\t\t\t\t\t\t\t\t\t\t\t\t</div>\n' + '\t\t\t\t\t\t\t\t\t\t\t\t\t</marquee>\n' + '\n' + '\t\t\t\t\t\t\t\t\t\t\t\t\t<div class="new-event__teams">\n' + '\t\t\t\t\t\t\t\t\t\t\t\t\t\t<div class="new-event__team">\n' + '\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<div class="event-team__logo">\n' + '\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<img\n' + '\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\tstyle="width: 40px!important;height: 40px!important;"\n' + '\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\tsrc="' + response.obj[i].icon1 + '">\n' + '\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t</div>\n' + '\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<div class="event-team__name">' + response.obj[i].team1 + '</div>\n' + '\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<span class="cricket_score1_id_' + response.obj[i].id + '">' + response.obj[i].score_1 + '</span>\n' + '\t\t\t\t\t\t\t\t\t\t\t\t\t\t</div>\n' + '\n' + ' \n' + '\n' + '\n' + '\t\t\t\t\t\t\t\t\t\t\t\t\t\t<div class="new-event__team">\n' + '\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<div class="event-team__logo">\n' + '\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<img\n' + '\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\tstyle="width: 40px!important;height: 40px!important;"\n' + '\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\tsrc="' + response.obj[i].icon2 + '">\n' + '\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t</div>\n' + '\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<div class="event-team__name">' + response.obj[i].team2 + '</div>\n' + '\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<span class="cricket_score2_id_' + response.obj[i].id + '">' + response.obj[i].score_2 + '</span>\n' + '\t\t\t\t\t\t\t\t\t\t\t\t\t\t</div>\n' + '\n' + '\n' + '\t\t\t\t\t\t\t\t\t\t\t\t\t\t<div class="new-event__bg" style="opacity: 1!important;">\n' + '\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<img src="' + base_url + '/assets/css/bgvs.png" style="width: 40px!important;height: 40px!important;position: absolute;top: calc(50% - 2.08333em);left: calc(50% - 2.08333em);background-position: center;">\n' + '\t\t\t\t\t\t\t\t\t\t\t\t\t\t</div>\n' + '\t\t\t\t\t\t\t\t\t\t\t\t\t</div>\n' + '\t\t\t\t\t\t\t\t\t\t\t\t</div>\n' + '\t\t\t\t\t\t\t\t\t\t\t</div>\n' + '\t\t\t\t\t\t\t\t\t\t</div>');
        }
        ;$("#owl-cricket-score").owlCarousel({
            items: 1,
            loop: true,
            nav: false,
            margin: 10,
            autoplay: true,
            dots: false,
            responsiveClass: true,
            autoplayTimeout: 5000,
            autoplayHoverPause: true
        });
        // $("#lodingPage").hide();
    });
}

function football_score_live(id, s1, s2) {
    $(".football_score1_id_" + id).html("");
    $(".football_score1_id_" + id).html(s1);
    $(".football_score2_id_" + id).html("");
    $(".football_score2_id_" + id).html(s2);
}

function cricket_score_live(id, s1, s2) {
    $(".cricket_score1_id_" + id).html("");
    $(".cricket_score1_id_" + id).html(s1);
    $(".cricket_score2_id_" + id).html("");
    $(".cricket_score2_id_" + id).html(s2);
}

function up_bet_tab_web_socket() {
    $.ajax({type: 'POST', url: base_url + "up_bet_tab"}).done(function (response) {
        $("#upcomingBetTabGames").html('');
        $("#upcomingBetTabGames").html(response);
    });
}

function up_score_web_socket() {
    $.ajax({type: 'POST', url: base_url + "up_score"}).done(function (response) {
        $("#upcoming_score_ajax").html('');
        $("#upcoming_score_ajax").html(response);
    });
}

function get_all_count() {
    $.ajax({type: 'POST', url: base_url + 'get_all_count', dataType: 'JSON'}).done(function (response) {
        if (response.status == 200) {
            $("#left_side_all_game_count").html('');
            $("#left_side_all_game_count").html(response.left_side_all_game_count);
            $("#left_side_all_live_game_count").html('');
            $("#left_side_all_live_game_count").html(response.left_side_all_live_game_count);
            $("#top_bar_all_live_game_count").html('');
            var all_t = response.left_side_all_live_game_count + response.top_bar_all_adv_game_count;
            $("#top_bar_all_live_game_count").html('All (' + all_t + "/" + response.left_side_all_live_game_count + ')');
            $("#top_bar_all_adv_game_count").html('');
            $("#top_bar_all_adv_game_count").html('All (' + response.top_bar_all_adv_game_count + ')');
            for (var i = 0; i < response.data_by_cat.length; i++) {
                $("#left_side_all_game_count_by_cat_" + response.data_by_cat[i].sportId).html('');
                $("#left_side_all_game_count_by_cat_" + response.data_by_cat[i].sportId).html(response.data_by_cat[i].left_side_all_game_count_by_cat);
                $("#left_side_live_game_count_by_cat_" + response.data_by_cat[i].sportId).html('');
                $("#left_side_live_game_count_by_cat_" + response.data_by_cat[i].sportId).html(response.data_by_cat[i].left_side_live_game_count_by_cat);
                $("#top_bar_live_game_count_by_cat_" + response.data_by_cat[i].sportId).html('');
                $("#top_bar_live_game_count_by_cat_" + response.data_by_cat[i].sportId).html(response.data_by_cat[i].sportName + ' (' + response.data_by_cat[i].top_bar_live_game_count_by_cat + ')');
                $("#top_bar_adv_game_count_by_cat_" + response.data_by_cat[i].sportId).html('');
                $("#top_bar_adv_game_count_by_cat_" + response.data_by_cat[i].sportId).html(response.data_by_cat[i].sportName + ' (' + response.data_by_cat[i].top_bar_adv_game_count_by_cat + ')');
            }
        }
    });
}

$('#liveTvTab').on('click', function () {
    $('#showLiveTv').show();
    $('#upcomingBetTabGames').hide();
    $('#liveTvTab').hasClass("c-tabs__item--active") ? $('#liveTvTab').addClass("c-tabs__item--active") : $('#liveTvTab').addClass("c-tabs__item--active");
    $('#upcomeBetTab').hasClass("c-tabs__item--active") ? $('#upcomeBetTab').removeClass("c-tabs__item--active") : $('#upcomeBetTab').removeClass("c-tabs__item--active");
    $.ajax({type: 'POST', url: base_url + "betscore/open_live_tv"}).done(function (response) {
        $("#liveTvSrc").html(response);
    });
});
$('#upcomeBetTab').on('click', function () {
    $('#showLiveTv').hide();
    $('#upcomingBetTabGames').show();
    $('#liveTvTab').hasClass("c-tabs__item--active") ? $('#liveTvTab').removeClass("c-tabs__item--active") : $('#liveTvTab').removeClass("c-tabs__item--active");
    $('#upcomeBetTab').hasClass("c-tabs__item--active") ? $('#upcomeBetTab').addClass("c-tabs__item--active") : $('#upcomeBetTab').addClass("c-tabs__item--active");
});

function checkClubbal(id) {
    $.ajax({
        type: 'POST',
        url: base_url + 'jsquerytimer/cehckAjaxClubBal',
        data: {id: id},
        dataType: 'json'
    }).done(function (response) {
        if (response.st == 200) {
            $("#clubBal").html('');
            $("#clubBal").html(response.data);
        }
    });
}

function checkbal(id) { 
    var is_checked_bal = $("#checking_bal").val();
    var session = $("#current_session").val();
    $("#current_session").val("check_bal");
    if (is_checked_bal==="No") {
        $("#checking_bal").val("Yes");
        $(".waiting").show();
        $(".myBal").html('');
        $.ajax({
            type: 'POST',
            url: base_url + 'coin_check',
            data: {id: id},
            dataType: 'json'
        }).done(function (response) {
            if (response.st == 200) {
                $("#checking_bal").val("No");
                $("#current_session").val(session);
                $(".waiting").hide();
                $(".myBal").html(response.data+" Coins");
            }
        });
    } 
}