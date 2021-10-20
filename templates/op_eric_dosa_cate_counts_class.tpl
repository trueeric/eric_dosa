<!-- 1.引入js、css bootstrap-table -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-table/1.18.3/bootstrap-table.min.css" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-table/1.18.3/bootstrap-table.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-table/1.18.3/locale/bootstrap-table-zh-TW.min.js"></script>

<div class="container-fluid">
  <div class="row">
    <div class="H3 col col-md-8 text-center">
      <h4>各班相關登記次數學期統計</h4>
    </div>
    <div class="col col-md-2">單位:次</div>
    <div class="col col-md-2">
      <a class="btn btn-primary" href="index.php?op=cate_counts " role="button">下一頁</a>
    </div>
  </div>
  <div id="main">
    <div id="toolbar"></div>

    <div class="container py-2">
      <table id="table" class="table-sm">
        <thead>
          <tr>
            <th data-field="0" data-sortable="true" data-align="center" data-width="100" data-visible="true">班級</th>

            <th data-field="1" data-sortable="true" data-align="center" data-width="100" data-visible="true">
              上學遲到
            </th>

            <th data-field="2" data-sortable="true" data-align="center" data-width="100" data-visible="true">升旗</th>

            <th data-field="3" data-sortable="true" data-align="center" data-width="100" data-visible="true">午休</th>

            <th data-field="4" data-sortable="true" data-align="center" data-width="100" data-visible="true">
              上課常規
            </th>

            <th data-field="5" data-sortable="true" data-align="center" data-width="100" data-visible="true">
              生活常規
            </th>

            <th data-field="6" data-sortable="true" data-align="center" data-width="100" data-visible="true">
              室內衛生
            </th>

            <th data-field="7" data-sortable="true" data-align="center" data-width="100" data-visible="true">
              室外衛生
            </th>
          </tr>
        </thead>
        <tbody class="table_container">
          <{foreach from=$all key=i item=eric_dosa_cate_counts}>
          <tr>
            <th scope="row"><{$eric_dosa_cate_counts.eclass}></th>

            <td class="text-info text-right"><{$eric_dosa_cate_counts.1}></td>
            <td class="text-info text-right"><{$eric_dosa_cate_counts.2}></td>
            <td class="text-info text-right"><{$eric_dosa_cate_counts.3}></td>
            <td class="text-info text-right"><{$eric_dosa_cate_counts.4}></td>
            <td class="text-info text-right"><{$eric_dosa_cate_counts.5}></td>
            <td class="text-success text-right"><{$eric_dosa_cate_counts.21}></td>
            <td class="text-success text-right"><{$eric_dosa_cate_counts.22}></td>
          </tr>
          <{/foreach}>
        </tbody>
      </table>
    </div>

    <!-- 2.調用bootstrapTable函式 -->
    <script>
      $('#table').bootstrapTable({
        //classes:'table',
        toolbar: '#toolbar',
        uniqueId: '0', //哪一個欄位是key
        sortName: '0', //依照那個欄位排序
        height: 400, //設定高度
        pagination: false, //使否要分頁

        //可於ToolBar上顯示的按鈕
        showColumns: false, //顯示/隱藏哪些欄位
        showToggle: false, //名片式/table式切換
        showPaginationSwitch: false, //分頁/不分頁切換
        showRefresh: false, //重新整理
        search: true, //查詢

        onPageChange: function (currentPage, pageSize) {
          console.log('目前頁數: ' + currentPage + ' ,一頁顯示: ' + pageSize + ' 筆')
        },
        pageSize: 10, //一頁顯示幾筆
        pageList: [10, 20, 50, 100, 200], //一頁顯示幾筆的選項

        formatRecordsPerPage: function (pageSize) {
          return '&nbsp;&nbsp;每頁顯示 ' + pageSize + ' 筆'
        },
        formatShowingRows: function (fromIndex, toIndex, totalSize) {
          //目前第幾頁
          var currentPage = Math.ceil(fromIndex / this.pageSize)
          //總共幾頁
          var totalPageCount = Math.ceil(totalSize / this.pageSize)
          return '第 ' + currentPage + ' 頁&nbsp;&nbsp;共 ' + totalPageCount + ' 頁'
        },
      })
    </script>
  </div>
</div>
