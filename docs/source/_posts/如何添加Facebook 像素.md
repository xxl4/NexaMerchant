---
title: 如何添加Facebook 像素
tags:
  - Larave
  - 广告
  - Facebook
  - OneBuy
categories:
  - 产品
  - 使用手册
date: 2024-03-03 14:23:12
description: 如何添加Facebook 像素
lang: zh-CN
---
Facebook 是海外社交的主要平台，从而我们的系统是可以通过在 env 文件中添加对于的ID，从而支持一套完整的 Facebook 广告监控流程。

# Facebook 像素准备
具体的流程，可以参考 Facebook 广告平台，注册申请。

# 配置 Facebook 像素

在 .env 文件中添加 添加像素ID，下面的示例是添加了2个，一个是 1111, 另外一个是 1234,多个是使用英文状态下的逗号来区分
```
ONEBUY_GTAG=1111,1234
```

# 查看是否生效
1）一个是查看对于的结算页面是否有了对于的值,可以通过页面源代码的方式查看  
2）查看 facebook 广告ID是否已经收到对于的数据内容，这种一般都是基于 onebuy 插件生成的页面。