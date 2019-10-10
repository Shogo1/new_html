/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/*===================

ページスクロール

===================*/

$(function() {
	var headerHeight = $('.c-header').outerHeight() //.l-headerの高さを取得
	var urlHash = location.hash
	if (urlHash) {
		$('body,html')
			.stop()
			.scrollTop(0)
		setTimeout(function() {
			var target = $(urlHash)
			var position = target.offset().top - headerHeight //.l-headerの高さだけ引いている。レスポンシブ対応
			$('body,html')
				.stop()
				.animate({ scrollTop: position }, 400)
		}, 100)
	}
	$('a[href^="#"]').click(function() {
		var href = $(this).attr('href')
		var target = $(href)
		var position = target.offset().top - headerHeight
		$('body,html')
			.stop()
			.animate({ scrollTop: position }, 400)
	})
})

/*===================

ページスクロール発火

===================*/
$(function() {
	$(window).scroll(function() {
		$('.u-fadeAnimation').each(function() {
			var imgPos = $(this).offset().top
			var scroll = $(window).scrollTop()
			var windowHeight = $(window).height()
			if (scroll > imgPos - windowHeight + windowHeight / 8) {
				$(this).addClass('action')
			}
		})
	})
})

/*===================

nav toggle 開閉

===================*/

$('.c-header__navBox__toggle').click(function() {
	$(this).toggleClass('is-active')
	if ($(this).hasClass('is-active')) {
		$('.c-header__navBox__gnav').addClass('is-active')
	} else {
		$('.c-header__navBox__gnav').removeClass('is-active')
	}
})

/*===================

TOPへ戻るボタン
スクロールしたら表示

===================*/

$(function() {
	var $win = $(window),
		$arrow = $('.u-scrollArrow'),
		animationClass = 'u-scrollArrow--opacity'
	$win.on('load scroll', function() {
		var value = $(this).scrollTop()
		if (value > 300) {
			$arrow.addClass(animationClass)
		} else {
			$arrow.removeClass(animationClass)
		}
	})
})

/*===================

一定量スクロールしたら表示
ページ下部まできたら非表示

===================*/

$(function() {
	var showFlag = false
	var topBtn = $('.fadeInBox')
	topBtn.css('bottom', '-130px')
	var showFlag = false
	//スクロールが100に達したらボタン表示
	$(window).scroll(function() {
		if ($(this).scrollTop() > 100) {
			if (showFlag == false) {
				showFlag = true
				topBtn.stop().animate({ bottom: '0px' }, 200)
			}
		} else {
			if (showFlag) {
				showFlag = false
				topBtn.stop().animate({ bottom: '-130px' }, 200)
			}
		}
	})
})

/*=================================================

stickyNav JavaScript

==================================================*/

const stickyNav = function() {
	try {
		// スティッキーにする要素（ターゲット）
		const stickyTarget = document.querySelector('.js-sticky')
		// `.Nav`はターゲットの親として使用する
		const stickyTargetParent = document.querySelector('.js-stickyParent')
		// ターゲットのDOMRect
		const stickyTargetRect = stickyTarget.getBoundingClientRect()
		// ターゲット要素の本来のY座標（ページの左上基準）
		const stickyTargetPosY = getAbsolutePosY(stickyTarget)

		// 現在のスクロール量（Y方向）を取得する
		function getScrollY() {
			return window.scrollY || window.pageYOffset
			//.scrollYはIEに対応していないので、IE用に.pageYOffsetを記述
			//
		}

		// 親に高さをセットする
		// setHeight(stickyTargetParent, stickyTargetRect)

		// function getAbsolutePosY(domRect) {
		// 	const scrollY = getScrollY()
		// 	const offsetFromViewportTop = domRect.top
		// 	return scrollY + offsetFromViewportTop
		// }

		// function setHeight(element, domRect) {
		// 	element.style.height = domRect.height + 'px'
		// }

		// ターゲット要素のもともとのY座標を取得する
		function getAbsolutePosY(element) {
			const scrollY = getScrollY()
			const offsetFromViewportTop = element.getBoundingClientRect().top
			//getBoundingClientRect()メソッドで要素のサイズとビューポートからの位置を取得
			//必要なのはビューポートの上辺からの位置なのでelement.ggetBoundingClientRect().topとする
			//ここでのelementは.js-stickyのクラスを持つ要素
			return scrollY + offsetFromViewportTop
		}

		//以下、スクロールイベントの処理内容

		// ターゲット要素がfixedな状態かどうかを管理する変数
		let isFixed = false
		// fixed解除
		function unfixed() {
			// 解除済みだったら何もしない
			if (!isFixed) {
				return
			}
			//fixedだったら解除する
			stickyTarget.classList.remove('fixed')
			isFixed = false
		}
		// fixedにする
		function fixed() {
			// 既にfixedなら何もしない
			if (isFixed) {
				return
			}
			//fixedでないならfixedにする
			stickyTarget.classList.add('fixed')
			isFixed = true
		}

		// イベントハンドラ
		function onScroll(event) {
			// 現在のY方向スクロール量
			const currentScrollY = getScrollY()
			// スクロール量とターゲット要素の元の位置を比較して、
			// スクロール量のほうが小さければfixed解除
			// そうでなければfixedにする
			if (currentScrollY < stickyTargetPosY) {
				//スクロール量が小さい　=　js-stickyクラスが付与されている要素が画面上部にきていない
				unfixed()
			} else {
				fixed()
			}
		}

		window.addEventListener('scroll', onScroll, false)
	} catch (error) {}
}

