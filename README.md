# multi_qr_pay
多码和一，支持微信、支付宝、QQ以及自定义付款方式

### 环境
| 环境 | 必须 | 说明 |
| ------------ | ------------ | ------------|
| PHP | true  | 建议PHP版本 >= `7.3`|
| SSL | false | 建议启用HSTS|
| 域名 | false | 建议使用域名|

### 编辑配置文件
1. 将配置文件`config.example.php`重命名为`config.php`
2. 填写名字(昵称)，即`const NAME = ''`修改为`const NAME = 'YourName'`
3. 至少填写一种收款方式(支付宝、微信、QQ)，收款URL是收款码解码后的结果(可在`https://cli.im/deqr`上传解码)。填写方式见2
4. **保存文件，不出意外的话此时站点已经可以正常工作了**
还有一些高级设置可自行修改

| 常量  | 默认值  | 说明 |
| ------------ | ------------ | ------------|
| $MORE_PAYMENT | `examplePayment`,`空`  | 数组下标为收款方式，值为收款URL|
| AVATAR_URL | `https://secure.gravatar.com/avatar/` | 网站图标URL|
| PRIMARY_THEME  | `indigo` | 网站主题色|
| ACCENT_THEME  | `pink` | 网站强调色|
| TLS_ENCRYPT  | `auto` | 是否启用https，可为`disable`或`enable`或`auto`|
| QRCODE_API_URL  | `https://www.zhihu.com/qrcode?url=` | 二维码生成接口|

### 单文件版
单文件版`index_single.php`的配置方法与上面类似，配置项在该文件的上部。编辑完成后建议修改文件名为`index.php`

### DEMO
https://fifcom.cn/pay/

### License
GPL v3