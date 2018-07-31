<link rel="stylesheet" href="static/css/compiled/user-list.css" type="text/css" media="screen" />
<link href="static/css/lib/font-awesome.css" type="text/css" rel="stylesheet" />
<link href='http://fonts.useso.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css' />
<div class="content">
    <div class="container-fluid">
        <div id="pad-wrapper" class="users-list">
            <div class="row-fluid header">
                <h3>管理员设置</h3>
                <div class="span10 pull-right">
                    <input type="text" class="span5 search" placeholder="Type a user's name..."/>
                    <div class="ui-dropdown">
                        <div class="head" data-toggle="tooltip" title="Click me!">
                            Filter users
                            <i class="arrow-down"></i>
                        </div>
                        <div class="dialog">
                            <div class="pointer">
                                <div class="arrow"></div>
                                <div class="arrow_border"></div>
                            </div>
                            <div class="body">
                                <p class="title">
                                    Show users where:
                                </p>
                                <div class="form">
                                    <select>
                                        <option/>
                                        Name
                                        <option/>
                                        Email
                                        <option/>
                                        Number of orders
                                        <option/>
                                        Signed up
                                        <option/>
                                        Last seen
                                    </select>
                                    <select>
                                        <option/>
                                        is equal to
                                        <option/>
                                        is not equal to
                                        <option/>
                                        is greater than
                                        <option/>
                                        starts with
                                        <option/>
                                        contains
                                    </select>
                                    <input type="text"/>
                                    <a class="btn-flat small">Add filter</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <a href="new-user.html" class="btn-flat success pull-right">
                        <span>&#43;</span>
                        新建管理员
                    </a>
                </div>
            </div>
            <!-- Users table -->
            <?php echo $this->context->actionData() ?>
            <!-- end users table -->
        </div>
    </div>
</div>
<!-- end main container -->
<?php $this->beginBlock('script') ?>
<script type="text/javascript">
    <script src="static/js/jquery-latest.js"></script>
    <script src="static/js/bootstrap.min.js"></script>
    <script src="static/js/theme.js"></script>
</script>
<?php $this->endBlock()?>