stickyNav()

/*===================

offcanvas　クラス追加

===================*/

const offCanvas = function() {
	try {
		const openButton = document.querySelector('.js-openOffcanvas')
		const drawer = document.querySelector('.js-offcanvasWrap')
		const closeButton = drawer.querySelector('.js-closeOffcanvas')
		const backdrop = drawer.querySelector('.js-offCanvasOverlay')
		const scrollbarFixTargets = document.querySelectorAll('.js-scrollbarFix')

		//開閉時のクラスの付け替え関連の変数
		const rootElement = document.documentElement
		const scrollLockModifier = 'offCanvasOpen'

		// 現在の状態（開いていたらtrue）
		let offCanvasOpen = false

		//headerがfixedして追従する場合の関数
		// valueは文字列
		const addScrollbarMargin = function(value) {
			const targetsLength = scrollbarFixTargets.length
			for (let i = 0; i < targetsLength; i++) {
				scrollbarFixTargets[i].style.marginRight = value
			}
		}

		// stateは真偽値
		const changeAriaExpanded = function(state) {
			const value = state ? 'true' : 'false'
			drawer.setAttribute('aria-expanded', value)
			openButton.setAttribute('aria-expanded', value)
			closeButton.setAttribute('aria-expanded', value)
		}

		// stateは真偽値
		const changeState = function(state) {
			if (state === offCanvasOpen) {
				console.log('2回以上連続で同じ状態に変更しようとしました')
				return
			}
			changeAriaExpanded(state)
			offCanvasOpen = state
		}

		const addScrollbarWidth = function() {
			//scrollバーの幅を取得　ウィンドウ幅 - html領域の幅
			const scrollbarWidth = window.innerWidth - rootElement.clientWidth
			//bodyのスタイルmargin-rightに取得した幅を追加
			//addScrollbarMargin関数を使う場合は↓2行を追加
			const value = scrollbarWidth + 'px'
			addScrollbarMargin(value)
			//addScrollbarMargin関数を使う場合は↓削除
			// document.body.style.marginRight = scrollbarWidth + 'px'
		}

		const removeScrollbarWidth = function() {
			//bodyのスタイルmargin-rightを削除
			//addScrollbarMargin関数を使う場合は↓追加
			addScrollbarMargin('')
			//addScrollbarMargin関数を使う場合は↓削除
			// document.body.style.marginRight = ''
		}

		//開閉時のクラスの付け替え関連の関数
		const activateScrollLock = function() {
			addScrollbarWidth()
			//OffCanvasクラスの追加
			rootElement.classList.add(scrollLockModifier)
		}

		//開閉時のクラスの付け替え関連の関数
		const deactivateScrollLock = function() {
			removeScrollbarWidth()
			//OffCanvasクラスの削除
			rootElement.classList.remove(scrollLockModifier)
		}

		const openDrawer = function() {
			changeState(true)
		}

		const closeDrawer = function() {
			changeState(false)
		}

		const onClickOpenButton = function() {
			activateScrollLock()
			openDrawer()
		}

		//開閉時のクラスの付け替え関連の関数
		const onTransitionendDrawer = function(event) {
			if (event.target !== drawer || event.propertyName !== 'visibility') {
				return
			}
			if (!offCanvasOpen) {
				// offCanvasが開いていたら実行
				// デフォルトがOffcanvasOpen = falseなので
				deactivateScrollLock()
			}
		}

		const onClickCloseButton = function() {
			closeDrawer()
		}

		openButton.addEventListener('click', onClickOpenButton, false)
		closeButton.addEventListener('click', onClickCloseButton, false)
		backdrop.addEventListener('click', onClickCloseButton, false)
		drawer.addEventListener('transitionend', onTransitionendDrawer, false)
	} catch (error) {}
}

