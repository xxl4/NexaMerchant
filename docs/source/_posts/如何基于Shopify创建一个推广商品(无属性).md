---
title: 如何基于Shopify创建一个推广商品 （无属性）
tags:
  - Larave
  - Compose
  - Php
  - Shopify
  - OneBuy
categories:
  - 产品
  - 使用手册
date: 2024-03-13 13:23:12
description: 如何基于Shopify创建一个推广商品 （无属性）
lang: zh-CN
---
这篇文章主要是描述基于shopify的商品，实现与 shopify 与 店铺的对接实现生成 checkout 页面

# 商品获取

## 获取全部商品

```
php artisan shopify:product:get
```
> 获取对应Shopify平台的全部商品的内容到本地数据库 shopify_products

## 获取指定商品ID的商品

```
shopify:product:getv3 {--prod_id=}
```
> 获取shopify 上莫个商品到本地数据库, 对于需要无属性的实现，可以参考 

### 获取指定商品ID的商品参数
1) prod_id 表示 shopify 的商品ID，具体Shopify ID的获取，可以通过 **获取全部商品** 来查看，对应的数据会保存到 shopify_products 表。
2) force 表示是否强制处理，对于有一些数据已经在本地上存在后，需要使用这个方法去强制获取最新的 Shopify 商品数据内容，再做更新  
3）**现在默认导入到本地是划分到一个有优惠活动的栏目中，对于有需要的不同分类，需要在代码上面做下手动的修改**

## 验证后台是否有对于的商品，商品图片，商品SKU这些内容
1）在完成上面的操作的时候，就会发现后台已经有了基于 Shopify 的ID 为基础的商品内容存在，这个时候，对于有banner 和 size ，销售价格，商品SKU图片的需要调整的，都会在商品后台去调整。  
2）对于新的一个平台，需要添加上 FAQ, 商品的 Comments 内容，对应的已经提供了具体的模板，上传到对应的服务器
Faq 上传的位置与文件名称
```
./storage/imports/faq.xlsx
```
执行 FAQ 脚本内容的导入 force 是针对与前面已经有了需要做更新处理 **数据保存在 Redis中**
```
onebuy:import:faq {--force=}
```
商品评论,其中 3140 是本地数据库对应商品的 ID
```
./storage/imports/comments_3140.xlsx
```
执行 商品 评论内容的导入 prod_id 这个是 本地数据库的商品ID， force 是针对前面已经有了对应的内容，做了对应的调整，会做老的评论删除，重新更新新的评论到服务器 **数据保存在 Redis中**
```
onebuy:import:products:comment {--prod_id=} {--force=}
```
# 获取商品的 checkout 连接
```
https://www.example.com/onebuy/v3/{$shopify_id}
```
> 参数是否正常打开，如果可以打开，验证下对应的内容是否都有。验证内容事项  



# 验证 checkout页面 是否工作正常
1）发起商品支付，是否有报错情况。  
2）FAQ，SKU 图片是否正确，价格是否正常。  
3）快递费用的查看，没有平台的快递费用可能不一样的情况，这块数据需要到后台快递栏目中修改与查看  
4）查看对应的协议内容，文档是否正常，这块数据是基于每个本地数据库与对应的区域来获取识别的  
5）因为此商品为单品，从而会需要添加上1件，2件，多件商品的商品图片，从而可以更好的展示效果

