<meta charset="utf8">

<style>
table{ border-collapse: collapse; border: 1px solid #ddd; width: 800px; margin: 0 auto;margin-top: 50px; background: rgba(121, 217, 221, 0.4); color: #666}
table tr{ height: 40px;}
table td{ border: 1px solid #ddd; text-align: center}

*{margin: 0; padding:0 ; font-family: 微软雅黑}
a{ text-decoration: none; color: #666;}
ul{ list-style: none}

.top{ width: 100%; background: rgba(14, 196, 210, 0.99); color: #fff; height: 100px; line-height: 150px; text-align: right;}
.top span{ margin-right: 20px}


.left{ width: 260px; float: left; height: 100%; background: rgba(121, 217, 221, 0.4)}
.left ul{ list-style: none; width: 100%;}
.left ul li{ height: 40px; width: 100%; border: 1px solid #ddd; line-height: 40px; text-align: center;}
.left .selected{ background: rgba(14, 196, 210, 0.99);}
.left .selected a{ color: #fff;}


.right{ float: left; width: 1000px;}
.search-box{ width: 900px; margin: 0 auto; margin-top: 100px; }
.right li{
    margin-top: 20px;
}
.right span{
    display: inline-block;
    width: 200px;
    line-height: 40px;
    height: 40px;
    text-align: right;
    margin-right: 20px;
}

.right .filed-name{
    width: 300px;
    line-height: 40px;
    height: 40px;
    border: 1px solid #ddd;
    border-radius: 3px;
    font-size: 14px;
}

.right .length{
    width: 140px;
    line-height: 40px;
    height: 40px;
    border: 1px solid #ddd;
    border-radius: 3px;
    font-size: 14px;
}

.submit{
    width: 150px;
    height: 40px;
    line-height: 40px;
    border-radius: 3px;
    border: 1px solid #ddd;
    display: inline-block;
    background: rgba(14, 196, 210, 0.99);
    color: #fff;
    text-align: center;
    margin-left: 200px;
    margin-top: 20px;
}
</style>

<div class="top">
    <span>欢迎管理员：admin</span>
</div>

<div class="left">
    <ul>
        <li><a href="./index.html">查看注册字段</a></li>
        <li class="selected"><a href="#">添加注册字段</a></li>
    </ul>
</div>

<div class="right">
    <div class="search-box">
        <form action="index.php?r=demo/save" method="post">
            <ul>
                <li>
                    <span>请输入字段名称：</span>
                    <input class="filed-name" name="filed_name" type="text" value="<?=$data['filed_name']?>">
                    <input class="filed-name" name="id" type="hidden" value="<?=$data['id']?>">
                </li>
                <li>
                    <span>请输入字段默认值：</span>
                    <input class="filed-name" name="filed_num" type="text" value="<?=$data['filed_num']?>">
                </li>
                <li>
                    <span>请选择字段类型：</span>
                    <select name="filed_type">
                        <option value="文本框"
                            <?php if ($data['filed_type'] == "文本框"): ?>
                                selected
                            <?php endif ?>
                        >文本框</option>
                        <option value="单选框"
                            <?php if ($data['filed_type'] == "单选框"): ?>
                                selected
                            <?php endif ?>
                        >单选框</option>
                        <option value="密码框"
                            <?php if ($data['filed_type'] == "密码框"): ?>
                                selected
                            <?php endif ?>
                        >密码框</option>
                        <option value="文本域"
                            <?php if ($data['filed_type'] == "文本域"): ?>
                                selected
                            <?php endif ?>
                        >文本域</option>
                    </select>
                </li>
                <li>
                    <span>请填写字段选项：</span>
                    <input type="text" name="filed_xuan" value="<?=$data['filed_xuan']?>"  class="filed-name" >
                    <input type="text" name="filed_xuan" value="<?=$data['filed_xuan']?>"  class="filed-name" >
                </li>
                <li>
                    <span>是否必填：</span>
                    <input type="radio" name="filed_bi" value="1" value="<?=$data['filed_bi']?>" checked>必填
                </li>
                <li>
                    <span>请选择验证规则：</span>
                    <select name="filed_gui">
                        <option value="0"
                            <?php if ($data['filed_gui'] == "0"): ?>
                                selected
                            <?php endif ?>
                        >无</option>
                        <option value="phone"
                             <?php if ($data['filed_gui'] == "phone"): ?>
                                selected
                            <?php endif ?>
                        >手机号码</option>
                        <option value="length"
                             <?php if ($data['filed_gui'] == "length"): ?>
                                selected
                            <?php endif ?>
                        >长度</option>
                    </select>
                </li>
                <li>
                    <span>请选择填写长度范围：</span>
                    <input class="length" name="filed_length[]" value="<?=$data['small']?>" type="text" placeholder="请输入最小长度">
                    ~
                    <input class="length" name="filed_length[]" value="<?=$data['max']?>" type="text" placeholder="请输入最大长度">
                </li>
                <li>
                    <input type="submit" class="submit" value="提交">
                </li>
            </ul>
        </form>
    </div>
</div>