offCanvas()

/*===================

modal　クラス追加

===================*/

const modal = function() {
	try {
		const openButton = document.querySelector('.js-openModal')
		const modalBox = document.querySelector('.js-modalWrap')
		const closeButton = modalBox.querySelector('.js-closeModal')
		const backdrop = modalBox.querySelector('.js-modalOverlay')
		const scrollbarFixTargets = document.querySelectorAll('.js-scrollbarFix')

		//開閉時のクラスの付け替え関連の変数
		const rootElement = document.documentElement
		const scrollLockModifier = 'modalOpen'

		// 現在の状態（開いていたらtrue）
		let modalOpen = false

		//headerがfixedして追従する場合の関数
		// valueは文字列
		const addScrollbarMargin = function(value) {
			const targetsLength = scrollbarFixTargets.length
			for (let i = 0; i < targetsLength; i++) {
				scrollbarFixTargets[i].style.marginRight = value
			}
		}

		// stateは真偽値
		const changeAriaExpanded = function(state) {
			const value = state ? 'true' : 'false'
			modalBox.setAttribute('aria-expanded', value)
			openButton.setAttribute('aria-expanded', value)
			closeButton.setAttribute('aria-expanded', value)
		}

		// stateは真偽値
		const changeState = function(state) {
			if (state === modalOpen) {
				console.log('2回以上連続で同じ状態に変更しようとしました')
				return
			}
			changeAriaExpanded(state)
			modalOpen = state
		}

		const addScrollbarWidth = function() {
			//scrollバーの幅を取得　ウィンドウ幅 - html領域の幅
			const scrollbarWidth = window.innerWidth - rootElement.clientWidth
			//bodyのスタイルmargin-rightに取得した幅を追加
			//addScrollbarMargin関数を使う場合は↓2行を追加
			const value = scrollbarWidth + 'px'
			addScrollbarMargin(value)
			//addScrollbarMargin関数を使う場合は↓削除
			// document.body.style.marginRight = scrollbarWidth + 'px'
		}

		const removeScrollbarWidth = function() {
			//bodyのスタイルmargin-rightを削除
			//addScrollbarMargin関数を使う場合は↓追加
			addScrollbarMargin('')
			//addScrollbarMargin関数を使う場合は↓削除
			// document.body.style.marginRight = ''
		}

		//開閉時のクラスの付け替え関連の関数
		const activateScrollLock = function() {
			addScrollbarWidth()
			//OffCanvasクラスの追加
			rootElement.classList.add(scrollLockModifier)
		}

		//開閉時のクラスの付け替え関連の関数
		const deactivateScrollLock = function() {
			removeScrollbarWidth()
			//OffCanvasクラスの削除
			rootElement.classList.remove(scrollLockModifier)
		}

		const openModal = function() {
			changeState(true)
		}

		const closeModal = function() {
			changeState(false)
		}

		const onClickOpenButton = function() {
			activateScrollLock()
			openModal()
		}

		//開閉時のクラスの付け替え関連の関数
		const onTransitionendModal = function(event) {
			if (event.target !== modalBox || event.propertyName !== 'visibility') {
				return
			}
			if (!modalOpen) {
				// offCanvasが開いていたら実行
				// デフォルトがOffcanvasOpen = falseなので
				deactivateScrollLock()
			}
		}

		const onClickCloseButton = function() {
			closeModal()
		}

		openButton.addEventListener('click', onClickOpenButton, false)
		closeButton.addEventListener('click', onClickCloseButton, false)
		backdrop.addEventListener('click', onClickCloseButton, false)
		modalBox.addEventListener('transitionend', onTransitionendModal, false)
	} catch (error) {}
}

