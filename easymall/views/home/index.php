<?php
/**
 * Created by PhpStorm.
 * User: john
 * Date: 2018/7/31
 * Time: 9:50
 */
?>
    <style type="text/css">
        #container-fluid li{
            list-style:none;
        }
        #web_info li{
            display: inline;
            height: 25px;
            line-height: 25px;
            padding-left: 10px;
            font-family: Arial, "Microsoft YaHei", 黑体, 宋体, sans-serif;
            font-size: 13px;
        }
        #container-fluid{
            background-color: #F6F6F6;
        }


    </style>
    <!-- libraries -->
    <link href="static/css/lib/jquery-ui-1.10.2.custom.css" rel="stylesheet" type="text/css"/>
    <link href="static/css/lib/font-awesome.css" type="text/css" rel="stylesheet"/>


    <link href="static/css/dashboard.css" type="text/css" rel="stylesheet"/>
    <link href="static/css/ns_index.css" type="text/css" rel="stylesheet"/>


    <!-- this page specific styles -->
<!--    <link rel="stylesheet" href="static/css/compiled/index.css" type="text/css" media="screen"/>-->
    <div class="content">
    <div class="container-fluid" id="container-fluid">
        <div class="ns-notice">
            <nav>
                <ul id="web_info">
                    <li>网站名称：<span><?= Yii::$app->params['web_name'] ?></span></li>
                    <li>当前版本：<span>单商户基础版1.0</span></li>
                    <li>登录时间：<span><?= $user->record_time ?></span></li>
                    <li>登录IP：<span><?= long2ip($user->last_login_ip) ?></span></li>
                </ul>
            </nav>
        </div>
        <div style="position:relative;margin:10px 0;">
            <!-- 三级导航菜单 -->


            <div class="right-side-operation">
                <ul>


                </ul>
            </div>
        </div>
        <!-- 操作提示 -->

        <div class="ns-main">

            <div class="statistical">
                <ul>
                    <li>
                        <div class="left">
                            <img src="static/img/order_amount.png"/>
                        </div>
                        <div class="right">
                            <strong class="js-order-amount">0.00</strong>
                            <p>今日订单总金额(元)</p>
                        </div>
                    </li>

                    <li>
                        <div class="left">
                            <img src="static/img/goods_release.png"/>
                        </div>
                        <div class="right">
                            <strong class="js-goods-release-count">0</strong>
                            <p>商品发布(个)</p>
                        </div>
                    </li>
                    <li>
                        <div class="left">
                            <img src="static/img/order_total.png"/>
                        </div>
                        <div class="right">
                            <strong class="js-order-total">0</strong>
                            <p>订单总数(笔)</p>
                        </div>
                    </li>
                    <li>
                        <div class="left">
                            <img src="static/img/month_sales.png"/>
                        </div>
                        <div class="right">
                            <strong class="js-month-sales">0</strong>
                            <p>本月销量(笔)</p>
                        </div>
                    </li>
                    <li>
                        <div class="left">
                            <img src="static/img/finish_count.png"/>
                        </div>
                        <div class="right">
                            <strong class="js-order-finish-count">0</strong>
                            <p>已完成交易(笔)</p>
                        </div>
                    </li>
                </ul>
            </div>
            <div class="charts" style="display:none">
                <h3>
                    <i class="i-circular"></i>关注人数统计<span><i></i>关注人数</span>
                </h3>
                <div id="focusCharts"></div>
            </div>
            <div class="goods-prompt">
                <h3>
                    <i class="i-circular"></i>店铺及商品提示<span>您需要关注的店铺信息以及待处理事项</span>
                </h3>
                <div class="goods-state a-line">
                    <ul>
                        <li>
                            <a href="http://www.space.com/niushop_b2b2c_1.11/niushop_b2b2c//index.php?s=/admin/goods/goodslist">
                                <strong class="goods_sale_count">0</strong>
                                <span>出售中</span>
                            </a>
                        </li>
                        <li>
                            <a href="http://www.space.com/niushop_b2b2c_1.11/niushop_b2b2c//index.php?s=/admin/goods/goodslist">
                                <strong class="goods_audit_count">0</strong>
                                <span>仓库中</span>
                            </a>
                        </li>
                        <li>
                            <a href="http://www.space.com/niushop_b2b2c_1.11/niushop_b2b2c//index.php?s=/admin/saleservice/consultlist&type=to_reply">
                                <strong class="goods_consult_count">0</strong>
                                <span>待回复咨询</span>
                            </a>
                        </li>

                        <li>
                            <a href="http://www.space.com/niushop_b2b2c_1.11/niushop_b2b2c//index.php?s=/admin/goods/goodslist">
                                <strong class="stock_early_warning">0</strong>
                                <span>库存预警</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="sales">
                <h3>
                    <i class="i-circular"></i>销售情况统计<span>按周期统计商家店铺的订单量和订单金额</span>
                </h3>

                <table>
                    <tr>
                        <td colspan="2" align="left" style="padding: 10px 0 0 20px;">昨日销量</td>
                    </tr>
                    <tr>
                        <td>
                            <strong class="yesterday_goods">0</strong>
                            <span>订单量(件)</span>
                        </td>
                        <td>
                            <strong class="yesterday_money">0</strong>
                            <span>订单金额(元)</span>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2" align="left" style="padding: 15px 0 0 20px;">本月销量</td>
                    </tr>
                    <tr>
                        <td>
                            <strong class="month_goods">0</strong>
                            <span>订单量(件)</span>
                        </td>
                        <td>
                            <strong class="month_money">0</strong>
                            <span>订单金额(元)</span>
                        </td>
                    </tr>
                </table>
            </div>

            <div class="goods-prompt">
                <h3>
                    <i class="i-circular"></i>交易提示<span>您需要立即处理的交易订单</span>
                </h3>
                <div class="goods-state a-line order">
                    <ul>
                        <li>
                            <a href="http://www.space.com/niushop_b2b2c_1.11/niushop_b2b2c//index.php?s=/admin/order/orderlist&status=0">
                                <strong class="daifukuan">0</strong>
                                <span>待付款</span>
                            </a>
                        </li>
                        <li>
                            <a href="http://www.space.com/niushop_b2b2c_1.11/niushop_b2b2c//index.php?s=/admin/order/orderlist&status=1">
                                <strong class="daifahuo">0</strong>
                                <span>待发货</span>
                            </a>
                        </li>
                        <li>
                            <a href="http://www.space.com/niushop_b2b2c_1.11/niushop_b2b2c//index.php?s=/admin/order/orderlist&status=2">
                                <strong class="yifahuo">0</strong>
                                <span>已发货</span>
                            </a>
                        </li>
                        <li>
                            <a href="http://www.space.com/niushop_b2b2c_1.11/niushop_b2b2c//index.php?s=/admin/order/orderlist&status=3">
                                <strong class="yishouhuo">0</strong>
                                <span>已收货</span>
                            </a>
                        </li>
                        <li>
                            <a href="http://www.space.com/niushop_b2b2c_1.11/niushop_b2b2c//index.php?s=/admin/order/orderlist&status=4">
                                <strong class="yiwancheng">0</strong>
                                <span>已完成</span>
                            </a>
                        </li>
                        <li>
                            <a href="http://www.space.com/niushop_b2b2c_1.11/niushop_b2b2c//index.php?s=/admin/order/orderlist&status=5">
                                <strong class="yiguanbi">0</strong>
                                <span>已关闭</span>
                            </a>
                        </li>
                        <li>
                            <a href="http://www.space.com/niushop_b2b2c_1.11/niushop_b2b2c//index.php?s=/admin/order/orderlist&status=-1">
                                <strong class="tuikuanzhong">0</strong>
                                <span>退款中</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="sales-ranking">
                <h3>
                    <i class="i-circular"></i>单品销售排名<span>按周期统计商家店铺的订单量和订单金额</span>
                </h3>
                <table>
                    <tr>
                        <td>排行</td>
                        <td style="text-align: left;">商品信息</td>
                        <td>销量</td>
                    </tr>
                </table>
            </div>


            <div class="charts">
                <h3>
                    <i class="i-circular"></i>订单总数统计<span><i></i>订单数量</span>
                </h3>
                <div id="orderCharts"></div>
            </div>


            <div class="goods-prompt">
                <h3>
                    <i class="i-circular"></i>商家帮助<span>您需要的商家帮助</span>
                </h3>
                <div class="merchants-use">
                    <ul>
                        <li>
                            <a href="http://www.space.com/niushop_b2b2c_1.11/niushop_b2b2c//index.php?s=/admin/goods/goodslist"><img
                                        src="static/img/goods_management.png"/><span>商品管理</span></a>
                        </li>
                        <li>
                            <a href="http://www.space.com/niushop_b2b2c_1.11/niushop_b2b2c//index.php?s=/admin/promotion/coupontypelist"><img
                                        src="static/img/promotions.png"/><span>促销方式</span></a>
                        </li>
                        <li>
                            <a href="http://www.space.com/niushop_b2b2c_1.11/niushop_b2b2c//index.php?s=/admin/order/orderlist"><img
                                        src="static/img/order_after.png"/><span>订单及售后</span></a>
                        </li>
                    </ul>
                </div>
            </div>

        </div>
    </div>

    <?php $this->beginBlock('script') ?>
    <script src="static/js/index.js"></script>
    <script src="static/js/highcharts.js"></script>
    <script src="static/js/exporting.js"></script>
    <script src="static/js/jquery.timers.js"></script>
    <script type="text/javascript">

    </script>
<?php $this->endBlock(); ?>