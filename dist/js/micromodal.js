!(function(e, t) {
	'object' == typeof exports && 'undefined' != typeof module
		? (module.exports = t())
		: 'function' == typeof define && define.amd
		? define(t)
		: ((e = e || self).MicroModal = t())
})(this, function() {
	'use strict'
	return (() => {
		const e = [
			'a[href]',
			'area[href]',
			'input:not([disabled]):not([type="hidden"]):not([aria-hidden])',
			'select:not([disabled]):not([aria-hidden])',
			'textarea:not([disabled]):not([aria-hidden])',
			'button:not([disabled]):not([aria-hidden])',
			'iframe',
			'object',
			'embed',
			'[contenteditable]',
			'[tabindex]:not([tabindex^="-"])'
		]
		class t {
			constructor({
				targetModal: e,
				triggers: t = [],
				onShow: o = () => {},
				onClose: i = () => {},
				openTrigger: n = 'data-micromodal-trigger',
				closeTrigger: s = 'data-micromodal-close',
				disableScroll: a = !1,
				disableFocus: l = !1,
				awaitCloseAnimation: d = !1,
				awaitOpenAnimation: r = !1,
				debugMode: c = !1
			}) {
				;(this.modal = document.getElementById(e)),
					(this.config = {
						debugMode: c,
						disableScroll: a,
						openTrigger: n,
						closeTrigger: s,
						onShow: o,
						onClose: i,
						awaitCloseAnimation: d,
						awaitOpenAnimation: r,
						disableFocus: l
					}),
					t.length > 0 && this.registerTriggers(...t),
					(this.onClick = this.onClick.bind(this)),
					(this.onKeydown = this.onKeydown.bind(this))
			}
			registerTriggers(...e) {
				e.filter(Boolean).forEach(e => {
					e.addEventListener('click', e => this.showModal(e))
				})
			}
			showModal() {
				if (
					((this.activeElement = document.activeElement),
					this.modal.setAttribute('aria-hidden', 'false'),
					this.modal.classList.add('is-open'),
					this.scrollBehaviour('disable'),
					this.addEventListeners(),
					this.config.awaitOpenAnimation)
				) {
					const e = () => {
						this.modal.removeEventListener('animationend', e, !1),
							this.setFocusToFirstNode()
					}
					this.modal.addEventListener('animationend', e, !1)
				} else this.setFocusToFirstNode()
				this.config.onShow(this.modal, this.activeElement)
			}
			closeModal() {
				const e = this.modal
				this.modal.setAttribute('aria-hidden', 'true'),
					this.removeEventListeners(),
					this.scrollBehaviour('enable'),
					this.activeElement && this.activeElement.focus(),
					this.config.onClose(this.modal),
					this.config.awaitCloseAnimation
						? this.modal.addEventListener(
								'animationend',
								function t() {
									e.classList.remove('is-open'),
										e.removeEventListener('animationend', t, !1)
								},
								!1
						  )
						: e.classList.remove('is-open')
			}
			closeModalById(e) {
				;(this.modal = document.getElementById(e)),
					this.modal && this.closeModal()
			}
			scrollBehaviour(e) {
				if (!this.config.disableScroll) return
				const t = document.querySelector('body')
				switch (e) {
					case 'enable':
						Object.assign(t.style, { overflow: '', height: '' })
						break
					case 'disable':
						Object.assign(t.style, { overflow: 'hidden', height: '100vh' })
				}
			}
			addEventListeners() {
				this.modal.addEventListener('touchstart', this.onClick),
					this.modal.addEventListener('click', this.onClick),
					document.addEventListener('keydown', this.onKeydown)
			}
			removeEventListeners() {
				this.modal.removeEventListener('touchstart', this.onClick),
					this.modal.removeEventListener('click', this.onClick),
					document.removeEventListener('keydown', this.onKeydown)
			}
			onClick(e) {
				e.target.hasAttribute(this.config.closeTrigger) &&
					(this.closeModal(), e.preventDefault())
			}
			onKeydown(e) {
				27 === e.keyCode && this.closeModal(e),
					9 === e.keyCode && this.maintainFocus(e)
			}
			getFocusableNodes() {
				const t = this.modal.querySelectorAll(e)
				return Array(...t)
			}
			setFocusToFirstNode() {
				if (this.config.disableFocus) return
				const e = this.getFocusableNodes()
				e.length && e[0].focus()
			}
			maintainFocus(e) {
				const t = this.getFocusableNodes()
				if (this.modal.contains(document.activeElement)) {
					const o = t.indexOf(document.activeElement)
					e.shiftKey &&
						0 === o &&
						(t[t.length - 1].focus(), e.preventDefault()),
						e.shiftKey ||
							o !== t.length - 1 ||
							(t[0].focus(), e.preventDefault())
				} else t[0].focus()
			}
		}
		let o = null
		const i = e => {
				if (!document.getElementById(e))
					return (
						console.warn(
							`MicroModal: ❗Seems like you have missed %c'${e}'`,
							'background-color: #f8f9fa;color: #50596c;font-weight: bold;',
							'ID somewhere in your code. Refer example below to resolve it.'
						),
						console.warn(
							'%cExample:',
							'background-color: #f8f9fa;color: #50596c;font-weight: bold;',
							`<div class="modal" id="${e}"></div>`
						),
						!1
					)
			},
			n = (e, t) => {
				if (
					((e => {
						if (e.length <= 0)
							console.warn(
								"MicroModal: ❗Please specify at least one %c'micromodal-trigger'",
								'background-color: #f8f9fa;color: #50596c;font-weight: bold;',
								'data attribute.'
							),
								console.warn(
									'%cExample:',
									'background-color: #f8f9fa;color: #50596c;font-weight: bold;',
									'<a href="#" data-micromodal-trigger="my-modal"></a>'
								)
					})(e),
					!t)
				)
					return !0
				for (var o in t) i(o)
				return !0
			}
		return {
			init: e => {
				const i = Object.assign(
						{},
						{ openTrigger: 'data-micromodal-trigger' },
						e
					),
					s = [...document.querySelectorAll(`[${i.openTrigger}]`)],
					a = ((e, t) => {
						const o = []
						return (
							e.forEach(e => {
								const i = e.attributes[t].value
								void 0 === o[i] && (o[i] = []), o[i].push(e)
							}),
							o
						)
					})(s, i.openTrigger)
				if (!0 !== i.debugMode || !1 !== n(s, a))
					for (var l in a) {
						let e = a[l]
						;(i.targetModal = l), (i.triggers = [...e]), (o = new t(i))
					}
			},
			show: (e, n) => {
				const s = n || {}
				;(s.targetModal = e),
					(!0 === s.debugMode && !1 === i(e)) || (o = new t(s)).showModal()
			},
			close: e => {
				e ? o.closeModalById(e) : o.closeModal()
			}
		}
	})()
})