modal()

/*=================================================

tabUI

==================================================*/

const tabUI = function() {
	try {
		// タブUIのルート
		const tabUIRoot = document.querySelector('.js-tabUI')
		// すべてのタブ
		const tabs = tabUIRoot.querySelectorAll('.js-tab')
		// すべてのタブパネル
		const panels = tabUIRoot.querySelectorAll('.js-tabPanel')
		// タブの数
		const tabsLength = tabs.length

		/*===================

特特定のタブがすべてのタブtabsの何番目（何番目のindex）なのかを取得する関数

===================*/

		const getIndexOfTab = function(tabElement) {
			let matchedIndex = -1
			for (let i = 0; i < tabsLength; i++) {
				if (tabs[i] === tabElement) {
					matchedIndex = i
					break
				}
			}
			return matchedIndex
		}

		/*===================

切り替え処理

===================*/

		// 現在選択されているタブのインデックス
		// 初期化時に選択されているタブのインデックスで更新する
		let currentSelectedTabIndex

		// 現在選択されているタブのインデックスを返す
		const getCurrentSelectedTabIndex = function() {
			return currentSelectedTabIndex
		}

		// 現在選択されているタブのインデックスを設定する
		const setCurrentSelectedTabIndex = function(index) {
			currentSelectedTabIndex = index
		}

		// タブをクリックしたときのイベントハンドラ
		const onClickTab = function(event) {
			const clickedTab = event.currentTarget
			const clickedIndex = getIndexOfTab(clickedTab)
			const currentIndex = getCurrentSelectedTabIndex()
			// クリックされたタブが現在選択されているものと同じなら何もしない
			if (clickedIndex === currentIndex) {
				return
			}
			// タブとタブパネルを切り替える
			changeTab(clickedIndex, currentIndex)
			// 現在選択されているタブのインデックスを更新
			setCurrentSelectedTabIndex(clickedIndex)
		}

		// タブとタブパネルの状態切り替え
		const changeTab = function(nextIndex, currentIndex) {
			const nextTab = tabs[nextIndex]
			const nextPanel = panels[nextIndex]
			show(nextTab, nextPanel)
			// 初期化時は現在選択されているインデックスが存在しない
			if (currentIndex > -1) {
				const currentTab = tabs[currentIndex]
				const currentPanel = panels[currentIndex]
				hide(currentTab, currentPanel)
			}
		}

		// タブを選択状態にし、タブパネルを表示する
		const show = function(tab, panel) {
			tab.setAttribute('aria-selected', 'true')
			tab.removeAttribute('tabindex')
			panel.setAttribute('aria-hidden', 'false')
		}

		// タブを非選択状態にし、タブパネルを非表示にする
		const hide = function(tab, panel) {
			tab.setAttribute('aria-selected', 'false')
			tab.setAttribute('tabindex', '-1')
			panel.setAttribute('aria-hidden', 'true')
		}

		/*===================

		20191008追記
		[aria-hidden='false']の高さを取得

===================*/

		// let aaa = function() {
		// 	// let getTabElement = document.querySelector('[aria-hidden="false"]')
		// 	// getTabElement.addEventListener('click')
		// 	let getTestHeight = document.querySelector('[aria-hidden="false"]')
		// 		.clientHeight
		// 	let elem = document.querySelector('.c-tabUI__body')
		// 	elem.style.height = getTestHeight + 'px'
		// }

		// const getTabElement = document.querySelector('[aria-hidden="false"]')
		// getTabElement.addEventListener('click', aaa(), false)

		/*===================

初期化

===================*/

		// タブが選択状態かどうか
		const isSelectedTab = function(tab) {
			const ariaSelected = tab.getAttribute('aria-selected')
			return ariaSelected === 'true'
		}

		// 初期化処理
		const init = function() {
			for (let i = 0; i < tabsLength; i++) {
				const tab = tabs[i]
				const isSelected = isSelectedTab(tab)
				if (isSelected) {
					changeTab(i)
					setCurrentSelectedTabIndex(i)
				}
				tab.addEventListener('click', onClickTab, false)
			}
		}

		init()
	} catch (error) {}
}

