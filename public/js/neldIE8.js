/* Modernizr 2.7.1 (Custom Build) | MIT & BSD
 * Build: http://modernizr.com/download/#-backgroundsize-borderradius-boxshadow-flexbox-flexboxlegacy-hsla-multiplebgs-opacity-rgba-textshadow-cssanimations-csscolumns-generatedcontent-cssgradients-cssreflections-csstransforms-csstransforms3d-csstransitions-audio-video-svg-touch-shiv-mq-cssclasses-prefixed-teststyles-testprop-testallprops-hasevent-prefixes-domprefixes
 */
;
window.Modernizr = function(a, b, c) {
    function D(a) {
        j.cssText = a
    }

    function E(a, b) {
        return D(n.join(a + ";") + (b || ""))
    }

    function F(a, b) {
        return typeof a === b
    }

    function G(a, b) {
        return !!~("" + a).indexOf(b)
    }

    function H(a, b) {
        for (var d in a) {
            var e = a[d];
            if (!G(e, "-") && j[e] !== c) return b == "pfx" ? e : !0
        }
        return !1
    }

    function I(a, b, d) {
        for (var e in a) {
            var f = b[a[e]];
            if (f !== c) return d === !1 ? a[e] : F(f, "function") ? f.bind(d || b) : f
        }
        return !1
    }

    function J(a, b, c) {
        var d = a.charAt(0).toUpperCase() + a.slice(1),
            e = (a + " " + p.join(d + " ") + d).split(" ");
        return F(b, "string") || F(b, "undefined") ? H(e, b) : (e = (a + " " + q.join(d + " ") + d).split(" "), I(e, b, c))
    }
    var d = "2.7.1",
        e = {},
        f = !0,
        g = b.documentElement,
        h = "modernizr",
        i = b.createElement(h),
        j = i.style,
        k, l = ":)",
        m = {}.toString,
        n = " -webkit- -moz- -o- -ms- ".split(" "),
        o = "Webkit Moz O ms",
        p = o.split(" "),
        q = o.toLowerCase().split(" "),
        r = {
            svg: "http://www.w3.org/2000/svg"
        },
        s = {},
        t = {},
        u = {},
        v = [],
        w = v.slice,
        x, y = function(a, c, d, e) {
            var f, i, j, k, l = b.createElement("div"),
                m = b.body,
                n = m || b.createElement("body");
            if (parseInt(d, 10))
                while (d--) j = b.createElement("div"), j.id = e ? e[d] : h + (d + 1), l.appendChild(j);
            return f = ["&#173;", '<style id="s', h, '">', a, "</style>"].join(""), l.id = h, (m ? l : n).innerHTML += f, n.appendChild(l), m || (n.style.background = "", n.style.overflow = "hidden", k = g.style.overflow, g.style.overflow = "hidden", g.appendChild(n)), i = c(l, a), m ? l.parentNode.removeChild(l) : (n.parentNode.removeChild(n), g.style.overflow = k), !!i
        },
        z = function(b) {
            var c = a.matchMedia || a.msMatchMedia;
            if (c) return c(b).matches;
            var d;
            return y("@media " + b + " { #" + h + " { position: absolute; } }", function(b) {
                d = (a.getComputedStyle ? getComputedStyle(b, null) : b.currentStyle)["position"] == "absolute"
            }), d
        },
        A = function() {
            function d(d, e) {
                e = e || b.createElement(a[d] || "div"), d = "on" + d;
                var f = d in e;
                return f || (e.setAttribute || (e = b.createElement("div")), e.setAttribute && e.removeAttribute && (e.setAttribute(d, ""), f = F(e[d], "function"), F(e[d], "undefined") || (e[d] = c), e.removeAttribute(d))), e = null, f
            }
            var a = {
                select: "input",
                change: "input",
                submit: "form",
                reset: "form",
                error: "img",
                load: "img",
                abort: "img"
            };
            return d
        }(),
        B = {}.hasOwnProperty,
        C;
    !F(B, "undefined") && !F(B.call, "undefined") ? C = function(a, b) {
        return B.call(a, b)
    } : C = function(a, b) {
        return b in a && F(a.constructor.prototype[b], "undefined")
    }, Function.prototype.bind || (Function.prototype.bind = function(b) {
        var c = this;
        if (typeof c != "function") throw new TypeError;
        var d = w.call(arguments, 1),
            e = function() {
                if (this instanceof e) {
                    var a = function() {};
                    a.prototype = c.prototype;
                    var f = new a,
                        g = c.apply(f, d.concat(w.call(arguments)));
                    return Object(g) === g ? g : f
                }
                return c.apply(b, d.concat(w.call(arguments)))
            };
        return e
    }), s.flexbox = function() {
        return J("flexWrap")
    }, s.flexboxlegacy = function() {
        return J("boxDirection")
    }, s.touch = function() {
        var c;
        return "ontouchstart" in a || a.DocumentTouch && b instanceof DocumentTouch ? c = !0 : y(["@media (", n.join("touch-enabled),("), h, ")", "{#modernizr{top:9px;position:absolute}}"].join(""), function(a) {
            c = a.offsetTop === 9
        }), c
    }, s.rgba = function() {
        return D("background-color:rgba(150,255,150,.5)"), G(j.backgroundColor, "rgba")
    }, s.hsla = function() {
        return D("background-color:hsla(120,40%,100%,.5)"), G(j.backgroundColor, "rgba") || G(j.backgroundColor, "hsla")
    }, s.multiplebgs = function() {
        return D("background:url(https://),url(https://),red url(https://)"), /(url\s*\(.*?){3}/.test(j.background)
    }, s.backgroundsize = function() {
        return J("backgroundSize")
    }, s.borderradius = function() {
        return J("borderRadius")
    }, s.objectfit = function() {
        return J("objectFit")
    }, s.boxshadow = function() {
        return J("boxShadow")
    }, s.textshadow = function() {
        return b.createElement("div").style.textShadow === ""
    }, s.opacity = function() {
        return E("opacity:.55"), /^0.55$/.test(j.opacity)
    }, s.cssanimations = function() {
        return J("animationName")
    }, s.csscolumns = function() {
        return J("columnCount")
    }, s.cssgradients = function() {
        var a = "background-image:",
            b = "gradient(linear,left top,right bottom,from(#9f9),to(white));",
            c = "linear-gradient(left top,#9f9, white);";
        return D((a + "-webkit- ".split(" ").join(b + a) + n.join(c + a)).slice(0, -a.length)), G(j.backgroundImage, "gradient")
    }, s.cssreflections = function() {
        return J("boxReflect")
    }, s.csstransforms = function() {
        return !!J("transform")
    }, s.csstransforms3d = function() {
        var a = !!J("perspective");
        return a && "webkitPerspective" in g.style && y("@media (transform-3d),(-webkit-transform-3d){#modernizr{left:9px;position:absolute;height:3px;}}", function(b, c) {
            a = b.offsetLeft === 9 && b.offsetHeight === 3
        }), a
    }, s.csstransitions = function() {
        return J("transition")
    }, s.generatedcontent = function() {
        var a;
        return y(["#", h, "{font:0/0 a}#", h, ':after{content:"', l, '";visibility:hidden;font:3px/1 a}'].join(""), function(b) {
            a = b.offsetHeight >= 3
        }), a
    }, s.video = function() {
        var a = b.createElement("video"),
            c = !1;
        try {
            if (c = !!a.canPlayType) c = new Boolean(c), c.ogg = a.canPlayType('video/ogg; codecs="theora"').replace(/^no$/, ""), c.h264 = a.canPlayType('video/mp4; codecs="avc1.42E01E"').replace(/^no$/, ""), c.webm = a.canPlayType('video/webm; codecs="vp8, vorbis"').replace(/^no$/, "")
        } catch (d) {}
        return c
    }, s.audio = function() {
        var a = b.createElement("audio"),
            c = !1;
        try {
            if (c = !!a.canPlayType) c = new Boolean(c), c.ogg = a.canPlayType('audio/ogg; codecs="vorbis"').replace(/^no$/, ""), c.mp3 = a.canPlayType("audio/mpeg;").replace(/^no$/, ""), c.wav = a.canPlayType('audio/wav; codecs="1"').replace(/^no$/, ""), c.m4a = (a.canPlayType("audio/x-m4a;") || a.canPlayType("audio/aac;")).replace(/^no$/, "")
        } catch (d) {}
        return c
    }, s.svg = function() {
        return !!b.createElementNS && !!b.createElementNS(r.svg, "svg").createSVGRect
    };
    for (var K in s) C(s, K) && (x = K.toLowerCase(), e[x] = s[K](), v.push((e[x] ? "" : "no-") + x));
    return e.addTest = function(a, b) {
            if (typeof a == "object")
                for (var d in a) C(a, d) && e.addTest(d, a[d]);
            else {
                a = a.toLowerCase();
                if (e[a] !== c) return e;
                b = typeof b == "function" ? b() : b, typeof f != "undefined" && f && (g.className += " " + (b ? "" : "no-") + a), e[a] = b
            }
            return e
        }, D(""), i = k = null,
        function(a, b) {
            function l(a, b) {
                var c = a.createElement("p"),
                    d = a.getElementsByTagName("head")[0] || a.documentElement;
                return c.innerHTML = "x<style>" + b + "</style>", d.insertBefore(c.lastChild, d.firstChild)
            }

            function m() {
                var a = s.elements;
                return typeof a == "string" ? a.split(" ") : a
            }

            function n(a) {
                var b = j[a[h]];
                return b || (b = {}, i++, a[h] = i, j[i] = b), b
            }

            function o(a, c, d) {
                c || (c = b);
                if (k) return c.createElement(a);
                d || (d = n(c));
                var g;
                return d.cache[a] ? g = d.cache[a].cloneNode() : f.test(a) ? g = (d.cache[a] = d.createElem(a)).cloneNode() : g = d.createElem(a), g.canHaveChildren && !e.test(a) && !g.tagUrn ? d.frag.appendChild(g) : g
            }

            function p(a, c) {
                a || (a = b);
                if (k) return a.createDocumentFragment();
                c = c || n(a);
                var d = c.frag.cloneNode(),
                    e = 0,
                    f = m(),
                    g = f.length;
                for (; e < g; e++) d.createElement(f[e]);
                return d
            }

            function q(a, b) {
                b.cache || (b.cache = {}, b.createElem = a.createElement, b.createFrag = a.createDocumentFragment, b.frag = b.createFrag()), a.createElement = function(c) {
                    return s.shivMethods ? o(c, a, b) : b.createElem(c)
                }, a.createDocumentFragment = Function("h,f", "return function(){var n=f.cloneNode(),c=n.createElement;h.shivMethods&&(" + m().join().replace(/[\w\-]+/g, function(a) {
                    return b.createElem(a), b.frag.createElement(a), 'c("' + a + '")'
                }) + ");return n}")(s, b.frag)
            }

            function r(a) {
                a || (a = b);
                var c = n(a);
                return s.shivCSS && !g && !c.hasCSS && (c.hasCSS = !!l(a, "article,aside,dialog,figcaption,figure,footer,header,hgroup,main,nav,section{display:block}mark{background:#FF0;color:#000}template{display:none}")), k || q(a, c), a
            }
            var c = "3.7.0",
                d = a.html5 || {},
                e = /^<|^(?:button|map|select|textarea|object|iframe|option|optgroup)$/i,
                f = /^(?:a|b|code|div|fieldset|h1|h2|h3|h4|h5|h6|i|label|li|ol|p|q|span|strong|style|table|tbody|td|th|tr|ul)$/i,
                g, h = "_html5shiv",
                i = 0,
                j = {},
                k;
            (function() {
                try {
                    var a = b.createElement("a");
                    a.innerHTML = "<xyz></xyz>", g = "hidden" in a, k = a.childNodes.length == 1 || function() {
                        b.createElement("a");
                        var a = b.createDocumentFragment();
                        return typeof a.cloneNode == "undefined" || typeof a.createDocumentFragment == "undefined" || typeof a.createElement == "undefined"
                    }()
                } catch (c) {
                    g = !0, k = !0
                }
            })();
            var s = {
                elements: d.elements || "abbr article aside audio bdi canvas data datalist details dialog figcaption figure footer header hgroup main mark meter nav output progress section summary template time video",
                version: c,
                shivCSS: d.shivCSS !== !1,
                supportsUnknownElements: k,
                shivMethods: d.shivMethods !== !1,
                type: "default",
                shivDocument: r,
                createElement: o,
                createDocumentFragment: p
            };
            a.html5 = s, r(b)
        }(this, b), e._version = d, e._prefixes = n, e._domPrefixes = q, e._cssomPrefixes = p, e.mq = z, e.hasEvent = A, e.testProp = function(a) {
            return H([a])
        }, e.testAllProps = J, e.testStyles = y, e.prefixed = function(a, b, c) {
            return b ? J(a, b, c) : J(a, "pfx")
        }, g.className = g.className.replace(/(^|\s)no-js(\s|$)/, "$1$2") + (f ? " js " + v.join(" ") : ""), e
}(this, this.document);

