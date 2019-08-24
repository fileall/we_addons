<?php defined('IN_IA') or exit('Access Denied');?><!doctype html>
<html>

<head>
	<meta charset="utf-8">
	<title><notempty name="page_title"><?php  echo $page_title;?>-</notempty>{:C('site_title')}</title>
	<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, user-scalable=0">
	<meta name="apple-mobile-web-app-capable" content="yes">
	<meta name="apple-mobile-web-app-status-bar-style" content="black">
	<meta name="format-detection" content="telephone=no,email=no">
	<link rel="stylesheet" href="<?php  echo APP_PUBLIC?>/Home/font/iconfont.css">
	<link rel="stylesheet" href="<?php  echo APP_PUBLIC?>/Home/css/main.css">
	<script src="<?php  echo APP_PUBLIC?>/Home/js/zepto.min.js"></script>
	<script src="<?php  echo APP_PUBLIC?>/Home/js/common.js"></script>

		<!--<script type="text/javascript" src="__PUBLIC__/Home/layer/mobile/layer.js"></script>-->
		<!--<script type="text/javascript" src="__PUBLIC__/Home/jquery-3.3.1/jquery-3.3.1.js"></script>-->

	<!--<empty name="load"> -->
	<script src="__PUBLIC__/js/zy_validate.js"></script>
	<link rel="stylesheet" type="text/css" href="__PUBLIC__/css/dialog-ui.css?v={:C('jsversion')}">
	<script type="text/javascript" src="__PUBLIC__/js/dialog.js?v={:C('jsversion')}"></script>
	<!--</empty>-->
	<!--<script type="text/javascript" src="__PUBLIC__/Home/js/common.js?v={:C('jsversion')}"></script>-->
	<if condition="C('is_weixin')">
	<script type="text/javascript" src="http://res.wx.qq.com/open/js/jweixin-1.4.0.js"></script>
	</if>
	<if condition="C('is_weixin')">
	<script type="text/javascript">
		var wxjsapi=['chooseWXPay'];
				wx.config({
					debug:{:C('jsapi_debug')},
		        appId: "{:C('wxAppID')}",
				timestamp: "{$jssdk.timestamp}",
				nonceStr: "{$jssdk.noncestr}",
				signature: "{$jssdk.signature}",
				jsApiList: wxjsapi
		});
	</script>
	</if>

</head>

<body>
<style>

</style>


		<div class="outter-wrap base-bg">
			<div class="mine-page-wrap">
				<div class="am-list header">
					<div class="am-list-body">
						<a href="new_bind_card.html" class="am-list-item am-list-item-top">
							<div class="am-list-thumb"><img src="Public/images/default-avatar.png"></div>
							<div class="am-list-line am-list-line-multiple">
								<div class="am-list-content">未实名认证<div class="am-list-brief"><span>18679150702</span></div></div>
							</div>
						</a>
					</div>
				</div>
				<div class="middle-wrap">
					<a href="all_borrow.html" class="borrow"><img src="Public/images/loan2x_01.png" alt="借入"><span>借入</span></a>
					<a href="all_borrow.html" class="lend"><img src="Public/images/loan2x_02.png" alt="借出"><span>借出</span></a>
				</div>
				<div class="am-list user-config-wrap">
					<div class="am-list-body">
						<a href="overdue_export.html" class="am-list-item am-list-item-middle">
							<div class="am-list-line">
								<div class="am-list-content"><img src="Public/images/icon_overdue@2x_01.png" alt="当前到期"><span>当前到期</span></div>
								<div class="am-list-arrow am-list-arrow-horizontal" aria-hidden="true"></div>
							</div>
						</a>
						<a href="friend.html" class="am-list-item am-list-item-middle">
							<div class="am-list-line">
								<div class="am-list-content"><img src="Public/images/friend_01.png" alt="好友"><span>好友</span></div>
								<div class="am-list-arrow am-list-arrow-horizontal" aria-hidden="true"></div>
							</div>
						</a>
						<a href="friend_detail.html" class="am-list-item am-list-item-middle">
							<div class="am-list-line">
								<div class="am-list-content"><img src="Public/images/credit_01.png" alt="信用"><span>信用</span></div>
								<div class="am-list-arrow am-list-arrow-horizontal" aria-hidden="true"></div>
							</div>
						</a>
						<a href="bank.html" class="am-list-item am-list-item-middle">
							<div class="am-list-line">
								<div class="am-list-content"><img src="Public/images/bank-card_01.png" alt="银行卡"><span>银行卡</span></div>
								<div class="am-list-arrow am-list-arrow-horizontal" aria-hidden="true"></div>
							</div>
						</a>
						<a href="setup.html" class="am-list-item am-list-item-middle">
							<div class="am-list-line">
								<div class="am-list-content"><img src="Public/images/set_01.png" alt="设置"><span>设置</span></div>
								<div class="am-list-arrow am-list-arrow-horizontal" aria-hidden="true"></div>
							</div>
						</a>
					</div>
				</div>
			</div>
		</div>
		<div>
			<div class="am-action-sheet-mask" id="actionsheetMask"></div>
			<div class="am-action-sheet-wrap" id="actionsheet">
				<div class="am-action-sheet-button-list">
					<a href="receipt.html" class="am-action-sheet-button-list-item">我是借款人</a>
					<a href="receipt.html" class="am-action-sheet-button-list-item">我是出借人</a>
					<div class="am-action-sheet-button-list-item" id="actionsheetCancel">取消</div>
				</div>
			</div>
		</div>
		<div class="tab-bar bottom">
			<a href="home.html" class="tab-bar-tab">
				<div class="tab-bar-icon"><img src="Public/images/icon_home_nor@2x.png" alt="首页"></div>
				<div class="tab-bar-label">首页</div>
			</a>
			<div class="tab-bar-tab" id="showActionSheet">
				<div class="tab-bar-icon"><img src="Public/images/icon_ious_nor@2x.png" alt="补借条"></div>
				<div class="tab-bar-label">补借条</div>
			</div>
			<a href="check_credit.html" class="tab-bar-tab">
				<div class="tab-bar-icon"><img src="Public/images/icon_credit_nor@2x.png" alt="查信用"></div>
				<div class="tab-bar-label">查信用</div>
			</a>
			<a href="newmessage.html" class="tab-bar-tab">
				<div class="tab-bar-icon"><img src="Public/images/icon_news_nor@2x.png" alt="消息"></div>
				<div class="tab-bar-label"><span>消息</span><span class="am-badge am-badge-not-a-wrapper"></span></div>
			</a>
			<a href="mine.html" class="tab-bar-tab">
				<div class="tab-bar-icon"><img src="Public/images/icon_mine_lig@2x.png" alt="我的"></div>
				<div class="tab-bar-label active">我的</div>
			</a>
		</div>
	</body>

</html>
</body>

<script>
	$("#ref").click(function () {
		window.location.reload();
	});
</script>
</html>