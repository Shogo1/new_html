;(this.fitie = function(t) {
	function e() {
		c.call(t, g + m, e)
		var a = {
			boxSizing: 'content-box',
			display: 'inline-block',
			overflow: 'hidden'
		}
		'backgroundColor backgroundImage borderColor borderStyle borderWidth bottom fontSize lineHeight height left opacity margin position right top visibility width'.replace(
			/\w+/g,
			function(t) {
				a[t] = l[t]
			}
		),
			(d.border = d.margin = d.padding = 0),
			(d.display = 'block'),
			(d.height = d.width = 'auto'),
			(d.opacity = 1)
		var h = t.videoWidth || t.width,
			s = t.videoHeight || t.height,
			u = h / s,
			v = document.createElement('object-fit')
		v.appendChild(t.parentNode.replaceChild(v, t))
		for (var p in a) v.runtimeStyle[p] = a[p]
		var b
		'fill' === i
			? f
				? ((d.width = o), (d.height = n))
				: ((d['-ms-transform-origin'] = '0% 0%'),
				  (d['-ms-transform'] = 'scale(' + o / h + ',' + n / s + ')'))
			: (r > u
				? 'contain' === i
				: 'cover' === i)
			? ((b = n * u),
			  (d.width = Math.round(b) + 'px'),
			  (d.height = n + 'px'),
			  (d.marginLeft = Math.round((o - b) / 2) + 'px'))
			: ((b = o / u),
			  (d.width = o + 'px'),
			  (d.height = Math.round(b) + 'px'),
			  (d.marginTop = Math.round((n - b) / 2) + 'px'))
	}
	var i = t.currentStyle['object-fit']
	if (i && /^(contain|cover|fill)$/.test(i)) {
		var o = t.clientWidth,
			n = t.clientHeight,
			r = o / n,
			a = t.nodeName.toLowerCase(),
			d = t.runtimeStyle,
			l = t.currentStyle,
			h = t.addEventListener || t.attachEvent,
			c = t.removeEventListener || t.detachEvent,
			g = t.addEventListener ? '' : 'on',
			f = 'img' === a,
			m = f ? 'load' : 'loadedmetadata'
		h.call(t, g + m, e), t.complete && e()
	}
}),
	(this.fitie.init = function() {
		if (document.body)
			for (var t = document.querySelectorAll('img,video'), e = -1; t[++e]; )
				fitie(t[e])
		else setTimeout(fitie.init)
	}),
	/MSIE|Trident/.test(navigator.userAgent) && this.fitie.init()
//# sourceMappingURL=fitie.js.map
