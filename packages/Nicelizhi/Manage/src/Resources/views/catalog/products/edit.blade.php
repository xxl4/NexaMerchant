<x-admin::layouts>


    <link rel="stylesheet" href="/themes/manage/AdminLTE/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="/themes/manage/AdminLTE/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="/themes/manage/AdminLTE/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">

    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.2/css/dataTables.dataTables.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/3.0.1/css/buttons.dataTables.css">

    <link rel="stylesheet" type="text/css" href="/style/layui/css/layui.css"/>



    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.2/moment.min.js"></script>
    <script src="https://cdn.datatables.net/2.0.2/js/dataTables.js"></script>
    <script src="https://cdn.datatables.net/buttons/3.0.1/js/dataTables.buttons.js"></script>
    <script src="https://cdn.datatables.net/buttons/3.0.1/js/buttons.dataTables.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/3.0.1/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/3.0.1/js/buttons.print.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>


    <script src="/style/Convert_Pinyin.js"></script>

    <script src="https://www.jq22.com/jquery/jquery-1.10.2.js"></script>
    <script src="/style/Convert_Pinyin.js" type="text/javascript" charset="utf-8"></script>
    <script src="/style/layer.js" type="text/javascript" charset="utf-8"></script>
{{--    <link rel="stylesheet" type="text/css" href="/style/layer.css"/>--}}
{{--    <link rel="stylesheet" type="text/css" href="/style/layui.css"/>--}}
    <script src="/style/layui/layui.js"></script>


    <style>
        #sku-wrap, #sku-value-wrap{
            display: flex;
            align-items: start;
            float: left;
        }
        #sku-wrap input,#sku-value-wrap input{
            background: transparent;
            width: 60px;
            text-align: center;
            border: 1px solid #E6E6E6;
            margin-right: 20px;
            border-radius: 2px;
            padding: 10px 0;
        }
        #sku-wrap .sku-active{
            border: 1px solid #1F9FFF;
            color: #1F9FFF;
        }
        #sku-value-wrap input{
            /*display: none;*/
        }
        #my-table{
            display: none;
            margin-left: 0px;
        }
        #my-table input{
            border: 0;
        }
        #my-table td{
            white-space: nowrap;
        }
        .layui-form-item{
            width: 100%;
        }
        .delete-icon{
            display: inline-block;
            width: 12px;
            height: 1px;
            background: #C2C2C2;
            transform: rotate(45deg);
            -webkit-transform: rotate(45deg);
            position: relative;
            right: 33px;
            top: 5px;
            cursor: pointer;
            z-index: 9999;
        }
        .delete-icon:after{
            content: '';
            display: block;
            width: 12px;
            height: 1px;
            background: #C2C2C2;
            transform: rotate(-90deg);
            -webkit-transform: rotate(-90deg);
            cursor: pointer;
            position: relative;
            z-index: 9999;
        }
    </style>


    <style>
        /* Style for image preview */
        #imagePreview {
            width: 200px;
            height: 200px;
            border: 1px solid #ddd;
            margin-top: 10px;
            display: none; /* Hide by default */
        }

        /* Style for custom file input */
        .custom-file-input {
            cursor: pointer;
        }

        /* Style for custom file label */
        .custom-file-label::after {
            content: 'Choose image';
        }
    </style>


    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>编辑商品</h1>
                </div>
{{--                <div class="col-sm-6">--}}
{{--                    <ol class="breadcrumb float-sm-right">--}}
{{--                        <li class="breadcrumb-item"><a href="#">Home</a></li>--}}
{{--                        <li class="breadcrumb-item active">General Form</li>--}}
{{--                    </ol>--}}
{{--                </div>--}}
            </div>
        </div>
    </section>





    <section class="content">
        <div class="container-fluid">


            <div class="row">

                <div class="col-md-6">

                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">基本信息</h3>
                        </div>


                        <form>
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="title">标题</label>
                                    <input type="email" class="form-control" id="title" placeholder="标题">
                                </div>

                                <div class="form-group">
                                    <label for="des">描述</label>
                                    <textarea type="text" class="form-control" id="des" placeholder="描述"></textarea>
                                </div>


                                <div class="form-group">
                                    <label for="exampleInputFile">媒体文件</label>
                                    <!-- Image Upload Form -->
                                    <form id="imageUploadForm" action="#" method="post" enctype="multipart/form-data">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="imageUpload" name="imageUpload" accept="image/*">
                                            <label class="custom-file-label" for="imageUpload">Choose image</label>
                                        </div>
                                    </form>
                                    <!-- Image Preview -->
                                    <div id="imagePreview"></div>
                                </div>
                            </div>


                            <div class="card-body">
                                <div class="form-group">
                                    <div class="layui-container">
                                        <form action="" class="layui-form fairy-form">
                                            <!-- sku参数表 -->
                                            <div class="layui-form-item">
                                                <label class="layui-form-label">规格：</label>
                                                <div class="layui-input-block">
                                                    <div id="fairy-spec-table"></div>
                                                </div>
                                            </div>

                                            <!-- 动态sku表 -->
                                            <div class="layui-form-item">
                                                <label class="layui-form-label">SKU表：</label>
                                                <div class="layui-input-block">
                                                    <div id="fairy-sku-table"></div>
                                                </div>
                                            </div>

                                            <div class="layui-form-item">
                                                <div class="layui-input-block">
                                                    <button class="layui-btn" lay-submit lay-filter="submit">立即提交</button>
                                                    <button type="reset" class="layui-btn layui-btn-primary">重置</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>





                    <!--

                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Different Styles</h3>
                        </div>

                        <div class="card-body">
                            <h4>Input</h4>
                            <div class="form-group">
                                <label for="exampleInputBorder">Bottom Border only <code>.form-control-border</code></label>
                                <input type="text" class="form-control form-control-border" id="exampleInputBorder" placeholder=".form-control-border">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputBorderWidth2">Bottom Border only 2px Border <code>.form-control-border.border-width-2</code></label>
                                <input type="text" class="form-control form-control-border border-width-2" id="exampleInputBorderWidth2" placeholder=".form-control-border.border-width-2">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputRounded0">Flat <code>.rounded-0</code></label>
                                <input type="text" class="form-control rounded-0" id="exampleInputRounded0" placeholder=".rounded-0">
                            </div>
                            <h4>Custom Select</h4>
                            <div class="form-group">
                                <label for="exampleSelectBorder">Bottom Border only <code>.form-control-border</code></label>
                                <select class="custom-select form-control-border" id="exampleSelectBorder">
                                    <option>Value 1</option>
                                    <option>Value 2</option>
                                    <option>Value 3</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleSelectBorderWidth2">Bottom Border only <code>.form-control-border.border-width-2</code></label>
                                <select class="custom-select form-control-border border-width-2" id="exampleSelectBorderWidth2">
                                    <option>Value 1</option>
                                    <option>Value 2</option>
                                    <option>Value 3</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleSelectRounded0">Flat <code>.rounded-0</code></label>
                                <select class="custom-select rounded-0" id="exampleSelectRounded0">
                                    <option>Value 1</option>
                                    <option>Value 2</option>
                                    <option>Value 3</option>
                                </select>
                            </div>
                        </div>
                    </div>


                    <div class="card card-info">
                        <div class="card-header">
                            <h3 class="card-title">Input Addon</h3>
                        </div>
                        <div class="card-body">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">@</span>
                                </div>
                                <input type="text" class="form-control" placeholder="Username">
                            </div>
                            <div class="input-group mb-3">
                                <input type="text" class="form-control">
                                <div class="input-group-append">
                                    <span class="input-group-text">.00</span>
                                </div>
                            </div>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">$</span>
                                </div>
                                <input type="text" class="form-control">
                                <div class="input-group-append">
                                    <span class="input-group-text">.00</span>
                                </div>
                            </div>
                            <h4>With icons</h4>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                                </div>
                                <input type="email" class="form-control" placeholder="Email">
                            </div>
                            <div class="input-group mb-3">
                                <input type="text" class="form-control">
                                <div class="input-group-append">
                                    <span class="input-group-text"><i class="fas fa-check"></i></span>
                                </div>
                            </div>
                            <div class="input-group">
                                <div class="input-group-prepend">
