<div class="container-fluid">

    <table class="table table-striped table-hover ">
        <tr>
            <th class="col-sm-2">
                <h4>班級</h4>
            </th>


            <th class="col-sm-2">
                <h4>日期</h4>
            </th>
            <th class="col-sm-1">
                <h4>節次</h4>
            </th>
            <th class="col-sm-2">
                <h4>課堂老師</h4>
            </th>
            <th class="col-sm-4">
                <h4>登載內容</h4>
            </th>
            <th class="col-sm-1">
                <h4>次數</h4>
            </th>

        </tr>


        <{foreach from=$all key=i item=eric_dosa_content}>
            <tr>
                <td>
                    <{$eric_dosa_content.c_class}>
                </td>

                <td>
                    <{$eric_dosa_content.rec_date}>
                </td>
                <td>
                    <{$eric_dosa_content.period}>
                </td>
                <td>
                    <{$eric_dosa_content.cls_tr_name}>
                </td>
                <td>
                    <{$eric_dosa_content.behavior}>
                </td>
                <td>
                    <{$eric_dosa_content.freq}>
                </td>

            </tr>
            <{ /foreach}>
    </table>
    <{$bar}>






</div>