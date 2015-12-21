

        
        <div style="margin-bottom:15px; text-align:center;">
            <?php if ($i == 0) { ?>
                <a href="<?php echo G5_SHOP_URL; ?>/" class="btn btn-color btn-sm">继续购物</a>
            <?php } else { ?>
                <input type="hidden" name="url" value="./orderform.php">
                <input type="hidden" name="records" value="<?php echo $i; ?>">
                <input type="hidden" name="act" value="">
                    <div class="btn_area01">
                        <button class="select" id="btnAllOrder" onclick="return form_check('buy');" style="margin-right:20px;" type="button">
                            <img src="/images/btn_AllOrder.png" alt="立即订购"/>
                        </button>
                        <button class="select" id="btnCheckOrder" onclick="return form_check('buy');"  style="margin-right:20px;" type="button">
                            <img src="/images/btn_select_order.png" alt="选择购物"/>
                        </button>                         
                        <button class="select" id="btnList" type="button">
                            <a href="<?php echo G5_SHOP_URL; ?>/list.php?ca_id=<?php echo $continue_ca_id; ?>"><img src="/images/btn_List.png" alt="继续购物"/></a>
                        </button>              
                    </div><br />
                    <div class="row">
                        <div class="col-sm-3"></div>
                        <div class="col-sm-6">
                            <div class="btn-group btn-group-justified">
                                <div class="btn-group">
                                    <a href="<?php echo G5_SHOP_URL; ?>/list.php?ca_id=<?php echo $continue_ca_id; ?>" class="btn btn-black btn-block btn-sm"><i class="fa fa-cart-plus"></i> 继续购物</a>
                                </div>
                                <div class="btn-group">
                                    <button type="button" onclick="return form_check('seldelete');" class="btn btn-black btn-block btn-sm"><i class="fa fa-times"></i> 选择删除</button>
                                </div>
                                <div class="btn-group">
                                    <button type="button" onclick="return form_check('alldelete');" class="btn btn-black btn-block btn-sm"><i class="fa fa-trash"></i> 清空购物车</button>
                                </div>

                        </div>
                        <div class="col-sm-3"></div>
                    </div>
            <?php } ?>

