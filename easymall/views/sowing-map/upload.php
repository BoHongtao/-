<?php
/**
 * Created by PhpStorm.
 * User: john
 * Date: 2018/8/6
 * Time: 16:01
 */
?>

<link rel="stylesheet" href="static/layer/css/layui.css">
<!--上传文件窗口-->
<div class="layui-upload">
    <button type="button" class="layui-btn layui-btn-normal" id="testList">选择多文件</button>
    <div class="layui-upload-list">
        <table class="layui-table">
            <thead>
            <th>文件名</th>
            <th>大小</th>
            <th>状态</th>
            <th>操作</th>
            </thead>
            <tbody id="demoList"></tbody>
        </table>
    </div>
    <button type="button" class="layui-btn" id="testListAction">开始上传</button>
</div>

<script src="static/layer/layui.js"></script>
<script>
    layui.use('upload', function () {
        var $ = layui.jquery, upload = layui.upload;
        var index = parent.layer.getFrameIndex(window.name); //先得到当前iframe层的索引
        //演示多文件列表
        var demoListView = $('#demoList');
        var uploadListIns = upload.render({
            elem: '#testList'
            , url: '<?=\yii\helpers\Url::toRoute(['sowing-map/upload'])?>'
            , data: {'_csrf':"<?php echo Yii::$app->request->csrfToken; ?>"}
            , accept: 'file'
            , multiple: true
            , number: 3
            , auto: false
            , bindAction: '#testListAction'
            , choose: function (obj) {
                var files = this.files = obj.pushFile(); //将每次选择的文件追加到文件队列
                //读取本地文件
                obj.preview(function (index, file, result) {
                    var tr = $(['<tr id="upload-' + index + '">'
                        , '<td>' + file.name + '</td>'
                        , '<td>' + (file.size / 1014).toFixed(1) + 'kb</td>'
                        , '<td>等待上传</td>'
                        , '<td>'
                        , '<button class="layui-btn layui-btn-mini demo-reload layui-hide">重传</button>'
                        , '<button class="layui-btn layui-btn-mini layui-btn-danger demo-delete">删除</button>'
                        , '</td>'
                        , '</tr>'].join(''));

                    //单个重传
                    tr.find('.demo-reload').on('click', function () {
                        obj.upload(index, file);
                    });

                    //删除
                    tr.find('.demo-delete').on('click', function () {
                        delete files[index]; //删除对应的文件
                        tr.remove();
                        uploadListIns.config.elem.next()[0].value = ''; //清空 input file 值，以免删除后出现同名文件不可选
                    });

                    demoListView.append(tr);
                });
            }
            , done: function (res, index, upload) {
                if (res.code == 0) { //上传成功
                    var tr = demoListView.find('tr#upload-' + index)
                        , tds = tr.children();
                    tds.eq(2).html('<span style="color: #5FB878;">上传成功</span>');
                    tds.eq(3).html(''); //清空操作
                    delete this.files[index]; //删除文件队列已经上传成功的文件
                    parent.layer.close(index);
                    setTimeout(window.location.reload(),2000);
                    return;
                }
                this.error(index, upload);
            }
            , allDone: function (obj) {
                console.log(obj)
            }
            , error: function (index, upload) {
                var tr = demoListView.find('tr#upload-' + index)
                    , tds = tr.children();
                tds.eq(2).html('<span style="color: #FF5722;">上传失败</span>');
                tds.eq(3).find('.demo-reload').removeClass('layui-hide'); //显示重传
            }
        });
    });
</script>