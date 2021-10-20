<!DOCTYPE html>
<html lang="zh-Hant-TW">
{include 'header.tpl'}


<body>
    <div class="container">


        {include 'nav.tpl'}



        <div class="row">
            <div class="col-12 col-sm-6 col-lg-3">
                日期：{$now}
            </div>
            <div class="col-12 col-sm-6 col-lg-9">
                <ul>
                    <li>今天到期：1</li>
                    <li>逾期：2</li>
                </ul>
            </div>
        </div>
        {if $op=='post_form'}
            <!-- 新增表單 -->
            {include file='post_form.tpl'}

        <!-- 僅秀一筆 -->
        {elseif $op=='show_one'}
            {include file='show_one.tpl'}

        {else}

            {if $content}
                <div class="table-responsive">

                    <table class="table table-bordered border-primary table-hover">
                    <thead class="table-primary">
                        <tr>
                            <th scope="col">是否完成</th>
                            <th scope="col">標題</th>
                            <th scope="col">到期日</th>
                            <th scope="col">優先順序</th>
                            <th scope="col">指派對象</th>
                            <th scope="col">功能</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- 第一列 -->
                        {foreach $content as $row}
                            <tr>
                                <td>{$row.done}</td>
                                <td>{$row.title}</td>
                                <td>{$row.end}</td>
                                <td>{$row.priority}</td>
                                <td>{$row.assign}</td>
                                <td>
                                    <a class="btn btn-warning" href="{$action}?op=post_form&sn={$row.sn}" title='編輯'><i class="fas fa-pencil-alt"></i>編輯</a>
                                    <a class="btn btn-danger" href="{$action}?op=deletem&sn={$row.sn}" title='刪除'><i class="fas fa-times-circle"></i>刪除</a>
                                </td>
                            </tr>
                        {/foreach}
                        </tr>
                    </tbody>
                    </table>
            {else}
                    <div class="d-grid col-12 col-md-3 mx-auto">
                        <a class="btn btn-info" href="{$action}?op=post_form" role="button">新增待辦事項</a>
                    </div>

            </div>
            {/if}

        {/if}
    </div>
</body>

</html>