<span class="input-group-text">
<i class="fas fa-dollar-sign"></i>
</span>
                                </div>
                                <input type="text" class="form-control">
                                <div class="input-group-append">
                                    <div class="input-group-text"><i class="fas fa-ambulance"></i></div>
                                </div>
                            </div>
                            <h5 class="mt-4 mb-2">With checkbox and radio inputs</h5>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
<span class="input-group-text">
<input type="checkbox">
</span>
                                        </div>
                                        <input type="text" class="form-control">
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><input type="radio"></span>
                                        </div>
                                        <input type="text" class="form-control">
                                    </div>
                                </div>
                            </div>

                            <h5 class="mt-4 mb-2">With buttons</h5>
                            <p>Large: <code>.input-group.input-group-lg</code></p>
                            <div class="input-group input-group-lg mb-3">
                                <div class="input-group-prepend">
                                    <button type="button" class="btn btn-warning dropdown-toggle" data-toggle="dropdown">
                                        Action
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li class="dropdown-item"><a href="#">Action</a></li>
                                        <li class="dropdown-item"><a href="#">Another action</a></li>
                                        <li class="dropdown-item"><a href="#">Something else here</a></li>
                                        <li class="dropdown-divider"></li>
                                        <li class="dropdown-item"><a href="#">Separated link</a></li>
                                    </ul>
                                </div>
                                <input type="text" class="form-control">
                            </div>

                            <p>Normal</p>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <button type="button" class="btn btn-danger">Action</button>
                                </div>

                                <input type="text" class="form-control">
                            </div>

                            <p>Small <code>.input-group.input-group-sm</code></p>
                            <div class="input-group input-group-sm">
                                <input type="text" class="form-control">
                                <span class="input-group-append">
