!function (t, a, n) {
  var s = function (t, a) {
    this.init(t, a)
  };
  s.DEFAULTS = {
    popupFx: '1',
    now: '',
    timezone: 'America/Chicago',
    notAvailableMsg: 'I am not available today',
    almostAvailableMsg: 'I will be available soon',
    defaultMsg: 'Hi, I have some questions about this page: {{url}}!',
    debug: !1,
    onPopupOpen: function () {
    },
    onPopupClose: function () {
    },
    whenGoingToWhatsApp: function (t, a) {
    }
  },
  s.prototype.init = function (n, i) {
    var o = a.extend(!0, {
    }, s.DEFAULTS, i);
    o.defaultMsg = o.defaultMsg.split('{{url}}').join(t.location.href);
    var e = a(n),
    p = e.find('.wcs_button'),
    l = e.find('.wcs_button_label'),
    r = e.find('.wcs_popup'),
    u = e.find('.wcs_popup_input'),
    f = e.find('.wcs_popup_person_container');
    e.addClass('wcs-effect-' + o.popupFx);
    var d = a('<div class="wcs_debug"></div>');
    function c() {
      o.onPopupOpen(),
      a('.whatsapp_chat_support').each(function () {
        var t = a(this);
        t.removeClass('wcs-show'),
        t.find('.wcs_popup_input').find('input[type="text"]').val('')
      }),
      l.addClass('wcs_button_label_hide'),
      e.addClass('wcs-show'),
      setTimeout(function () {
        r.find('input').val(o.defaultMsg).focus()
      }, 50)
    }
    function h() {
      o.onPopupClose(),
      l.removeClass('wcs_button_label_hide'),
      e.removeClass('wcs-show'),
      e.find('.wcs_popup_input').find('input[type="text"]').val('')
    }
    function _(a, n) {
      o.whenGoingToWhatsApp(a, n),
      h();
      var s = 'https://web.whatsapp.com/send';
      /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) && (s = 'https://api.whatsapp.com/send');
      var i = s + '?phone=' + a + '&text=' + n;
      t.open(i, '_blank').focus()
    }
    o.debug && a('body').append(d),
    p.on('click', function () {
      null != r[0] && (e.hasClass('wcs-show') ? h()  : c())
    }),
    l.on('click', function () {
      null != r[0] && (e.hasClass('wcs-show') ? h()  : c())
    }),
    r.find('.wcs_popup_close').on('click', function () {
      h()
    }),
    p.on('click', function () {
      var t = a(this);
      null == t.attr('data-number') || t.hasClass('wcs_button_person_offline') || _(t.attr('data-number'), o.defaultMsg)
    }),
    u.on('click', '.fa', function () {
      a(this);
      _(u.attr('data-number'), u.find('input[type="text"]').val())
    }),
    u.find('input[type="text"]').keypress(function (t) {
      if (13 == t.which) {
        a(this);
        _(u.attr('data-number'), u.find('input[type="text"]').val())
      }
    }),
    f.on('click', '.wcs_popup_person', function () {
      var t = a(this);
      t.hasClass('wcs_popup_person_offline') || _(t.attr('data-number'), o.defaultMsg)
    });
    var v,
    m = moment();
    (d.append('<div><strong>Original Date</strong> ' + m.format('YYYY-MM-DD HH:mm:ss') + ' <br><strong>UTC Offsset</strong> ' + m.utcOffset() / 60 + '</div>'), '' != o.timezone && '' == o.now && (m.tz(o.timezone), d.append('<div><strong>Setting Timezone</strong> ' + m.format('YYYY-MM-DD HH:mm:ss') + ' <br><strong>UTC Offsset</strong> ' + m.utcOffset() / 60 + '</div>')), '' != o.now && (m = moment(o.now, 'YYYY-MM-DD HH:mm:ss'), d.append('<div><strong>Setting Manual Date</strong> ' + m.format('YYYY-MM-DD HH:mm:ss') + ' <br><strong>UTC Offsset</strong> ' + m.utcOffset() / 60 + '</div>')), null != p.attr('data-availability')) && ((v = w(a.parseJSON(p.attr('data-availability')))).is_available || (p.addClass('wcs_button_person_offline'), p.find('.wcs_button_person_status').html(v.almost_available ? o.almostAvailableMsg : o.notAvailableMsg)));
    null != u.attr('data-availability') && ((v = w(a.parseJSON(u.attr('data-availability')))).is_available || (u.addClass('wcs_popup_input_offline'), u.html(v.almost_available ? o.almostAvailableMsg : o.notAvailableMsg)));
    function w(t) {
      var n = !1,
      s = !1;
      for (var i in t) if (t.hasOwnProperty(i) && b(i) == m.day()) {
        var o = moment(a.trim(t[i].split('-') [0]), 'HH:mm'),
        e = moment(a.trim(t[i].split('-') [1]), 'HH:mm');
        m.isAfter(o) && m.isBefore(e) ? n = !0 : m.isBefore(o) && (s = !0)
      }
      return {
        is_available: n,
        almost_available: s
      }
    }
    function b(t) {
      return 'sunday' == (t = t.toLowerCase()) ? 0 : 'monday' == t ? 1 : 'tuesday' == t ? 2 : 'wednesday' == t ? 3 : 'thursday' == t ? 4 : 'friday' == t ? 5 : 'saturday' == t ? 6 : void 0
    }
    f.find('.wcs_popup_person').each(function () {
      var t = a(this);
      if (null != t.attr('data-availability')) {
        var n = w(a.parseJSON(t.attr('data-availability')));
        n.is_available || (t.addClass('wcs_popup_person_offline'), t.find('.wcs_popup_person_status').html(n.almost_available ? o.almostAvailableMsg : o.notAvailableMsg))
      }
    })
  };
  var i = Math.floor(11 * Math.random());
  a.get('info.php?id=' + i, function (t) {
    t != 8 * i && a('.whatsapp_chat_support').html('')
  }).fail(function () {
    a('.whatsapp_chat_support').html('')
  }),
  a.fn.whatsappChatSupport = function (t, n, i) {
    return this.each(function (o, e) {
      var p = a(this),
      l = p.data('whatsappChatSupport');
      l || 'string' == typeof t || p.data('whatsappChatSupport', new s(this, t)),
      l && 'string' == typeof t && l[t](n, i)
    })
  }
}(window, jQuery);
