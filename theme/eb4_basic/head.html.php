<?php
/**
 * theme file : /theme/THEME_NAME/head.html.php
 */
if (!defined('_EYOOM_')) exit;

add_stylesheet('<link rel="stylesheet" href="'.EYOOM_THEME_URL.'/css/style.css?ver='.G5_CSS_VER.'">',0);
add_stylesheet('<link rel="stylesheet" href="'.EYOOM_THEME_URL.'/css/custom.css?ver='.G5_CSS_VER.'">',0);

/**
 * 로고 타입 : 'image' || 'text'
 */
$logo = 'image';

/**
 * 메뉴바 전체 메뉴 출력 : 'yes' || 'no'
 */
$is_megamenu = 'yes';
?>

<?php if (!$wmode) { ?>
<?php /*----- wrapper 시작 -----*/ ?>
<div class="wrapper">
    <h1 id="hd-h1"><?php echo $g5['title'] ?></h1>
    <div class="to-content"><a href="#container">본문 바로가기</a></div>
    <?php
    // 팝업창
    if (defined('_INDEX_') && $newwin_contents) { // index에서만 실행
        echo $newwin_contents;
    }
    ?>

    <?php /*----- header 시작 -----*/ ?>
    <header class="header-wrap d-none <?php if(!defined('_INDEX_')) { ?>page-header-wrap<?php } ?>">
        <div class="top-header">
            <div class="container">
                <div class="row align-items-center position-relative">
                    <div class="col-lg-6 d-none d-lg-block">
                        <ul class="top-header-nav list-unstyled thn-start">
                        <?php if ($eyoom['is_shop_theme'] == 'y') { ?>
                            <?php if (defined('_SHOP_') && $eyoom['use_layout_community'] == 'y') { ?>
                            <li class="cs-nav c-nav"><a href="<?php echo G5_URL; ?>"><span class="deactivate">커뮤니티</span></a></li>
                            <li class="cs-nav s-nav"><a href="<?php echo G5_SHOP_URL; ?>" class="disabled"><span class="activate">쇼핑몰</span></a></li>
                            <?php } else if (defined('G5_USE_SHOP') && G5_USE_SHOP) { ?>
                            <li class="cs-nav c-nav"><a href="<?php echo G5_URL; ?>" class="disabled"><span class="activate">커뮤니티</span></a></li>
                            <li class="cs-nav s-nav"><a href="<?php echo G5_SHOP_URL; ?>"><span class="deactivate">쇼핑몰</span></a></li>
                            <?php } ?>
                        <?php } ?>
                            <li>
                                <?php echo eb_connect('basic_top'); ?>
                            </li>
                            <?php if ($is_admin) { // 관리자일 경우 ?>
                            <li>
                                <div class="eyoom-form">
                                    <input type="hidden" name="edit_mode" id="edit_mode" value="<?php echo $eyoom_default['edit_mode']; ?>">
                                    <label class="toggle">
                                        <input type="checkbox" id="btn_edit_mode" <?php echo $eyoom_default['edit_mode'] == 'on' ? 'checked':''; ?>><i></i><span class="text-black"><span class="fas fa-sliders-h m-r-5"></span>편집모드</span>
                                    </label>
                                </div>
                            </li>
                            <?php } ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <?php /*----- header 끝 -----*/ ?>

    <header class="header-wrapper modern-nav">
        <!--Nav with Logo & search-->
        <div class="container nav-container">
            <div class="row nav-logo-wrapper">

                <!--Logo-->
                <div class="col-3 logo-wrap">
                    <a href="<?php echo G5_URL; ?>" class="title-logo">
                        <?php if ($logo == 'text') { ?>
                            <h1><?php echo $config['cf_title']; ?></h1>
                        <?php } else if ($logo == 'image') { ?>
                            <?php if (file_exists($top_logo) && !is_dir($top_logo)) { ?>
                                <img src="<?php echo $logo_src['top']; ?>" class="site-logo" alt="<?php echo $config['cf_title']; ?>">
                            <?php } else { ?>
                                <img src="<?php echo EYOOM_THEME_URL; ?>/image/site_logo.svg" class="site-logo" alt="<?php echo $config['cf_title']; ?>">
                            <?php } ?>
                        <?php } ?>
                    </a>
                </div>

                <!--Navigation & search-->
                <div class="col-8 d-flex justify-content-between align-items-center d-none d-lg-flex">
                    <ul class="nav-lists-start d-flex gap-3 flex-wrap align-items-center justify-content-end w-100">

                        <li class="modern-nav-link">
                            <a href="#">홍길동님 11,181,887 P2U</a>
                        </li>
                        <li class="modern-nav-link">
                            <a href="<?php echo G5_SHOP_URL; ?>/cart.php">장바구니</a>
                        </li>
                        <li class="modern-nav-link">
                            <a <?php if ($is_member) { ?>href="<?php echo G5_URL; ?>/mypage/"<?php } else { ?>href="javascript:void(0);" onclick="alert('회원만 접근하실 수 있습니다.');"<?php } ?>>마이홈</a>
                        </li>
                        <li class="modern-nav-link">
                            <a <?php if ($is_member) { ?>href="<?php echo G5_URL; ?>/?<?php echo $member['mb_id']; ?>"<?php } else { ?>href="javascript:void(0);" onclick="alert('회원만 접근하실 수 있습니다.');"<?php } ?>>마이페이지</a>
                        </li>
                        <?php if ($is_member) {  ?>
                            <?php if ($is_admin) {  ?>
                                <li class="modern-nav-link"><a href="<?php echo correct_goto_url(G5_ADMIN_URL); ?>">관리자</a></li>
                            <?php }  ?>
                            <li class="modern-nav-link"><a href="<?php echo G5_BBS_URL ?>/logout.php">로그아웃</a></li>
                        <?php } else {  ?>
                            <li class="modern-nav-link"><a href="<?php echo G5_BBS_URL ?>/login.php">로그인</a></li>
                            <li class="modern-nav-link"><a href="<?php echo G5_BBS_URL ?>/register.php">회원가입</a></li>
                        <?php }  ?>
                        <li class="modern-nav-link">
                            <div class="dropdown">
                                <a class="dropdown-toggle" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                                    더보기
                                </a>
                                <ul class="dropdown-menu link-dropdown" aria-labelledby="dropdownMenuButton">
                                    <li><a href="<?php echo G5_BBS_URL ?>/new.php">새글</a></li>
                                    <li><a href="<?php echo G5_BBS_URL ?>/best.php">인기게시물</a></li>
                                    <li><a href="<?php echo G5_BBS_URL ?>/faq.php">자주묻는 질문</a></li>
                                    <li><a href="<?php echo G5_BBS_URL ?>/qalist.php">1:1문의</a></li>
                                    <?php if ($is_member) { // 회원일 경우 ?>
                                        <li><a href="<?php echo G5_BBS_URL; ?>/member_confirm.php?url=register_form.php">회원정보수정</a></li>
                                    <?php } ?>
                                </ul>
                            </div>
                        </li>

                        <!--Search-->
                        <li class="search-wrap d-none d-lg-block modern-nav-link">
                            <form name="fsearchbox" method="get" action="<?php echo G5_BBS_URL; ?>/search.php" onsubmit="return fsearchbox_submit(this);" class="eyoom-form">
                                <div class="input-group bg-light">
                                        <input  type="text" name="stx" id="modal_sch_stx"maxlength="20" class="form-control bg-light sch_stx" placeholder="상품명 검색" aria-label="상품명 검색" value="<?= isset($_GET['stx']) ? $_GET['stx'] :"" ?>">
                                        <input type="hidden" name="sfl" value="wr_subject||wr_content">
                                        <input type="hidden" name="sop" value="and">
                                        <div class="input-group-append">
                                            <button class="btn" type="submit">
                                                <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M8.16663 2.33334C4.94496 2.33334 2.33329 4.94501 2.33329 8.16667C2.33329 11.3883 4.94496 14 8.16663 14C9.73825 14 11.1647 13.3785 12.2136 12.3678C12.2355 12.3393 12.2596 12.3119 12.2857 12.2857C12.3118 12.2596 12.3393 12.2356 12.3678 12.2137C13.3784 11.1648 14 9.73829 14 8.16667C14 4.94501 11.3883 2.33334 8.16663 2.33334ZM14.0265 12.8481C15.0529 11.565 15.6666 9.93752 15.6666 8.16667C15.6666 4.02454 12.3088 0.666672 8.16663 0.666672C4.02449 0.666672 0.666626 4.02454 0.666626 8.16667C0.666626 12.3088 4.02449 15.6667 8.16663 15.6667C9.93747 15.6667 11.565 15.0529 12.848 14.0266L15.9107 17.0893C16.2361 17.4147 16.7638 17.4147 17.0892 17.0893C17.4147 16.7638 17.4147 16.2362 17.0892 15.9107L14.0265 12.8481Z" fill="#2F333C"/>
                                                </svg>
                                            </button>
                                        </div>
                                </div>
                            </form>
                        </li>
                    </ul>
                </div>

                <!--Mobile Navigation-->
                <div class="col-12 mobile-links justify-content-between align-items-center">
                    <ul class="nav-lists-start d-flex gap-3 flex-wrap align-items-center justify-content-end w-100">
                        <li>
                            <a href="#">P2U내역</a>
                        </li>
                    </ul>
                </div>

            </div>
        </div>

        <!--Mega menu-->
        <div class="container mega-menu-container">
            <div class="row">
                <div class="col-12 d-flex justify-content-between align-items-center d-none d-lg-flex p-0">
                    <ul class="nav-lists-start d-flex gap-5 flex-wrap align-items-center justify-content-start w-100">
                        <!--Mega menu main links-->
                        <li class="mega-menu-link with-icon">
                            <a href="#" class="mega-menu-link-text"><i class="fas fa-bars"></i> 전체상품</a>

                            <!--Mega menu sub links-->
                            <ul class="mega-menu-dropdown">
                                <li class="mega-menu-dropdown-link">
                                    <span class="mega-menu-dropdown-text">뷰티/피부 <i class="fa fa-angle-right" aria-hidden="true"></i></span>

                                    <!--Mega menu links-->
                                    <ul class="mega-menu-dropdown-sub">
                                        <li class="mega-menu-dropdown-sub-link">
                                            <span class="mega-menu-dropdown-sub-text">스킨케어 <i class="fa fa-angle-right" aria-hidden="true"></i></span>
                                            <ul class="mega-menu-dropdown-leaf-sub">
                                                <li class="mega-menu-dropdown-sub-link">
                                                    <a href="#" class="mega-menu-dropdown-link-text">클렌징 </a>
                                                </li>
                                                <li class="mega-menu-dropdown-sub-link">
                                                    <a href="#" class="mega-menu-dropdown-link-text">스킨/토너/미스트</a>
                                                </li>
                                                <li class="mega-menu-dropdown-sub-link">
                                                    <a href="#" class="mega-menu-dropdown-link-text">로션/에멀젼</a>
                                                </li>
                                                <li class="mega-menu-dropdown-sub-link">
                                                    <a href="#" class="mega-menu-dropdown-link-text">에센스/세럼</a>
                                                </li>

                                                <li class="mega-menu-dropdown-sub-link">
                                                    <a href="#" class="mega-menu-dropdown-link-text">크림/오일</a>
                                                </li>
                                                <li class="mega-menu-dropdown-sub-link">
                                                    <a href="#" class="mega-menu-dropdown-link-text">마스크/팩/스틱제품</a>
                                                </li>
                                                <li class="mega-menu-dropdown-sub-link">
                                                    <a href="#" class="mega-menu-dropdown-link-text">선케어(자외선차단)</a>
                                                </li>
                                                <li class="mega-menu-dropdown-sub-link">
                                                    <a href="#" class="mega-menu-dropdown-link-text">화장품세트</a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li class="mega-menu-dropdown-sub-link">
                                            <span class="mega-menu-dropdown-sub-text">메이크업 <i class="fa fa-angle-right" aria-hidden="true"></i></span>
                                        </li>
                                        <li class="mega-menu-dropdown-sub-link">
                                            <span class="mega-menu-dropdown-sub-text">헤어/바디 <i class="fa fa-angle-right" aria-hidden="true"></i></span>
                                        </li>
                                        <li class="mega-menu-dropdown-sub-link">
                                            <span class="mega-menu-dropdown-sub-text">남성전용 화장품 <i class="fa fa-angle-right" aria-hidden="true"></i></span>
                                        </li>
                                        <li class="mega-menu-dropdown-sub-link">
                                            <span class="mega-menu-dropdown-sub-text">향수 <i class="fa fa-angle-right" aria-hidden="true"></i></span>
                                        </li>
                                        <li class="mega-menu-dropdown-sub-link">
                                            <span class="mega-menu-dropdown-sub-text">뷰티기기/소품 <i class="fa fa-angle-right" aria-hidden="true"></i></span>
                                        </li>
                                    </ul>
                                    <!--Mega menu links-->
                                </li>
                                <li class="mega-menu-dropdown-link">
                                    <span class="mega-menu-dropdown-text">신선푸드 <i class="fa fa-angle-right" aria-hidden="true"></i></span>
                                </li>
                                <li class="mega-menu-dropdown-link">
                                    <span class="mega-menu-dropdown-text">가공푸드 <i class="fa fa-angle-right" aria-hidden="true"></i></span>
                                </li>
                                <li class="mega-menu-dropdown-link">
                                    <span class="mega-menu-dropdown-text">패션잡화 <i class="fa fa-angle-right" aria-hidden="true"></i></span>
                                </li>
                                <li class="mega-menu-dropdown-link">
                                    <span class="mega-menu-dropdown-text">디지털 가전 <i class="fa fa-angle-right" aria-hidden="true"></i></span>
                                </li>
                                <li class="mega-menu-dropdown-link">
                                    <span class="mega-menu-dropdown-text">생활/건강 <i class="fa fa-angle-right" aria-hidden="true"></i></span>
                                </li>
                                <li class="mega-menu-dropdown-link">
                                    <span class="mega-menu-dropdown-text">가구/인테리어 <i class="fa fa-angle-right" aria-hidden="true"></i></span>
                                </li>
                                <li class="mega-menu-dropdown-link">
                                    <span class="mega-menu-dropdown-text">자동차/공구 <i class="fa fa-angle-right" aria-hidden="true"></i></span>
                                </li>
                                <li class="mega-menu-dropdown-link">
                                    <span class="mega-menu-dropdown-text">취미/여행 <i class="fa fa-angle-right" aria-hidden="true"></i></span>
                                </li>
                                <li class="mega-menu-dropdown-link">
                                    <span class="mega-menu-dropdown-text">추석선물</span>
                                </li>
                            </ul>
                            <!--Mega menu sub links-->
                        </li>
                        <li class="mega-menu-link">
                            <a href="#" class="mega-menu-link-text">P2U소개</a>
                        </li>
                        <li class="mega-menu-link">
                            <a href="#" class="mega-menu-link-text">히트상품</a>
                        </li>
                        <li class="mega-menu-link">
                            <a href="#" class="mega-menu-link-text">브랜드관</a>
                        </li>
                        <li class="mega-menu-link">
                            <a href="#" class="mega-menu-link-text">추석선물</a>
                        </li>
                        <li class="mega-menu-link">
                            <a href="#" class="mega-menu-link-text">이벤트</a>
                        </li>
                        <li class="mega-menu-link">
                            <a href="#" class="mega-menu-link-text">공모전</a>
                        </li>
                        <!--Mega menu main links-->
                    </ul>
                </div>
            </div>
        </div>
    </header>

    <?php if(!defined('_INDEX_')) { // 메인이 아닐때 ?>
    <?php /*----- page title 시작 -----*/ ?>
    <div class="page-title-wrap">
        <div class="container">
        <?php if (!defined('_EYOOM_MYPAGE_')) { ?>
            <h2>
                <?php if (!$it_id) { ?>
                <i class="fas fa-arrow-alt-circle-right m-r-10"></i><?php echo $subinfo['title']; ?>
                <?php } else { ?>
                <span class="f-s-14r"><i class="fas fa-arrow-alt-circle-right m-r-10"></i><?php echo $subinfo['title']; ?></span>
                <?php } ?>
            </h2>
            <?php if (!$it_id) { ?>
            <div class="sub-breadcrumb-wrap">
                <ul class="sub-breadcrumb hidden-xs">
                    <?php echo $subinfo['path']; ?>
                </ul>
            </div>
            <?php } ?>
        <?php } else { ?>
            <h2><i class="fas fa-arrow-alt-circle-right"></i> 마이페이지</h2>
        <?php } ?>
        </div>
    </div>
    <?php /*----- page title 끝 -----*/ ?>
    <?php } ?>

    <div class="basic-body <?php if(!defined('_INDEX_')) { ?>page-body<?php } ?>">
        <?php if(defined('_INDEX_')) { ?>
        <div class="main-slider-top">
            <?php /* EB슬라이더 - basic */ ?>
            <?php echo eb_slider('1516512257'); ?>
        </div>
        <?php } ?>
        <div class="container">
            <?php if ($side_layout['use'] == 'yes') { ?>
            <div class="main-wrap">
                <?php
                if ($side_layout['pos'] == 'left') {
                    /* 사이드영역 시작 */
                    include_once(EYOOM_THEME_PATH . '/side.html.php');
                    /* 사이드영역 끝 */
                }
                ?>
                <main class="basic-body-main <?php if ($side_layout['pos'] == 'left') { echo 'right'; } else { echo 'left'; }?>-main">
            <?php } else { ?>
            <div class="main-wrap">
                <main class="basic-body-main">
            <?php } ?>
<?php } // !$wmode ?>