<button type="button" class="btn btn-info btn-flat">Go!</button>
</span>
                            </div>
                        </div>
                    </div>

                    <div class="card card-info">
                        <div class="card-header">
                            <h3 class="card-title">Horizontal Form</h3>
                        </div>


                        <form class="form-horizontal">
                            <div class="card-body">
                                <div class="form-group row">
                                    <label for="inputEmail3" class="col-sm-2 col-form-label">Email</label>
                                    <div class="col-sm-10">
                                        <input type="email" class="form-control" id="inputEmail3" placeholder="Email">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputPassword3" class="col-sm-2 col-form-label">Password</label>
                                    <div class="col-sm-10">
                                        <input type="password" class="form-control" id="inputPassword3" placeholder="Password">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="offset-sm-2 col-sm-10">
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input" id="exampleCheck2">
                                            <label class="form-check-label" for="exampleCheck2">Remember me</label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="card-footer">
                                <button type="submit" class="btn btn-info">Sign in</button>
                                <button type="submit" class="btn btn-default float-right">Cancel</button>
                            </div>
                        </form>
                    </div>


                    -->

                </div>



                <div class="col-md-6">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">状态管理</h3>
                        </div>
                        <div class="card-body">
                            <form>
                                <div class="row">
                                    <div class="col-sm-8">
                                        <div class="form-group">
                                            <label>状态</label>
                                            <select id="exampleSelect" class="form-control">
                                                <option>option 1</option>
                                                <option>option 2</option>
                                                <option>option 3</option>
                                                <option>option 4</option>
                                                <option>option 5</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>


                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">渠道管理</h3>
                        </div>
                        <div class="card-body">
                            <form>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>渠道</label>
                                            <select id="exampleSelect" class="form-control">
                                                <option>option 1</option>
                                                <option>option 2</option>
                                                <option>option 3</option>
                                                <option>option 4</option>
                                                <option>option 5</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>市场</label>
                                            <select id="exampleSelect" class="form-control">
                                                <option>option 1</option>
                                                <option>option 2</option>
                                                <option>option 3</option>
                                                <option>option 4</option>
                                                <option>option 5</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>





                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">产品整理</h3>
                        </div>
                        <div class="card-body">
                            <form>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>产品类型</label>
                                            <select id="exampleSelect" class="form-control">
                                                <option>option 1</option>
                                                <option>option 2</option>
                                                <option>option 3</option>
                                                <option>option 4</option>
                                                <option>option 5</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>厂商</label>
                                            <select id="exampleSelect" class="form-control">
                                                <option>option 1</option>
                                                <option>option 2</option>
                                                <option>option 3</option>
                                                <option>option 4</option>
                                                <option>option 5</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>厂商</label>
                                            <select id="exampleSelect" class="form-control">
                                                <option>option 1</option>
                                                <option>option 2</option>
                                                <option>option 3</option>
                                                <option>option 4</option>
                                                <option>option 5</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>产品系列</label>
                                            <select id="exampleSelect" class="form-control">
                                                <option>option 1</option>
                                                <option>option 2</option>
                                                <option>option 3</option>
                                                <option>option 4</option>
                                                <option>option 5</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>标签</label>
                                            <select id="exampleSelect" class="form-control">
                                                <option>option 1</option>
                                                <option>option 2</option>
                                                <option>option 3</option>
                                                <option>option 4</option>
                                                <option>option 5</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>模版样式</label>
                                            <select id="exampleSelect" class="form-control">
                                                <option>option 1</option>
                                                <option>option 2</option>
                                                <option>option 3</option>
                                                <option>option 4</option>
                                                <option>option 5</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>



                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">产品规格</h3>
                        </div>
                        <div class="card-body">
                            <form>
                                <div class="row">

                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>长</label>
                                            <input type="text" class="form-control" placeholder="Enter ...">
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>宽</label>
                                            <input type="text" class="form-control" placeholder="Enter ...">
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>高</label>
                                            <input type="text" class="form-control" placeholder="Enter ...">
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>重量</label>
                                            <input type="text" class="form-control" placeholder="Enter ...">
                                        </div>
                                    </div>

                                </div>





                            </form>
                        </div>


                    </div>





                </div>
            </div>
        </div>
    </section>



