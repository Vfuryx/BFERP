<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrderDownloadsTable extends Migration
{
    /**
     * Run the migrations.
     * 订单下载表
     * @return void
     */
    public function up()
    {
        Schema::create('order_downloads', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('shops_id')->comment('店铺id');
            $table->unsignedBigInteger('tid')->comment('交易编号 (父订单的交易编号)');
            $table->unsignedBigInteger('num_iid')->comment('商品数字id');
            $table->string('title')->comment('交易标题，以店铺名作为此标题的值。注:taobao.trades.get接口返回的Trade中的title是商品名称');
            $table->integer('num')->comment('商品购买数量。取值范围：大于零的整数,对于一个trade对应多个order的时候（一笔主订单，对应多笔子订单），num=0，num是一个跟商品关联的属性，一笔订单对应多比子订单的时候，主订单上的num无意义。');
            $table->string('seller_nick')->comment('卖家昵称');
            $table->string('buyer_nick')->comment('买家昵称');
            $table->string('pic_path')->comment('商品图片绝对途径');
            $table->decimal('payment',10,2)->comment('实付金额。精确到2位小数;单位:元。如:200.07，表示:200元7分');
            $table->boolean('seller_rate')->comment('卖家是否已评价。可选值:true(已评价),false(未评价)');
            $table->boolean('has_buyer_message')->comment('判断订单是否有买家留言，有买家留言返回true，否则返回false');
            $table->decimal('post_fee',10,2)->comment('邮费。精确到2位小数;单位:元。如:200.07，表示:200元7分');
            $table->string('receiver_name')->comment('收货人的姓名');
            $table->string('receiver_state')->comment('收货人的所在省份');
            $table->string('receiver_country')->comment('收货人国籍');
            $table->string('receiver_city')->comment('收货人的所在城市 注：因为国家对于城市和地区的划分的有：省直辖市和省直辖县级行政区（区级别的）划分的，淘宝这边根据这个差异保存在不同字段里面比如：广东广州：广州属于一个直辖市是放在的receiver_city的字段里面；而河南济源：济源属于省直辖县级行政区划分，是区级别的，放在了receiver_district里面建议：程序依赖于城市字段做物流等判断的操作，最好加一个判断逻辑：如果返回值里面只有receiver_district参数，该参数作为城市');
            $table->string('receiver_district')->comment('收货人的所在地区注：因为国家对于城市和地区的划分的有：省直辖市和省直辖县级行政区（区级别的）划分的，淘宝这边根据这个差异保存在不同字段里面比如：广东广州：广州属于一个直辖市是放在的receiver_city的字段里面；而河南济源：济源属于省直辖县级行政区划分，是区级别的，放在了receiver_district里面建议：程序依赖于城市字段做物流等判断的操作，最好加一个判断逻辑：如果返回值里面只有receiver_district参数，该参数作为城市');
            $table->string('receiver_town')->comment('收货人街道地址');
            $table->string('receiver_address')->comment('收货人的详细地址');
            $table->string('receiver_zip')->comment('收货人的邮编');
            $table->string('receiver_mobile')->comment('收货人的手机号码');
            $table->string('receiver_phone')->comment('收货人的电话号码');
            $table->dateTime('consign_time')->default('')->commet('卖家发货时间。格式:yyyy-MM-dd HH:mm:ss');
            $table->dateTime('created')->default('')->commet('交易创建时间。格式:yyyy-MM-dd HH:mm:ss');
            $table->dateTime('pay_time')->default('')->commet('付款时间。格式:yyyy-MM-dd HH:mm:ss。订单的付款时间即为物流订单的创建时间。');
            $table->dateTime('modified')->default('')->commet('交易修改时间(用户对订单的任何修改都会更新此字段)。格式:yyyy-MM-dd HH:mm:ss');
            $table->dateTime('end_time')->default('')->commet('交易结束时间。交易成功时间(更新交易状态为成功的同时更新)/确认收货时间或者交易关闭时间 。格式:yyyy-MM-dd HH:mm:ss');
            $table->string('shop_pick')->comment('门店自提，总店发货，分店取货的门店自提订单标识');
            $table->decimal('received_payment',10,2)->comment('卖家实际收到的支付宝打款金额（由于子订单可以部分确认收货，这个金额会随着子订单的确认收货而不断增加，交易成功后等于买家实付款减去退款金额）。精确到2位小数;单位:元。如:200.07，表示:200元7分');
            $table->string('status')->comment('交易状态。可选值: * TRADE_NO_CREATE_PAY(没有创建支付宝交易) * WAIT_BUYER_PAY(等待买家付款) * SELLER_CONSIGNED_PART(卖家部分发货) * WAIT_SELLER_SEND_GOODS(等待卖家发货,即:买家已付款) * WAIT_BUYER_CONFIRM_GOODS(等待买家确认收货,即:卖家已发货) * TRADE_BUYER_SIGNED(买家已签收,货到付款专用) * TRADE_FINISHED(交易成功) * TRADE_CLOSED(付款以后用户退款成功，交易自动关闭) * TRADE_CLOSED_BY_TAOBAO(付款以前，卖家或买家主动关闭交易) * PAY_PENDING(国际信用卡支付付款确认中) * WAIT_PRE_AUTH_CONFIRM(0元购合约中)	* PAID_FORBID_CONSIGN(拼团中订单或者发货强管控的订单，已付款但禁止发货)');
            $table->string('buyer_rate')->comment('买家是否已评价。可选值:true(已评价),false(未评价)。如买家只评价未打分，此字段仍返回false');
            $table->string('type')->comment('交易类型列表，同时查询多种交易类型可用逗号分隔。默认同时查询guarantee_trade, auto_delivery, ec, cod的4种交易类型的数据 可选值 fixed(一口价) auction(拍卖) guarantee_trade(一口价、拍卖) auto_delivery(自动发货) independent_simple_trade(旺店入门版交易) independent_shop_trade(旺店标准版交易) ec(直冲) cod(货到付款) fenxiao(分销) game_equipment(游戏装备) shopex_trade(ShopEX交易) netcn_trade(万网交易) external_trade(统一外部交易)o2o_offlinetrade（O2O交易）step (万人团)nopaid(无付款订单)pre_auth_type(预授权0元购机交易)');
            $table->decimal('price',10,2)->comment('商品价格。精确到2位小数；单位：元。如：200.07，表示：200元7分');
            $table->decimal('discount_fee',10,2)->comment('可以使用trade.promotion_details查询系统优惠系统优惠金额（如打折，VIP，满就送等），精确到2位小数，单位：元。如：200.07，表示：200元7分');
            $table->decimal('total_fee',10,2)->comment('商品金额（商品价格乘以数量的总金额）。精确到2位小数;单位:元。如:200.07，表示:200元7分');
            $table->decimal('credit_card_fee',10,2)->comment('使用信用卡支付金额数');
            $table->string('seller_flag')->comment('门店自提，总店发货，分店取货的门店自提订单标识');
            $table->string('step_trade_status')->comment('分阶段付款的订单状态（例如万人团订单等），目前有三返回状态FRONT_NOPAID_FINAL_NOPAID(定金未付尾款未付)，FRONT_PAID_FINAL_NOPAID(定金已付尾款未付)，FRONT_PAID_FINAL_PAID(定金和尾款都付)');
            $table->string('step_paid_fee')->comment('分阶段付款的已付金额（万人团订单已付金额）');
            $table->string('shipping_type')->comment('创建交易时的物流方式（交易完成前，物流方式有可能改变，但系统里的这个字段一直不变）。可选值：free(卖家包邮),post(平邮),express(快递),ems(EMS),virtual(虚拟发货)，25(次日必达)，26(预约配送)。');
            $table->string('adjust_fee')->comment('卖家手工调整金额，精确到2位小数，单位：元。如：200.07，表示：200元7分。来源于订单价格修改，如果有多笔子订单的时候，这个为0，单笔的话则跟[order].adjust_fee一样');
            $table->string('trade_from')->comment('交易内部来源。WAP(手机);HITAO(嗨淘);TOP(TOP平台);TAOBAO(普通淘宝);JHS(聚划算)一笔订单可能同时有以上多个标记，则以逗号分隔');
            $table->string('cutoff_minutes')->comment('截单时间');
            $table->string('dispatch_time')->comment('派送时间');
            $table->string('collect_time')->comment('揽收时间');
            $table->string('delivery_time')->comment('发货时间');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('order_downloads');
    }
}
