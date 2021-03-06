import { ChangeDetectorRef, ElementRef, EventEmitter, OnInit, QueryList, SimpleChanges } from '@angular/core';
import Swiper from 'swiper/core';
import { A11yOptions, AutoplayOptions, ControllerOptions, CoverflowEffectOptions, CubeEffectOptions, FadeEffectOptions, FlipEffectOptions, HashNavigationOptions, HistoryOptions, KeyboardOptions, LazyOptions, MousewheelOptions, NavigationOptions, PaginationOptions, ScrollbarOptions, ThumbsOptions, VirtualData, VirtualOptions, ZoomOptions, SwiperEvents } from 'swiper/types';
import { Observable, Subject } from 'rxjs';
import { SwiperSlideDirective } from './swiper-slide.directive';
export declare class SwiperComponent implements OnInit {
    private elementRef;
    private _changeDetectorRef;
    init: boolean;
    direction: 'horizontal' | 'vertical';
    touchEventsTarget: string;
    initialSlide: number;
    speed: number;
    cssMode: boolean;
    updateOnWindowResize: boolean;
    nested: boolean;
    width: number;
    height: number;
    preventInteractionOnTransition: boolean;
    userAgent: string;
    url: string;
    edgeSwipeDetection: boolean;
    edgeSwipeThreshold: number;
    freeMode: boolean;
    freeModeMomentum: boolean;
    freeModeMomentumRatio: number;
    freeModeMomentumBounce: boolean;
    freeModeMomentumBounceRatio: number;
    freeModeMomentumVelocityRatio: number;
    freeModeSticky: boolean;
    freeModeMinimumVelocity: number;
    autoHeight: boolean;
    setWrapperSize: boolean;
    virtualTranslate: boolean;
    effect: string;
    breakpoints: Object;
    spaceBetween: number;
    slidesPerView: number | 'auto';
    slidesPerColumn: number;
    slidesPerColumnFill: string;
    slidesPerGroup: number;
    slidesPerGroupSkip: number;
    centeredSlides: boolean;
    centeredSlidesBounds: boolean;
    slidesOffsetBefore: number;
    slidesOffsetAfter: number;
    normalizeSlideIndex: boolean;
    centerInsufficientSlides: boolean;
    watchOverflow: boolean;
    roundLengths: boolean;
    touchRatio: number;
    touchAngle: number;
    simulateTouch: boolean;
    shortSwipes: boolean;
    longSwipes: boolean;
    longSwipesRatio: number;
    longSwipesMs: number;
    followFinger: boolean;
    allowTouchMove: boolean;
    threshold: number;
    touchMoveStopPropagation: boolean;
    touchStartPreventDefault: boolean;
    touchStartForcePreventDefault: boolean;
    touchReleaseOnEdges: boolean;
    uniqueNavElements: boolean;
    resistance: boolean;
    resistanceRatio: number;
    watchSlidesProgress: boolean;
    watchSlidesVisibility: boolean;
    grabCursor: boolean;
    preventClicks: boolean;
    preventClicksPropagation: boolean;
    slideToClickedSlide: boolean;
    preloadImages: boolean;
    updateOnImagesReady: boolean;
    loop: boolean;
    loopAdditionalSlides: number;
    loopedSlides: number;
    loopFillGroupWithBlank: boolean;
    loopPreventsSlide: boolean;
    allowSlidePrev: boolean;
    allowSlideNext: boolean;
    swipeHandler: boolean;
    noSwiping: boolean;
    noSwipingClass: string;
    noSwipingSelector: string;
    passiveListeners: boolean;
    containerModifierClass: string;
    slideClass: string;
    slideBlankClass: string;
    slideActiveClass: string;
    slideDuplicateActiveClass: string;
    slideVisibleClass: string;
    slideDuplicateClass: string;
    slideNextClass: string;
    slideDuplicateNextClass: string;
    slidePrevClass: string;
    slideDuplicatePrevClass: string;
    wrapperClass: string;
    runCallbacksOnInit: boolean;
    a11y: A11yOptions;
    autoplay: AutoplayOptions | boolean;
    controller: ControllerOptions;
    coverflowEffect: CoverflowEffectOptions;
    cubeEffect: CubeEffectOptions;
    fadeEffect: FadeEffectOptions;
    flipEffect: FlipEffectOptions;
    hashNavigation: HashNavigationOptions | boolean;
    history: HistoryOptions | boolean;
    keyboard: KeyboardOptions | boolean;
    lazy: LazyOptions | boolean;
    mousewheel: MousewheelOptions | boolean;
    set navigation(val: false | NavigationOptions);
    get navigation(): false | NavigationOptions;
    private _navigation;
    set pagination(val: false | PaginationOptions);
    get pagination(): false | PaginationOptions;
    private _pagination;
    parallax: boolean;
    set scrollbar(val: false | ScrollbarOptions);
    get scrollbar(): false | ScrollbarOptions;
    private _scrollbar;
    set virtual(val: false | VirtualOptions);
    get virtual(): false | VirtualOptions;
    private _virtual;
    thumbs: ThumbsOptions;
    zoom: ZoomOptions | boolean;
    s__beforeBreakpoint: EventEmitter<SwiperEvents['_beforeBreakpoint']>;
    s__containerClasses: EventEmitter<SwiperEvents['_containerClasses']>;
    s__slideClass: EventEmitter<SwiperEvents['_slideClass']>;
    s__swiper: EventEmitter<SwiperEvents['_swiper']>;
    s_activeIndexChange: EventEmitter<SwiperEvents['activeIndexChange']>;
    s_afterInit: EventEmitter<SwiperEvents['afterInit']>;
    s_autoplay: EventEmitter<SwiperEvents['autoplay']>;
    s_autoplayStart: EventEmitter<SwiperEvents['autoplayStart']>;
    s_autoplayStop: EventEmitter<SwiperEvents['autoplayStop']>;
    s_beforeDestroy: EventEmitter<SwiperEvents['beforeDestroy']>;
    s_beforeInit: EventEmitter<SwiperEvents['beforeInit']>;
    s_beforeLoopFix: EventEmitter<SwiperEvents['beforeLoopFix']>;
    s_beforeResize: EventEmitter<SwiperEvents['beforeResize']>;
    s_beforeSlideChangeStart: EventEmitter<SwiperEvents['beforeSlideChangeStart']>;
    s_beforeTransitionStart: EventEmitter<SwiperEvents['beforeTransitionStart']>;
    s_breakpoint: EventEmitter<SwiperEvents['breakpoint']>;
    s_changeDirection: EventEmitter<SwiperEvents['changeDirection']>;
    s_click: EventEmitter<SwiperEvents['click']>;
    s_doubleTap: EventEmitter<SwiperEvents['doubleTap']>;
    s_doubleClick: EventEmitter<SwiperEvents['doubleClick']>;
    s_destroy: EventEmitter<SwiperEvents['destroy']>;
    s_fromEdge: EventEmitter<SwiperEvents['fromEdge']>;
    s_hashChange: EventEmitter<SwiperEvents['hashChange']>;
    s_hashSet: EventEmitter<SwiperEvents['hashSet']>;
    s_imagesReady: EventEmitter<SwiperEvents['imagesReady']>;
    s_init: EventEmitter<SwiperEvents['init']>;
    s_keyPress: EventEmitter<SwiperEvents['keyPress']>;
    s_lazyImageLoad: EventEmitter<SwiperEvents['lazyImageLoad']>;
    s_lazyImageReady: EventEmitter<SwiperEvents['lazyImageReady']>;
    s_loopFix: EventEmitter<SwiperEvents['loopFix']>;
    s_momentumBounce: EventEmitter<SwiperEvents['momentumBounce']>;
    s_navigationHide: EventEmitter<SwiperEvents['navigationHide']>;
    s_navigationShow: EventEmitter<SwiperEvents['navigationShow']>;
    s_observerUpdate: EventEmitter<SwiperEvents['observerUpdate']>;
    s_orientationchange: EventEmitter<SwiperEvents['orientationchange']>;
    s_paginationHide: EventEmitter<SwiperEvents['paginationHide']>;
    s_paginationRender: EventEmitter<SwiperEvents['paginationRender']>;
    s_paginationShow: EventEmitter<SwiperEvents['paginationShow']>;
    s_paginationUpdate: EventEmitter<SwiperEvents['paginationUpdate']>;
    s_progress: EventEmitter<SwiperEvents['progress']>;
    s_reachBeginning: EventEmitter<SwiperEvents['reachBeginning']>;
    s_reachEnd: EventEmitter<SwiperEvents['reachEnd']>;
    s_realIndexChange: EventEmitter<SwiperEvents['realIndexChange']>;
    s_resize: EventEmitter<SwiperEvents['resize']>;
    s_scroll: EventEmitter<SwiperEvents['scroll']>;
    s_scrollbarDragEnd: EventEmitter<SwiperEvents['scrollbarDragEnd']>;
    s_scrollbarDragMove: EventEmitter<SwiperEvents['scrollbarDragMove']>;
    s_scrollbarDragStart: EventEmitter<SwiperEvents['scrollbarDragStart']>;
    s_setTransition: EventEmitter<SwiperEvents['setTransition']>;
    s_setTranslate: EventEmitter<SwiperEvents['setTranslate']>;
    s_slideChange: EventEmitter<SwiperEvents['slideChange']>;
    s_slideChangeTransitionEnd: EventEmitter<SwiperEvents['slideChangeTransitionEnd']>;
    s_slideChangeTransitionStart: EventEmitter<SwiperEvents['slideChangeTransitionStart']>;
    s_slideNextTransitionEnd: EventEmitter<SwiperEvents['slideNextTransitionEnd']>;
    s_slideNextTransitionStart: EventEmitter<SwiperEvents['slideNextTransitionStart']>;
    s_slidePrevTransitionEnd: EventEmitter<SwiperEvents['slidePrevTransitionEnd']>;
    s_slidePrevTransitionStart: EventEmitter<SwiperEvents['slidePrevTransitionStart']>;
    s_slideResetTransitionStart: EventEmitter<SwiperEvents['slideResetTransitionStart']>;
    s_slideResetTransitionEnd: EventEmitter<SwiperEvents['slideResetTransitionEnd']>;
    s_sliderMove: EventEmitter<SwiperEvents['sliderMove']>;
    s_sliderFirstMove: EventEmitter<SwiperEvents['sliderFirstMove']>;
    s_slidesLengthChange: EventEmitter<SwiperEvents['slidesLengthChange']>;
    s_slidesGridLengthChange: EventEmitter<SwiperEvents['slidesGridLengthChange']>;
    s_snapGridLengthChange: EventEmitter<SwiperEvents['snapGridLengthChange']>;
    s_snapIndexChange: EventEmitter<SwiperEvents['snapIndexChange']>;
    s_tap: EventEmitter<SwiperEvents['tap']>;
    s_toEdge: EventEmitter<SwiperEvents['toEdge']>;
    s_touchEnd: EventEmitter<SwiperEvents['touchEnd']>;
    s_touchMove: EventEmitter<SwiperEvents['touchMove']>;
    s_touchMoveOpposite: EventEmitter<SwiperEvents['touchMoveOpposite']>;
    s_touchStart: EventEmitter<SwiperEvents['touchStart']>;
    s_transitionEnd: EventEmitter<SwiperEvents['transitionEnd']>;
    s_transitionStart: EventEmitter<SwiperEvents['transitionStart']>;
    s_update: EventEmitter<SwiperEvents['update']>;
    s_zoomChange: EventEmitter<SwiperEvents['zoomChange']>;
    s_swiper: EventEmitter<any>;
    set prevElRef(el: ElementRef);
    set nextElRef(el: ElementRef);
    set scrollbarElRef(el: ElementRef);
    set paginationElRef(el: ElementRef);
    set slidesEl(val: QueryList<SwiperSlideDirective>);
    private slides;
    prependSlides: Observable<SwiperSlideDirective[]>;
    appendSlides: Observable<SwiperSlideDirective[]>;
    swiperRef: Swiper;
    readonly _activeSlides: Subject<SwiperSlideDirective[]>;
    get activeSlides(): Observable<SwiperSlideDirective[]>;
    containerClasses: string;
    constructor(elementRef: ElementRef, _changeDetectorRef: ChangeDetectorRef);
    private _setElement;
    ngOnInit(): void;
    ngAfterViewInit(): void;
    initSwiper(): void;
    style: any;
    currentVirtualData: VirtualData;
    private updateVirtualSlides;
    ngOnChanges(changedParams: SimpleChanges): void;
    updateInitSwiper(changedParams: any): void;
    updateSwiper(changedParams: SimpleChanges): void;
    calcLoopedSlides(): number;
    updateParameter(key: any, value: any): void;
    ngOnDestroy(): void;
}
