var r = !0,
  t = null,
  B = !1;
window.keyshotVR = function (ha, s, Q, R, ia, C, ja, ka, la, ma, na, G, H, oa, pa, qa, S, ra, sa, ta, T, U) {
  function N(a, I, b) {
    a.removeEventListener ? a.removeEventListener(I, b, B) : a.detachEvent && (a.detachEvent("on" + I, a["e" + I + b]), a["e" + I + b] = t)
  }

  function m(a, b, c) {
    a.addEventListener ? a.addEventListener(b, c, B) : a.attachEvent && (a["e" + b + c] = c, a.attachEvent("on" + b, function () {
      a["e" + b + c]()
    }))
  }

  function V() {
    var a = B; - 1 != navigator.platform.toString().indexOf("Win") && -1 != navigator.appVersion.indexOf("MSIE") && (a = r);
    return a
  }

  function ua(f) {
    a.ma =
      B;
    f.pointerId in a.I && delete a.I[f.pointerId];
    W(f)
  }

  function va(f) {
    a.ma && (a.I[f.pointerId] = [f.pageX, f.pageY], X(f))
  }

  function wa(f) {
    a.ma = r;
    a.I[f.pointerId] = [f.pageX, f.pageY];
    Y(f)
  }

  function Z() {
    a.q ? (setTimeout(function () {
      a.B(B)
    }, 20), setTimeout(function () {
      a.B(r)
    }, 120)) : (setTimeout(function () {
      a.B(r)
    }, 20), setTimeout(function () {
      a.B(B)
    }, 120))
  }

  function E() {
    var a = {
      x: 0,
      y: 0
    }, b = p;
    if (b.offsetParent) {
      do a.x += b.offsetLeft, a.y += b.offsetTop; while (b = b.offsetParent)
    }
    return a
  }

  function $() {
    var f = d.g;
    d.g = Math.min(v.width /
      w.width, v.height / w.height);
    f != d.g && a.T(a.C() * f / d.g);
    q.setAttribute("width", w.width);
    a.q ? (q.setAttribute("height", w.height), q.style[J] = "translate(" + -w.width / 2 + "px," + -w.height / 2 + "px) scale(" + d.g + ") translate(" + 0.5 * v.width / d.g + "px," + 0.5 * v.height / d.g + "px) translate(" + d.j + "px," + d.k + "px) scale(" + d.p + ")", q.style["max-width"] = "", q.style.height = "", p.style["background-color"] = a.backgroundColor) : (q.removeAttribute("height"), q.style[J] = "", q.style["max-width"] = "100%", q.style.height = "auto", p.style["background-color"] =
      "")
  }

  function K() {
    a.Ua(a.l.offsetWidth, a.l.offsetHeight)
  }

  function aa(a, b) {
    n.start.x = a;
    n.start.y = b;
    n.a.x = a;
    n.a.y = b;
    h.a.x = a;
    h.a.y = b
  }

  function ba(a, b) {
    n.b.x = a - n.a.x;
    n.b.y = b - n.a.y;
    n.p.x = a;
    n.p.y = b;
    n.a.x = a;
    n.a.y = b
  }

  function F(f) {
    f || (f = window.event);
    var b = 0;
    f.keyCode ? b = f.keyCode : f.which && (b = f.which);
    1 == b ? j.d |= 1 : 1 < b && (j.d |= 2);
    a.wa(f);
    f.preventDefault ? f.preventDefault() : f.returnValue = B
  }

  function L(f) {
    f || (f = window.event);
    var b = E();
    a.cursor.x = f.pageX - b.x + k.left;
    a.cursor.y = f.pageY - b.y + k.top;
    f.preventDefault ? f.preventDefault() :
      f.returnValue = B;
    0 < j.d && (1 == j.d ? ba(f.pageX, f.pageY) : 2 == j.d ? (f = a.cursor.y - D.start.y, b = a.C(), a.T(d.A * Math.exp(f / 200)), f = a.C(), d.j += parseFloat(a.e * b - a.e * f), d.k += parseFloat(a.f * b - a.f * f)) : 3 == j.d && (b = a.cursor.x - D.start.x, f = a.cursor.y - D.start.y, d.j += parseFloat((b - d.m.x) / d.g), d.k += parseFloat((f - d.m.y) / d.g), d.m.x = b, d.m.y = f))
  }

  function M(f) {
    f || (f = window.event);
    var b = 0;
    f.keyCode ? b = f.keyCode : f.which && (b = f.which);
    1 == b ? j.d &= -2 : 1 < b && (j.d &= -3);
    a.wa(f);
    f.preventDefault ? f.preventDefault() : f.returnValue = B
  }

  function O(f) {
    f ||
      (f = window.event);
    a.Ga(0 < (f.detail ? -1 * f.detail : f.wheelDelta / 40) ? 1 : -1);
    f.preventDefault ? f.preventDefault() : f.returnValue = B
  }

  function Y(f) {
    f || (f = window.event);
    var b = ca(),
      c = E();
    a.cursor.x = b[0].pageX - c.x + k.left;
    a.cursor.y = b[0].pageY - c.y + k.top;
    if (1 == b.length && b[0])
      if (j.start.x = b[0].pageX, j.start.y = b[0].pageY, j.a.x = b[0].pageX, j.a.y = b[0].pageY, a.qa = b[0].target, a.qa == a.N) j.d = 1, aa(b[0].pageX, b[0].pageY);
      else
        for (var e = a.qa; e && e != a.N;) {
          if (e.onclick) e.onclick();
          e = e.parentNode
        }
      if (2 == b.length && b[0] && b[1]) {
        j.d = 3;
        j.da.x = b[0].pageX - c.x + k.left;
        j.da.y = b[0].pageY - c.y + k.top;
        j.ea.x = b[1].pageX - c.x + k.left;
        j.ea.y = b[1].pageY - c.y + k.top;
        var e = b[0].pageX - b[1].pageX,
          g = b[0].pageY - b[1].pageY,
          h = (b[0].pageX - c.x + k.left + (b[1].pageX - c.x + k.left)) / 2,
          b = (b[0].pageY - c.y + k.top + (b[1].pageY - c.y + k.top)) / 2;
        d.pa = B;
        d.Va = Math.sqrt(e * e + g * g);
        d.A = a.C();
        a.e = parseFloat(h - 0.5 * v.width);
        a.f = parseFloat(b - 0.5 * v.height);
        a.e *= parseFloat(a.R);
        a.f *= parseFloat(a.R);
        a.e -= parseFloat(d.j);
        a.f -= parseFloat(d.k);
        a.e /= parseFloat(d.A);
        a.f /= parseFloat(d.A)
      }
    f.preventDefault()
  }

  function X(b) {
    b || (b = window.event);
    var c = ca(),
      i = E();
    a.cursor.x = c[0].pageX - i.x + k.left;
    a.cursor.y = c[0].pageY - i.y + k.top;
    1 == c.length && c[0] && (j.a.x = c[0].pageX, j.a.y = c[0].pageY, 0 <= j.d && ba(j.a.x, j.a.y));
    if (2 == c.length && c[0] && c[1]) {
      var e = a.C(),
        g = c[0].pageX - c[1].pageX,
        h = c[0].pageY - c[1].pageY;
      a.T(d.A / d.Va * Math.sqrt(g * g + h * h));
      g = a.C();
      h = a.f * e - a.f * g;
      d.j += a.e * e - a.e * g;
      d.k += h;
      e = (a.cursor.x + c[1].pageX - i.x + k.left) / 2 - (j.da.x + j.ea.x) / 2;
      c = (a.cursor.y + c[1].pageY - i.y + k.top) / 2 - (j.da.y + j.ea.y) / 2;
      d.pa == B && (d.m.x = e, d.m.y = c,
        d.pa = r);
      d.j += (e - d.m.x) / d.g;
      d.k += (c - d.m.y) / d.g;
      d.m.x = e;
      d.m.y = c
    }
    b.preventDefault()
  }

  function ca() {
    if (!V()) return window.event.touches;
    var b = [];
    for (id in a.I) {
      var c = a.I[id],
        d = {};
      d.pageX = c[0];
      d.pageY = c[1];
      d.target = a.N;
      d.preventDefault = function () {};
      b.push(d)
    }
    return b
  }

  function W(b) {
    b.preventDefault();
    a.qa = t;
    j.d = 0
  }

  function xa(a) {
    a.preventDefault();
    j.d = 0
  }

  function P() {
    ya(P);
    a.X == a.aa && (1 == j.d ? 0.01 < h.M ? (h.b.x = 0.4 * (n.a.x - h.a.x), h.b.y = 0.4 * (n.a.y - h.a.y), h.a.x += h.b.x, h.a.y += h.b.y, a.la(h.b.x, h.b.y)) : (a.la(n.b.x,
      n.b.y), n.b.x = 0, n.b.y = 0) : 0.01 < h.M && (h.b.x *= h.M, h.b.y *= h.M, 0.055 > h.b.x * h.b.x + h.b.y * h.b.y && (h.b.x = 0, h.b.y = 0, n.b.x = 0, n.b.y = 0, n.a.x = h.a.x, n.a.y = h.a.y), (0 != h.b.x || 0 != h.b.y) && a.la(h.b.x, h.b.y)));
    a.Ba();
    var b = 0;
    if (-1 == a.Y) {
      for (var d = 1, d = 0; d < a.z.length; d++) {
        var i = a.w[d];
        if (a.u[i] == a.h && a.z[d].complete && a.z[d].width == w.width && a.z[d].height == w.height) {
          a.t[i] = a.u[i];
          a.u[i] = -1;
          if (a.X == a.aa) {
            var e = a.z.length + a.za;
            e > c.s && (e = c.s);
            var g = e - b;
            if (g)
              for (e = 0; e < g; e++) a.ha()
          }
          c.L = r;
          0 == d && a.Ba()
        } - 1 != a.t[i] && b++
      }
      d = parseFloat(b /
        c.s);
      a.Sa(d);
      if (b == c.s && (a.Y = a.h, 0 < a.h && a.h--, a.Ra(), 0 < c.D))
        for (e = 0; e < c.s; e++) b = new Image, b.src = a.n[a.h][a.w[e]], a.Qa.push(b)
    } else a.Ta()
  }

  function da(a) {
    a = a ? a : window.event;
    13 == a.keyCode && (Z(), a.preventDefault ? a.preventDefault() : a.returnValue = B)
  }
  var A = "/",
    ea = window.location.href,
    fa = ea.lastIndexOf("/");
  0 <= fa && (A = ea.substr(0, fa + 1));
  this.ma = B;
  this.I = [];
  this.Ba = function () {
    if (c.L) {
      c.L = B;
      var b = parseInt(c.V * c.c + c.U); - 1 == a.t[b] && (b = a.Ha(b)); - 1 != a.t[b] && ga.setAttribute("src", a.va(b))
    }
    if (d.p != d.a || d.j != d.xa ||
      d.k != d.ya) d.a = d.p, d.xa = d.j, d.ya = d.k, $()
  };
  this.Ha = function (b) {
    for (var d = -1E3, i = b, e = parseFloat(parseInt(b % c.c)), g = parseFloat(parseInt(b / c.c)), e = e / c.c, e = e * 2 * Math.PI, g = g / c.i, g = g * Math.PI, b = Math.sin(e), e = Math.cos(e), g = Math.cos(g), h = Math.sqrt(b * b + e * e + g * g), b = b / h, e = e / h, g = g / h, h = 0; h < a.z.length; h++) {
      var j = a.w[h];
      if (-1 != a.t[j]) {
        var k = a.Da[j].Za,
          k = b * k.x + e * k.y + g * k.$a;
        d < k && (d = k, i = j)
      }
    }
    return i
  };
  this.ha = function () {
    if (a.oa < c.s) {
      var b = new Image,
        d = a.w[a.oa];
      a.u[d] = a.h;
      b.src = a.va(d);
      a.z.push(b);
      var i = parseInt(d % c.c),
        e =
          parseInt(d / c.c),
        i = i / c.c,
        i = i * 2 * Math.PI,
        e = e / c.i,
        e = e * Math.PI,
        b = Math.sin(i),
        i = Math.cos(i),
        e = Math.cos(e),
        g = Math.sqrt(b * b + i * i + e * e);
      a.Da[d] = {
        Za: {
          x: b / g,
          y: i / g,
          $a: e / g
        }
      };
      a.oa++
    }
  };
  this.Fa = function () {
    for (var b = c.ra, d = c.sa, i = 2, e = parseFloat(c.c / i), g = parseFloat(c.i / i), h = c.s, j = 0, k = 0, m = 0, n = 0, l = 0; a.O < h;) {
      var q = parseInt(b % c.c),
        s = parseInt(d % c.i),
        l = parseInt(s * c.c + q);
      if (!a.n[0][l]) {
        a.w[a.O] = l;
        a.O++;
        a.n[0][l] = a.$(q, s, 0);
        for (var p = 1; p < c.D; p++) a.n[p][l] = a.$(q, s, p)
      }
      0 == j && (b += e, k++);
      1 == j && (d += g, m++);
      n++;
      if (n >= i)
        if (n = 0, 0 == j) j =
          1, k = 0;
        else if (1 == j && (b += e, k++, k >= i / 2)) {
        i *= 2;
        b = c.ra;
        d = c.sa;
        e = parseFloat(c.c / i);
        g = parseFloat(c.i / i);
        if (1 > e && 1 > g) {
          for (b = 0; b < h; b++)
            if (d = parseInt(b % c.c), i = parseInt(b / c.c), l = parseInt(i * c.c + d), !a.n[0][l]) {
              a.w[a.O] = l;
              a.O++;
              a.n[0][l] = a.$(d, i, 0);
              for (p = 1; p < c.D; p++) a.n[p][l] = a.$(d, i, p)
            }
          break
        }
        j = m = k = 0
      }
    }
  };
  this.$ = function (b, d, i) {
    var e = new String;
    return e = 0 == c.D ? A + a.v + "/" + parseInt(d) + "_" + parseInt(b) + "." + T : A + a.v + "/LOD" + (10 > i ? "0" + i : i) + "/" + parseInt(d) + "_" + parseInt(b) + "." + T
  };
  this.va = function (b) {
    var c = a.t[b];
    0 > c && (c = a.h);
    return a.n[c][b]
  };
  this.la = function (b, d) {
    var b = b * (1 < c.c ? a.Xa : 0),
      d = d * (1 < c.i ? a.Ya : 0),
      i = Math.sqrt(b * b + d * d);
    if (1E-4 < i && (c.fa += b, c.ga += d, c.F += i, 1 < c.F)) {
      var i = parseInt(c.F),
        e = Math.atan2(c.fa, c.ga);
      c.F -= i;
      c.fa = 0;
      c.ga = 0;
      0 > e && (e += 2 * Math.PI);
      e += Math.PI / 8;
      e = parseInt(e / (Math.PI / 4));
      0 > e && (e += 8);
      e %= 8;
      if (0 != x[e]) {
        var g = c.U,
          g = g + i * x[e];
        if (c.Ca) {
          for (; 0 > g;) g += c.c;
          for (; g >= c.c;) g -= c.c
        } else g >= c.c && (g = c.c - 1), 0 > g && (g = 0);
        c.U != g && (c.U = g, c.L = r)
      }
      if (0 != y[e]) {
        g = c.V;
        g += i * y[e];
        if (c.Ea) {
          for (; 0 > g;) g += c.i;
          for (; g >= c.i;) g -= c.i
        } else g >=
          c.i && (g = c.i - 1), 0 > g && (g = 0);
        c.V != g && (c.V = g, c.L = r)
      }
    }
  };
  this.Wa = function () {
    a.B(!a.q);
    a.q ? a.K.setAttribute("src", A + a.v + "/files/GoFixedSizeIcon.png") : a.K.setAttribute("src", A + a.v + "/files/GoFullScreenIcon.png")
  };
  this.B = function (b) {
    a.q = b;
    a.q ? (u.style.position = "absolute", b = E(), u.style.left = window.pageXOffset - b.x + k.left + "px", u.style.top = window.pageYOffset - b.y + k.top + "px", document.body.style.overflow = "hidden") : (u.style.position = "relative", u.style.left = "0px", u.style.top = "0px", document.body.style.overflow = "");
    K()
  };
  this.Ja = function () {
    var b = new Image;
    b.src = a.H.src;
    a.z[a.P] = b;
    b = a.w[a.P];
    a.t[b] = a.u[b];
    a.u[b] = -1;
    a.P++;
    c.L = r;
    a.P == c.s && (a.Y = a.h, 0 < a.h && a.h--, a.Ka())
  };
  this.Ta = function () {
    if (a.Y != a.h) {
      var b = a.w[a.P]; - 1 == a.u[b] && a.t[b] != a.h && (a.H.setAttribute("src", a.n[a.h][b]), a.u[b] = a.h)
    }
  };
  this.wa = function (b) {
    var c = E();
    a.cursor.x = b.pageX - c.x + k.left;
    a.cursor.y = b.pageY - c.y + k.top;
    1 == j.d ? aa(b.pageX, b.pageY) : 2 == j.d ? (D.start.x = a.cursor.x, D.start.y = a.cursor.y, d.A = a.C(), a.e = a.cursor.x - 0.5 * v.width, a.f = a.cursor.y - 0.5 * v.height,
      a.e *= a.R, a.f *= a.R, a.e -= d.j, a.f -= d.k, a.e /= d.A, a.f /= d.A) : 3 == j.d && (D.start.x = a.cursor.x, D.start.y = a.cursor.y, d.m.x = 0, d.m.y = 0)
  };
  this.Ga = function (b) {
    a.T(d.p * Math.exp(-b / 50))
  };
  this.C = function () {
    return d.p
  };
  this.T = function (a) {
    a > d.ja / d.g && (a = d.ja / d.g);
    a < d.ka / d.g && (a = d.ka / d.g);
    d.p = a
  };
  this.ab = function (a, b, c, d) {
    k.left = a;
    k.top = b;
    k.right = c;
    k.bottom = d;
    K()
  };
  this.Ua = function (b, c) {
    a.q && (b = window.innerWidth, c = window.innerHeight);
    var d = b - k.left - k.right,
      e = c - k.top - k.bottom;
    v.width = d;
    v.height = e;
    p.style.width = d + "px";
    p.style.height =
      e + "px";
    p.style.left = k.left + "px";
    p.style.top = k.top + "px";
    $();
    l.style.width = b + "px";
    l.style.height = c + "px";
    l.Aa && l.Aa(b, c)
  };
  this.W = function (a) {
    m(a, "mousedown", F);
    m(a, "mousemove", L);
    m(a, "mouseup", M)
  };
  this.ca = function (a) {
    N(a, "mousedown", F);
    N(a, "mousemove", L);
    N(a, "mouseup", M)
  };
  this.Ra = function () {
    a.r && (a.r.style.visibility = "hidden", a.ca(a.r), a.ca(a.Q), a.ca(a.o))
  };
  this.Ka = function () {
    a.G.style.visibility = "hidden";
    a.ca(a.G)
  };
  var ya = window.requestAnimationFrame || window.webkitRequestAnimationFrame || window.mozRequestAnimationFrame ||
    window.oRequestAnimationFrame || window.msRequestAnimationFrame || function (a) {
      window.setTimeout(a, 10)
    };
  this.ua = function () {
    a.r = document.createElement("div");
    a.W(a.r);
    a.r.Z = function () {
      this.parentNode && (this.style.left = "16px", this.style.top = "16px")
    };
    b = "position:absolute;";
    b += "left: 0px;";
    b += "top:  0px;";
    b += "width: 80px;";
    b += "height: 80px;";
    b += z + "transform-origin: 50% 50%;";
    b += "visibility: inherit;";
    a.r.setAttribute("style", b);
    a.Q = document.createElement("div");
    a.W(a.Q);
    b = "position:absolute;";
    b += "left: 0px;";
    b += "top:  29px;";
    b += "width: 80px;";
    b += "height: 80px;";
    b += z + "transform-origin: 50% 50%;";
    b += "opacity: 1.0;";
    b += "visibility: inherit;";
    b += "border: 0px solid #000000;";
    b += "color: #ffffff;";
    b += "text-align: left;";
    b += "white-space: nowrap;";
    b += "padding: 0px 0px 0px 0px;";
    b += "overflow: hidden;";
    a.Q.setAttribute("style", b);
    a.o = document.createElement("div");
    a.W(a.o);
    a.o.ba = {
      Ma: 0,
      Na: 0,
      ia: 0,
      Oa: 1,
      Pa: 1,
      cb: 1
    };
    b = "position:absolute;";
    b += "left: 0px;";
    b += "top:  0px;";
    b += "width: 80px;";
    b += "height: 80px;";
    b += z + "transform-origin: 50% 50%;";
    b += "opacity: 1.0;";
    b += "visibility: inherit;";
    b += "border: 0px solid #000000;";
    b += "color: #ffffff;";
    b += "text-align: left;";
    b += "white-space: nowrap;";
    b += "padding: 0px 0px 0px 0px;";
    b += "overflow: hidden;";
    a.o.setAttribute("style", b);
    a.o.innerHTML = '<img src="' + A + a.v + '/files/ks_logo.png"></img>';
    a.r.appendChild(a.o);
    a.r.appendChild(a.Q);
    l.appendChild(a.r);
    a.B(a.q);
    setTimeout(function () {
      a.B(a.q)
    }, 10)
  };
  this.Sa = function (b) {
    if (a.r) {
      a.Q.innerHTML = "<center>" + parseInt(100 * b) + "</center>";
      a.o.ba.ia += 2.1;
      b = "";
      if (a.o.ba) var c =
        a.o.ba,
      b = b + ("translate(" + c.Ma + "px," + c.Na + "px) rotate(" + c.ia + "deg) scale(" + c.Oa + "," + c.Pa + ") ");
      a.o.style[J] = b + "scale(1.0,1.0)"
    }
  };
  this.ta = function () {
    m(window, "resize", K);
    if (V())
      if (m(window, "mousewheel", O), m(window, "keydown", da), /Tablet PC/i.test(navigator.userAgent)) {
        var b = new MSGesture;
        b.target = a.l;
        a.l.Ia = b;
        a.l.Ia.pointerType = t;
        a.l.eb = [];
        m(a.l, "MSPointerDown", wa);
        m(a.l, "MSPointerMove", va);
        m(a.l, "MSPointerUp", ua)
      } else m(q, "mousedown", F), m(q, "mousemove", L), m(document, "mouseup", M);
      else l.addEventListener &&
        (m(l, "mousedown", F), m(document, "mouseup", M), m(l, "mousewheel", O), m(document, "keydown", da), m(q, "mousedown", F), m(l, "mousemove", L), m(l, "touchstart", Y), m(l, "touchmove", X), m(l, "touchcancel", xa), m(l, "touchend", W), m(l, "DOMMouseScroll", O), m(window, "orientationchange", Z));
    P()
  };
  if (document.createElement("canvas").getContext) {
    var a = this,
      u = a.l = t,
      p = t,
      ga = t,
      l = t,
      q = t;
    a.q = S;
    a.v = s;
    a.bb = B;
    a.aa = B;
    a.X = ta;
    a.fb = 0;
    a.O = 0;
    a.Xa = parseFloat(ma);
    a.Ya = parseFloat(na);
    a.za = 1;
    a.P = 0;
    a.Y = -1;
    a.h = 0;
    var k = {
      left: 0,
      top: 0,
      right: 0,
      bottom: 0
    },
      c = {
        U: 0,
        V: 0,
        c: 1,
        i: 1,
        ra: 0,
        sa: 0,
        F: 0,
        fa: 0,
        ga: 0,
        L: B,
        s: 0,
        D: 0,
        Ca: r,
        Ea: B
      };
    G || (G = 0);
    H || (H = 0);
    c.ra = G;
    c.sa = H;
    c.U = G;
    c.V = H;
    c.c = C;
    c.i = ja;
    c.Ca = ka;
    c.Ea = la;
    c.D = 0;
    c.s = c.c * c.i;
    ra && (a.h = 1, c.D = 2);
    var w = {
      width: 0,
      height: 0
    };
    w.width = Q;
    w.height = R;
    var z = "",
      J = "transform",
      v = {
        x: 640,
        y: 480
      }, d = {
        p: 1,
        A: 1,
        a: -1,
        j: 0,
        k: 0,
        xa: -1,
        ya: -1,
        g: 1,
        ka: 1,
        ja: 1,
        m: {
          x: 0,
          y: 0
        },
        pa: B
      };
    d.ka = parseFloat(oa);
    d.ja = parseFloat(pa);
    var n = {
      start: {
        x: 0,
        y: 0
      },
      a: {
        x: 0,
        y: 0
      },
      La: {
        x: 0,
        y: 0
      },
      p: {
        x: 0,
        y: 0
      },
      b: {
        x: 0,
        y: 0
      }
    }, D = {
        start: {
          x: 0,
          y: 0
        }
      }, j = {
        d: 0,
        start: {
          x: 0,
          y: 0
        },
        a: {
          x: 0,
          y: 0
        },
        La: {
          x: 0,
          y: 0
        },
        p: {
          x: 0,
          y: 0
        },
        b: {
          x: 0,
          y: 0
        },
        da: {
          x: 0,
          y: 0
        },
        ea: {
          x: 0,
          y: 0
        }
      }, h = {
        a: {
          x: 0,
          y: 0
        },
        b: {
          x: 0,
          y: 0
        },
        M: 0.96
      };
    h.M = qa;
    a.cursor = {
      x: 0,
      y: 0
    };
    var x = [],
      y = [];
    x[0] = 0;
    y[0] = 1;
    x[1] = 1;
    y[1] = 1;
    x[2] = 1;
    y[2] = 0;
    x[3] = 1;
    y[3] = -1;
    x[4] = 0;
    y[4] = -1;
    x[5] = -1;
    y[5] = -1;
    x[6] = -1;
    y[6] = 0;
    x[7] = -1;
    y[7] = 1;
    a.e = 0;
    a.f = 0;
    a.oa = 0;
    a.z = [];
    a.Qa = [];
    a.w = [];
    a.u = [];
    a.t = [];
    a.Da = [];
    for (s = 0; s < c.s; s++) a.u[s] = -1, a.t[s] = -1;
    a.n = [];
    a.n[0] = [];
    for (s = 1; s < c.D; s++) a.n[s] = [];
    s = ["Webkit", "Moz", "0", "ms", "Ms"];
    for (C = 0; C < s.length; C++) "undefined" != typeof document.documentElement.style[s[C] +
      "Transform"] && (z = "-" + s[C].toLowerCase() + "-", J = s[C] + "Transform");
    var b = "";
    a.l = document.getElementById(ha);
    b = "width: " + Q + "px;";
    b += "height: " + R + "px;";
    b += "max-width: 100%;";
    a.l.setAttribute("style", b);
    u = document.createElement("div");
    u.setAttribute("id", "viewwindow");
    b = "top:  0px;";
    b += "left: 0px;";
    b += "position: relative;";
    u.setAttribute("style", b);
    a.l.appendChild(u);
    p = document.createElement("div");
    p.setAttribute("id", "turntable");
    b = "top:  0px;";
    b += "left: 0px;";
    b += "overflow: hidden;";
    b += "position:absolute;";
    b += z + "user-select: none;";
    p.setAttribute("style", b);
    u.appendChild(p);
    q = document.createElement("img");
    q.setAttribute("id", "backbuffer");
    b = "top:  0px;";
    b += "left: 0px;";
    b += "position:absolute;";
    b += z + "user-select: none;";
    q.setAttribute("style", b);
    p.appendChild(q);
    ga = q;
    l = document.createElement("div");
    a.N = l;
    b = "top:  0px;";
    b += "left: 0px;";
    b += "width:  100px;";
    b += "height: 100px;";
    b += "overflow: hidden;";
    b += "position:absolute;";
    b += "z-index: 522;";
    b += z + "user-select: none;";
    l.setAttribute("style", b);
    u.appendChild(l);
    l.Aa = function (a, b) {
      var c = [];
      for (c.push(this); 0 < c.length;) {
        var d = c.pop();
        d.Z && d.Z(a, b);
        if (d.hasChildNodes())
          for (var g = 0; g < d.childNodes.length; g++) c.push(d.childNodes[g])
      }
    };
    this.G = document.createElement("div");
    b = "position:absolute;";
    b += "left: 0px;";
    b += "top:  0px;";
    b += "width: 256px;";
    b += "height: 256px;";
    b += "opacity: 0.0;";
    b += z + "transform-origin: 50% 50%;";
    b += "visibility: inherit;";
    this.G.setAttribute("style", b);
    this.H = document.createElement("img");
    this.H.setAttribute("width", 256);
    this.H.setAttribute("height",
      256);
    this.H.onload = function () {
      a.Ja()
    };
    a.W(this.G);
    this.G.appendChild(this.H);
    l.appendChild(this.G);
    this.backgroundColor = p.style.backgroundColor = ia;
    sa && (a.S = document.createElement("div"), b = "position:absolute;", b += "width: 38px;", b += "height: 32px;", b += z + "transform-origin: 50% 50%;", b += "visibility: inherit;", b += "cursor: pointer;", a.S.setAttribute("style", b), a.K = document.createElement("img"), a.q ? a.K.setAttribute("src", A + a.v + "/files/GoFixedSizeIcon.png") : a.K.setAttribute("src", A + a.v + "/files/GoFullScreenIcon.png"),
      a.K.setAttribute("style", "position: absolute;top: 0px;left: 0px;width: 38px;height: 32px;"), a.S.appendChild(a.K), a.S.Z = function (a, b) {
        this.style.left = a - 38 + "px";
        this.style.top = b - 32 + "px"
      }, a.S.onclick = function () {
        a.Wa()
      }, a.N.appendChild(a.S));
    a.X ? (a.J = document.createElement("div"), b = "position:absolute;", b += "width: 92px;", b += "height: 92px;", b += z + "transform-origin: 50% 50%;", b += "visibility: inherit;", b += "cursor: pointer;", a.J.setAttribute("style", b), a.na = document.createElement("img"), a.na.setAttribute("src",
      A + a.v + "/files/play_arrow.png"), a.na.setAttribute("style", "position: absolute;top: 0px;left: 0px;width: 92px;height: 92px;"), a.J.appendChild(a.na), a.J.Z = function (a, b) {
      this.style.left = 0.5 * a - 46 + "px";
      this.style.top = 0.5 * b - 46 + "px"
    }, a.J.onclick = function () {
      a.J.style.visibility = "hidden";
      U && a.ua();
      a.aa = r;
      for (var b = 0; b < a.za; b++) a.ha();
      a.ta()
    }, a.N.appendChild(a.J)) : (a.X = r, a.aa = r, U && a.ua(), a.ta());
    a.B(S);
    a.R = 1 / d.g;
    a.T(a.R);
    this.Fa();
    a.ha();
    setTimeout(function () {
      P()
    }, 10);
    setTimeout(function () {
      K()
    }, 15)
  } else alert("Your browser must support HTML5 to show KeyShotVR")
};