<!--
    <script type="text/javascript">
        $(document).ready(function(){
            $('#sku-wrap').on('click', '.delete-icon', function (e) {
                console.log('delete-icon');
                event.stopPropagation();    //  阻止事件冒泡
                var skuName = $(this).prev().val();
                var fullName = pinyin.getFullChars(skuName);
                var objs = document.getElementsByName(fullName);
                console.log(objs);
                for(var i = 0;i<=objs.length;i++){
                    objs[0].nextSibling.remove();
                    objs[0].remove();
                    console.log(i)
                }
                $(this).prev().remove();
                $(this).remove();

                event.stopPropagation();    //  阻止事件冒泡
                combination();
            });
            $('#sku-value-wrap').on('click', '.delete-icon', function (e) {
                $(this).prev().remove();
                $(this).remove();

                event.stopPropagation();    //  阻止事件冒泡
                combination();
            });
        });

        var firstTime = false;
        // 添加规格按钮
        $('#skuAdd').click(function () {
            var skeLen = $('#sku-wrap').children().length;
            if(skeLen==0){
                firstTime = true;
            }else {
                firstTime = false;
            }
            $(this).hide();
            $('#skuModel').show();
        });
        //  取消添加规格按钮
        $('#skuCancel').click(function () {
            $('#skuName').val('');
            $('#skuModel').hide();
            $('#skuAdd').show();
        });

        //  添加规格确认按钮
        var fullName = '';
        $('#skuConfirm').click(function () {


            var skuName = $('#skuName').val();
            if(skuName == ''){
                layer.msg('请输入规格名');
                return;
            }
            //获取全写拼音（调用js中方法）
            fullName = pinyin.getFullChars(skuName);
            //  判断规格是否已存在
            if(ifSkuExit(fullName)){
                layer.msg('此规格已存在！');
                return;
            }
            if(firstTime){
                $('#sku-wrap').append('<input type="button" class="sku sku-active sku-choose '+fullName+' " value="'+skuName+'"><span class="delete-icon"></span>');
            }else{
                $('#sku-wrap').append('<input type="button" class="sku '+fullName+' " value="'+skuName+'"><span class="delete-icon"></span>');
            }
            $('#skuName').val('');
            $('#skuModel').hide();
            $('#skuAdd').show();
        });

        //  切换sku
        $(document).on('click', '.sku', function(){
            console.log('sku');
            event.stopPropagation();    //  阻止事件冒泡
            $('.sku-value').hide();
            $('#sku-value-wrap .delete-icon').hide();
            if($(this).hasClass('sku-active')){
                $(this).removeClass('sku-active');
            }else {
                var obj = $('.sku-active');
                if (obj.length==2){
                    layer.msg('只能选择两种规格');
                    return;
                }
                $(this).addClass('sku-active');
            }
            $(this).addClass('sku-choose').siblings().removeClass('sku-choose');
            var skuName = $(this).val();
            fullName = pinyin.getFullChars(skuName);
            console.log(fullName);
            var objs = document.getElementsByName(fullName);
            for(var i =0;i<objs.length;i++){
                objs[i].style.display="block";
                objs[i].nextSibling.style.display="block";
            }
            combination();
        });


        // 添加规格值按钮
        $('#skuValueAdd').click(function () {
            var skeLen = $('#sku-wrap').children().length;
            if(skeLen==0){
                layer.msg('请添加规格');
                return;
            }
            var skeLen = $('#sku-wrap .sku-active').length;
            if(skeLen==0){
                layer.msg('请选择规格');
                return;
            }
            $(this).hide();
            $('#skuValueModel').show();
        });
        //  取消添加规格值按钮
        $('#skuValueCancel').click(function () {
            $('#skuValueName').val('');
            $('#skuValueModel').hide();
            $('#skuValueAdd').show();
        });

        //  添加规格值确认按钮
        $('#skuValueConfirm').click(function () {
            var skuName = $('.sku-choose').val();
            fullName = pinyin.getFullChars(skuName);
            var skuValueName = $('#skuValueName').val();
            if(skuValueName == ''){
                layer.msg('请输入规格名');
                return;
            }
            //获取全写拼音（调用js中方法）
            var fullValueName = pinyin.getFullChars(skuValueName);
            //  判断规格值是否已存在
            if(ifSkuExit(fullValueName)){
                layer.msg('此规格已存在！');
                return;
            }
            $('#sku-value-wrap').append('<input type="text" class="sku-value '+fullValueName+'" name="'+fullName+'" value="'+skuValueName+'" readonly><span class="delete-icon"></span>');
            $('#skuValueName').val('');
            $('#skuValueModel').hide();
            $('#skuValueAdd').show();
            combination();
            $('#my-table').show();
            combination();
        });


        function ifSkuExit(name){
            var len = document.getElementsByClassName(name).length;
            if(len==0){
                return false;
            }else {
                return true;
            }
        }

        // 组合数组

        function combination () {
            $('#tbody').html('');
            $('#th').html('');
            var arr = [];
            var array = [];

            var skuObjs = document.getElementsByClassName('sku-active');
            for (var i = 0;i<skuObjs.length;i++){
                var sku = skuObjs[i].value;
                var py = pinyin.getFullChars(sku);
                arr[i] = [];
                var skuValueObjs = document.getElementsByName(py);
                for(var j =0;j<skuValueObjs.length;j++){
                    array[j] = [];
                    array[j] = skuValueObjs[j].value;
                    arr[i].push(array[j]);
                }


            }
            generateGroup(arr);

        }



        // 循环组合
        function generateGroup(arr) {
            var tablehtml = '';
            var skuObjs = document.getElementsByClassName('sku-active');
            for (var i = 0;i<skuObjs.length;i++){
                // var sku = skuObjs[i].value;
                // $('#th').append('<th>'+sku+'</th>');
                tablehtml += '<th>'+skuObjs[i].value+'</th>';
            }
            tablehtml += '<th>价格</th><th>库存</th><th>图片</th>';
            $('#th').html(tablehtml);
            // $('#th').append('<th>价格</th><th>库存</th>');


            //初始化结果为第一个数组
            var result= arr[0];
            //从下标1开始遍历二维数组
            for(var i=1;i<arr.length;i++){
                //使用临时遍历替代结果数组长度(这样做是为了避免下面的循环陷入死循环)
                var size= result.length;
                //根据结果数组的长度进行循环次数,这个数组有多少个成员就要和下一个数组进行组合多少次
                for(var j=0;j<size;j++){
                    //遍历要进行组合的数组
                    for(var k=0;k<arr[i].length;k++){
                        //把组合的字符串放入到结果数组最后一个成员中
                        //这里使用下标0是因为当这个下标0组合完毕之后就没有用了，在下面我们要移除掉这个成员
                        result.push(result[0]+","+arr[i][k]);
                        // $('#tbody').append('<tr><td>'+result[0]+'</td><td>'+arr[i][k]+'</td><td><input/> </td></tr>')
                    }
                    //当第一个成员组合完毕，删除这第一个成员
                    result.shift();
                }
            }
            //打印结果
            console.log(result);
            if(typeof(result)!="undefined"){
                console.log(result);
                for(var i=0;i<result.length;i++){
                    var html = '';
                    html += '<tr>';
                    var arr = result[i].split(',');
                    for (var j=0;j<arr.length;j++){
                        html += '<td>'+arr[j]+'</td>'
                    }
                    html += '<td><input/></td><td><input/></td><td><input/></td></tr>';
                    $('#my-table').show();
                    $("#tbody").append(html);
                }
            }else {
                $('#my-table').hide();
            }
        }

        // generateGroup([["红色","蓝色"],["X","XL"],["10m","20m"],["8g","16g"]]);

    </script>