tabUI()

/*=================================================

ページローディング

==================================================*/

const webStorageLoading = function() {
	try {
		const loading = document.querySelector('#c-loader')
		const disBlock = document.querySelector('body.home div.mainWrapper')
		if (sessionStorage.getItem('access')) {
			loading.classList.add('c-loaderNone')
			disBlock.style.display = 'block'
			//2回目以降のアクセスであれば上記の処理を実行
		} else {
			setTimeout(function() {
				loading.classList.add('c-loaderNone')
				disBlock.style.display = 'block'
			}, 3700)
			sessionStorage.setItem('access', 0)
			//初回アクセスであれば上記の処理を実行
			/*3700ms後に#c-loaderを持つタグに.c-loaderNoneを
		body.home内のdiv.wrapperのスタイルをdisplay:block;に変更
		更にsessitonStorageに'access'keyと0のvalueを付与
		sessionStorage'access'keywを持っているので
		 */
		}
	} catch (error) {}
}

webStorageLoading()

/*=================================================

swiper用の記述

==================================================*/

try {
	let mySwiper = new Swiper('.swiper-container', {
		// Optional parameters
		// direction: 'vertical',
		slidesPerView: 1,
		spaceBetween: 0,
		// slidesPerView: 4,
		// spaceBetween: 30,
		slidesPerGroup: 1,
		loop: true,
		speed: 1000,
		autoplay: true,

		// If we need pagination
		pagination: {
			// el: '.swiper-pagination'
		},

		// Navigation arrows
		navigation: {
			nextEl: '.swiper-button-next',
			prevEl: '.swiper-button-prev'
		},

		// And if we need scrollbar
		scrollbar: {
			// el: '.swiper-scrollbar'
		},
		breakpoints: {
			767: {
				// slidesPerView: 1,
				// spaceBetween: 0,
				slidesPerView: 4,
				spaceBetween: 30
			}
		}
	})
} catch (error) {}

/*=================================================

object-fit-imagesを使った
object-fitのIE対策
（本体はCDNで読みこみ）

==================================================*/

objectFitImages()

/*=================================================

yubinbango.jsを使いたいので
wp mw formのformタグに
h-adrクラスを追加する。

==================================================*/

const wpWpFormYubin = function() {
	try {
		document.querySelector('.mw_wp_form_input form').classList.add('h-adr')
	} catch (error) {}
}

wpWpFormYubin()

let getTestSelect = document.querySelector('[aria-hidden="false"]').clientHeight

/*=================================================

以下ゴミ箱

==================================================*/

// const closeBtn = function() {
// 	const navBurgerMenu = document.querySelector('.c-navBurger')
// 	// const closeBtn = document.querySelector('.c-closeBtn')
// 	// const spOffcanvasOverlay = document.querySelector('.c-offcanvasWrapper')
// 	// const mainWrapper = document.querySelector('.c-mainWrapper')
// 	navBurgerMenu.addEventListener('click', function() {
// 		if ($(this).hasClass('action')) {
// 			navBurgerMenu.classList.remove('action')
// 			// spOffcanvasOverlay.classList.remove('action')
// 			// mainWrapper.classList.remove('action')
// 			// closeBtn.classList.remove('action')
// 		} else {
// 			navBurgerMenu.classList.add('action')
// 			// spOffcanvasOverlay.classList.add('action')
// 			// mainWrapper.classList.add('action')
// 			// closeBtn.classList.add('action')
// 		}
// 	})
// 	spOffcanvasOverlay.addEventListener('click', function() {
// 		if ($(this).hasClass('action')) {
// 			navBurgerMenu.classList.remove('action')
// 			// spOffcanvasOverlay.classList.remove('action')
// 			// mainWrapper.classList.remove('action')
// 			// closeBtn.classList.remove('action')
// 		}
// 	})
// }

// closeBtn()