-->

    <script>
        layui.config({
            base: '/style/lay-module/', // 设定扩展的 layui 模块的所在目录，一般用于外部模块扩展
        }).use(['form', 'skuTable'], function () {
            var form = layui.form, skuTable = layui.skuTable;

            //注意！！！ 注意！！！ 注意！！！
            //如果配置了相关接口请求的参数，请置本示例于服务器中预览，不然会有浏览器跨域问题
            //示例中的json文件仅做格式返回参考，若多次执行添加规格后再为新增后的规格添加规格值，会发现所有新增的规格都增加了该规格值。注意！此处并非是bug，原因是因为示例中返回的新增规格值id是重复的，而在正常接口请求每次返回的新增规则id是不一样的
            var obj = skuTable.render({
                //规格表容器id
                specTableElemId: 'fairy-spec-table',
                //sku表容器id
                skuTableElemId: 'fairy-sku-table',
                //sku表相同属性值是否合并行
                rowspan: true,
                //上传接口地址
                //接口要求返回格式为 {"code": 200, "data": {"url": "xxx"}, "msg": ""}
                // uploadUrl: '/style/json/upload.json',
                uploadUrl: '{{ route('admin.catalog.products.uploadImg') }}',


                //添加规格接口地址，如果为空则表示不允许增加规格
                //接口要求返回格式为 {"code": 200, "data": {"id": "xxx"}, "msg": ""}
                specCreateUrl: '/style/json/specCreate.json',
                //添加规格时的额外参数
                specCreateParams: {},
                //删除规格接口地址，如果为空则表示仅前端删除
                specDeleteUrl: '/style/json/specDelete.json',
                //添加规格值接口地址，如果为空则表示不允许增加规格值
                //接口要求返回格式为 {"code": 200, "data": {"id": "xxx"}, "msg": ""}
                specValueCreateUrl: '/style/json/specValueCreate.json',
                //删除规格值接口地址，如果为空则表示仅前端删除
                specValueDeleteUrl: '/style/json/specValueDelete.json',
                //sku表格配置参数
                skuTableConfig: {
                    thead: [
                        {title: '图片', icon: ''},
                        {title: '销售价(元)', icon: 'layui-icon-cols'},
                        {title: '市场价(元)', icon: 'layui-icon-cols'},
                        {title: '成本价(元)', icon: 'layui-icon-cols'},
                        {title: '库存', icon: 'layui-icon-cols'},
                        {title: '条码', icon: 'layui-icon-cols'},
                        {title: '状态', icon: ''},
                    ],
                    tbody: [
                        {type: 'image', field: 'picture', value: '', verify: '', reqtext: ''},
                        {type: 'input', field: 'price', value: '0', verify: 'required|number', reqtext: '销售价不能为空'},
                        {type: 'input', field: 'market_price', value: '0', verify: 'required|number', reqtext: '市场价不能为空'},
                        {type: 'input', field: 'cost_price', value: '0', verify: 'required|number', reqtext: '成本价不能为空'},
                        {type: 'input', field: 'stock', value: '0', verify: 'required|number', reqtext: '库存不能为空'},
                        {type: 'input', field: 'bar_code', value: '0', verify: 'required|number', reqtext: '条码不能为空'},

                        {type: 'select', field: 'status', option: [{key: '启用', value: '1'}, {key: '禁用', value: '0'}], verify: 'required', reqtext: '状态不能为空'},
                    ]
                },
                //规格数据, 一般从后台获取
                specData: [
                    {
                        id: "1",
                        title: "颜色",
                        child: [
                            {id: "1", title: "红", checked: true},
                            {id: "2", title: "黄", checked: false},
                            {id: "3", title: "蓝", checked: false}
                        ]
                    }, {
                        id: "2",
                        title: "尺码",
                        child: [
                            {id: "4", title: "S", checked: true},
                            {id: "5", title: "M", checked: true},
                            {id: "6", title: "L", checked: false},
                            {id: "7", title: "XL", checked: false}
                        ]
                    }, {
                        id: "3",
                        title: "款式",
                        child: [
                            {id: "8", title: "男款", checked: true},
                            {id: "9", title: "女款", checked: true}
                        ]
                    }
                ],
                //获取规格数据接口地址，如果为空或者不配置则使用 specData 参数配置
                //接口要求返回格式参考 specData.json
                // specDataUrl: './json/specData.json',
                //sku数据
                //新增的时候为空对象
                //编辑的时候可以从后台接收，会自动填充sku表，可以去掉注释看效果
                // skuData: {
                //     "skus[1-4-8][picture]": "https://www.baidu.com/img/flexible/logo/pc/result.png",
                //     "skus[1-4-8][price]": "100",
                //     "skus[1-4-8][market_price]": "200",
                //     "skus[1-4-8][cost_price]": "50",
                //     "skus[1-4-8][stock]": "18",
                //     "skus[1-4-8][status]": "0",
                //     "skus[1-4-9][picture]": "",
                //     "skus[1-4-9][price]": "0",
                //     "skus[1-4-9][market_price]": "0",
                //     "skus[1-4-9][cost_price]": "0",
                //     "skus[1-4-9][stock]": "0",
                //     "skus[1-4-9][status]": "1",
                //     "skus[1-5-8][picture]": "",
                //     "skus[1-5-8][price]": "0",
                //     "skus[1-5-8][market_price]": "0",
                //     "skus[1-5-8][cost_price]": "0",
                //     "skus[1-5-8][stock]": "0",
                //     "skus[1-5-8][status]": "1",
                //     "skus[1-5-9][picture]": "",
                //     "skus[1-5-9][price]": "0",
                //     "skus[1-5-9][market_price]": "0",
                //     "skus[1-5-9][cost_price]": "0",
                //     "skus[1-5-9][stock]": "0",
                //     "skus[1-5-9][status]": "1"
                // },
                //获取SKU数据接口地址，如果为空或者不配置则使用skuData配置
                //接口要求返回格式参考 skuData.json
                skuDataUrl: '/style/json/skuData.json',
            });

            form.on('submit(submit)', function (data) {


                //获取规格数据
                console.log(obj.getSpecData());
                //获取表单数据
                console.log(data.field);

                var state = Object.keys(data.field).some(function (item, index, array) {
                    return item.startsWith('skus');
                });

                state ? layer.alert(JSON.stringify(data.field), {title: '提交的数据'}) : layer.msg('sku表数据不能为空', {icon: 5, anim: 6});
                return false;
            });
        });
    </script>



    <script>
        $(document).ready(function() {
            // Image upload preview
            $('#imageUpload').change(function() {
                readURL(this);
            });

            function readURL(input) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();

                    reader.onload = function(e) {
                        $('#imagePreview').html('<img src="' + e.target.result + '" class="img-fluid" />').show();
                        $('.custom-file-label').text(input.files[0].name); // Update file label
                    }

                    reader.readAsDataURL(input.files[0]); // Convert to base64 string
                }
            }
        });
    </script>




</x-admin::layouts>